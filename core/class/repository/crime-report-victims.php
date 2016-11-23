<?php 
class CrimeReportVictimsRepository{
		function Get($id){
			global $conn;
			$query = $conn->query("SELECT * FROM tbl_crime_report_victims  WHERE Id = '$id'");
			return $query->fetch(PDO::FETCH_ASSOC);	
		}
		function GetByCrimeReportId($id){
			global $conn;
			$query = $conn->query("SELECT * FROM tbl_crime_report_victims  WHERE CrimeReportId = '$id'");
			return $query->fetchAll(PDO::FETCH_ASSOC);	
		}
		function Delete($id){
			global $conn;
			$query = $conn->prepare("DELETE FROM  tbl_crime_report_victims  WHERE Id = '$id'");
			$query->execute();	
		}
		function DataList($searchText,$pageNo,$pageSize){
			global $conn;
			$pageNo = ($pageNo - 1) * $pageSize; 
			$where = "";
			
			$limitCondition = $pageNo == 0 && $pageSize == 0 ? '' : 'LIMIT '.$pageNo.','.$pageSize;
			$query = $conn->query("SELECT * FROM  tbl_crime_report_victims WHERE 1 = 1 $where $limitCondition");
			$count = $searchText != '' ?  $query->rowcount() : $conn->query("SELECT * FROM  tbl_crime_report_victims")->rowcount();
			
			$data = array();
			$data['Results'] = $query->fetchAll(PDO::FETCH_ASSOC);
			$data['Count'] = $count;
			return $data;	
		}
		public function Create(){
			global $conn;
			$query = $conn->prepare("INSERT INTO tbl_crime_report_victims (CrimeReportId,Name,Age,Address,Gender) VALUES(:CrimeReportId,:Name,:Age,:Address,:Gender)");
			return $query;	
		}
		public function Update(){
			global $conn;
			$query = $conn->prepare("UPDATE tbl_crime_report_victims SET CrimeReportId = :CrimeReportId , Name = :Name , Age = :Age , Address = :Address , Gender = :Gender  WHERE Id = :Id");
			return $query;	
		}
		public function Transform($POST){
			$POST->Id = !isset($POST->Id) ? 0 : $POST->Id;
			$POST->CrimeReportId = !isset($POST->CrimeReportId) ? '' : $POST->CrimeReportId; 
			$POST->Name = !isset($POST->Name) ? '' : $POST->Name; 
			$POST->Age = !isset($POST->Age) ? '' : $POST->Age; 
			$POST->Address = !isset($POST->Address) ? '' : $POST->Address; 
			$POST->Gender = !isset($POST->Gender) ? '' : $POST->Gender; 
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
			$query->bindParam(':CrimeReportId', $POST->CrimeReportId);
			$query->bindParam(':Name', $POST->Name);
			$query->bindParam(':Age', $POST->Age);
			$query->bindParam(':Address', $POST->Address);
			$query->bindParam(':Gender', $POST->Gender);
			$query->execute();

			if($POST->Id == 0){ $POST->Id = $conn->lastInsertId(); }
			return 	$POST;			
		}
}
?>