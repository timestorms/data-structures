<?php
    class Stack{

        const MAX_LENGTH = 10;

        private $stack = [];

        public function printStack(){
            print_r($this->stack);
        }

        public function isEmpty(){
            if(count($this->stack) === 0){
                echo "empty\n";
                return true;
            }
            return false;
        }

        public function isFull(){
            if(count($this->stack) === self::MAX_LENGTH){
                echo "full\n";
                return true;
            }
            return false;
        }

        public function push($data){
            if($this->isFull()){
                return;
            }
            array_push($this->stack,$data);
        }

        public function pop(){
            if($this->isEmpty()){
                return;
            }
            return array_pop($this->stack);
        }
    }

    $stack_1 = new Stack();

    $stack_1->push('111');
    $stack_1->push('222');
    $popData = $stack_1->pop();
    $popData = $stack_1->pop();
    $popData = $stack_1->pop();

    //print_r($popData);

    $stack_1->printStack();
?>
