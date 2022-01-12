
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
    <div class="" style="font-size:16px;font-weight:bold;color:#000000;display:inline; margin-left:170px;">MAMBURAO SURVEY APP</div>
    <a id="Button1" href="nene" style="padding: 10px; margin-left:200px;">NENE (N)</a>
    <a id="Button2" href="philip" style="padding: 10px; margin-left:10px;">PHILIP (P)</a>
    <a id="Button3" href="eric" style="padding: 10px;margin-left:10px;">ERIC (E)</a>
    <div class="dropdown">
        <button class="dropbtn">Municipality</button>
        <div class="dropdown-content">
        <a href="{{route('mbr')}}">Mamburao</a>
        </div>
    </div>
    <a id="Button3" href="{{route('set')}}" style="background-color:#fd0390; padding: 10px;margin-left:90px;">Home</a>
    <a id="Button3" href="{{route('logo')}}" style="background-color:#911aa3; padding: 10px;margin-left:10px;">Log Out</a>
</div>

<script>

    $(document).ready(function(){

        var js_arr = <?php echo json_encode($arr);?>;
        console.log(js_arr);

        if(js_arr == "")
        $("#t_application").append(
            `<div style="margin-top:100px; margin-left:550px; font-size:20px">No Surveys Yet.</div>`
        );

        get_cat();
        function get_cat()
        {
            for (var i = 0; i < js_arr.length; i++) {
                // console.log();

                $("#t_application").append(
                    `<div style="position:absolute; margin-top:175px; margin-left:1195px; font-weight:bold; font-size:23px; color:red;">`+js_arr[i][17]+`</div>
                    <div style="position:absolute; margin-top:200px; margin-left:1195px; font-weight:bold; font-size:20px">`+js_arr[i][16]+`</div>
                    <div style="margin-left:10px; margin-top:20px;">`+js_arr[i][1]+`</div>
                    <div style="margin-left:10px; margin-top:5px;"><b>`+js_arr[i][0]+`</b></div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:490px; color:#2720b3;">P</div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:90px; color:#941304;">T</div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:90px; color:#257321;">A</div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:90px; color:#2f7580;">L</div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:90px; color:#ed6707;">M</div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:90px; color:#8315c2;">V</div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:90px; color:#636363;">U</div>
                    <br>`
                );

                var trys0 = '<select name="Combobox1" size="1" id="Combobox2" style="width:68px;height:28px;z-index:8; margin-left:460px; margin-top:5px;">';
                for (let j = 0; j < js_arr[i][9].length; j++) {

                    trys0 += '<option>'+js_arr[i][9][j]+'</option>';

                }
                trys0 += '</select>';
                $("#t_application").append(trys0);

                var trys1 = '<select name="Combobox2" size="1" id="Combobox2" style="width:68px;height:28px;z-index:12; margin-left:40px">';
                for (let j = 0; j < js_arr[i][10].length; j++) {

                    trys1 += '<option>'+js_arr[i][10][j]+'</option>';

                }
                trys1 += '</select>';
                $("#t_application").append(trys1);

                var trys2 = '<select name="Combobox3" size="1" id="Combobox2" style="width:68px;height:28px;z-index:12; margin-left:40px">';
                for (let j = 0; j < js_arr[i][11].length; j++) {

                    trys2 += '<option>'+js_arr[i][11][j]+'</option>';

                }
                trys2 += '</select>';
                $("#t_application").append(trys2);

                var trys2 = '<select name="Combobox4" size="1" id="Combobox2" style="width:68px;height:28px;z-index:12; margin-left:40px">';
                for (let j = 0; j < js_arr[i][12].length; j++) {

                    trys2 += '<option>'+js_arr[i][12][j]+'</option>';

                }
                trys2 += '</select>';
                $("#t_application").append(trys2);

                var trys2 = '<select name="Combobox5" size="1" id="Combobox2" style="width:68px;height:28px;z-index:12; margin-left:40px">';
                for (let j = 0; j < js_arr[i][13].length; j++) {

                    trys2 += '<option>'+js_arr[i][13][j]+'</option>';

                }
                trys2 += '</select>';
                $("#t_application").append(trys2);

                var trys2 = '<select name="Combobox6" size="1" id="Combobox2" style="width:68px;height:28px;z-index:12; margin-left:40px">';
                for (let j = 0; j < js_arr[i][14].length; j++) {

                    trys2 += '<option>'+js_arr[i][14][j]+'</option>';

                }
                trys2 += '</select>';
                $("#t_application").append(trys2);

                var trys2 = '<select name="Combobox7" size="1" id="Combobox2" style="width:68px;height:28px;z-index:12; margin-left:38px">';
                for (let j = 0; j < js_arr[i][15].length; j++) {

                    trys2 += '<option>'+js_arr[i][15][j]+'</option>';

                }
                trys2 += '</select>';
                $("#t_application").append(trys2);

                $("#t_application").append(
                    `<br>
                    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:135px;">`+js_arr[i][2]+`</div>
                    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:180px">`+js_arr[i][3]+`</div>
                    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:224px">`+js_arr[i][4]+`</div>
                    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:267px;">`+js_arr[i][5]+`</div>
                    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:312px">`+js_arr[i][6]+`</div>
                    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:357px">`+js_arr[i][7]+`</div>
                    <div style="position:absolute; font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:402px">`+js_arr[i][8]+`</div>
                    <canvas id="table2`+i+`" style="height:250px;max-width:350px; margin-top:20px; margin-left:93px;"></canvas>
                    <div id="Line1" style="width:1175px;"></div>`
                );

                var xValues = ["P","T","A","L","M","V","U"];
                var yValues = [js_arr[i][2], js_arr[i][3], js_arr[i][4],
                js_arr[i][5], js_arr[i][6], js_arr[i][7], js_arr[i][8],0];
                var barColors = ["#2720b3", "#941304","#257321","#2f7580","#ed6707","#8315c2","#636363"];

                new Chart('table2'+i+'', {
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
            }
        }

    });



</script>

</body>
</html>


