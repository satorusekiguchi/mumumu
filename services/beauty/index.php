<?php
require_once __DIR__ . '/../../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'スキンケアブランド';
$page_label = 'nú:d';
$hero_title = 'Beauty';
setPageMeta(
    'nú:d | スキンケアブランド | セラミドによる保湿特化美容液 | 株式会社mumumu',
    '肌の「基礎」を再構築する。植物ヒト型セラミド配合、ジェンダーレス保湿特化美容液。nú:dが提案する、明日を育む一滴。2026年4月発売予定。',
    $page_title,
    $page_label,
    [
        'keywords' => 'nú:d,ヌード,美容液,FutureBase Serum,植物ヒト型セラミド,ヒアルロン酸,スキンケア,土台美容液,保湿,ジェンダーレス',
        'type' => 'product',
        'image' => SITE_URL . '/img/ogp-nude.png'
    ]
);

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => 'サービス', 'url' => 'services/'],
    ['name' => '美容ブランド事業', 'url' => 'services/beauty/']
];

// 製品構造化データ
$product_data = [
    'name' => 'nú:d FutureBase Serum（ヌード フューチャーベース セラム）',
    'description' => '肌の「基礎」を再構築する土台美容液。植物ヒト型セラミド、トリプルヒアルロン酸、有機米ぬかエキス配合。',
    'brand' => 'nú:d',
    'image' => SITE_URL . '/img/ogp-nude.png',
    'url' => SITE_URL . '/services/beauty/',
    'availability' => 'https://schema.org/PreOrder',
    'offers' => true
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
  
  <link rel="stylesheet" href="<?php echo $prefix; ?>css/style.css">
  <link rel="stylesheet" href="nude-style.css" onload="document.documentElement.classList.remove('css-loading');">
  
  <!-- Structured Data -->
  <?php 
  outputOrganizationSchema();
  outputBreadcrumbSchema($breadcrumb_schema);
  outputProductSchema($product_data);
  outputWebPageSchema($page_meta['title'], $page_meta['description']);
  ?>
</head>

<body class="nude-page" data-page-title="<?php echo htmlspecialchars($page_title); ?>" data-page-label="<?php echo htmlspecialchars($page_label); ?>">
  <?php outputGTMNoscript(); ?>

  <?php
  // ヘッダーとナビゲーションを読み込み
  include __DIR__ . '/../../templates/header.php';
  include __DIR__ . '/../../templates/nav.php';
  ?>

  <!-- Message Bar -->
  <div class="nude-message-bar">
    COMING SOON — 2026.04 DEBUT
  </div>

  <main>
    <!-- ============================================
         Hero Section
         ============================================ -->
    <section class="nude-hero">
      <!-- Komorebi Effect -->
      <div class="nude-hero-komorebi">
        <div class="komorebi-ray komorebi-ray-1"></div>
        <div class="komorebi-ray komorebi-ray-2"></div>
        <div class="komorebi-ray komorebi-ray-3"></div>
      </div>
      
      <div class="nude-hero-content">
        <!-- Brand Logo -->
        <div class="nude-brand-logo">
          <svg width="160" height="53" viewBox="0 0 422 140" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M34.53 68.33L34.5 65.84V68.33H34.53Z" fill="currentColor"/>
            <path d="M118.72 134.33H111.27C107.1 134.33 103.72 130.95 103.72 126.78V71.76C103.72 61.76 100.75 54.48 94.83 49.9C88.9 45.33 81.22 43.04 71.79 43.04C70.88 43.04 70.01 43.07 69.14 43.12C56.85 44.09 50.66 51.67 49.69 52.97C51.63 51.44 53.7 50.12 55.93 49.04C60.07 47.04 64.43 46.04 69 46.04C74.57 46.04 78.68 47.83 81.32 51.4C83.96 54.97 85.28 59.54 85.28 65.12V126.78C85.28 130.95 81.9 134.33 77.73 134.33H70.28C69.45 134.33 68.78 135 68.78 135.83C68.78 136.66 69.45 137.33 70.28 137.33H118.71C119.54 137.33 120.21 136.66 120.21 135.83C120.21 135 119.54 134.33 118.71 134.33H118.72Z" fill="currentColor"/>
            <path d="M34.5 68.33V60.51C34.5 52.17 27.74 45.4 19.39 45.4H1.5C0.67 45.4 0 46.07 0 46.9C0 47.73 0.67 48.4 1.5 48.4H5.17C11.43 48.4 16.5 53.47 16.5 59.73V126.77C16.5 130.94 13.12 134.32 8.95 134.32H1.5C0.67 134.32 0 134.99 0 135.82C0 136.65 0.67 137.32 1.5 137.32H49.93C50.76 137.32 51.43 136.65 51.43 135.82C51.43 134.99 50.76 134.32 49.93 134.32H42.48C38.31 134.32 34.93 130.94 34.93 126.77V117.87L34.52 68.32H34.5V68.33Z" fill="currentColor"/>
            <path d="M193.54 126.99C193.54 126.99 190.31 130.81 185.68 133.34C182.47 135.09 179.07 136.12 175.93 136.12C172.21 136.12 169.21 135.44 166.93 134.09C164.65 132.73 162.79 130.88 161.36 128.52C159.93 126.16 158.97 123.41 158.47 120.27C157.97 117.13 157.72 113.7 157.72 109.98V59.3C157.72 50.96 150.96 44.19 142.61 44.19H124.29C123.46 44.19 122.79 44.86 122.79 45.69C122.79 46.52 123.46 47.19 124.29 47.19H127.96C134.22 47.19 139.29 52.26 139.29 58.52V108.05C139.29 112.33 139.64 115.94 140.36 118.87C141.08 121.8 141.93 124.19 142.93 126.05C143.93 127.91 145.04 129.37 146.25 130.44C147.46 131.51 148.57 132.4 149.57 133.12C151.57 134.55 154.36 135.9 157.93 137.19C161.5 138.47 166.14 139.12 171.86 139.12C174.13 139.12 175.76 139.01 177.8 138.67C188.65 136.84 193.55 126.98 193.55 126.98L193.54 126.99Z" fill="currentColor"/>
            <path d="M238.07 133.13H234.4C228.14 133.13 223.07 128.06 223.07 121.8V59.31C223.07 50.97 216.31 44.2 207.96 44.2H189.85C189.02 44.2 188.35 44.87 188.35 45.7C188.35 46.53 189.02 47.2 189.85 47.2H193.31C199.57 47.2 204.64 52.27 204.64 58.53L205.19 121.28C205.23 123.34 205.58 125.4 206.43 127.27C208.81 132.49 214.06 136.12 220.17 136.12H238.06C238.89 136.12 239.56 135.45 239.56 134.62C239.56 133.79 238.89 133.12 238.06 133.12L238.07 133.13Z" fill="currentColor"/>
            <path d="M421.15 134.76C421.15 135.59 420.48 136.26 419.65 136.26H401.76C393.42 136.26 386.65 129.5 386.65 121.15L386.22 14.33C386.22 8.07002 381.15 3 374.89 3H371.22C370.39 3 369.72 2.33 369.72 1.5C369.72 0.67 370.39 0 371.22 0H389.54C397.88 0 404.65 6.75998 404.65 15.11V121.93C404.65 128.19 409.72 133.26 415.98 133.26H419.65C420.48 133.26 421.15 133.93 421.15 134.76ZM348.72 134.96C348.11 134.76 346.9 134.27 346.9 134.27C345.94 133.85 345.05 133.38 344.23 132.83C340.8 130.55 338.23 127.26 336.52 122.97C334.81 118.68 333.73 113.51 333.31 107.43C332.88 101.36 332.67 94.61 332.67 87.18C332.67 80.61 333.02 74.72 333.74 69.5C334.45 64.29 335.7 59.82 337.49 56.11C339.27 52.4 341.77 49.54 344.99 47.54C345.59 47.17 346.23 46.84 346.88 46.54C355.11 42.63 363.63 42.41 371 44.52C366.91 42.55 362.08 41.54 356.46 41.54C350.32 41.54 344.53 42.86 339.1 45.5C333.67 48.14 328.89 51.64 324.74 56C320.6 60.36 317.31 65.47 314.88 71.32C312.45 77.18 311.24 83.32 311.24 89.75C311.24 96.18 312.49 102.57 314.99 108.5C317.49 114.43 320.88 119.68 325.17 124.25C329.46 128.82 334.42 132.47 340.06 135.18C345.7 137.89 351.67 139.25 357.96 139.25C362.81 139.25 366.92 138.43 370.28 136.79C370.53 136.67 370.76 136.53 371.01 136.4C364.19 138.35 356.39 137.75 348.74 134.95L348.72 134.96Z" fill="currentColor"/>
            <path d="M276.95 44.2L263.14 44.26C261.85 44.26 261.35 45.94 262.42 46.64C267.92 50.24 272.81 55.88 275.75 61.89C276.25 62.9 277.66 62.9 278.15 61.89C281.09 55.87 285.98 50.24 291.48 46.64C292.56 45.93 292.05 44.26 290.76 44.26L276.95 44.2Z" fill="currentColor"/>
            <path d="M276.95 136.13L263.14 136.07C261.85 136.07 261.35 134.39 262.42 133.69C267.92 130.09 272.81 124.45 275.75 118.44C276.25 117.43 277.66 117.43 278.15 118.44C281.09 124.46 285.98 130.09 291.48 133.69C292.56 134.4 292.05 136.07 290.76 136.07L276.95 136.13Z" fill="currentColor"/>
            <path d="M180.01 0C179.63 0 179.3 0.249976 179.18 0.599976C175.78 10.31 169.44 15.87 163.89 18.98C162.33 19.85 163.13 22.24 164.89 21.96C175.38 20.26 190.21 15.32 196.69 1.15997C196.94 0.619973 196.53 0 195.93 0H180.01Z" fill="currentColor"/>
          </svg>
        </div>

        <!-- Product Name -->
        <p class="nude-product-name">FutureBase Serum</p>

        <!-- Main Copy -->
        <h1 class="nude-hero-copy-en">Begin cultivating the you of tomorrow, today.</h1>
        <p class="nude-hero-copy-ja">明日を育む、一滴。</p>

        <!-- Sub Copy -->
        <p class="nude-hero-subcopy">
          肌の「基礎」を再構築する。<br>
          植物ヒト型セラミド配合、ジェンダーレス土台美容液。
        </p>

        <!-- Release Info -->
        <div class="nude-release-info">
          <span>2026.04</span>
          <span>Launch</span>
        </div>
      </div>

      <!-- Scroll Indicator -->
      <div class="nude-scroll-indicator">
        <span class="scroll-text">Scroll</span>
        <div class="scroll-line"></div>
      </div>
    </section>

    <!-- ============================================
         Brand Story Section
         ============================================ -->
    <section class="nude-brand-story">
      <div class="nude-section-inner">
        <div class="nude-brand-story-header nude-fade-in">
          <span class="nude-section-label">Brand Story</span>
          <h2 class="nude-section-title-en">The Birth of nú:d</h2>
          <p class="nude-section-title-ja">「素の肌」を愛するブランドの誕生</p>
        </div>

        <div class="nude-brand-story-content">
          <div class="brand-story-visual nude-fade-in nude-delay-1">
            <div class="brand-story-quote">
              <span class="quote-mark">"</span>
              <p class="quote-text">
                本当に肌に必要なものは、<br>
                何かを「足す」ことではなく、<br>
                「土台」を整えることだった。
              </p>
            </div>
          </div>

          <div class="brand-story-text nude-fade-in nude-delay-2">
            <p>
              nú:d（ヌード）という名前には、「裸の、ありのままの」という意味が込められています。
            </p>
            <p>
              現代のスキンケアは、次々と新しい成分や機能を「足す」ことに注力してきました。しかし私たちは、過剰なケアに疲弊した肌を見てきました。本当に必要なのは、足し算ではなく、肌本来の力を信じること。
            </p>
            <p>
              だから nú:d は、たった1本の美容液に全てを込めました。余計なものは入れない。入れるべきものだけを、入れるべき濃度で。シンプルだけど、妥協のない処方。それが「素の肌を信じる」という、私たちの答えです。
            </p>
            <p>
              性別も年齢も関係ない。すべての人の「素の肌」が、明日も健やかであるために。
            </p>
          </div>
        </div>

        <div class="brand-name-meaning nude-fade-in nude-delay-3">
          <div class="meaning-item">
            <span class="meaning-word">nú:d</span>
            <span class="meaning-pronunciation">/nuːd/</span>
            <span class="meaning-definition">adj. 裸の、ありのままの、素の</span>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         Product Section（製品情報を早めに配置）
         ============================================ -->
    <section class="nude-product">
      <div class="nude-section-inner">
        <div class="nude-product-header nude-fade-in">
          <span class="nude-section-label">Product</span>
          <h2 class="nude-section-title-en">FutureBase Serum</h2>
          <p class="nude-section-title-ja">製品情報</p>
        </div>

        <div class="nude-product-content">
          <!-- Product Visual -->
          <div class="nude-product-visual nude-fade-in nude-delay-1">
            <div class="product-image-frame">
              <img src="/img/nude/product-hero.jpg" alt="nú:d FutureBase Serum - 製品ボトルとパッケージ" class="product-hero-image">
            </div>
            <p class="product-variant-hint">Moon Stone / Earth — Design varies by lot</p>
          </div>

          <!-- Product Info -->
          <div class="nude-product-info nude-fade-in nude-delay-2">
            <h3 class="product-name-display">FutureBase Serum</h3>
            
            <div class="product-specs">
              <div class="product-spec-row">
                <span class="spec-label">Price</span>
                <span class="spec-value price">¥4,800 <small>(税込)</small></span>
              </div>
              <div class="product-spec-row">
                <span class="spec-label">Volume</span>
                <span class="spec-value">30ml</span>
              </div>
              <div class="product-spec-row">
                <span class="spec-label">Texture</span>
                <span class="spec-value">水のように広がり、オイルのように守る<br>ハイブリッドテクスチャー</span>
              </div>
            </div>

            <div class="product-freefrom">
              <span class="freefrom-label">Free From</span>
              <div class="freefrom-tags">
                <span class="freefrom-tag">パラベンフリー</span>
                <span class="freefrom-tag">アルコールフリー</span>
                <span class="freefrom-tag">合成香料フリー</span>
                <span class="freefrom-tag">合成着色料フリー</span>
                <span class="freefrom-tag">鉱物油フリー</span>
              </div>
            </div>

            <button class="ingredients-toggle" type="button">
              全成分を表示する →
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         Concept Section - Philosophy: Soil for Skin
         ============================================ -->
    <section class="nude-concept">
      <div class="nude-section-inner">
        <div class="nude-concept-header nude-fade-in">
          <span class="nude-section-label">Philosophy</span>
          <h2 class="nude-section-title-en">Soil for Skin</h2>
          <p class="nude-section-title-ja">肌に必要なのは、飾りではなく「土壌」でした。</p>
        </div>

        <div class="nude-concept-body">
          <!-- Water Drop Animation -->
          <div class="water-drop-container nude-fade-in">
            <!-- SVG Filters for realistic water effect -->
            <svg width="0" height="0" style="position:absolute;">
              <defs>
                <filter id="water-goo" x="-50%" y="-50%" width="200%" height="200%">
                  <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur"/>
                  <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 20 -10" result="goo"/>
                  <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                </filter>
                <filter id="water-displacement" x="-20%" y="-20%" width="140%" height="140%">
                  <feTurbulence type="turbulence" baseFrequency="0.015" numOctaves="3" result="turbulence" seed="5">
                    <animate attributeName="baseFrequency" dur="10s" values="0.015;0.02;0.015" repeatCount="indefinite"/>
                  </feTurbulence>
                  <feDisplacementMap in="SourceGraphic" in2="turbulence" scale="4" xChannelSelector="R" yChannelSelector="G"/>
                </filter>
              </defs>
            </svg>
            <div class="water-drop">
              <div class="water-drop-inner">
                <div class="water-surface"></div>
                <div class="water-highlight water-highlight-1"></div>
                <div class="water-highlight water-highlight-2"></div>
                <div class="water-highlight water-highlight-3"></div>
                <div class="water-reflection"></div>
                <div class="water-caustic"></div>
              </div>
              <div class="water-ripple"></div>
              <div class="water-shadow"></div>
            </div>
          </div>
          
          <p class="nude-concept-lead nude-fade-in nude-delay-1">
            建物が強固な基礎なしには建たないように、<br>
            植物が肥沃な土なしには育たないように。
          </p>
          
          <p class="nude-concept-text nude-fade-in nude-delay-2">
            私たち nú:d が目指したのは、肌というキャンバスの「土台」作りです。
          </p>
          
          <p class="nude-concept-text nude-fade-in nude-delay-3">
            加齢、乾燥、紫外線、摩擦。現代を生きる私たちの肌は、常に揺らぎの中にいます。だからこそ、一時的な修復ではなく、揺るぎない基礎を。性別も年齢も超えて、すべての肌が本来持っている「自ら潤う力」を耕すこと。
          </p>
          
          <p class="nude-concept-text nude-fade-in nude-delay-4">
            それが、FutureBase Serum の約束です。
          </p>
        </div>
      </div>
    </section>

    <!-- ============================================
         Technology Section - The Architecture of Moisture
         ============================================ -->
    <section class="nude-technology">
      <div class="nude-section-inner">
        <div class="nude-tech-header nude-fade-in">
          <span class="nude-section-label">Ingredients</span>
          <h2 class="nude-section-title-en">The Architecture of Moisture</h2>
          <p class="nude-section-title-ja">保湿の建築学</p>
        </div>
        
        <p class="nude-tech-lead nude-fade-in nude-delay-1">
          奇抜な成分は入れない。入れたのは、肌の構造と響き合う「必然」だけ。
        </p>

        <div class="nude-ingredients-list">
          <!-- Ingredient 01 -->
          <div class="nude-ingredient-item nude-fade-in nude-delay-1">
            <div class="ingredient-number">01</div>
            <div class="ingredient-content">
              <span class="ingredient-action">Reinforce（補強する）</span>
              <h3 class="ingredient-name-ja">植物ヒト型セラミド</h3>
              <p class="ingredient-catch">
                世界初※。廃棄される「和栗」の皮から生まれた、肌と同一構造の盾。
              </p>
              <p class="ingredient-desc">
                バリア機能の要となる「セラミド」。私たちは、人の肌にあるセラミドと全く同じ構造を持ちながら、廃棄される和栗の皮からアップサイクルされた「植物ヒト型セラミド（セラミドAP）」を採用しました。合成セラミドよりも長い分子構造が、肌の上で緻密なラメラ構造（防御壁）を形成。水分を抱え込み、外部刺激を跳ね返す、強固なバリア機能を築きます。
              </p>
              <div class="ingredient-tags">
                <span class="ingredient-tag">#Upcycle</span>
                <span class="ingredient-tag">#BarrierFunction</span>
                <span class="ingredient-tag">#HumanType</span>
              </div>
            </div>
          </div>

          <!-- Ingredient 02 -->
          <div class="nude-ingredient-item nude-fade-in nude-delay-2">
            <div class="ingredient-number">02</div>
            <div class="ingredient-content">
              <span class="ingredient-action">Fill（満たす）</span>
              <h3 class="ingredient-name-ja">トリプルヒアルロン酸</h3>
              <p class="ingredient-catch">
                守り、留まり、浸透する。3段階の潤い設計。
              </p>
              <p class="ingredient-desc">
                ひとつのヒアルロン酸では届かない場所がある。だから、役割の異なる3種を配合しました。<br>
                <strong>吸着型</strong>：洗っても流れ落ちず、肌表面に潤いのベールを固定。<br>
                <strong>保湿型</strong>：環境の変化に左右されず、水分バランスを一定に保つ。<br>
                <strong>浸透型</strong>：角層の深くまで潜り込み、内側からふっくらと持ち上げる。
              </p>
            </div>
          </div>

          <!-- Ingredient 03 -->
          <div class="nude-ingredient-item nude-fade-in nude-delay-3">
            <div class="ingredient-number">03</div>
            <div class="ingredient-content">
              <span class="ingredient-action">Cultivate（育む）</span>
              <h3 class="ingredient-name-ja">有機米ぬかエキス</h3>
              <p class="ingredient-catch">
                「与える」だけではない。「自ら作る」肌へ。
              </p>
              <p class="ingredient-desc">
                日本人の肌を支えてきた米ぬかの知恵。有機JAS認証米から抽出したエキスは、一般的な抽出法に比べアミノ酸を豊富に含有。肌が本来持つ天然保湿因子（NMF）の産生をサポートし、使い続けるほどに、キメの整った自発的な潤い肌へと導きます。
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         How to Use Section
         ============================================ -->
    <section class="nude-howtouse">
      <div class="nude-section-inner">
        <div class="nude-howtouse-header nude-fade-in">
          <span class="nude-section-label">How to Use</span>
          <h2 class="nude-section-title-en">Simple Ritual</h2>
          <p class="nude-section-title-ja">使い方</p>
        </div>

        <p class="nude-howtouse-lead nude-fade-in nude-delay-1">
          化粧水で整えた肌に、FutureBase Serumで土台作りを。<br>
          油溶性セラミドが水分を閉じ込め、バリア機能を高めます。
        </p>

        <div class="howtouse-steps">
          <!-- Step 1 -->
          <div class="howtouse-step nude-fade-in nude-delay-1">
            <div class="step-number">
              <span>01</span>
            </div>
            <div class="step-content">
              <h3 class="step-title">洗顔で肌を清潔に</h3>
              <p class="step-desc">
                ぬるま湯で優しく洗顔し、清潔なタオルで肌を押さえるように水分をオフ。ゴシゴシ擦らないのがポイントです。
              </p>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="howtouse-step nude-fade-in nude-delay-2">
            <div class="step-number">
              <span>02</span>
            </div>
            <div class="step-content">
              <h3 class="step-title">化粧水で肌を整える</h3>
              <p class="step-desc">
                お手持ちの化粧水で角層に水分を届けます。肌が柔らかく整った状態が、美容液の浸透を高めます。
              </p>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="howtouse-step nude-fade-in nude-delay-3">
            <div class="step-number">
              <span>03</span>
            </div>
            <div class="step-content">
              <h3 class="step-title">FutureBase Serumを塗布</h3>
              <p class="step-desc">
                ポンプを1〜2プッシュし、手のひらに取ります。両手で顔を包み込むように、内側から外側へ広げ、ハンドプレスで浸透させて。
              </p>
            </div>
          </div>

          <!-- Step 4 -->
          <div class="howtouse-step nude-fade-in nude-delay-4">
            <div class="step-number">
              <span>04</span>
            </div>
            <div class="step-content">
              <h3 class="step-title">乳液でフタをする</h3>
              <p class="step-desc">
                美容液が浸透したら、乳液で保湿完了。セラミドと乳液の油分が協力して、潤いを長時間キープします。
              </p>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ============================================
         For You Section - Scenes of Life
         ============================================ -->
    <section class="nude-foryou">
      <div class="nude-section-inner">
        <div class="nude-foryou-header nude-fade-in">
          <span class="nude-section-label">For You</span>
          <h2 class="nude-section-title-en">Scenes of Life</h2>
          <p class="nude-section-title-ja">あなたの日常に</p>
        </div>
        
        <p class="nude-foryou-lead nude-fade-in nude-delay-1">
          変化に晒される、すべての肌の「安全地帯」として。
        </p>

        <div class="nude-scenes-grid">
          <!-- Scene 01 -->
          <div class="nude-scene-card nude-fade-in nude-delay-1">
            <div class="scene-visual">
              <span class="scene-number">Scene 01</span>
            </div>
            <div class="scene-content">
              <h3 class="scene-title">繰り返す刺激を、鎮めるように。</h3>
              <p class="scene-text">
                毎日の髭剃りや衣服・マスクの摩擦。物理的な刺激は、知らず知らずのうちに肌のバリアを削ぎ落としています。FutureBase Serumは、乱れた角層を優しく包み込み、ヒリつきがちな肌を穏やかな状態へ整えます。アフターシェーブローションとしても最適です。
              </p>
            </div>
          </div>

          <!-- Scene 02 -->
          <div class="nude-scene-card nude-fade-in nude-delay-2">
            <div class="scene-visual">
              <span class="scene-number">Scene 02</span>
            </div>
            <div class="scene-content">
              <h3 class="scene-title">攻めのケアの後の、休息地として。</h3>
              <p class="scene-text">
                美容医療などの施術を受けた後の肌は、生まれ変わろうとする一方で、非常に無防備な状態です。必要なのは、余計な刺激を与えず、回復環境を整えること。シンプルかつ高機能な保湿設計が、敏感な時期の肌に寄り添います。
              </p>
            </div>
          </div>

          <!-- Scene 03 -->
          <div class="nude-scene-card nude-fade-in nude-delay-3">
            <div class="scene-visual">
              <span class="scene-number">Scene 03</span>
            </div>
            <div class="scene-content">
              <h3 class="scene-title">30代からの「乾き」を、先回りする。</h3>
              <p class="scene-text">
                30代を境に急減する皮脂量と水分量。エイジングの加速を止める鍵は「モイスチャーバランス」の維持にあります。不足した油分と水分を黄金比で補い、5年後、10年後も「枯れない肌」の土台を作ります。
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         Sustainability Section
         ============================================ -->
    <section class="nude-sustainability">
      <div class="nude-section-inner">
        <div class="nude-sustainability-header nude-fade-in">
          <span class="nude-section-label">Sustainability</span>
          <h2 class="nude-section-title-en">Beauty from Waste</h2>
          <p class="nude-section-title-ja">捨てられるものから、美しさを</p>
        </div>

        <div class="nude-sustainability-content">
          <div class="sustainability-main nude-fade-in nude-delay-1">
            <div class="sustainability-icon">
              <img src="<?php echo $prefix; ?>img/nude/marron-img.png" alt="和栗" width="200" height="150">
            </div>
            <h3 class="sustainability-title">和栗の皮から生まれた<br>植物ヒト型セラミド</h3>
            <p class="sustainability-desc">
              日本の栗農家では、毎年大量の栗の皮が廃棄されています。私たちは、この「廃棄物」に着目しました。
            </p>
            <p class="sustainability-desc">
              研究の結果、和栗の皮にはヒトの肌と同じ構造を持つセラミドが豊富に含まれていることが判明。これをアップサイクルし、高機能な美容成分として再生させることに成功しました。
            </p>
          </div>

          <div class="sustainability-points">
            <div class="sustainability-point nude-fade-in nude-delay-2">
              <span class="point-number">01</span>
              <div class="point-content">
                <h4>廃棄される原料の活用</h4>
                <p>年間約1,000トン以上廃棄される和栗の皮を原料として活用</p>
              </div>
            </div>

            <div class="sustainability-point nude-fade-in nude-delay-3">
              <span class="point-number">02</span>
              <div class="point-content">
                <h4>国産原料へのこだわり</h4>
                <p>日本各地の栗農家と連携し、地域経済にも貢献</p>
              </div>
            </div>

            <div class="sustainability-point nude-fade-in nude-delay-4">
              <span class="point-number">03</span>
              <div class="point-content">
                <h4>環境配慮パッケージ</h4>
                <p>FSC認証紙・リサイクルガラス瓶を使用したサステナブル設計</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         SkinScan Section
         ============================================ -->
    <section class="nude-skinscan">
      <div class="nude-section-inner">
        <div class="nude-skinscan-content nude-fade-in">
          <div class="skinscan-text">
            <span class="nude-section-label">Try Now</span>
            <h2 class="nude-section-title-en">nú:d SkinScan AI</h2>
            <p class="nude-section-title-ja">あなたの肌を、AIが診断。</p>
            <p class="skinscan-desc">
              顔写真をアップロードするだけで、AIがあなたの肌を7つのエリアに分割して精密解析。<br>
              シミ・シワ・毛穴・肌トーンなど複数の指標を科学的に評価し、<br>
              最適なスキンケアをご提案します。
            </p>
            <a href="https://app.nudeskincare.jp/" target="_blank" rel="noopener noreferrer" class="skinscan-btn">
              <span>無料で肌診断を試す</span>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         FAQ Section
         ============================================ -->
    <section class="nude-faq">
      <div class="nude-section-inner">
        <div class="nude-faq-header nude-fade-in">
          <span class="nude-section-label">FAQ</span>
          <h2 class="nude-section-title-en">Questions & Answers</h2>
          <p class="nude-section-title-ja">よくある質問</p>
        </div>

        <div class="faq-list">
          <!-- FAQ 1 -->
          <div class="faq-item nude-fade-in nude-delay-1">
            <button class="faq-question" type="button">
              <span class="faq-q-mark">Q</span>
              <span class="faq-q-text">敏感肌でも使用できますか？</span>
              <span class="faq-toggle">+</span>
            </button>
            <div class="faq-answer">
              <p>
                はい、敏感肌の方にもお使いいただけます。パラベン、アルコール、合成香料、合成着色料、鉱物油を使用していない「5つのフリー処方」です。ただし、すべての方にアレルギーが起こらないわけではありませんので、ご使用前にパッチテストをおすすめします。
              </p>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="faq-item nude-fade-in nude-delay-2">
            <button class="faq-question" type="button">
              <span class="faq-q-mark">Q</span>
              <span class="faq-q-text">男性でも使えますか？</span>
              <span class="faq-toggle">+</span>
            </button>
            <div class="faq-answer">
              <p>
                もちろんです。nú:dは性別を問わないジェンダーレススキンケアです。特に、髭剃り後の肌荒れが気になる方や、シンプルなスキンケアを求める方におすすめです。べたつかないテクスチャーで、男性にも使いやすい設計になっています。
              </p>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="faq-item nude-fade-in nude-delay-3">
            <button class="faq-question" type="button">
              <span class="faq-q-mark">Q</span>
              <span class="faq-q-text">1本でどのくらい持ちますか？</span>
              <span class="faq-toggle">+</span>
            </button>
            <div class="faq-answer">
              <p>
                1本30mlで、朝晩の使用で約1ヶ月分です。1回の使用量は1〜2プッシュを目安としていますが、肌の状態や季節に応じて調整してください。乾燥が気になる部分には重ね付けもおすすめです。
              </p>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="faq-item nude-fade-in nude-delay-4">
            <button class="faq-question" type="button">
              <span class="faq-q-mark">Q</span>
              <span class="faq-q-text">他のスキンケア製品と併用できますか？</span>
              <span class="faq-toggle">+</span>
            </button>
            <div class="faq-answer">
              <p>
                はい、お手持ちのスキンケア製品と併用いただけます。FutureBase Serumは「土台美容液」ですので、洗顔 → 化粧水 → 美容液 → 乳液 の順でお使いください。化粧水で水分を与えた後にセラミドでフタをすることで、バリア機能を効果的に補強できます。
              </p>
            </div>
          </div>

          <!-- FAQ 5 -->
          <div class="faq-item nude-fade-in nude-delay-4">
            <button class="faq-question" type="button">
              <span class="faq-q-mark">Q</span>
              <span class="faq-q-text">「植物ヒト型セラミド」とは何ですか？</span>
              <span class="faq-toggle">+</span>
            </button>
            <div class="faq-answer">
              <p>
                植物由来でありながら、人の肌に存在するセラミドと全く同じ構造を持つ成分です。一般的な「植物性セラミド」は構造が異なりますが、和栗の皮から抽出した当社の植物ヒト型セラミドは、肌との親和性が非常に高く、バリア機能の強化に優れた効果を発揮します。
              </p>
            </div>
          </div>

          <!-- FAQ 6 -->
          <div class="faq-item nude-fade-in nude-delay-4">
            <button class="faq-question" type="button">
              <span class="faq-q-mark">Q</span>
              <span class="faq-q-text">どこで購入できますか？</span>
              <span class="faq-toggle">+</span>
            </button>
            <div class="faq-answer">
              <p>
                2026年4月より、Amazonにて販売開始予定です。発売開始後は、本ページの「Amazonで購入」ボタンよりご購入いただけます。最新情報はInstagram（@nudeskincare.jp）でもお知らせしています。
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         Instagram Section
         ============================================ -->
    <section class="nude-instagram">
      <div class="nude-section-inner">
        <div class="nude-instagram-header nude-fade-in">
          <span class="nude-section-label">Follow Us</span>
          <h2 class="nude-section-title-en">@nudeskincare.jp</h2>
          <p class="nude-section-title-ja">Instagramで最新情報をチェック</p>
        </div>

        <p class="nude-instagram-lead nude-fade-in nude-delay-1">
          製品の開発ストーリー、スキンケアのヒント、<br>
          発売に関する最新情報をお届けしています。
        </p>

        <div class="instagram-cta nude-fade-in nude-delay-2">
          <a href="https://www.instagram.com/nudeskincare.jp/" target="_blank" rel="noopener noreferrer" class="instagram-follow-btn">
            <svg class="instagram-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor" stroke-width="1.5"/>
              <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.5"/>
              <circle cx="18" cy="6" r="1" fill="currentColor"/>
            </svg>
            <span>Instagramをフォローする</span>
          </a>
        </div>

        <div class="instagram-preview nude-fade-in nude-delay-3">
          <div class="instagram-grid">
            <div class="instagram-placeholder">
              <span>Coming Soon</span>
            </div>
            <div class="instagram-placeholder">
              <span>Coming Soon</span>
            </div>
            <div class="instagram-placeholder">
              <span>Coming Soon</span>
            </div>
            <div class="instagram-placeholder">
              <span>Coming Soon</span>
            </div>
          </div>
          <p class="instagram-note">※ 発売に向けて、コンテンツを準備中です</p>
        </div>
      </div>
    </section>

    <!-- ============================================
         Purchase Section
         ============================================ -->
    <section class="nude-waitlist">
      <div class="nude-section-inner">
        <div class="nude-fade-in">
          <span class="nude-section-label">Get Yours</span>
          <h2 class="nude-section-title-en">2026年4月、発売開始。</h2>
        </div>
        
        <p class="nude-waitlist-lead nude-fade-in nude-delay-1">
          Amazonにて販売予定です。<br>
          発売開始時に、こちらからご購入いただけます。
        </p>

        <div class="nude-amazon-btn-wrap nude-fade-in nude-delay-2">
          <a href="#" class="nude-amazon-btn" target="_blank" rel="noopener noreferrer">
            <svg class="amazon-logo" viewBox="-0.658000000000003 -1.875 384.24600000000004 119.917" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
              <path d="M81.633 27.542V64.65a2.268 2.268 0 0 1-2.268 2.268H67.651a2.269 2.269 0 0 1-2.268-2.268V4.292a2.268 2.268 0 0 1 2.268-2.268h10.84a2.268 2.268 0 0 1 2.268 2.268v8.5S84.634.667 96.134.667c0 0 11.375-1.375 16 11.25 0 0 3.875-11.25 15.625-11.25 0 0 17.474-1.039 17.474 17.042l.133 9.958v37.108a2.268 2.268 0 0 1-2.268 2.268h-11.715a2.269 2.269 0 0 1-2.268-2.268l-.107-40.483c.333-9.167-7.083-8.5-7.083-8.5-9.333.167-8.435 11.875-8.435 11.875v37.108a2.268 2.268 0 0 1-2.268 2.268H99.508a2.269 2.269 0 0 1-2.268-2.268V25.208s.685-9.5-7.649-9.5c.001 0-8.249-1.083-7.958 11.834zM383.588 27.431v37.107a2.269 2.269 0 0 1-2.268 2.268l-12.183.236a2.269 2.269 0 0 1-2.268-2.268V25.208s.685-9.5-7.648-9.5c0 0-7.959-.392-7.959 14.503v34.438a2.269 2.269 0 0 1-2.268 2.268h-11.715a2.269 2.269 0 0 1-2.268-2.268V4.292a2.269 2.269 0 0 1 2.268-2.268h10.84a2.268 2.268 0 0 1 2.268 2.268v8.5S354.262.667 365.762.667c0 0 12.319-1.869 16.468 11.015.001-.001 1.358 2.657 1.358 15.749zM299.008.417c-14.98 0-27.125 12.625-27.125 33.875 0 18.709 9.375 33.875 27.125 33.875 16.75 0 27.125-15.166 27.125-33.875 0-20.875-12.144-33.875-27.125-33.875zm9.455 34.625c0 8-1 12.25-1 12.25-1.423 8.457-7.562 8.469-8.467 8.424-.977.039-7.168-.049-8.449-8.424 0 0-1-4.25-1-12.25v-1.333c0-8 1-12.25 1-12.25 1.281-8.375 7.473-8.463 8.449-8.425.905-.045 7.044-.034 8.467 8.425 0 0 1 4.25 1 12.25zM265.084 12.708v-8.66a2.269 2.269 0 0 0-2.268-2.268h-38.72a2.268 2.268 0 0 0-2.268 2.268v8.593a2.269 2.269 0 0 0 2.268 2.268h20.197l-23.906 34.68s-.942 1.406-.911 2.959v10.549s-.156 3.617 3.946 1.518c0 0 7.286-4.402 19.503-4.402 0 0 12.065-.15 20.109 4.781 0 0 3.339 1.518 3.339-1.82v-9.182s.303-2.43-2.884-3.947c0 0-9.258-5.084-21.399-4.25zM56.342 56.124l-3.667-5.582c-1.167-2.084-1.083-4.418-1.083-4.418V20.375C52.092-1.875 27.425.042 27.425.042 5.497.042 2.258 17.107 2.258 17.107c-.914 3.431 1.744 3.514 1.744 3.514l10.715 1.087s1.827.418 2.492-1.757c0 0 1.411-7.445 9.302-7.445 8.586 0 8.497 7.369 8.497 7.369v6.169c-17.14.573-25.083 5.331-25.083 5.331-10.583 6-9.917 17.917-9.917 17.917 0 19.416 18.5 18.582 18.5 18.582 11.833 0 18.833-8.666 18.833-8.666 2.083 3.668 5.917 7.166 5.917 7.166 1.918 2.08 3.917.334 3.917.334l8.667-7.416c1.916-1.418.5-3.168.5-3.168zm-32.059-.24c-5.566 0-7.635-5.531-6.711-10.967.925-5.436 5.729-9.708 17.437-9.583v3.305c.415 14.438-6.093 17.245-10.726 17.245zM212.008 56.124l-3.666-5.582c-1.167-2.084-1.084-4.418-1.084-4.418V20.375c.5-22.25-24.167-20.333-24.167-20.333-21.928 0-25.167 17.065-25.167 17.065-.914 3.431 1.744 3.514 1.744 3.514l10.715 1.087s1.827.418 2.492-1.757c0 0 1.411-7.445 9.302-7.445 8.586 0 8.497 7.369 8.497 7.369v6.169c-17.139.573-25.083 5.331-25.083 5.331-10.583 6-9.917 17.917-9.917 17.917 0 19.416 18.5 18.582 18.5 18.582 11.833 0 18.833-8.666 18.833-8.666 2.084 3.668 5.916 7.166 5.916 7.166 1.918 2.08 3.918.334 3.918.334l8.666-7.416c1.917-1.418.501-3.168.501-3.168zm-32.059-.24c-5.566 0-7.635-5.531-6.711-10.967.925-5.436 5.729-9.708 17.436-9.583v3.305c.416 14.438-6.091 17.245-10.725 17.245z"/>
              <g fill="#f3971b">
                <path d="M241.504 104.862s-.98 1.705.224 2.086c0 0 1.36.531 3.056-1.043 0 0 12.369-10.805 12.667-30.477 0 0 .091-2.457-.895-3.129 0 0-3.875-3.428-17.809-2.385 0 0-12.146.82-18.777 6.707 0 0-.596.521-.596 1.191 0 0-.143 1.447 3.502.82 0 0 12.145-1.715 19.373-.82 0 0 3.727.447 4.77 1.715 0 0 1.714 1.416.819 6.109 0 .002-2.46 11.924-6.334 19.226z"/>
                <path d="M239.055 85.989s1.814 2.35-1.113 4.377c0 0-31.267 25.01-83.767 25.01 0 0-54.042 2.666-99.167-38.334 0 0-1.582-1.389-.6-2.68 0 0 .878-1.188 3.151.104 0 0 42.449 26.451 98.199 26.451 0 0 38.75 1.5 78.5-15.5 0 0 3.167-1.641 4.797.572z"/>
              </g>
            </svg>
            <span>Amazonで購入</span>
          </a>
        </div>
      </div>
    </section>
  </main>

  <?php
  // パンくずリストを読み込み
  $breadcrumb = [
      ['name' => 'サービス一覧', 'url' => $prefix . 'services/'],
      ['name' => 'スキンケアブランド', 'url' => '']
  ];
  include __DIR__ . '/../../templates/breadcrumb.php';
  ?>

  <?php
  // フッターを読み込み
  include __DIR__ . '/../../templates/footer.php';
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
  <script src="<?php echo $prefix; ?>js/common.js" defer></script>
  <script>
    // Scroll-triggered animations
    document.addEventListener('DOMContentLoaded', function() {
      const fadeElements = document.querySelectorAll('.nude-fade-in');
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
          }
        });
      }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      });

      fadeElements.forEach(el => observer.observe(el));

      // Header scroll effect
      const header = document.querySelector('header');
      window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
      });

      // Ingredients toggle (placeholder functionality)
      const ingredientsToggle = document.querySelector('.ingredients-toggle');
      if (ingredientsToggle) {
        ingredientsToggle.addEventListener('click', function() {
          alert('全成分リストは製品発売時に公開予定です。');
        });
      }

      // FAQ Accordion
      const faqItems = document.querySelectorAll('.faq-item');
      faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        const toggle = item.querySelector('.faq-toggle');

        question.addEventListener('click', () => {
          const isOpen = item.classList.contains('open');
          
          // Close all other items
          faqItems.forEach(otherItem => {
            if (otherItem !== item) {
              otherItem.classList.remove('open');
              otherItem.querySelector('.faq-answer').style.maxHeight = null;
              otherItem.querySelector('.faq-toggle').textContent = '+';
            }
          });

          // Toggle current item
          if (isOpen) {
            item.classList.remove('open');
            answer.style.maxHeight = null;
            toggle.textContent = '+';
          } else {
            item.classList.add('open');
            answer.style.maxHeight = answer.scrollHeight + 'px';
            toggle.textContent = '−';
          }
        });
      });
    });
  </script>
</body>
</html>
