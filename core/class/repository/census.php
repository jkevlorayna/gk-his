<?php 
class CensusRepository{
		function Livelihood($year){
			global $conn;
			$where = "";
			if($year != ''){
				$where = "And HouseholdNo LIKE '%$year%'";
			}
			$query = $conn->query("SELECT tbl_livelihood.Name as Livelihood,COUNT(*) as Number FROM tbl_household
			LEFT JOIN tbl_livelihood On tbl_household.LivelihoodId = tbl_livelihood.Id
			WHERE 1 = 1 $where GROUP BY tbl_household.LivelihoodId");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		function Gender($year){
			global $conn;
			$where = "";
			if($year != ''){
				$where = "And HouseholdNo LIKE '%$year%'";
			}
			$where = "And Gender != ''";
			$query = $conn->query("SELECT Gender,COUNT(*) as Number FROM tbl_member
			WHERE 1 = 1 $where GROUP BY Gender");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		function EmploymentStatus($year){
			global $conn;
			$where = "";
			if($year != ''){
				$where = "And HouseholdNo LIKE '%$year%'";
			}
			$where = "And Gender != ''";
			$query = $conn->query("SELECT tbl_employment_status.Name as EmploymentStatus,COUNT(*) as Number FROM tbl_member
			LEFT JOIN tbl_employment_status On tbl_employment_status.Id = tbl_member.EmploymentStatusId
			WHERE 1 = 1 $where GROUP BY EmploymentStatusId");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
}


?>