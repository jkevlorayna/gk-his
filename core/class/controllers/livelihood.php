<?php 
	$slim_app->get('/livelihood/:id',function($id){
		$LivelihoodRepo = new LivelihoodRepository();
		$result = $LivelihoodRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/livelihood',function(){
		$LivelihoodRepo = new LivelihoodRepository();
		$result = $LivelihoodRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/livelihood/:id',function($id){
		$LivelihoodRepo = new LivelihoodRepository();
		$LivelihoodRepo->Delete($id);
	});
	$slim_app->post('/livelihood',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$LivelihoodRepo = new LivelihoodRepository();
		$r = $LivelihoodRepo->Transform($POST);
		$LivelihoodRepo->Save($r);
	});
?>