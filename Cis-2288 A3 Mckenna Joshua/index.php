<?php
require_once 'util/CisUtil.php';
CisUtil::sendMessageBox("Index doesn't exist!!! Sending you to orderForm.php");
header("Location: orderForm.php");

/*Just Here to direct ur to the right page for the assignment when going to this location on xxamp*/
?>