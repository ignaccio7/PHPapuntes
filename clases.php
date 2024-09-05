<?php 
declare(strict_types = 1);

class SuperHero {
	// Para las propiedades
	/*public $name;
	public $powers;
	public $planet;
	public $level;*/

	/*public function __construct(){
		$this->name = "";
		$this->powers = "";
		$this->planet = "";
		$this->level = 0;
	}*/

	// Para los constructores
	/*public function __construct($name = "", $powers="", $planet="") {
		$this->name = $name;
		$this->powers = $powers;
		$this->planet = $planet;
		$this->level = 0;
	}*/

	// Enves de estar declarando los atributos en arriba y repitiendo en los constructores existe lo que son Promoted Properties php8 en la cual definimos los atributos en el mismo constructor pero los debemos declarar con el tipo
	public function __construct(
		private string $name = "",
		public string $powers = "",
		public string $planet = "",
		public array $powersArray = [],
		public int $level = 0,
	)
	{

	}


	// Para los metodos
	public function attack() {
		return "!$this->name ataca con sus poderes!";
	}

	// Para obtener de un objeto todas sus propiedades con sus tipo
	public function show_all() {
		return get_object_vars($this);
	}

	public function description() {
		// Para convertir un array a un string
		$arrayPowers = implode(", ", $this->powersArray);

		return "$this->name es un superheroe que viene de
		$this->planet y tiene los siguientes poderes:
		$this->powers <br/>
		Y los poderes en array: 
		$arrayPowers
		<br/>";
	}

	// Como creamos metodos estaticos - para crear un superheroe random
	public static function random() {
		$names = ["Thor","Spiderman","Wolverine","Ironman"];
		$powersArrays = [
			["Superfuerza","Volar","Rayos laser"],
			["Superfuerza","Super agilidad","Telarañas"],
			["Regeneracion","Cambio de tamaño","Garras"],
		];
		$planets = ["Asgard","Tierra","Krypton"];

		// array rand te devuelve una llave aleatoria del vector
		$name = $names[array_rand($names)];
		$powersArray = $powersArrays[array_rand($powersArrays)];
		$planet = $planets[array_rand($planets)];

		//echo "El super heroe elegido es: $name, que viene de $planet (y tiene los poderes: ". implode(",",$powersArray);
		// aqui podemos crear el objeto dentro enves del eco
		return new self($name, implode(", ", $powersArray), $planet, $powersArray);

	}

}

$hero = new SuperHero();
// $hero->name = "Batman"; nose puede acceder porque esta privado
$hero->powers = "Inteligencia, fuerza y tecnologia";
$hero->planet = "Tierra";

//echo $hero->name;
echo $hero->description();

$hero2 = new SuperHero("Superman", "Superfuerza y rayos laser", "krypton", ["SuperFuerza","Super rayos lazer", "Super velocidad"]);

echo $hero2->description();

echo "Con get_object_vars <br/>";
var_dump($hero2->show_all());

echo "<br/>";
echo "Funcion estatica <br/>";
//SuperHero::random();
$hero3 = SuperHero::random();

echo $hero3->description();

?>





















