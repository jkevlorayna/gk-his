<?php 
class YearRepository{
		function Get($id){
			global $conn;
			$query = $conn->query("SELECT * FROM tbl_year  WHERE Id = '$id'");
			return $query->fetch(PDO::FETCH_ASSOC);	
		}
		function Delete($id){
			global $conn;
			$query = $conn->prepare("DELETE FROM  tbl_year  WHERE Id = '$id'");
			$query->execute();	
		}
		function DataList($searchText,$pageNo,$pageSize){
			global $conn;
			$pageNo = ($pageNo - 1) * $pageSize; 
			
			$where = "";
			if($searchText != ''){
				$where = "And Year LIKE '%$searchText%'";
			}
			
			$limitCondition = $pageNo == 0 && $pageSize == 0 ? '' : 'LIMIT '.$pageNo.','.$pageSize;
			$query = $conn->query("SELECT * FROM  tbl_year WHERE 1 = 1 $where ORDER BY Year DESC $limitCondition");
			$count = $searchText != '' ?  $query->rowcount() : $conn->query("SELECT * FROM  tbl_year")->rowcount();
			
			$data = array();
			$data['Results'] = $query->fetchAll(PDO::FETCH_ASSOC);
			$data['Count'] = $count;
			return $data;	
		}
		public function Create(){
			global $conn;
			$query = $conn->prepare("INSERT INTO tbl_year (Year) VALUES(:Year)");
			return $query;	
		}
		public function Update(){
			global $conn;
			$query = $conn->prepare("UPDATE tbl_year SET Year = :Year WHERE Id = :Id");
			return $query;	
		}
		public function Transform($POST){
			$POST->Id = !isset($POST->Id) ? 0 : $POST->Id;
			$POST->Year = !isset($POST->Year) ? '' : $POST->Year; 
			return $POST;
		}
		function Save($POST){
			global $conn;
			if($POST->Id == 0){
				$query = $this->Create();
			}else{
				$query = $this->UPDATE();
				$query->bindParam(':Id', $POST->Id);
			}
			$query->bindParam(':Year', $POST->Year);
			$query->execute();	
		}
}


?>