// ============================================
// Big Bang Loading - 初回読み込み専用
// ============================================
(function() {
  const LOADER_KEY = 'mumumu_visited';
  const loader = document.getElementById('bigbang-loader');
  
  // ローダーがない、またはno-loaderクラスがある場合はスキップ
  if (!loader || document.documentElement.classList.contains('no-loader')) {
    // 2回目以降はMVテキストを即座に表示
    document.addEventListener('DOMContentLoaded', function() {
      const mvContent = document.querySelector('.mv-content');
      if (mvContent) {
        mvContent.classList.add('show');
      }
    });
    return;
  }
  
  // 初回訪問：ローディングを表示
  document.body.classList.add('loading');
  
  // MVテキストを初期状態で非表示に
  document.addEventListener('DOMContentLoaded', function() {
    const mvContent = document.querySelector('.mv-content');
    if (mvContent) {
      mvContent.classList.add('wait-for-loader');
    }
  });
  
  // アニメーション完了後にローダーを非表示（ロゴが消えるまで待つ）
  const totalAnimationTime = 3000; // 4.2秒後に完了（ロゴ消失アニメーション完了後）
  
  setTimeout(() => {
    loader.classList.add('hidden');
    document.body.classList.remove('loading');
    
    // MVテキストのアニメーションを開始
    const mvContent = document.querySelector('.mv-content');
    if (mvContent) {
      mvContent.classList.remove('wait-for-loader');
      mvContent.classList.add('show');
    }
    
    // フェードアウト完了後にDOMから削除
    setTimeout(() => {
      loader.classList.add('removed');
    }, 800);
    
    // 訪問済みフラグを設定
    sessionStorage.setItem(LOADER_KEY, 'true');
  }, totalAnimationTime);
})();

$(function () {
  // メニュー開閉
  $(".menu-trigger").click(function () {
    $('body').toggleClass("menu-open");
  });

  // メニューリンククリック時に閉じる（nav-links内のリンクのみ）
  $(".nav-links a").click(function () {
    $('body').removeClass("menu-open");
  });

  // ESCキーでメニューを閉じる
  $(document).keydown(function(e) {
    if (e.key === 'Escape' && $('body').hasClass('menu-open')) {
      $('body').removeClass('menu-open');
    }
  });

  // スクロール時のヘッダー背景制御
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('header').addClass('scrolled');
    } else {
      $('header').removeClass('scrolled');
    }
  });

  // スムーススクロール
  $('a[href^="#"]').click(function () {
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $('body,html').animate({
      scrollTop: position
    }, speed, 'swing');
    return false;
  });
});

// スクロールアニメーション (Intersection Observer)
function scrollAnimation() {
  const elements = document.querySelectorAll('.fade-in-up');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // mv-content内の要素はローディング完了後に別途制御するのでスキップ
        const mvContent = entry.target.closest('.mv-content');
        if (mvContent && mvContent.classList.contains('wait-for-loader')) {
          return;
        }
        entry.target.classList.add('show');
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  });

  elements.forEach(element => {
    observer.observe(element);
  });
}


document.addEventListener('DOMContentLoaded', () => {
  scrollAnimation();
  initWorkCarousel();
  initSecretGimmick();
  initMagnetButtons();
  initBackToTop();
  initFooterAccordion();
});

// Back to Top ボタン
function initBackToTop() {
  const backToTopBtn = document.querySelector('.back-to-top');
  if (!backToTopBtn) return;
  
  backToTopBtn.addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
}

// Footer Accordion (モバイル用)
function initFooterAccordion() {
  const toggles = document.querySelectorAll('.footer-nav-toggle');
  if (!toggles.length) return;
  
  toggles.forEach(toggle => {
    toggle.addEventListener('click', function() {
      const parentCol = this.closest('.footer-nav-col');
      const isOpen = parentCol.classList.contains('is-open');
      
      // 他のアコーディオンを閉じる
      document.querySelectorAll('.footer-nav-col.is-open').forEach(col => {
        if (col !== parentCol) {
          col.classList.remove('is-open');
          col.querySelector('.footer-nav-toggle').setAttribute('aria-expanded', 'false');
        }
      });
      
      // 現在のアコーディオンをトグル
      if (isOpen) {
        parentCol.classList.remove('is-open');
        this.setAttribute('aria-expanded', 'false');
      } else {
        parentCol.classList.add('is-open');
        this.setAttribute('aria-expanded', 'true');
      }
    });
  });
}

// マグネットボタン - マウスに吸い寄せられる効果
function initMagnetButtons() {
  const magnetButtons = document.querySelectorAll('.contact-btn, .liquid-glass-btn, .view-all a, .company-link-btn');
  
  magnetButtons.forEach(btn => {
    btn.addEventListener('mousemove', function(e) {
      const rect = this.getBoundingClientRect();
      const x = e.clientX - rect.left - rect.width / 2;
      const y = e.clientY - rect.top - rect.height / 2;
      
      // マグネット効果の強さ（値が大きいほど弱い）
      const strength = 3;
      
      this.style.transform = `translate(${x / strength}px, ${y / strength}px)`;
    });
    
    btn.addEventListener('mouseleave', function() {
      this.style.transform = 'translate(0, 0)';
    });
  });
}

// 隠しギミック - 「好き」をクリックすると地球が震える & カスタムカーソル
function initSecretGimmick() {
  const sukiTrigger = document.getElementById('suki-trigger');
  if (!sukiTrigger) return;
  
  // カスタムカーソル要素を作成
  const sukiCursor = document.createElement('div');
  sukiCursor.className = 'suki-cursor';
  sukiCursor.textContent = '🫶';
  document.body.appendChild(sukiCursor);
  
  // マウス移動時にカーソル位置を更新
  sukiTrigger.addEventListener('mousemove', (e) => {
    sukiCursor.style.left = e.clientX + 'px';
    sukiCursor.style.top = e.clientY + 'px';
  });
  
  // ホバー時にカスタムカーソルを表示
  sukiTrigger.addEventListener('mouseenter', (e) => {
    sukiCursor.style.left = e.clientX + 'px';
    sukiCursor.style.top = e.clientY + 'px';
    sukiCursor.classList.add('visible');
  });
  
  // マウスが離れたらカスタムカーソルを非表示
  sukiTrigger.addEventListener('mouseleave', () => {
    sukiCursor.classList.remove('visible');
  });
  
  // クリック時のアニメーション
  sukiTrigger.addEventListener('mousedown', () => {
    sukiCursor.classList.add('clicking');
  });
  
  sukiTrigger.addEventListener('mouseup', () => {
    sukiCursor.classList.remove('clicking');
  });
  
  sukiTrigger.addEventListener('click', (e) => {
    e.preventDefault();
    // グローバルに公開されたshakeEarth関数を呼び出す
    if (typeof window.shakeEarth === 'function') {
      window.shakeEarth();
    }
  });
}

// Work Carousel
function initWorkCarousel() {
  const carousel = document.getElementById('workCarousel');
  if (!carousel) return;

  const items = carousel.querySelectorAll('.work-item');
  if (items.length <= 3) return; // 3個以下ならカルーセル不要

  const container = carousel.parentElement;
  const prevBtn = document.querySelector('.work-carousel-prev');
  const nextBtn = document.querySelector('.work-carousel-next');

  let currentIndex = 0;
  let itemWidth = 0;
  let maxIndex = 0;
  
  // 画面幅に応じて表示カラム数を取得
  function getVisibleColumns() {
    const windowWidth = window.innerWidth;
    if (windowWidth <= 768) return 1;
    if (windowWidth <= 1024) return 2;
    return 3;
  }
  
  function recalculateDimensions() {
    itemWidth = items[0].offsetWidth + 40;
    const visibleColumns = getVisibleColumns();
    maxIndex = Math.max(0, items.length - visibleColumns);
    if (currentIndex > maxIndex) {
      currentIndex = Math.max(0, maxIndex);
    }
  }

  function updateCarousel() {
    const translateX = -currentIndex * itemWidth;
    carousel.style.transform = `translateX(${translateX}px)`;
    
    // ボタンの有効/無効状態
    if (prevBtn) {
      prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
      prevBtn.style.pointerEvents = currentIndex === 0 ? 'none' : 'auto';
    }
    if (nextBtn) {
      nextBtn.style.opacity = currentIndex >= maxIndex ? '0.5' : '1';
      nextBtn.style.pointerEvents = currentIndex >= maxIndex ? 'none' : 'auto';
    }
  }

  function slideNext() {
    if (currentIndex < maxIndex) {
      currentIndex++;
      updateCarousel();
    }
  }

  function slidePrev() {
    if (currentIndex > 0) {
      currentIndex--;
      updateCarousel();
    }
  }

  // ボタンイベント
  if (prevBtn) {
    prevBtn.addEventListener('click', slidePrev);
  }
  if (nextBtn) {
    nextBtn.addEventListener('click', slideNext);
  }

  // タッチ/マウスドラッグ対応
  let isDragging = false;
  let startX = 0;
  let scrollLeft = 0;

  carousel.addEventListener('mousedown', (e) => {
    isDragging = true;
    startX = e.pageX - carousel.offsetLeft;
    scrollLeft = currentIndex * itemWidth;
    carousel.style.cursor = 'grabbing';
  });

  carousel.addEventListener('mouseleave', () => {
    isDragging = false;
    carousel.style.cursor = 'grab';
  });

  carousel.addEventListener('mouseup', () => {
    isDragging = false;
    carousel.style.cursor = 'grab';
  });

  carousel.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    e.preventDefault();
    const x = e.pageX - carousel.offsetLeft;
    const walk = (x - startX) * 2;
    const newTranslateX = -(scrollLeft - walk);
    carousel.style.transform = `translateX(${newTranslateX}px)`;
  });

  // タッチイベント
  let touchStartX = 0;
  let touchStartY = 0;

  carousel.addEventListener('touchstart', (e) => {
    touchStartX = e.touches[0].clientX;
    touchStartY = e.touches[0].clientY;
  });

  carousel.addEventListener('touchmove', (e) => {
    if (!touchStartX || !touchStartY) return;
    
    const touchEndX = e.touches[0].clientX;
    const touchEndY = e.touches[0].clientY;
    const diffX = touchStartX - touchEndX;
    const diffY = touchStartY - touchEndY;

    // 横スクロールの方が大きい場合のみ処理
    if (Math.abs(diffX) > Math.abs(diffY)) {
      e.preventDefault();
      const newTranslateX = -(currentIndex * itemWidth - diffX);
      carousel.style.transform = `translateX(${newTranslateX}px)`;
    }
  });

  carousel.addEventListener('touchend', (e) => {
    if (!touchStartX || !touchStartY) return;

    const touchEndX = e.changedTouches[0].clientX;
    const touchEndY = e.changedTouches[0].clientY;
    const diffX = touchStartX - touchEndX;
    const diffY = touchStartY - touchEndY;

    // 横スクロールの方が大きく、一定の距離を超えた場合
    if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 50) {
      if (diffX > 0) {
        slideNext();
      } else {
        slidePrev();
      }
    } else {
      // スワイプが不十分な場合は元の位置に戻す
      updateCarousel();
    }

    touchStartX = 0;
    touchStartY = 0;
  });

  // リサイズ時の再計算
  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      recalculateDimensions();
      updateCarousel();
    }, 250);
  });
  
  // 初期計算
  recalculateDimensions();
  updateCarousel();

  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      recalculateDimensions();
    }, 250);
  });

  // 初期状態の設定
  updateCarousel();
  carousel.style.cursor = 'grab';
}
