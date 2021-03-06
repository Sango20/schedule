@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>

<head>
<link href='chart.js/dist/chartjs.css' rel='stylesheet' />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://unpkg.com/chartjs-plugin-colorschemes"></script>
<script src="chart.js/dist/chartjs-plugin-datalabels.js"></script>
</head>

<body>
<div class="bg_pattern Diagonal_v2"></div>
<div class="section"> 
    <h2>作成したスケジュール</h2>
  <canvas id="myChart"></canvas>
   <span class="anaclo-num anaclo-0">0</span>
  <span class="anaclo-num anaclo-3">3</span>
  <span class="anaclo-num anaclo-6">6</span>
  <span class="anaclo-num anaclo-9">9</span>
  <span class="anaclo-num anaclo-12">12</span>
  <span class="anaclo-num anaclo-15">15</span>
  <span class="anaclo-num anaclo-18">18</span>
  <span class="anaclo-num anaclo-21">21</span>
 
</div> 
<table>
    <td id="samplebox">
    </td>
    </table>
    <p id="form_area"></p>
    <form action="/view" method="POST">  
         @csrf
    <table id="form_area2">
        
        
                                <th>タイトル</th>
                                <th>予定時刻</th>
                                <th>実行時間（分）</th>
                                <th>内容</th>
                <tr>
                    <td><input class="b" type="hidden" name="dates" value="{{$date}}" ></td>
                </tr>
        </table>
     <input class="a" type="button" onclick="location.href='/update'" value="更新">
     <input class="a" type="submit" value="保存"/>
     </form>
<script>
    var table1 = document.createElement("p");
    var number1 = 0;
    var count = [];
    count[0] = 0;
    var k=1;
    @foreach($routine_schedules as $routine_schedule)
    {
        var make = document.createElement("input");
        make.type = 'text';
        make.id = "set_schedule_" + number1;
        make.name = "{{$routine_schedule->title}}";
        make.title = "{{$routine_schedule->start_time}}";
        make.value = "{{$routine_schedule->time}}";
        table1.appendChild(make);
        console.log(number1);
        console.log(make);
        number1++;
        
    }
    @endforeach
    console.log(number1);
    var table2 = document.createElement("p");
    @foreach($schedules as $schedule)
    {
        
        var a = document.createElement("input");
        a.type = 'text';
        a.id = "set_schedule_" + number1;
        a.name = "{{$schedule->title}}";
        a.title = "0";
        a.value = "{{$schedule->time}}";
        table2.appendChild(a); 
        console.log(number1);
        console.log(a);
        number1++;
    }
    @endforeach
    if (number1<=23)
    {
            var c = document.createElement("input");
            c.type = 'text';
            c.id = "no_schedule_0";
            c.name = "";
            c.title = "0";
            c.value = "0";
            table2.appendChild(c);
            console.log(c);
    }
    var parent = document.getElementById('form_area');
    parent.appendChild(table1);
    parent.appendChild(table2);
var set =[]; 
var set2 =[];
set2[0]=0;
var j=0;
var num3 = number1 - 1;
for(j=0;j<number1;j++)
{
    var www = document.getElementById("set_schedule_" + j).title;
    if(www!=0)
    {
        
        var www1 = parseFloat(www);
        set[www1]=document.getElementById("set_schedule_"+ j).name;
        add=document.getElementById("set_schedule_"+ j).value / 60;
        compare=24-www1;
        if(add>=1)
        {
            if(compare>=add)
            { 
                set2[www1]=add;
                var calc = Math.ceil(add);
                for(let sum=1;sum<calc;sum++)
                {
                    set[www1+sum]="";
                    set2[www1+sum]=0;
                    
                }
            count[k] = www1;
            k++;
            }else
            {
                set2[www1]=compare;
                console.log("a");
                var calc = Math.ceil(compare);
                console.log(calc);
                for(let sum=1;sum<calc;sum++)
                {
                    set[www1+sum]="";
                    set2[www1+sum]=0;
                }
                var compare2=add-compare;
                var calc2 = Math.ceil(compare2);
                console.log(compare2);
                set[0]=set[www1];
                set2[0]=compare2;
                for(let sum=1;sum<calc2;sum++)
                {
                    set[sum]="";
                    set2[sum]=0;
                }
                console.log(set[0]);
                console.log(set2[0]);
                count[k] = www1;
                k++;
            }
        }
        
    }
    else
    {
        break;
    }
}
var num4 = num3 - j; 
console.log(num4);
var num5;
for(let test=j;test<number1;test++)
  {
      test10 = document.getElementById("set_schedule_"+ test).value % 60;
    if(test10 == 0)
    {
      do{
          var random = Math.floor( Math.random() * 23 ) + 1;
      }while(set[random]!=num5)
      {
      set[random]=document.getElementById("set_schedule_"+ test).name;
      set2[random]=document.getElementById("set_schedule_"+ test).value / 60;
      console.log(set[random]);
      console.log(test10);
        count[k] = random;
       
        k++;
      }
    }else{
        do{
          var random = Math.floor( Math.random() * 23 ) + 1;
          var ceo=document.getElementById("set_schedule_"+ test).name;
          console.log(ceo);
          console.log(random);
      }while(set[random]!=num5||set[random+1]!=num5)
      {
      set[random]=document.getElementById("set_schedule_"+ test).name;
      set2[random]=document.getElementById("set_schedule_"+ test).value / 60;
        count[k] = random;
        console.log(count);
      }
    }
  }
  count[k+1]=24;
  count.sort(function(a, b){return a - b});
         var kkk=0;
         console.log(count);
for(i=0;i<=23;i++)
{
    while(set2[i]!=num5)
    {
        i++;
    }
        var long = count[kkk+1] - count[kkk] -set2[count[kkk]];
        console.log(long);
        if (long>0)
        {
            set[i]=document.getElementById("no_schedule_0").name;
            set2[i]=long;
        }
        i=count[kkk+1];
        kkk++;
}
console.log(set);
console.log(set2);

let config1 = {
    type: "pie",
    data: {
        add : [set[0],set[1],set[2], set[3], set[4], set[5],set[6],set[7],set[8],set[9],set[10],set[11],set[12],set[13],set[14], set[15], set[16], set[17],set[18],set[19],set[20],set[21],set[22],set[23] ],
        datasets: [{
            data: [set2[0],set2[1],set2[2], set2[3], set2[4], set2[5],set2[6],set2[7],set2[8],set2[9],set2[10],set2[11],set2[12], set2[13],set2[14], set2[15], set2[16], set2[17],set2[18],set2[19],set2[20],set2[21],set2[22],set2[23]]
        }],
    },
     options: {
        plugins: {
            colorschemes: {
                scheme: 'brewer.Paired12'
            },
            datalabels: {
        anchor: "center",
        color: "black",
        font: {
            weight: "bold",
            size: 15,
        },
        formatter: (number, ctx) => {
            let label = ctx.chart.data.add[ctx.dataIndex];
            return label;
        },
    },
        }
    }
};

window.addEventListener("load", function() {

    let ctx1 = document.getElementById("myChart").getContext("2d");
    myChart = new Chart(ctx1, config1);
}, false);
var i=1;
for(i=1;i<k;i++)
{
        var table = document.createElement("tr");
        var table1 = document.createElement("td");
        var table2 = document.createElement("td");
        var table3 = document.createElement("td");
        var table4 = document.createElement("td");
        var table5 = document.createElement("td");
       
        var a = document.createElement("input");
        a.classList.add('b');
        a.type = 'text';
        a.id = "text[]";
        a.name = 'title[]';
        a.value= set[count[i]];
        table1.appendChild(a);
        table.appendChild(table1);

        var b = document.createElement("input");
        b.classList.add('b');
        b.type = 'text';
        b.id = i;
        b.name = 'start_times[]';
        b.value = count[i] + ":00";
        table2.appendChild(b);
        table.appendChild(table2);
        
        var c = document.createElement("input");
        c.classList.add('b');
        c.type = 'text';
        c.id = i;
        c.name = 'times[]';
        c.value = set2[count[i]] * 60;
        table3.appendChild(c);
        table.appendChild(table3);
        
        var d = document.createElement("input");
        d.classList.add('c');
        d.type = 'text';
        d.id = i;
        d.name = 'contents[]';
        d.value = "a";
        table4.appendChild(d);
        table.appendChild(table4);
        
        var e = document.createElement("input");
        e.classList.add('a');
        e.type = 'button';
        e.id = i;
        e.value = '削除';
        e.name = 'remove_[]';
        e.addEventListener("click", function(){remove(this)});
        table5.appendChild(e);
        table.appendChild(table5);

         var parent = document.getElementById('form_area2');
        parent.appendChild(table);
}
</script>
</body>
</html>
@endsection