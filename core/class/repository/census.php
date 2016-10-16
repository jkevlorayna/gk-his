<?php 
class CensusRepository{
		function Livelihood($DateFrom,$DateTo){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where = "And SurveyDate BETWEEN '$DateFrom' AND '$DateTo'";
			}
			
			$query = $conn->query("SELECT tbl_livelihood.Name as Livelihood,COUNT(*) as Number FROM tbl_household
			LEFT JOIN tbl_livelihood On tbl_household.LivelihoodId = tbl_livelihood.Id
			WHERE 1 = 1 $where GROUP BY tbl_household.LivelihoodId");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		function Gender($DateFrom,$DateTo){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where .= "And SurveyDate BETWEEN '$DateFrom' AND '$DateTo'";
			}
				$where .= "And Gender != ''"; 
			$query = $conn->query("SELECT Gender,COUNT(*) as Number FROM tbl_member
			LEFT JOIN tbl_household ON tbl_household.Id = tbl_member.HouseholdId
			WHERE 1 = 1 $where GROUP BY Gender");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		function EmploymentStatus($DateFrom,$DateTo){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where .= "And SurveyDate BETWEEN '$DateFrom' AND '$DateTo'";
			}
			$where .= "And tbl_member.EmploymentStatusId != '0'";
			
			$query = $conn->query("SELECT tbl_employment_status.Name as EmploymentStatus,COUNT(*) as Number FROM tbl_member
			LEFT JOIN tbl_employment_status On tbl_employment_status.Id = tbl_member.EmploymentStatusId
			LEFT JOIN tbl_household ON tbl_household.Id = tbl_member.HouseholdId
			WHERE 1 = 1 $where GROUP BY EmploymentStatusId");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		
		function EducationalAttainment($DateFrom,$DateTo){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where .= "And SurveyDate BETWEEN '$DateFrom' AND '$DateTo'";
			}
			$where .= "And tbl_member.EducationalAttainmentId != '0'";
			
			$query = $conn->query("SELECT tbl_educational_attainment.Name as EducationalAttainment,COUNT(*) as Number FROM tbl_member
			LEFT JOIN tbl_educational_attainment On tbl_educational_attainment.Id = tbl_member.EducationalAttainmentId
			LEFT JOIN tbl_household ON tbl_household.Id = tbl_member.HouseholdId
			WHERE 1 = 1 $where GROUP BY EducationalAttainmentId");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		
}


?>