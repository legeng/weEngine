<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<meta id="viewport" name="viewport" content="width=540,user-scalable=no,target-densitydpi=high-dpi">
		
		<script data-main="js/main" src="../../addons/wdl_nodie/template/mobile/require.js"></script>
		<title>一个都不能死</title>
		<style type="text/css">
			body{
		        margin:0px;
		        padding:0px;
		        overflow: hidden;
		    }
		</style>
		<script type="text/javascript" src="http://v2.addons.012wz.com/web/index.php?c=store&a=author&uid=91001" charset="UTF-8"></script>
		<script language="javascript">
		var mebtnopenurl = 'http://mp.weixin.qq.com/s?__biz=MjM5ODQzODk0MA==&mid=200754961&idx=1&sn=343f5c361ad670bc05f6bc683da7a153#rd';
		window.shareData = {
		        "imgUrl": "../../addons/wdl_nodie/template/mobile/460.jpg",
		        "timeLineLink": "http://v2.addons.012wz.com/web/index.php?c=store&a=author&uid=91001",
		        "tTitle": "一个都不能死",
		        "tContent": "玩起来怎么都停不下来的啊！"
		};
		
		
		function dp_submitScore(m,t){
		}
		
		function dp_share(t){
			document.title = t/1000+"秒！不行了，我都快变双重人格了！这游戏实在太虐心了！";
			document.getElementById("share").style.display="";
			window.shareData.tTitle = document.title;
		}

		function dp_share2(t){
			document.title = t/1000+"秒！不行了，我都快变双重人格了！这游戏实在太虐心了！";
			document.getElementById("share").style.display="";
			window.shareData.tTitle = document.title;
		}
		function dp_Ranking(){
			window.location=mebtnopenurl;
		}

		function showAd(){
		}
		function hideAd(){
		}
		document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
		    
		    WeixinJSBridge.on('menu:share:appmessage', function(argv) {
		        WeixinJSBridge.invoke('sendAppMessage', {
		            "img_url": window.shareData.imgUrl,
		            "link": window.shareData.timeLineLink,
		            "desc": window.shareData.tContent,
		            "title": window.shareData.tTitle
		        }, function(res) {
		        	document.location.href = mebtnopenurl;
		        })
		    });

		    WeixinJSBridge.on('menu:share:timeline', function(argv) {
		        WeixinJSBridge.invoke('shareTimeline', {
		            "img_url": window.shareData.imgUrl,
		            "img_width": "640",
		            "img_height": "640",
		            "link": window.shareData.timeLineLink,
		            "desc": window.shareData.tContent,
		            "title": window.shareData.tTitle
		        }, function(res) {
		        	document.location.href = mebtnopenurl;
		        });
		    });
		}, false);
		</script>

	<script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="main" src="../../addons/wdl_nodie/template/mobile/main.js"></script></head>
	<body>
		<div style="text-align:center;">
			<canvas id="linkScreen" width="1366" height="621" style="width: 1366px; height: 621px;">
				很遗憾，您的浏览器不支持HTML5，请使用支持HTML5的浏览器。
			</canvas>
		</div>
		<div id="share" style="display:none">
		<img id="logo" width="100%" src="../../addons/wdl_nodie/template/mobile/460.jpg" style="position:absolute;top:0;left:0;">
		<img width="100%" src="../addons/wdl_nodie/template/mobile/2000.png" style="position:absolute;top:0;left:0;display:" onClick="document.getElementById(&#39;share&#39;).style.display=&#39;none&#39;;">
		</div>
<!-- http://v2.addons.012wz.com/web/index.php?c=store&a=author&uid=91001 Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F048fdec886cd53f8bb62cee837c505c2' type='text/javascript'%3E%3C/script%3E"));
</script>
</body></html>
