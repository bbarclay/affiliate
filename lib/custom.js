
(function($){

function copyToClipboard(element) {
  var $temp = jQuery("<input>");

  jQuery("body").append($temp);
  		$temp.val(jQuery(element).text()).select();
  		document.execCommand("copy");
  		$temp.remove();
}	

function getClipboard() {

	var link = $('.share-link .clipboard').text();
	$('.clipping').text(link);
}
getClipboard();


function getAfflink() {

	var link = $('.share-link .clipboard').text();
	var btn = $('.share-info .tabcontent');
	
	btn.each(function(){
			var text = $(this).find('a').attr('href');

			var res = text.replace('***', link);
			console.log(res);
	});
	


	

}
getAfflink();


})(jQuery);