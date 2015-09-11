<?php
/*class StaticExample{
	static public $num = 1;
	
	static public function sayHello(){
		StaticExample::$num += 5;
		echo "Hello".StaticExample::$num;
	}

	public function getNum(){
		echo self::$num;
	}
}

//StaticExample::sayHello();
$asd = new StaticExample();
$asd->getNum();*/

$db = sqlite_open("my_database.db");
print_r($db);

?>