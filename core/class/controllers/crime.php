<?php 
	$slim_app->get('/crime/:id',function($id){
		$CrimeRepo = new CrimeRepository();
		$result = $CrimeRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/crime',function(){
		$CrimeRepo = new CrimeRepository();
		$result = $CrimeRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/crime/:id',function($id){
		$CrimeRepo = new CrimeRepository();
		$CrimeRepo->Delete($id);
	});
	$slim_app->post('/crime',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$CrimeRepo = new CrimeRepository();
		$r = $CrimeRepo->Transform($POST);
		$CrimeRepo->Save($r);
	});
?>