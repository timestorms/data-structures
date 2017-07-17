<?php
	class BinarySearchTree{

		public $root = null;

		public $heap = [];

		public function insert($heap,$data){

			$length = count($heap);
			
			$this->heap[] = $data;

			for($i=){

			}

			return $heap;
		}

		public function swap($arr = array(),$i,$j){
			if(isset($arr[$i]) && isset($arr[$j])){
				$tmp = $arr[$i];
				$arr[$i] = $arr[$j];
				$arr[$j] = $tmp;
			}
			return $arr;
		}

		public function findMin(){
			return count($this->heap) != 0 ? $this->heap[0] : null;
		}

		public function makeEmpty($tree){
			if(!is_null($tree)){
				$this->makeEmpty($tree->left);
				$this->makeEmpty($tree->right);
				$tree = null;
			}

			return null;
		}

		public function find($tree,$data){
			if(is_null($tree)){
				return null;
			}
			if($data < $tree->data){
				$tree = $this->find($tree->left,$data);
			}elseif($data > $tree->data){
				$tree = $this->find($tree->right,$data);
			}

			return $tree;
		}

		public function findMin($tree){
			if(is_null($tree)){
				return null;
			}
			if(is_null($tree->left)){
				return $tree;
			}else{
				$tree = $this->findMin($tree->left);
			}

			return $tree;
		}


		public function findMax($tree){
			if(is_null($tree)){
				return null;
			}
			while(!is_null($tree->right)){
				$tree = $tree->right;
			}

			return $tree;
		}


		/*
			1.如果要删除的节点是树叶节点，则直接删除
			2.如果要删除的节点只有一个子节点，则使用子节点替换掉要删除的节点
			3.如果要删除的节点有两个子节点，则使用其右子树中最小的节点替换掉它自己，该最小节点肯定只有一个节点，还是使用递归解决问题
		*/
		public function delete($tree,$data){
			$tmpTree = null;

			if(is_null($tree)){
				echo '未查到该值';
				return false;
			}elseif($data < $tree->data){		//左子树查找
				$tree = $this->delete($tree->left,$data);
			}elseif($data > $tree->data){		//右子树查找
				$tree = $this->delete($tree->right,$data);
			}elseif($tree->left && $tree->right){	//找到要删除的节点
				$tmpTree = $this->findMin($tree->right);
				$tree->data = $tmpTree->data;
				$tree->right = $this->delete($tree->right,$tree->data);
			}else{	//如果只有一个子节点或者没有子节点
				$tmpTree = $tree;
				if(is_null($tree->left)){
					$tree = $tree->right;
				}elseif(is_null($tree->right)){
					$tree = $tree->left;
				}
				$tree = null;
			}
			return $tree;
		}

		public function preorderTraversal($tree,$stack = array()){
			if(is_null($tree)){
				return $stack;
			}
			array_push($stack,$tree->data);
			if(!is_null($tree->left)){
				$stack = $this->preOrderTree($tree->left,$stack);
			}
			if(!is_null($tree->right)){
				$stack = $this->preOrderTree($tree->right,$stack);
			}
			return $stack;
		}

		public function inorderTraversal($tree,$stack){
			if(is_null($tree)){
				return $stack;
			}
			if(!is_null($tree->left)){
				$stack = $this->midOrderTree($tree->left,$stack);
			}
			array_push($stack,$tree->data);
			if(!is_null($tree->right)){
				$stack = $this->midOrderTree($tree->right,$stack);
			}
			return $stack;
		}

		public function postorderTraversal($tree,$stack){
			if(is_null($tree)){
				return $stack;
			}
			if(!is_null($tree->left)){
				$stack = $this->postorderTraversal($tree->left,$stack);
			}
			
			if(!is_null($tree->right)){
				$stack = $this->postorderTraversal($tree->right,$stack);
			}

			array_push($stack,$tree->data);
			return $stack;
		}

	}


	

	$tree = new BinarySearchTree();

	$tree->insert($tree->root,5);
	$tree->insert($tree->root,1);
	$tree->insert($tree->root,3);
	$tree->insert($tree->root,2);
	$tree->insert($tree->root,4);
	$tree->insert($tree->root,6);
	$tree->insert($tree->root,7);

	

	//$tree->delete($tree->root,3);

	//print_r($tree->root);

	//$tree->insert($tree->root,3);

	//print_r($tree->findMax($tree->root));

	//print_r($tree->findMin($tree->root));

	//var_dump($tree->find($tree->root,3

	$stack = [];

	//$stack = $tree->preorderTraversal($tree->root,$stack);

	//$stack = $tree->inorderTraversal($tree->root,$stack);

	$stack = $tree->postorderTraversal($tree->root,$stack);

	print_r($stack);

?>