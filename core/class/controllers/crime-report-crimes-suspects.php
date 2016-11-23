<?php 
	$slim_app->get('/crimereportsuspects/:id',function($id){
		$CrimeReportSuspectsRepo = new CrimeReportSuspectsRepository();
		
		$result = $CrimeReportSuspectsRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/crimereportsuspects',function(){
		$CrimeReportSuspectsRepo = new CrimeReportSuspectsRepository();
		$result = $CrimeReportSuspectsRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/crimereportsuspects/:id',function($id){
		$CrimeReportSuspectsRepo = new CrimeReportSuspectsRepository();
		$CrimeReportSuspectsRepo->Delete($id);
	});
	$slim_app->post('/crimereportsuspects',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$CrimeReportSuspectsRepo = new CrimeReportSuspectsRepository();		
		$r = $CrimeReportSuspectsRepo->Transform($POST);
		$oReturn = $CrimeReportSuspectsRepo->Save($r);
		
	});
?>