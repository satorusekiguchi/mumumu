<?php
require_once __DIR__ . '/../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = '制作実績';
$page_label = '事例紹介';
$hero_title = 'Works';
setPageMeta(
    '制作実績・事例紹介｜Web制作・マーケティング支援｜株式会社mumumu',
    '株式会社mumumuのWeb制作・デジタルマーケティング支援の制作実績一覧。BtoB企業のWebサイトリニューアル、広告運用、SEO対策、D2Cブランド立ち上げなど多数の成功事例をご紹介。',
    $page_title,
    $page_label,
    [
        'keywords' => '制作実績,事例紹介,Web制作,デジタルマーケティング,広告運用,SEO対策,ポートフォリオ,株式会社mumumu',
        'type' => 'website'
    ]
);

// 事例データを読み込み
$works_data = require __DIR__ . '/../data/works.php';

// カテゴリフィルタリング（オプション）
$category = isset($_GET['category']) ? $_GET['category'] : '';
if ($category) {
    $works_data = array_filter($works_data, function($work) use ($category) {
        return $work['category'] === $category;
    });
}

// 日付でソート（新しい順）
usort($works_data, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => '制作実績', 'url' => 'works/']
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

  <?php outputPerformanceOptimizations(); ?>
  <?php outputCriticalCSS(); ?>
  <?php outputDeferredStylesheet($prefix . 'css/style.css'); ?>
  
  <!-- Structured Data -->
  <?php 
  outputOrganizationSchema();
  outputBreadcrumbSchema($breadcrumb_schema);
  outputCreativeWorkSchema($works_data);
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
      $page_title = '制作実績';
      $page_label = '事例紹介';
      $hero_title = 'Works';
      include __DIR__ . '/../templates/sub-hero.php';
      ?>

      <section id="works" class="fade-in-up">
        <?php if (empty($works_data)): ?>
          <div class="work-list">
            <p style="text-align: center; font-size: 1.2rem; color: #888; padding: 100px 0;">準備中</p>
          </div>
        <?php else: ?>
          <div class="work-grid">
            <?php foreach ($works_data as $index => $work): ?>
            <div class="work-grid-item fade-in-up<?php echo $index % 3 === 1 ? ' delay-100' : ($index % 3 === 2 ? ' delay-200' : ''); ?>">
              <a href="<?php echo htmlspecialchars($work['url']); ?>">
                <div class="work-thumb">
                  <img src="<?php echo htmlspecialchars($work['image']); ?>" alt="<?php echo htmlspecialchars($work['title']); ?>" loading="lazy" width="400" height="225" decoding="async">
                </div>
                <h3 class="work-title"><?php echo htmlspecialchars($work['title']); ?></h3>
                <p class="work-client"><?php echo htmlspecialchars($work['client']); ?></p>
                <?php if (!empty($work['description'])): ?>
                <p class="work-description" style="font-size: 0.9rem; color: #aaa; margin-top: 10px;">
                  <?php echo htmlspecialchars($work['description']); ?>
                </p>
                <?php endif; ?>
              </a>
            </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </section>

      <style>
        /* Works Page Grid Layout */
        .work-grid {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 80px 40px;
          max-width: 1200px;
          margin: 0 auto;
        }
        
        .work-grid-item {
          position: relative;
        }
        
        .work-grid-item a {
          display: block;
          text-decoration: none;
          color: inherit;
        }
        
        .work-grid-item .work-thumb {
          position: relative;
          width: 100%;
          padding-top: 56.25%; /* 16:9 aspect ratio */
          overflow: hidden;
          border-radius: 8px;
          margin-bottom: 16px;
        }
        
        .work-grid-item .work-thumb img {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          object-fit: cover;
          object-position: top center;
          transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1), filter 0.6s;
          filter: grayscale(20%) brightness(0.85);
        }
        
        .work-grid-item:hover .work-thumb img {
          transform: scale(1.08);
          filter: grayscale(0%) brightness(1);
        }
        
        .work-grid-item .work-title {
          font-size: 1.1rem;
          font-weight: 600;
          margin-bottom: 8px;
          line-height: 1.4;
        }
        
        .work-grid-item .work-client {
          font-size: 0.85rem;
          color: #888;
          margin-bottom: 8px;
        }
        
        .work-grid-item .work-description {
          font-size: 0.8rem !important;
          color: #777 !important;
          line-height: 1.6;
          display: -webkit-box;
          -webkit-line-clamp: 3;
          -webkit-box-orient: vertical;
          overflow: hidden;
        }
        
        /* Tablet */
        @media (max-width: 1024px) {
          .work-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
          }
        }
        
        /* Mobile */
        @media (max-width: 768px) {
          .work-grid {
            grid-template-columns: 1fr;
            gap: 40px;
          }
          
          .work-grid-item .work-title {
            font-size: 1rem;
          }
          
          .work-grid-item .work-description {
            font-size: 0.85rem !important;
          }
        }
        
        /* Small Mobile */
        @media (max-width: 480px) {
          .work-grid {
            gap: 32px;
          }
          
          .work-grid-item .work-title {
            font-size: 0.95rem;
          }
        }
      </style>
    </div>
  </main>

  <?php
  // パンくずリストを読み込み
  $breadcrumb = [
      ['name' => '制作実績', 'url' => '']
  ];
  include __DIR__ . '/../templates/breadcrumb.php';
  ?>

  <?php
  // フッターを読み込み
  include __DIR__ . '/../templates/footer.php';
  ?>

  <!-- JavaScript loaded with defer to prevent render blocking -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" defer></script>
  <script src="<?php echo $prefix; ?>js/mv-three.js" defer></script>
  <script src="<?php echo $prefix; ?>js/common.js" defer></script>
</body>
</html>
