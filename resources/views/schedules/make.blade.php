@extends('layouts.app')
@section('content')
<!DOCTYPE html>

<html lang = "ja">
        <head>
                <meta charset = "UTF-8">
                <link rel = "stylesheet" href = "/make/make.css">
                <script src = "/make/make.js"></script>
        </head>

        <body>
        
        <div class = "bg_pattern Diagonal_v2"></div>
        <div class = "section">   
        <h1>作成したい予定を入力してください</h1>
        <form action = "/schedule" method = "POST">  
         @csrf
        <table id = "form_area">
                <th>タイトル</th>
                <th>実行時間（分）</th>
                <th>内容</th>
                <tr>
                        <td class = "table1"><input class = "box"               type = "text"   name = "title[]" ></td>
                        <td class = "table2"><input class = "box"               type = "text"   name = "times[]"></td>
                        <td class = "table3"><input class = "inline_box"        type = "text"   name = "contents[]"></td>
                        <td class = "table4"><input class = "button"            type = "button" name = "remove_0"      value = "削除"  onclick = "remove(this)"></td>
                        <td class = "table5"><input class = "button"            type = "hidden" name = "dates"         value = "{{$date}}" ></td>
                </tr>
        </table>
        <input class = "button" type = "button" name = "a" value = "追加" onclick = "add()">
        <input class = "button" type = "submit" value = "作成">
        </form>
        </div>
        
        </body>
</html>
@endsection