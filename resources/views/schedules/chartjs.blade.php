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
            c.value = "60";
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
console.log(set);
console.log(set2);
for(j=0;j<number1;j++)
{
var www = document.getElementById("set_schedule_" + j).title;
if(www!=0)
    {
var www1 = parseFloat(www);
set[www1]=document.getElementById("set_schedule_"+ j).name;
add=document.getElementById("set_schedule_"+ j).value / 60;
set2[www1]=add;
if(add>1)
{
    var calc = Math.ceil(add);
    for(let sum=1;sum<calc;sum++)
    {
        set[www1+sum]="";
        set2[www1+sum]=0;
    }
}
count[k] = www1;
k++;
    }
    else
    {
        break;
    }
}
var num4 = num3 - j;
console.log(num4);
var num5;
console.log(num5);
  for(let test=j;test<number1;test++)
  {
      do{
      var test10 = document.getElementById("set_schedule_"+ test).name;
      console.log(test10);
          var random = Math.floor( Math.random() * 23 ) + 1;
      }while(set[random]!=num5)
      {
      set[random]=document.getElementById("set_schedule_"+ test).name;
      set2[random]=document.getElementById("set_schedule_"+ test).value / 60;
        count[k] = random;
        k++;
      }
  }
  count.sort(function(a, b){return a - b});
         var kkk=0;
for(i=1;i<=24;i++)
{
    var long = count[kkk+1] - count[kkk] -set2[count[kkk]];
    if (set2[i] == null&&long>0)
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
        labels: [set[1],set[2], set[3], set[4], set[5],set[6],set[7],set[8],set[9],set[10],set[11],set[12],set[13],set[14], set[15], set[16], set[17],set[18],set[19],set[20],set[21],set[22],set[23] ],
        datasets: [{
            data: [set2[1],set2[2], set2[3], set2[4], set2[5],set2[6],set2[7],set2[8],set2[9],set2[10],set2[11],set2[12], set2[13],set2[14], set2[15], set2[16], set2[17],set2[18],set2[19],set2[20],set2[21],set2[22],set2[23],set2[24]]
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
            let label = ctx.chart.data.labels[ctx.dataIndex];
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
