// Calculate the relative path to two files
function abspath($a, $b) {
    $a = explode("/", trim(dirname($a), "/"));
    $b = explode("/", trim(dirname($b), "/"));
	  $len = count($b);
    for($i=0; $i<$len; $i++) {
       if($a[$i] == $b[$i]) {
			      unset($a[$i]);
            unset($b[$i]);
		   }else {
		        break;
       }
	  }
    return  str_repeat("../", count($b)).implode("/", $a).'/';
}
$a = '/a/b/c/d/e.php';
$b = '/a/b/12/34/c.php';
echo abspath($a, $b);
