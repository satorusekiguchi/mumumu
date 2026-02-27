<?php
require_once __DIR__ . '/../../includes/common.php';

// ページ設定
$level = getPathLevel();
$prefix = getPathPrefix($level);
$page_title = 'デジタルマーケティング';
$page_label = 'Web制作・広告運用・SEO';
$hero_title = 'Digital Marketing';
setPageMeta(
    'デジタルマーケティング支援｜Web制作・広告運用・SEO対策｜株式会社mumumu',
    'BtoB企業の成長を加速するデジタルマーケティング支援サービス。Webサイト制作、リスティング広告・SNS広告運用代行、SEO対策、コンテンツマーケティングまで一貫してサポート。京都の株式会社mumumu。',
    $page_title,
    $page_label,
    [
        'keywords' => 'デジタルマーケティング,Web制作,広告運用,SEO対策,リスティング広告,SNS広告,BtoB,マーケティング支援,京都',
        'type' => 'website'
    ]
);

// パンくず構造化データ用
$breadcrumb_schema = [
    ['name' => 'サービス', 'url' => 'services/'],
    ['name' => 'デジタルマーケティング', 'url' => 'services/digital-marketing/']
];

// FAQ構造化データ（LLMO対策に重要）
$faq_data = [
    ['question' => 'どのような規模の企業が対象ですか？', 'answer' => 'スタートアップから上場企業まで、あらゆる規模のBtoB企業に対応しています。予算や事業フェーズに合わせて、最適なプランをご提案いたします。'],
    ['question' => '契約期間はどのくらいですか？', 'answer' => 'Web制作はプロジェクト型（3-6ヶ月）、広告運用とSEO対策は継続型（最低3ヶ月〜）となります。継続型の場合、成果が出るまで最低3ヶ月はお願いしておりますが、柔軟に対応可能です。'],
    ['question' => '料金体系を教えてください。', 'answer' => 'サービス内容に応じて、定額制（月額固定）、成果報酬型（成果に応じた手数料）、プロジェクト型（制作物に応じた見積もり）をご用意しています。詳細はお問い合わせ時にご提案いたします。'],
    ['question' => '既存のWebサイトや広告運用を引き継げますか？', 'answer' => 'はい、可能です。既存のWebサイトの改善や、他社で運用していた広告アカウントの引き継ぎも対応しています。現状分析から始め、最適化の提案をいたします。'],
    ['question' => '成果が出るまでどのくらいかかりますか？', 'answer' => 'Web制作はリリース後すぐに効果測定可能、広告運用は1-2ヶ月で初期データが揃い3-6ヶ月で最適化、SEOは3-6ヶ月で兆しが見え6-12ヶ月で本格的な成果が期待できます。'],
    ['question' => '複数のサービスを同時に依頼できますか？', 'answer' => 'はい、可能です。むしろ、Web制作・広告運用・SEO対策を統合的に実施することで、相乗効果が期待できます。パッケージプランもご用意していますので、お気軽にご相談ください。']
];

// サービス構造化データ
$service_schema = [
    [
        'name' => 'Web制作・UI/UX設計',
        'description' => 'BtoB企業のWebサイト制作。コーポレートサイト、LP、サービスサイト、CMS構築、EC・予約システム連携まで対応。',
        'url' => SITE_URL . '/services/digital-marketing/'
    ],
    [
        'name' => '広告運用代行',
        'description' => 'Google広告、Yahoo広告、SNS広告の運用代行。リスティング広告、ディスプレイ広告、動画広告まで幅広く対応。',
        'url' => SITE_URL . '/services/digital-marketing/',
        'offers' => ['price' => '0', 'description' => '運用手数料：広告費の20%、月予算10万円〜対応']
    ],
    [
        'name' => 'SEOコンサルティング',
        'description' => 'SEO戦略設計、テクニカルSEO、コンテンツSEO、ローカルSEOまで包括的に対応。',
        'url' => SITE_URL . '/services/digital-marketing/'
    ]
];

// プロセス構造化データ（HowTo）
$howto_data = [
    'name' => 'デジタルマーケティング支援のプロジェクトの流れ',
    'description' => 'ヒアリングから戦略立案、実行、分析改善までのデジタルマーケティング支援プロセス',
    'url' => SITE_URL . '/services/digital-marketing/',
    'totalTime' => 'P6M',
    'steps' => [
        ['name' => 'ヒアリング・課題整理', 'text' => '事業目標、ターゲット顧客、競合状況、現状の課題を徹底的にヒアリング。貴社のビジネスを深く理解することから始めます。（1-2週間）'],
        ['name' => '戦略立案・提案', 'text' => '課題解決に向けた具体的な戦略と施策を立案。KPI設定、予算配分、スケジュールを含めた提案書を作成します。（1-2週間）'],
        ['name' => '実行・運用開始', 'text' => 'キックオフミーティング後、制作・運用を開始。定期的な進捗報告とミーティングで密にコミュニケーションを取りながら進めます。'],
        ['name' => '分析・改善', 'text' => 'データ分析に基づき、継続的な改善と最適化を実施。月次レポートと定例会により、成果を可視化し次のアクションを明確にします。']
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
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" media="print" onload="this.media='all'">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></noscript>
  
  <link rel="stylesheet" href="<?php echo $prefix; ?>css/style.css">
  <link rel="stylesheet" href="<?php echo $prefix; ?>services/digital-marketing/dm-style.css" onload="document.documentElement.classList.remove('css-loading');">
  
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

  <main class="dm-page">
    <!-- Hero Section -->
    <section class="dm-hero">
      <div class="dm-hero-inner">
        <p class="dm-hero-label fade-in-up">Digital Marketing</p>
        <h1 class="dm-hero-title fade-in-up delay-200">
          BtoB企業の成長を<br>
          加速させる
        </h1>
        <p class="dm-hero-lead fade-in-up delay-400">
          戦略設計から実行・改善まで、<br class="sp-only">
          デジタルマーケティングの<br class="sp-only">
          すべてをワンストップで支援します。
        </p>
        <div class="dm-hero-scroll fade-in-up delay-600">
          <span>Scroll</span>
          <div class="dm-hero-scroll-line"></div>
        </div>
      </div>
    </section>

    <!-- Issues Section -->
    <section class="dm-section dm-issues">
      <div class="dm-container">
        <div class="dm-section-header fade-in-up">
          <span class="dm-section-num">01</span>
          <h2 class="dm-section-title">Problems</h2>
          <p class="dm-section-lead">こんな課題をお持ちではありませんか？</p>
        </div>
        
        <div class="dm-issues-grid">
          <div class="dm-issue-card fade-in-up delay-200">
            <div class="dm-issue-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
              </svg>
            </div>
            <h3>質の高いリードが<br>獲得できない</h3>
            <p>展示会やテレアポに依存し、デジタル経由の安定したリード獲得ができていない</p>
          </div>
          
          <div class="dm-issue-card fade-in-up delay-300">
            <div class="dm-issue-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M12 20V10"></path>
                <path d="M18 20V4"></path>
                <path d="M6 20v-4"></path>
              </svg>
            </div>
            <h3>マーケティング施策の<br>効果が見えない</h3>
            <p>広告やSEOに投資しているが、売上への貢献度が不明確で判断できない</p>
          </div>
          
          <div class="dm-issue-card fade-in-up delay-400">
            <div class="dm-issue-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="3" y1="9" x2="21" y2="9"></line>
                <line x1="9" y1="21" x2="9" y2="9"></line>
              </svg>
            </div>
            <h3>Webサイトが<br>成果に繋がらない</h3>
            <p>サイトへのアクセスはあるが、問い合わせや資料請求に繋がらない</p>
          </div>
          
          <div class="dm-issue-card fade-in-up delay-500">
            <div class="dm-issue-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
              </svg>
            </div>
            <h3>社内にノウハウや<br>リソースがない</h3>
            <p>デジタルマーケティングの専門人材がおらず、何から始めるべきかわからない</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section class="dm-section dm-services">
      <div class="dm-container">
        <div class="dm-section-header fade-in-up">
          <span class="dm-section-num">02</span>
          <h2 class="dm-section-title">Service</h2>
          <p class="dm-section-lead">3つの専門領域で、BtoB企業のデジタルマーケティングを包括的に支援します。</p>
        </div>

        <!-- Service 1: Web Creative -->
        <div class="dm-service-item fade-in-up">
          <div class="dm-service-num">01</div>
          <div class="dm-service-content">
            <div class="dm-service-header">
              <h3 class="dm-service-title">Web Creative</h3>
              <span class="dm-service-subtitle">Web制作・UI/UX設計</span>
            </div>
            <p class="dm-service-desc">
              BtoB企業のWebサイトは、見込み顧客との最初の接点であり、信頼を構築する重要な資産です。
              リード獲得に最適化された設計と、ブランド価値を高めるデザインを提供します。
            </p>
            
            <div class="dm-service-list">
              <div class="dm-service-list-item">
                <h4>コーポレートサイト制作</h4>
                <p>企業ブランディングに基づくデザイン設計、レスポンシブ対応、アクセシビリティ対応、高速表示の最適化</p>
              </div>
              <div class="dm-service-list-item">
                <h4>LP / サービスサイト</h4>
                <p>ペルソナに基づいたコンテンツ設計、A/Bテスト、フォーム最適化（EFO）、ヒートマップ分析</p>
              </div>
              <div class="dm-service-list-item">
                <h4>CMS構築・運用支援</h4>
                <p>WordPress / Headless CMS構築、運用マニュアル作成、保守・セキュリティ対策</p>
              </div>
              <div class="dm-service-list-item">
                <h4>EC・予約システム連携</h4>
                <p>Shopify / WooCommerce構築、予約システム導入、決済システム連携</p>
              </div>
            </div>

            <div class="dm-inline-tags">
              <span class="dm-inline-tags-label">技術スタック:</span>
              <span>HTML5/CSS3</span>
              <span>JavaScript</span>
              <span>React/Next.js</span>
              <span>WordPress</span>
              <span>Shopify</span>
              <span>Figma</span>
            </div>
          </div>
        </div>

        <!-- Service 2: Web Ads -->
        <div class="dm-service-item fade-in-up">
          <div class="dm-service-num">02</div>
          <div class="dm-service-content">
            <div class="dm-service-header">
              <h3 class="dm-service-title">Web Advertising</h3>
              <span class="dm-service-subtitle">広告運用代行</span>
            </div>
            <p class="dm-service-desc">
              CPAだけでなく、LTV（顧客生涯価値）への貢献をゴールに設定。
              透明性の高いレポーティングと継続的な改善で、持続的な成長をサポートします。
            </p>
            
            <div class="dm-pricing-inline">
              <span class="dm-pricing-inline-item"><i class="fa-solid fa-check"></i> 月予算10万円〜対応</span>
              <span class="dm-pricing-inline-item"><i class="fa-solid fa-check"></i> 初期費用なし</span>
              <span class="dm-pricing-inline-item"><i class="fa-solid fa-check"></i> 月次更新</span>
              <span class="dm-pricing-inline-item"><i class="fa-solid fa-check"></i> 運用手数料：広告費の20%</span>
            </div>
            
            <div class="dm-inline-tags dm-platforms-inline">
              <span class="dm-inline-tags-label">対応媒体:</span>
              <span>Google Ads</span>
              <span>Yahoo広告</span>
              <span>Facebook広告</span>
              <span>Instagram広告</span>
              <span>YouTube広告</span>
              <span>Googleマップ広告</span>
              <span>LINE広告</span>
              <span>X広告</span>
              <span>TikTok広告</span>
              <span>Bing広告</span>
            </div>
            
            <div class="dm-service-list">
              <div class="dm-service-list-item">
                <h4>リスティング広告</h4>
                <p>キーワード選定、広告文A/Bテスト、入札戦略最適化、品質スコア改善</p>
              </div>
              <div class="dm-service-list-item">
                <h4>ディスプレイ広告</h4>
                <p>オーディエンスターゲティング、リマーケティング、バナー制作、プレースメント最適化</p>
              </div>
              <div class="dm-service-list-item">
                <h4>SNS広告</h4>
                <p>ターゲット設計、クリエイティブ制作、動画・カルーセル広告、類似オーディエンス活用</p>
              </div>
              <div class="dm-service-list-item">
                <h4>動画広告</h4>
                <p>YouTube・TikTok対応、動画クリエイティブ制作、視聴率・完了率の最適化</p>
              </div>
            </div>

            <p class="dm-service-note">
              <i class="fa-solid fa-circle-info"></i>
              透明性の高いレポーティングで広告費用・成果をすべて開示。毎日のデータモニタリングで迅速な改善を実施します。
            </p>
          </div>
        </div>

        <!-- Service 3: SEO -->
        <div class="dm-service-item fade-in-up">
          <div class="dm-service-num">03</div>
          <div class="dm-service-content">
            <div class="dm-service-header">
              <h3 class="dm-service-title">SEO Consulting</h3>
              <span class="dm-service-subtitle">SEO対策・コンテンツマーケティング</span>
            </div>
            <p class="dm-service-desc">
              小手先のテクニックではなく、ユーザーの検索意図を深く洞察。
              検索エンジンからもユーザーからも選ばれる「資産となるコンテンツ」を構築します。
            </p>
            
            <div class="dm-service-list">
              <div class="dm-service-list-item">
                <h4>SEO戦略設計</h4>
                <p>競合分析、キーワード調査・優先度設定、サイト構造設計、コンテンツロードマップ作成</p>
              </div>
              <div class="dm-service-list-item">
                <h4>テクニカルSEO</h4>
                <p>Core Web Vitals改善、内部リンク最適化、構造化データ実装、クロール・インデックス最適化</p>
              </div>
              <div class="dm-service-list-item">
                <h4>コンテンツSEO</h4>
                <p>検索意図分析、SEOライティング・記事制作、既存コンテンツのリライト、E-E-A-T強化</p>
              </div>
              <div class="dm-service-list-item">
                <h4>ローカルSEO</h4>
                <p>Googleビジネスプロフィール最適化、ローカルキーワード対策、口コミ管理支援</p>
              </div>
            </div>

            <div class="dm-metrics-inline">
              <span class="dm-metrics-inline-label">改善指標:</span>
              <span><i class="fa-solid fa-chart-line"></i> 検索順位</span>
              <span><i class="fa-solid fa-users"></i> オーガニック流入</span>
              <span><i class="fa-solid fa-bullseye"></i> CV数・CVR</span>
              <span><i class="fa-solid fa-bolt"></i> ページ速度</span>
              <span><i class="fa-solid fa-link"></i> 被リンク数</span>
            </div>
          </div>
        </div>

        <!-- Service 4: Analytics -->
        <div class="dm-service-item fade-in-up">
          <div class="dm-service-num">04</div>
          <div class="dm-service-content">
            <div class="dm-service-header">
              <h3 class="dm-service-title">Analytics</h3>
              <span class="dm-service-subtitle">データ分析・効果測定</span>
            </div>
            <p class="dm-service-desc">
              データに基づいた意思決定を支援。アクセス解析からレポーティングまで、
              マーケティングの効果を最大化するための基盤を整備します。
            </p>
            
            <div class="dm-service-list">
              <div class="dm-service-list-item">
                <h4>アクセス解析</h4>
                <p>GA4設定・カスタムイベント実装、コンバージョン計測、Looker Studioダッシュボード構築</p>
              </div>
              <div class="dm-service-list-item">
                <h4>タグマネジメント</h4>
                <p>GTM設計・実装、広告タグ・計測タグ設定、イベントトラッキング、データレイヤー実装</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Process Section -->
    <section class="dm-section dm-process">
      <div class="dm-container">
        <div class="dm-section-header fade-in-up">
          <span class="dm-section-num">03</span>
          <h2 class="dm-section-title">Process</h2>
          <p class="dm-section-lead">プロジェクトの流れ</p>
        </div>

        <div class="dm-process-timeline">
          <div class="dm-process-step fade-in-up">
            <div class="dm-process-num">01</div>
            <div class="dm-process-content">
              <h3>ヒアリング・課題整理</h3>
              <p>事業目標、ターゲット顧客、競合状況、現状の課題を徹底的にヒアリング。貴社のビジネスを深く理解することから始めます。</p>
              <span class="dm-process-period">1-2週間</span>
            </div>
          </div>

          <div class="dm-process-step fade-in-up delay-200">
            <div class="dm-process-num">02</div>
            <div class="dm-process-content">
              <h3>戦略立案・提案</h3>
              <p>課題解決に向けた具体的な戦略と施策を立案。KPI設定、予算配分、スケジュールを含めた提案書を作成します。</p>
              <span class="dm-process-period">1-2週間</span>
            </div>
          </div>

          <div class="dm-process-step fade-in-up delay-400">
            <div class="dm-process-num">03</div>
            <div class="dm-process-content">
              <h3>実行・運用開始</h3>
              <p>キックオフミーティング後、制作・運用を開始。定期的な進捗報告とミーティングで密にコミュニケーションを取りながら進めます。</p>
              <span class="dm-process-period">プロジェクトによる</span>
            </div>
          </div>

          <div class="dm-process-step fade-in-up delay-600">
            <div class="dm-process-num">04</div>
            <div class="dm-process-content">
              <h3>分析・改善</h3>
              <p>データ分析に基づき、継続的な改善と最適化を実施。月次レポートと定例会により、成果を可視化し次のアクションを明確にします。</p>
              <span class="dm-process-period">継続</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section class="dm-section dm-faq">
      <div class="dm-container">
        <div class="dm-section-header fade-in-up">
          <span class="dm-section-num">04</span>
          <h2 class="dm-section-title">FAQ</h2>
          <p class="dm-section-lead">よくある質問</p>
        </div>

        <div class="dm-faq-list">
          <div class="dm-faq-item fade-in-up">
            <div class="dm-faq-q">
              <span class="dm-faq-icon">Q</span>
              <h3>どのような規模の企業が対象ですか？</h3>
            </div>
            <div class="dm-faq-a">
              <p>スタートアップから上場企業まで、あらゆる規模のBtoB企業に対応しています。予算や事業フェーズに合わせて、最適なプランをご提案いたします。</p>
            </div>
          </div>

          <div class="dm-faq-item fade-in-up delay-100">
            <div class="dm-faq-q">
              <span class="dm-faq-icon">Q</span>
              <h3>契約期間はどのくらいですか？</h3>
            </div>
            <div class="dm-faq-a">
              <p>Web制作はプロジェクト型（3-6ヶ月）、広告運用とSEO対策は継続型（最低3ヶ月〜）となります。継続型の場合、成果が出るまで最低3ヶ月はお願いしておりますが、柔軟に対応可能です。</p>
            </div>
          </div>

          <div class="dm-faq-item fade-in-up delay-200">
            <div class="dm-faq-q">
              <span class="dm-faq-icon">Q</span>
              <h3>料金体系を教えてください。</h3>
            </div>
            <div class="dm-faq-a">
              <p>サービス内容に応じて、<strong>定額制</strong>（月額固定）、<strong>成果報酬型</strong>（成果に応じた手数料）、<strong>プロジェクト型</strong>（制作物に応じた見積もり）をご用意しています。詳細はお問い合わせ時にご提案いたします。</p>
            </div>
          </div>

          <div class="dm-faq-item fade-in-up delay-300">
            <div class="dm-faq-q">
              <span class="dm-faq-icon">Q</span>
              <h3>既存のWebサイトや広告運用を引き継げますか？</h3>
            </div>
            <div class="dm-faq-a">
              <p>はい、可能です。既存のWebサイトの改善や、他社で運用していた広告アカウントの引き継ぎも対応しています。現状分析から始め、最適化の提案をいたします。</p>
            </div>
          </div>

          <div class="dm-faq-item fade-in-up delay-400">
            <div class="dm-faq-q">
              <span class="dm-faq-icon">Q</span>
              <h3>成果が出るまでどのくらいかかりますか？</h3>
            </div>
            <div class="dm-faq-a">
              <p><strong>Web制作</strong>はリリース後すぐに効果測定可能、<strong>広告運用</strong>は1-2ヶ月で初期データが揃い3-6ヶ月で最適化、<strong>SEO</strong>は3-6ヶ月で兆しが見え6-12ヶ月で本格的な成果が期待できます。</p>
            </div>
          </div>

          <div class="dm-faq-item fade-in-up delay-500">
            <div class="dm-faq-q">
              <span class="dm-faq-icon">Q</span>
              <h3>複数のサービスを同時に依頼できますか？</h3>
            </div>
            <div class="dm-faq-a">
              <p>はい、可能です。むしろ、Web制作・広告運用・SEO対策を統合的に実施することで、相乗効果が期待できます。パッケージプランもご用意していますので、お気軽にご相談ください。</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="dm-section dm-cta">
      <div class="dm-container">
        <div class="dm-cta-content fade-in-up">
          <h2>まずはお気軽に<br class="sp-only">ご相談ください</h2>
          <p>貴社の課題やご要望をお聞かせください。<br>最適なソリューションをご提案いたします。</p>
          <a href="<?php echo $prefix; ?>contact/" class="dm-cta-btn">
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
      ['name' => 'デジタルマーケティング', 'url' => '']
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
