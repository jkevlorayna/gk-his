<?php 
	$slim_app->get('/crimereportcrimes/:id',function($id){
		$CrimeReportCrimesRepo = new CrimeReportCrimesRepository();
		
		$result = $CrimeReportCrimesRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/crimereportcrimes',function(){
		$CrimeReportCrimesRepo = new CrimeReportCrimesRepository();
		$result = $CrimeReportCrimesRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/crimereportcrimes/:id',function($id){
		$CrimeReportCrimesRepo = new CrimeReportCrimesRepository();
		$CrimeReportCrimesRepo->Delete($id);
	});
	$slim_app->post('/crimereportcrimes',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$CrimeReportCrimesRepo = new CrimeReportCrimesRepository();		
		$r = $CrimeReportCrimesRepo->Transform($POST);
		$oReturn = $CrimeReportCrimesRepo->Save($r);
		
	});
?>