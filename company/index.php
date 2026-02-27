<?php
require_once __DIR__ . '/../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = '会社概要';
$page_label = '企業情報';
$hero_title = 'Company';
setPageMeta(
    '会社概要・企業情報｜株式会社mumumu【京都のWeb制作会社】',
    '株式会社mumumuの会社概要。京都を拠点にWeb制作・デジタルマーケティング支援を行うクリエイティブカンパニー。代表者情報、事業内容、所在地などをご紹介。',
    $page_title,
    $page_label,
    [
        'keywords' => '株式会社mumumu,会社概要,京都,Web制作会社,デジタルマーケティング,会社情報,企業情報',
        'type' => 'website'
    ]
);

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => '会社概要', 'url' => 'company/']
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
  outputLocalBusinessSchema();
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

      <section id="company" class="fade-in-up">
        <div class="company-info">
          <div class="info-row">
            <div class="info-label">社名</div>
            <div class="info-value">株式会社mumumu - mumumu.Inc</div>
          </div>
          <div class="info-row">
            <div class="info-label">所在地</div>
            <div class="info-value">〒600-8223<br>
              京都府京都市下京区大黒町227番地 第２キョートビル402</div>
          </div>
          <div class="info-row">
            <div class="info-label">設立</div>
            <div class="info-value">2024年5月1日</div>
          </div>
          <div class="info-row">
            <div class="info-label">メール</div>
            <div class="info-value">hello@mumumu.co.jp</div>
          </div>
          <div class="info-row">
            <div class="info-label">資本金</div>
            <div class="info-value">1,000,000円</div>
          </div>
          <div class="info-row">
            <div class="info-label">事業内容</div>
            <div class="info-value">Webサイトの企画・制作<br>
              デジタルマーケティングコンサルティング<br>
              Web広告代理<br>
              ライフスタイル事業</div>
          </div>
          <div class="info-row">
            <div class="info-label">代表取締役</div>
            <div class="info-value">関口 理留</div>
          </div>
        </div>

        <!-- Office Location Section -->
        <div class="office-section fade-in-up delay-200">
          <div class="office-header">
            <span class="office-label">Location</span>
            <h3 class="office-title">Office</h3>
          </div>
          
          <div class="office-content">
            <div class="office-map">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.4892894068!2d135.75491!3d34.9956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001089f8f8f8f8f%3A0x8f8f8f8f8f8f8f8f!2z5Lqs6YO95bqc5Lqs6YO95biC5LiL5Lqs5Yy65aSn6buS55S6MjI355Wq5Zyw!5e0!3m2!1sja!2sjp!4v1234567890"
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
              <div class="map-overlay"></div>
            </div>
            
            <div class="office-details">
              <div class="office-address">
                <div class="address-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                    <circle cx="12" cy="9" r="2.5"/>
                  </svg>
                </div>
                <div class="address-text">
                  <span class="address-label">Address</span>
                  <p>〒600-8223<br>京都府京都市下京区大黒町227番地<br>第２キョートビル402</p>
                </div>
              </div>
              
              <div class="office-access">
                <div class="access-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/>
                    <line x1="4" y1="22" x2="4" y2="15"/>
                  </svg>
                </div>
                <div class="access-text">
                  <span class="access-label">Access</span>
                  <p>地下鉄烏丸線「五条駅」徒歩5分<br>阪急京都線「烏丸駅」徒歩10分</p>
                </div>
              </div>
              
              <a href="https://maps.google.com/maps?q=京都府京都市下京区大黒町227番地+第２キョートビル402" target="_blank" rel="noopener noreferrer" class="office-map-link">
                <span>Google Mapで開く</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M7 17L17 7M17 7H7M17 7V17"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <?php
  // パンくずリストを読み込み
  $breadcrumb = [
      ['name' => '会社概要', 'url' => '']
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
