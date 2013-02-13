<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo SITE_NAME;?></title>
  <link href="/css/style.css" rel="stylesheet">
  <script src="/js/site.js"></script>
</head>
<body>
<div class="container">

<header>
  <form method="post" action="/flickr/search/">
    <input type="text" name="s" placeholder="keyeword..." />
    <input type="submit" name="submit" value="go" />
  </form>
</header>

<?php echo $this->_content; ?>

<footer>
  <p class="pull-right"><a href="#">Back to top</a></p>
</footer>
</div>

</body>
</html>