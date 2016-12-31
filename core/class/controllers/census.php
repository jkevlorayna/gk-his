<?php 
	$slim_app->get('/census/crime',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->Crime($_GET['DateFrom'],$_GET['DateTo']);
		echo json_encode($result);
	});
	$slim_app->get('/census/village',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->Village($_GET['DateFrom'],$_GET['DateTo'],$_GET['Village']);
		echo json_encode($result);
	});
	$slim_app->get('/census/livelihood',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->Livelihood($_GET['DateFrom'],$_GET['DateTo'],$_GET['Village']);
		echo json_encode($result);
	});
	$slim_app->get('/census/gender',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->Gender($_GET['DateFrom'],$_GET['DateTo'],$_GET['Village']);
		echo json_encode($result);
	});
	$slim_app->get('/census/employmentStatus',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->EmploymentStatus($_GET['DateFrom'],$_GET['DateTo'],$_GET['Village']);
		echo json_encode($result);
	});
	$slim_app->get('/census/educationalAttainment',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->EducationalAttainment($_GET['DateFrom'],$_GET['DateTo'],$_GET['Village']);
		echo json_encode($result);
	});
	$slim_app->get('/census/populationGrowth',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->PopulationGrowth($_GET['DateFrom'],$_GET['DateTo']);
		echo json_encode($result);
	});
	$slim_app->get('/census/age',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->Age($_GET['DateFrom'],$_GET['DateTo']);
		echo json_encode($result);
	});
?>