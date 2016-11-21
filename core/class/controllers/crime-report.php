<?php 
	$slim_app->get('/crimereport/:id',function($id){
		$CrimeReportRepo = new CrimeReportRepository();
		$result = $CrimeReportRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/crimereport',function(){
		$CrimeReportRepo = new CrimeReportRepository();
		$result = $CrimeReportRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/crimereport/:id',function($id){
		$CrimeReportRepo = new CrimeReportRepository();
		$CrimeReportRepo->Delete($id);
	});
	$slim_app->post('/crimereport',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$CrimeReportRepo = new CrimeReportRepository();
		$r = $CrimeReportRepo->Transform($POST);
		$CrimeReportRepo->Save($r);
	});
?>