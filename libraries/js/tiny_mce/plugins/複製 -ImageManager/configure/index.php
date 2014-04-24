<?php load_plugin_textdomain('ImageManager','wp-content/plugins/ImageManager/lang'); ?>
<?php if (defined('ABSPATH')) { ?>
<style type='text/css'>
#imagemanager fieldset {
	Xborder: 1px dotted #666; 
	border: 1px solid #ccc;
	padding: 5px;
}	
	
	div.row {
	clear: both;
	Xpadding-top: 10px;
	padding: 0;
	margin: 0;
}

div.row span.label {
	float: left;
	width: 200px;
	Xwidth: 40%;
	text-align: right;
	padding: 0;
	margin: 0;
}
	
div.row span.formw {
	Xborder: thin solid #000000;
	float: left;
	Xwidth: 300px;
	width: 60%;
	Ztext-align: left;
	Xpadding: 0;
	margin: 0;
	padding-left: 10px;
}


.formw_r {
	Xborder: thin solid #000000;
	float: right;
	Xwidth: 300px;
	width: 100%;
	text-align: right;
	Xpadding: 0;
	margin: 0;
	padding-left: 10px;
}

</style>

<div class="wrap">
	<a id="top" name="top"></a>
	<div id="imagemanager">
	<form name="ima" id="ima" action="" method="post">
	<input name="imagemanager_option_subitted" type="hidden" value="1" />
	<h2><?php _e("PHP ImageManager + Editor configuration","ImageManager"); ?></h2>
	<p style="float:right;padding-top:1em;">
	<a id="settings" name="settings"></a>
	<?php _e("Go to:","ImageManager"); ?> <a href="#optional"><?php _e("Optional settings","ImageManager"); ?></a>&nbsp;|&nbsp;<a href="#about"><?php _e("About","ImageManager"); ?></a>
	</p>
	<div style="clear:right"></div>
	
	<h3><?php _e("Settings","ImageManager"); ?></h3>	
			<fieldset>
			<legend><?php _e("Paths","ImageManager"); ?></legend>	
				<table width="100%" cellspacing="2" cellpadding="5" class="editform"> 
					<tr><th width="33%" scope="row"><?php _e("Base image directory","ImageManager"); ?>:</th><td><input name="IMConfig[base_dir]" type="text" value="<?php echo $IMConfig['base_dir'];?>" xsize="60"  style="width: 99%;"/></td></tr>
					<tr><th width="33%" scope="row"><?php _e("Base image URL","ImageManager"); ?>:</th><td><input name="IMConfig[base_url]" type="text" value="<?php echo $IMConfig['base_url'];?>" xsize="60" style="width: 99%;"/></td></tr>
					<tr>
						<td width="33%">&nbsp;</td>
						<td width="66%">
						<div id="help1" style="width:100%; background-color: #FFF68F;">
						<b><?php _e("Base image directory","ImageManager"); ?></b>
						<p>
						<?php _e("The base image directory must be world writable i.e.: chmod 777","ImageManager"); ?>
						</p>
						<b><?php _e("Base image URL","ImageManager"); ?></b>
						<p>
						 <?php _e("The URL to the base image directory, the web browser needs to be able to see it.","ImageManager"); ?>
						</p>
						<p>  
						 <?php _e("Note that the directory can be protected via .htaccess on apache or directory permissions on IIS, check your web server documentation for further information on directory protection. If this directory has to be publicly accessible, remove scripting capabilities for this directory (i.e. disable PHP, Perl, CGI). We only want to store images in this directory and its subdirectories.","ImageManager"); ?>
						</p>
						<p> 
						<?php _e("On apache you can create the following .htaccess file in your base image directory:","ImageManager"); ?><br />
<pre>
&lt;Files ^(*.jpeg|*.jpg|*.png|*.gif)&gt;
   order deny allow
   deny from all
&lt;/Files&gt;	
</pre>
						</p>
						</div>
						<td>
					<tr>
				</table>
			</fieldset>			
			<p />
			<div style="clear:left"></div>
			<fieldset>
			<legend><?php _e("Image Manipulation Library","ImageManager"); ?></legend>			
				<table width="100%" cellspacing="2" cellpadding="5" class="editform"> 
					<tr><th width="33%" scope="row"><?php _e("GD","ImageManager"); ?>:</th><td><input name="IMConfig[image_class]" type="radio" value="GD" <?php if ($IMConfig['image_class'] == "GD") {print " checked=\"checked\" ";} ?> /></td></tr>
					<tr><th width="33%" scope="row"><?php _e("ImageMagick","ImageManager"); ?>:</th><td><input name="IMConfig[image_class]" type="radio" value="IM" <?php if ($IMConfig['image_class'] == "IM") {print " checked=\"checked\" ";} ?> /></td></tr>
					<tr><th width="33%" scope="row"><?php _e("NetPBM","ImageManager"); ?>:</th><td><input name="IMConfig[image_class]" type="radio" value="NetPBM" <?php if ($IMConfig['image_class'] == "NetPBM") {print " checked=\"checked\" ";} ?> /></td></tr>
					<tr><th width="33%" scope="row"><?php _e("Library path (IM or NetPBM)","ImageManager"); ?>:</th><td><input name="IMConfig[image_transform_lib_path]" type="text" value="<?php echo $IMConfig['image_transform_lib_path'];?>" xsize="60" style="width:99%;"/></td></tr>
					<tr>
						<td width="33%">&nbsp;</td>
						<td width="66%">
						<div id="help2" style="width:100%; background-color: #FFF68F;">
						<b><?php _e("GD","ImageManager"); ?></b>
						<p>
						<?php _e("If GD is checked on initial configuration, you have GD installed","ImageManager"); ?>
						</p>
						<b><?php _e("ImageMagick and NetPBM","ImageManager"); ?></b>
						<p>
						<?php _e("If you want to use ImageMagick or NetPBM, PHP needs to be able to execute commands on the command line. That is, if PHP is in safe mode, then it may not be possible to use Imagemagic or NetPBM.","ImageManager"); ?>
						</p>
						<b><?php _e("Library path","ImageManager"); ?></b>
						<p>
						<?php _e("If you have selected ImageMagick or NetPBM, you need to specify where the binary for the selected library are.","ImageManager"); ?>
						</p>
						</div>
						<td>
					<tr>
				</table>	
			</fieldset>
			<p />
			<div style="clear:left"></div>
			<fieldset>
			<legend><?php _e("Security","ImageManager"); ?></legend>			
				<table width="100%" cellspacing="2" cellpadding="5" class="editform"> 
					<tr><th width="33%" scope="row"><?php _e("PHP is running in Safe Mode:","ImageManager"); ?></th><td><input disabled="true" name="IMConfig[safe_mode]" type="checkbox" value="true" <?php if ($IMConfig['safe_mode'] == "true") {print " checked=\"checked\" ";} ?>  /></td></tr> 
					<?php if (class_exists('RoleManager')) { ?>
						<tr><th width="33%" scope="row" style="color: #ccc;"><?php _e("Can create new directory","ImageManager"); ?>:</th><td><input disabled="true" name="IMConfig[allow_new_dir]" type="checkbox" value="false" /> <?php _e("Use the <a href='profile.php?page=role-manager/role-manager.php'>Role Manager</a> to manage the <b>Make Directory</b> role","ImageManager"); ?></td></tr>
						<tr><th width="33%" scope="row" style="color: #ccc;"><?php _e("Can upload images","ImageManager"); ?>:</th><td><input disabled="true" name="IMConfig[allow_upload]" type="checkbox" value="false" /> <?php _e("Use the <a href='profile.php?page=role-manager/role-manager.php'>Role Manager</a> to manage the <b>Upload Files</b> role","ImageManager"); ?></td></tr>
					<?php } else { ?>
						<tr><th width="33%" scope="row"><?php _e("Can create new directory","ImageManager"); ?>:</th><td><input name="IMConfig[allow_new_dir]" type="checkbox" value="true" <?php if ($IMConfig['allow_new_dir'] == "true") {print " checked=\"checked\" ";} ?>  /></td></tr>
						<tr><th width="33%" scope="row"><?php _e("Can upload images","ImageManager"); ?>:</th><td><input name="IMConfig[allow_upload]" type="checkbox" value="true" <?php if ($IMConfig['allow_upload'] == "true") {print " checked=\"checked\" ";} ?>  /></td></tr>
					<?php } ?>
					<tr>
						<td width="33%">&nbsp;</td>
						<td width="66%">
						<div id="help3" style="width:100%; background-color: #FFF68F;">
						<b><?php _e("Safe Mode","ImageManager"); ?></b>
						<p>
						<?php _e("If safe mode is check on initial configuration, your server is running in safe mode. More info on safe mode <a href='http://www.php.net/features.safe-mode' target='_blank'>here</a>","ImageManager"); ?><br />
						<?php _e("If running in safe mode, ImageManager can not: use ImageMagick or NetPBM and it can not create directories.","ImageManager"); ?>
						</p>
						<b><?php _e("Can create new directory","ImageManager"); ?></b>
						<p>
						<?php _e("Allow the user to create and delete sub directories","ImageManager"); ?>	
						</p>
						<b><?php _e("Can upload images","ImageManager"); ?></b>
						<p>
						<?php _e("Allow the user to upload images. Note: To be able to upload images, the image folder must be world writable.","ImageManager"); ?>	
						</p>
						</div>
						<td>
					<tr>
					
				</table>
			</fieldset>
	<p style="float:right;padding-top:1em;">
	<a id="optional" name="optional"></a>	
	<?php _e("Go to:","ImageManager"); ?> <a href="#settings"><?php _e("Settings","ImageManager"); ?></a>&nbsp;|&nbsp;<a href="#about"><?php _e("About","ImageManager"); ?></a>&nbsp;|&nbsp;<a href="#top"><?php _e("top","ImageManager"); ?></a>
	</p>
	<div style="clear:right"></div>

	
	<h3><?php _e("Optional settings","ImageManager"); ?></h3>

			<fieldset>
			<legend><?php _e("Thumbnails","ImageManager"); ?></legend>			
				<table width="100%" cellspacing="2" cellpadding="5" class="editform"> 
					<tr><th width="33%" scope="row"><?php _e("Default thumbnail","ImageManager"); ?>:</th><td><input name="IMConfig[default_thumbnail]" type="text" value="<?php echo $IMConfig['default_thumbnail'];?>" style="width:99%;" /></td></tr>
					<tr><th width="33%" scope="row"><?php _e("Thumbnail width","ImageManager"); ?>:</th><td><input name="IMConfig[thumbnail_width]" type="text" value="<?php echo $IMConfig['thumbnail_width'];?>" style="width:99%;" /></td></tr>
					<tr><th width="33%" scope="row"><?php _e("Thumbnail height","ImageManager"); ?>:</th><td><input name="IMConfig[thumbnail_height]" type="text" value="<?php echo $IMConfig['thumbnail_height'];?>" style="width:99%;" /></td></tr>
					<tr><th width="33%" scope="row"><?php _e("Thumbnail prefix","ImageManager"); ?>:</th><td><input name="IMConfig[thumbnail_prefix]" type="text" value="<?php echo $IMConfig['thumbnail_prefix'];?>" style="width:99%;" /></td></tr>
					<tr><th width="33%" scope="row"><?php _e("Thumbnail directory","ImageManager"); ?>:</th><td><input name="IMConfig[thumbnail_dir]" type="text" value="<?php echo $IMConfig['thumbnail_dir'];?>" style="width:99%;" /></td></tr>
					<tr>
						<td width="33%">&nbsp;</td>
						<td width="66%">
						<div id="help4" style="width:100%; background-color: #FFF68F;">
						<b><?php _e("Default thumbnail","ImageManager"); ?></b>
						<p>
						 <?php _e("The default thumbnail if the thumbnails can not be created, either due to error or bad image file.","ImageManager"); ?>
						</p>
						<b><?php _e("Thumbnail prefix","ImageManager"); ?></b>
						<p>
						<?php _e("The prefix for thumbnail files, something like .thumb will do. The thumbnails files will be named as 'prefix_imagefile.ext', that is, prefix + orginal filename.","ImageManager"); ?>
						</p>
						<b><?php _e("Thumbnail directory","ImageManager"); ?></b>
						<p>
						  <?php _e("Thumbnail can also be stored in a directory, this directory will be created by PHP. If PHP is in safe mode, this parameter is ignored, you can not create directories.","ImageManager"); ?> <br />
							<?php _e("If you do not want to store thumbnails in a directory, set this to false or leave the field empty.","ImageManager"); ?>
						</p>	
						</div>
						<td>
					<tr>
					
				</table>
			</fieldset>
			<p />
			<div style="clear:left;"></div>
			<fieldset>
			<legend><?php _e("Misc. optional settings","ImageManager"); ?></legend>	
				<table width="100%" cellspacing="2" cellpadding="5" class="editform"> 
					<tr><th width="33%" scope="row"><?php _e("Remove WordPress Upload Files","ImageManager"); ?>:</th><td><input name="IMConfig[wpupload_disabled]" type="checkbox" value="true" <?php if ($IMConfig['wpupload_disabled'] == "true") {print " checked=\"checked\" ";} ?> /></td></tr>
					<tr><th width="33%" scope="row"><?php _e("Validate images","ImageManager"); ?>:</th><td><input name="IMConfig[validate_images]" type="checkbox" value="true" <?php if ($IMConfig['validate_images'] == "true") {print " checked=\"checked\" ";} ?> /></td></tr>
					<tr><th width="33%" scope="row"><?php _e("tmp prefix","ImageManager"); ?>:</th><td><input name="IMConfig[tmp_prefix]" type="text" value="<?php echo $IMConfig['tmp_prefix'];?>" style="width:99%;" /></td></tr>
					<tr>
						<td width="33%">&nbsp;</td>
						<td width="66%">
						<div id="help5" style="width:100%; background-color: #FFF68F;">
						<b><?php _e("Remove WordPress Upload Files","ImageManager"); ?></b>
						<p>
						<?php _e("Turn off Wordpress's native image / file uploader.","ImageManager"); ?>
					  </p>
						<b><?php _e("Validate images","ImageManager"); ?></b>
						<p>
						<?php _e("If checked, uploaded files will be validated based on the function getImageSize, if we can get the image dimensions then we asume this is a valid image. Otherwise the file will be rejected.","ImageManager"); ?><br />
 						<?php _e("If not checked, all uploaded files will be processed.","ImageManager"); ?><br />
 						<?php _e("NOTE: If uploading is not allowed, this parameter is ignored.","ImageManager"); ?>
						</p>
						<b><?php _e("tmp prefix","ImageManager"); ?></b>
						<p>
						 <?php _e("Image Editor temporary filename prefix.","ImageManager"); ?>
						</p>
						</div>
						<td>
					<tr>
					
				</table>
			</fieldset>

	<div class="row"><span class="label">&nbsp;</span><span class="formw_r"><input type="submit" name="Submit" value="<?php echo $submit_button_text?> &raquo;" /></span></div>
	
	<div style="clear:right;padding-bottom:30px;"></div>


	<a id="about" name="about"></a>	
	<h3><?php _e("About","ImageManager"); ?></h3>
			<fieldset>
			<legend>ImageManager 2.0</legend>
			<p>
			<?php _e("<a href='http://www.zhuo.org/htmlarea/docs/index.html'>PHP ImageManager + Editor</a> for WordPress 2.0. The ImageManager provides an interface for  browsing and uploading image files on/to your server. The Editor allows for some basic image manipulations such as, cropping, rotation, flip, and scaling.","ImageManager"); ?>
			</p>
			<p>
			<?php printf(__("The plugin adds the %s button to the TinyMCE editor, or the <input type='button' value='ImageManager' class='ed_button' /> quicktag if you have disabled wysiwyg. To use ImageManager, click the button / quicktag :-)","ImageManager"), '<img src="'.$ps_imagemanager_root.'/gfx/images.png" />') ?>
			</p>
			<p>
			<?php _e("Prior to using the ImageManager, you have to configure it by going through the <a href='#settings'>settings</a> on this page.","ImageManager"); ?>
			</p>
			<p>
			<?php _e("ImageManger supports the <a href='http://redalt.com/wiki/Role+Manager'>Role Manager</a> plugin. It adds the new capabilities, 'Make Directory' and 'Upload Files'.","ImageManager"); ?> <?php if (class_exists('RoleManager')) { ?><?php _e('If you use Role Manager, you will need to <a href="profile.php?page=role-manager/role-manager.php">assign</a> these capabilities to the various roles.','ImageManager'); ?><?php } else { ?><?php _e('If you use Role Manager, you will need to assign these capabilities to the various roles.','ImageManager'); ?><?php }?>
			</p>
			</fieldset>
			<p />
			<div style="clear:left"></div>
			<fieldset>
			<legend><?php _e("Credits","ImageManager"); ?></legend>
			<ul>
			<li><?php _e("<a href='http://www.zhuo.org/htmlarea/docs/index.html'>PHP ImageManager + Editor</a> by Xiang Wei Zhuo (xiangweizhuo(at)hotmail.com)","ImageManager"); ?></li>
			<li><?php _e("<a href='http://redalt.com/wiki/Buttonsnap'>buttonsnap class library</a> by <a href='http://asymptomatic.net'>Owen Winkler</a>","ImageManager"); ?></li>
			<li><?php _e("<a href='http://moofx.mad4milk.net'>moo.fx</a> by <a href='http://mad4milk.net'>Valerio Proietti</a>","ImageManager"); ?></li>
			<li><?php printf(__("The icon - %s - was provided by <a href='http://www.famfamfam.com/lab/icons/silk/'>famfamfam</a> under a Creative Commons Attribution 2.5 license","ImageManager"), '<img src="'.$ps_imagemanager_root.'/gfx/images.png" />') ?></li>
			</ul>
			</fieldset>
			<p />
			<div style="clear:left"></div>
			<fieldset>
			<legend>Copyright (c) 2006 Per Soderlind</legend>
			<p>
			The ImageManager plugin for WordPress and this configuration tool are licensed under the <a href="http://www.opensource.org/licenses/mit-license.php">MIT License</a>, Copyright 2006 <a href="http://www.soderlind.no/">Per Soderlind</a>
			</p>
			<p>
			Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
			</p>
			<p>
			The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
			</p>
			<p>
			THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. 
			</p>
			</fieldset>
			
	</form>
			<p style="float:right;padding-top:1em;">
			<?php _e("Go to:","ImageManager"); ?> <a href="#settings"><?php _e("Settings","ImageManager"); ?></a>&nbsp;|&nbsp;<a href="#optional"><?php _e("Optional settings","ImageManager"); ?></a>&nbsp;|&nbsp;<a href="#about"><?php _e("About","ImageManager"); ?></a>&nbsp;|&nbsp;<a href="#top"><?php _e("top","ImageManager"); ?></a>
			</p>

	<div style="clear:right"></div>

</div> <!-- id="imagemanager" -->
</div> <!-- class="wrap" -->

<?php } ?>
