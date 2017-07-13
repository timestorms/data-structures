<?php
	class Node{

		private $id = '';

		private $next = null;

		public function __construct($id='default-'.time()){
			$this->id = $id;
		}

	}

	class LinkedList{

		private $head = null;

		public function initList(){
			$this->head = new Node('head');
			if(!is_object($this->head)){
				return false;
			}

			$this->head->next = null;
			return true;
		}


		public function isEmpty(){
			echo '链表为空';
			return is_null($this->head);
		}


		public function newNode($id){
			return new Node($id);
		}


		public function addNodeTail($id){
			
			if($this->isEmpty()){
				return false;
			}

			$newNode = $this->newNode($id);
			$current = $this->head;
			$lastNode = $current;
			while(!is_null($current->next)){
				$current = $current->next;
				$lastNode = $current;
			}

			$lastNode->next = $newNode;

			return true;
			
		}

	}
?>