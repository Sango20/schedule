<!DOCTYPE html>

<html lang = "ja">
        <head>
                <meta charset = "UTF-8">
                <link rel="stylesheet" href="/configuration/configuration.css">
                <script src = "/configuration/configuration.js"></script>
        </head>

        <body>
         <form action="/home" method="POST">  
         @csrf
        <table id="form_area">
                
                                <th>タイトル</th>
                                <th>予定時刻</th>
                                <th>実行時間</th>
                                <th>内容</th>
                @foreach ($routine_schedules as $routine_schedule)
                <tr>
                        <td><input type="text" id="text[]" name="title[]" value="{{$routine_schedule->title}}"></td>
                        <td><input type="text" id="number[]" name="start_times[]" value="{{$routine_schedule->start_time}}"></td>
                        <td><input type="text" id="number[]" name="times[]" value="{{$routine_schedule->time}}"></td>
                        <td><input type="text" id="number[]" name="contents[]" value="{{$routine_schedule->contents}}"></td>
                        <td><input type="button" id="number[]" name="remove_0" onclick="remove(this)" value="削除"></td>
                </tr>
                @endforeach
        </table> 
       
        <input type="submit" value="保存"/>
        </form>
        <input type="button" name="a" value="追加" onclick="add()">
        <div class='back'><a href="/home">前へ</a></div>
        <script>
        var test=document.getElementById("form_area");
        console.log(test);
        </script>
        </body>
</html>