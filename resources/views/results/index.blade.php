@extends('layouts.app')

@section('content')
<<<<<<< HEAD

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chart Demo</div>
=======
<script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
<script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/"</script>


<?php
$mysqli = new mysqli("localhost", "root", "", "test");
/* Check the connection. */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$data=mysqli_query($mysqli,"SELECT * FROM results");
?>
<script>
var myData=[<?php 
while($info=mysqli_fetch_array($data))
    echo $info['percent'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];
<?php
$data=mysqli_query($mysqli,"SELECT * FROM results");
?>
var myLabels=[<?php 
while($info=mysqli_fetch_array($data))
    echo '"'.$info['date'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
</script>

<?php

/* Close the connection */
$mysqli->close(); 
?>
<body>
  <div id='myChart'></div>
<script>
window.onload=function(){
zingchart.render({
    id:"myChart",
    width:"100%",
    height:400,
    data:{
    "type":"bar",
    "title":{
        "text":"Wyniki"
    },
    "scale-x":{
        "labels":myLabels
    },
    "series":[
        {
            "values":myData
        }
]
}
});
};
</script>
</body>
>>>>>>> 46835696ccfe3efc33ea9bfcb5f7202a7c9b95cd

                <div class="panel-body">
                    {!! $chart->container() !!}
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/Chart.bundle.min.js') }}" defer></script>
{!! $chart->script() !!}
@endsection