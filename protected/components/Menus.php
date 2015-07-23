<?php

class Menus {

    private $initial_array = array();
    private $final_array = array();

    public function __construct() {
        
    }
    
    public function getMenu()
    {
        $this->initial_array = $this->getResult();    // initialization of initial array
        $this->final_array = $this->initial_array;  // initialization of final array
        $this->initial($this->initial_array);
        return $this->final_array;
    }        

    public function getResult($id = 0) {
        $arr = array();
        $sql = 'SELECT id,name,parent_id,url FROM menu WHERE parent_id = "'.$id.'" order by `order`  ';
        $arr = BaseModel::executeSimpleQuery($sql);
        $new_arr = array();
        foreach($arr as $key => $val)
        {
            $new_arr[$val['id']] = $val; 
        }    
        return $new_arr;
    }

    public function initial($initial_array) {
        foreach ($initial_array as $key => $val) {
            $arr = $this->getResult($val['id']);
            $keypath = array_reverse($this->getkeypath($this->final_array, $key));  // getting the keypath at which children will be inserted
            $this->insert_into($this->final_array, $keypath, $arr); // inserting as children 
            $this->initial($arr);
        }
    }

   public function getkeypath($arr, $lookup) {
    if (array_key_exists($lookup, $arr)) {
        return array($lookup);
    } else {
        foreach ($arr as $key => $subarr) {
            if (is_array($subarr)) {
                $ret = $this->getkeypath($subarr, $lookup);
                if ($ret) {
                    $ret[] = $key;
                    return $ret;
                }
            }
        }
    }
    return null;
}

// function for inserting the children at given path

public function insert_into(&$array, array $keys, $value) {
    foreach ($keys as $key) {
        $array = &$array[$key];
    }
    $array['children'] = $value;
}

}
