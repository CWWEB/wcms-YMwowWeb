<?php
include("../configs.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>衣米魔兽后台管理系统</title>
    <link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input").uniform();
		$('.sign').click(function(){
			$('.message').fadeIn();
		})
		$('.message').click(function(){
			$('.message').fadeOut();
		})
      });
    </script>
    <link rel="stylesheet" href="css/uniform.default.css" type="text/css" media="screen" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
<div id="login">

      <div id="log-Sup">
   <div id="logWrap">

          <h1><img src="../wow/static/images/logos/wof-logo.png" height="21px" width="260px"/><br />
        <span>管理员登陆面板</span></h1>
		<?php
  
  if(!isset($_SESSION['username'])){
  if(isset($_POST['accountName'])){
    $accountName = mysql_real_escape_string($_POST['accountName']);
    $accountPass = mysql_real_escape_string($_POST['password']);

    $sha_pass_hash = sha1(strtoupper($accountName ) . ":" . strtoupper($accountPass));

    $db_setup = mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
    $login_query = mysql_query("SELECT gmlevel,username,sha_pass_hash from account where username = '".strtoupper($accountName)."'");
    $login = mysql_fetch_assoc($login_query);
	//print_r($login);
    if(strtoupper($login['sha_pass_hash']) === strtoupper($sha_pass_hash) && $login['gmlevel'] >= 3){
      ?>
      <div id="LogPannel">
      <center><h2>正在登入</h2></center>
	  <meta http-equiv="refresh" content="2"/>
	  </div>
      <!--<div class="loader"></div>-->
      <?php
        $_SESSION['username']=$accountName;
          echo '<meta http-equiv="refresh" content="2;"';
          echo 'Succesfully';
      ?>
      </center>
      <?php
    }else{
      ?>
      <div id="LogPannel">
      <center><h2>账户或者密码错误</h2></center>
	  <meta http-equiv="refresh" content="2"/>
	  </div>
      <!--<div class="loader"></div>-->
      <?php
    }
    
    ?>
    
    
    
  <?php }else{ ?>
  <div id="LogPannel">
  <h2>管理员登陆</h2>
  <form action="?SSID:<?php echo $sessionid; ?>" method="post">
	<input id="accountName" name="accountName" type="text" value="Username" onfocus="if(this.value=='Username')this.value=''" onblur="if(this.value=='')this.value='Username'" />
    <input id="password" name="password" type="password" value="password" onfocus="if(this.value=='password')this.value=''" onblur="if(this.value=='')this.value='password'" />
    <input name="submit" type="submit" data-text="Processing..." value="登陆" />        
    <label>
    <input type="checkbox" />
          </label>
              <p>记住账号</p>
              <p><a class="sign">忘记密码</a>?</p>
            </form>
			<div class="message">
            <p>点击 <strong>登陆</strong> 进入管理系统.</p>
			</div>
			</div>
	<?php } }else{
	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT gmlevel from account where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] >= 3)
	{
    ?>
    <script>
    parent.postMessage("{\"action\":\"success\"}", "<?php echo $website['address']; ?>");
    </script>
    <?php
    echo '<div id="LogPannel">
      <center><h2><font color="green">您已经登陆衣米魔兽后台系统</font></h2></center>
	  <meta http-equiv="refresh" content="2;url=dashboard.php"/>
	  </div>
      <!--<div class="loader"></div>-->';
    
  }else{
  die('<div id="LogPannel">
      <center><h2>您不是GM无法进入系统!</h2></center>
	  <meta http-equiv="refresh" content="2;url=../index.php"/>
	  </div></div>
      </div>
        
      <div class="push"></div>
    </div>
<div id="foot">
      <p> All rights reserved.  |  设计者: <a href="" target="_blank"><font color="#15509E">衣米商城</font></a></p>
    </div>
</body>
</html>');
  }} 
  mysql_select_db($server_db);?>
        <!--
            <input type="checkbox" />
          </label>
              <p>Remember Me</p>
              <p><a class="sign">Forgot Password</a>?</p>
            </form>
        <div class="message">
              <p>Just click <strong>login</strong> to go forward.</p>-->
        </div>
      </div>
        
      <div class="push"></div>
    </div>
<?php include("footer.php"); ?>
</body>
</html>