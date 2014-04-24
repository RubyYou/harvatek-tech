<?php include_once 'welcome.c.php';?>
<html>
<head>
<title><?php echo BGM_TITLE;?></title>
<?php require_once WEB_PATH.'include/head.inc.php';?>
</head>

<body>
<div id="wrapper">
  <div id="header"></div>
  <div id="main">
    <div id="welcome_wrap">
      <div><?php echo BGM_WELCOME;?></div>
    </div>
  </div>
  <div id="footer">
    <?php require_once 'includes/copyright.php';?>
  </div>
</div>
</body>
</html>