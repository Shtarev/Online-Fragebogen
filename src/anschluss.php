<?php
if(isset($_GET['ids'])){
    $ids = $_GET['ids'];
    $alle = "displ";
    $eine = "";
    $questnew = "displ";
    $home = "displ";
}
elseif(isset($_GET['displ'])){
    $alle = "displ";
    $eine = "displ";
    $questnew = "";
    $home = "displ";
}
elseif(isset($_GET['alle'])){
    $alle = "";
    $eine = "displ";
    $questnew = "displ";
    $home = "displ";
}
elseif(isset($_POST['sessionstop'])){
    $alle = "";
    $eine = "displ";
    $questnew = "displ";
    $home = "displ";
}
else {
    $alle = "displ";
    $eine = "displ";
    $questnew = "displ";
    $home = "";
}
require_once(__DIR__.'/admin_robot.php');
$admin_robot = dirweg();