<?php 
	$slim_app->get('/relationship/:id',function($id){
		$RelationshipRepo = new RelationshipRepository();
		$result = $RelationshipRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/relationship',function(){
		$RelationshipRepo = new RelationshipRepository();
		$result = $RelationshipRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/relationship/:id',function($id){
		$RelationshipRepo = new RelationshipRepository();
		$RelationshipRepo->Delete($id);
	});
	$slim_app->post('/relationship',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$RelationshipRepo = new RelationshipRepository();
		$r = $RelationshipRepo->Transform($POST);
		$RelationshipRepo->Save($r);
	});
?>