<?php
require_once __DIR__ . '/../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'サービス一覧';
$page_label = '事業内容';
$hero_title = 'Service';
setPageMeta(
    'サービス一覧｜Web制作・広告運用・グッズ制作｜株式会社mumumu',
    '株式会社mumumuのサービス一覧。Webサイト制作、広告運用代行、SEO対策などのデジタルマーケティング支援、オリジナルグッズ制作のファンダムマーケティング支援、D2C美容品ブランド事業を展開。',
    $page_title,
    $page_label,
    [
        'keywords' => 'Web制作,広告運用,SEO対策,グッズ制作,デジタルマーケティング,ファンダムマーケティング,D2Cブランド,京都',
        'type' => 'website'
    ]
);

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => 'サービス', 'url' => 'services/']
];

// サービス構造化データ
$services_schema = [
    [
        'name' => 'デジタルマーケティング支援',
        'description' => 'BtoB企業の成長を加速するデジタルマーケティング支援。Web制作、広告運用、SEO対策を包括的に提供します。',
        'url' => SITE_URL . '/services/digital-marketing/'
    ],
    [
        'name' => 'ファンダムマーケティング支援',
        'description' => 'オリジナルグッズの企画・デザインから製造まで。企業ノベルティから推し活グッズまで幅広く対応します。',
        'url' => SITE_URL . '/services/fandom-marketing/'
    ],
    [
        'name' => '美容ブランド事業（núːd）',
        'description' => '「個人の好き」を追求する姿勢を体現する、自社D2C美容ブランド事業。保湿特化美容液2026年4月発売予定。',
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
  <link rel="stylesheet" href="<?php echo $prefix; ?>services/services-style.css" onload="document.documentElement.classList.remove('css-loading');">
  
  <!-- Structured Data -->
  <?php 
  outputOrganizationSchema();
  outputBreadcrumbSchema($breadcrumb_schema);
  outputServiceSchema($services_schema);
  outputWebPageSchema($page_meta['title'], $page_meta['description']);
  ?>
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
  include __DIR__ . '/../templates/header.php';
  include __DIR__ . '/../templates/nav.php';
  ?>

  <main class="services-page">
    <div class="inner">
      <!-- Sub Page Hero -->
      <?php include __DIR__ . '/../templates/sub-hero.php'; ?>
    </div>

    <!-- Services Grid -->
    <section class="sv-section">
      <div class="sv-container">
        <div class="sv-grid">
          
          <!-- Digital Marketing -->
          <a href="<?php echo $prefix; ?>services/digital-marketing/" class="sv-card sv-card-dm fade-in-up">
            <div class="sv-card-num">01</div>
            <div class="sv-card-content">
              <span class="sv-card-label">BtoB Marketing</span>
              <h2 class="sv-card-title">Digital Marketing</h2>
              <p class="sv-card-desc">
                BtoB企業の成長を加速するデジタルマーケティング支援。
                Web制作、広告運用、SEO対策を包括的に提供します。
              </p>
              <ul class="sv-card-list">
                <li>Web Creative / Web制作</li>
                <li>Web Advertising / 広告運用</li>
                <li>SEO Consulting / SEO対策</li>
              </ul>
              <span class="sv-card-link">
                <span>View Details</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
              </span>
            </div>
          </a>

          <!-- Fandom Marketing -->
          <a href="<?php echo $prefix; ?>services/fandom-marketing/" class="sv-card sv-card-fandom fade-in-up delay-200">
            <div class="sv-card-num">02</div>
            <div class="sv-card-content">
              <span class="sv-card-label">Goods Production</span>
              <h2 class="sv-card-title">Fandom Marketing</h2>
              <p class="sv-card-desc">
                オリジナルグッズの企画・デザインから製造まで。
                企業ノベルティから推し活グッズまで幅広く対応します。
              </p>
              <ul class="sv-card-list">
                <li>Design / グッズデザイン</li>
                <li>Manufacturing / グッズ製造</li>
                <li>Total Support / トータルサポート</li>
              </ul>
              <span class="sv-card-link">
                <span>View Details</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
              </span>
            </div>
          </a>

          <!-- Beauty -->
          <a href="<?php echo $prefix; ?>services/beauty/" class="sv-card sv-card-beauty fade-in-up delay-400">
            <div class="sv-card-num">03</div>
            <div class="sv-card-content">
              <span class="sv-card-label">D2C Brand</span>
              <h2 class="sv-card-title">Beauty</h2>
              <p class="sv-card-desc">
                「個人の好き」を追求する姿勢を体現する、自社ブランド事業。
                素の自分を、もっと好きになる。
              </p>
              <div class="sv-card-brand">
                <span class="sv-card-brand-name">núːd</span>
                <span class="sv-card-brand-status">Coming Soon</span>
              </div>
              <p class="sv-card-brand-desc">保湿特化美容液 / 2026年4月発売予定</p>
              <span class="sv-card-link">
                <span>View Details</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
              </span>
            </div>
          </a>

        </div>
      </div>
    </section>

    <!-- Philosophy Section -->
    <section class="sv-section sv-philosophy">
      <div class="sv-container">
        <div class="sv-philosophy-content fade-in-up">
          <span class="sv-philosophy-label">Our Approach</span>
          <h2 class="sv-philosophy-title">
            手法にとらわれず、<br>
            本質的な価値を追求する
          </h2>
          <p class="sv-philosophy-text">
            私たちmumumuは「個人の好き」を起点に経済を動かすクリエイティブカンパニーです。<br>
            デジタルマーケティング支援では、クライアントの情熱をビジネス成果に繋げるサポートを。<br>
            自社ブランド事業では、私たち自身が「好き」を追求する姿勢を体現します。<br><br>
            2つの事業は、同じ哲学から生まれた、異なるアプローチ。<br>
            どちらも「好きを価値に変える」という想いで取り組んでいます。
          </p>
          <div class="sv-philosophy-link">
            <a href="<?php echo $prefix; ?>mission/" class="sv-btn">
              <span>私たちの想いを見る</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="sv-section">
      <div class="sv-container">
        <?php
        $cta_title = 'Contact';
        $cta_text = 'サービスに関するご質問・ご相談はお気軽にお問い合わせください。';
        $cta_btn_text = 'お問い合わせ';
        include($prefix . 'templates/cta.php');
        ?>
      </div>
    </section>
  </main>

  <?php
  // パンくずリストを読み込み
  $breadcrumb = [
      ['name' => 'サービス一覧', 'url' => '']
  ];
  include __DIR__ . '/../templates/breadcrumb.php';
  ?>

  <?php
  // フッターを読み込み
  include __DIR__ . '/../templates/footer.php';
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" defer></script>
  <script src="<?php echo $prefix; ?>js/mv-three.js" defer></script>
  <script src="<?php echo $prefix; ?>js/common.js" defer></script>
</body>
</html>
