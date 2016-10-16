<?php 
$slim_app->get('/member/:id',function($id){
	$MemberRepo = new MemberRepository();
	$result = $MemberRepo->Get($id);
	echo json_encode($result);
});
$slim_app->get('/member',function(){
	$MemberRepo = new MemberRepository();
	$result = $MemberRepo->DataList($_GET['searchText'],$_GET['pageNo'],$_GET['pageSize']);
	 echo json_encode($result);
});
$slim_app->delete('/member/:id',function($id){
	$MemberRepo = new MemberRepository();
	 $MemberRepo->Delete($id);
});
$slim_app->post('/member',function(){
	$request = \Slim\Slim::getInstance()->request();
	$POST = json_decode($request->getBody());
	
	$MemberRepo = new MemberRepository();
	$MemberRepo->Save($MemberRepo->Transform($POST));
});
$slim_app->post('/member/changepassword',function(){
	$MemberRepo = new MemberRepository();
	 $MemberRepo->ChangePassword();
});
?>