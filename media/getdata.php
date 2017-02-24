<?php
  include('../configs.php');
  $idImage = intval($_GET["id"]);

  mysql_select_db($server_db);
  $data = mysql_fetch_assoc(mysql_query("SELECT * FROM media WHERE id = '".$idImage."'"));
  $author = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$data['author']."'"));
  echo '
  <div class="meta-data">
    <dl class="meta-details">
      <dt>'.$Media['Title'].':</dt>
      <dd>'.$data['title'].'</dd>
      <dt class="dt-separator">'.$Forum['Forum69'].': </dt>
      <dd>'.date('d-m-Y', strtotime($data['date'])).'</dd>
      <dt class="dt-separator">'.$Forum['Forum49'].':</dt>
      <dd>'.$author['firstName'].'</dd>
    </dl>
    <dl class="meta-details">
      <dt class="dt-downloads">
        '.$data['description'].'
      </dt>
      <dt class="dt-downloads">
        <a class="format" href="'.$data['link'].'" onclick="window.open(this.href);return false;">
          下载原文件
        </a>
      </dt>
    </dl>
    <span class="clear"><!-- --></span>
  </div>';
?>