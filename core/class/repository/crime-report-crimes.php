<?php 
class CrimeReportCrimesRepository{
		function Get($id){
			global $conn;
			$query = $conn->query("SELECT * FROM tbl_crime_report_crimes  WHERE Id = '$id'");
			return $query->fetch(PDO::FETCH_ASSOC);	
		}
		function GetByCrimeReportId($id){
			global $conn;
			$query = $conn->query("SELECT * FROM tbl_crime_report_crimes  WHERE CrimeReportId = '$id'");
			return $query->fetchAll(PDO::FETCH_ASSOC);	
		}
		function Delete($id){
			global $conn;
			$query = $conn->prepare("DELETE FROM  tbl_crime_report_crimes  WHERE Id = '$id'");
			$query->execute();	
		}
		function DataList($searchText,$pageNo,$pageSize){
			global $conn;
			$pageNo = ($pageNo - 1) * $pageSize; 
			$where = "";
			
			$limitCondition = $pageNo == 0 && $pageSize == 0 ? '' : 'LIMIT '.$pageNo.','.$pageSize;
			$query = $conn->query("SELECT * FROM  tbl_crime_report_crimes WHERE 1 = 1 $where $limitCondition");
			$count = $searchText != '' ?  $query->rowcount() : $conn->query("SELECT * FROM  tbl_crime_report_crimes")->rowcount();
			
			$data = array();
			$data['Results'] = $query->fetchAll(PDO::FETCH_ASSOC);
			$data['Count'] = $count;
			return $data;	
		}
		public function Create(){
			global $conn;
			$query = $conn->prepare("INSERT INTO tbl_crime_report_crimes (CrimeReportId,Crime) VALUES(:CrimeReportId,:Crime)");
			return $query;	
		}
		public function Update(){
			global $conn;
			$query = $conn->prepare("UPDATE tbl_crime_report_crimes SET CrimeReportId = :CrimeReportId , Crime = :Crime  WHERE Id = :Id");
			return $query;	
		}
		public function Transform($POST){
			$POST->Id = !isset($POST->Id) ? 0 : $POST->Id;
			$POST->CrimeReportId = !isset($POST->CrimeReportId) ? '' : $POST->CrimeReportId; 
			$POST->Crime = !isset($POST->Crime) ? '' : $POST->Crime; 
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
			$query->bindParam(':Crime', $POST->Crime);
			$query->execute();	
		}
}
?>