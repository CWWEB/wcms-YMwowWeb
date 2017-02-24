<html>
  <head></head>
<body>
<h1><img src="../wow/static/images/logos/wof-logo.png" height="21px" width="260px"/><br />
        <span>管理员控制面板</span></h1>
        <ul id="menu">
          <li><a href="dashboard.php">概况</a></li>
          <li><a href="viewnews.php">新闻</a></li>
          <li><a href="fcategory.php">论坛</a></li>
          <li><a href="#">用户</a></li>
          <li class="ddm"><a>账号</a>
            <ul class="ddl">
              <li><a href="#">账号</a></li>
              <li><a href="#">帮助</a></li>
              <li><a href="#">编辑</a></li>
              <li><a href="logout.php">退出</a></li>
            </ul>
          </li>
        </ul>
        <ul id="tablist">
          <li><a href="#a"><span>网站功能</span></a></li>
	        <li><a href="#b"><span>数据功能</span></a></li>
	        <li><a href="#c"><span>账户服务</span></a></li>
        </ul>
        <div id="tabsPanel">
          <div id="a" class="tab_content">
            <div class='carousel_container'>
              <div class='left_scroll'><img src='images/leftArrow.png' alt="" /></div>
              <div class='carousel_inner'>
              <ul class='carousel_ul'>
                <li><span rel="tooltip" title="<strong style='color:#00B6FF'>发布新闻</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico1" href='writenews.php'></a></span></li>
				        <li><span rel="tooltip" title="<strong style='color:#00B6FF'>发布/编辑新闻</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico3" href='viewnews.php'></a></span></li>
			         	<li><span rel="tooltip" title="<strong style='color:#00B6FF'>管理影音</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico10" href='mediaall.php'></a></span></li>
				        <li><span rel="tooltip" title="<strong style='color:#00B6FF'>未审核的影音</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="icom2" href='mediaun.php'></a></span></li>
				        <li><span rel="tooltip" title="<strong style='color:#00B6FF'>论坛</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="icof" href='fcategory.php'></a></span></li>                   
						    
                <li><span rel="tooltip" title="<strong style='color:#00B6FF'>查看网站</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico4" href='viewwebsite.php'></a></span></li>
						    <li><span rel="tooltip" title="<strong style='color:#00B6FF'>衣米商场</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico2" href='http://www.ymisc.com'></a></span></li>
                <li><span rel="tooltip" title="<strong style='color:#00B6FF'>帮助</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico9" href='info.php'></a></span></li>
              </ul>
              </div>
              <div class='right_scroll'><img src='images/rightArrow.png' alt="" /></div>
            </div>
          </div>
				  <div id="b" class="tab_content">
            <div class='carousel_container'>
              <div class='left_scroll'><img src='images/leftArrow.png' alt="" /></div>
              <div class='carousel_inner'>
                <ul class='carousel_ul2'>
                  <!-- To do It'll be visible just to superadmins-->
                  <li><span rel="tooltip" title="<strong style='color:#00B6FF'>用户面板</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico5" href='users.php'></a></span></li>
						      <li><span rel="tooltip" title="<strong style='color:#00B6FF'>注释和日期</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico6" href='calendarandnotes.php'></a></span></li>
						      <li><span rel="tooltip" title="<strong style='color:#00B6FF'>数据库修改</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico7" href='editdb.php'></a></span></li>
						      <li><span rel="tooltip" title="<strong style='color:#00B6FF'>删除数据</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico8" href='deletedb.php'></a></span></li>
                  <li><span rel="tooltip" title="<strong style='color:#00B6FF'>帮助</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico9" href='info.php'></a></span></li>
                </ul>
              </div>
              <div class='right_scroll'><img src='images/rightArrow.png' alt="" /></div>
            </div>
          </div>
				  <div id="c" class="tab_content">
            <div class='carousel_container'>
              <div class='left_scroll'><img src='images/leftArrow.png' alt="" /></div>
              <div class='carousel_inner'>
                <ul class='carousel_ul3'>
                  <li><span rel="tooltip" title="<strong style='color:#00B6FF'>账户信息</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico9" href='info.php'></a></span></li>
                  <li><span rel="tooltip" title="<strong style='color:red'>登出</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico5" href='logout.php'></a></span></li>
                  </ul>
              </div>
              <div class='right_scroll'><img src='images/rightArrow.png' alt="" /></div>
            </div>
          </div>
        <!--Tab End-->  
      </div>
      <img src="images/shadow.png" class="shadow" alt="" />
</body>
</html>