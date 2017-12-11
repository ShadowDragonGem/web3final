<?php
require 'src/config.php';
global $db;
$rows=$_POST['rows'];
$cols=$_POST['cols'];


$chartname = $_POST['chartname'];
$colorchanges=$_POST['colChanges'];
$uid=$_SESSION["user"]["id"];

$sql = "INSERT INTO charts (chartname,uid,rownum,colnum,colorchanges) VALUES (:chartname,:uid,:rownum,:colnum,:colorchanges)";
$prepared = $db->prepare($sql,array($db->ATTR_CURSOR => $db->CURSOR_FWDONLY));
$status = $prepared->execute(array(':chartname'=>$chartname, ':uid' =>$uid, ':rownum'=>$rows,':colnum'=>$cols, ':colorchanges'=>$colorchanges));
#for ($row =)
var_dump($_POST);
