<?php
    class Stack{

        private $stack = [];

        public function printStack(){
            print_r($this->stack);
        }

        function push($data){
            array_push($this->stack,$data);
        }

        function pop(){
            return array_pop($this->stack);
        }
    }

    $stack_1 = new Stack();

    $stack_1->push('111');
    $stack_1->push('222');
    //$popData = $stack_1->pop();

    //print_r($popData);

    $stack_1->printStack();
?>
