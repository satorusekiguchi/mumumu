<?php
require_once __DIR__ . '/includes/common.php';

// ページ設定
$level = 0;
$prefix = './';
setPageMeta(
    '404 - ページが見つかりません | ' . SITE_NAME,
    'お探しのページは見つかりませんでした。宇宙のどこかで迷子になってしまったようです。',
    '404 Not Found',
    '404 Not Found',
    [
        'robots' => 'noindex, nofollow'
    ]
);
?>
<!DOCTYPE html>
<html lang="ja">

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
  
  <style>
    /* 404 Page Specific Styles */
    .error-page {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      position: relative;
      overflow: hidden;
      margin-top: 0;
      padding-top: 80px;
    }

    /* Starfield Background */
    .starfield {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 0;
    }

    .star {
      position: absolute;
      background: #fff;
      border-radius: 50%;
      animation: twinkle var(--duration) ease-in-out infinite;
    }

    @keyframes twinkle {
      0%, 100% { opacity: var(--opacity); transform: scale(1); }
      50% { opacity: 1; transform: scale(1.2); }
    }

    /* Floating 404 */
    .floating-404 {
      font-family: var(--font-impact);
      font-size: clamp(8rem, 25vw, 20rem);
      color: transparent;
      -webkit-text-stroke: 2px rgba(255, 255, 255, 0.1);
      position: absolute;
      user-select: none;
      pointer-events: none;
      z-index: 1;
      transition: transform 0.1s ease-out;
    }

    .floating-404.main {
      z-index: 2;
      -webkit-text-stroke: 3px rgba(255, 255, 255, 0.15);
    }

    /* Error Content */
    .error-content {
      text-align: center;
      max-width: 600px;
      z-index: 10;
      position: relative;
    }

    .error-number {
      font-family: var(--font-impact);
      font-size: clamp(6rem, 20vw, 12rem);
      color: transparent;
      -webkit-text-stroke: 2px rgba(255, 255, 255, 0.3);
      line-height: 1;
      margin-bottom: 20px;
      position: relative;
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
      user-select: none;
    }

    .error-number:hover {
      -webkit-text-stroke: 2px rgba(255, 255, 255, 0.8);
      text-shadow: 0 0 60px rgba(255, 255, 255, 0.3);
      transform: scale(1.05);
    }

    .error-number.clicked {
      animation: bounce 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes bounce {
      0% { transform: scale(1); }
      30% { transform: scale(0.9) rotate(-5deg); }
      50% { transform: scale(1.1) rotate(5deg); }
      70% { transform: scale(0.95); }
      100% { transform: scale(1); }
    }

    /* Emoji Orbiting */
    .orbiting-emoji {
      position: absolute;
      font-size: 2rem;
      pointer-events: none;
      animation: orbit 8s linear infinite;
      z-index: 3;
    }

    @keyframes orbit {
      from { transform: rotate(0deg) translateX(120px) rotate(0deg); }
      to { transform: rotate(360deg) translateX(120px) rotate(-360deg); }
    }

    .orbiting-emoji:nth-child(2) { animation-delay: -2s; }
    .orbiting-emoji:nth-child(3) { animation-delay: -4s; }
    .orbiting-emoji:nth-child(4) { animation-delay: -6s; }

    .error-title {
      font-family: var(--font-impact);
      font-size: clamp(1.5rem, 4vw, 2.5rem);
      color: #fff;
      margin-bottom: 16px;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }

    .error-message {
      font-size: 1.1rem;
      color: rgba(255, 255, 255, 0.6);
      line-height: 1.8;
      margin-bottom: 40px;
    }

    .error-message .highlight {
      color: #fff;
      font-weight: 600;
    }

    /* Click Counter */
    .click-counter {
      font-family: var(--font-en);
      font-size: 0.85rem;
      color: rgba(255, 255, 255, 0.4);
      margin-top: 24px;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .click-counter.visible {
      opacity: 1;
    }

    .click-counter .count {
      color: rgba(255, 255, 255, 0.8);
      font-weight: 600;
    }

    /* Secret Message */
    .secret-message {
      position: fixed;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%) translateY(100px);
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 100px;
      padding: 16px 32px;
      font-size: 0.95rem;
      color: #fff;
      opacity: 0;
      pointer-events: none;
      transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
      z-index: 100;
    }

    .secret-message.visible {
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }

    /* Shooting Star */
    .shooting-star {
      position: fixed;
      width: 100px;
      height: 2px;
      background: linear-gradient(90deg, rgba(255,255,255,0.8), transparent);
      border-radius: 50%;
      pointer-events: none;
      opacity: 0;
      z-index: 5;
    }

    .shooting-star.active {
      animation: shoot 1s ease-out forwards;
    }

    @keyframes shoot {
      0% { opacity: 1; transform: translateX(0) translateY(0); }
      100% { opacity: 0; transform: translateX(500px) translateY(200px); }
    }

    /* Action Buttons */
    .error-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      margin-top: 40px;
    }

    .error-btn {
      position: relative;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 18px 48px;
      font-family: var(--font-en);
      font-size: 1rem;
      font-weight: 500;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.95);
      text-decoration: none;
      border: none;
      border-radius: 100px;
      cursor: pointer;
      overflow: hidden;
      isolation: isolate;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .error-btn::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      background: linear-gradient(
        135deg,
        rgba(255, 255, 255, 0.15) 0%,
        rgba(255, 255, 255, 0.05) 40%,
        rgba(255, 255, 255, 0.02) 60%,
        rgba(255, 255, 255, 0.08) 100%
      );
      backdrop-filter: blur(20px) saturate(180%);
      -webkit-backdrop-filter: blur(20px) saturate(180%);
      z-index: -2;
    }

    .error-btn::after {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      padding: 1.5px;
      background: linear-gradient(
        var(--liquid-angle-1, -75deg),
        rgba(255, 255, 255, 0.5) 0%,
        rgba(255, 255, 255, 0.1) 30%,
        rgba(255, 255, 255, 0.05) 50%,
        rgba(255, 255, 255, 0.1) 70%,
        rgba(255, 255, 255, 0.4) 100%
      );
      -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
      z-index: -1;
      animation: liquidBorderRotate 8s linear infinite;
    }

    @keyframes liquidBorderRotate {
      0% { --liquid-angle-1: -75deg; }
      100% { --liquid-angle-1: 285deg; }
    }

    @property --liquid-angle-1 {
      syntax: "<angle>";
      inherits: false;
      initial-value: -75deg;
    }

    .error-btn:hover {
      transform: translateY(-3px) scale(1.02);
      color: #fff;
      opacity: 1;
      box-shadow: 0 10px 40px rgba(255, 255, 255, 0.1);
    }

    .error-btn.secondary {
      padding: 14px 36px;
      font-size: 0.9rem;
    }

    .error-btn.secondary::before {
      background: linear-gradient(
        135deg,
        rgba(255, 255, 255, 0.08) 0%,
        rgba(255, 255, 255, 0.02) 40%,
        rgba(255, 255, 255, 0.01) 60%,
        rgba(255, 255, 255, 0.05) 100%
      );
    }

    /* Parallax UFO */
    .ufo {
      position: fixed;
      font-size: 3rem;
      opacity: 0.6;
      transition: transform 0.3s ease-out;
      z-index: 2;
      pointer-events: none;
    }

    /* Fun facts */
    .fun-fact {
      position: fixed;
      bottom: 100px;
      right: 40px;
      max-width: 280px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 16px;
      padding: 20px;
      font-size: 0.85rem;
      color: rgba(255, 255, 255, 0.6);
      line-height: 1.7;
      z-index: 10;
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.5s ease;
    }

    .fun-fact.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .fun-fact-label {
      font-family: var(--font-en);
      font-size: 0.7rem;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.4);
      margin-bottom: 8px;
      display: block;
    }

    /* Easter egg hint */
    .easter-egg-hint {
      position: fixed;
      top: 100px;
      right: 40px;
      font-family: var(--font-en);
      font-size: 0.75rem;
      color: rgba(255, 255, 255, 0.2);
      letter-spacing: 0.1em;
      transition: color 0.3s ease;
      z-index: 10;
    }

    .easter-egg-hint:hover {
      color: rgba(255, 255, 255, 0.4);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
      .error-page {
        padding: 20px;
        padding-top: 100px;
      }

      .error-actions {
        flex-direction: column;
        width: 100%;
      }

      .error-btn {
        width: 100%;
      }

      .fun-fact {
        position: static;
        margin-top: 60px;
        max-width: 100%;
        transform: none;
        opacity: 1;
      }

      .easter-egg-hint {
        display: none;
      }

      .floating-404 {
        display: none;
      }

      .orbiting-emoji {
        font-size: 1.5rem;
      }

      @keyframes orbit {
        from { transform: rotate(0deg) translateX(80px) rotate(0deg); }
        to { transform: rotate(360deg) translateX(80px) rotate(-360deg); }
      }
    }
  </style>
</head>

<body>

  <?php outputGTMNoscript(); ?>

  <!-- Background Lines Effect -->
  <div class="lines" aria-hidden="true">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>

  <?php
  $level = 0;
  include __DIR__ . '/templates/header.php';
  include __DIR__ . '/templates/nav.php';
  ?>

  <main class="error-page">
    <!-- Starfield -->
    <div class="starfield" id="starfield"></div>

    <!-- Floating 404s in background -->
    <div class="floating-404" style="top: 10%; left: 5%;">404</div>
    <div class="floating-404" style="top: 60%; right: 10%;">404</div>
    <div class="floating-404 main" style="top: 30%; left: 50%; transform: translateX(-50%);">404</div>

    <!-- UFO that follows mouse -->
    <div class="ufo" id="ufo">🛸</div>

    <!-- Shooting Stars -->
    <div class="shooting-star" id="shootingStar1"></div>
    <div class="shooting-star" id="shootingStar2"></div>

    <!-- Main Content -->
    <div class="error-content">
      <div class="error-number" id="error404" role="button" aria-label="404をクリックして遊ぶ">
        404
        <!-- Orbiting Emojis -->
        <span class="orbiting-emoji">🌙</span>
        <span class="orbiting-emoji">✨</span>
        <span class="orbiting-emoji">🪐</span>
        <span class="orbiting-emoji">⭐</span>
      </div>
      
      <h1 class="error-title">Lost in Space</h1>
      
      <p class="error-message">
        お探しのページは<span class="highlight">宇宙のどこかで迷子</span>になってしまったようです。<br>
        でも大丈夫、私たちが地球に戻るお手伝いをします。
      </p>

      <div class="error-actions">
        <a href="<?php echo $prefix; ?>" class="error-btn">
          <span>ホームに戻る</span>
        </a>
        <a href="<?php echo $prefix; ?>contact/" class="error-btn secondary">
          <span>お問い合わせ</span>
        </a>
      </div>

      <div class="click-counter" id="clickCounter">
        404を <span class="count" id="clickCount">0</span> 回クリックしました
      </div>
    </div>

    <!-- Fun Fact -->
    <div class="fun-fact" id="funFact">
      <span class="fun-fact-label">Did you know?</span>
      <span id="funFactText">HTTPステータスコード「404」は、ページが見つからないことを意味します。最初のWebサーバーがあったCERNの部屋番号が404だったという都市伝説があります。</span>
    </div>

    <!-- Easter Egg Hint -->
    <div class="easter-egg-hint">
      Hint: 404をクリックしてみて 🤫
    </div>

    <!-- Secret Message -->
    <div class="secret-message" id="secretMessage">
      🎉 宇宙探検家の証！あなたは404マスターです！
    </div>
  </main>

  <?php include __DIR__ . '/templates/footer.php'; ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
  <script src="<?php echo $prefix; ?>js/common.js" defer></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Generate Stars
      const starfield = document.getElementById('starfield');
      for (let i = 0; i < 150; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.cssText = `
          left: ${Math.random() * 100}%;
          top: ${Math.random() * 100}%;
          width: ${Math.random() * 3 + 1}px;
          height: ${Math.random() * 3 + 1}px;
          --opacity: ${Math.random() * 0.5 + 0.3};
          --duration: ${Math.random() * 3 + 2}s;
          animation-delay: ${Math.random() * 5}s;
        `;
        starfield.appendChild(star);
      }

      // UFO follows mouse
      const ufo = document.getElementById('ufo');
      let mouseX = 0, mouseY = 0;
      let ufoX = 0, ufoY = 0;

      document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
      });

      function animateUFO() {
        ufoX += (mouseX - ufoX - 30) * 0.05;
        ufoY += (mouseY - ufoY - 30) * 0.05;
        ufo.style.left = ufoX + 'px';
        ufo.style.top = ufoY + 'px';
        requestAnimationFrame(animateUFO);
      }
      animateUFO();

      // Floating 404s parallax
      const floating404s = document.querySelectorAll('.floating-404');
      document.addEventListener('mousemove', (e) => {
        const x = (e.clientX - window.innerWidth / 2) / 50;
        const y = (e.clientY - window.innerHeight / 2) / 50;
        
        floating404s.forEach((el, index) => {
          const speed = (index + 1) * 0.5;
          el.style.transform = `translate(${x * speed}px, ${y * speed}px)`;
        });
      });

      // Click counter for 404
      const error404 = document.getElementById('error404');
      const clickCounter = document.getElementById('clickCounter');
      const clickCount = document.getElementById('clickCount');
      const secretMessage = document.getElementById('secretMessage');
      let clicks = 0;

      const achievements = {
        5: '🚀 探検開始！',
        10: '🌟 銀河を越えて！',
        20: '🎯 宇宙マスターへの道！',
        50: '🏆 404エキスパート！',
        100: '🎉 伝説の宇宙探検家！'
      };

      error404.addEventListener('click', function() {
        clicks++;
        clickCount.textContent = clicks;
        clickCounter.classList.add('visible');
        
        // Bounce animation
        error404.classList.add('clicked');
        setTimeout(() => error404.classList.remove('clicked'), 600);

        // Show achievements
        if (achievements[clicks]) {
          secretMessage.textContent = achievements[clicks];
          secretMessage.classList.add('visible');
          setTimeout(() => secretMessage.classList.remove('visible'), 3000);
        }

        // Trigger shooting star on every 5 clicks
        if (clicks % 5 === 0) {
          triggerShootingStar();
        }
      });

      // Shooting star function
      function triggerShootingStar() {
        const star = document.getElementById('shootingStar' + (Math.random() > 0.5 ? '1' : '2'));
        star.style.left = Math.random() * 50 + '%';
        star.style.top = Math.random() * 50 + '%';
        star.style.transform = `rotate(${Math.random() * 45 + 20}deg)`;
        star.classList.remove('active');
        void star.offsetWidth; // Trigger reflow
        star.classList.add('active');
      }

      // Random shooting stars
      setInterval(() => {
        if (Math.random() > 0.7) {
          triggerShootingStar();
        }
      }, 4000);

      // Fun facts rotation
      const funFacts = [
        'HTTPステータスコード「404」は、ページが見つからないことを意味します。最初のWebサーバーがあったCERNの部屋番号が404だったという都市伝説があります。',
        '宇宙には約2兆個の銀河があると推定されています。でもこのページはその中のどこにもありません。',
        '光は1秒間に約30万km進みます。でも404エラーは光よりも速くあなたのもとに届きます。',
        'NASAのWebサイトでも時々404エラーが発生します。宇宙探査でさえ完璧ではないのです。',
        'インターネット上の404エラーページの中には、ミニゲームが遊べるものもあります。',
      ];
      
      let factIndex = 0;
      const funFactText = document.getElementById('funFactText');
      const funFact = document.getElementById('funFact');
      
      // Show fun fact after delay
      setTimeout(() => {
        funFact.classList.add('visible');
      }, 2000);

      setInterval(() => {
        factIndex = (factIndex + 1) % funFacts.length;
        funFact.style.opacity = '0';
        setTimeout(() => {
          funFactText.textContent = funFacts[factIndex];
          funFact.style.opacity = '1';
        }, 500);
      }, 8000);

      // Konami code easter egg
      const konamiCode = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'b', 'a'];
      let konamiIndex = 0;

      document.addEventListener('keydown', (e) => {
        if (e.key === konamiCode[konamiIndex]) {
          konamiIndex++;
          if (konamiIndex === konamiCode.length) {
            // Easter egg activated!
            document.body.style.animation = 'rainbow 2s linear infinite';
            secretMessage.textContent = '🌈 コナミコマンド発見！レトロゲーマーの証！';
            secretMessage.classList.add('visible');
            setTimeout(() => {
              secretMessage.classList.remove('visible');
              document.body.style.animation = '';
            }, 5000);
            konamiIndex = 0;
          }
        } else {
          konamiIndex = 0;
        }
      });
    });

    // Rainbow animation for Konami code
    const style = document.createElement('style');
    style.textContent = `
      @keyframes rainbow {
        0% { filter: hue-rotate(0deg); }
        100% { filter: hue-rotate(360deg); }
      }
    `;
    document.head.appendChild(style);
  </script>
</body>
</html>

