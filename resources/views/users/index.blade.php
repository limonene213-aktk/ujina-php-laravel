<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ユーザー一覧</title>
</head>
<body>
    <h1>ユーザー一覧</h1>

    @if ($users->isEmpty())
        <p>ユーザーがいないにゃん。</p>
    @else
        <ul>
            @foreach ($users as $user)
                <li>
                    ID: {{ $user->id }}
                    / 名前: {{ $user->name ?? '名無し' }}
                    / メール: {{ $user->email ?? 'なし' }}
                    / 状態: {{ $user->label ?? '不明' }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
