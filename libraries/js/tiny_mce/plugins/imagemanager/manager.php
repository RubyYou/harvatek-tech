<?php
/**
 * The main GUI for the ImageManager.
 * @author $Author: Wei Zhuo $
 * @version $Id: manager.php 26 2004-03-31 02:35:21Z Wei Zhuo $
 * @package ImageManager
 */

	require_once('config.inc.php');
	require_once('Classes/imagemanager.php');
	
	$manager = new ImageManager($IMConfig);
	$dirs = $manager->getDirs();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<title><?php _e("Insert Image","ImageManager"); ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link href="assets/manager.css" rel="stylesheet" type="text/css" />	
<script type="text/javascript" src="assets/popup.js"></script>
<script type="text/javascript" src="assets/dialog.js"></script>
<script type="text/javascript">
/*<![CDATA[*/
	window.resizeTo(600, 500);

	var thumbdir = "<?php echo $IMConfig['thumbnail_dir']; ?>";
	var thumbprefix = "<?php echo $IMConfig['thumbnail_prefix']; ?>";
	var base_url = "<?php echo $manager->getBaseURL(); ?>";
/*]]>*/
</script>
<script type="text/javascript">
	<?php require "assets/manager_js.php"; ?>
</script>
</head>
<body>
<div class="title"><?php _e("Insert Image","ImageManager"); ?></div>
<form action="images.php" id="uploadForm" method="post" enctype="multipart/form-data">
	<input type="hidden" id="f_thumb_url" value="" />
<fieldset><legend><?php _e("Image Manager","ImageManager"); ?></legend>
<div class="dirs">
	<label for="dirPath"><?php _e("Directory","ImageManager"); ?></label>
	<select name="dir" class="dirWidth" id="dirPath" onchange="updateDir(this)">
	<option value="/">/</option>
<?php foreach($dirs as $relative=>$fullpath) { ?>
		<option value="<?php echo rawurlencode($relative); ?>"><?php echo $relative; ?></option>
<?php } ?>
	</select>
	<a href="#" onclick="javascript: goUpDir();" title="<?php _e("Directory Up","ImageManager"); ?>"><img src="img/btnfolderup.gif" height="15" width="15" alt="<?php _e("Directory Up","ImageManager"); ?>" /></a>
<?php if($IMConfig['safe_mode'] == false && $IMConfig['allow_new_dir']) { ?>
	<a href="#" onclick="newFolder();" title="<?php _e("New Folder","ImageManager"); ?>"><img src="img/btnfoldernew.gif" height="15" width="15" alt="<?php _e("New Folder","ImageManager"); ?>" /></a>
<?php } ?>
	<div id="messages" style="display: none;"><span id="message"></span><img SRC="img/dots.gif" width="22" height="12" alt="..." /></div>
	<iframe src="images.php" name="imgManager" id="imgManager" class="imageFrame" scrolling="auto" title="<?php _e("Image Selection","ImageManager"); ?>" frameborder="0"></iframe>
</div>
</fieldset>
<!-- image properties -->
	<table class="inputTable" border="0">
		<tr>
			<td align="right"><label for="f_url"><?php _e("Image File","ImageManager"); ?></label></td>
			<td><input type="text" id="f_url" class="largelWidth" value="" /></td>
			<td rowspan="3" align="right">&nbsp;</td>
			<td align="right"><label for="f_width"><?php _e("Width","ImageManager"); ?></label></td>
			<td><input type="text" id="f_width" class="smallWidth" value="" onchange="javascript:checkConstrains('width');"/></td>
			<td rowspan="2" align="right"><img src="img/locked.gif" id="imgLock" width="25" height="32" alt="<?php _e("Constrain Proportions","ImageManager"); ?>" /></td>
			<!--td rowspan="3" align="right">&nbsp;</td-->
			<td align="right"><label for="f_vert"><?php _e("V Space","ImageManager"); ?></label></td>
			<td><input type="text" id="f_vert" class="smallWidth" value="" /></td>
		</tr>		
		<tr>
			<td align="right"><label for="f_alt"><?php _e("Alt / Title","ImageManager"); ?></label></td>
			<td><input type="text" id="f_alt" class="largelWidth" value="" /></td>
			<td align="right"><label for="f_height"><?php _e("Height","ImageManager"); ?></label></td>
			<td><input type="text" id="f_height" class="smallWidth" value="" onchange="javascript:checkConstrains('height');"/></td>
			<td align="right"><label for="f_horiz"><?php _e("H Space","ImageManager"); ?></label></td>
			<td><input type="text" id="f_horiz" class="smallWidth" value="" /></td>
		</tr>
		<tr>          
			<td align="right"><label for="f_style"><?php _e("Style","ImageManager"); ?></label></td>
			<td><input type="text" id="f_style" class="largelWidth" value="" /></td>
			<td align="right">
				<input type="hidden" id="orginal_width" />
				<input type="hidden" id="orginal_height" />
        <input type="checkbox" id="constrain_prop" checked="checked" onclick="javascript:toggleConstrains(this);" />
      </td>
      <td colspan="4"><label for="constrain_prop"><?php _e("Constrain Proportions","ImageManager"); ?></label></td>
		</tr>
		<tr>
			<td align="right"><label for="f_class"><?php _e("Class","ImageManager"); ?></label></td>
			<td><input type="text" id="f_class" class="largelWidth" value="" /></td>
			<td></td>
			<td align="right"><label for="f_align"><?php _e("Align","ImageManager"); ?></label></td>
			<td colspan="2">
				<select size="1" id="f_align"  title="<?php _e("Positioning of this image","ImageManager"); ?>">
				  <option value=""                             ><?php _e("Not Set","ImageManager"); ?></option>
				  <option value="left"                         ><?php _e("Left","ImageManager"); ?></option>
				  <option value="right"                        ><?php _e("Right","ImageManager"); ?></option>
				  <option value="texttop"                      ><?php _e("Texttop","ImageManager"); ?></option>
				  <option value="absmiddle"                    ><?php _e("Absmiddle","ImageManager"); ?></option>
				  <option value="baseline" selected="selected" ><?php _e("Baseline","ImageManager"); ?></option>
				  <option value="absbottom"                    ><?php _e("Absbottom","ImageManager"); ?></option>
				  <option value="bottom"                       ><?php _e("Bottom","ImageManager"); ?></option>
				  <option value="middle"                       ><?php _e("Middle","ImageManager"); ?></option>
				  <option value="top"                          ><?php _e("Top","ImageManager"); ?></option>
				</select>
			</td>
			<td align="right"><label for="f_border"><?php _e("Border","ImageManager"); ?></label></td>
			<td><input type="text" id="f_border" class="smallWidth" value="0" /></td>
		</tr>
		<!--
		<tr> 
         <td colspan="4" align="right">
				<input type="hidden" id="orginal_width" />
				<input type="hidden" id="orginal_height" />
            <input type="checkbox" id="constrain_prop" checked="checked" onclick="javascript:toggleConstrains(this);" />
          </td>
          <td colspan="5"><label for="constrain_prop"><?php _e("Constrain Proportions","ImageManager"); ?></label></td>
      </tr>
     -->
      <tr>
<?php if($IMConfig['allow_upload'] == true) { ?>
			<td align="right"><label for="upload"><?php _e("Upload","ImageManager"); ?></label></td>
			<td>
				<table cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td><input type="file" name="upload" id="upload"/></td>
                    <td>&nbsp;<button type="submit" name="submit" onclick="doUpload();"/><?php _e("Upload","ImageManager"); ?></button></td>
                  </tr>
                </table>
			</td>
<?php } else { ?>
			<td colspan="2"></td>
<?php } ?>      	
      	<!--td colspan="2">&nbsp;</td-->
      	<td colspan="7">
      		<?php _e("Insert as:","ImageManager"); ?>
      		<select size="1" id="f_insert">
      			<option value="1"><?php _e("Image","ImageManager"); ?></option>      			
      			<option value="2"  selected="selected"><?php _e("Thumbnail with PopUp","ImageManager"); ?></option>
      			<option value="3"><?php _e("Thumbnail with link to the image","ImageManager"); ?></option>
      			<option value="4"><?php _e("Thumbnail","ImageManager"); ?></option>
       			<option value="5"><?php _e("Link to the image","ImageManager"); ?></option>
      		</select>
      	</td>
      </tr>
	</table>
<!--// image properties -->	
	<div style="text-align: right;"> 
          <hr />
		  <button type="button" class="buttons" onclick="return refresh();"><?php _e("Refresh","ImageManager"); ?></button>
          <button type="button" class="buttons" onclick="return onOK();"><?php _e("OK","ImageManager"); ?></button>
          <button type="button" class="buttons" onclick="return onCancel();"><?php _e("Cancel","ImageManager"); ?></button>
    </div>
	<input type="hidden" id="f_file" name="f_file" />
</form>
</body>
</html>