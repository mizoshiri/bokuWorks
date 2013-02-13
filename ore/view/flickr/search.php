
<h1>Search word:<?php #echo $data['h1']; ?></h1>

 <ul>
  <?php foreach($data as $v): ?>
  <li><img src=" <?php echo $v['url']; ?>"></li>
  <?php endforeach;?>
</ul>