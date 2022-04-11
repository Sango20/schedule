@extends('layouts.app')
@section('content')
<!DOCTYPE html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スケジュール自動作成</title>
        <link href='../../../index/index.css' rel='stylesheet' />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>{{$announce}}</h1>
    <div class="bg_pattern Diagonal_v2"></div>
    <div class="section"></div>
        <h1>スケジュール自動作成</h1>
        
        <h2 class='title'>
            <a class="button" href="/home/view"><p>過去の</p>スケジュール</a>
             <a class="button" href="/home/calendar"><p>スケジュール</P>作成</a>
             <a class="button" href="/home/configuration"><p>設定</p>　　</a>
             <a class="button" href="/home/view/today"><p>本日の</p>スケジュール</a>
        </h2>
   

    </body>
</html>
@endsection