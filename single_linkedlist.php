<?php
    class Node{
    	public $id;	//节点的key
    	//private $data = '';		//节点值
    	public $next = null;	//下一个节点

    	public function __construct($id){
    		//$this->id = $id;
    		//$this->data = $data;
    		$this->id = $id;
    		$this->next = null;
    	}
    }

    class SingleLinkedList{

    	public $head = null;	//头结点

    	public function initList(){
    		$this->head = new Node('head');
    	}

    	public function isLast($node){
    		return is_null($node->next);
    	}

    	public function isEmpty(){
    		return is_null($this->head);
    	}

    	public function addNode($id){
    		if($this->isEmpty()){
    			echo '链表为空！！';
    			return false;
    		}

    		$newNode = new Node($id);
    		$lastNode = $current = $this->head;
    		while(!is_null($current->next)){
    			$current = $current->next;
    			$lastNode = $current;
    		}

    		$lastNode->next = $newNode;
    		return true;
    	}

    	public function insertAfter($id,$newId){
    		$newNode = new Node($newId);
    		
    		$node = $this->findNodeById($id);
    		if(!$node){
    			echo '未发现该节点!id:'.$id."\n";
    			return false;
    		}

    		$newNode->next = $node->next;
    		$node->next = $newNode;

    		return true;
    	}


    	public function findNodeById($id){
    		
    		if($this->isEmpty()){
    			return false;
    		}

    		$current = $this->head;

    		while(!is_null($current)){
    			if($current->id == $id){
    				return $current;
    			}
    			$current = $current->next;
    		}

    		return false;
    	}

    	public function makeEmpty(){
    		if(isEmpty()){
    			return true;
    		}

    		$this->head = null;
    	}


    	public function deleteNode($id){
    		if($this->isEmpty()){
    			return false;
    		}

    		$node = $this->findNodeById($id);

    	}

    	public function getPrivousNodeById($id){
    		if($this->isEmpty()){
    			return false;
    		}

    		$current = $this->head;
    		while(){

    		}

    	}

    	public function getList(){
    		if($this->isEmpty()){
    			echo '链表为空!';
    			return;
    		}

    		$List = [];
    		$current = $this->head;
    		while(!is_null($current)){
    			$list[] = $current;
    			$current = $current->next;
    		}

    		return $list;
    	}

    	public function getListLength(){
    		$current = $this->head;

    		if(is_null($this->head)){
    			return 0;
    		}

    		$length = 1;

    		while(!is_null($current->next)){
    			$length++;
    			$current = $current->next;
    		}

    		return $length;
    	}
    }


    $linkedList = new SingleLinkedList();
    if(is_object($linkedList)){
    	//var_dump($linkedList);	
    }

    $linkedList->initList();

    $linkedList->addNode('1');
    $linkedList->addNode('2');
    
    $list = $linkedList->getList();
    var_dump($list);
?>