<?php
	class mongoDBcontrol{
		private $db;
		private $m;
		public function __construct($dbPass = null){
			$this->m = new Mongo();
			$this->db = $this->m->selectDB($dbPass);
		}
		public function find($passCollection, $query = array()){
			$collection = $this->db->$passCollection;
			return $collection->find($query);
		}
		public function findOne($passCollection, $query = array()){
			$collection = $this->db->$passCollection;
			return $collection->findOne($query);
		}
		public function insert($passCollection, $passInsertArray){
			$collection = $this->db->$passCollection;
			$collection->insert($passInsertArray);		
		}
		public function remove($passCollection, $passInsertArray){
			$collection = $this->db->$passCollection;
			
			if(!isset($passInsertArray)){
				echo json_encode(array('error'=>'no delete paramaters sent'));
				die;
			}
			
			$collection->remove($passInsertArray);
			return true;
		}
		public function update($passCollection, $passIdObj, $passUpdateParams){
			$collection = $this->db->$passCollection;
			
			if(!isset($passIdObj) || !isset($passUpdateParams)){
				echo json_encode(array('error'=>'no update paramaters sent'));
				die;
			}
			$collection->update($passIdObj,$passUpdateParams);
			return true;
		}
		public function error($reset = false){
			if($reset)
				$this->db->resetError();
			return $this->db->lastError();
		}
	}
?>