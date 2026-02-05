# appディレクトリについて

このディレクトリの中には、ビジネスロジックなどに関する、いわゆる「プログラム」の内容が入っています。  
プログラムの内容なので、たとえば'View'という名前であっても、表示に関するロジックがここに書き込まれます。  

---

## 📁 ディレクトリ構成

```
app/
├── Http/           # HTTPリクエスト関連
│   └── Controllers/    # コントローラー（リクエストの処理）
├── Models/         # モデル（データベースとのやり取り）
├── Providers/      # サービスプロバイダ（アプリの初期設定）
└── View/           # ビュー関連のロジック
    └── Components/     # Bladeコンポーネント
```

---

## 🎮 Http/Controllers/ - コントローラー

**役割**: ユーザーからのリクエストを受け取り、適切な処理を行って結果を返す「司令塔」です。

- URLにアクセスがあったとき、最初に呼び出される場所
- Modelからデータを取得し、Viewに渡す橋渡し役
- `routes/web.php` でURLと紐づけます

```php
// 例: routes/web.php での紐づけ
Route::get('/users', [UserController::class, 'index']);
```

**新しいコントローラーを作るには：**
```bash
php artisan make:controller コントローラー名
```

---

## 🗂️ Models/ - モデル

**役割**: データベースのテーブルとやり取りする「データの管理係」です。

- 1つのモデル ≒ 1つのデータベーステーブル
- データの取得・保存・更新・削除を担当
- 現在 `User.php` が存在しています（usersテーブルに対応）

```php
// 例: ユーザー全員を取得
$users = User::all();

// 例: IDが1のユーザーを取得
$user = User::find(1);
```

**新しいモデルを作るには：**
```bash
php artisan make:model モデル名
# マイグレーション（テーブル定義）も一緒に作るなら
php artisan make:model モデル名 -m
```

---

## ⚙️ Providers/ - サービスプロバイダ

**役割**: アプリケーション起動時に実行される「初期設定係」です。

- アプリ全体で使う設定やサービスを登録
- 初心者のうちは、あまり触らなくてOK
- カスタムのサービスを追加したいときに使う

現在存在するファイル:
- `AppServiceProvider.php` - Laravelデフォルトの設定
- `HelloServiceProvider.php` - カスタム設定

---

## 🧩 View/Components/ - Bladeコンポーネント

**役割**: 再利用可能なUIパーツを定義する場所です。

- ボタンやカードなど、繰り返し使うUI部品のロジック
- HTMLテンプレートは `resources/views/components/` に配置
- コンポーネントを使うと、コードがスッキリ！

```php
// 例: Bladeテンプレートでの使用
<x-button>クリック</x-button>
```

---

# じゃあ表示関連はどこ？

`resources` ディレクトリの中にあります。ここにはCSS、JS、HTML（拡張子は `.html` ではなく `.blade.php`）があります。

| 場所 | 役割 |
|------|------|
| `resources/views/` | HTMLテンプレート（.blade.php） |
| `resources/css/` | スタイルシート |
| `resources/js/` | JavaScript |

---

## 🔄 MVC の流れ（ざっくり）

```
1. ユーザーがURLにアクセス
        ↓
2. routes/web.php でルーティング
        ↓
3. Controller が処理を受け取る
        ↓
4. Model でデータベース操作（必要なら）
        ↓
5. View（Blade）で画面を生成
        ↓
6. ユーザーに表示！
```

---

## 💡 よく使う artisan コマンド

| コマンド | 説明 |
|----------|------|
| `php artisan make:controller 名前` | コントローラー作成 |
| `php artisan make:model 名前` | モデル作成 |
| `php artisan make:model 名前 -m` | モデル＋マイグレーション作成 |
| `php artisan migrate` | マイグレーション実行 |
| `php artisan route:list` | ルート一覧表示 |
| `php artisan tinker` | 対話モード（動作確認に便利） |

> 💡 **Sail環境の場合**: `php artisan` の代わりに `./vendor/bin/sail artisan` または `sail artisan` を使用します。