<?php
/**
 * 共通関数・変数定義ファイル
 * SEO/LLMO対策・構造化データ対応版
 */

// サイト基本情報
define('SITE_NAME', '株式会社mumumu');
define('SITE_URL', 'https://mumumu.co.jp');
define('SITE_DESCRIPTION', '京都のWeb制作・デジタルマーケティング会社mumumu。Webサイト制作、広告運用、SEO対策、SNS運用、D2Cブランド開発まで一貫支援。');
define('SITE_IMAGE', SITE_URL . '/img/ogp.png');
define('TWITTER_HANDLE', '@mumumu_inc');

/**
 * 現在のディレクトリレベルを取得
 */
function getPathLevel() {
    $scriptPath = $_SERVER['SCRIPT_NAME'];
    $scriptDir = dirname($scriptPath);
    
    // ルートディレクトリ名を除去
    $cleanPath = str_replace('/index.php', '', $scriptDir);
    $parts = array_filter(explode('/', $cleanPath));
    
    return count($parts);
}

/**
 * パスプレフィックスを取得
 */
function getPathPrefix($level = null) {
    if ($level === null) {
        $level = getPathLevel();
    }
    return $level > 0 ? str_repeat('../', $level) : './';
}

/**
 * 現在のページURLを取得
 */
function getCurrentUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

/**
 * 正規URLを取得（クエリパラメータなし）
 */
function getCanonicalUrl() {
    $url = getCurrentUrl();
    $parsed = parse_url($url);
    return SITE_URL . ($parsed['path'] ?? '/');
}

/**
 * ページのメタ情報を設定（拡張版）
 */
function setPageMeta($title = '', $description = '', $page_title = '', $page_label = '', $options = []) {
    global $page_meta;
    $page_meta = [
        'title' => $title ?: SITE_NAME . ' | 個人の好きで経済を動かす',
        'description' => $description ?: SITE_DESCRIPTION,
        'page_title' => $page_title,
        'page_label' => $page_label,
        'image' => $options['image'] ?? SITE_IMAGE,
        'type' => $options['type'] ?? 'website',
        'keywords' => $options['keywords'] ?? 'Web制作,デジタルマーケティング,広告運用,SEO対策,京都,mumumu',
        'robots' => $options['robots'] ?? 'index, follow',
        'canonical' => $options['canonical'] ?? getCanonicalUrl(),
    ];
}

/**
 * SEOメタタグを出力
 */
function outputSeoMeta() {
    global $page_meta;
    $title = htmlspecialchars($page_meta['title'] ?? SITE_NAME);
    $description = htmlspecialchars($page_meta['description'] ?? SITE_DESCRIPTION);
    $image = htmlspecialchars($page_meta['image'] ?? SITE_IMAGE);
    $type = htmlspecialchars($page_meta['type'] ?? 'website');
    $keywords = htmlspecialchars($page_meta['keywords'] ?? '');
    $robots = htmlspecialchars($page_meta['robots'] ?? 'index, follow');
    $canonical = htmlspecialchars($page_meta['canonical'] ?? getCanonicalUrl());
    ?>
  <!-- Primary Meta Tags -->
  <meta name="title" content="<?php echo $title; ?>">
  <meta name="description" content="<?php echo $description; ?>">
  <meta name="keywords" content="<?php echo $keywords; ?>">
  <meta name="robots" content="<?php echo $robots; ?>">
  <meta name="author" content="<?php echo SITE_NAME; ?>">
  <link rel="canonical" href="<?php echo $canonical; ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="<?php echo $type; ?>">
  <meta property="og:url" content="<?php echo $canonical; ?>">
  <meta property="og:title" content="<?php echo $title; ?>">
  <meta property="og:description" content="<?php echo $description; ?>">
  <meta property="og:image" content="<?php echo $image; ?>">
  <meta property="og:site_name" content="<?php echo SITE_NAME; ?>">
  <meta property="og:locale" content="ja_JP">
  
  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="<?php echo TWITTER_HANDLE; ?>">
  <meta name="twitter:url" content="<?php echo $canonical; ?>">
  <meta name="twitter:title" content="<?php echo $title; ?>">
  <meta name="twitter:description" content="<?php echo $description; ?>">
  <meta name="twitter:image" content="<?php echo $image; ?>">
  
  <!-- Additional SEO -->
  <meta name="format-detection" content="telephone=no">
  <meta name="theme-color" content="#0a0a0a">
  <link rel="icon" type="image/png" href="<?php echo getPathPrefix(); ?>img/favicon.png">
  <link rel="apple-touch-icon" href="<?php echo getPathPrefix(); ?>img/favicon.png">
<?php
}

/**
 * 組織の構造化データ（JSON-LD）を出力
 */
function outputOrganizationSchema() {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        '@id' => SITE_URL . '/#organization',
        'name' => SITE_NAME,
        'alternateName' => 'mumumu Inc.',
        'url' => SITE_URL,
        'logo' => [
            '@type' => 'ImageObject',
            'url' => SITE_URL . '/img/mumumu-logo.png',
            'width' => 512,
            'height' => 512
        ],
        'image' => SITE_URL . '/img/ogp.png',
        'description' => SITE_DESCRIPTION,
        'email' => 'hello@mumumu.co.jp',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => '大黒町227番地 第２キョートビル402',
            'addressLocality' => '京都市下京区',
            'addressRegion' => '京都府',
            'postalCode' => '600-8223',
            'addressCountry' => 'JP'
        ],
        'foundingDate' => '2024-05-01',
        'founder' => [
            '@type' => 'Person',
            'name' => '関口 理留',
            'jobTitle' => '代表取締役'
        ],
        'sameAs' => [],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'contactType' => 'customer service',
            'email' => 'hello@mumumu.co.jp',
            'availableLanguage' => ['Japanese']
        ]
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * ローカルビジネスの構造化データを出力
 */
function outputLocalBusinessSchema() {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        '@id' => SITE_URL . '/#localbusiness',
        'name' => SITE_NAME,
        'image' => SITE_URL . '/img/ogp.png',
        'url' => SITE_URL,
        'email' => 'hello@mumumu.co.jp',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => '大黒町227番地 第２キョートビル402',
            'addressLocality' => '京都市下京区',
            'addressRegion' => '京都府',
            'postalCode' => '600-8223',
            'addressCountry' => 'JP'
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => 34.9956,
            'longitude' => 135.75491
        ],
        'priceRange' => '¥¥',
        'areaServed' => [
            ['@type' => 'City', 'name' => '京都市'],
            ['@type' => 'Country', 'name' => '日本']
        ],
        'serviceType' => ['Web制作', 'デジタルマーケティング', '広告運用', 'SEO対策', 'グッズ制作']
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * Webサイトの構造化データを出力
 */
function outputWebSiteSchema() {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        '@id' => SITE_URL . '/#website',
        'url' => SITE_URL,
        'name' => SITE_NAME,
        'description' => SITE_DESCRIPTION,
        'publisher' => [
            '@id' => SITE_URL . '/#organization'
        ],
        'inLanguage' => 'ja',
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => [
                '@type' => 'EntryPoint',
                'urlTemplate' => SITE_URL . '/?s={search_term_string}'
            ],
            'query-input' => 'required name=search_term_string'
        ]
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * Webページの構造化データを出力
 */
function outputWebPageSchema($name, $description, $url = null) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebPage',
        '@id' => ($url ?: getCanonicalUrl()) . '#webpage',
        'url' => $url ?: getCanonicalUrl(),
        'name' => $name,
        'description' => $description,
        'isPartOf' => [
            '@id' => SITE_URL . '/#website'
        ],
        'about' => [
            '@id' => SITE_URL . '/#organization'
        ],
        'inLanguage' => 'ja'
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * パンくずリストの構造化データを出力
 */
function outputBreadcrumbSchema($breadcrumbs) {
    $items = [];
    $items[] = [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'ホーム',
        'item' => SITE_URL
    ];
    
    $position = 2;
    foreach ($breadcrumbs as $crumb) {
        $item = [
            '@type' => 'ListItem',
            'position' => $position,
            'name' => $crumb['name']
        ];
        if (!empty($crumb['url'])) {
            $item['item'] = SITE_URL . '/' . ltrim($crumb['url'], '/');
        }
        $items[] = $item;
        $position++;
    }
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $items
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * サービスの構造化データを出力
 */
function outputServiceSchema($services) {
    foreach ($services as $service) {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'serviceType' => $service['name'],
            'name' => $service['name'],
            'description' => $service['description'],
            'provider' => [
                '@id' => SITE_URL . '/#organization'
            ],
            'areaServed' => [
                '@type' => 'Country',
                'name' => '日本'
            ],
            'url' => $service['url'] ?? SITE_URL . '/services/'
        ];
        
        if (!empty($service['offers'])) {
            $schema['offers'] = [
                '@type' => 'Offer',
                'price' => $service['offers']['price'] ?? '0',
                'priceCurrency' => 'JPY',
                'description' => $service['offers']['description'] ?? ''
            ];
        }
        
        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }
}

/**
 * FAQの構造化データを出力（LLMO対策に重要）
 */
function outputFaqSchema($faqs) {
    $items = [];
    foreach ($faqs as $faq) {
        $items[] = [
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['answer']
            ]
        ];
    }
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $items
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * 製品の構造化データを出力
 */
function outputProductSchema($product) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => $product['name'],
        'description' => $product['description'],
        'brand' => [
            '@type' => 'Brand',
            'name' => $product['brand'] ?? SITE_NAME
        ],
        'manufacturer' => [
            '@id' => SITE_URL . '/#organization'
        ],
        'image' => $product['image'] ?? SITE_IMAGE,
        'url' => $product['url'] ?? getCanonicalUrl()
    ];
    
    if (!empty($product['offers'])) {
        $schema['offers'] = [
            '@type' => 'Offer',
            'availability' => $product['availability'] ?? 'https://schema.org/PreOrder',
            'priceCurrency' => 'JPY',
            'price' => $product['price'] ?? '0'
        ];
    }
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * 作品集（ポートフォリオ）の構造化データを出力
 */
function outputCreativeWorkSchema($works) {
    $items = [];
    $position = 1;
    
    foreach ($works as $work) {
        $items[] = [
            '@type' => 'ListItem',
            'position' => $position,
            'item' => [
                '@type' => 'CreativeWork',
                'name' => $work['title'],
                'description' => $work['description'] ?? '',
                'creator' => [
                    '@id' => SITE_URL . '/#organization'
                ],
                'url' => SITE_URL . $work['url'],
                'image' => SITE_URL . $work['image']
            ]
        ];
        $position++;
    }
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        'name' => '制作実績',
        'description' => '株式会社mumumuのWeb制作・デジタルマーケティング支援の制作実績',
        'numberOfItems' => count($works),
        'itemListElement' => $items
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * HowToの構造化データを出力（LLMO対策）
 */
function outputHowToSchema($howto) {
    $steps = [];
    $position = 1;
    
    foreach ($howto['steps'] as $step) {
        $steps[] = [
            '@type' => 'HowToStep',
            'position' => $position,
            'name' => $step['name'],
            'text' => $step['text'],
            'url' => ($howto['url'] ?? getCanonicalUrl()) . '#step' . $position
        ];
        $position++;
    }
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'HowTo',
        'name' => $howto['name'],
        'description' => $howto['description'],
        'step' => $steps,
        'totalTime' => $howto['totalTime'] ?? 'P30D'
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * 記事/ニュースの構造化データを出力
 */
function outputArticleSchema($article) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $article['title'],
        'description' => $article['description'] ?? '',
        'datePublished' => $article['date'],
        'dateModified' => $article['modified'] ?? $article['date'],
        'author' => [
            '@id' => SITE_URL . '/#organization'
        ],
        'publisher' => [
            '@id' => SITE_URL . '/#organization'
        ],
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => $article['url'] ?? getCanonicalUrl()
        ],
        'image' => $article['image'] ?? SITE_IMAGE
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * パフォーマンス最適化用のプリコネクトとフォント読み込みを出力
 */
function outputPerformanceOptimizations() {
    ?>
  <!-- Preconnect for performance (DNS prefetch) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
  <link rel="preconnect" href="https://ajax.googleapis.com" crossorigin>
  
  <!-- Google Fonts with display=swap for better performance -->
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Noto+Sans+JP:wght@400;500;700&family=Oswald:wght@400;500;700&family=Anton&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Noto+Sans+JP:wght@400;500;700&family=Oswald:wght@400;500;700&family=Anton&display=swap"></noscript>
  
  <!-- Non-critical CSS loaded asynchronously -->
  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"></noscript>
<?php
}

/**
 * Critical CSSをインライン出力（下層ページ用）
 */
function outputCriticalCSS() {
    ?>
  <!-- FOUC Prevention -->
  <style>html.css-loading body{visibility:hidden}.global-nav{opacity:0;pointer-events:none}</style>
  <script>document.documentElement.classList.add('css-loading');</script>
  
  <!-- Critical CSS for above-the-fold content -->
  <style>
    :root{--text-color:#f0f0f0;--bg-color:#0a0a0a;--font-base:'Noto Sans JP',sans-serif;--font-en:'Oswald',sans-serif;--font-impact:'Anton',sans-serif;--font-logo:'Nanum Pen Script',cursive}
    *,*::before,*::after{box-sizing:border-box}
    body,html{margin:0;padding:0;font-family:var(--font-base);font-size:15px;line-height:1.8;color:var(--text-color);background:var(--bg-color);-webkit-font-smoothing:antialiased;overflow-x:hidden}
    header{position:fixed;top:0;left:0;width:100%;height:80px;z-index:9999;display:flex;justify-content:space-between;align-items:center;padding:0 40px;background:transparent;mix-blend-mode:difference}
    .logo a{font-family:var(--font-logo);font-size:2.5rem;color:#fff;text-decoration:none}
    .menu-trigger{position:fixed;top:30px;right:40px;z-index:1006;cursor:pointer;font-family:var(--font-en);font-size:14px;color:#fff}
    .global-nav{position:fixed;top:0;left:0;width:100%;height:100vh;opacity:0;pointer-events:none;z-index:1002}
    main{margin-top:80px;padding-top:100px;min-height:calc(100vh - 80px);padding-bottom:100px;position:relative;z-index:1}
    .inner{width:90%;max-width:1200px;margin:0 auto;position:relative}
    .section-header{margin-bottom:80px;display:flex;align-items:baseline;gap:20px}
    .section-title{font-family:var(--font-impact);font-size:4rem;line-height:1;margin:0;letter-spacing:0.02em;text-transform:uppercase;color:#fff}
    .fade-in-up{opacity:0;transform:translateY(50px)}
    .fade-in-up.show{opacity:1;transform:translateY(0)}
    @media(max-width:768px){header{padding:0 20px;height:60px}.menu-trigger{top:20px;right:20px}main{margin-top:60px;padding-top:60px;padding-bottom:60px}.section-title{font-size:2.5rem}}
  </style>
<?php
}

/**
 * 遅延読み込みスタイルシートを出力
 */
function outputDeferredStylesheet($href) {
    ?>
  <link rel="stylesheet" href="<?php echo htmlspecialchars($href); ?>" media="print" onload="this.media='all';document.documentElement.classList.remove('css-loading');">
  <noscript><link rel="stylesheet" href="<?php echo htmlspecialchars($href); ?>"></noscript>
<?php
}

/**
 * Google Tag Managerのスクリプトを出力
 */
function outputGTM() {
    $gtm_id = 'GTM-WPQJC7HF';
    ?>
    <!-- Google Tag Manager -->
    <script>
      (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', '<?php echo $gtm_id; ?>');
    </script>
    <!-- End Google Tag Manager -->
    <?php
}

/**
 * Google Tag Managerのnoscriptを出力
 */
function outputGTMNoscript() {
    $gtm_id = 'GTM-WPQJC7HF';
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $gtm_id; ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php
}
