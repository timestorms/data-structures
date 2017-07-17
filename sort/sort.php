<?php
    
    $arr = [23,14,3,7,33,25,90,11,234,6];

    print_r($argv);

    $method = $argv[1];

    switch ($method) {
        case 'bubble':
            $arr = bubbleSort($arr);
            break;
        case 'select':
            $arr = selectSort($arr);
            break;
        case 'insert':
            $arr = insertSort($arr);
            break;
        default:
            echo "error method";
    }

    print_r($arr);

    function bubbleSort(array $arr){
        if(empty($arr)){
            return $arr;
        }

        $length = count($arr);

        for($i=0;$i<$length;$i++){
            for($j=0;$j<$length-$i;$j++){
                if($arr[$j]>$arr[$j+1]){
                    swap($arr,$j,$j+1);
                }
            }
        }

        return $arr;
    }


    function swap(&$arr,$i,$j){
        if(isset($arr[$i]) && isset($arr[$j])){
            $tmp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $tmp;
        }

        return $arr;
    }

?>
