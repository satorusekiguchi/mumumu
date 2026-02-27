<?php
/**
 * パンくずリストテンプレート
 * 
 * 使用方法:
 * 各ページで $breadcrumb 配列を定義してからインクルード
 * 
 * 例:
 * $breadcrumb = [
 *     ['name' => 'Works', 'url' => $prefix . 'works/'],
 *     ['name' => 'BESTPLAY', 'url' => ''] // 現在のページはURLを空に
 * ];
 * include __DIR__ . '/../templates/breadcrumb.php';
 */

// 現在のディレクトリレベルを取得
$level = isset($level) ? $level : 0;
$prefix = $level > 0 ? str_repeat('../', $level) : './';

// パンくずリストが定義されていない場合は自動生成
if (!isset($breadcrumb) || empty($breadcrumb)) {
    // ページタイトルとラベルから自動生成
    $breadcrumb = [];
    if (isset($page_title) && !empty($page_title)) {
        $breadcrumb[] = ['name' => $page_title, 'url' => ''];
    }
}
?>
<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="パンくずリスト">
  <div class="breadcrumb-inner">
    <ol class="breadcrumb-list" itemscope itemtype="https://schema.org/BreadcrumbList">
      <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a href="<?php echo $prefix; ?>" itemprop="item">
          <span itemprop="name">Top</span>
        </a>
        <meta itemprop="position" content="1" />
      </li>
      <?php 
      $position = 2;
      foreach ($breadcrumb as $index => $item): 
        $isLast = ($index === count($breadcrumb) - 1);
      ?>
      <li class="breadcrumb-item<?php echo $isLast ? ' is-current' : ''; ?>" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <?php if (!$isLast && !empty($item['url'])): ?>
        <a href="<?php echo htmlspecialchars($item['url']); ?>" itemprop="item">
          <span itemprop="name"><?php echo htmlspecialchars($item['name']); ?></span>
        </a>
        <?php else: ?>
        <span itemprop="name"><?php echo htmlspecialchars($item['name']); ?></span>
        <?php endif; ?>
        <meta itemprop="position" content="<?php echo $position; ?>" />
      </li>
      <?php 
        $position++;
      endforeach; 
      ?>
    </ol>
  </div>
</nav>







