<?php
// 現在のディレクトリレベルを取得
$level = isset($level) ? $level : 0;
$prefix = $level > 0 ? str_repeat('../', $level) : './';
?>
<!-- Footer -->
<footer class="site-footer">
  <!-- Footer Main -->
  <div class="footer-main">
    <div class="footer-inner">
      <!-- Footer Brand -->
      <div class="footer-brand">
        <a href="<?php echo $prefix; ?>" class="footer-logo">
          <span class="footer-logo-text">mumumu</span>
        </a>
        <p class="footer-tagline">個人の「好き」で経済を動かす</p>
      </div>

      <!-- Footer Navigation -->
      <div class="footer-nav-section">
        <div class="footer-nav-col">
          <button class="footer-nav-toggle" aria-expanded="false">
            <span class="footer-nav-title">Services</span>
            <span class="footer-nav-icon">+</span>
          </button>
          <ul class="footer-nav-list">
            <li><a href="<?php echo $prefix; ?>services/digital-marketing/">Digital Marketing</a></li>
            <li><a href="<?php echo $prefix; ?>services/fandom-marketing/">Fandom Marketing</a></li>
            <li><a href="<?php echo $prefix; ?>services/beauty/">Beauty Brand</a></li>
          </ul>
        </div>
        <div class="footer-nav-col">
          <button class="footer-nav-toggle" aria-expanded="false">
            <span class="footer-nav-title">Company</span>
            <span class="footer-nav-icon">+</span>
          </button>
          <ul class="footer-nav-list">
            <li><a href="<?php echo $prefix; ?>mission/">Who we are</a></li>
            <li><a href="<?php echo $prefix; ?>company/">Company</a></li>
            <li><a href="<?php echo $prefix; ?>news/">News</a></li>
          </ul>
        </div>
        <div class="footer-nav-col">
          <button class="footer-nav-toggle" aria-expanded="false">
            <span class="footer-nav-title">Works</span>
            <span class="footer-nav-icon">+</span>
          </button>
          <ul class="footer-nav-list">
            <li><a href="<?php echo $prefix; ?>works/">All Works</a></li>
            <li><a href="<?php echo $prefix; ?>ad-cases/">Ad Cases</a></li>
          </ul>
        </div>
      </div>

      <!-- Footer Contact -->
      <div class="footer-contact">
        <h4 class="footer-contact-title">Contact</h4>
        <a href="<?php echo $prefix; ?>contact/" class="footer-contact-btn">
          <span class="btn-text">お問い合わせ</span>
          <span class="btn-arrow">→</span>
        </a>
        <div class="footer-address">
          <p>〒600-8223<br>京都府京都市下京区大黒町227番地<br>第２キョートビル402</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    <div class="footer-inner">
      <div class="footer-bottom-left">
        <a href="<?php echo $prefix; ?>privacy-policy/" class="footer-legal-link">Privacy Policy</a>
      </div>
      <div class="footer-bottom-center">
        <p class="copyright">&copy; <?php echo date('Y'); ?> mumumu Inc.</p>
      </div>
      <div class="footer-bottom-right">
        <a href="#" class="back-to-top" aria-label="ページトップへ戻る">
          <span class="top-arrow">↑</span>
          <span class="top-text">Top</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Footer Background Decoration -->
  <div class="footer-bg-decoration" aria-hidden="true">
    <div class="footer-glow"></div>
  </div>
</footer>
