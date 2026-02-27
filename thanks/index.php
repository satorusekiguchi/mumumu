<?php
require_once __DIR__ . '/../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'お問い合わせ完了';
$page_label = 'お問い合わせ完了';
$hero_title = 'Thank you';
setPageMeta(
    'お問い合わせありがとうございます｜株式会社mumumu',
    'お問い合わせを受け付けました。株式会社mumumuへのお問い合わせありがとうございます。',
    $page_title,
    $page_label,
    [
        'robots' => 'noindex, nofollow'
    ]
);

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => 'お問い合わせ', 'url' => 'contact/'],
    ['name' => '送信完了', 'url' => 'thanks/']
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
  <?php outputBreadcrumbSchema($breadcrumb_schema); ?>
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

      <section id="thanks" class="fade-in-up">
        <div class="thanks-content">
          <!-- Success Icon -->
          <div class="thanks-icon">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
              <path d="M8 12L11 15L16 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>

          <h2 class="thanks-heading">Thank you for<br>your message.</h2>
          <p class="thanks-subheading">お問い合わせありがとうございました。</p>
          
          <div class="thanks-message">
            <p>
              このたびは、株式会社mumumuへお問い合わせ頂き誠にありがとうございます。<br class="pc">
              お送り頂きました内容を確認の上、<strong>3営業日以内</strong>に折り返しご連絡させて頂きます。<br class="pc">
              また、ご記入頂いたメールアドレスへ、自動返信の確認メールをお送りしております。
            </p>

            <p>
              しばらく経ってもメールが届かない場合は、入力頂いたメールアドレスが間違っているか、<br class="pc">
              迷惑メールフォルダに振り分けられている可能性がございます。<br class="pc">
              また、<strong>ドメイン指定をされている場合は、「@mumumu.co.jp」からのメールが受信できるようあらかじめ設定</strong>をお願いいたします。
            </p>

            <p>
              以上の内容をご確認の上、お手数ですがもう一度フォームよりお問い合わせ頂きますようお願い申し上げます。
            </p>
          </div>

          <div class="thanks-action">
            <a href="<?php echo $prefix; ?>" class="contact-btn">
              トップページへ戻る
            </a>
          </div>
        </div>
      </section>
    </div>
  </main>

  <?php
  // パンくずリストを読み込み
  $breadcrumb = [
      ['name' => 'お問い合わせ', 'url' => $prefix . 'contact/'],
      ['name' => '送信完了', 'url' => '']
  ];
  include __DIR__ . '/../templates/breadcrumb.php';
  ?>

  <?php
  // フッターを読み込み
  include __DIR__ . '/../templates/footer.php';
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" defer></script>
  <script src="<?php echo $prefix; ?>js/mv-three.js" defer></script>
  <script src="<?php echo $prefix; ?>js/common.js" defer></script>
</body>
</html>

