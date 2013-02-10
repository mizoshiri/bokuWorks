<?php
include('../Config/Config.php');

/*controller model super class*/
include('../Controller/Controller.php');
include('../Model/Model.php');

include("../libs/dispacth.php");

$dispatch = new Dispatch();
$dispatch->dispatch();
?>
