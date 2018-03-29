<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('index');?><?php include template('common/header'); ?><style id="diy_style" type="text/css"></style>
<script src="template/xinrui_wow/js/jquery.SuperSlide.js" type="text/javascript" type="text/javascript"></script>
<div class="xr_portal cl">
<div class="col1 z">
<div class="portal_slide"><!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]--></div>
<div class="today_focus mtw cl"><!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]--></div>
<div class="portal_hot_post mtw">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
<div class="xr_load_more">
<a class="load_more" href="forum.php">查看更多</a>
</div>
</div>
</div>
<div class="col2 y">
<div class="sd_ad">
<!--[diy=diy9]--><div id="diy9" class="area"></div><!--[/diy]-->
</div>
<div class="wow_sns sd_box">
<!--[diy=diy4]--><div id="diy4" class="area"></div><!--[/diy]-->
</div>
<div class="new_info sd_box">
<!--[diy=diy5]--><div id="diy5" class="area"></div><!--[/diy]-->
</div>
<div class="last_update sd_box">
<!--[diy=diy6]--><div id="diy6" class="area"></div><!--[/diy]-->
</div>
<div class="hot_pic sd_box">
<!--[diy=diy7]--><div id="diy7" class="area"></div><!--[/diy]-->
</div>
<div class="new_post sd_box">
<!--[diy=diy8]--><div id="diy8" class="area"></div><!--[/diy]-->
</div>
</div>
</div>
<script src="misc.php?mod=diyhelp&action=get&type=index&diy=yes&r=<?php echo random(4); ?>" type="text/javascript" type="text/javascript"></script><?php include template('common/footer'); ?>