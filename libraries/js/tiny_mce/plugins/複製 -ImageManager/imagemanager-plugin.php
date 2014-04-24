<?php
/*
Plugin Name: ImageManager
Plugin URI: http://soderlind.no/ImageManager
Description: PHP ImageManager + Editor for WordPress. It will not be enabled until you have configured it via the <a href="options-general.php?page=imagemanager-plugin.php">Options &gt;&gt; ImageManager</a> menu. *** Requires Wordpress 2.0 *** Licensed under the <a href="http://www.opensource.org/licenses/mit-license.php">MIT License</a>.
Version: 2.3.6
Author: Per Soderlind
Author URI: http://soderlind.no
*/

require_once(ABSPATH . WPINC . '/class-snoopy.php');

function ps_imagemanager_info($show='') {
	switch($show) {
    case 'localeversion' :
    	$info = 236;
    	break;
    case 'remoteversion':
    	$info = 'http://soderlind.no/imagemanagerversion.txt';
     	break;
    case 'pluginname':
    	$info = 'ImageManager';
    	break;
     default:
     	$info = '';
     	break;
     }
    return $info;
}

function ps_imagemanager_remote_version_check() {
	if (class_exists(snoopy)) {
		$client = new Snoopy();
		$client->_fp_timeout = 10;
		if (@$client->fetch(ps_imagemanager_info('remoteversion')) === false) {
			return -1;
		}
	   	$remote = $client->results;
   		if (!$remote || strlen($remote) > 8 ) {
			return -1;
		}
		if (intval($remote) > intval(ps_imagemanager_info('localeversion'))) {
			return 1;
		} else {
			return 0;
		}
	}
}


function ps_imagemanager_init() {
	global $buttonsnap, $ps_imagemanager_root;

	$atmp = parse_url(get_settings('siteurl') . '/wp-content/plugins/ImageManager');
	$ps_imagemanager_root = $atmp['path'];

	if (is_array(get_settings('ps_imagemanager_options')) ) {
		include_once(dirname(__FILE__) . "/lib/buttonsnap.php");
		$button_image = $ps_imagemanager_root . '/gfx/images.png';
		buttonsnap_separator();
		buttonsnap_jsbutton($button_image, 'ImageManager', 'openImageManager();');
	}
}


function ps_imagemanager_config() {
	global $ps_imagemanager_root;
	$msg = "";
	if(isset($_POST['imagemanager_option_subitted'])) {
		if (get_settings('ps_imagemanager_options') == '') {
			$msg = '<div id="message" class="updated fade"><p>' . __("Settings saved","ImageManager") . '</p></div>';
	  } else {
	  	$msg = '<div id="message" class="updated fade"><p>' . __("Settings updated","ImageManager") . '</p></div>';
		}
		// change \ to /   
		
		$_POST['IMConfig']['base_dir'] = str_replace( "\\\\", "/", $_POST['IMConfig']['base_dir']);
		$_POST['IMConfig']['base_url'] = str_replace( "\\\\", "/", $_POST['IMConfig']['base_url']);
		$_POST['IMConfig']['image_transform_lib_path'] = str_replace( "\\\\", "/", $_POST['IMConfig']['image_transform_lib_path']);
		
		// append '/' if it is missing
		$_POST['IMConfig']['base_dir'] = (strrchr($_POST['IMConfig']['base_dir'],'/') == '/') ? $_POST['IMConfig']['base_dir'] : $_POST['IMConfig']['base_dir'] . '/';
		$_POST['IMConfig']['base_url'] = (strrchr($_POST['IMConfig']['base_url'],'/') == '/') ? $_POST['IMConfig']['base_url'] : $_POST['IMConfig']['base_url'] . '/';
		$_POST['IMConfig']['image_transform_lib_path'] = (strrchr($_POST['IMConfig']['image_transform_lib_path'],'/') == '/') ? $_POST['IMConfig']['image_transform_lib_path'] : $_POST['IMConfig']['image_transform_lib_path'] . '/';
		update_option('ps_imagemanager_options',$_POST['IMConfig']);
	}

  $reset_to_default = false; // TODO: add "reset to 'factory settings' button" i.e.: $reset_to_default = true;
  $IMConfig = ($reset_to_default) ? '' : get_settings('ps_imagemanager_options');
  if ($IMConfig == '' ) {
  	if ($reset_to_default) {
  		delete_option('ps_imagemanager_options');
  	}
	  $IMConfig['base_dir'] =  str_replace( "\\", "/",ABSPATH)  . 'wp-content/uploads/';
	  $atmp = parse_url(get_settings('siteurl'));
	  $IMConfig['base_url'] = str_replace( "\\", "/",$atmp['path']) . '/wp-content/uploads/' ;
	  $IMConfig['image_class'] = (function_exists("gd_info")) ? 'GD' : '';
	  $IMConfig['image_transform_lib_path'] = (defined('PHP_BINDIR')) ?  str_replace( "\\", "/",PHP_BINDIR) : '';
	  $IMConfig['safe_mode'] = (ini_get('safe_mode') == "1" || strtolower(ini_get('safe_mode')) == "on") ? true : false;
	  $IMConfig['allow_new_dir'] = true;
	  $IMConfig['allow_upload'] = true;
	  $IMConfig['default_thumbnail'] = $ps_imagemanager_root .  '/img/default.gif';
	  $IMConfig['thumbnail_width'] = 96;
	  $IMConfig['thumbnail_height'] = 96;
	  $IMConfig['thumbnail_prefix'] = '.';
	  $IMConfig['thumbnail_dir'] = 	'.thumbs';
	  $IMConfig['validate_images'] = true;
	  $IMConfig['tmp_prefix'] = 	'.editor_';
	  $submit_button_text = __("Save settings");
	  $msg = '<div id="message" class="updated fade"><p>' . __("ImageManager will not be enabled until you have saved these settings","ImageManager") . '</p></div>';
	} else {
		if (($remote = ps_imagemanager_remote_version_check()) == 1) {
			$msg = '<div id="message" class="updated fade"><p><a href="http://soderlind.no/ImageManager">' . __("There is an ImageManager update available","ImageManager") . '</a></p></div>';
		}
		$submit_button_text = __("Update settings");
	}
	echo $msg;
	
	include_once(dirname(__FILE__) . "/configure/index.php");
}

function ps_imagemanager_admin() {
    if (function_exists('add_options_page')) {
			add_options_page('ImageManager', 'ImageManager', 8, basename(__FILE__), 'ps_imagemanager_config');
    }
}

function ps_imagemanager_admin_head () {
	global $ps_imagemanager_root;

  if (strpos($_SERVER['REQUEST_URI'], 'options-general.php') !== false) {
	  echo "<script type='text/javascript' src='" . $ps_imagemanager_root . "/configure/lib/prototype.lite.js'></script>\n";
	  echo "<script type='text/javascript' src='" . $ps_imagemanager_root . "/configure/lib/moo.fx.js'></script>\n";
	  echo "<script type='text/javascript' src='" . $ps_imagemanager_root . "/configure/lib/smoothscroll.js'></script>\n";
	}

	if ((strpos($_SERVER['REQUEST_URI'], 'plugins.php') !== false) && (ps_imagemanager_remote_version_check() == 1)) {
		echo "<script type='text/javascript' src='" . $ps_imagemanager_root . "/lib/prototype-1.4.0.js'></script>\n";
		$alert = "\n";
		$alert .= "\n<script type='text/javascript'>";
		$alert .= "\n//<![CDATA[";
		
		$alert .= "\nfunction alertNewVersion() {";
		$alert .= "\n	pluginname = '" . ps_imagemanager_info('pluginname') . "';";
		$alert .= "\n	allNodes = document.getElementsByClassName('name');";
		$alert .= "\n	for(i = 0; i < allNodes.length; i++) {";
		$alert .= "\n			var regExp=/<\S[^>]*>/g;";
		$alert .= "\n	    temp = allNodes[i].innerHTML;";
		$alert .= "\n	    if (temp.replace(regExp,'') == pluginname) {";
		$alert .= "\n		    Element.setStyle(allNodes[i].getElementsByTagName('a')[0], {color: '#f00'});";
		$alert .= "\n		    new Insertion.After(allNodes[i].getElementsByTagName('strong')[0],'<br/><small>" .  __("new version available","ImageManager") . "</small>');";
		$alert .= "\n	  	}";
		$alert .= "\n	}";
		$alert .= "\n}";
		
		$alert .= "\naddLoadEvent(alertNewVersion);";
		
		$alert .= "\n//]]>";
		$alert .= "\n</script>";
		$alert .= "\n";
		echo $alert;
	}
	
  if (is_array(get_settings('ps_imagemanager_options')) && (strpos($_SERVER['REQUEST_URI'], 'post.php') || strpos($_SERVER['REQUEST_URI'],'page-new.php'))) {

		echo "<script type='text/javascript' src='" . $ps_imagemanager_root . "/assets/dialog.js'></script>\n";
		echo "<script type='text/javascript' src='" . $ps_imagemanager_root . "/imestandalone.js'></script>\n";
		
		$imgoptions = get_settings('ps_imagemanager_options');
		$thumbdir  = $imgoptions['thumbnail_dir'];
		$thumbprefix = $imgoptions['thumbnail_prefix'];
				
		$prepend_thumb = (empty($thumbdir)) ? $thumbprefix : $thumbdir . '/' . $thumbprefix;
		echo <<<MANAGER
		<script type="text/javascript">
		//<![CDATA[		
			var manager = new ImageManager('$ps_imagemanager_root','en');
			ImageSelector =
			{
				update : function(params)
				{
					var str = "";
					var thumbwidth = $imgoptions[thumbnail_width];
					var thumbheight = $imgoptions[thumbnail_height];					
					
					if (params.f_url != null) {
					
						if (params.f_width > params.f_height) {
							thumbheight = Math.round(thumbwidth/params.f_width * params.f_height)
						} else if (params.f_height > params.f_width) {
							thumbwidth = Math.round(thumbheight/params.f_height * params.f_width)
						}
					
						switch (params.f_insert) {

							case '5': // Link to image
								str += '<a href="' + params.f_url + '"'; 
								str += ' rel="lightbox" ';								
								str += ' >';
								str += (params.f_alt) ? params.f_alt  : 'insert link text here';
								str += '</a>';
							break;

							case '4': // Thumbnail
								str += '<img src="' + params.f_thumb_url + '"';
								str += (params.f_alt) ? ' alt="' + params.f_alt +'"' : '';
								str += (params.f_alt) ? ' title="' + params.f_alt +'"' : '';
								str += (params.f_style) ? ' style="' + params.f_style +'"' : '';
								str += (params.f_class) ? ' class="' + params.f_class +'"' : '';								
								str += (params.f_align) ? ' align="' + params.f_align +'"' : '';
								str += ' width="' + thumbwidth +'"';
								str += ' height="' + thumbheight +'"';
								str += (params.f_horiz) ? ' hspace="' + params.f_horiz +'"' : '';
								str += (params.f_vert) ? ' vspace="' + params.f_vert +'"' : '';
								str += (params.f_border) ? ' border="' + params.f_border +'"' : '';
								str += ' />';
							break;

							case '3': // Thumbnail with link to Image
								str += '<a href="' + params.f_url + '"'; 
								str += ' rel="lightbox" ';								
								str += ' >';								
								str += '<img src="' + params.f_thumb_url + '"';
								str += (params.f_alt) ? ' alt="' + params.f_alt +'"' : '';
								str += (params.f_alt) ? ' title="' + params.f_alt +'"' : '';
								str += (params.f_style) ? ' style="' + params.f_style +'"' : '';
								str += (params.f_class) ? ' class="' + params.f_class +'"' : '';								
								str += (params.f_align) ? ' align="' + params.f_align +'"' : '';
								str += ' width="' + thumbwidth +'"';
								str += ' height="' + thumbheight +'"';
								str += (params.f_horiz) ? ' hspace="' + params.f_horiz +'"' : '';
								str += (params.f_vert) ? ' vspace="' + params.f_vert +'"' : '';
								str += (params.f_border) ? ' border="' + params.f_border +'"' : '';
								str += ' />';
								str += '</a>';
							break;
							
							case '2': // Thumbnail with PopUp
								str += '<a href="' + params.f_url + '"';
								str += " onclick=\"ps_imagemanager_popup(this.href,'" + params.f_alt + "','" + params.f_width + "','" + params.f_height + "');return false\" onfocus=\"this.blur()\"	";
								str += ' >';
								str += '<img src="' + params.f_thumb_url + '"';
								str += (params.f_alt) ? ' alt="' + params.f_alt +'"' : '';
								str += (params.f_alt) ? ' title="' + params.f_alt +'"' : '';
								str += (params.f_style) ? ' style="' + params.f_style +'"' : '';
								str += (params.f_class) ? ' class="' + params.f_class +'"' : '';								
								str += (params.f_align) ? ' align="' + params.f_align +'"' : '';
								str += ' width="' + thumbwidth +'"';
								str += ' height="' + thumbheight +'"';
								str += (params.f_horiz) ? ' hspace="' + params.f_horiz +'"' : '';
								str += (params.f_vert) ? ' vspace="' + params.f_vert +'"' : '';
								str += (params.f_border) ? ' border="' + params.f_border +'"' : '';
								str += ' />';
								str += '</a>';
							break;
						
							case '1': // Image
								str += '<img src="' + params.f_url + '"';
								str += (params.f_alt) ? ' alt="' + params.f_alt +'"' : '';
								str += (params.f_alt) ? ' title="' + params.f_alt +'"' : '';
								str += (params.f_style) ? ' style="' + params.f_style +'"' : '';
								str += (params.f_class) ? ' class="' + params.f_class +'"' : '';								
								str += (params.f_align) ? ' align="' + params.f_align +'"' : '';
								str += (params.f_width) ? ' width="' + params.f_width +'"' : '';
								str += (params.f_height) ? ' height="' + params.f_height +'"' : '';
								str += (params.f_horiz) ? ' hspace="' + params.f_horiz +'"' : '';
								str += (params.f_vert) ? ' vspace="' + params.f_vert +'"' : '';
								str += (params.f_border) ? ' border="' + params.f_border +'"' : '';
								str += ' />';
							break;
							
							default:
								str += '<img src="' + params.f_url + '"';
								str += (params.f_alt) ? ' alt="' + params.f_alt +'"' : '';
								str += (params.f_alt) ? ' title="' + params.f_alt +'"' : '';
								str += (params.f_style) ? ' style="' + params.f_style +'"' : '';
								str += (params.f_class) ? ' class="' + params.f_class +'"' : '';								
								str += (params.f_align) ? ' align="' + params.f_align +'"' : '';
								str += (params.f_width) ? ' width="' + params.f_width +'"' : '';
								str += (params.f_height) ? ' height="' + params.f_height +'"' : '';
								str += (params.f_horiz) ? ' hspace="' + params.f_horiz +'"' : '';
								str += (params.f_vert) ? ' vspace="' + params.f_vert +'"' : '';
								str += (params.f_border) ? ' border="' + params.f_border +'"' : '';
								str += ' />';
						}
						buttonsnap_settext(str);
					}
				},
				select : function()
				{
					manager.popManager(this);
				}
			};

			function openImageManager() {
				ImageSelector.select();
			}

		//]]>
		</script>

MANAGER;
		echo "\n";
	} // if (is_array(get_settings('ps_imagemanager_options')) && (strpos($_SERVER['REQUEST_URI'], 'post.php') || strpos($_SERVER['REQUEST_URI'],'page-new.php')))
}


function ps_imagemanager_wp_head() {

echo<<<NEWWIN
		<script type="text/javascript">
		//<![CDATA[
		
			function basename (path) { return path.replace( /.*\//, "" ); }
	
			var winimg=null;
			function ps_imagemanager_popup(imgurl,title,w,h) {
				lpos=(screen.width)?(screen.width-w)/2:100;
				tpos=(screen.height)?(screen.height-h)/2:100;
				settings='width='+w+',height='+h+',top='+tpos+',left='+lpos+',scrollbars=no,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=yes';
				winimg=window.open('about:blank','imagemanagerpopup',settings);
	
				var doc = '';
				doc += '<html><head>';
				doc += '<title>' + title + ' - ' + basename(imgurl) + '(' + w + 'x' + h +')</title>';
				doc += '<style type="text/css"><!-- body { margin:0px; padding:0px; } --></style>';
				doc += '</head>';
				doc += '<body onload="self.focus();">';
				doc += '<img style="cursor:pointer;" src="' + imgurl + '" title="' + title + '" onclick="self.close();"/>';
				doc += '</body></html>';
				
				winimg.document.writeln(doc);
				winimg.document.close();
			}	
			
		//]]>
		</script>

NEWWIN;
}

function ps_imagemanager_add_capabilities($caps) {
	// remove old roles, if they exist
	unset($caps[array_search('ImageManager Upload', $caps)]);
	unset($caps[array_search('ImageManager MkDir', $caps)]);

	// add role
	$upload_files = array_search('upload_files', $caps); //Prior to PHP 4.2.0, array_search() returns NULL on failure instead of FALSE.
	if ($upload_files == FALSE || $upload_files == NULL) {
		$caps[] = 'upload_files';
	}
	$make_directory = array_search('make_directory', $caps);
	if ($make_directory == FALSE || $make_directory == NULL) {
		$caps[] = 'make_directory';
	}
	$edit_image = array_search('edit_image', $caps);
	if ($edit_image == FALSE || $edit_image == NULL) {
		$caps[] = 'edit_image';
	}	
	$delete_image = array_search('delete_image', $caps);
	if ($delete_image == FALSE || $delete_image == NULL) {
		$caps[] = 'delete_image';
	}
	return $caps;
}

function ps_imagemanager_disable_wpupload($uploading_iframe_src) {
	if (is_array(get_settings('ps_imagemanager_options')) && array_key_exists('wpupload_disabled', get_settings('ps_imagemanager_options')) ) {
		$atmp = get_settings('ps_imagemanager_options');
		if ($atmp['wpupload_disabled'] == 'true') {
			return "";
		} else {
			return $uploading_iframe_src;
		}
	} else {
		return $uploading_iframe_src;
	}
}

add_action('wp_head','ps_imagemanager_wp_head');
add_action('init', 'ps_imagemanager_init');
add_action('admin_head', 'ps_imagemanager_admin_head');
add_action('admin_menu', 'ps_imagemanager_admin');
add_filter('capabilities_list', 'ps_imagemanager_add_capabilities');
add_filter('uploading_iframe_src','ps_imagemanager_disable_wpupload');

?>