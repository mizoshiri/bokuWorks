 <ul>
  <?php foreach($data['photo'] as $v): ?>
  <li><img src=" <?php echo $v['url']; ?>"></li>
  <?php endforeach;?>
</ul>

<?php echo $pager;?>