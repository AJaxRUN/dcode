<?php
include("connection.php");
$link = Connection();
$from=$to="";
if(isset($_POST['submit_btn']))
{
$from = $_POST['fromDate'];
$to = $_POST['toDate'];
}
$pi = explode('-',$from);
$frm_date = $pi[2].'/'.$pi[1].'/'.$pi[0];
echo $frm_date;
?>