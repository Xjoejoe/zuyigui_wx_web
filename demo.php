<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx280b31ee87955ef7", "fb3dd506a16cf07bd35177127e06710f");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>scan</title>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
</head>
<body>
<button id="btn1">123</button>
	<script>
		wx.config({
            // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            debug: false,
            // 必填，公众号的唯一标识
            appId: '<?php echo $signPackage['appId']?>',
            // 必填，生成签名的时间戳
            timestamp:'<?php echo $signPackage['timestamp']?>',
            // 必填，生成签名的随机串
            nonceStr:'<?php echo $signPackage['nonceStr']?>',
	         // 必填，签名，见附录1
	         signature:'<?php echo $signPackage['signature']?>',
	         // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
	         jsApiList : [ 'checkJsApi', 'scanQRCode' ]
        });
         wx.error(function(res) {
	        alert("出错了：" + res.errMsg);//这个地方的好处就是wx.config配置错误，会弹出窗口哪里错误，然后根据微信文档查询即可。
	    });

	    wx.ready(function() {
	        wx.checkJsApi({
	             jsApiList : ['scanQRCode'],
	             success : function(res) {

	             }
	        });

	        //点击按钮扫描二维码
	        document.querySelector('#btn1').onclick = function() {
	            wx.scanQRCode({
	                needResult : 1, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
	                scanType : [ "qrCode"], // 可以指定扫二维码还是一维码，默认二者都有
	                success : function(res) {
	                	alert('ss');
	                }
	            });
	        };

	    });
	</script>
</body>
</html>