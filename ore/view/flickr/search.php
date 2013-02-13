
<?php echo $pager ?>

<h1>Search word:<?php echo $requests['meta']['get']['s']; ?></h1>
 <ul>
  <?php foreach($data['photo'] as $v): ?>
  <li>
    <img src="<?php echo $v['url']; ?>">
  </li>
  <?php endforeach;?>
</ul>

<?php echo $pager ?>