<?php 
	$slim_app->get('/crimereport/:id',function($id){
		$CrimeReportRepo = new CrimeReportRepository();
		$CrimeReportCrimesRepo = new CrimeReportCrimesRepository();
		$CrimeReportSuspectsRepo = new CrimeReportSuspectsRepository();
		$CrimeReportVictimsRepo = new CrimeReportVictimsRepository();
		
		$result = $CrimeReportRepo->Get($id);
		$result->Crimes = $CrimeReportCrimesRepo->GetByCrimeReportId($id);
		$result->Suspects = $CrimeReportSuspectsRepo->GetByCrimeReportId($id);
		$result->Victims = $CrimeReportVictimsRepo->GetByCrimeReportId($id);
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
		$CrimeReportCrimesRepo = new CrimeReportCrimesRepository();
		$CrimeReportSuspectsRepo = new CrimeReportSuspectsRepository();
		$CrimeReportVictimsRepo = new CrimeReportVictimsRepository();
		
		$r = $CrimeReportRepo->Transform($POST);
		$oReturn = $CrimeReportRepo->Save($r);
		
		foreach($POST->Crimes as  $row){
			$row->CrimeReportId = $oReturn->Id;
			$CrimeReportCrimesRepo->Save($CrimeReportCrimesRepo->Transform($row));
		}
		foreach($POST->Victims as  $row){
			$row->CrimeReportId = $oReturn->Id;
			$CrimeReportVictimsRepo->Save($CrimeReportVictimsRepo->Transform($row));
		}
		foreach($POST->Suspects as  $row){
			$row->CrimeReportId = $oReturn->Id;
			$CrimeReportSuspectsRepo->Save($CrimeReportSuspectsRepo->Transform($row));
		}
	});
?>