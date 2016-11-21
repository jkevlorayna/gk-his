<?php $path = 'core/' ?> 
<?php 
session_start(); 
if(!isset($_SESSION['isAuthenticated'])){ $isAuthenticated = false; }else{ $isAuthenticated = true; }
?>
<?php include('core/header.php'); ?>
<body class="texture" ng-controller="AppMainController" ng-init="<?php echo $isAuthenticated; ?>">
<treasure-overlay-spinner active='spinner.active'>
	<div style="width:400px;" growl></div>
	  
<div id="cl-wrapper">

  <div class="cl-sidebar" ng-show="session.isAuthenticated">
    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
    <div class="cl-navblock">
      <div class="menu-space">
        <div class="content">
			<img src="core/images/logo.png" class="sidebar-logo">
          <ul class="cl-vnavigation">
			    <li><a href="#/{{Year}}"><i class="fa fa-home"></i> Home</a></li>
			    <li><a href="#/household/list/{{Year}}"><i class="fa fa-folder"></i> Household</a></li>
				<li><a href="#/user/list"><i class="fa fa-folder"></i> User List</a></li>
				<li><a href="#/user/type"><i class="fa fa-folder"></i>  User Type</a></li>
				<li><a href="#/crime/report/list"><i class="fa fa-folder"></i>  Crime Report</a></li>
		
				<li>
					<a href="#"><i class="fa fa-folder"></i><span>Selection Entry</span></a> 
					<ul class="sub-menu">						
						<li><a href="#/livelihood"><i class="fa fa-folder"></i> Livelihood </a></li>
						<li><a href="#/diagnosis"><i class="fa fa-folder"></i> Diagnosis </a></li>
						<li><a href="#/employmentStatus"><i class="fa fa-folder"></i> Employment Status </a></li>
						<li><a href="#/educationalAttainment"><i class="fa fa-folder"></i> Educational Attainment </a></li>
						<li><a href="#/year"><i class="fa fa-folder"></i> Year </a></li>
						<li><a href="#/village"><i class="fa fa-folder"></i> Village </a></li>
						<li><a href="#/crime"><i class="fa fa-folder"></i> Crime </a></li>
					</ul>		
				</li>
				<li>
					<a href="#"><i class="fa fa-folder"></i><span>Census</span></a> 
					<ul class="sub-menu">						
						<li><a href="#/census/age/{{Year}}"><i class="fa fa-folder"></i> Population by Age </a></li>
						<li><a href="#/census/populationGrowth/{{Year}}"><i class="fa fa-folder"></i> Population by Growth </a></li>
						<li><a href="#/census/gender/{{Year}}"><i class="fa fa-folder"></i> Population by Gender </a></li>
						<li><a href="#/census/village/{{Year}}"><i class="fa fa-folder"></i> Population by Village </a></li>
						<li><a href="#/census/livelihood/{{Year}}"><i class="fa fa-folder"></i>  Livelihood </a></li>
						<li><a href="#/census/employmentStatus/{{Year}}"><i class="fa fa-folder"></i> Employment Status </a></li>
						<li><a href="#/census/educationalAttainment/{{Year}}"><i class="fa fa-folder"></i> Educational Attainment </a></li>
						<li><a href="#/census/member"><i class="fa fa-folder"></i> Residence Records </a></li>

					</ul>		
				</li>
				<!-- <li><a href="#/setting"><i class="fa fa-gears"></i>  Setting</a></li> -->
          </ul>
		  
		  
		  
        </div>
      </div>
    </div>
  </div>


	
		<div class="container-fluid" id="pcont">
				
				  <div id="head-nav" class="navbar navbar-default" ng-show="session.isAuthenticated">
    <div class="container-fluid">
      <div class="navbar-collapse">
        <ul class="nav navbar-nav navbar-right user-nav">	
          <li class="dropdown profile_menu">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
				<span>Welcome: {{session.userData.name}}</span> <b class="caret"></b>
			</a>
            <ul class="dropdown-menu">
              <li><a href="javascript:void(0)" ng-click="passwordModal('md',session.userData.user_id,'Admin')"> Change Password</a></li>
			  <li class="divider"></li>
              <li><a href="javascript:void(0)" ng-click="logout()"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
          </li>
        </ul>	
			<h3><i class="fa fa-home"></i> Household Information System</h3>
      </div>
    </div>
  </div>

				
				<div class="cl-mcont main_con" ng-class="{nopadding:!session.isAuthenticated}">
						<div ui-view></div>
				</div>
	</div> 
	
</div>
</treasure-overlay-spinner>

<?php include('core/script.php') ?>

</body>
</html>
