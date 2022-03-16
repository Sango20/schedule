<!DOCTYPE html>

<html lang = "ja">
        <head>
                <meta charset = "UTF-8">
                <link rel="stylesheet" href="/configuration/configuration.css">
                <script src = "/configuration/configuration.js"></script>
        </head>

        <body>
        <div class="bg_pattern Diagonal_v2"></div>
        <div class="section"> 
                <h1>登録したい予定を入力してください</h1>
         <form action="/home" method="POST">  
         @csrf
         
        <table id="form_area">
        
        
                                <th>タイトル</th>
                                <th>予定時刻</th>
                                <th>実行時間（分）</th>
                                <th>内容</th>
        @foreach ($routine_schedules as $routine_schedule)
                <tr>
                        <td><input class="b"  type="text" id="text[]" name="title[]" value="{{$routine_schedule->title}}"></td>
                        <td><input class="b"  type="text" id="number[]" name="start_times[]" value="{{$routine_schedule->start_time}}"></td>
                        <td><input class="b"  type="text" id="number[]" name="times[]" value="{{$routine_schedule->time}}"></td>
                        <td><input class="c"  type="text" id="number[]" name="contents[]" value="{{$routine_schedule->contents}}"></td>
                        <td><input class="a"  type="button" id="number[]" name="remove_0" onclick="remove(this)" value="削除"></td>
                </tr>
                @endforeach
        </table>
        <input class="a" type="button" name="a" value="追加" onclick="add()">
        <input class="a" type="submit" value="保存"/>
        </form>
        </div>
        
        <script>
        var test=document.getElementById("form_area");
        console.log(test);
        </script>
        </body>
</html>