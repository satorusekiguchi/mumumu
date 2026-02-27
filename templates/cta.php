<?php
// CTA Section Template
// 使用例: include($prefix . 'templates/cta.php');

// デフォルト値の設定
$cta_title = isset($cta_title) ? $cta_title : 'Contact Us';
$cta_text = isset($cta_text) ? $cta_text : 'プロジェクトのご相談、お見積りなどお気軽にお問い合わせください。';
$cta_btn_text = isset($cta_btn_text) ? $cta_btn_text : 'お問い合わせ';
$cta_btn_link = isset($cta_btn_link) ? $cta_btn_link : $prefix . 'contact/';
?>
<!-- CTA Section -->
<div class="cta-section fade-in-up">
  <h2 class="cta-section-title"><?php echo htmlspecialchars($cta_title); ?></h2>
  <p class="cta-section-text"><?php echo $cta_text; ?></p>
  <a href="<?php echo htmlspecialchars($cta_btn_link); ?>" class="contact-btn">
    <?php echo htmlspecialchars($cta_btn_text); ?>
  </a>
</div>

