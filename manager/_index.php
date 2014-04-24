<?php include_once '_index.c.php';?>
<html>
<head>
<title><?php echo BGM_TITLE;?></title>
<?php require_once WEB_PATH.'include/head.inc.php';?>
</head>

<frameset rows="70,*" cols="*" frameborder="NO" border="0" framespacing="0"> 
    <frame src="includes/top.htm" name="topframe" scrolling="NO" noresize id="topframe" >
    <frameset rows="*" cols="240,*" framespacing="0" frameborder="NO" border="0">
      <frame src="sidebar.php" name="sidebarframe" scrolling="yes" noresize id="sidebarframe">
      <frame src="welcome.php" name="mainframe" id="mainframe">
    </frameset>
</frameset>
<noframes>
<body>

</body>
</noframes>
</html>