# resourcesディレクトリについて

`resources` ディレクトリの中にはブラウザ側で動くフロントエンドコードがあります。ここにはCSS、JS、HTML（拡張子は `.html` ではなく `.blade.php`）があります。

---

## 📁 ディレクトリ構成

```
resources/
├── css/            # スタイルシート
│   └── app.css         # メインCSS
├── js/             # JavaScript
│   ├── app.js          # メインJS
│   └── bootstrap.js    # 初期設定（axios等）
└── views/          # Bladeテンプレート
    ├── welcome.blade.php   # トップページ
    ├── components/         # 再利用可能なUIパーツ
    ├── layouts/            # 共通レイアウト
    └── （その他ページ用フォルダ）
```

---

## 🎨 css/ - スタイルシート

**役割**: ページの見た目を定義する場所です。

- `app.css` がメインのスタイルシート
- Tailwind CSS を使う場合、ここに設定を書きます
- Viteでビルドして `public/build/` に出力されます

---

## ⚡ js/ - JavaScript

**役割**: ブラウザで動くスクリプトを置く場所です。

| ファイル | 役割 |
|----------|------|
| `app.js` | メインのJavaScript。ここにコードを追加 |
| `bootstrap.js` | axios などの初期設定（触らなくてOK） |

---

## 📄 views/ - Bladeテンプレート

**役割**: 実際にブラウザに表示されるHTMLを作る場所です。

### Bladeテンプレートとは？

LaravelのHTMLテンプレートエンジンです。普通のHTMLに加えて、PHPの変数や制御構文を簡単に書けます。

```php
{{-- これはBladeのコメント --}}

{{-- 変数の表示（自動エスケープ） --}}
<h1>{{ $title }}</h1>

{{-- 条件分岐 --}}
@if($isLoggedIn)
    <p>ようこそ！</p>
@else
    <p>ログインしてください</p>
@endif

{{-- ループ --}}
@foreach($users as $user)
    <li>{{ $user->name }}</li>
@endforeach
```

### 📂 views/ のサブフォルダ

| フォルダ | 役割 |
|----------|------|
| `components/` | 再利用可能なUIパーツ（ボタン、カード等） |
| `layouts/` | 共通レイアウト（ヘッダー、フッター等） |
| `hello/` | hello機能用ページ |
| `users/` | ユーザー関連ページ |

---

## 🧩 components/ - Bladeコンポーネント

**役割**: 繰り返し使うUI部品を定義します。

```
views/components/
├── README.MD
└── message.blade.php  # メッセージ表示コンポーネント
```

**使い方：**
```php
{{-- views/components/message.blade.php を使う --}}
<x-message>こんにちは！</x-message>
```

> 💡 コンポーネント名はファイル名から自動で決まります
> - `message.blade.php` → `<x-message>`
> - `alert-box.blade.php` → `<x-alert-box>`

---

## 🏗️ layouts/ - 共通レイアウト

**役割**: 複数ページで共通のHTML構造を定義します。

```php
{{-- layouts/helloapp.blade.php（レイアウト定義） --}}
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    <header>共通ヘッダー</header>
    @yield('content')  {{-- ここに各ページの内容が入る --}}
    <footer>共通フッター</footer>
</body>
</html>
```

```php
{{-- 各ページでレイアウトを使う --}}
@extends('layouts.helloapp')

@section('title', 'ページタイトル')

@section('content')
    <h1>ページの内容</h1>
@endsection
```

---

## 🔗 コントローラーからViewを表示する

```php
// app/Http/Controllers/SampleController.php
public function index()
{
    $message = 'こんにちは';
    
    // resources/views/hello/index.blade.php を表示
    return view('hello.index', ['message' => $message]);
}
```

**ポイント：**
- `view('hello.index')` は `views/hello/index.blade.php` を指す
- フォルダの区切りは `/` ではなく `.`（ドット）

---

## 🛠️ よく使うBlade記法

| 記法 | 説明 | 例 |
|------|------|-----|
| `{{ $var }}` | 変数表示（HTMLエスケープ） | `{{ $name }}` |
| `{!! $var !!}` | 変数表示（エスケープなし）※危険 | `{!! $html !!}` |
| `@if` / `@endif` | 条件分岐 | |
| `@foreach` / `@endforeach` | ループ | |
| `@extends('layout')` | レイアウト継承 | |
| `@section` / `@endsection` | セクション定義 | |
| `@yield('name')` | セクション出力場所 | |
| `@include('partial')` | 部分テンプレート読み込み | |
| `@csrf` | CSRFトークン（フォームに必須） | |

---

## 📦 ビルドについて

開発時と本番環境では、CSS/JSの扱いが異なります。

```bash
# 開発モード（ファイル変更を監視して自動ビルド）
npm run dev

# 本番用ビルド（最適化・圧縮）
npm run build
```

> 💡 **Sail環境の場合**: `sail npm run dev` のように使います

ビルドされたファイルは `public/build/` に出力されます。

---

## 💡 ファイル作成のヒント

| 作りたいもの | 作成場所 |
|--------------|----------|
| 新しいページ | `views/フォルダ名/ファイル名.blade.php` |
| 共通レイアウト | `views/layouts/レイアウト名.blade.php` |
| UIパーツ | `views/components/パーツ名.blade.php` |
| スタイル | `css/app.css` に追記 |
| スクリプト | `js/app.js` に追記 |