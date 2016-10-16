<?php 
	$slim_app->get('/year/:id',function($id){
		$YearRepo = new YearRepository();
		$result = $YearRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/year',function(){
		$YearRepo = new YearRepository();
		$result = $YearRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/year/:id',function($id){
		$YearRepo = new YearRepository();
		$YearRepo->Delete($id);
	});
	$slim_app->post('/year',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$YearRepo = new YearRepository();
		$r = $YearRepo->Transform($POST);
		$YearRepo->Save($r);
	});
?>