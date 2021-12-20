
<!doctype html>
<html>

<head>
<meta charset="utf-8">

<title>Mamburao Survey App</title>

<link href="{{asset('dist/css/WEB_PROJECT_ABDU.css')}}" rel="stylesheet">

<link href="{{asset('dist/css/index.css')}}" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</head>
<body>

<div id="t_application"></div>

<script>

    $(document).ready(function(){

        var js_arr = <?php echo json_encode($arr);?>;
        console.log(js_arr);
        get_cat();
        function get_cat()
        {
            $("#t_application").append(
                `<br>
                <div class="" style="font-size:16px;font-weight:bold;color:#000000;display:inline; margin-left:100px;">MAMBURAO SURVEY APP</div>
                <a id="Button1" href="nene" style="padding: 10px; margin-left:110px;">NENE (N)</a>
                <a id="Button2" href="philip" style="padding: 10px; margin-left:10px;">PHILIP (P)</a>
                <a id="Button3" href="eric" style="padding: 10px;margin-left:10px;">ERIC (E)</a>`
            );

            for (var i = 0; i < js_arr.length; i++) {
                // console.log();

                $("#t_application").append(
                    `<div style="margin-left:10px; margin-top:20px;">`+js_arr[i][1]+`</div>
                    <div style="margin-left:10px; margin-top:5px;"><b>`+js_arr[i][0]+`</b></div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:390px">N</div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:90px">G</div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:90px">U</div>
                    <br>`
                );

                var trys0 = '<select name="Combobox1" size="1" id="Combobox1" style="width:68px;height:28px;z-index:8; margin-left:360px; margin-top:5px;">';
                for (let j = 0; j < js_arr[i][5].length; j++) {

                    trys0 += '<option>'+js_arr[i][5][j]+'</option>';

                }
                trys0 += '</select>';
                $("#t_application").append(trys0);

                var trys1 = '<select name="Combobox2" size="1" id="Combobox2" style="width:68px;height:28px;z-index:12; margin-left:39px">';
                for (let j = 0; j < js_arr[i][6].length; j++) {

                    trys1 += '<option>'+js_arr[i][6][j]+'</option>';

                }
                trys1 += '</select>';
                $("#t_application").append(trys1);

                var trys2 = '<select name="Combobox2" size="1" id="Combobox2" style="width:68px;height:28px;z-index:12; margin-left:39px">';
                for (let j = 0; j < js_arr[i][7].length; j++) {

                    trys2 += '<option>'+js_arr[i][7][j]+'</option>';

                }
                trys2 += '</select>';
                $("#t_application").append(trys2);

                $("#t_application").append(
                    `<br>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:142px;">`+js_arr[i][2]+`</div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:34px">`+js_arr[i][3]+`</div>
                    <div style="font-size:19px;font-weight:bold;color:#000000; display:inline; margin-left:34px">`+js_arr[i][4]+`</div>
                    <canvas id="table2`+i+`" style="height:250px;max-width:180px; margin-top:10px; margin-left:109px;"></canvas>
                    <div id="Line1" style="width:685px;"></div>`
                );

                var xValues = ["N", "G", "U"];
                var yValues = [js_arr[i][2], js_arr[i][3], js_arr[i][4], 0];
                var barColors = ["#fc449a", "blue","green"];

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

