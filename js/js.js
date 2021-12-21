$(document).ready(function() {

	


	// //evento para obtener la tecla presionada por el usuario en el input
	// $(".search").keyup(function(e) {
	// 	//obtenemos el valor del input
	// 	var value = $(this).val();
	// 	//muestro el valor del input en un console.log
	// 	console.log(value);

	// });

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
			
			$('.flecha-lupa').css({
						'opacity':'0',
				        'heigt':'0',
				        'width':'0',
				        'animation-name':'none',
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
				location.reload();
				//$('.search').removeClass('active').val('');
				$('.line-1').css({
						'transform': 'rotate(-45deg)',
						'top': '-20px',
						'left': '45px'
				});
				$('.line-2').css({
						'height':'0px',
						'opacity':'0'
				//refrescamos la pagina
				

				});
			
			/* Agregado */
			
			$('.h1-home').css({
						'opacity':'1',
				        'margin-top':'640px'
				});
			
			setTimeout(() =>{ $('.flecha-lupa').css({
						'opacity':'1',
				        'heigt':'100px',
				        'width':'100px',
				        'animation-name':'flechaanimada',
				}); }, 300);
			
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


				//resultados busqueda
				$('.resultados').click(function() {
				
					$('#resultados').css({
							'opacity':'0',
							'margin-top':'-2400px'
					});
					
					$('.wrap-search').css({
							'opacity':'0',
							'margin-top':'-2500px'
					});
					
					
					
					});
				

			//obtener el id seleccionado de la seccion resultados y mostrarlo en el console.log
			$('.resultadoPersona').click(function() {
				var id = $(this).attr('id');
				console.log(id);

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

	
		/* Resultados ubicación */
			
			$('.ubicacion-btn').click(function() {
				
				$('.perfil-persona').css({
						'opacity':'0',
					    'margin-top':'0'
				});
				
				$('.resultados-ubicacion').css({
						'opacity':'1',
					    'margin-top':'300px'
				});

				});
	
	
		$('.resultado-ubicacion').click(function() {
				
				$('.perfil-persona').css({
						'opacity':'1',
					    'margin-top':'2000px'
				});
				
				$('.resultados-ubicacion').css({
						'opacity':'0',
					    'margin-top':'0'
				});

				});
	
	
		$('.back-ubicacion').click(function() {
				
				$('.perfil-persona').css({
						'opacity':'1',
					    'margin-top':'2000px'
				});
				
				$('.resultados-ubicacion').css({
						'opacity':'0',
					    'margin-top':'0'
				});

				});
	
	
	
	/* Fin resultados ubicación */
	
	
	/* Arrastre imágenes */
	
	$("img").mousedown(function(e){
    e.preventDefault()
});

	/* FIN arrastre imágenes */



//si apretamos la cruz de cerrar, se refresca la página
// $('#cruz').click(function(){
// 	location.reload();
// });


//si input resultado esta vacio,


		
});// JavaScript Document
