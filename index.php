<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Museo Regional San José</title>
<link rel="stylesheet" media="all" href="css.css" />
<link rel="stylesheet" media="all" href="lightgallery.css" />
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>	
<script src="js/js.js"></script>
<script type="text/javascript" src="js/lightgallery.js"></script>	
<link rel="stylesheet" href="map/leaflet.css" />
    <script src="map/leaflet.js"></script>
	<?php
			$conectar = require_once('conexion.php');

			?>
</head>
 
<body><div class="pic-wrapper">
	
<!-- Pantalla inicial -->	
	
  <div class="wrap-contenido">
	<h1 class="h1-home">¿Qué apellido<br>estás buscando?</h1>
	<h3 class="h3-home">Tocá la lupa<br>para comenzar</h3>
	<div class="wrap-search">
	<main>
		<input type="text" class="search" />
		<div id="cruz">
			<div class="line-1" ></div>
			<div class="line-2" ></div>
		</div>
</main>
		</div>
	  
	  <img src="img/top.svg" alt="Top" class="flecha-lupa" />
		</div>
	
  <div class="black-cover"></div>
  <figure class="pic-1"></figure>
  <figure class="pic-2"></figure>
  <figure class="pic-3"></figure>
  <figure class="pic-4"></figure>
  <figure class="pic-5"></figure>
  <figure class="pic-6"></figure>
	
<!-- FIN inicial -->	
	
<!-- Resultados búsqueda -->	
	
  <section class="resultados">
			
			<?php
				//conecto la bd
				$conexion = $conectar;
				//asigno la variable principal
				$salida = "" ;
				//creo el query con el limite total, para scrollear
				$query = "SELECT * FROM datos ORDER BY id LIMIT 750";

				//compruebo la consulta
				if(isset($_POST['consulta'])){
					$q=$conexion->real_escape_string($_POST['consulta']);
					//asigno la consulta en base a la letra apretada
					$query = "SELECT * FROM datos WHERE apellido LIKE '%" .$q. "%' OR nombre LIKE '%" .$q."'";
					
					
				}
				
				//paso la query a la conexion
				$resultado=$conexion->query($query);
				//variable para mostrar en el caso de que no exista apellido
				$noHay = "No hay resultados con ese apellido";
				
				//compruebo si las filas afectadas son mayores que 0
				if($resultado->num_rows > 0){
					
					
						

					// a la variable principal le asigno el ul y el id para generar el scroll
					$salida.= "<ul id='ulScroll'><ul>";


					//mientras haya datos los asigna a la variable salida y los va iterando

					while($fila = $resultado->fetch_assoc()){
					
						$salida.= "<li class='resultado' class='muestraPerfil'><a class='resultadoPersona' id='".$fila['id']."' >" .$fila['nombre']. " " .$fila['apellido']. "</a></li>";
						
					}
					
					}else{
						//si no hay un apellido que coincida con las letras apretadas se le asigna la variable antes inicializada y se muestra 
						$salida.= "<ul><li class='resultadoPersona'>". $noHay . "</li></ul>"; 
					}   

				
					//salida
				echo $salida;
				
				



			?>
</section>
		
				
		
	
<!-- FIN Resultados búsqueda -->	
	
<!-- Perfil persona -->	
	
	<div class="perfil-persona">
		
		<div class="navegador">
			<img src="img/back.svg" alt="Atrás" class="back"/>
			<img src="img/close.svg" alt="Cerrar" id="close" onClick="document.location.reload(true)"/>
		</div>


<h1 class="h1-perfil-persona"></h1>
		<ul class="info-persona">
			<li>Cónyuge: <strong class="infoConyugue"></strong></li>
			<li>Edad: <strong class="infoEdad"></strong></li>
			<li>Hijos: <strong class="infoHijos"></strong> </li>
			<li>Profesión: <strong class="infoProfesion"></strong> </li>
			<li>Partió a San José en: <strong class="infoPartida"></strong></li>
		
		</ul>
		<ul class="info-procedencia">
			<li><h2>País</h2>
				<span class="ubicacion-btn" id="infoPais"></span>
			</li>
			<li><h2>Comuna</h2>
				<span class="ubicacion-btn" id="infoComuna"></span>
			</li>
			<li><h2>Región</h2>
				<span class="ubicacion-btn" id="infoRegion"></span>
			</li>
		
		</ul>
		
		<!-- Mapa -->
		
		 <div id="mapid"></div>
<script>

	var mymap = L.map('mapid').setView([46.21135, 7.3982], 5);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		minZoom: 1,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

	//obtener los datos localstorage

	lon = localStorage.getItem("lon");
	lat = localStorage.getItem("lat");
	comuna = localStorage.getItem("comuna");
	pais = localStorage.getItem("pais");

	console.log("pais: " + pais + " comuna: " + comuna + " lat: " + lat + " lon: " + lon);
	
	var marker = L.marker([lat, lon]).addTo(mymap);
	marker.bindTooltip(comuna + "-" + pais).openTooltip();
	
	


	


	
		//-32.21263320767636
		//-58.21994502077426
	var marker = L.marker([ lat, lon]).addTo(mymap);
	marker.bindTooltip("Estás aquí").openTooltip();
	

</script>
		
		<!-- FIN mapa -->
		
		<!-- Galería fotos -->
		
		<div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                <li class="col-xs-6 col-sm-4 col-md-3" data-src="img/gallery/vex-01.jpg" data-sub-html="<h4>Cantón de Valais 1</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>" >
                    <a href="">
                        <img class="img-responsive" src="img/gallery/vex-01.jpg" alt="Thumb-1">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-src="img/gallery/vex-02.jpg" data-sub-html="<h4>Cantón de Valais 2</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/vex-02.jpg" alt="Thumb-2">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-src="img/gallery/vex-03.jpg" data-sub-html="<h4>Cantón de Valais 3</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/vex-03.jpg" alt="Thumb-3">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-src="img/gallery/vex-04.jpg" data-sub-html="<h4>Cantón de Valais 4</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/vex-04.jpg" alt="Thumb-4">
                    </a>
                </li>
				<li class="col-xs-6 col-sm-4 col-md-3" data-src="img/gallery/vex-05.jpg" data-sub-html="<h4>Cantón de Valais 4</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/vex-05.jpg" alt="Thumb-4">
                    </a>
                </li>
				<li class="col-xs-6 col-sm-4 col-md-3" data-src="img/gallery/vex-06.jpg" data-sub-html="<h4>Cantón de Valais 4</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/vex-06.jpg" alt="Thumb-4">
                    </a>
                </li>
            </ul>
        </div>
        <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>

        <script>
            lightGallery(document.getElementById('lightgallery'));
        </script>
		
		<!-- FIN Galería fotos -->
		
		
		
	</div>
	
<!-- FIN Perfil persona -->	
	
	
	<!-- Resultados búsqueda ubicación -->	
	
  <div class="resultados-ubicacion">
	  
	  <div class="navegador"><img src="img/back.svg" alt="Atrás" class="back-ubicacion"/> <img src="img/close.svg" alt="Cerrar" id="close" onClick="document.location.reload(true)"/></div>
	  
<h1 class="h1-perfil-persona-lugar">Otras personas de...</h1>
	  <ul class="info-procedencia">
			<li><h2>País</h2>
			<span class="ubicacion-btn" id="infoPais-lugar"></span>
			</li>
			<li><h2>Comuna</h2>
			<span class="ubicacion-btn" id="infoComuna-lugar"></span>
			</li>
			<li><h2>Región</h2>
			<span class="ubicacion-btn" id="infoRegion-lugar"></span>
			</li>	
		</ul>
		
	
		<section class="resultados-lugar">
			
			<?php


				

				//conecto la bd
				$conexion = $conectar;
				//asigno la variable principal
				$salida = "" ;
				//creo el query con el limite total, para scrollear
				$query = "SELECT * FROM datos ORDER BY id LIMIT 750";

				
				
				//paso la query a la conexion
				$resultado=$conexion->query($query);
				//variable para mostrar en el caso de que no exista apellido
				$noHay = "No hay resultados con ese apellido";
				
				//compruebo si las filas afectadas son mayores que 0
				if($resultado->num_rows > 0){
					
					
						

					// a la variable principal le asigno el ul y el id para generar el scroll
					$salida.= "<ul id='ulScroll'><ul>";


					//mientras haya datos los asigna a la variable salida y los va iterando

					while($fila = $resultado->fetch_assoc()){
					
						$salida.= "<li class='resultado-ubicacion' class='muestraPerfil'><a class='resultadoPersona' id='".$fila['id']."' >" .$fila['nombre']. " " .$fila['apellido']. "</a></li>";
						
					}
					
					}else{
						//si no hay un apellido que coincida con las letras apretadas se le asigna la variable antes inicializada y se muestra 
						$salida.= "<ul><li class='resultadoPersona'>". $noHay . "</li></ul>"; 
					}   

				
					//salida
				echo $salida;
				
				



			?>
</section>
		
	
<!-- FIN Resultados búsqueda ubicación -->	
	

</div>
<script src="js/funciones_ajax.js">
	
</script>


</body>
</html>