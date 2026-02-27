<?php

session_start();
error_reporting(E_ALL);

mb_language('uni');
mb_internal_encoding('UTF-8');
date_default_timezone_set('Asia/Tokyo');

header('Content-Type: application/json; charset=UTF-8');

require_once dirname(__FILE__) . '/ContactMailer.php';
$mailer = new ContactMailer();

// --- Token retrieval (GET-style via POST flag) ---
if (!empty($_POST['token_get'])) {
    if (!$mailer->checkReferer()) {
        echo json_encode(['status' => 'error', 'message' => '不正なリクエストです。']);
        exit;
    }
    $token = $mailer->generateToken();
    echo json_encode(['status' => 'ok', 'token' => $token]);
    exit;
}

// --- Form submission ---
$response = ['status' => 'error', 'message' => '不明なエラーが発生しました。'];

try {
    // Referer check
    if (!$mailer->checkReferer()) {
        throw new RuntimeException('不正なリクエストです。');
    }

    // CSRF token
    $token = $_POST['_token'] ?? '';
    if (!$mailer->verifyToken($token)) {
        throw new RuntimeException('セッションが切れました。ページを再読み込みしてください。');
    }

    // Honeypot
    $hp = $_POST['_website'] ?? null;
    if ($hp === null || !$mailer->checkHoneypot($hp)) {
        throw new RuntimeException('不正な操作が検出されました。');
    }

    // Timing check
    if (!$mailer->checkSubmitTime()) {
        throw new RuntimeException('送信が速すぎます。もう一度お試しください。');
    }

    // Rate limiting
    if (!$mailer->checkRateLimit()) {
        throw new RuntimeException('送信回数の上限に達しました。しばらく経ってからお試しください。');
    }

    // Validation
    $errors = $mailer->validateFields($_POST);
    if (!empty($errors)) {
        echo json_encode(['status' => 'validation_error', 'errors' => $errors]);
        exit;
    }

    // Send mail
    $result = $mailer->send($_POST);

    echo json_encode([
        'status'     => 'success',
        'thanks_url' => $result['thanks_url'],
    ]);

} catch (RuntimeException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
