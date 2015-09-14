<?php
	require_once("db_conn.php");

	class ShopProduct{
		private $title;
		private $producer;
		private $price;
		private $discount = 0;
		private $id;
	
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

		public function getDiscount(){
			return $this->discount;
		}

		public function setID($id){
			$this->id = $id;
		}		

		public function getInfo(){
			$str  = "Наименование: ".$this->title."<br>";
			$str .= "Производитель: ".$this->producer."<br>";
			//$str .= "Цена: ".$this->price."<br>";
			return $str;
		}

		public static function getInstance($id, $link){
			$sql = "SELECT * FROM maintable WHERE id='%d'";
			$query = sprintf($sql, $id);
			$result = mysqli_query($link, $query);
			$row = mysqli_fetch_array($result);

			if(empty($row)) return false;

			if($row['type'] == "book"){
				$product = new bookProduct(
									$row['title'],
									$row['producer'],
									$row['price'],
									$row['pageCount']);
			}else if($row['type'] == "cd"){
				$product = new CDProduct(
									$row['title'],
									$row['producer'],
									$row['price'],
									$row['playLength']);				
			}else{
				$product = new ShopProduct(
									$row['title'],
									$row['producer'],
									$row['price']);				
			}

			$product->setID($row['id']);
			$product->setDiscount($row['discount']);
			return $product;
			echo "</br>";
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

	class ShopProductWriter{
		private $products = array();

		public function addProduct(ShopProduct $ShopProduct){
			$this->products[] = $ShopProduct;
		}

		public function write(){
			$str = "";
			foreach ($this->products as $shopProduct) {
				$str .= $shopProduct->getTitle().": ";
				$str .= $shopProduct->getProducer();
				$str .= " ({$shopProduct->getPrice()})\n";
				//print_r($shopProduct);
			}

			print $str;
		}
	}			

	/*$newCD = new bookProduct("Made in Japan", "Deep Purple", 12.99, 65.32);
	print $newCD->getTitle();
	$newCD->setDiscount(13);
	print $newCD->getDiscount();*/

	$a1 = ShopProduct::getInstance(2, $link);
	$a2 = ShopProduct::getInstance(1, $link);
	$a3 = ShopProduct::getInstance(1, $link);

	$wrt = new ShopProductWriter;
	$wrt->addProduct($a1);
	$wrt->addProduct($a2);
	$wrt->write();

?>
