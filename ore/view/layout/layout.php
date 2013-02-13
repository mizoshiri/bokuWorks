<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo SITE_NAME;?></title>
  <link href="/css/style.css" rel="stylesheet">
  <script src="/js/site.js"></script>
</head>
<body>
<div id="container">

<header>
  <p><a href="/"><?php echo SITE_NAME;?></a></p>

  <form method="get" action="/flickr/search/">
    <input type="text" name="s" placeholder="keyeword..." />
    <input type="submit"  value="go" />
  </form>
</header>

<?php echo $this->_content; ?>

<footer>
  <p><a href="/">Home</a></p>
</footer>
</div>

</body>
</html>