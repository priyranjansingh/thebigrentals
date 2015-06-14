<?php
	
	class HomeFeaturedListing extends CWidget {

		public $city;
		public $state;
		public $country;

		public function run() {
			$condition = "";
			$featured = BaseModel::getAllWithCondition('','','','Property');
			$this->render('home');
		}

	}

?>