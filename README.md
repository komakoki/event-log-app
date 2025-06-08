# LiveInfo API

音楽イベント（ライブ）の情報を登録・取得するためのシンプルなAPIです。

---

## 📦 開発環境

- Laravel 12.x
- PHP 8.x
- SQLite（開発用DB）
- Composer
- curl または Postman（APIテスト）

---

## ⚙️ 環境構築手順

```bash
# 1. リポジトリをクローン
git clone https://github.com/your-name/your-repo.git
cd your-repo

# 2. 依存パッケージのインストール
composer install

# 3. 環境変数ファイルを作成
cp .env.example .env

# 4. アプリケーションキーを生成
php artisan key:generate

# 5. SQLiteのDBファイルを作成
touch database/database.sqlite

# 6. .envファイルのDB接続を以下のように設定
DB_CONNECTION=sqlite
DB_DATABASE=${absolute_path_to}/database/database.sqlite

# 7. マイグレーション実行
php artisan migrate

# 8. 開発サーバー起動
php artisan serve


API仕様
1. ライブ情報の一覧取得
URL: /api/lives
Method: GET

レスポンス例（200 OK）
{
  "message": "Success",
  "data": [
    {
      "id": 1,
      "title": "Test Live",
      "location": "Tokyo",
      "date": "2025-06-01",
      "start_time": "18:30:00",
      "description": "First test live",
      "created_at": "2025-06-07T10:00:00.000000Z",
      "updated_at": "2025-06-07T10:00:00.000000Z"
    }
  ]
}

2. ライブ情報の新規登録
URL: /api/lives
Method: POST
Content-Type: application/json
Body:
{
  "title": "Test Live",
  "location": "Tokyo",
  "date": "2025-06-01",
  "start_time": "18:30",
  "description": "First test live"
}

成功時レスポンス（201 Created）
{
  "message": "Live info created successfully",
  "data": {
    "id": 2,
    "title": "Test Live",
    "location": "Tokyo",
    "date": "2025-06-01",
    "start_time": "18:30:00",
    "description": "First test live",
    "created_at": "2025-06-07T10:01:00.000000Z",
    "updated_at": "2025-06-07T10:01:00.000000Z"
  }
}

バリデーションエラー時（422）
{
  "message": "Validation failed",
  "errors": {
    "title": ["The title field is required."]
  }
}

🔍 補足
ルーティングは routes/api.php に定義
コントローラー: App\Http\Controllers\LiveController
モデル: App\Models\LiveInfo
マイグレーションファイル: database/migrations/xxxx_xx_xx_create_live_infos_table.php

🧪 テスト用curlコマンド
bash
コピーする
編集する
curl -X POST http://127.0.0.1:8000/api/lives \
  -H "Content-Type: application/json" \
  -d '{"title":"Test Live","location":"Tokyo","date":"2025-06-01","start_time":"18:30","description":"Test live"}'

