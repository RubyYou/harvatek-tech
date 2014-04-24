/**
 * The ImageManager plugin javascript.
 * @author $Author: Wei Zhuo $
 * @version $Id: image-manager.js 26 2004-03-31 02:35:21Z Wei Zhuo $
 * @package ImageManager
 */

/**
 * To Enable the plug-in add the following line before HTMLArea is initialised.
 *
 * HTMLArea.loadPlugin("ImageManager");
 *
 * Then configure the config.inc.php file, that is all.
 * For up-to-date documentation, please visit http://www.zhuo.org/htmlarea/
 */

/**
 * It is pretty simple, this file over rides the HTMLArea.prototype._insertImage
 * function with our own, only difference is the popupDialog url
 * point that to the php script.
 */
function ImageManager(editor)
{
	var tt = ImageManager.I18N;	

};

ImageManager._pluginInfo = {
	name          : "ImageManager",
	version       : "1.0",
	developer     : "Xiang Wei Zhuo",
	developer_url : "http://www.zhuo.org/htmlarea/",
	license       : "htmlArea"
};


// Over ride the _insertImage function in htmlarea.js.
// Open up the ImageManger script instead.
HTMLArea.prototype._insertImage = function(image) {

	var editor = this;	// for nested functions
	var outparam = null;
	//alert((typeof image));
	if (typeof image == "undefined") {
		image = this.getParentElement();
		if (image && !/^img$/i.test(image.tagName))
			image = null;
	}
	if (image) outparam = {
		f_url    : HTMLArea.is_ie ? image.src : image.getAttribute("src"),
		f_alt    : image.alt,
		f_border : image.border,
		f_align  : image.align,
		f_vert   : image.vspace,
		f_horiz  : image.hspace,
		f_width  : image.width,
		f_height  : image.height
	};

	var manager = _editor_url + 'plugins/ImageManager/manager.php';

	Dialog(manager, function(param) {
		if (!param) {	// user must have pressed Cancel
			return false;
		}
		var img = image;
		var ImgType=param.f_url.substr((param.f_url.length)-3,3);
		if(ImgType=="swf"){
			var sel = editor._getSelection();
			var range = editor._createRange(sel);

			if(HTMLArea.is_ie){
					var swf='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="'+param.f_width+'" height="'+param.f_height+'"><param name="movie" value="'+param.f_url+'"><param name="quality" value="high"><embed src="'+param.f_url+'" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'+param.f_width+'" height="'+param.f_height+'"></embed></object>';
					range.pasteHTML(swf);
			}else{
				 var ddiv=editor._doc.createElement('div');			 
				 ddiv.setAttribute("style","width:800;height:127;background-color: #FFFFCC");
				 var obj = editor._doc.createElement('object');
				 obj.setAttribute('type','application/x-shockwave-flash'); 
				 obj.setAttribute('codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0'); 
				 obj.setAttribute('width',param['f_width']); 
				 obj.setAttribute('height',param['f_height']);
				 obj.setAttribute('data',param.f_url);
				 obj.setAttribute('classid',"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000");
				 var p_m = editor._doc.createElement('param');
				 p_m.setAttribute('name','movie');
				 p_m.setAttribute('value',param.f_url);
				 var p_m = editor._doc.createElement('param');
				 p_m.setAttribute('name','quality');
				 p_m.setAttribute('value',"high");
				 obj.appendChild(p_m);
				 var embed = editor._doc.createElement('embed'); 
				 embed.setAttribute('width',param['f_width']);
				 embed.setAttribute('height',param['f_height']);
				 embed.setAttribute('type','application/x-shockwave-flash');
				 embed.setAttribute('pluginspage','http://www.macromedia.com/go/getflashplayer');
				 embed.setAttribute('src',param.f_url); 
				 obj.appendChild(embed);				
				 ddiv.appendChild(obj);
			 	 editor.insertNodeAtSelection(ddiv);
			}
		}else{
				if (!img) {
					var sel = editor._getSelection();
					var range = editor._createRange(sel);
					editor._doc.execCommand("insertimage", false, param.f_url);
					if (HTMLArea.is_ie) {
						img = range.parentElement();
						// wonder if this works...
						if (img.tagName.toLowerCase() != "img") {
							img = img.previousSibling;
						}
					} else {
						img = range.startContainer.previousSibling;
					}
				} else {			
					img.src = param.f_url;
				}
				
				for (field in param) {
					var value = param[field];
					switch (field) {
						case "f_alt"    : img.alt	 = value; break;
						case "f_border" : img.border = parseInt(value || "0"); break;
						case "f_align"  : img.align	 = value; break;
						case "f_vert"   : img.vspace = parseInt(value || "0"); break;
						case "f_horiz"  : img.hspace = parseInt(value || "0"); break;
						case "f_width"  : img.width = parseInt(value || "0"); break;
						case "f_height"  : img.height = parseInt(value || "0"); break;
					}
				}
		}		
		
	}, outparam);
};


