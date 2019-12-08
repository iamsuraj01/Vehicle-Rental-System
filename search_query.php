<?php
  include_once('classes/application_top.php');
    $key=$_GET['key'];
    $array = array();
    $res=$obj->SData($key);
    while($row=$res->fetch_assoc())
    {
    $array[] = $row['v_name'];
    }
    
    echo json_encode($array);
   // print_r($array);
   
?>
