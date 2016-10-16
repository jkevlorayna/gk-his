<?php 
	$slim_app->get('/EducationalAttainment/:id',function($id){
		$EducationalAttainmentRepo = new EducationalAttainmentRepository();
		$result = $EducationalAttainmentRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/EducationalAttainment',function(){
		$EducationalAttainmentRepo = new EducationalAttainmentRepository();
		$result = $EducationalAttainmentRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/EducationalAttainment/:id',function($id){
		$EducationalAttainmentRepo = new EducationalAttainmentRepository();
		$EducationalAttainmentRepo->Delete($id);
	});
	$slim_app->post('/EducationalAttainment',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$EducationalAttainmentRepo = new EducationalAttainmentRepository();
		$r = $EducationalAttainmentRepo->Transform($POST);
		$EducationalAttainmentRepo->Save($r);
	});
?>