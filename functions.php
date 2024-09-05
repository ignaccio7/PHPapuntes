<?php

declare(strict_types=1); // esto se pone en el inicio de cada archivo es a nivel de archivo
// Si queremos que nos reestringa de  manera estricta

const API_URL = "https://whenisthenextmcufilm.com/api";

?>

<!-- Como hacemos funciones en php -->
<?php
/*
    En PHP lo que manejan generalmente son funciones con snake case
    Esto significa que las palabras se separan con guion bajo
    Ejemplo: get_user_info 
    como lo podemos ver en el file_get_contents  
    pero tambien funciona el camerCase como ser getUserInfo
   */
// function get_data($url)
// Podemos añadir tipos opcionales

// NOTA: Las variables definidas dentro de la funcion solo pudieran ser usadas dentro de la misma
// Y tampoco puedes acceder a variables globales osea que esten definidas fuera de la funcion
// Para usarla la podemos pasar como parametro o bien indicandola como global
$title = "Hola";

function get_data(string $url)
{
  global $title;

  // Una alternativa seria utilizar file_get_contents(API_URL)
  $result = file_get_contents($url);

  $data = json_decode($result, true); // convertimos con esto a un array asociativo de php
  return $data;
}



function get_until_message(int $days): string
{
  return match (true) {
    $days === 0 => "Hoy se estrena",
    $days === 1 => "Mañana se estrena",
    $days <= 7 => "Esta semana se estrena",
    default => "$days dias hasta el estreno",
  };
}


function render_template(string $template, array $data = []) {
  // con el metodo extract hacemos que todas las variables que se encuentren en el array $data se vuelvan variables locales en la funcion
  extract($data);
  
  require "templates/$template.php";
}

?>