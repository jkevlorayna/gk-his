<?php 
	$slim_app->get('/village/:id',function($id){
		$VillageRepo = new VillageRepository();
		$result = $VillageRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/village',function(){
		$VillageRepo = new VillageRepository();
		$result = $VillageRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/village/:id',function($id){
		$VillageRepo = new VillageRepository();
		$VillageRepo->Delete($id);
	});
	$slim_app->post('/village',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$VillageRepo = new VillageRepository();
		$r = $VillageRepo->Transform($POST);
		$VillageRepo->Save($r);
	});
?>