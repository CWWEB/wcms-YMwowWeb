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
		<script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select").uniform();
      });
    </script>
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
	<script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);
	</script>
	<script type="text/javascript">
	$(document).ready(function()
{
   $( '#checkall' ).live( 'click', function() {
				
				$( '.chkl' ).each( function() {
					$( this ).attr( 'checked', $( this ).is( ':checked' ) ? '' : 'checked' );
				}).trigger( 'change' );
 
			});
  $('#checkall').click(function(){

 $('span').toggleClass('checked');
$('#checkall').toggleClass('clicked');

 }); 
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
      <div class="messages">
      <?php
        if(isset($_GET['id'])){
          mysql_select_db($server_db);
          $media = mysql_fetch_assoc(mysql_query("SELECT * FROM media WHERE id = '".mysql_real_escape_string($_GET['id'])."'"));
          $del = mysql_query("DELETE FROM media WHERE id = '".mysql_real_escape_string($_GET['id'])."'");
          $del_c = mysql_query("DELETE FROM media_comments WHERE id = '".mysql_real_escape_string($_GET['id'])."'");
          if ($del == true && $del_c == true && $media['type'] != '0'){
          //If not a video delete file, overwrite $del var for detect errors
            $del = unlink('../images/wallpapers/'.$media['id_url']);
          }
        }
        if($del == true){
          echo '<div class="messages">
		  <div><img src="images/success.png" alt="" />
                  <p>成功! 媒体文件已删除!</p>
                </div></div>
            ';
        }
        else{
          echo'<div class="messages">
		  <center><div><img src="images/errorIco.png" alt="" />
                  <p>失败! 删除媒体文件时发生了错误.</p>
                </div><center>
				<div class="2"><center><img src="images/infoIcon.png" alt="" /></center>
                <ul><li><p>对此我们感到抱歉，发生了一些错误!</p></li> <li><p>请重新检查您的修改或是选择.</p></li> <li><p>也请检查一下您正在使用的网页与数据库.</p></li></ul>
                </div></div>
				
            ';
        }
        echo '<meta http-equiv="refresh" content="3;url='.$_SERVER['HTTP_REFERER'].'"/>';
      ?>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php"); ?>
</body>
</html>