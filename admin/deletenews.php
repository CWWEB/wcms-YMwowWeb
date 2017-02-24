<?php
include("../configs.php");

	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT account.id,gmlevel from account where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	}
  
  if (isset($_POST['delete'])){
    mysql_select_db($server_db);
    $delete_new = mysql_query("DELETE FROM news WHERE id = '".$_POST['id']."'");
    $delete_com = mysql_query("DELETE FROM comments WHERE newsid = '".$_POST['id']."'");
    if ($delete_new == true && $delete_com == true){
      echo '<div class="alert-page" align="center"> The article has been deleted successfully!</div>';
      echo '<meta http-equiv="refresh" content="3;url=viewnews.php"/>';
    }
    else{
      echo '<div class="errors" align="center"><font color="red"> An ERROR has occured while deleting the article!</font></div>';
    }
  }
?>      

<!doctype html>
<head>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<title>衣米魔兽官网后台管理系统</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/tooltip.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
		<script type="text/javascript" src="js/script-carasoul.js"></script>
		<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/uniform.defaultstyle3.css" type="text/css" media="screen" />
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
    <script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
    <script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);

</script>
    <script type="text/javascript" src="js/script-carasoul.js"></script>
    <script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select, button").uniform();
      });
    </script>
    <link rel="stylesheet" href="css/uniform.defaultstyle2.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/jquery.cleditor.css" />
    <script type="text/javascript" src="js/jquery.cleditor.js"></script>
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
        <?php include('header.php'); ?>
      </div>
    <!--Content Start-->
    <div id="content">
      <div class="forms">
        <div class="heading">
          <h2>删除新闻</h2>
          <form class="search" method="get" action="#">
            <input name="search" type="text" value="搜索" onfocus="if(this.value=='搜索')this.value=''" onblur="if(this.value=='')this.value='搜索'" />
            <input name="" type="submit" value="" />
          </form>
        </div>
        <?php
          if (isset($_GET['id'])){
            mysql_select_db($server_db);
            $new = mysql_fetch_assoc(mysql_query("SELECT id,title,author,date,comments,content FROM news WHERE id = '".$_GET['id']."'"));
            $author = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$new['author']."'"));
            if (!$new['id']){
              $error = true;
            }
          }else{
            $error = true;
          }
          if (!$error) {
          echo'
        <h3>Article Information</h3>
        <form method="post" action="" class="styleForm">
        <table>
          <tr>
            <td width="65%"><p><strong>标题: </strong>'.$new['title'].'</p></td>
            <td rowspan="4" style="vertical-align:middle;">
              <p align="center"><strong>你确定要删除这篇新闻吗?</strong></p>
              <input type="hidden" name="id" value="'.$new['id'].'" />
              <p align="center"><button type="submit" name="delete" onclick="Form.submit(this)"><span>删除</span></button>
              <a href="viewnews.php"><button name="reset" type="reset" value="Cancel"><span>取消</span></button></a></p>
              <p align="center">(你将会丢失这篇新闻下的所有评论)</p> 
            </td>
          </tr>
          <tr><td><p><strong>作者: </strong>'.$author['firstName'].' '.$author['lastName'].' ('.$new['author'].')</p></td></tr>
          <tr><td><p><strong>日期: </strong>'.$new['date'].'</p></td></tr>
          <tr><td><p><strong>回复: </strong>'.$new['comments'].'</p></td></tr> 
          <tr><td colspan="2"><h3>内容:</h3><p>'.$new['content'].'</p></td></tr>
        </table>
        </form></div>';
          }elseif ($delete_new == false){ //just show error if we have not deleted am article
            echo '</div><div class="messages"><div><img src="images/warningIco.png" alt="" />
            <p>你必须选择一篇新闻进行操作!</p>
            </div></div>
            <meta http-equiv="refresh" content="2;url=dashboard.php"/>';
          }
          ?>
    </div>
  </div>
  <div class="push"></div>
</div>
<?php include("footer.php"); ?>
</body>