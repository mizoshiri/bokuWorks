<h1><?php #echo $data['h1']; ?>a</h1>

 <ul>
<?php foreach($data as $v): ?>
<li><img src=" <?php echo $v['url']; ?>"></li>
<?php endforeach;?>
</ul>