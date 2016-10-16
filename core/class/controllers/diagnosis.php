<?php 
	$slim_app->get('/diagnosis/:id',function($id){
		$DiagnosisRepo = new DiagnosisRepository();
		$result = $DiagnosisRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/diagnosis',function(){
		$DiagnosisRepo = new DiagnosisRepository();
		$result = $DiagnosisRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/diagnosis/:id',function($id){
		$DiagnosisRepo = new DiagnosisRepository();
		$DiagnosisRepo->Delete($id);
	});
	$slim_app->post('/diagnosis',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$DiagnosisRepo = new DiagnosisRepository();
		$r = $DiagnosisRepo->Transform($POST);
		$DiagnosisRepo->Save($r);
	});
?>