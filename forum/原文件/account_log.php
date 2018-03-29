<?php
require_once("../configs.php");
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<title><?php echo $website['title']; ?></title>
<!--[if IE]>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<![endif]-->
<meta name="robots" content="none" />
<meta http-equiv="refresh" content="8;url=../account_log.php"/>
<link rel="shortcut icon" href="<?php echo $website['root'];?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<!--[if LT IE 9]>
<link rel="shortcut icon" type="image/x-icon" href="images/root.ico" />
<![endif]-->
<link rel="stylesheet" href="<?php echo $website['root'];?>wow/static/css/error/error.css"/>
<!--[if LT IE 9]>
<style>
.info .twitter { background-image: url("images/twitter.png"); }
.footer .copyright { zoom: 1; float: left; }
.footer .legal { zoom: 1; float: left; }
.footer .legal a { zoom: 1; float: left; padding: 0 1em 0 0; }
.footer .language { zoom: 1; white-space: normal; }
.footer .blizzard { zoom: 1; float: left; }
.footer .privacy { zoom: 1; }
.footer .privacy a { zoom: 1; }
body.zh-cn .notice .logo span { background-image: url("images//bnet-default-cn.gif"); }
body.zh-cn .info .twitter { background-image: url("/static/maintenance/wow/images/twitter-cn.png"); }
</style>
<![endif]-->
</head>
<body class="en-us">
<div class="wrapper">
<!-- US -->
<div class="notice" id="en-us:notice">
<h1 class="logo"><span><?php echo $website['title']; ?></span></h1>
<div class="info">
<h2 class="title">你在这里做什么?</h2>
<p class="short">你进入了 <?php echo $website['title']; ?> 管理页面, 请等待，我们正在使用我们最好的工程师来解决这个问题，它只需要5秒。衣米魔兽感谢您的耐心等待!</p>
<div class="twitter">
相关衣米魔兽更多信息, 请关注 <a tabindex="1" target="_blank" href="http://t.qq.com/long21234675">@<?php echo $website['title']; ?></a> 衣米魔兽官方微博.
</div>
</div>
</div>
<div class="footer" id="en-us:footer"><center>
<small><?php echo $copyright3['copyright3']; ?>.<br /><?php echo $copyright['copyright'];  echo $website['title']; ?>.<br /><?php echo $copyright4['copyright4']; ?></small><a href="http://www.strawberry-pr0jcts.com/forum/index.php?/forum/27-wowfailurecms/" height="46" width="190">
<p><img src="<?php echo $website['root'];?>wow/static/images/logos/wof-logo-small.png" /></center></a></p>
<span class="language">中华人民共和国 (CN)</span><br>
</div></div>
</body>
</html>
