<?php 
	$slim_app->get('/census/livelihood',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->Livelihood($_GET['year']);
		echo json_encode($result);
	});
	$slim_app->get('/census/gender',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->Gender($_GET['year']);
		echo json_encode($result);
	});
	$slim_app->get('/census/employmentStatus',function(){
		$CensusRepo = new CensusRepository();
		$result = $CensusRepo->EmploymentStatus($_GET['year']);
		echo json_encode($result);
	});
	
?>