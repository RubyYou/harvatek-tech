tinyMCE.importPluginLanguagePack('upload','en');
var TinyMCE_TemplatePlugin={
getInfo:function(){
	return{
		longname:'upload plugin',author:'Your name',
		authorurl:'http://www.yoursite.com',
		infourl:'http://www.yoursite.com/docs/template.html',
		version:"1.0"};
},
initInstance:function(inst){
	alert("Initialization parameter:"+tinyMCE.getParam("template_someparam",false));
	inst.addShortcut('ctrl','t','lang_template_desc','mceTemplate');
},
getControlHTML:function(cn){
	switch(cn){
	case"upload":
		return tinyMCE.getButtonHTML(cn, 'lang_upload_desc', '{$pluginurl}/images/template.gif', 'mceUpload', true);
	}
	return"";
},
execCommand:function(editor_id,element,command,user_interface,value){
	switch(command){
		case"mceUpload":
			 var template = new Array();
			template['file'] = '../../plugins/upload/popup.php';                                                
			template['width'] = 480;
			template['height'] = 380;
			tinyMCE.openWindow(template, {editor_id : editor_id});
			tinyMCE.triggerNodeChange(false);
			return true;
		}
		return false;
	},
	handleNodeChange:function(editor_id,node,undo_index,undo_levels,visual_aid,any_selection){
	tinyMCE.switchClass(editor_id + '_upload', 'mceButtonNormal');
},
setupContent:function(editor_id,body,doc){},
onChange:function(inst){},
handleEvent:function(e){top.status="template plugin event: "+e.type;return true;},
cleanup:function(type,content,inst){switch(type){case"get_from_editor":alert("[FROM] Value HTML string: "+content);break;case"insert_to_editor":alert("[TO] Value HTML string: "+content);break;case"get_from_editor_dom":alert("[FROM] Value DOM Element "+content.innerHTML);break;case"insert_to_editor_dom":alert("[TO] Value DOM Element: "+content.innerHTML);break;}return content;},
_someInternalFunction:function(a,b){return 1;}};tinyMCE.addPlugin("upload",TinyMCE_TemplatePlugin);