$(document).ready(function() {
						   
	var hash = window.location.hash.substr(1);
	var href = $('#menu li a').each(function(){
		var href = $(this).attr('href');
		if(hash==href.substr(0,href.length-5)){
			var toLoad = hash+'.html #contenido-central';
			$('#contenido-central').load(toLoad)
		}											
	});

	$('#menu li a').click(function(){
								  
		var toLoad = $(this).attr('href')+' #contenido-central';
		$('#contenido-central').hide('fast',loadContent);
		$('#load').remove();
		$('#marco').append('<span id="load">LOADING...</span>');
		$('#load').fadeIn('normal');
		window.location.hash = $(this).attr('href').substr(0,$(this).attr('href').length-5);
		function loadContent() {
			$('#contenido-central').load(toLoad,'',showNewContent())
		}
		function showNewContent() {
			$('#contenido-central').show('normal',hideLoader());
		}
		function hideLoader() {
			$('#load').fadeOut('normal');
		}
		return false;
		
	});
});