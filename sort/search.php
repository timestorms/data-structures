<?php

	$data = getData();
	
	echo count($data);
	echo "\n";
	//$data = array(1,4,3,2,9,5,56,43,23);
	
	if(!isset($argv[1]) || !isset($argv[1])){
		exit('no params');
	}

	$method = $argv[1];
	echo 'method:'.$method;

	
	$begintime = time();
	$data = basicSort($method,$data);
	$endtime = time();
	//print_r($data);

	echo "\r\n".'耗时：'.($endtime-$begintime);

	//测试数据10000条数据
	function basicSort($method,$data){
		switch($method){
			case 'bubble':
				return bubbleSort($data);		//24s
				break;
			case 'select':
				return selectSort($data);		//10s
				break;
			case 'insert':
				return insertSort($data);		//16s
				break;
			case 'shell':
				return shellSort($data);		//0s
				break;
			case 'quick':
				return quickSort($data);		//0s
				break;
			default:
				return 'default';
		}
	}

	//排序
	//$data = bubbleSort($data);

	//$data = selectSort($data);
	
	//$data = insertSort($data);

	//$data = shellSort($data);	//247

	//htmlDebug($data);
	
	//查找
	//$pos = binarySearch(56,$data);
	

	function getData(){
		//$filePath = '../data/unique_data.txt';
		$filePath = '../data/rand.txt';
		$str = file_get_contents($filePath);

		$data = explode(',',$str);

		return $data;
	}

	//比较大小
	function less($a,$b){
		if($a<$b){
			return true;
		}
		return false;
	}

	//交换数组中的两个元素
	function exch(&$arr = array(),$i,$j){
		$temp = $arr[$i];
		$arr[$i] = $arr[$j];
		$arr[$j] = $temp;

		return $arr;
	}

	//判断一个数是否为素数
	function isPrime($a){
		if(is_numeric($a) === false){
			return false;
		}
		if($a<2){
			return false;
		}
		for($i;$i*$i;$i++){
			if($a % $i == 0){
				return false;
			}
		}
		return true;
	}

	function htmlDebug($obj){
		echo '<pre>';
		print_r($obj);
		echo '</pre>';
	}

	//二分查找
	function binarySearch($search,$a){
		$lo = 0;
		$hi = count($a) - 1;
		while($lo<=$hi){
			$mid = $lo + ($hi - $lo)/2;
			if($a[$mid] == $search){
				//return ceil($mid);
				return round($mid);
			}
			if($a[$mid] > $search){
				$hi = $mid - 1;
			}else{
				$lo = $mid + 1;
			}
		}

		return -1;
	}


	//冒泡排序
	function bubbleSort($arr){
		$len = count($arr);
		for($i=0;$i<$len;$i++){
			for($j=$i+1;$j<$len;$j++){
				if(less($arr[$j],$arr[$i])){
					exch($arr,$i,$j);
				}
			}
		}

		return $arr;
	}

	//选择排序
	//第一次取数组中最小的一个数交换正常的
	function selectSort($arr){
		$len = count($arr);
		for($i=0;$i<$len;$i++){
			$min = $i;

			//循环找到未排序数组中最小的
			for($j=$i+1;$j<$len;$j++){
				if($arr[$j]<$arr[$min]){
					$min = $j;
				}
			}
			exch($arr,$i,$min);
		}

		return $arr;
	}

	//插入排序
	//每次将未排序的一个数与插入到已经排好序的数组中
	function insertSort($arr){
		$len = count($arr);
		for($i=0;$i<$len;$i++){
			for($j=$i;$j>0 && less($arr[$j],$arr[$j-1]);$j--){
				exch($arr,$j,$j-1);
			}
		}

		return $arr;
	}

	//希尔排序
	function shellSort_bak($arr){
		$len = count($arr);
		$h = 1;
		while($h < $len/3){
			$h = 3*$h + 1;
		}
		while($h >= 1){
			for($i=$h;$i<$len;$i++){
				for($j=$i;$j>=$h && less($arr[$j],$arr[$j-$h]);$j-=$h){
					exch($arr,$j,$j-$h);
				}
			}
			$h = $h/3;
		}

		return $arr;
	}

	//希尔排序
	function shellSort($arr){
		$len = count($arr);
		$h = 1;
		while($h < $len/3){
			$h = 3*$h + 1;
		}
		while($h >= 1){
			for($i=$h;$i<$len;$i++){
				for($j=$i;$j>=$h && less($arr[$j],$arr[$j-$h]);$j-=$h){
					exch($arr,$j,$j-$h);
				}
			}
			$h = $h/3;
		}

		return $arr;
	}

	//快速排序
	function quickSort($arr)
    {
        //判断参数是否是一个数组
        if(!is_array($arr)) return false;
        //递归出口:数组长度为1，直接返回数组
        $length=count($arr);
        if($length<=1) return $arr;
        //数组元素有多个,则定义两个空数组
        $left=$right=array();
        //使用for循环进行遍历，把第一个元素当做比较的对象
        for($i=1;$i<$length;$i++)
        {
            //判断当前元素的大小
            if($arr[$i]<$arr[0]){
                $left[]=$arr[$i];
            }else{
                $right[]=$arr[$i];
            }
        }
        //递归调用
        $left=quickSort($left);
        $right=quickSort($right);
        //将所有的结果合并
        return array_merge($left,array($arr[0]),$right);
     }

?>
