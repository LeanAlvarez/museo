$(document).ready(function() {
		$('.search').click(function() {
				$('.search').addClass('active');
				$('.line-1').css({
						'transform': 'rotate(45deg)',
						'top': '0px',
						'left': '0px'
				});
				$('.line-2').css({
						'height':'40px',
						'opacity':'1'
				});
			/* Agregado */
			
			$('.h1-home').css({
						'opacity':'0',
				        'margin-top':'-150px'
				});
			
			$('.h3-home').css({
						'opacity':'0'
				});
			
			$('.resultados').css({
						'opacity':'1',
				        'margin-top':'50px'
				});
			
			
		/* Fin agregado */
		});
		$('.line-1, .line-2').click(function() {
				$('.search').removeClass('active').val('');
				$('.line-1').css({
						'transform': 'rotate(-45deg)',
						'top': '-20px',
						'left': '45px'
				});
				$('.line-2').css({
						'height':'0px',
						'opacity':'0'
				});
			
			/* Agregado */
			
			$('.h1-home').css({
						'opacity':'1',
				        'margin-top':'640px'
				});
			
			$('.h3-home').css({
						'opacity':'1'
				});
			
			$('.resultados').css({
						'opacity':'0',
				        'margin-top':'1000px'
				});
			
		/* Fin agregado */
			
			});
		
		/* Resultados */
			
			$('.resultado').click(function() {
				
				$('.resultados').css({
						'opacity':'0',
					    'margin-top':'-2400px'
				});
				
				$('.wrap-search').css({
						'opacity':'0',
					    'margin-top':'-2500px'
				});
				
				
				
				});
		/* Fin resultados */
	
	
	/* Resultados */
			
			$('.back').click(function() {
				
				$('.resultados').css({
						'opacity':'1',
					    'margin-top':'50px'
				});
				
				$('.wrap-search').css({
						'opacity':'1',
					    'margin-top':'0'
				});

				});
	
	
	/* Fin resultados */


		
});// JavaScript Document
