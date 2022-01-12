
<!doctype html>
<html>

<head>
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="{{asset('dist/favicon.png')}}">
<title>Mamburao Survey App</title>

<link href="{{asset('dist/css/WEB_PROJECT_ABDU.css')}}" rel="stylesheet">

<link href="{{asset('dist/css/index.css')}}" rel="stylesheet">
<link href="{{asset('dist/css/login_style.css')}}" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</head>
<body>


<div id="t_application">
    <br>
    <div class="" style="font-size:16px;font-weight:bold;color:#000000;display:inline; margin-left:100px;">MAMBURAO SURVEY APP</div>
    <a id="Button1" href="nene" style="padding: 10px; margin-left:110px;">NENE (N)</a>
    <a id="Button2" href="philip" style="padding: 10px; margin-left:10px;">PHILIP (P)</a>
    <a id="Button3" href="eric" style="padding: 10px;margin-left:10px;">ERIC (E)</a>
    <div class="dropdown">
        <button class="dropbtn">Municipality</button>
        <div class="dropdown-content">
        <a href="{{route('mbr')}}">Mamburao</a>
        </div>
    </div>
    <a id="Button3" href="{{route('set')}}" style="background-color:#fd0390; padding: 10px;margin-left:100px;">Home</a>
    <a id="Button3" href="{{route('logo')}}" style="background-color:#911aa3; padding: 10px;margin-left:10px;">Log Out</a><br><br>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:152px;"><?php if($f_nene != null ) echo $f_nene[0]; ?></div>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:200px"><?php if($f_nene != null) echo $f_nene[1]; ?></div>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:247px"><?php if($f_nene != null) echo $f_nene[2]; ?></div>
    <canvas id="table1" style="height:250px;max-width:180px; margin-top:20px; margin-left:109px;"></canvas>
    <div id="Line1" style="width:685px;"></div><br>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:149px;"><?php if($f_philip != null) echo $f_philip[0]; ?></div>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:195px"><?php if($f_philip != null) echo $f_philip[1]; ?></div>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:240px"><?php if($f_philip != null) echo $f_philip[2]; ?></div>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:287px;"><?php if($f_philip != null) echo $f_philip[3]; ?></div>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:335px"><?php if($f_philip != null) echo $f_philip[4]; ?></div>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:380px"><?php if($f_philip != null) echo $f_philip[5]; ?></div>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:427px"><?php if($f_philip != null) echo $f_philip[6]; ?></div>
    <canvas id="table2" style="height:250px;max-width:360px; margin-top:20px; margin-left:109px;"></canvas>
    <div id="Line1" style="width:685px;"></div><br>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:152px;"><?php if($f_eric != null) echo $f_eric[0]; ?></div>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:200px"><?php if($f_eric != null) echo $f_eric[1]; ?></div>
    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:247px"><?php if($f_eric != null) echo $f_eric[2]; ?></div>
    <canvas id="table3" style="height:250px;max-width:180px; margin-top:20px; margin-left:109px;"></canvas>
    <div id="Line1" style="width:685px;"></div>
    <br>
</div>

<script>

    var vbl1 = "<?php if($f_nene != null) echo $f_nene[0]; ?>";
    var vbl2 = "<?php if($f_nene != null) echo $f_nene[1]; ?>";
    var vbl3 = "<?php if($f_nene != null) echo $f_nene[2]; ?>";
    // console.log(vbl);

    var xValues = ["N", "G", "U"];
    var yValues = [vbl1,vbl2,vbl3];
    var barColors = ["#eb2a97", "#1f6310","#616161"];

    new Chart('table1', {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display:false,
        text: "World Wine Production 2018"
        },
        // scales: {
        //     yAxes: [{
        //         ticks: {
        //             display: false
        //         }
        //     }]
        // }

    }
    });

    var vbl1 = "<?php if($f_philip != null) echo $f_philip[0]; ?>";
    var vbl2 = "<?php if($f_philip != null) echo $f_philip[1]; ?>";
    var vbl3 = "<?php if($f_philip != null) echo $f_philip[2]; ?>";
    var vbl4 = "<?php if($f_philip != null) echo $f_philip[3]; ?>";
    var vbl5 = "<?php if($f_philip != null) echo $f_philip[4]; ?>";
    var vbl6 = "<?php if($f_philip != null) echo $f_philip[5]; ?>";
    var vbl7 = "<?php if($f_philip != null) echo $f_philip[6]; ?>";

    var xValues = ["P","T","A","L","M","V","U"];
    var yValues = [vbl1,vbl2,vbl3,vbl4,vbl5,vbl6,vbl7];
    var barColors = ["#2720b3", "#941304","#257321","#2f7580","#ed6707","#8315c2","#636363"];

    new Chart('table2', {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display:false,
        text: "World Wine Production 2018"
        },
        // scales: {
        //     yAxes: [{
        //         ticks: {
        //             display: false
        //         }
        //     }]
        // }

    }
    });

    var vbl1 = "<?php if($f_eric != null) echo $f_eric[0]; ?>";
    var vbl2 = "<?php if($f_eric != null) echo $f_eric[1]; ?>";
    var vbl3 = "<?php if($f_eric != null) echo $f_eric[2]; ?>";

    var xValues = ["E", "D", "U"];
    var yValues = [vbl1,vbl2,vbl3];
    var barColors = ["#107d0c", "#06a4cc","#525252"];

    new Chart('table3', {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display:false,
        text: "World Wine Production 2018"
        },
        // scales: {
        //     yAxes: [{
        //         ticks: {
        //             display: false
        //         }
        //     }]
        // }

    }
    });

</script>

</body>
</html>


