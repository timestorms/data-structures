<?php
    class Node{
    	private $data;
    	
    	private $left = null;	//下一个节点

        private $right = null;   //上一个节点

    	public function __construct($data){
    		$this->data = $data;
    	}
    }
?>