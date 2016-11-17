<?php 
class CensusRepository{
		function Village($DateFrom,$DateTo){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where = "And SurveyDate BETWEEN '$DateFrom' AND '$DateTo'";
			}
			
			$query = $conn->query("SELECT Address as Village,COUNT(*) as Number FROM tbl_household
			WHERE 1 = 1 $where GROUP BY tbl_household.Address");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
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
		
		function PopulationGrowth($DateFrom,$DateTo){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where .= "And Year BETWEEN '$DateFrom' AND '$DateTo'";
			}

			$query = $conn->query("Select *,COUNT(*) as Number FROM(Select YEAR(STR_TO_DATE(SurveyDate, '%Y-%m-%d')) as Year from tbl_member
			LEFT JOIN tbl_household ON tbl_household.Id = tbl_member.HouseholdId) r where 1 = 1 $where GROUP BY Year
			");
			return $query->fetchAll(PDO::FETCH_ASSOC);	
		}
		
		function Age($DateFrom,$DateTo){
			global $conn;
			$where = "";
			// if($DateFrom != 'null' && $DateTo != 'null'){
				// $where .= "And Year BETWEEN '$DateFrom' AND '$DateTo'";
			// }

			$query = $conn->query("SELECT AgeGroup, count(*) AS Number 
					FROM (SELECT
						  CASE WHEN age BETWEEN 0 AND 9 THEN 'Age from 0 to 9' 
						   WHEN age BETWEEN 10 and 19 THEN 'Age from 10 to 19' 
						   WHEN age BETWEEN 20 and 29 THEN 'Age from 20 to 29' 
						   WHEN age BETWEEN 30 and 39 THEN 'Age from 30 to 39' 
						   WHEN age BETWEEN 40 and 49 THEN 'Age from 40 to 49' 
						   WHEN age BETWEEN 50 and 59 THEN 'Age from 50 to 59'
						   WHEN age >= 60 THEN '60 +' Else 'Age from 60 and up'
                          END AS AgeGroup
						  FROM tbl_member) entries
					GROUP BY AgeGroup
			");
			return $query->fetchAll(PDO::FETCH_ASSOC);	
		}
		
}


?>