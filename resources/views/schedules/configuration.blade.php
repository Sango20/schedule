@extends('layouts.app')
@section('content')
<!DOCTYPE html>

<html lang = "ja">
        <head>
                <meta charset = "UTF-8">
                <link rel="stylesheet" href="/configuration/configuration.css">
                <script src = "/configuration/configuration.js"></script>
        </head>

        <body>
                <div class = "bg_pattern Diagonal_v2"></div>
                <div class = "section" > 
                        <h1>登録したい予定を入力してください</h1>
                        <form action = "/home" method = "POST">  
                        @csrf
                        <table id = "form_area">
                                <th>タイトル</th>
                                <th>予定時刻</th>
                                <th>実行時間（分）</th>
                                <th>内容</th>
                        @foreach ($routine_schedules as $routine_schedule)
                                <tr>
                                        <td class = "table1"><input class = "box"        type = "text"   id = "text[]"   name = "title[]"        value = "{{$routine_schedule->title}}"></td>
                                        <td class = "table2"><input class = "box"        type = "time"   id = "number[]" name = "start_times[]"  value = "{{$routine_schedule->start_time}}"></td>
                                        <td class = "table3"><input class = "box"        type = "text"   id = "number[]" name = "times[]"        value = "{{$routine_schedule->time}}"></td>
                                        <td class = "table4"><input class = "inline_box" type = "text"   id = "number[]" name = "contents[]"     value = "{{$routine_schedule->contents}}"></td>
                                        <td class = "table5"><input class = "button"     type = "button" id = "number[]" name = "remove_0"       value = "削除"    onclick="remove(this)" ></td>
                                </tr>
                        @endforeach
                        </table>
                        <input class = "button" type = "button" name = "a" value = "追加" onclick = "add()">
                        <input class = "button" type = "submit"            value = "保存" />
                        </form>
                </div>
        </body>
</html>
@endsection