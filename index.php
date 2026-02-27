<?php
require_once __DIR__ . '/includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
setPageMeta(
    '株式会社mumumu | 個人の好きで経済を動かす | 京都のWeb制作・デジタルマーケティング会社',
    '京都のWeb制作・デジタルマーケティング会社mumumu。Webサイト制作、広告運用、SEO対策、SNS運用、D2Cブランド開発まで一貫支援。個人の情熱を起点に新たな経済圏を生み出すクリエイティブカンパニーです。',
    '',
    '',
    [
        'keywords' => 'Web制作,デジタルマーケティング,広告運用,SEO対策,京都,SNS運用,D2Cブランド,Webサイト制作会社,マーケティング支援',
        'type' => 'website'
    ]
);

// 事例データを読み込み（トップページでは最新6件を表示）
$works_data = require __DIR__ . '/data/works.php';
// 日付でソート（新しい順）
usort($works_data, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});
$works_display = array_slice($works_data, 0, 6);

// ニュースデータを読み込み（トップページでは最新3件を表示）
$news_data = require __DIR__ . '/data/news.php';
$news_display = array_slice($news_data, 0, 3);

// カテゴリ名の日本語変換マッピング（ニュース用）
$news_category_labels = [
    'information' => 'お知らせ',
    'release' => 'リリース',
    'media' => 'メディア',
    'event' => 'イベント',
];

// カテゴリ名の日本語変換マッピング
$category_labels = [
    'digital-marketing' => 'デジタルマーケティング',
    'brand' => 'ブランド開発',
    'web' => 'Web制作',
    'sns' => 'SNS運用',
    'seo' => 'SEO対策',
];

// トップページ用サービス構造化データ
$services_schema = [
    [
        'name' => 'デジタルマーケティング支援',
        'description' => 'Web制作、広告運用、SEO対策など、BtoB企業の成長を加速するデジタルマーケティング支援サービス',
        'url' => SITE_URL . '/services/digital-marketing/'
    ],
    [
        'name' => 'ファンダムマーケティング支援',
        'description' => 'オリジナルグッズの企画・デザインから製造まで一貫対応。企業ノベルティから推し活グッズまで',
        'url' => SITE_URL . '/services/fandom-marketing/'
    ],
    [
        'name' => '美容ブランド事業',
        'description' => 'D2C美容ブランド「núːd」の企画・開発。ウィルエイジング美容液2026年発売予定',
        'url' => SITE_URL . '/services/beauty/'
    ]
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
  
  <!-- Preconnect for performance (DNS prefetch) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
  <link rel="preconnect" href="https://ajax.googleapis.com" crossorigin>
  
  <!-- Critical CSS inline for faster FCP -->
  <style>
    /* FOUC Prevention - hide until CSS loads */
    html.css-loading body{visibility:hidden}
    html.css-loading .bigbang-loader{visibility:visible}
    /* Critical CSS for above-the-fold content */
    :root{--text-color:#f0f0f0;--bg-color:#0a0a0a;--font-base:'Noto Sans JP',sans-serif;--font-en:'Oswald',sans-serif;--font-impact:'Anton',sans-serif;--font-logo:'Nanum Pen Script',cursive}
    *,*::before,*::after{box-sizing:border-box}
    body,html{margin:0;padding:0;font-family:var(--font-base);font-size:15px;line-height:1.8;color:var(--text-color);background:var(--bg-color);-webkit-font-smoothing:antialiased;overflow-x:hidden}
    body.loading{overflow:hidden}
    .bigbang-loader{position:fixed;top:0;left:0;width:100%;height:100%;background:#000;z-index:99999;display:flex;align-items:center;justify-content:center}
    .bigbang-loader.hidden{opacity:0;pointer-events:none}
    .bigbang-loader.removed{display:none}
    html.no-loader #bigbang-loader{display:none!important}
    #mv-canvas{position:fixed;top:0;left:0;width:100%;height:100%;z-index:0;pointer-events:none}
    header{position:fixed;top:0;left:0;width:100%;height:80px;z-index:9999;display:flex;justify-content:space-between;align-items:center;padding:0 40px;background:transparent;mix-blend-mode:difference}
    .logo a{font-family:var(--font-logo);font-size:2.5rem;color:#fff;text-decoration:none}
    .menu-trigger{position:fixed;top:30px;right:40px;z-index:1006;cursor:pointer;font-family:var(--font-en);font-size:14px;color:#fff}
    /* Hide navigation menu by default */
    .global-nav{position:fixed;top:0;left:0;width:100%;height:100vh;opacity:0;pointer-events:none;z-index:1002}
    #mv{height:100vh;display:flex;align-items:center;justify-content:center;text-align:center;padding:0 40px;position:relative}
    .mv-content{position:relative;z-index:1;max-width:800px;margin:0 auto;padding:60px}
    #mv h1{font-family:var(--font-impact);font-weight:bold;font-size:3rem;line-height:1.2;margin-bottom:30px;color:#fff}
    .fade-in-up{opacity:0;transform:translateY(50px)}
    .fade-in-up.show{opacity:1;transform:translateY(0)}
    @media(max-width:768px){header{padding:0 20px;height:60px}.menu-trigger{top:20px;right:20px}#mv h1{font-size:2.2rem}.mv-content{padding:40px 30px}}
  </style>
  <script>document.documentElement.classList.add('css-loading');</script>
  
  <!-- Google Fonts with display=swap for better performance -->
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Noto+Sans+JP:wght@400;500;700&family=Oswald:wght@400;500;700&family=Anton&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Noto+Sans+JP:wght@400;500;700&family=Oswald:wght@400;500;700&family=Anton&display=swap"></noscript>
  
  <!-- Non-critical CSS loaded asynchronously -->
  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"></noscript>
  
  <link rel="stylesheet" href="<?php echo $prefix; ?>css/style.css" media="print" onload="this.media='all';document.documentElement.classList.remove('css-loading');">
  <noscript><link rel="stylesheet" href="<?php echo $prefix; ?>css/style.css"></noscript>
  
  <!-- Big Bang Loader 初回判定（先行実行） -->
  <script>
    (function() {
      // URLパラメータ ?loader=1 でテスト可能
      var urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('loader') === '1') {
        sessionStorage.removeItem('mumumu_visited');
        return;
      }
      var visited = sessionStorage.getItem('mumumu_visited');
      if (visited) {
        document.documentElement.classList.add('no-loader');
      }
    })();
  </script>
  <style>
    html.no-loader #bigbang-loader { display: none !important; }
  </style>
  
  <!-- Structured Data for SEO & LLMO -->
  <?php 
  outputOrganizationSchema();
  outputWebSiteSchema();
  outputLocalBusinessSchema();
  outputServiceSchema($services_schema);
  ?>
</head>

<body itemscope itemtype="https://schema.org/WebPage">

  <?php outputGTMNoscript(); ?>

  <!-- Big Bang Loading (初回のみ) -->
  <div id="bigbang-loader" class="bigbang-loader">
    <div class="bigbang-core"></div>
    <div class="bigbang-ring bigbang-ring-1"></div>
    <div class="bigbang-ring bigbang-ring-2"></div>
    <div class="bigbang-ring bigbang-ring-3"></div>
    <div class="bigbang-particles">
      <?php for($i = 0; $i < 60; $i++): ?>
      <div class="bigbang-particle"></div>
      <?php endfor; ?>
    </div>
    <div class="bigbang-flash"></div>
    <div class="bigbang-logo">
      <span class="bigbang-logo-char">m</span>
      <span class="bigbang-logo-char">u</span>
      <span class="bigbang-logo-char">m</span>
      <span class="bigbang-logo-char">u</span>
      <span class="bigbang-logo-char">m</span>
      <span class="bigbang-logo-char">u</span>
    </div>
  </div>

  <!-- Three.js Canvas for Space Effect -->
  <canvas id="mv-canvas" aria-hidden="true"></canvas>

  <!-- Background Lines Effect -->
  <div class="lines" aria-hidden="true">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>

  <?php
  // ヘッダーとナビゲーションを読み込み
  $level = 0;
  include __DIR__ . '/templates/header.php';
  include __DIR__ . '/templates/nav.php';
  ?>

  <!-- Main Visual -->
  <div id="mv">
    <div class="mv-content">
      <h1 class="fade-in-up">
        あなたの<br>
        「<span id="suki-trigger" class="suki-secret">好き</span>」が、<br>
        世界を動かす。
      </h1>
      <p class="en-message fade-in-up delay-200">Your passion moves the world.</p>
    </div>
  </div>

  <main>

    <!-- Who we are -->
    <section id="who-we-are">
      <div class="inner">
        <div class="section-header fade-in-up">
          <h2 class="section-title" data-text="Who we are">Who we are</h2>
          <span class="section-label">/ 私たちについて</span>
        </div>
        <div class="who-we-are-content fade-in-up delay-200">
          <p class="who-we-are-lead">
            WE ARE THE CREATIVE FORCE<br>
            THAT MOVES THE ECONOMY<br>
            WITH "INDIVIDUAL PASSION".
          </p>
          <p class="who-we-are-text">
            私たちmumumuは「個人の好き」を起点に経済を動かすクリエイティブカンパニーです。<br>
            デジタルマーケティング、Web制作、D2Cブランド開発など、<br>
            手法にとらわれず、情熱を価値に変えるためのあらゆるサポートを行っています。
          </p>
          <div class="who-we-are-links fade-in-up delay-400">
            <a href="<?php echo $prefix; ?>mission/" class="who-we-are-link-item">私たちの想いを見る</a>
            <a href="<?php echo $prefix; ?>company/" class="who-we-are-link-item">会社概要</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Service -->
    <section id="service">
      <div class="inner">
        <div class="section-header fade-in-up">
          <h2 class="section-title" data-text="Service">Service</h2>
          <span class="section-label">/ サービス</span>
        </div>
        <div class="service-grid fade-in-up">
          <div class="service-card fade-in-up">
            <div class="service-card-icon">01</div>
            <h3 class="service-card-title">Digital Marketing</h3>
            <p class="service-card-desc">
              Web制作や広告運用など、顧客の「好き」をビジネスに繋げるデジタルマーケティング支援。
            </p>
            <div class="service-card-features">
              <span class="feature-tag">Web制作</span>
              <span class="feature-tag">広告運用</span>
              <span class="feature-tag">SEO対策</span>
            </div>
            <a href="<?php echo $prefix; ?>services/digital-marketing/" class="service-card-link">詳細を見る →</a>
          </div>

          <div class="service-card fade-in-up delay-200">
            <div class="service-card-icon">02</div>
            <h3 class="service-card-title">Fandom Marketing</h3>
            <p class="service-card-desc">
              オリジナルグッズのデザインから製造まで。企業ノベルティから推し活グッズまで幅広く対応。
            </p>
            <div class="service-card-features">
              <span class="feature-tag">グッズデザイン</span>
              <span class="feature-tag">グッズ製造</span>
              <span class="feature-tag">小ロット対応</span>
            </div>
            <a href="<?php echo $prefix; ?>services/fandom-marketing/" class="service-card-link">詳細を見る →</a>
          </div>

          <div class="service-card fade-in-up delay-400">
            <div class="service-card-icon">03</div>
            <h3 class="service-card-title">Beauty Brand</h3>
            <p class="service-card-desc">
              「個人の好き」を追求する姿勢を体現する、自社ブランド事業。新商品「núːd」coming soon。
            </p>
            <div class="service-card-features">
              <span class="feature-tag">D2Cブランド</span>
              <span class="feature-tag">商品企画</span>
            </div>
            <a href="<?php echo $prefix; ?>services/beauty/" class="service-card-link">詳細を見る →</a>
          </div>
        </div>
        <div class="view-all fade-in-up delay-600">
          <a href="<?php echo $prefix; ?>services/">すべてのサービスを見る</a>
        </div>
      </div>
    </section>

    <!-- Work -->
    <section id="work">
      <div class="inner">
        <div class="section-header fade-in-up">
          <h2 class="section-title" data-text="Work">Work</h2>
          <span class="section-label">/ 制作実績</span>
        </div>

        <div class="work-intro fade-in-up delay-200">
          <p>
            クライアントの「好き」を形にし、<br>
            ビジネス成果に繋げた実績をご紹介します。
          </p>
        </div>

        <div class="work-carousel-wrapper">
          <div class="work-carousel-container">
            <div class="work-list" id="workCarousel">
              <?php foreach ($works_display as $index => $work): ?>
              <article class="work-item fade-in-up<?php echo $index % 2 === 1 ? ' delay-200' : ''; ?>">
                <a href="<?php echo htmlspecialchars($work['url']); ?>" class="work-link">
                  <div class="work-thumb">
                    <img src="<?php echo htmlspecialchars($work['image']); ?>" alt="<?php echo htmlspecialchars($work['title']); ?>" loading="lazy" width="400" height="225" decoding="async">
                    <div class="work-overlay">
                      <div class="work-overlay-content">
                        <span class="work-view">View Project</span>
                        <span class="work-arrow">→</span>
                      </div>
                    </div>
                    <div class="work-number"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></div>
                  </div>
                  <div class="work-info">
                    <div class="work-meta">
                      <?php if (!empty($work['category'])): 
                        $category_label = isset($category_labels[$work['category']]) ? $category_labels[$work['category']] : $work['category'];
                      ?>
                      <span class="work-category"><?php echo htmlspecialchars($category_label); ?></span>
                      <?php endif; ?>
                      <?php if (!empty($work['date'])): ?>
                      <span class="work-date"><?php echo date('Y.m', strtotime($work['date'])); ?></span>
                      <?php endif; ?>
                    </div>
                    <h3 class="work-title"><?php echo htmlspecialchars($work['title']); ?></h3>
                    <p class="work-client"><?php echo htmlspecialchars($work['client']); ?></p>
                    <?php if (!empty($work['description'])): ?>
                    <p class="work-description"><?php echo htmlspecialchars($work['description']); ?></p>
                    <?php endif; ?>
                  </div>
                </a>
              </article>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="work-carousel-controls">
            <button class="work-carousel-btn work-carousel-prev" aria-label="前へ">
              <span>←</span>
            </button>
            <button class="work-carousel-btn work-carousel-next" aria-label="次へ">
              <span>→</span>
            </button>
          </div>
        </div>

        <div class="view-all fade-in-up">
          <a href="<?php echo $prefix; ?>works/">すべての実績を見る</a>
        </div>
      </div>
    </section>

    <!-- News -->
    <section id="news">
      <div class="inner">
        <div class="section-header fade-in-up">
          <h2 class="section-title" data-text="News">News</h2>
          <span class="section-label">/ お知らせ</span>
        </div>

        <div class="news-list-area fade-in-up delay-200">
          <ul class="news-list">
            <?php foreach ($news_display as $news): 
              $news_category_label = isset($news_category_labels[$news['category']]) ? $news_category_labels[$news['category']] : $news['category'];
            ?>
            <li class="item">
              <p class="date"><?php echo htmlspecialchars($news['date']); ?></p>
              <p class="category"><span><?php echo htmlspecialchars($news_category_label); ?></span></p>
              <p class="title"><?php echo htmlspecialchars($news['title']); ?></p>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="view-all fade-in-up delay-400">
          <a href="<?php echo $prefix; ?>news/">すべてのお知らせを見る</a>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="inner">
        <?php
        $cta_title = 'Contact Us';
        $cta_text = 'お仕事のご相談からお見積もりなど、<br>お気軽にどうぞ。';
        $cta_btn_text = 'お問い合わせ';
        include($prefix . 'templates/cta.php');
        ?>
      </div>
    </section>

  </main>

  <?php
  // フッターを読み込み
  include __DIR__ . '/templates/footer.php';
  ?>

  <!-- JavaScript loaded with defer to prevent render blocking -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" defer></script>
  <script src="<?php echo $prefix; ?>js/mv-three.js" defer></script>
  <script src="<?php echo $prefix; ?>js/common.js" defer></script>
</body>
</html>
