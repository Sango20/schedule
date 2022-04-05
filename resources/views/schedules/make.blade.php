@extends('layouts.app')
@section('content')
<!DOCTYPE html>

<html lang = "ja">
        <head>
                <meta charset = "UTF-8">
                <link rel="stylesheet" href="/make/make.css">
                <script src = "/make/make.js"></script>
        </head>

        <body>
        
        <div class="bg_pattern Diagonal_v2"></div>
        <div class="section">   
        <h1>作成したい予定を入力してください</h1>
        <form action="/test" method="POST">  
         @csrf
        <table id="form_area"　>
                                <th>タイトル</th>
                                <th>実行時間（分）</th>
                                <th>内容</th>
                <tr>
                        
                        <td><input class="b" type="text" name="title[]" ></td>
                        <td><input class="b" type="text" name="times[]"></td>
                        <td><input class="c" type="text" name="contents[]"></td>
                        <td><input class="a" type="button" name="remove_0" value="削除" onclick="remove(this)"></td>
                        <td><input class="b" type="hidden" name="dates" value="{{$date}}" ></td>
                </tr>
        </table>
        <input class="a" type="button" name="a" value="追加" onclick="add()">
        <input class="a" type="submit" value="作成">
        </form>
        </div>
        
        </body>
</html>
@endsection