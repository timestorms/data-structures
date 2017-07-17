<?php
	class BinaryHeap{

		public $root = null;

		public $heap = [4];

		public function insert($heap,$data){

			$length = count($heap);

			if($length<=0){
				//return $heap;
			}

			for($i=++$length;$this->heap[$i/2]>$data;$i/=2){
				echo $i."\n";
				$this->heap[$i] = $this->heap[$i/2];
			}
			//echo "12\n";
			$this->heap[$i] = $data;

			return $heap;
		}

		public function swap(&$arr = array(),$i,$j){
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

	}


	

	$heap = new BinaryHeap();

	$heap->insert($heap->heap,5);
	$heap->insert($heap->heap,1);
	$heap->insert($heap->heap,3);
	$heap->insert($heap->heap,2);
	$heap->insert($heap->heap,0);
	// $heap->insert($heap->heap,6);
	// $heap->insert($heap->heap,7);

	print_r($heap->heap);

?>