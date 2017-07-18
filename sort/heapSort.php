<?php
    //参考资料
    //https://visualgo.net/en/sorting

    $arr = [58,45,72,86,77,21,34,60];

    heapSort($arr);

    print_r($arr);
    
    function HeapAdjust(array &$arr,$start,$end){
        $temp = $arr[$start];
        //沿关键字较大的孩子节点向下筛选
        //左右孩子计算（我这里数组开始下标识 0）
        //左孩子2 * $start + 1，右孩子2 * $start + 2
        for($j = 2 * $start;$j < $end;$j = 2 * $j){
            if($j != $end && $arr[$j] < $arr[$j + 1]){
                $j ++; //转化为右孩子,找出最大的孩子
            }
            if($temp < $arr[$j]){       //如果父节点比自己最大的孩子小
                //将根节点设置为子节点的较大值
                $arr[$start] = $arr[$j];
                //继续往下
                $start = $j;
            }
            
        }
        $arr[$start] = $temp;
    }

    function heapSort(array &$arr){
        $length = count($arr);

        //先将数组构造成大根堆（由于是完全二叉树，所以这里用floor($count/2)-1，下标小于或等于这数的节点都是有孩子的节点)
        for($i = floor($length / 2);$i >= 1;$i --){
            HeapAdjust($arr,$i,$length);
        }
        for($i = $length;$i >= 1;$i --){
            //将堆顶元素与最后一个元素交换，获取到最大元素（交换后的最后一个元素），将最大元素放到数组末尾
            swap($arr,0,$i);  
            //经过交换，将最后一个元素（最大元素）脱离大根堆，并将未经排序的新树($arr[0...$i-1])重新调整为大根堆
            HeapAdjust($arr,0,$i-1);
        }
    }

    function swap(&$arr,$i,$j){
        if(isset($arr[$i]) && isset($arr[$j])){
            $tmp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $tmp;
        }

        //return $arr;
    }

?>
