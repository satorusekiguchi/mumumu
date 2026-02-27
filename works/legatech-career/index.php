<?php
require_once __DIR__ . '/../../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'LEGATECH CAREER';
$page_label = '制作事例';
setPageMeta(
    'レガテックキャリア｜建設業界向け転職LP【制作実績】｜株式会社mumumu',
    'レガテックキャリア様のFacebook用ショートLP制作事例。デザイン、構築、自社CMSからの求人情報取得と診断システムを担当。建設・施工管理者向けの転職支援サービスのランディングページを制作。',
    $page_title,
    $page_label,
    [
        'keywords' => 'レガテックキャリア,転職,建設業界,LP制作,Facebook広告,制作実績',
        'type' => 'article',
        'image' => SITE_URL . '/img/works/legatech-career.png'
    ]
);
$breadcrumb_schema = [
    ['name' => '制作実績', 'url' => 'works/'],
    ['name' => 'LEGATECH CAREER', 'url' => 'works/legatech-career/']
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
      font-size: 2.2rem;
      line-height: 1.3;
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
    
    /* ページギャラリーセクション */
    .page-gallery-section {
      padding-top: 60px;
      padding-bottom: 60px;
      margin-bottom: 80px;
      position: relative;
      z-index: 5;
    }
    
    .gallery-intro {
      margin-bottom: 40px;
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
      box-shadow: 
        0 30px 60px -15px rgba(0, 0, 0, 0.5),
        0 15px 30px -15px rgba(0, 0, 0, 0.4);
      border-color: rgba(255, 255, 255, 0.12);
    }
    
    .mini-browser-header {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 16px;
      background: rgba(255, 255, 255, 0.03);
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
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
    .mini-browser-dots span:nth-child(2) { background: #ffbd2e; }
    .mini-browser-dots span:nth-child(3) { background: #28ca42; }
    
    .mini-browser-url {
      flex: 1;
      font-family: var(--font-en);
      font-size: 0.7rem;
      color: rgba(255, 255, 255, 0.4);
      background: rgba(0, 0, 0, 0.3);
      padding: 6px 12px;
      border-radius: 4px;
      text-align: center;
    }
    
    .mini-browser-content {
      height: 240px;
      overflow: hidden;
    }
    
    .mini-browser-content img {
      width: 100%;
      height: auto;
      display: block;
      transition: transform 0.4s ease;
    }
    
    .page-gallery-item:hover .mini-browser-content img {
      transform: scale(1.02);
    }
    
    .page-gallery-info {
      padding: 20px 0 0;
      opacity: 1;
      transform: translateY(0);
    }
    
    .page-gallery-name {
      font-family: var(--font-en);
      font-size: 0.85rem;
      font-weight: 600;
      letter-spacing: 0.05em;
      color: #fff;
      text-transform: uppercase;
      display: block;
      margin-bottom: 6px;
    }
    
    .page-gallery-desc {
      font-size: 0.8rem;
      color: rgba(255, 255, 255, 0.5);
      margin: 0;
    }
    
    /* プレビューモーダル */
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
      box-sizing: border-box;
    }
    
    .preview-modal.active {
      opacity: 1;
      visibility: visible;
    }
    
    .modal-close {
      position: absolute;
      top: 20px;
      right: 20px;
      width: 50px;
      height: 50px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
      font-size: 1.5rem;
      cursor: pointer;
      transition: all 0.3s ease;
      z-index: 10001;
    }
    
    .modal-close:hover {
      background: rgba(255, 255, 255, 0.2);
      border-color: rgba(255, 255, 255, 0.5);
      transform: scale(1.1);
    }
    
    /* ブラウザウィンドウスタイル */
    .browser-window {
      background: #1a1a1a;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 
        0 50px 100px -20px rgba(0, 0, 0, 0.5),
        0 30px 60px -30px rgba(0, 0, 0, 0.5);
      border: 1px solid rgba(255, 255, 255, 0.1);
      max-width: 900px;
      width: 100%;
    }
    
    .browser-header {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 14px 20px;
      background: rgba(255, 255, 255, 0.03);
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
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
    
    .browser-dots span:nth-child(1) { background: #ff5f57; }
    .browser-dots span:nth-child(2) { background: #ffbd2e; }
    .browser-dots span:nth-child(3) { background: #28ca42; }
    
    .browser-url {
      flex: 1;
      display: flex;
      align-items: center;
      gap: 8px;
      background: rgba(0, 0, 0, 0.3);
      padding: 8px 16px;
      border-radius: 6px;
    }
    
    .browser-url-icon {
      color: rgba(255, 255, 255, 0.4);
    }
    
    .browser-url-icon svg {
      width: 14px;
      height: 14px;
    }
    
    .browser-url-text {
      font-family: var(--font-en);
      font-size: 0.8rem;
      color: rgba(255, 255, 255, 0.6);
    }
    
    .browser-content {
      height: 500px;
      overflow-y: auto;
      background: #fff;
    }
    
    .browser-content::-webkit-scrollbar {
      width: 8px;
    }
    
    .browser-content::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    
    .browser-content::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 4px;
    }
    
    .browser-content::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
    
    .modal-image {
      width: 100%;
      height: auto;
      display: block;
    }
    
    /* レスポンシブ */
    @media (max-width: 968px) {
      .case-hero-inner {
        grid-template-columns: 1fr;
        gap: 40px;
      }
      
      .case-title {
        font-size: 1.8rem;
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
            <img src="<?php echo $prefix; ?>img/works/legatech-career.png" alt="レガテックキャリア 建設業界向け転職LP">
          </div>
          <div class="case-hero-content">
            <span class="case-category">Landing Page / Facebook Ads</span>
            <h1 class="case-title">レガテックキャリア<br>建設・施工管理者向け転職LP</h1>
            <p class="case-subtitle">技術や経験を活かして転職したい<br>建設・施工管理者へ。</p>
            
            <div class="case-meta">
              <div class="case-meta-item">
                <span class="case-meta-label">Client</span>
                株式会社レガリス様
              </div>
              <div class="case-meta-item">
                <span class="case-meta-label">Release</span>
                2023年3月
              </div>
              <div class="case-meta-item">
                <span class="case-meta-label">Type</span>
                Facebook用ショートLP
              </div>
              <div class="case-meta-item">
                <span class="case-meta-label">Scope</span>
                デザイン / 構築 / CMS連携 / 診断システム
              </div>
            </div>
            
            <a href="https://career.regalis-gp.com/lp-construction" target="_blank" rel="noopener noreferrer" class="case-link">
              サイトを見る
            </a>
          </div>
        </div>
      </section>

      <!-- プロジェクト概要 -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Overview</h2>
        <div class="case-section-content">
          <p>レガテックキャリアは、建設業界に特化した派遣・転職支援サービスです。技術や経験を活かしてキャリアアップを目指す建設・施工管理者に向けて、最適な転職先をマッチングします。</p>
          <p>本プロジェクトでは、Facebook広告からの流入を想定したショートLPを制作しました。自社CMSからリアルタイムで求人情報を取得し、ユーザーの適性を診断するシステムも実装しています。</p>
          <p>広告からの流入ユーザーに対して、短時間で訴求ポイントを伝え、効率的にコンバージョンへ導く設計を行いました。</p>
        </div>
        
        <div class="stats-badges">
          <span class="stat-badge">建設業界特化</span>
          <span class="stat-badge">施工管理者向け</span>
          <span class="stat-badge">Facebook広告連携</span>
        </div>
      </section>

      <!-- 開発範囲 -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Development Scope</h2>
        <div class="case-section-content">
          <p>本プロジェクトでは、LPデザインから技術的なシステム連携まで、幅広い領域を担当しました。</p>
        </div>
        
        <div class="features-grid">
          <div class="feature-card">
            <div class="feature-icon">Scope 01</div>
            <h3 class="feature-title">LPデザイン</h3>
            <p class="feature-desc">Facebook広告からの流入を想定し、ファーストビューでの訴求力を重視したデザインを制作。建設業界のプロフェッショナルに響くビジュアル表現を追求しました。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Scope 02</div>
            <h3 class="feature-title">LP構築</h3>
            <p class="feature-desc">レスポンシブ対応のショートLPを構築。スマートフォンからのアクセスが多いFacebook広告に最適化し、高速な読み込みと快適なユーザー体験を実現しました。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Scope 03</div>
            <h3 class="feature-title">自社CMS連携（求人情報取得）</h3>
            <p class="feature-desc">クライアントの自社CMSと連携し、最新の求人情報をリアルタイムで取得・表示するシステムを実装。常に新鮮な求人情報をユーザーに提供します。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Scope 04</div>
            <h3 class="feature-title">診断システム</h3>
            <p class="feature-desc">ユーザーの経験やスキル、希望条件を元に適性を診断するシステムを開発。パーソナライズされた求人提案により、コンバージョン率の向上に貢献します。</p>
          </div>
        </div>
      </section>

      <!-- サイトの特徴 -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Site Features</h2>
        
        <div class="features-grid">
          <div class="feature-card">
            <div class="feature-icon">Feature 01</div>
            <h3 class="feature-title">ファーストビュー最適化</h3>
            <p class="feature-desc">広告からの流入ユーザーを逃さないよう、ファーストビューで価値提案を明確に伝達。スクロールなしでCTAにアクセスできる設計です。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Feature 02</div>
            <h3 class="feature-title">リアルタイム求人表示</h3>
            <p class="feature-desc">自社CMSから取得した最新の求人情報を動的に表示。ユーザーに常に新鮮で魅力的な求人を提供し、エンゲージメントを高めます。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Feature 03</div>
            <h3 class="feature-title">適性診断機能</h3>
            <p class="feature-desc">簡単な質問に答えるだけで、ユーザーに最適な求人をレコメンド。パーソナライズされた体験でコンバージョンを促進します。</p>
          </div>
          
          <div class="feature-card">
            <div class="feature-icon">Feature 04</div>
            <h3 class="feature-title">モバイルファースト</h3>
            <p class="feature-desc">Facebook広告からのアクセスはスマートフォンが中心。モバイルでの操作性を最優先に設計し、ストレスのないUXを実現しました。</p>
          </div>
        </div>
      </section>

      <!-- 技術スタック -->
      <section class="case-section fade-in-up">
        <h2 class="case-section-title">Tech Stack</h2>
        <div class="case-section-content">
          <p>本プロジェクトで採用した技術・ツールです。</p>
        </div>
        
        <div class="tags-list">
          <span class="tag-item">HTML5</span>
          <span class="tag-item">CSS3</span>
          <span class="tag-item">JavaScript</span>
          <span class="tag-item">PHP</span>
          <span class="tag-item">API Integration</span>
          <span class="tag-item">Figma</span>
        </div>
      </section>

      <!-- ページギャラリーセクション -->
      <section class="page-gallery-section fade-in-up">
        <h2 class="case-section-title">Page Gallery</h2>
        <div class="gallery-intro">
          <p>LPのデザインをご覧いただけます。クリックすると拡大表示されます。</p>
        </div>
        
        <div class="page-gallery-carousel-wrapper">
          <div class="page-gallery-carousel-container">
            <div class="page-gallery-carousel" id="pageGalleryCarousel">
              <div class="page-gallery-item" data-page="top" role="button" tabindex="0" aria-label="Landing Pageを拡大表示">
                <div class="mini-browser">
                  <div class="mini-browser-header">
                    <div class="mini-browser-dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div class="mini-browser-url">career.regalis-gp.com/lp-construction</div>
                  </div>
                  <div class="mini-browser-content">
                    <img src="<?php echo $prefix; ?>img/works/legatech-career-preview/legatech-career-top.png" alt="レガテックキャリア LP">
                  </div>
                </div>
                <div class="page-gallery-info">
                  <span class="page-gallery-name">Landing Page</span>
                  <p class="page-gallery-desc">建設・施工管理者向け転職LP</p>
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
              <span class="browser-url-text" id="modalUrl">https://career.regalis-gp.com/lp-construction</span>
            </div>
          </div>
          <div class="browser-content">
            <img id="modalImage" src="" alt="" class="modal-image">
          </div>
        </div>
      </div>

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
      ['name' => 'LEGATECH CAREER', 'url' => '']
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
        'top': {
          url: 'https://career.regalis-gp.com/lp-construction',
          image: '<?php echo $prefix; ?>img/works/legatech-career-preview/legatech-career-top.png',
          alt: 'レガテックキャリア LP'
        }
      };
      
      function openModal(pageKey) {
        const data = pageData[pageKey];
        if (data) {
          modalImage.src = data.image;
          modalImage.alt = data.alt;
          modalUrl.textContent = data.url;
          modal.classList.add('active');
          document.body.style.overflow = 'hidden';
        }
      }
      
      function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
      }
      
      galleryItems.forEach(function(item) {
        item.addEventListener('click', function() {
          const pageKey = this.getAttribute('data-page');
          openModal(pageKey);
        });
        
        item.addEventListener('keydown', function(e) {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            const pageKey = this.getAttribute('data-page');
            openModal(pageKey);
          }
        });
      });
      
      if (modalClose) {
        modalClose.addEventListener('click', closeModal);
      }
      
      if (modal) {
        modal.addEventListener('click', function(e) {
          if (e.target === modal) {
            closeModal();
          }
        });
      }
      
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
          closeModal();
        }
      });
    });
  </script>
</body>
</html>

