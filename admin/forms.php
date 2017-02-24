<?php
include("../configs.php");
	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT gmlevel from account where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>衣米魔兽官网后台管理系统</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all">
    <link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/jquery-1.4.4.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
 $(document).ready(function(){
     $('.ddm').hover(
	   function(){
		 $('.ddl').slideDown();
	   },
	   function(){
		 $('.ddl').slideUp();
	   }
	 );
 });
</script>
    <script src="js/DD_roundies_0.0.2a-min.js"></script>
    <script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);

</script>
    <script src="js/script-carasoul.js"></script>
    <script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select, button").uniform();
      });
    </script>
    <link rel="stylesheet" href="css/uniform.defaultstyle2.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/jquery.cleditor.css" />
    <script src="js/jquery.cleditor.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor(
			{
				width:        900, // width not including margins, borders or padding
                height:       250, // height not including margins, borders or padding
			}
							 );
      });
    </script>
    </head>

    <body class="bgc">
<div id="admin">
      <div id="wrap">
    <div id="head">
          <h1><img src="../wow/static/images/logos/wof-logo.png" height="21px" width="260px"/><br />
        <span>管理员登陆界面</span></h1>
          <ul id="menu">
        <li><a href="dashboard.php">概况</a></li>
        <li><a href="">类型</a></li>
        <li><a href="forms.php">形式</a></li>
        <li><a href="#">表格数据</a></li>
        <li class="ddm"><a>多级菜单</a>
              <ul class="ddl">
            <li><a href="#">多级菜单</a></li>
            <li><a href="#">文档</a></li>
            <li><a href="#">帮助</a></li>
            <li><a href="#">联系</a></li>
          </ul>
            </li>
      </ul>
          <ul id="tablist">
        <li><a href="#a"><span>仪表盘</span></a></li>
        <li><a href="#b"><span>其他功能</span></a></li>
      </ul>
          <div id="tabsPanel">
        <div id="a" class="tab_content">
              <div class='carousel_container'>
            <div class='left_scroll'><img src='images/leftArrow.png' alt="" /></div>
            <div class='carousel_inner'>
                  <ul class='carousel_ul'>
                <li><a class="ico1" href='#'></a></li>
                <li><a class="ico2" href='#'></a></li>
                <li><a class="ico3" href='#'></a></li>
                <li><a class="ico4" href='#'></a></li>
                <li><a class="ico5" href='#'></a></li>
                <li><a class="ico6" href='#'></a></li>
                <li><a class="ico7" href='#'></a></li>
                <li><a class="ico8" href='#'></a></li>
                <li><a class="ico9" href='#'></a></li>
              </ul>
                </div>
            <div class='right_scroll'><img src='images/rightArrow.png' alt="" /></div>
          </div>
            </div>
        <div id="b" class="tab_content">
              <div class='carousel_container'>
            <div class='left_scroll2'><img src='images/leftArrow.png' alt="" /></div>
            <div class='carousel_inner'>
                  <ul class='carousel_ul2'>
                <li><a class="ico1" href='#'></a></li>
                <li><a class="ico2" href='#'></a></li>
                <li><a class="ico3" href='#'></a></li>
                <li><a class="ico4" href='#'></a></li>
                <li><a class="ico5" href='#'></a></li>
                <li><a class="ico6" href='#'></a></li>
                <li><a class="ico7" href='#'></a></li>
                <li><a class="ico8" href='#'></a></li>
                <li><a class="ico9" href='#'></a></li>
              </ul>
                </div>
            <div class='right_scroll2'><img src='images/rightArrow.png' alt="" /></div>
          </div>
            </div>
        <!--Tab End--> 
      </div>
          <img src="images/shadow.png" class="shadow" alt="" /> </div>
    <!--Content Start-->
    <div id="content">
          <div class="forms">
        <div class="heading">
              <h2>表格</h2>
              <form class="search" method="get" action="#">
            <input name="search" type="text" value="搜索" onfocus="if(this.value=='搜索')this.value=''" onblur="if(this.value=='')this.value='搜索'" />
            <input name="" type="submit" value="" />
          </form>
            </div>
        <h3>按钮 &amp; 进度条</h3>
        <form method="post" action="#" class="styleForm">
              <p>Radio 按钮<br />
            <label>
                  <input type="radio" name="RadioGroup1" value="radio" id="RadioGroup1_0" />
                  图片</label>
            <label>
                  <input type="radio" name="RadioGroup1" value="radio" id="RadioGroup1_1" />
                  影音</label>
          </p>
              <p>复选框<br />
            <label>
                  <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_0" />
                  复选框1</label>
            <label>
                  <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_1" />
                  复选框2</label>
          </p>
              <p>输入字段<br />
            <input name="Enter Title" type="text" value="输入标题" class="reg" onfocus="if(this.value=='输入标题')this.value=''" onblur="if(this.value=='')this.value='输入标题'" />
          </p>
              <p>输入字段<br />
            <input name="Enter Title" type="text" value="输入标题" class="med" onfocus="if(this.value=='输入标题')this.value=''" onblur="if(this.value=='')this.value='输入标题'" />
          </p>
              <p>输入字段<br />
            <input name="Enter Title" type="text" value="输入标题" class="large" onfocus="if(this.value=='输入标题')this.value=''" onblur="if(this.value=='')this.value='输入标题'" />
          </p>
              <p>浏览<br />
            <input name="browse" type="file" />
          </p>
              <p>文本框<br />
            <textarea name="content" cols="" rows="" onfocus="if(this.value=='输入内容')this.value=''" onblur="if(this.value=='')this.value='输入内容'">输入内容</textarea>
          <h3>按钮 &amp; 进度条</h3>
              <div class="txt">
            <textarea id="input" name="input"></textarea>
          </div>
              <input name="save" type="submit" value="保存" />
              <input name="save" type="reset" value="取消" />
            </form>
      </div>
        </div>
  </div>
      <div class="push"></div>
    </div>
<?php include("footer.php"); ?>
</body>
</html>
