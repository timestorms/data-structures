<?php
    /*
        array_shift() 将 array 的第一个单元移出并作为结果返回
        array_unshift() - 在数组开头插入一个或多个单元
        array_push() - 将一个或多个单元压入数组的末尾（入栈）
        array_pop() - 弹出数组最后一个单元（出栈）
        
    */
    class Queue{

        const MAX_LENGTH = 10;

        private $queue = [];

        public function printQueue(){
            print_r($this->queue);
        }

        public function isEmpty(){
            if(count($this->queue) === 0){
                echo "empty\n";
                return true;
            }
            return false;
        }

        public function isFull(){
            if(count($this->queue) === self::MAX_LENGTH){
                echo "full\n";
                return true;
            }
            return false;

        }

        public function push($data){
            if($this->isFull()){
                return;
            }
            array_push($this->queue,$data);
        }

        public function pop(){
            if($this->isEmpty()){
                return;
            }
            return array_shift($this->queue);
        }
    }

    $queue_1 = new Queue();

    $queue_1->push('1');
    $queue_1->push('2');
    // $queue_1->push('3');
    // $queue_1->push('4');
    // $queue_1->push('5');
    // $queue_1->push('6');
    // $queue_1->push('7');
    // $queue_1->push('8');
    // $queue_1->push('9');
    // $queue_1->push('10');
    // $queue_1->push('11');
    $popData_1 = $queue_1->pop();
    $popData_2 = $queue_1->pop();
    $popData_3 = $queue_1->pop();

    //print_r($popData_3);

    $queue_1->printQueue();
?>
