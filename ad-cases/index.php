<?php
require_once __DIR__ . '/../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'Ad Cases';
$page_label = '広告運用事例';
setPageMeta(
    'Web広告運用実績・成功事例｜リスティング・SNS広告｜株式会社mumumu',
    '株式会社mumumuのWeb広告運用実績・成功事例一覧。Google広告、Yahoo!広告、Meta広告（Facebook/Instagram）、LINE広告など、各種広告媒体での運用成果をご紹介。',
    $page_title,
    $page_label,
    [
        'keywords' => 'Web広告,リスティング広告,SNS広告,広告運用,運用実績,成功事例,Google広告,Yahoo広告,Meta広告,株式会社mumumu',
        'type' => 'website'
    ]
);

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => '広告運用事例', 'url' => 'ad-cases/']
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

  <main>
    <div class="inner">
      <!-- Sub Page Hero -->
      <?php
      include __DIR__ . '/../templates/sub-hero.php';
      ?>

      <section id="ad-cases" class="fade-in-up">
        <div class="work-list">
          <p style="text-align: center; font-size: 1.2rem; color: #888; padding: 100px 0;">準備中</p>
        </div>
      </section>
    </div>
  </main>

  <?php
  // パンくずリストを読み込み
  $breadcrumb = [
      ['name' => 'Ad Cases', 'url' => '']
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
