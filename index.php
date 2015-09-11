<?php
	class ShopProduct{
		private $title;
		private $producer;
		private $price;
		private $discount = 0;
	
		public function __construct($title, $producer, $price){
			$this->title = $title;
			$this->producer = $producer;
			$this->price = $price;
		}

		public function getTitle(){
			return $this->title;
		}

		public function getProducer(){
			return $this->producer;
		}

		public function getPrice(){
			return $this->price;
		}
		
		public function setDiscount($num){
			$this->discount = $num;
		}

		public function getDiscount($num){
			return $this->discount;
		}

		public function getInfo(){
			$str  = "Наименование: ".$this->title."<br>";
			$str .= "Производитель: ".$this->producer."<br>";
			//$str .= "Цена: ".$this->price."<br>";
			return $str;
		}	
	}	
	
		class CDProduct extends ShopProduct{
			private $playLength = 0;

			public function __construct($title, $producer, $price, $playLength){
				parent::__construct($title, $producer, $price);
				$this->playLength = $playLength;
			}

			public function getInfo(){
				$str  = parent::getInfo();
				$str .= "Продолжительность звучания: ".$this->playLength."<br>";
				return $str;
			}

		}

		class bookProduct extends ShopProduct{
			private $pageCount = 0;

			public function __construct($title, $producer, $price, $pageCount){
				parent::__construct($title, $producer, $price);
				$this->pageCount = $pageCount;
			}

			public function getInfo(){
				$str  = parent::getInfo();
				$str .= "Количество страниц: ".$this->pageCount."<br>";
				return $str;
			}
		}		

	$newCD = new bookProduct("Made in Japan", "Deep Purple", 12.99, 65.32);
	print $newCD->getInfo();

?>
