<?php 
	$slim_app->get('/crimereportvictims/:id',function($id){
		$CrimeReportVictimsRepo = new CrimeReportVictimsRepository();
		
		$result = $CrimeReportVictimsRepo->Get($id);
		echo json_encode($result);
	});
	$slim_app->get('/crimereportvictims',function(){
		$CrimeReportVictimsRepo = new CrimeReportVictimsRepository();
		$result = $CrimeReportVictimsRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
		echo json_encode($result);
	});
	$slim_app->delete('/crimereportvictims/:id',function($id){
		$CrimeReportVictimsRepo = new CrimeReportVictimsRepository();
		$CrimeReportVictimsRepo->Delete($id);
	});
	$slim_app->post('/crimereportvictims',function(){
		$request = \Slim\Slim::getInstance()->request();
		$POST = json_decode($request->getBody());
			
		$CrimeReportVictimsRepo = new CrimeReportVictimsRepository();		
		$r = $CrimeReportVictimsRepo->Transform($POST);
		$oReturn = $CrimeReportVictimsRepo->Save($r);
		
	});
?>