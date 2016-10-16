<?php 
	$slim_app->get('/census/livelihood',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->Livelihood($_GET['DateFrom'],$_GET['DateTo']);
		echo json_encode($result);
	});
	$slim_app->get('/census/gender',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->Gender($_GET['DateFrom'],$_GET['DateTo']);
		echo json_encode($result);
	});
	$slim_app->get('/census/employmentStatus',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->EmploymentStatus($_GET['DateFrom'],$_GET['DateTo']);
		echo json_encode($result);
	});
	$slim_app->get('/census/educationalAttainment',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->EducationalAttainment($_GET['DateFrom'],$_GET['DateTo']);
		echo json_encode($result);
	});
?>