<?php ob_start() ?>
  <ul>
    <?php foreach($data as $v): ?>
      <li><?php echo $v['url']; ?></li>
    <?php endforeach;?>
  </ul>
<?php $content = ob_get_clean() ?>