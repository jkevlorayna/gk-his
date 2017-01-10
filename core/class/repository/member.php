<?php 
class MemberRepository{
		public function Get($id){
			global $conn;
			$query = $conn->query("SELECT * FROM tbl_member  WHERE Id = '$id'");
			return $query->fetch(PDO::FETCH_OBJ);	
		}
		public function GetByHouseholdId($id){
			global $conn;
			$query = $conn->query("SELECT * FROM tbl_member  WHERE HouseholdId = '$id'");
			return $query->fetchAll(PDO::FETCH_OBJ);	
		}
		public function Delete($id){
			global $conn;
			$query = $conn->prepare("DELETE FROM  tbl_member  WHERE Id = '$id'");
			$query->execute();	
		}
		public function DeleteByHouseholdId($id){
			global $conn;
			$query = $conn->prepare("DELETE FROM  tbl_member  WHERE HouseholdId = '$id'");
			$query->execute();	
		}
		public function DataList($searchText,$pageNo,$pageSize){
			global $conn;
			$where = "";
			if($searchText != ''){
				$where = "And (tbl_member.Name  LIKE '%$searchText%')";
			}
			$pageNo = ($pageNo - 1) * $pageSize; 
			$limitCondition = $pageNo == 0 && $pageSize == 0 ? '' : 'LIMIT '.$pageNo.','.$pageSize;
			
			$query = $conn->query("SELECT *,
			tbl_member.Id As Id,
			tbl_member.Name As Name,
			tbl_employment_status.Name as EmploymentStatus,
			tbl_educational_attainment.Name as EducationalAttainment
			FROM  tbl_member
			LEFT JOIN tbl_employment_status  ON tbl_employment_status.Id = tbl_member.EmploymentStatusId
			LEFT JOIN tbl_educational_attainment  ON tbl_educational_attainment.Id = tbl_member.EducationalAttainmentId
			WHERE 1 = 1 $where $limitCondition ");
			$count = $searchText != '' ? $query->rowcount() : $conn->query("SELECT * FROM  tbl_member")->rowcount();
			
			$data = array();
			$data['Results'] = $query->fetchAll(PDO::FETCH_OBJ);
			$data['Count'] = $count;
			
			return $data;	
		}
		public function Create(){
			global $conn;
			$query = $conn->prepare("
				INSERT INTO 
					   tbl_member 
					  (Name,Gender,Age,CivilStatus,HouseholdId,EmploymentStatusId,EducationalAttainmentId,Relationship,DateOfBirth) 
				VALUES(:Name,:Gender,:Age,:CivilStatus,:HouseholdId,:EmploymentStatusId,:EducationalAttainmentId,:Relationship,:DateOfBirth)
				");
			return $query;	
		}
		public function Update(){
			global $conn;
			$query = $conn->prepare("
				UPDATE
					   tbl_member SET
					   Name = :Name,
					   Gender = :Gender,
					   Age = :Age,
					   CivilStatus = :CivilStatus,
					   HouseholdId = :HouseholdId,
					   EmploymentStatusId = :EmploymentStatusId,
					   EducationalAttainmentId = :EducationalAttainmentId,
					   Relationship = :Relationship,
					   DateOfBirth = :DateOfBirth
					   WHERE Id = :Id
				");
			return $query;	
		}
		public function Transform($POST){
			$POST->Id = !isset($POST->Id) ? 0 : $POST->Id;
			$POST->Name = !isset($POST->Name) ? '' : $POST->Name; 
			$POST->Gender = !isset($POST->Gender) ? '' : $POST->Gender; 
			$POST->Age = !isset($POST->Age) ? '' : $POST->Age; 
			$POST->CivilStatus = !isset($POST->CivilStatus) ? '' : $POST->CivilStatus; 
			$POST->HouseholdId = !isset($POST->HouseholdId) ? '' : $POST->HouseholdId; 
			$POST->EmploymentStatusId = !isset($POST->EmploymentStatusId) ? '' : $POST->EmploymentStatusId; 
			$POST->EducationalAttainmentId = !isset($POST->EducationalAttainmentId) ? '' : $POST->EducationalAttainmentId; 
			$POST->Relationship = !isset($POST->Relationship) ? '' : $POST->Relationship; 
			$POST->DateOfBirth = !isset($POST->DateOfBirth) ? '' : $POST->DateOfBirth; 
			return $POST;
		}
		public function Save($POST ){
			global $conn;
			if($POST->Id == 0){
				$query = $this->Create();
			}else{
				$query = $this->UPDATE();
				$query->bindParam(':Id', $POST->Id);
			}
		
			$query->bindParam(':Name', $POST->Name);
			$query->bindParam(':Gender', $POST->Gender);
			$query->bindParam(':Age', $POST->Age);
			$query->bindParam(':Gender', $POST->Gender);
			$query->bindParam(':CivilStatus', $POST->CivilStatus);
			$query->bindParam(':HouseholdId', $POST->HouseholdId);
			$query->bindParam(':EmploymentStatusId', $POST->EmploymentStatusId);
			$query->bindParam(':EducationalAttainmentId', $POST->EducationalAttainmentId);
			$query->bindParam(':Relationship', $POST->Relationship);
			$query->bindParam(':DateOfBirth', $POST->DateOfBirth);


			$query->execute();	
			$POST->Id = $conn->lastInsertId(); 
			return $POST;
		}
		public function SignUp($POST){
			return $this->Save($POST);		
		}
		public function ChangePassword(){
			global $conn;
			$request = \Slim\Slim::getInstance()->request();
			$POST = json_decode($request->getBody());
	
			$Id = (!isset($POST->Id)) ? 0 : $POST->Id;
			$cpassword =  $POST->cpassword;
			$newpassword =  $POST->newpassword;
			
			$count = $conn->query("SELECT * FROM tbl_member WHERE  password = '$cpassword' AND Id = '$Id' ")->rowcount();

			if($count > 0){
				$query = $conn->prepare("UPDATE tbl_member SET password = ? WHERE Id = ? ");
				$query->execute(array($newpassword,$Id));
			}else{
				 return 'cpFalse';
			}
			
		}
}
?>