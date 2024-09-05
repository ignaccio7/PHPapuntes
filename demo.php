<?php
// Lo que esta pasando esque el codigo del archivo que estamos llamando se lo trae a este
include_once 'functions.php';
include_once 'functions.php';
// Para solo requerirlo una vez podemos usar require_once asi si lo requerimos mas de una vez no tendremos errores

/**
 * La diferencia entre el include y el require esque si el include no encuentra el archivo la aplicacion no petara y solo te mostrara un warning
 */

$data = get_data(API_URL);

$untilMessage = get_until_message($data["days_until"]);

?>

<?php
  require 'templates/styles.php';
  render_template('head', $data);
  render_template('main', array_merge(
    $data,
    ["until_message" => $untilMessage]
  ));
?>


