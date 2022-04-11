@extends('layouts.app')
@section('content')
<html>

<head>
<link href='../../../chart.js/dist/chartjs.css' rel='stylesheet' />
<link href="log.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://unpkg.com/chartjs-plugin-colorschemes"></script>
<script src="../../../chart.js/dist/chartjs-plugin-datalabels.js"></script>
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
    <table id="form_area2">
        
        
                                <th>タイトル</th>
                                <th>予定時刻</th>
                                <th>実行時間（分）</th>
                                <th>内容</th>
                <tr>
                    <td><input class="b" type="hidden" name="dates"></td>
                </tr>
        </table>
     <input class="a" type="button" onclick="location.href='/home'" value="戻る">
<script>
    var table = document.createElement("p");
    var parent = document.getElementById('form_area');
    var number1=0;
    var count = [];
    count[0] = 0;
    var k = 1;
    @foreach($store_schedules as $store_schedule)
    {
        var make = document.createElement("input");
        make.type = 'text';
        make.id = "set_schedule_" + number1;
        make.name = "{{$store_schedule->title}}";
        make.title = "{{$store_schedule->start_time}}";
        make.value = "{{$store_schedule->time}}";
        table.appendChild(make);
        number1++;
        parent.appendChild(table);
        console.log(make);
    }
    @endforeach
            var c = document.createElement("input");
            c.type = 'text';
            c.id = "no_schedule_0";
            c.name = "";
            c.title = "0";
            c.value = "0";
            table.appendChild(c);
            parent.appendChild(table);
            console.log(c);
    var set =[]; 
var set2 =[];
set2[0]=0;
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
count[k+1]=24;
  count.sort(function(a, b){return a - b});
         var kkk=0;
         console.log(count);
         var num5;
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
</script>
</body>
</html>
@endsection