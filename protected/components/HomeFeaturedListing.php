<?php
	class HomeFeaturedListing extends CWidget {

		public function run() {
			
			$output = ip_info('1.23.154.25','location',true);
			$city = $output['city'];
			$state = $output['state'];
			$country = $output['country'];
			
			$primary_condition = "p.is_featured = 'Y' AND p.city LIKE '%$city%' AND p.state LIKE '%$state%' AND p.country LIKE '%$country%'";
			$secondary_condition = "p.is_featured = 'Y' AND p.state LIKE '%$state%' AND p.country LIKE '%$country%'";
			$ternary_condition = "p.is_featured = 'Y' AND p.country LIKE '%$country%'";
			$worst_condition = "p.is_featured = 'Y'";
			
			$count_query = "SELECT COUNT(*) as p_count FROM `property` p LEFT JOIN property_gallery pg ON p.id = pg.property WHERE ";
			$select_query = "SELECT p.id,p.title,p.city,p.state,p.country,p.slug,pg.image FROM `property` p LEFT JOIN property_gallery pg ON p.id = pg.property WHERE ";
			
			$primary_c_sql = $count_query.$primary_condition;
			$primary_c_result = BaseModel::executeSimpleQuery($primary_c_sql);
			// pre($primary_c_result,true);
			if($primary_c_result[0]['p_count'] > 0){
				$sql = $select_query.$primary_condition." LIMIT 20";
				$featured = BaseModel::executeSimpleQuery($sql);
			} else {
				$secondary_c_sql = $count_query.$secondary_condition;
				$secondary_c_result = BaseModel::executeSimpleQuery($secondary_c_sql);
				if($secondary_c_result[0]['p_count'] > 0){
					$sql = $select_query.$secondary_condition." LIMIT 20";
					$featured = BaseModel::executeSimpleQuery($sql);	
				} else {
					$ternary_c_sql = $count_query.$ternary_condition;
					$ternary_c_result = BaseModel::executeSimpleQuery($ternary_c_sql);
					if($ternary_c_result[0]['p_count'] > 0){
						$sql = $select_query.$ternary_condition." LIMIT 20";
						$featured = BaseModel::executeSimpleQuery($sql);	
					} else {
						$worst_c_sql = $count_query.$worst_condition;
						$worst_c_result = BaseModel::executeSimpleQuery($worst_c_sql);
						if($worst_c_result[0]['p_count'] > 0){
							$sql = $select_query.$worst_condition." LIMIT 20";
							$featured = BaseModel::executeSimpleQuery($sql);	
						}
					}
				}
			}
			// pre($featured,true);
			$this->render('home',array("properties" => $featured));
		}

	}

?>