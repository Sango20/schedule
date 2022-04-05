@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='/fullcalendar/main.css' rel='stylesheet' />
    <script src='/fullcalendar/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          selectable: true,
          select: function (info) {
          location.replace("make/"+info.startStr);
          },
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    
    <h1>日付を選択してください</h1>
    <p>
    <div id='calendar'style=" width: 1500px; height: 1500px"></div>
    </p>
  </body>
</html>
@endsection