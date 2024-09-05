<?php
// Lo que esta pasando esque el codigo del archivo que estamos llamando se lo trae a este
include_once 'functions.php';
// Para solo requerirlo una vez podemos usar require_once asi si lo requerimos mas de una vez no tendremos errores

require_once 'NextMovie.php';

$next_movie = NextMovie::fetch_and_create_movie(API_URL);

$next_movie_data = $next_movie->get_data();

//var_dump($next_movie_data);

$untilMessage = $next_movie->get_until_message();

?>

<?php
  require 'templates/styles.php';
  render_template('head', ["title" => $next_movie_data["title"]]);
  render_template('main', array_merge(
    $next_movie_data,
    ["until_message" => $untilMessage]
  ));
?>


