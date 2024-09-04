<?php 
	$name = 'Nestor';
	$age = 26;
	$isDev = true;

	$isOld = $age > 40;

	if($isOld) {
		echo "<h2>Eres viejo</h2>";
	}else if($isDev) {
		echo "<h2>Eres dev</h2>";		
	}else{
		echo "<h2>Eres joven</h2>";		
	}

	/*Otra manera de definir constantes*/
	define('LOGO_URL', "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4UEqKmemOWxpXkepqlKidQHvkAOP3nTMcGw&s");

	$output = "Hola $name , con una edad de $age";

?>

<h3> <?= $output; ?> </h3>

<!--Otra manera de hacer un sistema de plantillas -->
<?php if($isOld) : ?>
	<h2>Eres viejo</h2>
<?php elseif ($isDev) : ?>
	<h2>Eres dev</h2>
<?php else: ?>
	<h2>Eres joven</h2>
<?php endif; ?>

<!--Tambien se puede ternarias-->
<?php 
	$output = $isOld
		? 'Eres viejo'
		: 'Eres joven';
?>

<!-- Enves de usar el SWITCH podemos hacer uso del MATCH -->
<?php 
	
	//Enves de true podria entrar la variable que nosotros quisieramos comparar. Le ponemos true porque evaluara cual condicion es verdadera en vase a las condicionales
	$outputAge = match(true) {
		$age < 2 => "Eres un bebe $name",
		$age <= 18 => "Eres joven $name",
		default => "Estas viejo $name",
	}

?>

<h2> <?= $outputAge; ?> </h2>


<!-- Ahora los Arrays -->
<?php 
	$bestLanguages = ["PHP", "JavaScript","Java",1,true];
	// Para hacer un push
	$bestLanguages[] = "Python";
	$bestLanguages[3] = "TypeScript";
?>

<h3>
	Los lenguajes que podemos ver son:
	<?php 
		//var_dump($bestLanguages);
	?>
</h3>
<ul>
	<?php foreach ($bestLanguages as $key => $language) : ?>
		<li> <?= $language; ?> </li>			
	<?php endforeach; ?>
</ul>

<!-- Como creamos un diccionario o un array asociativo -->
<?php 
	$person = [
		"name" => "Nestor",
		"age" => 26

	];
	echo $person["name"];
?>

<!-- Como hacemos una peticion a una api -->
<?php 
	
	const API_URL = "https://whenisthenextmcufilm.com/api";

	// Inicializar una nueva sesion cURL; ch = cURL handle
	$ch = curl_init(API_URL);
	// Indicamos que queremos rescribir el resultado de la peticion y no mostrarla en pantalla sino obtenerla
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	/*
	Ejecutamos la peticion
	y guardamos el resultado
	*/
	$result = curl_exec($ch);

	// Una alternativa seria utilizar file_get_contents(API_URL)
	// $result = file_get_contents(API_URL)

	$data = json_decode($result, true); // convertimos con esto a un array asociativo de php

	curl_close($ch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MCU Next movie</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

	<style type="text/css">
		*,*::before,*::after {
			box-sizing: border-box;
		}
		html{
			box-sizing: inherit;
			font-family: sistem-ui, sans-serif;
		}
		body{
			margin: 0;
			padding: 0;
			text-align: center;
		}
		pre{
			width: 800px;
			height: auto;
			margin: auto;
			font-size: .8rem;
			text-align: left;
		}
	</style>
</head>
<body>
	<img src="<?= LOGO_URL; ?>" alt="Logo de php" width="100" height="50">
	<h1>Next Movie MCU</h1>
	<h3>Response:</h3>
	<pre>
		<?php var_dump($data); ?>
	</pre>

	<img src=" <?= $data["poster_url"]; ?> " alt="No se puedo renderizar la imagen">	
	<hgroup>
		<h3> <?= $data["title"];  ?> se estrena en <?= $data["days_until"]; ?> dias.</h3>
		<p>Fecha de estreno: <?= $data["release_date"]; ?> </p>
	</hgroup>

	<h3>Para poder desplegar podemos usar zeabur</h3>
	<a href="https://zeabur.com" target="_blank">ZEABUR</a>

</body>
</html>