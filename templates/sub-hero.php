<?php
// ページタイトルとラベルを取得
// $hero_title があればheroに使用、なければ $page_title を使用
$page_title = isset($page_title) ? $page_title : '';
$page_label = isset($page_label) ? $page_label : '';
$display_title = isset($hero_title) ? $hero_title : $page_title;
?>
<!-- Sub Page Hero -->
<div class="section-header fade-in-up">
  <h1 class="section-title" data-text="<?php echo htmlspecialchars($display_title); ?>"><?php echo htmlspecialchars($display_title); ?></h1>
  <span class="section-label">/ <?php echo htmlspecialchars($page_label); ?></span>
</div>
