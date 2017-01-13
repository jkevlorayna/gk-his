<?php 
class CensusRepository{
		function Crime($DateFrom,$DateTo){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where .= "And CrimeDate BETWEEN '$DateFrom' AND '$DateTo'";
			}
				$where .= "And Crime is not NULL";
			$query = $conn->query("SELECT Crime,COUNT(*) as Number FROM tbl_crime_report
			LEFT  JOIN tbl_crime_report_crimes ON tbl_crime_report_crimes.CrimeReportId = tbl_crime_report.Id
			WHERE 1 = 1 $where GROUP BY tbl_crime_report_crimes.Crime");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		function Village($DateFrom,$DateTo,$Village){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where .= "And SurveyDate BETWEEN '$DateFrom' AND '$DateTo'";
			}
			if($Village != 'null'){
				$where .= "And Address = '$Village'";		
			}
			$query = $conn->query("SELECT Address as Village,COUNT(*) as Number FROM tbl_household
			WHERE 1 = 1 $where GROUP BY tbl_household.Address");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		function Livelihood($DateFrom,$DateTo,$Village){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where .= "And SurveyDate BETWEEN '$DateFrom' AND '$DateTo'";
			}
			if($Village != 'null'){
				$where .= "And Address = '$Village'";		
			}
			$query = $conn->query("SELECT tbl_livelihood.Name as Livelihood,COUNT(*) as Number FROM tbl_household
			LEFT JOIN tbl_livelihood On tbl_household.LivelihoodId = tbl_livelihood.Id
			WHERE 1 = 1 $where GROUP BY tbl_household.LivelihoodId");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		function Gender($DateFrom,$DateTo,$Village){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where .= "And SurveyDate BETWEEN '$DateFrom' AND '$DateTo'";
			}
			if($Village != 'null'){
				$where .= "And Address = '$Village'";		
			}
			$where .= "And Gender != ''"; 
			$query = $conn->query("SELECT Gender,COUNT(*) as Number FROM tbl_member
			LEFT JOIN tbl_household ON tbl_household.Id = tbl_member.HouseholdId
			WHERE 1 = 1 $where GROUP BY Gender");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		function EmploymentStatus($DateFrom,$DateTo,$Village){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where .= "And SurveyDate BETWEEN '$DateFrom' AND '$DateTo'";
			}
			if($Village != 'null'){
				$where .= "And Address = '$Village'";		
			}
			$where .= "And tbl_member.EmploymentStatusId != '0'";
			
			$query = $conn->query("SELECT tbl_employment_status.Name as EmploymentStatus,COUNT(*) as Number FROM tbl_member
			LEFT JOIN tbl_employment_status On tbl_employment_status.Id = tbl_member.EmploymentStatusId
			LEFT JOIN tbl_household ON tbl_household.Id = tbl_member.HouseholdId
			WHERE 1 = 1 $where GROUP BY EmploymentStatusId");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		
		function EducationalAttainment($DateFrom,$DateTo,$Village){
			global $conn;
			$where = "";
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where .= "And SurveyDate BETWEEN '$DateFrom' AND '$DateTo'";
			}
			if($Village != 'null'){
				$where .= "And Address = '$Village'";		
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
			if($DateFrom != 'null' && $DateTo != 'null'){
				$where .= "And SurveyDate BETWEEN '$DateFrom' AND '$DateTo'";
			}

			$query = $conn->query("SELECT AgeGroup, count(*) AS Number 
					FROM (SELECT
						  CASE WHEN age BETWEEN 1 AND 3 THEN 'Toddler 1-3 yrs old' 
						   WHEN age BETWEEN 4 and 6 THEN 'Preschool: 4-6 yrs old' 
						   WHEN age BETWEEN 7 and 12 THEN 'Gradeschooler: 5-12 yrs Old' 
						   WHEN age BETWEEN 13 and 18 THEN 'Teens:	13-18 yrs Old' 
						   WHEN age BETWEEN 19 and 23 THEN 'Young Adult: 19-23 yrs Old' 
						   WHEN age BETWEEN 24 and 59 THEN 'Adult: 24-59 yrs Old' 
						   WHEN age >= 60 THEN '60 + Senior Citizen' Else 'Age from 60 and up'
                          END AS AgeGroup
						  FROM tbl_member
						  LEFT JOIN tbl_household ON tbl_household.Id = tbl_member.HouseholdId WHERE 1 = 1 $where) entries
					GROUP BY AgeGroup
			");
			return $query->fetchAll(PDO::FETCH_ASSOC);	
		}
		
}


?>