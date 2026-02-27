#!/bin/bash

# PHPビルトインサーバー起動スクリプト
# 使用方法: ./start-server.sh

PORT=8000

echo "=========================================="
echo "PHP Development Server を起動します"
echo "=========================================="
echo ""
echo "ブラウザで以下のURLにアクセスしてください:"
echo "http://localhost:$PORT"
echo ""
echo "停止するには Ctrl+C を押してください"
echo "=========================================="
echo ""

# PHPのパスを確認（複数の場所をチェック）
PHP_CMD=""
if [ -f "/usr/bin/php" ]; then
    PHP_CMD="/usr/bin/php"
elif [ -f "/opt/homebrew/bin/php" ]; then
    PHP_CMD="/opt/homebrew/bin/php"
elif command -v php &> /dev/null; then
    PHP_CMD="php"
else
    echo "エラー: PHPがインストールされていません"
    exit 1
fi

echo "PHPのパス: $PHP_CMD"
$PHP_CMD -v
echo ""

# サーバーを起動
$PHP_CMD -S localhost:$PORT -t .
