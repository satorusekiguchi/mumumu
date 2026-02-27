<?php
require_once __DIR__ . '/../../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'Open Gantt';
$page_label = '制作事例';
setPageMeta(
    'Open Gantt｜無料AIガントチャート作成ツール【制作実績】｜株式会社mumumu',
    '自社プロダクト「Open Gantt」の制作事例。LPデザインから実際のガントチャートシステムまでフルスクラッチで開発。ログイン不要・完全無料のガントチャート作成ツール。Google Gemini AIによるWBS自動生成、URLベースの共有機能搭載。1,900件以上の利用実績。',
    $page_title,
    $page_label,
    [
        'keywords' => 'Open Gantt,ガントチャート,無料,AI,WBS,プロジェクト管理,制作実績,Webアプリ開発',
        'type' => 'article',
        'image' => SITE_URL . '/img/works/open-gantt.png'
    ]
);

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => '制作実績', 'url' => 'works/'],
    ['name' => 'Open Gantt', 'url' => 'works/open-gantt/']
];
?>
<!DOCTYPE html>
<html lang="ja" prefix="og: https://ogp.me/ns#">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($page_meta['title']); ?></title>

  <?php outputGTM(); ?>
  <?php outputSeoMeta(); ?>

  <!-- Google Fonts Preconnect & Preload -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Noto+Sans+JP:wght@400;500;700&family=Oswald:wght@400;500;700&family=Anton&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
  <noscript>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Noto+Sans+JP:wght@400;500;700&family=Oswald:wght@400;500;700&family=Anton&display=swap" rel="stylesheet">
  </noscript>

  <!-- FOUC Prevention -->
  <style>html.css-loading body{visibility:hidden}.global-nav{opacity:0;pointer-events:none}</style>
  <script>document.documentElement.classList.add('css-loading');</script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" media="print" onload="this.media='all'">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"></noscript>
  
  <link rel="stylesheet" href="<?php echo $prefix; ?>css/style.css" onload="document.documentElement.classList.remove('css-loading');">
  
  <!-- Structured Data -->
  <?php 
  outputOrganizationSchema();
  outputBreadcrumbSchema($breadcrumb_schema);
  outputArticleSchema([
      'title' => 'Open Gantt - 無料AIガントチャート作成ツール',
      'description' => '自社プロダクトOpen Ganttの制作事例。LPデザインから実際のガントチャートシステムまでフルスクラッチで開発。',
      'date' => '2025-12-01',
      'image' => SITE_URL . '/img/works/open-gantt.png',
      'url' => SITE_URL . '/works/open-gantt/'
  ]);
  ?>
  <style>
    /* 事例詳細ページ用スタイル */
    .inner {
      max-width: 1000px;
    }
    
    .case-hero {
      margin-bottom: 80px;
    }
    
    .case-hero-inner {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 60px;
      align-items: center;
    }
    
    .case-hero-image {
      border-radius: 12px;
      overflow: hidden;
      background: var(--solid-bg);
      border: 1px solid var(--solid-border);
    }
    
    .case-hero-image img {
      width: 100%;
      height: auto;
      display: block;
      filter: none;
    }
    
    .case-hero-content {
      padding: 20px 0;
    }
    
    .case-category {
      font-family: var(--font-en);
      font-size: 0.75rem;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.5);
      margin-bottom: 16px;
      display: inline-block;
      padding: 6px 14px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
    }
    
    .case-title {
      font-family: "Noto Sans JP";
      font-size: 3rem;
      line-height: 1.2;
      margin: 0 0 20px;
      color: #fff;
    }
    
    .case-subtitle {
      font-size: 1.3rem;
      color: rgba(255, 255, 255, 0.8);
      margin: 0 0 24px;
      line-height: 1.6;
    }
    
    .case-meta {
      display: flex;
      gap: 24px;
      margin-bottom: 32px;
      flex-wrap: wrap;
    }
    
    .case-meta-item {
      font-size: 0.9rem;
      color: rgba(255, 255, 255, 0.6);
    }
    
    .case-meta-label {
      font-family: var(--font-en);
      text-transform: uppercase;
      font-size: 0.7rem;
      letter-spacing: 0.1em;
      color: rgba(255, 255, 255, 0.4);
      display: block;
      margin-bottom: 4px;
    }
    
    .case-link {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-family: var(--font-en);
      font-size: 0.95rem;
      letter-spacing: 0.05em;
      color: #fff;
      text-decoration: none;
      padding: 14px 32px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 100px;
      transition: all 0.3s ease;
    }
    
    .case-link:hover {
      background: rgba(255, 255, 255, 0.1);
      border-color: rgba(255, 255, 255, 0.5);
      transform: translateY(-2px);
    }
    
    .case-link::after {
      content: '→';
      transition: transform 0.3s ease;
    }
    
    .case-link:hover::after {
      transform: translateX(4px);
    }
    
    /* セクション */
    .case-section {
      padding-top: 60px;
      padding-bottom: 60px;
      margin-bottom: 80px;
    }
    
    .case-section-title {
      font-family: var(--font-impact);
      font-size: 2rem;
      color: #fff;
      margin: 0 0 32px;
      text-transform: uppercase;
      letter-spacing: 0.02em;
    }
    
    .case-section-content {
      font-size: 1.05rem;
      line-height: 2;
      color: rgba(255, 255, 255, 0.7);
    }
    
    .case-section-content p {
      margin: 0 0 24px;
    }
    
    .case-section-content p:last-child {
      margin-bottom: 0;
    }
    
    /* 課題と解決テーブル */
    .comparison-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      margin-top: 40px;
    }
    
    .comparison-card {
      background: var(--solid-bg);
      border: 1px solid var(--solid-border);
      border-radius: 12px;
      padding: 40px;
      transition: all 0.3s ease;
    }
    
    .comparison-card:hover {
      background: var(--solid-bg-hover);
      border-color: rgba(255, 255, 255, 0.12);
      transform: translateY(-4px);
    }
    
    .comparison-card.problem {
      border-left: 3px solid rgba(255, 255, 255, 0.3);
    }
    
    .comparison-card.solution {
      border-left: 3px solid rgba(255, 255, 255, 0.6);
    }
    
    .comparison-card-title {
      font-family: var(--font-en);
      font-size: 0.75rem;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      margin: 0 0 20px;
      color: rgba(255, 255, 255, 0.5);
    }
    
    .comparison-card ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    
    .comparison-card li {
      padding: 12px 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
      color: rgba(255, 255, 255, 0.7);
      display: flex;
      align-items: flex-start;
      gap: 12px;
    }
    
    .comparison-card li:last-child {
      border-bottom: none;
    }
    
    .comparison-card li::before {
      content: '—';
      color: rgba(255, 255, 255, 0.3);
      font-weight: normal;
      flex-shrink: 0;
    }
    
    .comparison-card.solution li::before {
      content: '+';
      color: rgba(255, 255, 255, 0.6);
    }
    
    /* 機能リスト */
    .features-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 30px;
      margin-top: 40px;
    }
    
    .feature-card {
      background: var(--solid-bg);
      border: 1px solid var(--solid-border);
      border-radius: 12px;
      padding: 32px;
      transition: all 0.3s ease;
    }
    
    .feature-card:hover {
      background: var(--solid-bg-hover);
      border-color: rgba(255, 255, 255, 0.12);
      transform: translateY(-4px);
    }
    
    .feature-icon {
      font-family: var(--font-en);
      font-size: 0.75rem;
      font-weight: 500;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.4);
      margin-bottom: 12px;
    }
    
    .feature-title {
      font-size: 1.2rem;
      font-weight: 700;
      color: #fff;
      margin: 0 0 12px;
    }
    
    .feature-desc {
      font-size: 0.95rem;
      line-height: 1.8;
      color: rgba(255, 255, 255, 0.6);
      margin: 0;
    }
    
    /* 活用事例リスト */
    .use-cases-list {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 32px;
    }
    
    .use-case-tag {
      font-family: var(--font-en);
      font-size: 0.8rem;
      letter-spacing: 0.05em;
      color: rgba(255, 255, 255, 0.7);
      padding: 10px 20px;
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 100px;
      background: rgba(255, 255, 255, 0.03);
      transition: all 0.3s ease;
    }
    
    .use-case-tag:hover {
      color: #fff;
      border-color: rgba(255, 255, 255, 0.3);
      background: rgba(255, 255, 255, 0.08);
    }
    
    /* 実績バッジ */
    .stats-badges {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 24px;
    }
    
    .stat-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 8px 16px;
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 100px;
      background: transparent;
      font-size: 0.85rem;
      color: rgba(255, 255, 255, 0.7);
      transition: all 0.3s ease;
    }
    
    .stat-badge:hover {
      border-color: rgba(255, 255, 255, 0.3);
      color: #fff;
    }
    
    .stat-badge-number {
      font-family: var(--font-en);
      font-weight: 700;
      color: #fff;
    }
    
    /* 開発ストーリーリンク */
    .dev-story-link {
      margin-top: 32px;
    }
    
    .dev-story-link a {
      display: inline-flex;
      align-items: center;
      gap: 16px;
      padding: 20px 28px;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.02) 100%);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .dev-story-link a:hover {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.04) 100%);
      border-color: rgba(255, 255, 255, 0.2);
      transform: translateY(-2px);
    }
    
    .dev-story-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    
    .dev-story-icon svg {
      width: 36px;
      height: 36px;
      display: block;
      border-radius: 8px;
      transition: transform 0.3s ease;
    }
    
    .dev-story-link a:hover .dev-story-icon svg {
      transform: scale(1.05);
    }
    
    .dev-story-text {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }
    
    .dev-story-label {
      font-family: var(--font-en);
      font-size: 0.7rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.4);
    }
    
    .dev-story-title {
      font-size: 0.95rem;
      color: rgba(255, 255, 255, 0.85);
      font-weight: 500;
    }
    
    .dev-story-arrow {
      font-family: var(--font-en);
      font-size: 1.2rem;
      color: rgba(255, 255, 255, 0.4);
      transition: all 0.3s ease;
      margin-left: 8px;
    }
    
    .dev-story-link a:hover .dev-story-arrow {
      color: rgba(255, 255, 255, 0.8);
      transform: translateX(4px);
    }
    
    @media (max-width: 600px) {
      .dev-story-link a {
        padding: 16px 20px;
        gap: 12px;
      }
      
      .dev-story-title {
        font-size: 0.85rem;
      }
      
      .dev-story-arrow {
        display: none;
      }
    }
    
    /* ============================================
       ページギャラリーセクション
       ============================================ */
    .page-gallery-section {
      padding: 80px 0;
      margin-bottom: 80px;
      position: relative;
      z-index: 5;
    }
    
    .gallery-intro {
      margin-bottom: 48px;
    }
    
    .gallery-intro p {
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.6);
      line-height: 1.8;
    }
    
    /* ギャラリーカルーセル */
    .page-gallery-carousel-wrapper {
      position: relative;
      margin-bottom: 40px;
    }
    
    .page-gallery-carousel-container {
      position: relative;
      overflow: hidden;
      margin: 0 calc(-50vw + 50%);
      padding: 0 calc(50vw - 50%);
      width: 100vw;
      max-width: 100vw;
    }
    
    .page-gallery-carousel {
      display: flex;
      gap: 32px;
      transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
      cursor: grab;
    }
    
    .page-gallery-item {
      flex: 0 0 420px;
      position: relative;
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
      z-index: 10;
    }
    
    .page-gallery-item:hover {
      transform: translateY(-8px);
      z-index: 11;
    }
    
    /* カルーセルコントロール */
    .page-gallery-controls {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 40px;
    }
    
    .page-gallery-btn {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      border: 1px solid rgba(255, 255, 255, 0.3);
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      color: #fff;
      font-size: 1.2rem;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .page-gallery-btn:hover {
      background: rgba(255, 255, 255, 0.2);
      border-color: rgba(255, 255, 255, 0.5);
      transform: scale(1.1);
    }
    
    .page-gallery-btn:active {
      transform: scale(0.95);
    }
    
    .page-gallery-btn span {
      display: block;
      line-height: 1;
    }
    
    /* ミニブラウザウィンドウ */
    .mini-browser {
      background: #1a1a1a;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 
        0 20px 40px -10px rgba(0, 0, 0, 0.4),
        0 10px 20px -10px rgba(0, 0, 0, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.06);
      transition: all 0.4s ease;
    }
    
    .page-gallery-item:hover .mini-browser {
      border-color: rgba(255, 255, 255, 0.15);
      box-shadow: 
        0 30px 60px -15px rgba(0, 0, 0, 0.5),
        0 15px 30px -15px rgba(0, 0, 0, 0.4);
    }
    
    .mini-browser-header {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 10px 14px;
      background: linear-gradient(180deg, #2a2a2a, #222);
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .mini-browser-dots {
      display: flex;
      gap: 6px;
    }
    
    .mini-browser-dots span {
      width: 8px;
      height: 8px;
      border-radius: 50%;
    }
    
    .mini-browser-dots span:nth-child(1) { background: #ff5f56; }
    .mini-browser-dots span:nth-child(2) { background: #ffbd2e; }
    .mini-browser-dots span:nth-child(3) { background: #27c93f; }
    
    .mini-browser-url {
      flex: 1;
      font-family: var(--font-en);
      font-size: 0.65rem;
      color: rgba(255, 255, 255, 0.4);
      background: rgba(0, 0, 0, 0.3);
      border-radius: 4px;
      padding: 4px 10px;
      margin-left: 8px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    
    .mini-browser-content {
      height: 220px;
      overflow: hidden;
      position: relative;
    }
    
    .mini-browser-content img {
      width: 100%;
      height: auto;
      display: block;
      filter: none;
      transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    }
    
    .page-gallery-item:hover .mini-browser-content img {
      transform: scale(1.05);
    }
    
    /* ページ情報 */
    .page-gallery-info {
      margin-top: 16px;
      opacity: 1;
      transform: translateY(0);
    }
    
    .page-gallery-name {
      font-family: var(--font-en);
      font-size: 0.85rem;
      font-weight: 600;
      color: #fff;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }
    
    .page-gallery-desc {
      font-size: 0.8rem;
      color: rgba(255, 255, 255, 0.5);
      margin-top: 4px;
    }
    
    /* ============================================
       ブラウザウィンドウ風コンテナ（モーダル用）
       ============================================ */
    .browser-window {
      background: #1a1a1a;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 
        0 50px 100px -20px rgba(0, 0, 0, 0.5),
        0 30px 60px -30px rgba(0, 0, 0, 0.6),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .browser-header {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 14px 18px;
      background: linear-gradient(180deg, #2a2a2a, #222);
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .browser-dots {
      display: flex;
      gap: 8px;
    }
    
    .browser-dots span {
      width: 12px;
      height: 12px;
      border-radius: 50%;
    }
    
    .browser-dots span:nth-child(1) { background: #ff5f56; }
    .browser-dots span:nth-child(2) { background: #ffbd2e; }
    .browser-dots span:nth-child(3) { background: #27c93f; }
    
    .browser-url {
      flex: 1;
      display: flex;
      align-items: center;
      gap: 8px;
      font-family: var(--font-en);
      font-size: 0.75rem;
      color: rgba(255, 255, 255, 0.5);
      background: rgba(0, 0, 0, 0.3);
      border-radius: 6px;
      padding: 8px 14px;
      margin-left: 10px;
    }
    
    .browser-url-icon {
      display: flex;
      align-items: center;
    }
    
    .browser-url-icon svg {
      width: 14px;
      height: 14px;
      opacity: 0.5;
    }
    
    .browser-content {
      height: 600px;
      overflow-y: auto;
      overflow-x: hidden;
      position: relative;
      background: #fff;
    }
    
    .browser-content img {
      width: 100%;
      height: auto;
      display: block;
      filter: none;
    }
    
    /* カスタムスクロールバー */
    .browser-content::-webkit-scrollbar {
      width: 8px;
    }
    
    .browser-content::-webkit-scrollbar-track {
      background: rgba(0, 0, 0, 0.1);
    }
    
    .browser-content::-webkit-scrollbar-thumb {
      background: rgba(0, 0, 0, 0.3);
      border-radius: 4px;
    }
    
    .browser-content::-webkit-scrollbar-thumb:hover {
      background: rgba(0, 0, 0, 0.5);
    }
    
    /* ============================================
       モーダル（フルスクリーンプレビュー）
       ============================================ */
    .preview-modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.95);
      z-index: 10000;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      visibility: hidden;
      transition: all 0.4s ease;
      padding: 40px;
    }
    
    .preview-modal.active {
      opacity: 1;
      visibility: visible;
    }
    
    .modal-close {
      position: absolute;
      top: 30px;
      right: 30px;
      width: 48px;
      height: 48px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      background: transparent;
      color: #fff;
      font-size: 1.5rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      z-index: 10001;
    }
    
    .modal-close:hover {
      background: rgba(255, 255, 255, 0.1);
      border-color: rgba(255, 255, 255, 0.4);
      transform: rotate(90deg);
    }
    
    .modal-browser {
      width: 100%;
      max-width: 1200px;
      max-height: calc(100vh - 100px);
      transform: translateY(30px) scale(0.95);
      transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    }
    
    .preview-modal.active .modal-browser {
      transform: translateY(0) scale(1);
    }
    
    .modal-browser .browser-content {
      height: calc(100vh - 200px);
      max-height: 800px;
    }
    
    /* Back Link */
    .back-link {
      margin-top: 60px;
    }
    
    .back-link a {
      font-family: var(--font-en);
      font-size: 0.9rem;
      letter-spacing: 0.05em;
      color: rgba(255, 255, 255, 0.5);
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
    }
    
    .back-link a:hover {
      color: #fff;
    }
    
    .back-link a::before {
      content: '←';
    }
    
    /* レスポンシブ */
    @media (max-width: 968px) {
      .case-hero-inner {
        grid-template-columns: 1fr;
        gap: 40px;
      }
      
      .case-title {
        font-size: 2.2rem;
      }
      
      .comparison-grid {
        grid-template-columns: 1fr;
      }
      
      .features-grid {
        grid-template-columns: 1fr;
      }
      
      .stats-row {
        flex-direction: column;
        gap: 30px;
        align-items: center;
      }
      
      .page-gallery-carousel-container {
        margin: 0;
        padding: 0 20px;
        width: 100%;
        max-width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
      }
      
      .page-gallery-carousel-container::-webkit-scrollbar {
        display: none;
      }
      
      .page-gallery-carousel {
        gap: 20px;
        padding-right: 20px;
      }
      
      .page-gallery-item {
        flex: 0 0 300px;
      }
      
      .page-gallery-btn {
        width: 45px;
        height: 45px;
        font-size: 1rem;
      }
      
      .browser-content {
        height: 450px;
      }
      
      .mini-browser-content {
        height: 180px;
      }
      
      .preview-modal {
        padding: 20px;
      }
      
      .modal-browser .browser-content {
        height: calc(100vh - 160px);
      }
    }
    
    @media (max-width: 600px) {
      .browser-header {
        padding: 10px 14px;
      }
      
      .browser-dots span {
        width: 10px;
        height: 10px;
      }
      
      .browser-url {
        display: none;
      }
      
      .browser-content {
        height: 350px;
      }
    }
  </style>
</head>

<body data-page-title="<?php echo htmlspecialchars($page_title); ?>" data-page-label="<?php echo htmlspecialchars($page_label); ?>">
  <!-- Three.js Canvas for Space Effect -->
  <canvas id="mv-canvas"></canvas>

  <!-- Background Lines Effect -->
  <div class="lines">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>

  <?php outputGTMNoscript(); ?>

  <?php
  // ヘッダーとナビゲーションを読み込み
  include __DIR__ . '/../../templates/header.php';
  include __DIR__ . '/../../templates/nav.php';
  ?>

  <main>
    <div class="inner">
      
      <!-- ヒーローセクション -->
      <section class="case-hero fade-in-up">
        <div class="case-hero-inner">
          <div class="case-hero-image">
            <img src="<?php echo $prefix; ?>img/works/open-gantt.png" alt="Open Gantt LP">
          </div>
          <div class="case-hero-content">
            <span class="case-category">Web Application / Full Development</span>
            <h1 class="case-title">Open Gantt</h1>
            <p class="case-subtitle">AIが瞬時にガントチャートを生成。<br>ログイン不要・完全無料のプロジェクト管理ツール。</p>
            
            <div class="case-meta">
              <div class="case-meta-item">
                <span class="case-meta-label">Type</span>
                自社プロダクト
              </div>
              <div class="case-meta-item">
                <span class="case-meta-label">Release</span>
                2025年12月
              </div>
              <div class="case-meta-item">
                <span class="case-meta-label">Tech</span>
                Next.js / Google Gemini AI
              </div>
              <div class="case-meta-item">
                <span class="case-meta-label">Scope</span>
                企画 / デザイン / 開発
              </div>
            </div>
            
            <a href="https://open-gantt.com/" target="_blank" rel="noopener noreferrer" class="case-link">
              サイトを見る
            </a>
          </div>
        </div>
      </section>

      <!-- プロジェクト概要 -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Overview</h2>
        <div class="case-section-content">
          <p>Open Ganttは、プロジェクトの工程管理をより簡単に、より直感的に行うために開発された無料のガントチャート作成ツールです。本プロジェクトでは、サービスの企画立案からLPデザイン、そして実際に動作するガントチャートシステムまで、すべてをフルスクラッチで開発・構築しました。</p>
          <p>プロジェクトの目的をテキストで入力するだけで、Google Gemini AIがWBS（作業分解構成図）に基づいた階層的なタスク構造、工数見積もり、適切な先行・後続関係までを自動で構築します。</p>
          <p>作成したガントチャートはURLとして発行され、サーバーへの保存は一切不要。受け取った相手は、ログインすることなく即座に閲覧可能です。</p>
        </div>
        
        <div class="stats-badges">
          <span class="stat-badge"><span class="stat-badge-number">1,900+</span> 共有実績</span>
          <span class="stat-badge"><span class="stat-badge-number">0円</span> 完全無料</span>
          <span class="stat-badge"><span class="stat-badge-number">0秒</span> 登録不要</span>
        </div>
        
        <div class="dev-story-link">
          <a href="https://note.com/satoru666/n/n2b6ff803353c" target="_blank" rel="noopener noreferrer">
            <span class="dev-story-icon">
              <svg width="36" height="36" viewBox="0 0 493 493" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="1" y="1" width="490.2" height="490.2" rx="104" fill="white"/>
                <path d="M139.2 141.7C180.4 141.7 236.8 139.6 277.3 140.7C331.6 142.1 352.1 165.8 352.8 224.2C353.5 257.3 352.8 351.9 352.8 351.9H294C294 269.1 294.3 255.4 294 229.3C293.3 206.3 286.8 195.4 269.1 193.3C250.4 191.2 198 193 198 193V352H139.2V141.7Z" fill="#040000"/>
                <rect x="1" y="1" width="490.2" height="490.2" rx="104" stroke="#EBEBEB" stroke-width="2"/>
              </svg>
            </span>
            <span class="dev-story-text">
              <span class="dev-story-label">Development Story</span>
              <span class="dev-story-title">Open Ganttの開発ヒストリーをnoteで公開中</span>
            </span>
            <span class="dev-story-arrow">→</span>
          </a>
        </div>
      </section>

      <!-- ページギャラリーセクション -->
      <section class="page-gallery-section fade-in-up">
        <h2 class="case-section-title">Page Gallery</h2>
        <div class="gallery-intro">
          <p>LP・システム画面のデザインをご覧いただけます。クリックすると拡大表示されます。</p>
        </div>
        
        <div class="page-gallery-carousel-wrapper">
          <div class="page-gallery-carousel-container">
            <div class="page-gallery-carousel" id="pageGalleryCarousel">
              <div class="page-gallery-item" data-page="lp" role="button" tabindex="0" aria-label="Landing Pageを拡大表示">
                <div class="mini-browser">
                  <div class="mini-browser-header">
                    <div class="mini-browser-dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div class="mini-browser-url">open-gantt.com</div>
                  </div>
                  <div class="mini-browser-content">
                    <img src="<?php echo $prefix; ?>img/works/open-gantt-preview/open-gantt.png" alt="Open Gantt LP">
                  </div>
                </div>
                <div class="page-gallery-info">
                  <span class="page-gallery-name">Landing Page</span>
                  <p class="page-gallery-desc">サービス紹介ページ</p>
                </div>
              </div>
              
              <div class="page-gallery-item" data-page="system" role="button" tabindex="0" aria-label="System UIを拡大表示">
                <div class="mini-browser">
                  <div class="mini-browser-header">
                    <div class="mini-browser-dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div class="mini-browser-url">open-gantt.com/app</div>
                  </div>
                  <div class="mini-browser-content">
                    <img src="<?php echo $prefix; ?>img/works/open-gantt-preview/open-gantt-sys.png" alt="Open Gantt システム画面">
                  </div>
                </div>
                <div class="page-gallery-info">
                  <span class="page-gallery-name">System UI</span>
                  <p class="page-gallery-desc">ガントチャート作成画面</p>
                </div>
              </div>
            </div>
          </div>
          <div class="page-gallery-controls">
            <button class="page-gallery-btn page-gallery-prev" aria-label="前へ">
              <span>←</span>
            </button>
            <button class="page-gallery-btn page-gallery-next" aria-label="次へ">
              <span>→</span>
            </button>
          </div>
        </div>
      </section>

      <!-- モーダル（フルスクリーンプレビュー） -->
      <div class="preview-modal" id="previewModal">
        <button class="modal-close" id="modalClose">×</button>
        <div class="modal-browser browser-window">
          <div class="browser-header">
            <div class="browser-dots">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="browser-url">
              <span class="browser-url-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
              </span>
              <span class="browser-url-text" id="modalUrl">https://open-gantt.com/</span>
            </div>
          </div>
          <div class="browser-content">
            <img src="" alt="" id="modalImage">
          </div>
        </div>
      </div>

      <!-- 開発範囲 -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Development Scope</h2>
        <div class="case-section-content">
          <p>本プロジェクトでは、サービスの企画段階から公開まで、以下のすべての工程を一貫して担当しました。</p>
        </div>
        
        <div class="features-grid">
          <div class="feature-card">
            <div class="feature-icon">Scope 01</div>
            <h3 class="feature-title">サービス企画・設計</h3>
            <p class="feature-desc">市場調査から競合分析、ターゲットユーザーの特定、機能要件の策定まで、サービスの根幹となる企画設計を実施。「ログイン不要」「完全無料」「URL共有」というコアコンセプトを確立しました。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Scope 02</div>
            <h3 class="feature-title">LP・UIデザイン</h3>
            <p class="feature-desc">サービスの価値を伝えるランディングページのデザインから、実際のアプリケーションのUI/UXデザインまでを担当。ダークテーマを基調とした現代的なビジュアルと、直感的な操作性を両立させました。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Scope 03</div>
            <h3 class="feature-title">フロントエンド開発</h3>
            <p class="feature-desc">Next.js（React）を使用したSPA開発。ガントチャートのドラッグ操作、リアルタイムプレビュー、レスポンシブ対応など、複雑なインタラクションを実装。パフォーマンスを最適化し、スムーズな操作感を実現しました。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Scope 04</div>
            <h3 class="feature-title">AI連携・バックエンド</h3>
            <p class="feature-desc">Google Gemini AIとの連携によるWBS自動生成機能を実装。プロンプトエンジニアリングにより、様々な業界・用途に対応した高品質なタスク構造を生成。URLエンコーディングによるステートレスアーキテクチャも設計・実装しました。</p>
          </div>
        </div>
      </section>

      <!-- 課題と解決 -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Problem & Solution</h2>
        <div class="case-section-content">
          <p>従来のガントチャート作成には多くの課題がありました。Open Ganttはこれらを根本から解決します。</p>
        </div>
        
        <div class="comparison-grid">
          <div class="comparison-card problem">
            <h3 class="comparison-card-title">The Old Way - Excel Hell</h3>
            <ul>
              <li>セルの色塗りに費やす無駄な時間</li>
              <li>単純な表を作るための複雑な設定</li>
              <li>スマホでの共有・閲覧が困難</li>
              <li>アカウント登録や契約が必要</li>
              <li>チームメンバー全員にライセンスが必要</li>
            </ul>
          </div>
          
          <div class="comparison-card solution">
            <h3 class="comparison-card-title">The Open Gantt Way</h3>
            <ul>
              <li>AIが構造を一瞬で自動生成</li>
              <li>セットアップ不要、URLを開くだけ</li>
              <li>モバイルに最適化された表示</li>
              <li>ログイン不要、完全無料</li>
              <li>URLを共有するだけで誰でも閲覧可能</li>
            </ul>
          </div>
        </div>
      </section>

      <!-- 主な機能 -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Key Features</h2>
        
        <div class="features-grid">
          <div class="feature-card">
            <div class="feature-icon">Feature 01</div>
            <h3 class="feature-title">AIによるWBS生成</h3>
            <p class="feature-desc">単なるリスト生成ではありません。Google Gemini AIがプロジェクトの目的を解析し、WBS（作業分解構成図）に基づいた階層的なタスク構造、工数見積もり、そして適切な先行・後続関係までを自動で構築します。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Feature 02</div>
            <h3 class="feature-title">URLで即共有（STATELESS）</h3>
            <p class="feature-desc">サーバーデータベースへの保存は不要です。プロジェクトの全データ（タスク、依存関係、進捗）を圧縮し、一つの長いURLにエンコードして発行します。受け取った相手は、ログインすることなく即座に閲覧可能です。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Feature 03</div>
            <h3 class="feature-title">モバイル最適化</h3>
            <p class="feature-desc">スマートフォンやタブレットでも快適に閲覧できるレスポンシブデザイン。現場で最新のスケジュールを確認・共有するのに最適です。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Feature 04</div>
            <h3 class="feature-title">Excel・画像出力</h3>
            <p class="feature-desc">作成したガントチャートはExcelファイルや画像として出力可能。既存のワークフローにも簡単に組み込めます。</p>
          </div>
        </div>
      </section>

      <!-- 技術スタック -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Tech Stack</h2>
        <div class="case-section-content">
          <p>本プロジェクトで採用した技術スタックは以下の通りです。モダンなWeb技術を活用し、高いパフォーマンスと開発効率を両立しています。</p>
        </div>
        
        <div class="use-cases-list">
          <span class="use-case-tag">Next.js 14</span>
          <span class="use-case-tag">React 18</span>
          <span class="use-case-tag">TypeScript</span>
          <span class="use-case-tag">Tailwind CSS</span>
          <span class="use-case-tag">Google Gemini AI</span>
          <span class="use-case-tag">Vercel</span>
          <span class="use-case-tag">pako（圧縮）</span>
          <span class="use-case-tag">date-fns</span>
          <span class="use-case-tag">html2canvas</span>
          <span class="use-case-tag">ExcelJS</span>
        </div>
      </section>

      <!-- 活用事例 -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Use Cases</h2>
        <div class="case-section-content">
          <p>Open Ganttは様々な業界・シーンで活用されています。リリースから短期間で1,900件以上のガントチャートが共有され、ビジネスからプライベートまで幅広い用途で利用されています。</p>
        </div>
        
        <div class="use-cases-list">
          <span class="use-case-tag">システム開発</span>
          <span class="use-case-tag">アパレル製造業</span>
          <span class="use-case-tag">化粧品製造業</span>
          <span class="use-case-tag">工事・施工管理</span>
          <span class="use-case-tag">マーケティング設計</span>
          <span class="use-case-tag">Web広告配信</span>
          <span class="use-case-tag">展示会・イベント運営</span>
          <span class="use-case-tag">結婚式準備</span>
          <span class="use-case-tag">引越し計画</span>
          <span class="use-case-tag">資格試験学習</span>
        </div>
      </section>

      <!-- CTA -->
      <?php include($prefix . 'templates/cta.php'); ?>

      <!-- 戻るリンク -->
      <div class="back-link fade-in-up">
        <a href="<?php echo $prefix; ?>works/">制作事例一覧に戻る</a>
      </div>

    </div>
  </main>

  <?php
  // パンくずリストを読み込み
  $breadcrumb = [
      ['name' => '制作実績', 'url' => $prefix . 'works/'],
      ['name' => 'Open Gantt', 'url' => '']
  ];
  include __DIR__ . '/../../templates/breadcrumb.php';
  ?>

  <?php
  // フッターを読み込み
  include __DIR__ . '/../../templates/footer.php';
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" defer></script>
  <script src="<?php echo $prefix; ?>js/mv-three.js" defer></script>
  <script src="<?php echo $prefix; ?>js/common.js" defer></script>
  
  <script>
    // ページプレビュー機能
    document.addEventListener('DOMContentLoaded', function() {
      // カルーセル機能
      const carousel = document.getElementById('pageGalleryCarousel');
      if (carousel) {
        const items = carousel.querySelectorAll('.page-gallery-item');
        const itemCount = items.length;
        const prevBtn = document.querySelector('.page-gallery-prev');
        const nextBtn = document.querySelector('.page-gallery-next');
        
        let currentIndex = 0;
        let itemWidth = 420;
        let gap = 32;
        let isDragging = false;
        let startX;
        let scrollLeft;
        
        function updateItemWidth() {
          if (window.innerWidth <= 768) {
            itemWidth = 300;
            gap = 20;
          } else {
            itemWidth = 420;
            gap = 32;
          }
        }
        
        updateItemWidth();
        window.addEventListener('resize', function() {
          updateItemWidth();
          updateCarousel();
        });
        
        function updateCarousel() {
          const translateX = -(currentIndex * (itemWidth + gap));
          carousel.style.transform = 'translateX(' + translateX + 'px)';
        }
        
        if (prevBtn) {
          prevBtn.addEventListener('click', function() {
            if (currentIndex > 0) {
              currentIndex--;
              updateCarousel();
            }
          });
        }
        
        if (nextBtn) {
          nextBtn.addEventListener('click', function() {
            if (currentIndex < itemCount - 1) {
              currentIndex++;
              updateCarousel();
            }
          });
        }
        
        carousel.addEventListener('mousedown', function(e) {
          isDragging = true;
          startX = e.pageX - carousel.offsetLeft;
          scrollLeft = currentIndex * (itemWidth + gap);
          carousel.style.cursor = 'grabbing';
        });
        
        carousel.addEventListener('mouseleave', function() {
          isDragging = false;
          carousel.style.cursor = 'grab';
        });
        
        carousel.addEventListener('mouseup', function() {
          isDragging = false;
          carousel.style.cursor = 'grab';
        });
        
        carousel.addEventListener('mousemove', function(e) {
          if (!isDragging) return;
          e.preventDefault();
          const x = e.pageX - carousel.offsetLeft;
          const walk = (x - startX) * 2;
          const newTranslateX = -scrollLeft + walk;
          carousel.style.transform = 'translateX(' + newTranslateX + 'px)';
        });
        
        carousel.addEventListener('touchstart', function(e) {
          isDragging = true;
          startX = e.touches[0].pageX - carousel.offsetLeft;
          scrollLeft = currentIndex * (itemWidth + gap);
        });
        
        carousel.addEventListener('touchmove', function(e) {
          if (!isDragging) return;
          const x = e.touches[0].pageX - carousel.offsetLeft;
          const walk = (x - startX) * 2;
          const newTranslateX = -scrollLeft + walk;
          carousel.style.transform = 'translateX(' + newTranslateX + 'px)';
        });
        
        carousel.addEventListener('touchend', function(e) {
          isDragging = false;
          const endX = e.changedTouches[0].pageX - carousel.offsetLeft;
          const diff = startX - endX;
          
          if (diff > 50 && currentIndex < itemCount - 1) {
            currentIndex++;
          } else if (diff < -50 && currentIndex > 0) {
            currentIndex--;
          }
          updateCarousel();
        });
        
        updateCarousel();
        carousel.style.cursor = 'grab';
      }
      
      // モーダル機能
      const modal = document.getElementById('previewModal');
      const modalClose = document.getElementById('modalClose');
      const modalImage = document.getElementById('modalImage');
      const modalUrl = document.getElementById('modalUrl');
      const galleryItems = document.querySelectorAll('.page-gallery-item');
      
      // ページ情報のマッピング
      const pageData = {
        'lp': {
          url: 'https://open-gantt.com/',
          image: '<?php echo $prefix; ?>img/works/open-gantt-preview/open-gantt.png',
          alt: 'Open Gantt Landing Page'
        },
        'system': {
          url: 'https://open-gantt.com/app',
          image: '<?php echo $prefix; ?>img/works/open-gantt-preview/open-gantt-sys.png',
          alt: 'Open Gantt System UI'
        }
      };
      
      // ギャラリーアイテムを開く関数
      function openGalleryItem(item) {
        const page = item.getAttribute('data-page');
        const data = pageData[page];
        
        if (data) {
          modalUrl.textContent = data.url;
          modalImage.src = data.image;
          modalImage.alt = data.alt;
          modal.classList.add('active');
          document.body.style.overflow = 'hidden';
        }
      }
      
      // ギャラリーアイテムのクリックイベント
      galleryItems.forEach(function(item) {
        item.addEventListener('click', function() {
          openGalleryItem(this);
        });
        
        // キーボードサポート（EnterとSpaceキー）
        item.addEventListener('keydown', function(e) {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            openGalleryItem(this);
          }
        });
      });
      
      // モーダルを閉じる
      function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
      }
      
      if (modalClose) {
        modalClose.addEventListener('click', closeModal);
      }
      
      // モーダル外クリックで閉じる
      if (modal) {
        modal.addEventListener('click', function(e) {
          if (e.target === modal) {
            closeModal();
          }
        });
      }
      
      // ESCキーで閉じる
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && modal.classList.contains('active')) {
          closeModal();
        }
      });
    });
  </script>
</body>
</html>


