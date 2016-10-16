<?php 
	$slim_app->get('/employmentStatus/:id',function($id){
		$EmploymentStatusRepo = new EmploymentStatusRepository();
		$result = $EmploymentStatusRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/employmentStatus',function(){
		$EmploymentStatusRepo = new EmploymentStatusRepository();
		$result = $EmploymentStatusRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/employmentStatus/:id',function($id){
		$EmploymentStatusRepo = new EmploymentStatusRepository();
		$EmploymentStatusRepo->Delete($id);
	});
	$slim_app->post('/employmentStatus',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$EmploymentStatusRepo = new EmploymentStatusRepository();
		$r = $EmploymentStatusRepo->Transform($POST);
		$EmploymentStatusRepo->Save($r);
	});
?>