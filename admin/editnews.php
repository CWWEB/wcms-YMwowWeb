<?php
include("../configs.php");

	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT account.id,gmlevel from account  where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	}
  //To show the images pop-up
  $path = "../news/";       //The images path
  $dir = opendir($path);   //Open path
  $img_total=0;
  while ($elemento = readdir($dir))   //read content
  {
    if (substr($elemento, strlen($elemento)-11,11)=='_header.jpg') //if a valid picture then show it
    {
      $img_array[$img_total]=$elemento;    //Save the pictures in array
      $img_total++;
    }
  } 
  //End image pop-up
  
  if (isset($_GET['id'])){
  mysql_select_db($server_db);
  $new = mysql_fetch_assoc(mysql_query("SELECT id,title,author,date,image,content FROM news WHERE id = '".$_GET['id']."'"));
  if (!$new['id']){
    $error = true;
  }
  }else{
    $error = true;
  }
  
//Begin Post
  if (isset($_POST['save'])){
    $title = mysql_real_escape_string($_POST['title']);
    $image = mysql_real_escape_string($_POST['image']);
    $content = $_POST['content'];
    $content = trim($content);
    if ($_POST['author']){
      $author = $login['id'];
      }else{
        $author = $new['author'];
      }
    if ($_POST['date']){
      $date = date ("Y-m-d H:i:s", time()); 
    }else{
      $date = $new['date'];
    }
    $emptyContent = strip_tags($content);
    if (empty($emptyContent)){                          //Check if content is empty, title will never be empty
      echo '<font color="red">您必须填写完整!</font>';
    }else{
      mysql_select_db($server_db);
      $change_new = mysql_query("UPDATE news SET title = '".$title."' , author = '".$author."' , image = '".$image."', content = '".addslashes($content)."', date = '".$date."' WHERE id = '".$_POST['id']."'");
      if ($change_new == true){
        echo '<div class="alert-page" align="center"> 文章已更新!</div>';
        echo '<meta http-equiv="refresh" content="3;url=viewnews.php"/>';
      }
      else{
        echo '<div class="errors" align="center"><font color="red"> 保存文章时出错!</font></div>';
      }
    }  
  }
?>      

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
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
//This functions to work the pop-up image select
function pop(action){
  var frm_element = document.getElementById('pop');
  var vis = frm_element.style;
  if (action=='open')
  {
    vis.display = 'block';               //show/hidde the image select pop-up
    frm_element.focus();
  }
  else if(action == 'blur'){
    if(document.activeElement.name != 'pop'){
      vis.display = 'none';
    }
  }
  else
  {
      vis.display = 'none';
  }
}
function changeVal(val){
  var  frm_element = document.getElementById('image'); //change the image input box value
  frm_element.value = val;                            //And the preview image
  var imgL = document.getElementById('imgLoad');
  imgL.src = '../news/' + val + '.jpg';
}

function preview(img,event){
  var div = document.getElementById('preview');      //To show preview images
  div = div.style;
  var imgP = document.getElementById('imgP');
  if (event == 'on'){
    div.display = 'block';
    imgP.src= img;
  }
  else{
    div.display = 'none';
  }
  }
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
          <h2>编辑新闻: <?php if(isset($error)){die ('<font color="red">Sorry an error has ocurred!</font>');} ?><?php echo $new['title']; ?></h2>
          <form class="search" method="get" action="#">
            <input name="search" type="text" value="搜索" onfocus="if(this.value=='搜索')this.value=''" onblur="if(this.value=='')this.value='搜索'" />
            <input name="" type="submit" value="" />
          </form>
        </div>
        <h3>顶部</h3>
        <form method="post" action="" class="styleForm">
        <input type="hidden" name="id" value="<?php echo $new['id']; ?>" />
          <p>标题<br />
            <input name="title" type="text" value="<?php echo $new['title']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $new['title']; ?>'" />
          </p> 
          <div class="folder">
            <p>图片<br />
            <input id="image" name="image" type="text" value="<?php echo $new['image']; ?>" class="reg" onfocus="pop('open');" /> 
            </p>
            <img src="<?php echo '../news/'.$new['image'].'.jpg'; ?>" id="imgLoad" />
            <div  class="pop-image" id="pop" name="pop" onblur="pop('blur');" tabindex="1">
              <div class="note">
                <table border=0>
                <?php       
                for ($i=0;$i<$img_total; $i++)      //show images in table
                {
                  $imagen = $img_array[$i];
                  $pathimagen=$path.$imagen;
                  $nombre = substr($imagen,0,strlen($imagen)-11); //get the name for the db
                  echo "<tr>"; // para empezar una nueva linea
                  echo "<td><a href='javascript:;' name='pop' onclick=changeVal('".$nombre."');pop('close');>
                  <img src='$pathimagen' width='160px' border=0 onmouseover=preview('".$pathimagen."','on'); onmouseout=preview('".$pathimagen."','out');></a></td>";  //Clik on it and the name appear on the textbox
                  echo "</tr>";
                }
                ?>
                </table>
              </div>
            </div>
            <div  id="preview" style="display:none; float:right; position:absolute;left:450px;top:-50px;">
              <img src="" alt="img" id="imgP" />   
            </div>   
          </div> 
          <p>   
            <input class="chkl" type="checkbox" name="date" value="checkbox" />更改为当前日期
          </p>
          <p>   
            <input class="chkl" type="checkbox" name="author" value="checkbox" />我是作者
          </p>
          <h3>内容</h3>
          <div class="txt">
            <textarea id="input" name="content"><?php echo $new['content']; ?></textarea>
          </div>
          <input name="save" type="submit" value="保存" />
          <a href="viewnews.php"><input name="reset" type="reset" value="取消" /></a>
        </form>
      </div>
    </div>
  </div>
  <div class="push"></div>
</div>
<?php include("footer.php"); ?>
</body>
