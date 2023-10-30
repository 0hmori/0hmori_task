<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task edit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>投稿論文編集</h1>
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- 更新先はtasksのidにしないと増える sail artisan rote:listで確認① -->
    <form action="{{ route('tasks.update', $task) }}" method="post">
        @csrf
        @method('PATCH')

        <p>
            <label for="title">論文タイトル</label><br>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
        </p>
        <p>
            <label for="body">本文</label><br>
            <textarea name="body" class="body" id="body">{{ $task->body }}</textarea>
        </p>
        <input type="submit" value="更新">
    </form>
    <button onclick='location.href="{{ route('tasks.show', $task) }}"'>詳細へ戻る</button>

</body>

</html>
