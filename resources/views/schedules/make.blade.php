<!DOCTYPE html>

<html lang = "ja">
        <head>
                <meta charset = "UTF-8">
                <link rel="stylesheet" href="/make/make.css">
                <script src = "/make/make.js"></script>
        </head>

        <body>
        <form action="/test" method="POST">  
         @csrf
        <table id="form_area">
                                <th>タイトル</th>
                                <th>実行時間</th>
                                <th>内容</th>
                <tr>
                        <td><input type="text" name="title[]"></td>
                        <td><input type="text" name="times[]"></td>
                        <td><input type="text" name="contents[]"></td>
                        <td><input type="button" name="remove_0" value="削除" onclick="remove(this)"></td>
                </tr>
        </table>
        <input type="button" name="a" value="追加" onclick="add()">
        <input type="submit" value="作成"/>
        <div class='back'><a href="/home">前へ</a></div>
        </form>
        </body>
</html>