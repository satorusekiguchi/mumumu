// Three.js 宇宙空間エフェクト
(function() {
  'use strict';

  // canvas要素を取得（DOMContentLoadedを待つ）
  function init() {
    // Three.jsが読み込まれるまで待機
    if (typeof THREE === 'undefined') {
      console.warn('Three.js is not loaded yet, retrying...');
      setTimeout(init, 100);
      return;
    }

    const canvas = document.getElementById('mv-canvas');
    
    if (!canvas) {
      console.warn('Canvas element not found, retrying...');
      setTimeout(init, 100);
      return;
    }
    
    console.log('Starting Three.js space effect...');
    startThreeJS(canvas);
  }
  
  function startThreeJS(canvas) {
    // シーン、カメラ、レンダラーの設定
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ 
      canvas: canvas,
      alpha: true,
      antialias: true
    });
    
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setClearColor(0x000000, 0);
    
    // canvasを固定配置
    canvas.style.position = 'fixed';
    canvas.style.top = '0';
    canvas.style.left = '0';
    canvas.style.width = '100%';
    canvas.style.height = '100%';
    canvas.style.zIndex = '0';
    canvas.style.pointerEvents = 'none';

    // カメラ位置
    camera.position.z = 50;

    // 星の色パレット
    const starColors = [
      0xffffff, // 白
      0xb8d4ff, // 淡い青
      0xa8c8ff, // 水色
      0xd4b8ff, // 淡い紫
      0xffd4b8, // 淡いオレンジ
      0xfff4b8, // 淡い黄色
      0xffb8b8, // 淡い赤
    ];

    // 星を格納する配列（パフォーマンス改善のため500に削減）
    const stars = [];
    const starCount = 500;

    // 🤔絵文字のテクスチャを作成
    function createEmojiTexture(emoji) {
      const canvas = document.createElement('canvas');
      canvas.width = 64;
      canvas.height = 64;
      const ctx = canvas.getContext('2d');
      ctx.font = '48px serif';
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.fillText(emoji, 32, 32);
      const texture = new THREE.CanvasTexture(canvas);
      texture.needsUpdate = true;
      return texture;
    }
    
    // 「む」テキストのテクスチャを作成
    function createMuTexture() {
      const canvas = document.createElement('canvas');
      canvas.width = 64;
      canvas.height = 64;
      const ctx = canvas.getContext('2d');
      ctx.font = "48px 'Nanum Pen Script', cursive";
      ctx.fillStyle = '#ffffff';
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.fillText('む', 32, 32);
      const texture = new THREE.CanvasTexture(canvas);
      texture.needsUpdate = true;
      return texture;
    }
    
    const thinkingTexture = createEmojiTexture('🤔');
    const muTexture = createMuTexture();

    // 星を作成
    for (let i = 0; i < starCount; i++) {
      // 5%の確率で🤔を表示、5%の確率で「む」を表示
      const rand = Math.random();
      const isThinking = rand < 0.05;
      const isMu = rand >= 0.05 && rand < 0.10; // 5%
      
      let star;
      
      if (isThinking) {
        // 🤔スプライトを作成
        const spriteMaterial = new THREE.SpriteMaterial({
          map: thinkingTexture,
          transparent: true,
          opacity: 0.3 + Math.random() * 0.7
        });
        star = new THREE.Sprite(spriteMaterial);
        const emojiSize = 0.8 + Math.random() * 1.2;
        star.scale.set(emojiSize, emojiSize, 1);
      } else if (isMu) {
        // 「む」スプライトを作成
        const spriteMaterial = new THREE.SpriteMaterial({
          map: muTexture,
          transparent: true,
          opacity: 0.2 + Math.random() * 0.5
        });
        star = new THREE.Sprite(spriteMaterial);
        const muSize = 1.0 + Math.random() * 1.5;
        star.scale.set(muSize, muSize, 1);
      } else {
        // 通常の星を作成
        // 星のサイズ（小さい星が多い）
        const size = Math.random() < 0.8 ? 
          (0.05 + Math.random() * 0.1) : 
          (0.15 + Math.random() * 0.3);
        
        const geometry = new THREE.SphereGeometry(size, 8, 8);
        
        // 色をランダムに選択（白が多い）
        const colorIndex = Math.random() < 0.7 ? 0 : Math.floor(Math.random() * starColors.length);
        const color = starColors[colorIndex];
        
        const material = new THREE.MeshBasicMaterial({
          color: color,
          transparent: true,
          opacity: 0.3 + Math.random() * 0.7
        });
        
        star = new THREE.Mesh(geometry, material);
      }
      
      // ランダムな位置に配置
      star.position.x = (Math.random() - 0.5) * 200;
      star.position.y = (Math.random() - 0.5) * 200;
      star.position.z = (Math.random() - 0.5) * 200 - 50;
      
      // きらめき効果用
      star.userData = {
        isThinking: isThinking,
        isMu: isMu,
        baseOpacity: star.material.opacity,
        twinkleSpeed: Math.random() * Math.PI * 2,
        twinkleRate: 0.5 + Math.random() * 2,
        velocityZ: 0.02 + Math.random() * 0.05
      };
      
      scene.add(star);
      stars.push(star);
    }

    // 地球を作成
    const earthRadius = 8;
    const earthGeometry = new THREE.SphereGeometry(earthRadius, 64, 64);
    
    // 地球のテクスチャを読み込み
    const textureLoader = new THREE.TextureLoader();
    
    // 地球のマテリアル（テクスチャなしの場合のフォールバック）
    const earthMaterial = new THREE.MeshBasicMaterial({
      color: 0x1a4d7c,
      transparent: true,
      opacity: 0.9
    });
    
    const earth = new THREE.Mesh(earthGeometry, earthMaterial);
    
    // 地球の位置設定（スクロールで変化）
    const earthStartZ = -30;  // 初期位置（奥）
    const earthEndZ = 20;     // 最終位置（手前）
    const earthOriginalPosition = { x: 0, y: 0, z: earthStartZ };
    earth.position.set(earthOriginalPosition.x, earthOriginalPosition.y, earthOriginalPosition.z);
    scene.add(earth);
    
    // スクロール深度を追跡
    let scrollProgress = 0;
    const scrollZone = 20000; // 固定：20000pxでスクロール完了
    
    function updateScrollProgress() {
      const scrollTop = window.scrollY || document.documentElement.scrollTop;
      // 0〜1の範囲に正規化
      scrollProgress = Math.min(scrollTop / scrollZone, 1);
      
      // イージング（ease-out）を適用してスムーズに
      const eased = 1 - Math.pow(1 - scrollProgress, 3);
      
      // 地球の目標位置を計算
      earthOriginalPosition.z = earthStartZ + (earthEndZ - earthStartZ) * eased;
    }
    
    window.addEventListener('scroll', updateScrollProgress, { passive: true });
    updateScrollProgress(); // 初期状態を設定
    
    // 地球の震え状態
    let earthShaking = false;
    let shakeStartTime = 0;
    const shakeDuration = 800; // 震える時間（ミリ秒）
    const shakeIntensity = 2; // 震えの強さ
    
    // 地球を震わせる関数をグローバルに公開
    window.shakeEarth = function() {
      if (!earthShaking) {
        earthShaking = true;
        shakeStartTime = Date.now();
        console.log('🌍 ぶるん！');
        
        // ロゴもぶるんと震わせる
        const logoText = document.getElementById('logo-text');
        if (logoText) {
          logoText.classList.add('shaking');
          setTimeout(() => {
            logoText.classList.remove('shaking');
          }, 800); // アニメーション終了後にクラスを削除
        }
      }
    };
    
    // 10秒に一度、地球を震わせる
    setInterval(function() {
      window.shakeEarth();
    }, 10000);
    
    // 地球のテクスチャを非同期で読み込み
    textureLoader.load(
      'https://unpkg.com/three-globe/example/img/earth-blue-marble.jpg',
      function(texture) {
        earth.material = new THREE.MeshBasicMaterial({
          map: texture,
          transparent: false
        });
      },
      undefined,
      function(err) {
        console.log('Earth texture not loaded, using fallback color');
        // フォールバック：グラデーション風の地球
        const canvas = document.createElement('canvas');
        canvas.width = 512;
        canvas.height = 256;
        const ctx = canvas.getContext('2d');
        
        // グラデーション背景（海）
        const gradient = ctx.createLinearGradient(0, 0, 0, 256);
        gradient.addColorStop(0, '#1a3a5c');
        gradient.addColorStop(0.3, '#1e5799');
        gradient.addColorStop(0.5, '#207cca');
        gradient.addColorStop(0.7, '#1e5799');
        gradient.addColorStop(1, '#1a3a5c');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, 512, 256);
        
        // 大陸を描く
        ctx.fillStyle = '#2d5a27';
        // アジア
        ctx.beginPath();
        ctx.ellipse(400, 100, 60, 40, 0, 0, Math.PI * 2);
        ctx.fill();
        // アフリカ
        ctx.beginPath();
        ctx.ellipse(280, 140, 30, 50, 0.3, 0, Math.PI * 2);
        ctx.fill();
        // 北米
        ctx.beginPath();
        ctx.ellipse(120, 80, 50, 35, -0.2, 0, Math.PI * 2);
        ctx.fill();
        // 南米
        ctx.beginPath();
        ctx.ellipse(150, 180, 25, 45, 0.2, 0, Math.PI * 2);
        ctx.fill();
        // オーストラリア
        ctx.beginPath();
        ctx.ellipse(440, 180, 25, 20, 0, 0, Math.PI * 2);
        ctx.fill();
        
        const fallbackTexture = new THREE.CanvasTexture(canvas);
        earth.material = new THREE.MeshBasicMaterial({
          map: fallbackTexture,
          transparent: false
        });
      }
    );
    
    // 地球の大気（グロー効果）
    const atmosphereGeometry = new THREE.SphereGeometry(earthRadius * 1.15, 64, 64);
    const atmosphereMaterial = new THREE.MeshBasicMaterial({
      color: 0x4da6ff,
      transparent: true,
      opacity: 0.15,
      side: THREE.BackSide
    });
    const atmosphere = new THREE.Mesh(atmosphereGeometry, atmosphereMaterial);
    atmosphere.position.copy(earth.position);
    scene.add(atmosphere);

    // マウス位置を追跡
    const mouse = { x: 0, y: 0 };
    const targetMouse = { x: 0, y: 0 };
    
    window.addEventListener('mousemove', (event) => {
      targetMouse.x = (event.clientX / window.innerWidth) * 2 - 1;
      targetMouse.y = -(event.clientY / window.innerHeight) * 2 + 1;
    });

    // アニメーション
    let time = 0;
    function animate() {
      requestAnimationFrame(animate);
      time += 0.01;

      // マウス位置をスムーズに追跡
      mouse.x += (targetMouse.x - mouse.x) * 0.05;
      mouse.y += (targetMouse.y - mouse.y) * 0.05;

      // 星の更新
      stars.forEach((star) => {
        // 星が手前に流れてくる効果
        star.position.z += star.userData.velocityZ;
        
        // 画面外に出たら奥にリセット
        if (star.position.z > 50) {
          star.position.z = -150;
          star.position.x = (Math.random() - 0.5) * 200;
          star.position.y = (Math.random() - 0.5) * 200;
        }

        // きらめき効果
        const twinkle = Math.sin(time * star.userData.twinkleRate + star.userData.twinkleSpeed) * 0.4 + 0.6;
        star.material.opacity = star.userData.baseOpacity * twinkle;
        
        // サイズも微細に変化
        const scale = 0.8 + twinkle * 0.4;
        star.scale.set(scale, scale, scale);
      });

      // 地球の回転
      earth.rotation.y += 0.002;
      atmosphere.rotation.y += 0.001;
      
      // 地球の震え処理
      if (earthShaking) {
        const elapsed = Date.now() - shakeStartTime;
        if (elapsed < shakeDuration) {
          // 震えの強さを徐々に減衰（easeOut）
          const progress = elapsed / shakeDuration;
          const decay = 1 - progress;
          const intensity = shakeIntensity * decay;
          
          // ランダムな方向に震える（ぶるんっと）
          const shakeX = (Math.random() - 0.5) * intensity;
          const shakeY = (Math.random() - 0.5) * intensity;
          const shakeZ = (Math.random() - 0.5) * intensity * 0.5;
          
          earth.position.x = earthOriginalPosition.x + shakeX;
          earth.position.y = earthOriginalPosition.y + shakeY;
          earth.position.z = earthOriginalPosition.z + shakeZ;
          atmosphere.position.copy(earth.position);
          
          // スケールも少し変化（ぶるんっと膨らむ感じ）
          const scaleWobble = 1 + Math.sin(elapsed * 0.05) * 0.03 * decay;
          earth.scale.set(scaleWobble, scaleWobble, scaleWobble);
        } else {
          // 震え終了、元の位置に戻す
          earthShaking = false;
          earth.position.set(earthOriginalPosition.x, earthOriginalPosition.y, earthOriginalPosition.z);
          atmosphere.position.copy(earth.position);
          earth.scale.set(1, 1, 1);
        }
      } else {
        // スクロールに応じて地球の位置を更新（震えていない時）
        earth.position.z = earthOriginalPosition.z;
        atmosphere.position.z = earthOriginalPosition.z;
      }

      // カメラの微細な動き
      camera.position.x = mouse.x * 5;
      camera.position.y = mouse.y * 5;
      camera.lookAt(0, 0, earthOriginalPosition.z);

      renderer.render(scene, camera);
    }

    // リサイズ処理
    function handleResize() {
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
      renderer.setSize(window.innerWidth, window.innerHeight);
    }

    window.addEventListener('resize', handleResize);

    // アニメーション開始
    console.log('Animation started with', stars.length, 'stars');
    animate();
  }
  
  // DOMContentLoadedまたは即座に実行
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
