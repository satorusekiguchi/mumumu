# ローカル開発環境のセットアップ

このプロジェクトをローカルで実行するための手順です。

## 方法1: PHPビルトインサーバーを使用（推奨）

### 1. PHPのインストール確認

ターミナルで以下のコマンドを実行してください：

```bash
php -v
```

PHPがインストールされていない場合は、以下のいずれかの方法でインストールしてください。

### 2. PHPのインストール（macOS）

#### Homebrewを使用する場合

```bash
# Homebrewがインストールされていない場合
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

# PHPをインストール
brew install php
```

#### MAMPを使用する場合

1. [MAMP](https://www.mamp.info/) をダウンロードしてインストール
2. MAMPを起動
3. プロジェクトのパスをMAMPのドキュメントルートに設定

### 3. サーバーの起動

プロジェクトのルートディレクトリで以下のコマンドを実行：

```bash
# 方法1: 起動スクリプトを使用
chmod +x start-server.sh
./start-server.sh

# 方法2: 直接コマンドを実行
php -S localhost:8000
```

ブラウザで `http://localhost:8000` にアクセスしてください。

## 方法2: MAMP/XAMPPを使用

### MAMPの場合

1. MAMPをインストール
2. MAMPの設定で、ドキュメントルートをこのプロジェクトのディレクトリに設定
3. MAMPを起動
4. `http://localhost:8888` にアクセス

### XAMPPの場合

1. XAMPPをインストール
2. `htdocs` フォルダにこのプロジェクトをコピー
3. XAMPPを起動
4. `http://localhost/プロジェクト名` にアクセス

## 方法3: Local by Flywheelを使用

「Local Sites」ディレクトリがある場合、Local by Flywheelを使用している可能性があります。

1. Local by Flywheelを起動
2. 新しいサイトを作成、または既存のサイトをインポート
3. サイトのパスをこのプロジェクトのディレクトリに設定
4. サイトを起動

## トラブルシューティング

### PHPが見つからないエラー

```bash
# PHPのパスを確認
which php

# パスが設定されていない場合、.zshrcまたは.bash_profileに追加
echo 'export PATH="/usr/local/bin:$PATH"' >> ~/.zshrc
source ~/.zshrc
```

### ポートが使用中の場合

別のポート番号を指定：

```bash
php -S localhost:8001
```

### パーミッションエラー

```bash
chmod +x start-server.sh
```

### .htaccessが効かない場合

Apacheを使用している場合、`mod_rewrite` が有効になっているか確認してください。

## 開発時の注意事項

- 本番環境にデプロイする前に、`.htaccess` の `display_errors` を `Off` に変更してください
- セキュリティのため、本番環境では適切な設定を行ってください
