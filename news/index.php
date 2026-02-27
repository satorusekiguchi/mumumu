<?php
require_once __DIR__ . '/../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'お知らせ';
$page_label = 'ニュース';
$hero_title = 'News';
setPageMeta(
    'お知らせ・最新情報｜株式会社mumumu',
    '株式会社mumumuの最新ニュース、プレスリリース、イベント情報、メディア掲載情報をお届けします。',
    $page_title,
    $page_label,
    [
        'keywords' => 'ニュース,お知らせ,プレスリリース,メディア掲載,イベント,株式会社mumumu',
        'type' => 'website'
    ]
);

// ニュースデータを読み込み
$news_data = require __DIR__ . '/../data/news.php';

// カテゴリ名の日本語変換マッピング
$news_category_labels = [
    'information' => 'お知らせ',
    'release' => 'リリース',
    'media' => 'メディア',
    'event' => 'イベント',
];

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => 'ニュース', 'url' => 'news/']
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

      <section id="news" class="fade-in-up">
        <div class="news-list-area">
          <ul class="news-list">
            <?php foreach ($news_data as $news): 
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
      </section>
    </div>
  </main>

  <?php
  // パンくずリストを読み込み
  $breadcrumb = [
      ['name' => 'お知らせ', 'url' => '']
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
