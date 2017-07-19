<?php
    //参考资料
    //https://visualgo.net/en/sorting
    /*
        堆排序：
        1.先将原本乱序的堆进行最大堆建堆，找到具有子节点的所有结点，依次将其所在树调整为最大堆，这个过程就是整个完整二叉树的建堆过程
        2.取出第一个元素，然后对剩余的0到n-1进行建堆，再取出最大的，对剩余的0到n-2进行建堆，知道结束，就可以得到一个有序列
    */

    $arr = [58,45,72,86,77,21,34,60];

    heapSort($arr);

    print_r($arr);


    function heapSort(&$arr){
        if(empty($arr)){
            return $arr;
        }

        $length = count($arr);

        //建堆过程
        for($i=floor($length/2);$i>=1;$i--){
            heapAdjast($arr,$i,$length);
        }

        //取出最大的元素，然后再次调整堆
        for($i=$length;$i>=1;$i--){
            swap($arr,0,$i);
            heapAdjast($arr,0,$i-1);
        }
    }

    function heapAdjast(&$arr,$start,$end){
        $tmp = $arr[$start];
        for($j=2*$start;$j<$end;$j*=2){
            if($j!=$end && $arr[$j]<$arr[$j+1]){
               $j++; 
            }
            if($tmp<$arr[$j]){
                $arr[$start] = $arr[$j];
                $start = $j;
            }
        }

        $arr[$start] = $tmp;
    }

    function swap(&$arr,$i,$j){
        if(isset($arr[$i]) && isset($arr[$j])){
            $tmp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $tmp;
        }
    }

?>
