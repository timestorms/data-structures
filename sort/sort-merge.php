<?php
    //参考资料
    //https://visualgo.net/en/sorting

    $arr = [23,14,3,7,33,25,90,11,234,6];
    //$arr = [2,3,1];

    mergeSort($arr);

    print_r($arr);

    /*
        归并排序
        复杂度：
    */
    function mergeSort(&$arr){
        if(empty($arr)){
            return $arr;
        }

        $length = count($arr);

        MSort($arr,0,$length-1);
    }

    function MSort(&$arr,$start,$end){

        if($start >= $end){
            return;
        }
        $mid = floor(($end+$start)/2);
        MSort($arr,$start,$mid);
        MSort($arr,$mid+1,$end);
        merge($arr,$start,$mid,$end);
    }

    //归并方法
    function merge(array &$arr,$start,$mid,$end){
        $i = $start;
        $j = $mid + 1;
        $k = $start;
        $tmp = array();

        //数组arr中start到mid是有序的，mid到end也是有序的，需要将这部分归并成有序的数组中
        while($i!=$mid+1 && $j!=$end+1)
        {
           if($arr[$i] >= $arr[$j]){
               $tmp[$k++] = $arr[$j++];
           }else{
               $tmp[$k++] = $arr[$i++];
           }
        }

        //将第一个子序列的剩余部分添加到已经排好序的 $tmp 数组中
        while($i != $mid+1){
            $tmp[$k++] = $arr[$i++];
        }
        //将第二个子序列的剩余部分添加到已经排好序的 $tmp 数组中
        while($j != $end+1){
            $tmp[$k++] = $arr[$j++];
        }
        for($i=$start; $i<=$end; $i++){
            $arr[$i] = $tmp[$i];
        }
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
