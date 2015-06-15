<?php

class Menus{
	
	private $cat_id;
	private $tree = array();
	
	public function __construct($id = '0')
	{
		$this->cat_id = $id;
		$q = mysql_connect('localhost', 'root', '');
		mysql_select_db('bigrentals', $q);
	}
	
	public function getCats()
	{
		$sql = 'SELECT id,name,parent_id,url FROM menu WHERE parent_id = "'.$this->cat_id.'" order by `order`  ';
		$q = mysql_query($sql);
		return $this->result($q);
	}
	
	private function result($resource)
	{
		$arr = array();
		while($data = mysql_fetch_object($resource))
		{
			$arr[] = $data;
		}
		return $arr;
	}
	
	public function buildTree($key = 0)
	{
		$arr = $this->getCats();
                
	        $current_key = (count($this->tree)> 0)?max(array_keys($this->tree)):0;
	         
		if(count($this->tree)> 0 && !array_key_exists('children', $this->tree[$current_key]))
		{
			$this->tree[$current_key]->children = $arr;
		}
                
		foreach($arr as $k => $v)
		{
                        
			$this->cat_id = $v->id;
  		        $this->tree[] = $v;
			$this->buildTree();
  		}
	    //Finalizing the array.......
		foreach($this->tree as $k => $v)
		{
			if($v->parent_id != '0')
			{
				unset($this->tree[$k]);
			}
		}
           
		return $this->tree;
	}
        
}


