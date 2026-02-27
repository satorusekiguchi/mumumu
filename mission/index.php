<?php
require_once __DIR__ . '/../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'mumumuについて';
$page_label = 'mumumuについて';
$hero_title = 'Who we are';
setPageMeta(
    'mumumuについて｜ミッション・ビジョン・バリュー｜株式会社mumumu',
    '株式会社mumumuのミッション・ビジョン・バリュー。「個人の好きで経済を動かす」を理念に、クリエイティブの力で新しい価値を創造するクリエイティブカンパニーです。',
    $page_title,
    $page_label,
    [
        'keywords' => 'ミッション,ビジョン,バリュー,企業理念,mumumu,個人の好き,経済を動かす,ファンダムマーケティング',
        'type' => 'website'
    ]
);

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => 'mumumuについて', 'url' => 'mission/']
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

      <!-- Mission -->
      <section class="mvv-section fade-in-up">
        <div class="mvv-header">
          <span class="mvv-number">01</span>
          <h2 class="mvv-title">Mission</h2>
        </div>
        <div class="mvv-body">
          <h3 class="mvv-catchcopy">「個人の好き」で経済を動かす。</h3>
          <p class="mvv-text">
            全てのビジネスは、誰かの「好き」から始まります。<br>
            私たちは、クライアント、ユーザー、そして私たち自身の内にある小さな「熱狂」を見逃しません。<br>
            数字やデータも重要ですが、その奥にある「人の想い」を最優先に考え、全ての活動の起点とします。
          </p>
        </div>
      </section>

      <!-- Vision -->
      <section class="mvv-section fade-in-up delay-200">
        <div class="mvv-header">
          <span class="mvv-number">02</span>
          <h2 class="mvv-title">Vision</h2>
        </div>
        <div class="mvv-body">
          <h3 class="mvv-catchcopy">誰もが「好き」を仕事にし、<br class="sp">人生を謳歌できる社会へ。</h3>
          <p class="mvv-text">
            私たちが目指すのは、"Passion Economy"（情熱経済）が当たり前になる世界です。
          </p>
          <p class="mvv-text">
            個人のクリエイター、アーティスト、そして何かに熱中する全ての人が、その情熱を価値に変え、持続可能なビジネスとして自立できる。企業は、そうした個人の熱狂を搾取するのではなく、共に歩み、共創することで、より深いブランド価値を築き上げる。
          </p>
          <p class="mvv-text">
            「好き」がただの趣味で終わらず、社会を豊かにする原動力となる未来。私たちはデジタルの力で、その未来を実装します。
          </p>
        </div>
      </section>

      <!-- Core Values -->
      <section class="mvv-section fade-in-up delay-400">
        <div class="mvv-header">
          <span class="mvv-number">03</span>
          <h2 class="mvv-title">Values</h2>
        </div>
        <div class="mvv-body">
          <p class="mvv-lead">私たちが大切にする4つの価値観</p>
          
          <div class="values-list">
            <div class="value-item">
              <div class="value-header">
                <span class="value-number">01</span>
                <div class="value-titles">
                  <h3 class="value-title-en">Enthusiasm</h3>
                  <h4 class="value-title-ja">熱狂を尊重する</h4>
                </div>
              </div>
              <p class="value-text">
                全てのビジネスは、誰かの「好き」から始まります。私たちは、クライアント、ユーザー、そして私たち自身の内にある小さな「熱狂」を見逃しません。数字やデータも重要ですが、その奥にある「人の想い」を最優先に考え、全ての活動の起点とします。
              </p>
            </div>

            <div class="value-item">
              <div class="value-header">
                <span class="value-number">02</span>
                <div class="value-titles">
                  <h3 class="value-title-en">Curiosity</h3>
                  <h4 class="value-title-ja">好奇心で探求する</h4>
                </div>
              </div>
              <p class="value-text">
                変化の激しいデジタル領域において、現状維持は後退を意味します。「なぜ？」を問い続け、未知のテクノロジーやトレンドを面白がりながら探求する。その子供のような好奇心こそが、常識を覆すイノベーションの源泉です。
              </p>
            </div>

            <div class="value-item">
              <div class="value-header">
                <span class="value-number">03</span>
                <div class="value-titles">
                  <h3 class="value-title-en">Creativity</h3>
                  <h4 class="value-title-ja">創造力で支援する</h4>
                </div>
              </div>
              <p class="value-text">
                「好き」を形にするには、泥臭い努力と高度な技術が必要です。私たちはプロフェッショナルとして、戦略、デザイン、テクノロジーを駆使し、抽象的な情熱を、目に見える成果（ビジネス）へと変換する創造力を提供します。
              </p>
            </div>

            <div class="value-item">
              <div class="value-header">
                <span class="value-number">04</span>
                <div class="value-titles">
                  <h3 class="value-title-en">Collaboration</h3>
                  <h4 class="value-title-ja">共創を楽しむ</h4>
                </div>
              </div>
              <p class="value-text">
                一方的な支援ではなく、共に走るパートナーでありたい。クライアントやクリエイターと同じ視点に立ち、苦悩も喜びも分かち合いながら、新しい価値を共に創り上げるプロセスそのものを楽しみます。
              </p>
            </div>
          </div>

        </div>
      </section>

      <!-- Focus -->
      <section class="mvv-section fade-in-up delay-600">
        <div class="mvv-header">
          <span class="mvv-number">04</span>
          <h2 class="mvv-title">Focus</h2>
        </div>
        <div class="mvv-body">
          <h3 class="mvv-catchcopy">「推し」の力が、ビジネスを加速させる。</h3>
          <p class="mvv-text">
            mumumuが現在最も注力しているのが「ファンダムマーケティング」です。単に商品を売るのではなく、ブランドやクリエイターの「ファン」を育て、彼らと共に熱狂の渦を作り出す。
          </p>
          <p class="mvv-text">
            「個人の好き」を軸にしたこのマーケティング手法こそが、広告費高騰やコモディティ化が進む現代において、唯一無二の競争力になると確信しています。
          </p>
        </div>
      </section>

      <!-- CTA Section -->
      <?php
      $cta_title = 'Contact';
      $cta_text = '私たちのミッションに共感いただけましたら、<br>ぜひお気軽にお問い合わせください。';
      $cta_btn_text = 'お問い合わせ';
      include($prefix . 'templates/cta.php');
      ?>

    </div>
  </main>

  <?php
  // パンくずリストを読み込み
  $breadcrumb = [
      ['name' => 'mumumuについて', 'url' => '']
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
