<?php
	class ShopProduct{
		public $title;
		public $producer;
		public $price;
	
		function __construct($title, $producer, $price){
			$this->title = $title;
			$this->producer = $producer;
			$this->price = $price;
		}

		function getInfo(){
			$str  = "Наименование: ".$this->title."<br>";
			$str .= "Производитель: ".$this->producer."<br>";
			$str .= "Цена: ".$this->price."<br>";
			return $str;
		}
	}	
	

		class CDProduct extends ShopProduct{
			public $playLength;

			public function __construct($title, $producer, $price, $playLength){
				parent::__construct($title, $producer, $price);
				$this->playLength = $playLength;
			}

			function getInfo(){
				$str  = parent::getInfo();
				$str .= "Продолжительность звучания: ".$this->playLength."<br>";
				return $str;
			}

		}

	$newCD = new CDProduct("Made in Japan", "Deep Purple", 12.99, 65.32);
	print $newCD->getInfo();

?>
