<?php
// 現在のディレクトリレベルを取得
$level = isset($level) ? $level : 0;
$prefix = $level > 0 ? str_repeat('../', $level) : './';
?>
<!-- Global Navigation -->
<nav class="global-nav">
  <div class="nav-container">
    <!-- Left Side: Main Navigation -->
    <div class="nav-main">
      <ul class="nav-links">
        <li data-index="01">
          <a href="<?php echo $prefix; ?>">
            <span class="nav-number">01</span>
            <span class="nav-text">Top</span>
            <span class="nav-line"></span>
          </a>
        </li>
        <li data-index="02">
          <a href="<?php echo $prefix; ?>works/">
            <span class="nav-number">02</span>
            <span class="nav-text">Work</span>
            <span class="nav-line"></span>
          </a>
        </li>
        <li data-index="03">
          <a href="<?php echo $prefix; ?>services/">
            <span class="nav-number">03</span>
            <span class="nav-text">Service</span>
            <span class="nav-line"></span>
          </a>
        </li>
        <li data-index="04">
          <a href="<?php echo $prefix; ?>news/">
            <span class="nav-number">04</span>
            <span class="nav-text">News</span>
            <span class="nav-line"></span>
          </a>
        </li>
        <li data-index="05">
          <a href="<?php echo $prefix; ?>company/">
            <span class="nav-number">05</span>
            <span class="nav-text">Company</span>
            <span class="nav-line"></span>
          </a>
        </li>
        <li data-index="06">
          <a href="<?php echo $prefix; ?>mission/">
            <span class="nav-number">06</span>
            <span class="nav-text">Who we are</span>
            <span class="nav-line"></span>
          </a>
        </li>
        <li data-index="07">
          <a href="<?php echo $prefix; ?>contact/">
            <span class="nav-number">07</span>
            <span class="nav-text">Contact</span>
            <span class="nav-line"></span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Right Side: Info Panel -->
    <div class="nav-info">
      <div class="nav-info-block nav-tagline">
        <span class="nav-info-label">Tagline</span>
        <p>個人の好きで<br>経済を動かす。</p>
      </div>

      <div class="nav-info-block nav-contact-info">
        <span class="nav-info-label">Contact</span>
        <a href="<?php echo $prefix; ?>contact/" class="nav-email">hello@mumumu.co.jp</a>
        <p class="nav-address">
          〒600-8223<br>
          京都府京都市下京区大黒町227番地<br>
          第２キョートビル402
        </p>
      </div>

    </div>
  </div>

  <!-- Background Decoration -->
  <div class="nav-bg-text" aria-hidden="true">MENU</div>
</nav>
