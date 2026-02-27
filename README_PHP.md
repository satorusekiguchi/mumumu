# PHP化による運用管理ガイド

このプロジェクトは、HTMLファイルをPHPに変換し、運用管理を簡単にするための変更が行われました。

## 主な変更点

### 1. テンプレートファイルのPHP化
- `templates/header.php` - ヘッダー部分
- `templates/nav.php` - ナビゲーション部分
- `templates/footer.php` - フッター部分
- `templates/sub-hero.php` - サブページのヒーローセクション

### 2. 事例（Works）の動的管理
- `data/works.php` - 事例データを配列で管理
- このファイルを編集するだけで、事例一覧を簡単に追加・編集・削除できます

### 3. 共通関数の追加
- `includes/common.php` - 共通関数と変数定義
- パス管理、メタ情報設定、GTM出力などの共通処理

## 事例（Works）の管理方法

### 事例を追加する場合

`data/works.php` を開き、配列に新しい事例を追加してください：

```php
[
    'id' => 5,
    'title' => '新規事例タイトル',
    'client' => 'クライアント名',
    'image' => '画像パス',
    'url' => '詳細ページURL',
    'category' => 'カテゴリ',
    'description' => '説明文',
    'date' => '2024-05-01',
],
```

### 事例データの項目説明

- `id`: 一意のID（数値）
- `title`: 事例のタイトル
- `client`: クライアント名
- `image`: 画像のパス（相対パスまたはURL）
- `url`: 詳細ページへのリンクURL
- `category`: カテゴリ（digital-marketing, brand, web, sns など）
- `description`: 説明文（オプション）
- `date`: 日付（YYYY-MM-DD形式）

### カテゴリでフィルタリング

`works/index.php` では、URLパラメータ `?category=カテゴリ名` でフィルタリングできます。

例: `works/?category=digital-marketing`

## ファイル構造

```
/
├── index.php                    # トップページ
├── includes/
│   └── common.php              # 共通関数
├── templates/
│   ├── header.php              # ヘッダーテンプレート
│   ├── nav.php                 # ナビゲーションテンプレート
│   ├── footer.php              # フッターテンプレート
│   └── sub-hero.php            # サブページヒーローテンプレート
├── data/
│   └── works.php               # 事例データ
├── works/
│   └── index.php               # 事例一覧ページ
├── company/
│   └── index.php               # 会社概要ページ
├── services/
│   ├── index.php               # サービス一覧
│   ├── digital-marketing/
│   │   └── index.php
│   └── beauty/
│       └── index.php
├── contact/
│   └── index.php               # お問い合わせページ
├── mission/
│   └── index.php               # MVVページ
├── news/
│   └── index.php               # ニュースページ
└── privacy-policy/
    └── index.php               # プライバシーポリシーページ
```

## 注意事項

1. **include.jsについて**: PHPでincludeするようになったため、`js/include.js` は基本的に不要になりました。ただし、既存のJavaScriptコードとの互換性のために残してあります。

2. **パスの管理**: 各PHPファイルでは、`getPathLevel()` と `getPathPrefix()` 関数を使用して、ディレクトリ階層に応じた適切なパスを自動生成しています。

3. **テンプレートの読み込み**: 各ページでは、`include` 文を使用してテンプレートファイルを読み込んでいます。

## 今後の拡張

- ニュースデータも `data/news.php` に分離可能
- データベース連携への移行も容易
- 管理画面の追加も検討可能

## トラブルシューティング

### パスが正しく表示されない場合
- `includes/common.php` の `getPathLevel()` 関数を確認してください
- 各ページで `$level` と `$prefix` が正しく設定されているか確認してください

### テンプレートが読み込まれない場合
- `__DIR__` を使用した絶対パスで読み込んでいるため、通常は問題ありません
- サーバーの設定で `include_path` が正しく設定されているか確認してください
