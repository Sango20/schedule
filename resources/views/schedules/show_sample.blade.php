<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>サンプル</title>
    </head>
    <body>
        <h1>Requestサンプルページ</h1>
        @foreach($input as $key => $value)
            <p>{{$key}}->{{$value}}</p>
        @endforeach
    </body>
</html>