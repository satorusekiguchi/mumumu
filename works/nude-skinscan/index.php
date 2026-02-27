<?php
require_once __DIR__ . '/../../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'nuːd SkinScan AI';
$page_label = '制作事例';
setPageMeta(
    'nuːd SkinScan AI｜肌診断AIシステム【制作実績】｜株式会社mumumu',
    'nuːd様の肌診断AIシステム「SkinScan AI」の制作事例。サイトデザインから肌診断AIシステムまで全てを構築。最新の皮膚科学とマルチステージ推論AIにより、顔の7つのエリアを自動分割して精密解析する革新的なスキンケア診断システム。',
    $page_title,
    $page_label,
    [
        'keywords' => 'nuːd,SkinScan,肌診断,AI,スキンケア,診断システム,制作実績',
        'type' => 'article',
        'image' => SITE_URL . '/img/works/nude-skinscan.png'
    ]
);
$breadcrumb_schema = [
    ['name' => '制作実績', 'url' => 'works/'],
    ['name' => 'nuːd SkinScan AI', 'url' => 'works/nude-skinscan/']
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
  <?php outputOrganizationSchema(); outputBreadcrumbSchema($breadcrumb_schema); ?>
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
      font-size: 2.5rem;
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
    
    /* タグリスト */
    .tags-list {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 32px;
    }
    
    .tag-item {
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
    
    .tag-item:hover {
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
    
    .page-gallery-item:hover .mini-browser {
      box-shadow: 
        0 30px 60px -15px rgba(0, 0, 0, 0.4),
        0 0 0 1px rgba(255, 255, 255, 0.12);
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
        0 10px 40px -10px rgba(0, 0, 0, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.08);
      transition: all 0.4s ease;
    }
    
    .mini-browser-header {
      height: 36px;
      background: linear-gradient(180deg, #3d3d3d 0%, #2a2a2a 100%);
      display: flex;
      align-items: center;
      padding: 0 12px;
      gap: 12px;
    }
    
    .mini-browser-dots {
      display: flex;
      gap: 6px;
    }
    
    .mini-browser-dots span {
      width: 10px;
      height: 10px;
      border-radius: 50%;
    }
    
    .mini-browser-dots span:nth-child(1) { background: #ff5f57; }
    .mini-browser-dots span:nth-child(2) { background: #febc2e; }
    .mini-browser-dots span:nth-child(3) { background: #28c840; }
    
    .mini-browser-url {
      flex: 1;
      font-family: var(--font-en);
      font-size: 0.7rem;
      color: rgba(255, 255, 255, 0.4);
      background: rgba(0, 0, 0, 0.3);
      padding: 4px 10px;
      border-radius: 4px;
      text-align: center;
    }
    
    .mini-browser-content {
      aspect-ratio: 16 / 10;
      overflow: hidden;
      background: #000;
    }
    
    .mini-browser-content img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: top;
      transition: transform 0.6s ease;
    }
    
    .page-gallery-item:hover .mini-browser-content img {
      transform: scale(1.02);
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
      letter-spacing: 0.05em;
      text-transform: uppercase;
      color: #fff;
      display: block;
      margin-bottom: 4px;
    }
    
    .page-gallery-desc {
      font-size: 0.85rem;
      color: rgba(255, 255, 255, 0.5);
      margin: 0;
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
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 10001;
    }
    
    .modal-close:hover {
      background: rgba(255, 255, 255, 0.1);
      border-color: rgba(255, 255, 255, 0.4);
      transform: rotate(90deg);
    }
    
    .modal-browser {
      width: 90%;
      max-width: 1000px;
      max-height: 85vh;
      background: #1a1a1a;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 
        0 50px 100px -20px rgba(0, 0, 0, 0.5),
        0 30px 60px -30px rgba(0, 0, 0, 0.6);
      transform: scale(0.9) translateY(20px);
      transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    }
    
    .preview-modal.active .modal-browser {
      transform: scale(1) translateY(0);
    }
    
    /* ブラウザウィンドウスタイル */
    .browser-window {
      background: #1a1a1a;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 
        0 50px 100px -20px rgba(0, 0, 0, 0.5),
        0 30px 60px -30px rgba(0, 0, 0, 0.6),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.08);
      position: relative;
    }
    
    .browser-header {
      height: 48px;
      background: linear-gradient(180deg, #3d3d3d 0%, #2a2a2a 100%);
      display: flex;
      align-items: center;
      padding: 0 16px;
      gap: 16px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.3);
    }
    
    .browser-dots {
      display: flex;
      gap: 8px;
    }
    
    .browser-dots span {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      transition: all 0.2s ease;
    }
    
    .browser-dots span:nth-child(1) { background: #ff5f57; }
    .browser-dots span:nth-child(2) { background: #febc2e; }
    .browser-dots span:nth-child(3) { background: #28c840; }
    
    .browser-url {
      flex: 1;
      display: flex;
      align-items: center;
      gap: 8px;
      background: rgba(0, 0, 0, 0.3);
      padding: 8px 14px;
      border-radius: 6px;
      font-family: var(--font-en);
      font-size: 0.85rem;
      color: rgba(255, 255, 255, 0.6);
    }
    
    .browser-url-icon svg {
      width: 14px;
      height: 14px;
      opacity: 0.5;
    }
    
    .browser-content {
      height: calc(85vh - 48px);
      max-height: 700px;
      overflow-y: auto;
      background: #fff;
    }
    
    .browser-content::-webkit-scrollbar {
      width: 10px;
    }
    
    .browser-content::-webkit-scrollbar-track {
      background: rgba(0, 0, 0, 0.1);
    }
    
    .browser-content::-webkit-scrollbar-thumb {
      background: rgba(0, 0, 0, 0.3);
      border-radius: 5px;
    }
    
    .browser-content::-webkit-scrollbar-thumb:hover {
      background: rgba(0, 0, 0, 0.5);
    }
    
    .browser-content img {
      width: 100%;
      height: auto;
      display: block;
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
        font-size: 2rem;
      }
      
      .features-grid {
        grid-template-columns: 1fr;
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
      
      .preview-modal {
        padding: 20px;
      }
      
      .modal-close {
        top: 15px;
        right: 15px;
        width: 40px;
        height: 40px;
      }
      
      .modal-browser {
        width: 100%;
        max-height: 80vh;
      }
      
      .browser-content {
        height: calc(80vh - 48px);
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
            <img src="<?php echo $prefix; ?>img/works/nude-skinscan.png" alt="nuːd SkinScan AI">
          </div>
          <div class="case-hero-content">
            <span class="case-category">AI System / Full Development</span>
            <h1 class="case-title">nuːd SkinScan AI</h1>
            <p class="case-subtitle">最新の皮膚科学とAIが融合。<br>あなたの肌を7つのエリアで精密解析。</p>
            
            <div class="case-meta">
              <div class="case-meta-item">
                <span class="case-meta-label">Client</span>
                nuːd様
              </div>
              <div class="case-meta-item">
                <span class="case-meta-label">Release</span>
                2025年10月
              </div>
              <div class="case-meta-item">
                <span class="case-meta-label">Tech</span>
                Python / Google Cloud Run
              </div>
              <div class="case-meta-item">
                <span class="case-meta-label">Scope</span>
                デザイン / AI開発 / システム構築
              </div>
            </div>
            
            <a href="https://app.nudeskincare.jp/" target="_blank" rel="noopener noreferrer" class="case-link">
              サイトを見る
            </a>
          </div>
        </div>
      </section>

      <!-- プロジェクト概要 -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Overview</h2>
        <div class="case-section-content">
          <p>nuːd SkinScan AIは、スキンケアブランド「nuːd」のために開発した革新的な肌診断AIシステムです。本プロジェクトでは、サイトデザインからAI診断システムの開発・構築まで、すべてを一貫して担当しました。</p>
          <p>従来の肌診断は主観的な評価や単純なアンケートに頼っていましたが、本システムでは最新の皮膚科学の知見とマルチステージ推論AIを組み合わせることで、科学的根拠に基づいた精密な肌解析を実現しています。</p>
          <p>ユーザーがスマートフォンで撮影した顔写真をアップロードするだけで、AIが顔を7つのエリアに自動分割し、各エリアの肌状態を詳細に分析。パーソナライズされたスキンケアアドバイスを提供します。</p>
        </div>
        
        <div class="stats-badges">
          <span class="stat-badge"><span class="stat-badge-number">7</span> エリア分割解析</span>
          <span class="stat-badge"><span class="stat-badge-number">AI</span> マルチステージ推論</span>
          <span class="stat-badge"><span class="stat-badge-number">30秒</span> 診断完了</span>
        </div>
        
        <div class="dev-story-link">
          <a href="https://note.com/satoru666/n/n08e754f7313e" target="_blank" rel="noopener noreferrer">
            <span class="dev-story-icon">
              <svg width="36" height="36" viewBox="0 0 493 493" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="1" y="1" width="490.2" height="490.2" rx="104" fill="white"/>
                <path d="M139.2 141.7C180.4 141.7 236.8 139.6 277.3 140.7C331.6 142.1 352.1 165.8 352.8 224.2C353.5 257.3 352.8 351.9 352.8 351.9H294C294 269.1 294.3 255.4 294 229.3C293.3 206.3 286.8 195.4 269.1 193.3C250.4 191.2 198 193 198 193V352H139.2V141.7Z" fill="#040000"/>
                <rect x="1" y="1" width="490.2" height="490.2" rx="104" stroke="#EBEBEB" stroke-width="2"/>
              </svg>
            </span>
            <span class="dev-story-text">
              <span class="dev-story-label">Development Story</span>
              <span class="dev-story-title">nuːd SkinScan AIの開発ヒストリーをnoteで公開中</span>
            </span>
            <span class="dev-story-arrow">→</span>
          </a>
        </div>
      </section>

      <!-- 開発範囲 -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Development Scope</h2>
        <div class="case-section-content">
          <p>本プロジェクトでは、サービスの企画段階からシステム公開まで、以下のすべての工程を担当しました。</p>
        </div>
        
        <div class="features-grid">
          <div class="feature-card">
            <div class="feature-icon">Scope 01</div>
            <h3 class="feature-title">UI/UXデザイン</h3>
            <p class="feature-desc">ブランドの世界観を反映したミニマルで洗練されたインターフェースをデザイン。診断プロセスをシンプルかつ直感的にし、ユーザーが迷わず操作できるよう設計しました。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Scope 02</div>
            <h3 class="feature-title">AI診断システム開発</h3>
            <p class="feature-desc">顔認識・エリア分割・肌状態解析を行うAIシステムを開発。マルチステージ推論により、シミ・シワ・毛穴・肌トーンなど複数の指標を同時に評価します。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Scope 03</div>
            <h3 class="feature-title">クラウドインフラ構築</h3>
            <p class="feature-desc">Google Cloud Runを活用したスケーラブルなサーバーレスアーキテクチャを構築。トラフィックの変動に自動対応し、コスト効率の高い運用を実現しています。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Scope 04</div>
            <h3 class="feature-title">レコメンドエンジン</h3>
            <p class="feature-desc">診断結果に基づいて最適なスキンケア製品を提案するレコメンドエンジンを実装。ユーザーの肌悩みに合わせたパーソナライズされた商品提案を実現しました。</p>
          </div>
        </div>
      </section>

      <!-- 主な機能 -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Key Features</h2>
        
        <div class="features-grid">
          <div class="feature-card">
            <div class="feature-icon">Feature 01</div>
            <h3 class="feature-title">7エリア自動分割</h3>
            <p class="feature-desc">顔を額・目元・頬・鼻・口元・あご・フェイスラインの7つのエリアに自動分割。各エリアの特性に合わせた詳細な解析を行います。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Feature 02</div>
            <h3 class="feature-title">マルチステージ推論AI</h3>
            <p class="feature-desc">複数のAIモデルを段階的に適用するマルチステージ推論により、高精度な肌状態の判定を実現。皮膚科学の知見を学習したモデルが科学的な解析を行います。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Feature 03</div>
            <h3 class="feature-title">リアルタイム解析</h3>
            <p class="feature-desc">写真アップロードから診断結果表示まで約30秒で完了。ユーザーを待たせない高速な処理を実現しています。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Feature 04</div>
            <h3 class="feature-title">パーソナライズ提案</h3>
            <p class="feature-desc">診断結果に基づいて、ユーザーの肌悩みに最適なスキンケアルーティンと製品を提案。継続的なケアをサポートします。</p>
          </div>
        </div>
      </section>

      <!-- ページギャラリーセクション -->
      <section class="page-gallery-section fade-in-up">
        <h2 class="case-section-title">Page Gallery</h2>
        <div class="gallery-intro">
          <p>サービス画面のデザインをご覧いただけます。クリックすると拡大表示されます。</p>
        </div>
        
        <div class="page-gallery-carousel-wrapper">
          <div class="page-gallery-carousel-container">
            <div class="page-gallery-carousel" id="pageGalleryCarousel">
              <div class="page-gallery-item" data-page="top" role="button" tabindex="0" aria-label="TOP Pageを拡大表示">
                <div class="mini-browser">
                  <div class="mini-browser-header">
                    <div class="mini-browser-dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div class="mini-browser-url">app.nudeskincare.jp</div>
                  </div>
                  <div class="mini-browser-content">
                    <img src="<?php echo $prefix; ?>img/works/nude-preview/nude-top.png" alt="nuːd SkinScan AI TOPページ">
                  </div>
                </div>
                <div class="page-gallery-info">
                  <span class="page-gallery-name">TOP Page</span>
                  <p class="page-gallery-desc">サービス紹介・トップページ</p>
                </div>
              </div>
              
              <div class="page-gallery-item" data-page="how" role="button" tabindex="0" aria-label="How to Useを拡大表示">
                <div class="mini-browser">
                  <div class="mini-browser-header">
                    <div class="mini-browser-dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div class="mini-browser-url">app.nudeskincare.jp/how</div>
                  </div>
                  <div class="mini-browser-content">
                    <img src="<?php echo $prefix; ?>img/works/nude-preview/nude-how.png" alt="nuːd SkinScan AI 使い方">
                  </div>
                </div>
                <div class="page-gallery-info">
                  <span class="page-gallery-name">How to Use</span>
                  <p class="page-gallery-desc">診断の流れ・使い方説明</p>
                </div>
              </div>
              
              <div class="page-gallery-item" data-page="analyze" role="button" tabindex="0" aria-label="AI Analysisを拡大表示">
                <div class="mini-browser">
                  <div class="mini-browser-header">
                    <div class="mini-browser-dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div class="mini-browser-url">app.nudeskincare.jp/analyze</div>
                  </div>
                  <div class="mini-browser-content">
                    <img src="<?php echo $prefix; ?>img/works/nude-preview/nude-analyze.png" alt="nuːd SkinScan AI 解析画面">
                  </div>
                </div>
                <div class="page-gallery-info">
                  <span class="page-gallery-name">AI Analysis</span>
                  <p class="page-gallery-desc">AIによる肌解析画面</p>
                </div>
              </div>
              
              <div class="page-gallery-item" data-page="result1" role="button" tabindex="0" aria-label="診断結果1を拡大表示">
                <div class="mini-browser">
                  <div class="mini-browser-header">
                    <div class="mini-browser-dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div class="mini-browser-url">app.nudeskincare.jp/result</div>
                  </div>
                  <div class="mini-browser-content">
                    <img src="<?php echo $prefix; ?>img/works/nude-preview/nude-answer01.png" alt="nuːd SkinScan AI 診断結果1">
                  </div>
                </div>
                <div class="page-gallery-info">
                  <span class="page-gallery-name">Result Page 1</span>
                  <p class="page-gallery-desc">診断結果・スコア表示</p>
                </div>
              </div>
              
              <div class="page-gallery-item" data-page="result2" role="button" tabindex="0" aria-label="診断結果2を拡大表示">
                <div class="mini-browser">
                  <div class="mini-browser-header">
                    <div class="mini-browser-dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div class="mini-browser-url">app.nudeskincare.jp/result</div>
                  </div>
                  <div class="mini-browser-content">
                    <img src="<?php echo $prefix; ?>img/works/nude-preview/nude-answer02.png" alt="nuːd SkinScan AI 診断結果2">
                  </div>
                </div>
                <div class="page-gallery-info">
                  <span class="page-gallery-name">Result Page 2</span>
                  <p class="page-gallery-desc">詳細分析・レコメンド</p>
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
      
      <!-- モーダル -->
      <div class="preview-modal" id="previewModal">
        <button class="modal-close" id="modalClose" aria-label="閉じる">×</button>
        <div class="modal-browser">
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
              <span id="modalUrl">app.nudeskincare.jp</span>
            </div>
          </div>
          <div class="browser-content" id="modalContent">
            <img src="" alt="" id="modalImage">
          </div>
        </div>
      </div>

      <!-- 技術スタック -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Tech Stack</h2>
        <div class="case-section-content">
          <p>本プロジェクトで採用した技術スタックです。AIとクラウドインフラを組み合わせ、高精度かつスケーラブルなシステムを構築しています。</p>
        </div>
        
        <div class="tags-list">
          <span class="tag-item">Python</span>
          <span class="tag-item">Flask</span>
          <span class="tag-item">OpenCV</span>
          <span class="tag-item">TensorFlow</span>
          <span class="tag-item">Google Cloud Run</span>
          <span class="tag-item">Cloud Storage</span>
          <span class="tag-item">Docker</span>
          <span class="tag-item">Vertex AI</span>
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
      ['name' => 'nuːd SkinScan AI', 'url' => '']
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
        const container = carousel.parentElement;
        const prevBtn = document.querySelector('.page-gallery-prev');
        const nextBtn = document.querySelector('.page-gallery-next');
        
        let currentIndex = 0;
        let itemWidth = 420;
        let gap = 32;
        let isDragging = false;
        let startX;
        let scrollLeft;
        
        // レスポンシブ対応
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
        
        // 前へボタン
        if (prevBtn) {
          prevBtn.addEventListener('click', function() {
            if (currentIndex > 0) {
              currentIndex--;
              updateCarousel();
            }
          });
        }
        
        // 次へボタン
        if (nextBtn) {
          nextBtn.addEventListener('click', function() {
            if (currentIndex < itemCount - 1) {
              currentIndex++;
              updateCarousel();
            }
          });
        }
        
        // ドラッグ操作
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
        
        // タッチ操作
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
        
        // 初期表示
        updateCarousel();
        carousel.style.cursor = 'grab';
      }
      
      // モーダル機能
      const modal = document.getElementById('previewModal');
      const modalClose = document.getElementById('modalClose');
      const modalUrl = document.getElementById('modalUrl');
      const modalImage = document.getElementById('modalImage');
      const galleryItems = document.querySelectorAll('.page-gallery-item');
      
      // ページ情報のマッピング
      const pageData = {
        'top': {
          url: 'https://app.nudeskincare.jp/',
          image: '<?php echo $prefix; ?>img/works/nude-preview/nude-top.png',
          alt: 'nuːd SkinScan AI TOPページ'
        },
        'how': {
          url: 'https://app.nudeskincare.jp/how',
          image: '<?php echo $prefix; ?>img/works/nude-preview/nude-how.png',
          alt: 'nuːd SkinScan AI 使い方'
        },
        'analyze': {
          url: 'https://app.nudeskincare.jp/analyze',
          image: '<?php echo $prefix; ?>img/works/nude-preview/nude-analyze.png',
          alt: 'nuːd SkinScan AI 解析画面'
        },
        'result1': {
          url: 'https://app.nudeskincare.jp/result',
          image: '<?php echo $prefix; ?>img/works/nude-preview/nude-answer01.png',
          alt: 'nuːd SkinScan AI 診断結果1'
        },
        'result2': {
          url: 'https://app.nudeskincare.jp/result',
          image: '<?php echo $prefix; ?>img/works/nude-preview/nude-answer02.png',
          alt: 'nuːd SkinScan AI 診断結果2'
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
      
      // ギャラリーアイテムのクリック・キーボードイベント
      galleryItems.forEach(function(item) {
        item.addEventListener('click', function() {
          openGalleryItem(this);
        });
        
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
      
      modalClose.addEventListener('click', closeModal);
      
      modal.addEventListener('click', function(e) {
        if (e.target === modal) {
          closeModal();
        }
      });
      
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
          closeModal();
        }
      });
    });
  </script>
</body>
</html>

