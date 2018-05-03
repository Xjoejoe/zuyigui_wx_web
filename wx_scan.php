<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx280b31ee87955ef7", "fb3dd506a16cf07bd35177127e06710f");
$signPackage = $jssdk->GetSignPackage();
echo json_encode($signPackage);
?>