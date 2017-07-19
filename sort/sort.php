<?php
    //参考资料
    //https://visualgo.net/en/sorting

    $arr = [23,14,3,7,33,25,90,11,234,6];

    //命令行
    //$method = isest($argv[1]) ? $argv[1] : 'null';
   /*switch ($method) {
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
            echo "please input sort method";
    }*/

    //界面
    //$arr = selectSort($arr);

    //$arr = insertSort($arr);

    mergeSort($arr);

    //quickSort_2($arr);

    //heapSort($arr);

    print_r($arr);
    
    function HeapAdjust(array &$arr,$start,$end){
        $temp = $arr[$start];
        //沿关键字较大的孩子节点向下筛选
        //左右孩子计算（我这里数组开始下标识 0）
        //左孩子2 * $start + 1，右孩子2 * $start + 2
        for($j = 2 * $start + 1;$j <= $end;$j = 2 * $j + 1){
            if($j != $end && $arr[$j] < $arr[$j + 1]){
                $j ++; //转化为右孩子
            }
            if($temp >= $arr[$j]){
                break;  //已经满足大根堆
            }
            //将根节点设置为子节点的较大值
            $arr[$start] = $arr[$j];
            //继续往下
            $start = $j;
        }
        $arr[$start] = $temp;
    }

    function heapSort(array &$arr){
        $count = count($arr);
        //先将数组构造成大根堆（由于是完全二叉树，所以这里用floor($count/2)-1，下标小于或等于这数的节点都是有孩子的节点)
        for($i = floor($count / 2) - 1;$i >= 0;$i --){
            HeapAdjust($arr,$i,$count);
        }
        for($i = $count - 1;$i >= 0;$i --){
            //将堆顶元素与最后一个元素交换，获取到最大元素（交换后的最后一个元素），将最大元素放到数组末尾
            swap($arr,0,$i);  
            //经过交换，将最后一个元素（最大元素）脱离大根堆，并将未经排序的新树($arr[0...$i-1])重新调整为大根堆
            HeapAdjust($arr,0,$i - 1);
        }
    }

    function quickSort_2(&$arr){
        if(empty($arr)){
            return $arr;
        }

        $length = count($arr);
        qSort($arr,0,$length-1);
     }

     function qSort(&$arr,$low,$high){
        if($low>=$high){
            return;
        }
        $pivotkey = partition($arr,$low,$high);

        qSort($arr,$low,$pivotkey-1);
        qSort($arr,$pivotkey+1,$high);
     }

     function partition(&$arr,$low,$high){

        if(empty($arr)){
            return ;
        }

        $pivotValue = $arr[$low];

        while($low<$high){
            while($low<$high && $pivotValue<=$arr[$high]){
                $high--;
            }
            swap($arr,$low,$high);
            while($low<$high && $pivotValue>=$arr[$low]){
                $low++;
            }
            swap($arr,$low,$high);
        }

        return $low;
     }

    /*
        快速排序
        复杂度：
    */
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


    /*
        希尔排序
        复杂度：
    */
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

        //数组arr中start到mid是有序的，mid到end也是有序的，需要将这部分归并成有序的数组中,i和j分别指向arr两个有序数组的开始元素，递增
        while($i!=$mid+1 && $j!=$end+1){
           if($arr[$i] >= $arr[$j]){
               $tmp[$k++] = $arr[$j++];
           }else{
               $tmp[$k++] = $arr[$i++];
           }
        }

        //将第一个子序列的剩余部分添加到已经排好序的 $tmp 数组中，递增
        while($i != $mid+1){
            $tmp[$k++] = $arr[$i++];
        }
        //将第二个子序列的剩余部分添加到已经排好序的 $tmp 数组中，递增
        while($j != $end+1){
            $tmp[$k++] = $arr[$j++];
        }
        for($i=$start; $i<=$end; $i++){ //注意起始位置
            $arr[$i] = $tmp[$i];
        }
    }

    /*
        插入排序
        复杂度：
    */
    function insertSort($arr){
        if(empty($arr)){
            return $arr;
        }

        $length = count($arr);
        for($i=1;$i<$length;$i++){
            for($j=$i;$j>0 && $arr[$j]<$arr[$j-1];$j--){
                swap($arr,$j,$j-1);
            }
        }

        return $arr;
    }


    /*
        冒泡排序
        复杂度：n²
    */
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

    /*
        选择排序
        复杂度：n次交换，n(n+1)/2次比较
    */
    function selectSort(array $arr){
        if(empty($arr)){
            return $arr;
        }

        $length = count($arr);

        for($i=0;$i<$length;$i++){
            for($j=$i;$j<$length;$j++){
                if($arr[$i]>$arr[$j]){
                    swap($arr,$i,$j);
                }
            }
            swap($arr,$i,$j);
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
