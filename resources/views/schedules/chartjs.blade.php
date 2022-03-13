<html>

<head>
<link href='chart.js/dist/chartjs.css' rel='stylesheet' />
<script src="chart.js/dist/chart.min.js"></script>
<script src="chart.js/dist/chartjs-plugin-datalabels.js"></script> 
</head>

<body>

<div>
     
    <h2>入力した内容</h2>
    <p id="form_area">
        <table>
    <td id="samplebox">
    <canvas id="myChart" style="width: 400px; height: 400px"></canvas>
    </td>
    <td class="samplebox">
    <canvas id="myChart2" style="border: solid 1px; width: 500px; height: 500px"></canvas>
    </td>
    <td style="transform: rotate( -45deg )">
    <canvas id="myChart3" style="border: solid 1px; width: 500px; height: 500px"></canvas>
    </td>
    </table>
    </p>
    
    
</div>
   
<script>

    var table1 = document.createElement("p");
    var number1 = 0;
    var number2 = 0;
    @foreach($routine_schedules as $routine_schedule)
    {
        var make = document.createElement("input");
        make.type = 'text';
        make.id = "routine_schedule_" + number1;
        make.name = "{{$routine_schedule->title}}";
        make.title = "{{$routine_schedule->start_time}}";
        make.value = "{{$routine_schedule->time}}";
        table1.appendChild(make);
        number1++;
    }
    @endforeach
    
    var table2 = document.createElement("p");
    @foreach($schedules as $schedule)
    {
        var a = document.createElement("input");
        a.type = 'text';
        a.id = "schedule_" + number2;
        a.name = "{{$schedule->title}}";
        a.value = "{{$schedule->time}}";
        table2.appendChild(a);
        number2++;
    }
    @endforeach
    var number3 = number1 + number2;
    if (number3<11)
    {
        var number = 12-number3;
        var b;
        for( b=1; b<=number; b++)
        {
            var c = document.createElement("input");
            c.type = 'text';
            c.id = "no_schedule_" + b;
            c.name = "0";
            c.value = "0";
            table2.appendChild(c);
        }
    }
    var parent = document.getElementById('form_area');
    parent.appendChild(table1);
    parent.appendChild(table2);
  
let set1 = document.getElementById("schedule_0").name;
let set2 = document.getElementById("schedule_0").value / 60;
let set3 = document.getElementById("schedule_1").name;
let set4 = document.getElementById("schedule_1").value / 60;
console.log(set4);
let config1 = {
    type: "pie",
    data: {
        datasets: [{
            data: [set2, set4, 1, 1.5],
            backgroundColor: [
                "rgb(255, 99, 132)",
                "rgb(255, 159, 64)",
                "rgb(240, 240, 240)",
                "rgb(54, 162, 235)"
            ]
        }],
    },
    options: {
        responsive: false
    }
};
let set5 = document.getElementById("schedule_2").name;
let set6 = document.getElementById("schedule_2").value / 60;
let set7 = document.getElementById("schedule_3").name;
let set8 = document.getElementById("schedule_3").value / 60;
console.log(set6);

let config2 = {
    type: "pie",
    data: {
        labels: [set5, set7, "sample1", "sample2"],
        datasets: [{
            data: [set6, set8, 10, 10],
            backgroundColor: [
                "rgb(255, 99, 132)",
                "rgb(255, 159, 64)",
                "rgb(240, 240, 240)",
                "rgb(54, 162, 235)"
            ]
        }],
    },
    options: {
        responsive: false,
    }
};
let config3 = {
    type: "pie",
    data: {
        labels: ["sample4", "sample3", "sample1", "sample2"],
        datasets: [{
            data: [1, 1, 1, 1.5],
            backgroundColor: [
                "rgb(255, 99, 132)",
                "rgb(255, 159, 64)",
                "rgb(240, 240, 240)",
                "rgb(54, 162, 235)"
            ]
        }],
    },
    options: {
        responsive: false,
    }
};

document.getElementById("myChart3").style.borderColor = "red";
var chenge = document.getElementById("routine_schedule_0").title;
console.log(chenge);
var chenge1 = parseFloat(chenge);
console.log(chenge1);
var chenge2 = chenge1 * 7.5;
console.log(chenge2);
var chenge3 = chenge2;
console.log(chenge3);
let ctx = document.getElementById("myChart");
ctx.style.transform = "rotate("+chenge3+"deg)";
console.log(ctx.style.transform);

window.addEventListener("load", function() {

    let ctx1 = document.getElementById("myChart").getContext("2d");
    myChart = new Chart(ctx1, config1);
    let ctx2 = document.getElementById("myChart2").getContext("2d");
    myChart2 = new Chart(ctx2, config2);
    let ctx3 = document.getElementById("myChart3").getContext("2d");
    myChart3 = new Chart(ctx3, config3);
}, false);


</script>
</body>
</html>
