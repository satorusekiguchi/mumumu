<?php
require_once __DIR__ . '/../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'お問い合わせ';
$page_label = 'ご相談・お見積り';
$hero_title = 'Contact';
setPageMeta(
    'お問い合わせ｜Web制作・マーケティングのご相談｜株式会社mumumu',
    'Web制作、デジタルマーケティング、グッズ制作のご相談・お見積りはこちら。株式会社mumumuへのお問い合わせフォーム。お気軽にご連絡ください。',
    $page_title,
    $page_label,
    [
        'keywords' => 'お問い合わせ,Web制作相談,マーケティング相談,見積もり,株式会社mumumu,京都',
        'type' => 'website'
    ]
);

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => 'お問い合わせ', 'url' => 'contact/']
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

      <section id="contact" class="fade-in-up">
        <div class="form-list-area" style="max-width: 800px; margin: 0 auto;">

          <!-- Progress -->
          <div class="form-progress">
            <div class="form-progress-track">
              <div class="form-progress-bar" id="form-progress-bar"></div>
            </div>
            <span class="form-progress-count" id="form-progress-count">0 / 5</span>
          </div>

          <form action="<?php echo $prefix; ?>php/mailform.php" method="post" id="mail_form" novalidate>

            <!-- Honeypot — hidden from humans -->
            <div aria-hidden="true" style="position:absolute;left:-9999px;top:-9999px;height:0;width:0;overflow:hidden;">
              <label for="_website">Leave this empty</label>
              <input type="text" name="_website" id="_website" value="" tabindex="-1" autocomplete="off">
            </div>

            <!-- 会社名（任意） -->
            <div class="form-group" data-field="company">
              <label for="company" class="form-label">
                会社名
                <span class="form-tag form-tag--optional">任意</span>
              </label>
              <div class="form-input-wrap">
                <input type="text" id="company" name="company" autocomplete="organization" placeholder=" ">
              </div>
            </div>

            <!-- お名前 -->
            <div class="form-group" data-field="name_1">
              <label for="name_1" class="form-label">
                お名前
                <span class="form-tag form-tag--required">必須</span>
              </label>
              <div class="form-input-wrap">
                <input type="text" id="name_1" name="name_1" required aria-required="true" autocomplete="name" placeholder=" ">
                <svg class="form-check-icon" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <p class="field-error" role="alert" aria-live="polite"></p>
            </div>

            <!-- 電話番号 -->
            <div class="form-group" data-field="phone">
              <label for="phone" class="form-label">
                電話番号
                <span class="form-tag form-tag--required">必須</span>
              </label>
              <div class="form-input-wrap">
                <input type="tel" id="phone" name="phone" required aria-required="true" autocomplete="tel" placeholder=" ">
                <svg class="form-check-icon" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <p class="field-error" role="alert" aria-live="polite"></p>
            </div>

            <!-- メールアドレス -->
            <div class="form-group" data-field="mail_address">
              <label for="mail_address" class="form-label">
                メールアドレス
                <span class="form-tag form-tag--required">必須</span>
              </label>
              <div class="form-input-wrap">
                <input type="email" id="mail_address" name="mail_address" required aria-required="true" autocomplete="email" placeholder=" ">
                <svg class="form-check-icon" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <p class="field-error" role="alert" aria-live="polite"></p>
            </div>

            <!-- お問い合わせ内容 -->
            <div class="form-group" data-field="inquiry">
              <label for="inquiry" class="form-label">
                お問い合わせ内容
                <span class="form-tag form-tag--required">必須</span>
              </label>
              <div class="form-input-wrap form-input-wrap--select">
                <select id="inquiry" name="inquiry" required aria-required="true">
                  <option value="">選択してください</option>
                  <option value="広告運用代行に関するご相談">広告運用代行に関するご相談</option>
                  <option value="インハウス化支援に関するご相談">インハウス化支援に関するご相談</option>
                  <option value="Web制作に関するご相談">Web制作に関するご相談</option>
                  <option value="ファンダムマーケティングに関するご相談">ファンダムマーケティングに関するご相談</option>
                  <option value="美容品事業に関するお問い合わせ">美容品事業に関するお問い合わせ</option>
                  <option value="SEO・MEO対策に関するご相談">SEO・MEO対策に関するご相談</option>
                  <option value="採用に関するお問い合わせ">採用に関するお問い合わせ</option>
                  <option value="協業に関するお問い合わせ">協業に関するお問い合わせ</option>
                  <option value="その他">その他</option>
                </select>
                <svg class="form-select-arrow" viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <svg class="form-check-icon" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <p class="field-error" role="alert" aria-live="polite"></p>
            </div>

            <!-- お問い合わせ詳細 -->
            <div class="form-group" data-field="contents">
              <label for="contents" class="form-label">
                お問い合わせ詳細
                <span class="form-tag form-tag--required">必須</span>
              </label>
              <div class="form-input-wrap">
                <textarea id="contents" name="contents" rows="8" required aria-required="true" placeholder=" "></textarea>
                <svg class="form-check-icon" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <p class="field-error" role="alert" aria-live="polite"></p>
            </div>

            <!-- Submit -->
            <div class="form-submit-area" id="form_submit">
              <button type="button" id="glass_submit_button" class="liquid-glass-btn">
                <span class="btn-text">送信する</span>
                <span class="btn-highlight"></span>
                <span class="btn-wave"></span>
                <span class="btn-shimmer"></span>
                <span class="btn-spinner"></span>
                <div class="liquid-glass-btn-shadow"></div>
              </button>
            </div>

          </form>
        </div>
      </section>
    </div>
  </main>

  <?php
  // パンくずリストを読み込み
  $breadcrumb = [
      ['name' => 'お問い合わせ', 'url' => '']
  ];
  include __DIR__ . '/../templates/breadcrumb.php';
  ?>

  <?php
  // フッターを読み込み
  include __DIR__ . '/../templates/footer.php';
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" defer></script>
  <script src="<?php echo $prefix; ?>js/mv-three.js" defer></script>
  <script src="<?php echo $prefix; ?>js/common.js" defer></script>
  <script src="<?php echo $prefix; ?>js/contact-form.js" defer></script>
</body>
</html>
