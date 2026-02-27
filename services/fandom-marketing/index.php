<?php
require_once __DIR__ . '/../../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'ファンダムグッズ制作支援';
$page_label = 'ファンダムグッズ制作支援';
$hero_title = 'Fandom Marketing';
setPageMeta(
    'ファンダムグッズ制作支援｜企業ノベルティ・推し活グッズ製造｜株式会社mumumu',
    'オリジナルグッズの企画・デザインから製造まで一貫対応。Tシャツ、アクリルスタンド、クリアファイル、缶バッジなど幅広いグッズ制作。企業ノベルティから推し活・ファンダムグッズまで小ロットから対応可能。',
    $page_title,
    $page_label,
    [
        'keywords' => 'オリジナルグッズ,グッズ制作,企業ノベルティ,推し活グッズ,Tシャツ,アクリルスタンド,缶バッジ,小ロット,グッズ製造',
        'type' => 'website'
    ]
);

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => 'サービス', 'url' => 'services/'],
    ['name' => 'ファンダムマーケティング', 'url' => 'services/fandom-marketing/']
];

// FAQ構造化データ（LLMO対策に重要）
$faq_data = [
    ['question' => '最小ロット数はどのくらいですか？', 'answer' => 'アイテムによりますが、10個〜の小ロットから対応可能です。Tシャツやアクリルスタンドなど多くのアイテムで小ロット制作が可能ですので、お気軽にご相談ください。'],
    ['question' => 'デザインデータがなくても依頼できますか？', 'answer' => 'はい、可能です。ラフスケッチやイメージ写真をお送りいただければ、弊社でデザインを制作します。また、完全おまかせでのデザイン制作も承っております。'],
    ['question' => '納期はどのくらいかかりますか？', 'answer' => 'アイテムや数量により異なりますが、標準で2-4週間、お急ぎの場合は最短2週間での対応も可能です。イベント日程に合わせた納品スケジュールをご相談ください。'],
    ['question' => 'サンプルは作れますか？', 'answer' => 'はい、本製造前にサンプル制作が可能です（別途費用）。色味や質感を事前に確認したい場合におすすめです。デジタルモックアップは無料でお作りします。'],
    ['question' => '複数種類のグッズをまとめて依頼できますか？', 'answer' => 'もちろん可能です。Tシャツ、アクリルスタンド、缶バッジなど複数アイテムのセット制作も承ります。まとめてご依頼いただくことで、デザインの統一感やコストメリットも生まれます。'],
    ['question' => '著作権・版権物のグッズは作れますか？', 'answer' => '著作権者・版権元の許諾がある場合のみ制作可能です。オリジナルデザイン、自社キャラクター、許諾済みコンテンツでのグッズ制作をお勧めしております。']
];

// サービス構造化データ
$service_schema = [
    [
        'name' => 'グッズデザイン',
        'description' => 'オリジナルグッズのデザイン制作。コンセプトからビジュアルまで一貫した制作、既存素材のグッズ向けアレンジにも対応。',
        'url' => SITE_URL . '/services/fandom-marketing/'
    ],
    [
        'name' => 'グッズ製造',
        'description' => 'Tシャツ、アクリルスタンド、缶バッジ、クリアファイルなど各種グッズの製造。10個〜の小ロットから大量生産まで対応。',
        'url' => SITE_URL . '/services/fandom-marketing/'
    ],
    [
        'name' => 'トータルサポート',
        'description' => 'グッズ制作から販売戦略、ECサイト連携、在庫管理までトータルでサポート。',
        'url' => SITE_URL . '/services/fandom-marketing/'
    ]
];

// プロセス構造化データ（HowTo）
$howto_data = [
    'name' => 'オリジナルグッズ制作の流れ',
    'description' => 'お問い合わせからデザイン、製造、納品までのオリジナルグッズ制作プロセス',
    'url' => SITE_URL . '/services/fandom-marketing/',
    'totalTime' => 'P30D',
    'steps' => [
        ['name' => 'お問い合わせ・ヒアリング', 'text' => '作りたいグッズのイメージ、数量、予算、納期をお聞かせください。制作可能なアイテムや概算費用をご案内します。（1-3営業日）'],
        ['name' => 'デザイン・お見積り', 'text' => 'ヒアリング内容を元にデザイン案と正式なお見積りをご提出。修正回数や追加オプションについてもこの段階で確定します。（3-7営業日）'],
        ['name' => '製造・品質チェック', 'text' => 'デザイン確定後、製造を開始。サンプル確認（オプション）や品質チェックを経て、クオリティを担保します。（2-4週間）'],
        ['name' => '納品', 'text' => 'ご指定の場所へ納品。直送対応やイベント会場への納品など、柔軟に対応いたします。']
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
  <link rel="stylesheet" href="<?php echo $prefix; ?>services/fandom-marketing/fm-style.css" onload="document.documentElement.classList.remove('css-loading');">
  
  <!-- Structured Data -->
  <?php 
  outputOrganizationSchema();
  outputBreadcrumbSchema($breadcrumb_schema);
  outputServiceSchema($service_schema);
  outputFaqSchema($faq_data);
  outputHowToSchema($howto_data);
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
  include __DIR__ . '/../../templates/header.php';
  include __DIR__ . '/../../templates/nav.php';
  ?>

  <main class="fm-page">
    <!-- Hero Section -->
    <section class="fm-hero">
      <div class="fm-hero-inner">
        <p class="fm-hero-label fade-in-up">Fandom Marketing</p>
        <h1 class="fm-hero-title fade-in-up delay-200">
          想いをカタチに、<br>
          届けるグッズ制作
        </h1>
        <p class="fm-hero-lead fade-in-up delay-400">
          企業ノベルティから推し活グッズまで、<br class="sp-only">
          オリジナルグッズの<br class="sp-only">
          デザインから製造までワンストップで。
        </p>
        <div class="fm-hero-scroll fade-in-up delay-600">
          <span>Scroll</span>
          <div class="fm-hero-scroll-line"></div>
        </div>
      </div>
    </section>

    <!-- Issues Section -->
    <section class="fm-section fm-issues">
      <div class="fm-container">
        <div class="fm-section-header fade-in-up">
          <span class="fm-section-num">01</span>
          <h2 class="fm-section-title">Problems</h2>
          <p class="fm-section-lead">こんな課題をお持ちではありませんか？</p>
        </div>
        
        <div class="fm-issues-grid">
          <div class="fm-issue-card fade-in-up delay-200">
            <div class="fm-issue-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
              </svg>
            </div>
            <h3>オリジナルグッズを<br>作りたいけど方法がわからない</h3>
            <p>どんなアイテムが作れるのか、どこに頼めばいいのかわからず進められない</p>
          </div>
          
          <div class="fm-issue-card fade-in-up delay-300">
            <div class="fm-issue-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                <line x1="15" y1="9" x2="15.01" y2="9"></line>
              </svg>
            </div>
            <h3>デザインに<br>自信がない</h3>
            <p>アイデアはあるがデザインスキルがなく、プロに任せたい</p>
          </div>
          
          <div class="fm-issue-card fade-in-up delay-400">
            <div class="fm-issue-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                <line x1="12" y1="22.08" x2="12" y2="12"></line>
              </svg>
            </div>
            <h3>小ロットでも<br>発注したい</h3>
            <p>大量発注は難しいが、必要な数だけ作りたい</p>
          </div>
          
          <div class="fm-issue-card fade-in-up delay-500">
            <div class="fm-issue-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                <line x1="8" y1="21" x2="16" y2="21"></line>
                <line x1="12" y1="17" x2="12" y2="21"></line>
              </svg>
            </div>
            <h3>複数アイテムを<br>まとめて相談したい</h3>
            <p>Tシャツだけでなくアクスタやクリアファイルも一緒に頼みたい</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Goods Lineup Section -->
    <section class="fm-section fm-goods">
      <div class="fm-container">
        <div class="fm-section-header fade-in-up">
          <span class="fm-section-num">02</span>
          <h2 class="fm-section-title">Goods Lineup</h2>
          <p class="fm-section-lead">制作可能なグッズラインナップ</p>
        </div>

        <div class="fm-goods-grid">
          <!-- Apparel Category -->
          <div class="fm-goods-category fade-in-up">
            <div class="fm-goods-category-header">
              <div class="fm-goods-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                  <path d="M20.38 3.46L16 2a4 4 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.47a1 1 0 00.99.84H6v10a2 2 0 002 2h8a2 2 0 002-2V10h2.15a1 1 0 00.99-.84l.58-3.47a2 2 0 00-1.34-2.23z"></path>
                </svg>
              </div>
              <h3 class="fm-goods-category-title">アパレル</h3>
            </div>
            <ul class="fm-goods-list">
              <li>Tシャツ</li>
              <li>パーカー</li>
              <li>スウェット</li>
              <li>キャップ・帽子</li>
              <li>トートバッグ</li>
              <li>エプロン</li>
            </ul>
          </div>

          <!-- Acrylic Category -->
          <div class="fm-goods-category fade-in-up delay-100">
            <div class="fm-goods-category-header">
              <div class="fm-goods-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
              </div>
              <h3 class="fm-goods-category-title">アクリルグッズ</h3>
            </div>
            <ul class="fm-goods-list">
              <li>アクリルスタンド</li>
              <li>アクリルキーホルダー</li>
              <li>アクリルブロック</li>
              <li>アクリルコースター</li>
              <li>アクリルフィギュア</li>
              <li>ネームプレート</li>
            </ul>
          </div>

          <!-- Stationery Category -->
          <div class="fm-goods-category fade-in-up delay-200">
            <div class="fm-goods-category-header">
              <div class="fm-goods-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                  <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
              </div>
              <h3 class="fm-goods-category-title">ステーショナリー</h3>
            </div>
            <ul class="fm-goods-list">
              <li>クリアファイル</li>
              <li>ステッカー・シール</li>
              <li>缶バッジ</li>
              <li>ポストカード</li>
              <li>ノート・メモ帳</li>
              <li>カレンダー</li>
            </ul>
          </div>

          <!-- Others Category -->
          <div class="fm-goods-category fade-in-up delay-300">
            <div class="fm-goods-category-header">
              <div class="fm-goods-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="12" y1="8" x2="12" y2="12"></line>
                  <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
              </div>
              <h3 class="fm-goods-category-title">その他</h3>
            </div>
            <ul class="fm-goods-list">
              <li>マグカップ・タンブラー</li>
              <li>スマホケース</li>
              <li>モバイルバッテリー</li>
              <li>タオル</li>
              <li>ぬいぐるみ</li>
              <li>その他オーダーメイド</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section class="fm-section fm-services">
      <div class="fm-container">
        <div class="fm-section-header fade-in-up">
          <span class="fm-section-num">03</span>
          <h2 class="fm-section-title">Service</h2>
          <p class="fm-section-lead">デザインから製造まで、ワンストップでサポートします。</p>
        </div>

        <!-- Service 1: Design -->
        <div class="fm-service-item fade-in-up">
          <div class="fm-service-num">01</div>
          <div class="fm-service-content">
            <div class="fm-service-header">
              <h3 class="fm-service-title">Design</h3>
              <span class="fm-service-subtitle">グッズデザイン</span>
            </div>
            <p class="fm-service-desc">
              ご要望やコンセプトをヒアリングし、グッズに最適化されたオリジナルデザインを制作します。
              既存のロゴやイラストのグッズ向けアレンジにも対応。ファンの心をつかむデザインをご提案します。
            </p>
            <div class="fm-service-features">
              <div class="fm-feature">
                <span class="fm-feature-label">オリジナルデザイン</span>
                <p>コンセプトからビジュアルまで一貫した制作</p>
              </div>
              <div class="fm-feature">
                <span class="fm-feature-label">既存素材のアレンジ</span>
                <p>ロゴやイラストをグッズ向けに最適化</p>
              </div>
              <div class="fm-feature">
                <span class="fm-feature-label">複数バリエーション</span>
                <p>カラー展開やサイズ違いのデザイン対応</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Service 2: Manufacturing -->
        <div class="fm-service-item fade-in-up">
          <div class="fm-service-num">02</div>
          <div class="fm-service-content">
            <div class="fm-service-header">
              <h3 class="fm-service-title">Manufacturing</h3>
              <span class="fm-service-subtitle">グッズ製造</span>
            </div>
            <p class="fm-service-desc">
              国内外の信頼できる工場ネットワークを活用し、高品質なグッズを製造。
              小ロットから大量生産まで柔軟に対応し、コストと品質のバランスを最適化します。
            </p>
            <div class="fm-service-platforms">
              <span>プリント</span>
              <span>刺繍</span>
              <span>UV印刷</span>
              <span>昇華転写</span>
              <span>レーザー加工</span>
            </div>
            <div class="fm-service-features">
              <div class="fm-feature">
                <span class="fm-feature-label">小ロット対応</span>
                <p>10個〜の小ロット生産も可能</p>
              </div>
              <div class="fm-feature">
                <span class="fm-feature-label">品質管理</span>
                <p>検品・品質チェックを徹底実施</p>
              </div>
              <div class="fm-feature">
                <span class="fm-feature-label">スピード納品</span>
                <p>最短2週間での納品にも対応</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Service 3: Total Support -->
        <div class="fm-service-item fade-in-up">
          <div class="fm-service-num">03</div>
          <div class="fm-service-content">
            <div class="fm-service-header">
              <h3 class="fm-service-title">Total Support</h3>
              <span class="fm-service-subtitle">トータルサポート</span>
            </div>
            <p class="fm-service-desc">
              グッズ制作だけでなく、販売戦略のアドバイスやECサイト連携、在庫管理までトータルでサポート。
              企業ノベルティからファングッズまで、目的に合わせた最適なプランをご提案します。
            </p>
            <div class="fm-service-features">
              <div class="fm-feature">
                <span class="fm-feature-label">販売戦略支援</span>
                <p>イベント販売・EC販売のアドバイス</p>
              </div>
              <div class="fm-feature">
                <span class="fm-feature-label">パッケージング</span>
                <p>化粧箱・OPP袋など梱包資材も制作</p>
              </div>
              <div class="fm-feature">
                <span class="fm-feature-label">リピート対応</span>
                <p>追加発注・定期発注にも柔軟に対応</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Use Cases Section -->
    <section class="fm-section fm-usecases">
      <div class="fm-container">
        <div class="fm-section-header fade-in-up">
          <span class="fm-section-num">04</span>
          <h2 class="fm-section-title">Use Cases</h2>
          <p class="fm-section-lead">こんな用途でご活用いただいています</p>
        </div>

        <div class="fm-usecases-grid">
          <div class="fm-usecase-card fade-in-up">
            <div class="fm-usecase-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </div>
            <h3>企業ノベルティ</h3>
            <p>展示会・イベントの配布物、顧客向けギフト、社内グッズとして</p>
          </div>

          <div class="fm-usecase-card fade-in-up delay-100">
            <div class="fm-usecase-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
              </svg>
            </div>
            <h3>推し活グッズ</h3>
            <p>ファンサークル・個人での推し活アイテム制作に</p>
          </div>

          <div class="fm-usecase-card fade-in-up delay-200">
            <div class="fm-usecase-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
              </svg>
            </div>
            <h3>アーティスト・<br>クリエイターグッズ</h3>
            <p>ライブ・イベント物販、オンラインショップ用グッズ制作</p>
          </div>

          <div class="fm-usecase-card fade-in-up delay-300">
            <div class="fm-usecase-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                <path d="M16 3.13a4 4 0 010 7.75"></path>
              </svg>
            </div>
            <h3>チーム・団体グッズ</h3>
            <p>スポーツチーム、学校、サークルのオリジナルグッズに</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Process Section -->
    <section class="fm-section fm-process">
      <div class="fm-container">
        <div class="fm-section-header fade-in-up">
          <span class="fm-section-num">05</span>
          <h2 class="fm-section-title">Process</h2>
          <p class="fm-section-lead">ご依頼から納品までの流れ</p>
        </div>

        <div class="fm-process-timeline">
          <div class="fm-process-step fade-in-up">
            <div class="fm-process-num">01</div>
            <div class="fm-process-content">
              <h3>お問い合わせ・ヒアリング</h3>
              <p>作りたいグッズのイメージ、数量、予算、納期をお聞かせください。制作可能なアイテムや概算費用をご案内します。</p>
              <span class="fm-process-period">1-3営業日</span>
            </div>
          </div>

          <div class="fm-process-step fade-in-up delay-200">
            <div class="fm-process-num">02</div>
            <div class="fm-process-content">
              <h3>デザイン・お見積り</h3>
              <p>ヒアリング内容を元にデザイン案と正式なお見積りをご提出。修正回数や追加オプションについてもこの段階で確定します。</p>
              <span class="fm-process-period">3-7営業日</span>
            </div>
          </div>

          <div class="fm-process-step fade-in-up delay-400">
            <div class="fm-process-num">03</div>
            <div class="fm-process-content">
              <h3>製造・品質チェック</h3>
              <p>デザイン確定後、製造を開始。サンプル確認（オプション）や品質チェックを経て、クオリティを担保します。</p>
              <span class="fm-process-period">2-4週間</span>
            </div>
          </div>

          <div class="fm-process-step fade-in-up delay-600">
            <div class="fm-process-num">04</div>
            <div class="fm-process-content">
              <h3>納品</h3>
              <p>ご指定の場所へ納品。直送対応やイベント会場への納品など、柔軟に対応いたします。</p>
              <span class="fm-process-period">完了</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section class="fm-section fm-faq">
      <div class="fm-container">
        <div class="fm-section-header fade-in-up">
          <span class="fm-section-num">06</span>
          <h2 class="fm-section-title">FAQ</h2>
          <p class="fm-section-lead">よくある質問</p>
        </div>

        <div class="fm-faq-list">
          <div class="fm-faq-item fade-in-up">
            <div class="fm-faq-q">
              <span class="fm-faq-icon">Q</span>
              <h3>最小ロット数はどのくらいですか？</h3>
            </div>
            <div class="fm-faq-a">
              <p>アイテムによりますが、<strong>10個〜</strong>の小ロットから対応可能です。Tシャツやアクリルスタンドなど多くのアイテムで小ロット制作が可能ですので、お気軽にご相談ください。</p>
            </div>
          </div>

          <div class="fm-faq-item fade-in-up delay-100">
            <div class="fm-faq-q">
              <span class="fm-faq-icon">Q</span>
              <h3>デザインデータがなくても依頼できますか？</h3>
            </div>
            <div class="fm-faq-a">
              <p>はい、可能です。ラフスケッチやイメージ写真をお送りいただければ、弊社でデザインを制作します。また、完全おまかせでのデザイン制作も承っております。</p>
            </div>
          </div>

          <div class="fm-faq-item fade-in-up delay-200">
            <div class="fm-faq-q">
              <span class="fm-faq-icon">Q</span>
              <h3>納期はどのくらいかかりますか？</h3>
            </div>
            <div class="fm-faq-a">
              <p>アイテムや数量により異なりますが、標準で<strong>2-4週間</strong>、お急ぎの場合は<strong>最短2週間</strong>での対応も可能です。イベント日程に合わせた納品スケジュールをご相談ください。</p>
            </div>
          </div>

          <div class="fm-faq-item fade-in-up delay-300">
            <div class="fm-faq-q">
              <span class="fm-faq-icon">Q</span>
              <h3>サンプルは作れますか？</h3>
            </div>
            <div class="fm-faq-a">
              <p>はい、本製造前にサンプル制作が可能です（別途費用）。色味や質感を事前に確認したい場合におすすめです。デジタルモックアップは無料でお作りします。</p>
            </div>
          </div>

          <div class="fm-faq-item fade-in-up delay-400">
            <div class="fm-faq-q">
              <span class="fm-faq-icon">Q</span>
              <h3>複数種類のグッズをまとめて依頼できますか？</h3>
            </div>
            <div class="fm-faq-a">
              <p>もちろん可能です。Tシャツ、アクリルスタンド、缶バッジなど複数アイテムのセット制作も承ります。まとめてご依頼いただくことで、デザインの統一感やコストメリットも生まれます。</p>
            </div>
          </div>

          <div class="fm-faq-item fade-in-up delay-500">
            <div class="fm-faq-q">
              <span class="fm-faq-icon">Q</span>
              <h3>著作権・版権物のグッズは作れますか？</h3>
            </div>
            <div class="fm-faq-a">
              <p>著作権者・版権元の許諾がある場合のみ制作可能です。オリジナルデザイン、自社キャラクター、許諾済みコンテンツでのグッズ制作をお勧めしております。</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="fm-section fm-cta">
      <div class="fm-container">
        <div class="fm-cta-content fade-in-up">
          <h2>オリジナルグッズの<br class="sp-only">ご相談はこちら</h2>
          <p>作りたいグッズのイメージがあれば、<br>お気軽にお問い合わせください。</p>
          <a href="<?php echo $prefix; ?>contact/" class="fm-cta-btn">
            <span>お問い合わせ</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <line x1="5" y1="12" x2="19" y2="12"></line>
              <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
          </a>
        </div>
      </div>
    </section>
  </main>

  <?php
  // パンくずリストを読み込み
  $breadcrumb = [
      ['name' => 'サービス一覧', 'url' => $prefix . 'services/'],
      ['name' => 'ファンダムグッズ制作支援', 'url' => '']
  ];
  include __DIR__ . '/../../templates/breadcrumb.php';
  ?>

  <?php
  // フッターを読み込み
  include __DIR__ . '/../../templates/footer.php';
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" defer></script>
  <script src="<?php echo $prefix; ?>js/mv-three.js" defer></script>
  <script src="<?php echo $prefix; ?>js/common.js" defer></script>
</body>
</html>
