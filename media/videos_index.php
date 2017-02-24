<?php 
require_once("../configs.php"); 

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
<title><?php echo $website['title']; ?>——视频</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" href="../wow/static/local-common/css/common.css?v17" />
<link title="World of Warcraft - News" href="wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="../wow/static/css/wow.css?v7" />
<link rel="stylesheet" href="../wow/static/local-common/css/media-gallery.css?v17" />
<link rel="stylesheet" href="../wow/static/css/media/media.css?v7" />
<link href="../wow/static/css/media/media.css" rel="stylesheet" type="text/css">
<script src="../wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="../wow/static/local-common/js/core.js?v17"></script>
<script src="../wow/static/local-common/js/tooltip.js?v17"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '../wow/static';
Core.sharedStaticUrl= '../wow/static/local-common';
Core.baseUrl = '../wow/en';
Core.project = '../wow';
Core.locale = 'en-gb';
Core.buildRegion = 'eu';
Core.shortDateFormat= 'dd/MM/Y';
Core.loggedIn = false;
Flash.videoPlayer = 'http://eu.media.blizzard.com/wow/player/videoplayer.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/wow/player/rating-pegi.jpg';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_trackPageview']);
//]]>
</script>
</head>

<body class="en-gb game-index">
<div id="wrapper">
<?php $page_cat="media"; include("../header.php"); ?>
	<div id="content">
		<div class="content-top">
			<div class="content-trail">
			<ol class="ui-breadcrumb">
				<li><a href="../index.php" rel="np"><?php echo $website['title']; ?></a><span class="breadcrumb-arrow"></span></li>
				<li><a href="../media.php" rel="np"><?php echo $Media['Media']; ?></a><span class="breadcrumb-arrow"></span></li>
                <li class="last"><a href="videos_index.php" rel="np"><?php echo $Media['Videos']; ?></a></li>
			</ol>
			</div>
			<div class="content-bot">
				<div class="media-content">
					<div id="media-index">
						<div class="thumbnail-page-wrapper">  
                        

						<?php
						$CantIndex = 12;
						$consulta0 = mysql_query(" SELECT * FROM media WHERE visible = 1 AND type = '0'");
						$totalSql = mysql_num_rows($consulta0);
						$pagTotal = ceil($totalSql/$CantIndex);
						if (!isset($_GET['pag'])) {
              $pagActual=1;
            }
            elseif($_GET['pag'] > $pagTotal){
              $pagActual =$pagTotal; 
            }
            elseif($_GET['pag'] < 1){
              $pagActual =1; 
            }
            else{
              $pagActual=$_GET['pag'];
            }
						$pagAnterior = $pagActual-1;
						$pagSiguiente = $pagActual+1;
						?>

							<div class="thumbnail-list-paging">
							<?php if ($pagAnterior>0) {
							?>
							<a class="ui-button button1 button1-previous " href="videos_index.php?pag=<?php echo $pagAnterior?>" id="previous-item" onClick="GalleryViewer.getPreviousPage()" >
							<span>
							<span><?php echo $Media['Previous']; ?></span>
							</span></a>
                            <?php 
							} 
							else {
							?>
							<a class="ui-button button1 button1-previous " href="#" id="previous-item" onClick="GalleryViewer.getPreviousPage()" >
							<span>
							<span><?php echo $Media['Previous']; ?></span>
							</span></a>
							<?php } ?>

							<span class="page-counter">
							页数 <span id='start-page'><?php echo $pagActual; ?></span> 发布 <?php echo $pagTotal; ?>
							</span>

							<?php 
							if ($pagSiguiente<=$pagTotal) {
							?>
							<a class="ui-button button1 button1-next " href="videos_index.php?pag=<?php echo $pagSiguiente?>" id="next-item" onClick="GalleryViewer.getNextPage()" > 
							<span>
							<span><?php echo $Media['Next']; ?></span>
							</span></a>
							<?php 
							} 
							else {
							?>
							<a class="ui-button button1 button1-next " href="#" id="next-item" onClick="GalleryViewer.getNextPage()" >
							<span>
							<span><?php echo $Media['Next']; ?></span>
							</span></a>
							<?php } ?>

							</div>

						<?php
							
							$videos_id = intval($videos['id']);
					if($videos_id > 0) {
            $error = 0;
       			$videos_query = mysql_query("SELECT * FROM media WHERE id = '".$videos_id."'")or $error=1;
					  $videos = mysql_fetch_assoc($videos_query) or $error = 1; 
            $date = $videos['date']; 
          }
          else {$error = 1;}
							
							?>
							
							
			<?php				

/**
 * WordPress 获取优酷缩略图
 * 作者：倡萌@WordPress大学
 * 出处：https://www.wpdaxue.com/wordPress-get-youku-video-thumb.html
 */
// 该函数用于获取优酷api地址的内容，在下一个函数中要使用
function getSslPage($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
//该函数获取优酷视频缩略图
function get_youku_video_thumb(){
    global $post;
    //检查该文章是否已经存储过优酷缩略图地址
    if(get_post_meta($post->ID, '_youku_thumb', true )){
        //已存储，就直接调用
        $video_thumb = get_post_meta($post->ID, '_youku_thumb', true );
        //如果没有存储，我们就需要通过优酷API获取
    }else{
        //开发者的client_id，每个ID都有调用次数限制，所以这里可以申请多个使用
        //下面一行的2个 client_id 是无效的，请自己申请后，填入
        $client_ids = array('6224089d9a95437a','6224089d9a95437a');
        //从所填入的 client_id 中随机选取一个
        $num = array_rand($client_ids,1);
        $client_id = $client_ids[$num];
		
        //在文章内容中比对获取优酷视频ID（在文章中单独一行添加视频播放页面的网址即可插入视频的）
        preg_match("#https?://v.youku.com/v_show/id_(?<video_id>[a-z0-9_=-]+)#i", $post->post_content, $matches);
        $cnt = count($matches);
        if ($cnt>0){
            //获取到视频ID后，通过API读取缩略图
            $link = "https://openapi.youku.com/v2/videos/show.json?video_id={$videos['id_url']}&client_id={$client_id}";
            $cexecute= getSslPage($link);
            if ($cexecute) {
                //转换内容以供php读取
                $result = json_decode($cexecute,true);
                $json = $result['data'][0];
                //调用大缩略图 bigThumbnail 
                $video_thumb = $result['bigThumbnail'];
                if($video_thumb !=''){
                    //将调用都的缩略图地址存储到文章字段中，以供后面调用，不需反复调用API
                    update_post_meta( $post->ID, '_youku_thumb', $video_thumb );
                }
            }
        }else{
            //文章没有插入优酷视频的话，使用一个默认图片地址
            $video_thumb = 'http://默认图片的网址，请自己填写';
        }
    }
    return $video_thumb;
}
							?>
							<?php

						$consulta1 = mysql_query(" SELECT * FROM media WHERE visible = 1 AND type = '0' ORDER BY date DESC LIMIT ".(($pagActual-1)*$CantIndex).",".$CantIndex."");
						while($videos = mysql_fetch_assoc($consulta1)) {
						?>
						<a href="videos_visor.php?id=<?php echo $videos['id']; ?>" class="thumb-wrapper">
						<span class="thumb-bg"; style="background-image: url('<?php echo get_youku_video_thumb(); ?>'); background-size: 188px 118px">
                        <span class="thumb-frame"></span></span>				
						<span class="thumb-title"><?php echo substr($videos['title'],0,45); ?></span></a>
						<?php } ?>

						<div class="pagination-wrapper">
						<ul class="ui-pagination" style="background:none">
						<?php 
						$pgIntervalo = 2;
						$pgMaximo = ($pgIntervalo*2)+1;
						$pg=$pagActual-$pgIntervalo;$i=0;
						while ($i<$pgMaximo) {
					 	if ($pg==$pagActual) {$current=array('<li class="current">','</li>');} else {$current=array('','');}
 						if ($pg>0 and $pg<=$pagTotal) {
 						?>
						<li><?php echo @$current[0]; ?><a href="videos_index.php?p=<?php echo @$_GET['p']; ?>&amp;pag=<?php echo @$pg; ?>"><?php echo @$pg; ?></a><?php echo @$current[1]; ?></li>
						<?php
  						$i++;
 						}
					 	if ($pg>$pagTotal) {$i=$pgMaximo;}
 						$pg++; 
						}
						?>
						</ul>
						</div>
                        <span class="clear"><!-- --></span>
             		</div>
					<span class="clear"><!-- --></span>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("../footer.php"); ?>
</body>
</html>
