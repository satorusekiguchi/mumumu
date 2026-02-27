<?php
// 現在のディレクトリレベルを取得
$level = isset($level) ? $level : 0;
$prefix = $level > 0 ? str_repeat('../', $level) : './';
?>
<!-- Header -->
<header>
  <div class="logo">
    <a href="<?php echo $prefix; ?>" id="logo-text">
      <span class="logo-char">m</span><span class="logo-char">u</span><span class="logo-char">m</span><span class="logo-char">u</span><span class="logo-char">m</span><span class="logo-char">u</span><span class="logo-extra"><span class="logo-char">.</span><span class="logo-char">.</span><span class="logo-char">.</span><span class="logo-char">🤔</span></span>
    </a>
  </div>
  <div class="menu-trigger">
    <span class="menu-text-open">( Menu )</span>
    <span class="menu-text-close">( Close )</span>
  </div>
</header>
