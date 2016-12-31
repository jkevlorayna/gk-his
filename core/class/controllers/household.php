<?php 
	$slim_app->get('/household/:id',function($id){
		$HouseholdRepo = new HouseholdRepository();
		$MemberRepo = new MemberRepository();
		$result = $HouseholdRepo->Get($id);
		$result->MemberList = $MemberRepo->GetByHouseholdId($id);
		echo json_encode($result);
	});
	$slim_app->get('/household',function(){
		$HouseholdRepo = new HouseholdRepository();
		$result = $HouseholdRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize'],$_GET['DateFrom'],$_GET['DateTo'],$_GET['Village']);
		echo json_encode($result);
	});
	$slim_app->delete('/household/:id',function($id){
		$HouseholdRepo = new HouseholdRepository();
		$MemberRepo = new MemberRepository();
		$HouseholdRepo->Delete($id);
		$MemberRepo->DeleteByHouseholdId($id);
	});
	$slim_app->post('/household',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$HouseholdRepo = new HouseholdRepository();
		$MemberRepo = new MemberRepository();

		$oReturn = $HouseholdRepo->Save($HouseholdRepo->Transform($POST));
		
		foreach($POST->MemberList as $row){
			$row->HouseholdId = $oReturn->Id;
			$MemberRepo->Save($MemberRepo->Transform($row));
		}
	});
?>