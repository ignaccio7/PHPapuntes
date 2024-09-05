<body>
  <h1>Next Movie MCU</h1>
  <h3>Response:</h3>
  <pre>
		<?php var_dump($data); ?>
	</pre>

  <img src=" <?= $data["poster_url"]; ?> " alt="No se puedo renderizar la imagen">
  <hgroup>
    <h3> <?= $title;  ?> <?= $until_message; ?> .</h3>
    <p>Fecha de estreno: <?= $release_date; ?> </p>
  </hgroup>

  <h3>Para poder desplegar podemos usar zeabur</h3>
  <a href="https://zeabur.com" target="_blank">ZEABUR</a>

</body>