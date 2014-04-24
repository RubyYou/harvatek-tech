/*
 * @main
 * @author Nick
 */

function callalert(str) {
    alert('★★★★★★\n\n'+str+'\n★★★★★★');
}

function treeHideShow(id,id2){
	 if($('#'+id).css('display') =='none'){
	     $('#'+id2).attr('src','images/minusik.gif');	
		 $('#'+id).css('display','');
	 }else{
	     $('#'+id2).attr('src','images/plusik.gif');
		 $('#'+id).css('display','none');
	 }
}
function treeHideShow2(id,id2){
        if($('#'+id).css('display') =='none'){
	     $('#'+id2).attr('src','images/minusik_L.gif');	
		 $('#'+id).css('display','');
	 }else{
	     $('#'+id2).attr('src','images/plusik_L.gif');
		 $('#'+id).css('display','none');
	 }
}