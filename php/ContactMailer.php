<?php

class ContactMailer
{
    private array $sendAddresses = [];
    private string $fromAddress = '';
    private string $senderName = '';
    private string $sendSubject = '';
    private string $sendBodyPrefix = '';
    private string $thanksSubject = '';
    private string $thanksBodyPrefix = '';
    private string $thanksBodySignature = '';
    private string $thanksPageUrl = '';

    private bool $replyMailEnabled = false;
    private bool $htmlReplyEnabled = false;

    private int $rateLimitCount = 3;
    private int $rateLimitWindow = 600;
    private int $minSubmitTime = 3;

    private string $csrfToken = '';

    public function __construct()
    {
        include dirname(__FILE__) . '/config.php';

        $this->sendAddresses     = $rm_send_address;
        $this->fromAddress       = $rm_from_address;
        $this->senderName        = $rm_send_name;
        $this->sendSubject       = $rm_send_subject;
        $this->sendBodyPrefix    = $rm_send_body;
        $this->thanksSubject     = $rm_thanks_subject;
        $this->thanksBodyPrefix  = $rm_thanks_body;
        $this->thanksBodySignature = $rm_thanks_body_signature;
        $this->thanksPageUrl     = $rm_thanks_page_url;
        $this->replyMailEnabled  = !empty($rm_reply_mail);
        $this->htmlReplyEnabled  = !empty($rm_html_reply);
        $this->rateLimitCount    = $rm_rate_limit_count ?? 3;
        $this->rateLimitWindow   = $rm_rate_limit_window ?? 600;
        $this->minSubmitTime     = $rm_min_submit_time ?? 3;
    }

    // ------------------------------------------------------------------
    // CSRF Token
    // ------------------------------------------------------------------

    public function generateToken(): string
    {
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        $_SESSION['csrf_token_time'] = time();
        return $token;
    }

    public function verifyToken(string $token): bool
    {
        if (empty($_SESSION['csrf_token'])) {
            return false;
        }
        $valid = hash_equals($_SESSION['csrf_token'], $token);
        unset($_SESSION['csrf_token']);
        return $valid;
    }

    // ------------------------------------------------------------------
    // Security checks
    // ------------------------------------------------------------------

    public function checkReferer(): bool
    {
        if (empty($_SERVER['HTTP_REFERER'])) {
            return false;
        }
        $host = $_SERVER['HTTP_HOST'] ?? '';
        return $host !== '' && strpos($_SERVER['HTTP_REFERER'], $host) !== false;
    }

    public function checkHoneypot(string $value): bool
    {
        return $value === '';
    }

    public function checkSubmitTime(): bool
    {
        $tokenTime = $_SESSION['csrf_token_time'] ?? 0;
        if ($tokenTime === 0) {
            return false;
        }
        return (time() - $tokenTime) >= $this->minSubmitTime;
    }

    public function checkRateLimit(): bool
    {
        $now = time();
        if (!isset($_SESSION['mail_send_times'])) {
            $_SESSION['mail_send_times'] = [];
        }

        $_SESSION['mail_send_times'] = array_filter(
            $_SESSION['mail_send_times'],
            fn($t) => ($now - $t) < $this->rateLimitWindow
        );

        return count($_SESSION['mail_send_times']) < $this->rateLimitCount;
    }

    public function recordSend(): void
    {
        $_SESSION['mail_send_times'][] = time();
    }

    // ------------------------------------------------------------------
    // Sanitization & Validation
    // ------------------------------------------------------------------

    private function sanitize(string $value, int $maxLength = 5000): string
    {
        $value = str_replace(["\r\n", "\r", "\n"], "\n", $value);
        $value = mb_substr($value, 0, $maxLength);
        return $value;
    }

    private function stripHeaderInjection(string $value): string
    {
        return str_replace(["\r", "\n", "%0a", "%0d"], '', $value);
    }

    public function validateFields(array $data): array
    {
        $errors = [];

        if (empty(trim($data['name_1'] ?? ''))) {
            $errors[] = 'お名前を入力してください。';
        }
        if (empty(trim($data['phone'] ?? ''))) {
            $errors[] = '電話番号を入力してください。';
        } elseif (!preg_match('/^[0-9\-+() ]{7,20}$/', $data['phone'])) {
            $errors[] = '正しい電話番号を入力してください。';
        }
        if (empty(trim($data['mail_address'] ?? ''))) {
            $errors[] = 'メールアドレスを入力してください。';
        } elseif (!filter_var($data['mail_address'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = '正しいメールアドレスを入力してください。';
        }
        if (empty(trim($data['inquiry'] ?? ''))) {
            $errors[] = 'お問い合わせ内容を選択してください。';
        }
        if (empty(trim($data['contents'] ?? ''))) {
            $errors[] = 'お問い合わせ詳細を入力してください。';
        }

        return $errors;
    }

    // ------------------------------------------------------------------
    // Build mail body
    // ------------------------------------------------------------------

    private function buildFormData(array $data): array
    {
        $fields = [
            '会社名'       => $this->sanitize($data['company'] ?? ''),
            'お名前'       => $this->sanitize($data['name_1'] ?? ''),
            '電話番号'      => $this->sanitize($data['phone'] ?? ''),
            'メールアドレス'  => $this->stripHeaderInjection($this->sanitize($data['mail_address'] ?? '')),
            'お問い合わせ内容' => $this->sanitize($data['inquiry'] ?? ''),
            'お問い合わせ詳細' => $this->sanitize($data['contents'] ?? '', 10000),
        ];
        return $fields;
    }

    private function buildAdminBody(array $fields): string
    {
        $sendDate = date('Y年m月d日 H時i分s秒');
        $body = $this->sendBodyPrefix;
        $body .= "\n-----------------------------------------------------------------------------------\n\n";
        $body .= "【送信時刻】\n{$sendDate}\n";

        foreach ($fields as $label => $value) {
            if ($value !== '') {
                $body .= "\n【{$label}】\n{$value}\n";
            }
        }

        $body .= "\n-----------------------------------------------------------------------------------\n";
        $body .= "\n【送信者のIPアドレス】\n" . ($_SERVER['REMOTE_ADDR'] ?? '不明') . "\n";
        $body .= "\n【送信者のブラウザ】\n" . ($_SERVER['HTTP_USER_AGENT'] ?? '不明') . "\n";

        return $body;
    }

    private function buildReplyTextBody(array $fields): string
    {
        $sendDate = date('Y年m月d日 H時i分s秒');
        $body = $this->thanksBodyPrefix;
        $body .= "\n-----------------------------------------------------------------------------------\n\n";
        $body .= "【送信時刻】\n{$sendDate}\n";

        foreach ($fields as $label => $value) {
            if ($value !== '') {
                $body .= "\n【{$label}】\n{$value}\n";
            }
        }

        $body .= "\n-----------------------------------------------------------------------------------\n";
        $body .= $this->thanksBodySignature;

        return $body;
    }

    private function buildReplyHtmlBody(array $fields): string
    {
        $templatePath = dirname(__FILE__) . '/html-mail-template.php';
        if (!file_exists($templatePath)) {
            return '';
        }

        $sendDate  = date('Y年m月d日 H時i分s秒');
        $signature = $this->thanksBodySignature;
        $senderName = $this->senderName;

        ob_start();
        include $templatePath;
        return ob_get_clean();
    }

    // ------------------------------------------------------------------
    // Send
    // ------------------------------------------------------------------

    public function send(array $postData): array
    {
        $fields = $this->buildFormData($postData);
        $mailAddress = $this->stripHeaderInjection($this->sanitize($postData['mail_address'] ?? ''));

        $fromHeader = "From: " . $this->fromAddress;
        $fromParam  = '-f' . $this->fromAddress;

        $adminBody = $this->buildAdminBody($fields);
        $allSuccess = true;
        foreach ($this->sendAddresses as $addr) {
            $result = mb_send_mail($addr, $this->sendSubject, $adminBody, $fromHeader, $fromParam);
            if (!$result) {
                $allSuccess = false;
            }
        }

        $replyResult = true;
        if ($this->replyMailEnabled && filter_var($mailAddress, FILTER_VALIDATE_EMAIL)) {
            $encodedName = mb_encode_mimeheader($this->senderName, 'UTF-8');
            $replyFrom = "From: {$encodedName} <{$this->fromAddress}>";
            $replyParam = '-f' . $this->fromAddress;

            if ($this->htmlReplyEnabled) {
                $replyResult = $this->sendMultipartMail(
                    $mailAddress,
                    $this->thanksSubject,
                    $this->buildReplyTextBody($fields),
                    $this->buildReplyHtmlBody($fields),
                    $replyFrom,
                    $replyParam
                );
            } else {
                $textBody = $this->buildReplyTextBody($fields);
                $replyResult = mb_send_mail($mailAddress, $this->thanksSubject, $textBody, $replyFrom, $replyParam);
            }
        }

        $this->recordSend();

        return [
            'admin_sent' => $allSuccess,
            'reply_sent' => $replyResult,
            'thanks_url' => $this->thanksPageUrl,
        ];
    }

    private function sendMultipartMail(
        string $to,
        string $subject,
        string $textBody,
        string $htmlBody,
        string $fromHeader,
        string $fromParam
    ): bool {
        $boundary = '----=_Part_' . md5(uniqid(mt_rand(), true));

        $headers  = $fromHeader . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/alternative; boundary=\"{$boundary}\"\r\n";

        $body  = "--{$boundary}\r\n";
        $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $body .= chunk_split(base64_encode($textBody)) . "\r\n";

        $body .= "--{$boundary}\r\n";
        $body .= "Content-Type: text/html; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $body .= chunk_split(base64_encode($htmlBody)) . "\r\n";

        $body .= "--{$boundary}--\r\n";

        $encodedSubject = mb_encode_mimeheader($subject, 'UTF-8');

        return mail($to, $encodedSubject, $body, $headers, $fromParam);
    }
}
