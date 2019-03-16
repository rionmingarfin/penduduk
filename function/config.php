<?php
$conn=mysqli_connect("localhost","root","","penduduk");
if (mysqli_connect_errno()) {
    echo "mysqli_connect_error";
}

function base_url($url=null){
    $base_url="http://localhost/penduduk";

    if ($url !=null) {
        return $base_url."/".$url;
    }else{
        return $base_url;
    }
}