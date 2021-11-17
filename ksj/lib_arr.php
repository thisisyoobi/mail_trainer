<?php
// http://jmnote.com/wiki/Lib_arr.php
/*
// useful expression
$arr = array_map('trim', $arr); // trim strings
array_splice($arr, $i, 1); //delete at $i
array_splice($arr, $i, $n); //delete from $i ... ($n) 
array_splice($arr, $i); //$i - end
array_splice($arr, $i, 0, $str) //insert at $i
array_splice($arr, $i, 0, array($str1, $str2, ...) ) //insert at $i
*/
function xmp_print_r($arr) { echo '<xmp>'; print_r($arr); echo '</xmp>'; }
function xmp_var_dump($var) { echo '<xmp>'; var_dump($var); echo '</xmp>'; }

function first($arr) {
	if (count($arr)<1) return null; 
	reset($arr);
	return $arr[key($arr)]; 
}

function last($arr) {
	if (count($arr)<1) return null; 
	end($arr);
	return $arr[key($arr)]; 
}

function array_push_array(array &$array) {
    $numArgs = func_num_args();
    if(2 > $numArgs) {
      trigger_error(sprintf('%s: expects at least 2 parameters, %s given', __FUNCTION__, $numArgs), E_USER_WARNING);
      return false;
    }
    $values = func_get_args();
    array_shift($values);
    foreach($values as $v) {
      if(is_array($v)) {
        if(count($v) > 0) {
          foreach($v as $w) $array[] = $w;
        }
      } else $array[] = $v;
    }
    return count($array);
}
?>