<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class='posts'>
            <div class='post'>
                <h2 class='title'>Title</h2>
                <p class='body'>This is a sample body.</p>
            </div>
        </div>
        <h2 class='title'>
            <a href="/home/calendar">カレンダー</a>
             <a href="/home/make">スケジュール作成</a>
             <a href="/home/configuration">設定</a>
             <div></div>
             <a href="/test">スケジュール</a>
        </h2>
    </body>
</html>