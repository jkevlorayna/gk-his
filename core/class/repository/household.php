<?php 
class HouseholdRepository{
		function Get($id){
			global $conn;
			$query = $conn->query("SELECT * FROM tbl_household  WHERE Id = '$id'");
			return $query->fetch(PDO::FETCH_OBJ);	
		}
		function Delete($id){
			global $conn;
			$query = $conn->prepare("DELETE FROM  tbl_household  WHERE Id = '$id'");
			$query->execute();	
		}
		function DataList($searchText,$pageNo,$pageSize){
			global $conn;
			$pageNo = ($pageNo - 1) * $pageSize; 
			
			$where = "";
			if($searchText != ''){
				$where = "And HouseholdNo LIKE '%$searchText%'";
			}
			
			$limitCondition = $pageNo == 0 && $pageSize == 0 ? '' : 'LIMIT '.$pageNo.','.$pageSize;
			$query = $conn->query("SELECT *,tbl_household.Id as Id,tbl_livelihood.Name as Livelihood FROM  tbl_household
			LEFT JOIN  tbl_livelihood on tbl_livelihood.Id = tbl_household.LivelihoodId
			WHERE 1 = 1 $where $limitCondition");
			$count = $searchText != '' ?  $query->rowcount() : $conn->query("SELECT * FROM  tbl_household")->rowcount();
			
			$data = array();
			$data['Results'] = $query->fetchAll(PDO::FETCH_ASSOC);
			$data['Count'] = $count;
			return $data;	
		}
		public function Create(){
			global $conn;
			$query = $conn->prepare("INSERT INTO tbl_household (HouseholdNo,SurveyDate,Address,LivelihoodId)
			VALUES(:HouseholdNo,:SurveyDate,:Address,:LivelihoodId)");
			return $query;	
		}
		public function Update(){
			global $conn;
			$query = $conn->prepare("UPDATE tbl_household SET HouseholdNo = :HouseholdNo , SurveyDate = :SurveyDate , Address = :Address ,LivelihoodId = :LivelihoodId WHERE Id = :Id");
			return $query;	
		}
		public function Transform($POST){
			$POST->Id = !isset($POST->Id) ? 0 : $POST->Id;
			$POST->HouseholdNo = !isset($POST->HouseholdNo) ? '' : $POST->HouseholdNo; 
			$POST->Address = !isset($POST->Address) ? '' : $POST->Address; 
			$POST->LivelihoodId = !isset($POST->LivelihoodId) ? '' : $POST->LivelihoodId; 
			$POST->SurveyDate = date('Y-m-d'); 
			return $POST;
		}
		function Save($POST){
			global $conn;
			if($POST->Id == 0){
				$query = $this->Create();
				$query->bindParam(':SurveyDate', $POST->SurveyDate);
			}else{
				$query = $this->UPDATE();
				$query->bindParam(':Id', $POST->Id);
			}
			$query->bindParam(':HouseholdNo', $POST->HouseholdNo);
			$query->bindParam(':SurveyDate', $POST->SurveyDate);
			$query->bindParam(':Address', $POST->Address);
			$query->bindParam(':LivelihoodId', $POST->LivelihoodId);
			$query->execute();
			
			if($POST->Id == 0){ $POST->Id = $conn->lastInsertId(); }
			
			return 	$POST;
		}
}


?>