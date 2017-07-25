<?php
	
	ini_set('memory_limit','2048M');

	$a = file_get_contents('./a.txt');

	$arr_1 = explode("\n",$a);

	echo 'a文件数组个数:'.count($arr_1)."\n";
	//print_r($arr_1);

	$b = file_get_contents('./b.txt');
	$arr_2 = explode("\n",$b);
	echo 'b文件数组个数:'.count($arr_2)."\n";
	
	$start = getMicrotime();

	$result = self($arr_1,$arr_2);	//3,3279
	//$result = php_func($arr_1,$arr_2);	//64,3279
	echo 'a,b交集个数：'.count($result)."\n";
	
	$end = getMicrotime();

	echo '共耗时:'.($end-$start).' 秒';

	function self($arr_1,$arr_2){
		$arr_tmp_1 = array_flip($arr_1);

		echo "a文件去重后个数:".count($arr_tmp_1)."\n";

		$arr_tmp_2 = array_flip($arr_2);
		echo "b文件去重后个数:".count($arr_tmp_2)."\n";
		
		$arr = array();
		foreach($arr_tmp_1 as $key=>$val){
			if(isset($arr_tmp_2[$key])){
				$arr[] = $key;
			}
		}
		
		return $arr;
	}


	function php_func($arr_1,$arr_2){
		$arr_tmp_1 = array_unique($arr_1);

		echo "1:".count($arr_tmp_1)."\n";

		$arr_tmp_2 = array_unique($arr_2);
		echo "2:".count($arr_tmp_2)."\n";

		$arr = array_intersect($arr_tmp_1,$arr_tmp_2);
		return $arr;
	}


	function getMicrotime(){
		list($usec, $sec) = explode(' ', microtime());
		return (float)$usec + (float)$sec;
	}
?>