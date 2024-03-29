<?php
// This script and data application were generated by AppGini 5.51
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/Ads.php");
	include("$currDir/Ads_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('Ads');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "Ads";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"`Ads`.`id`" => "id",
		"`Ads`.`CreatedOn`" => "CreatedOn",
		"`Ads`.`NickName`" => "NickName",
		"`Ads`.`Sex`" => "Sex",
		"`Ads`.`Age`" => "Age",
		"`Ads`.`Status`" => "Status",
		"`Ads`.`InterestedIn`" => "InterestedIn",
		"`Ads`.`Pic1`" => "Pic1",
		"`Ads`.`Pic2`" => "Pic2",
		"`Ads`.`Pic3`" => "Pic3",
		"`Ads`.`MoreInfo`" => "MoreInfo",
		"`Ads`.`Contact`" => "Contact"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`Ads`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => '`Ads`.`Age`',
		6 => 6,
		7 => 7,
		8 => 8,
		9 => 9,
		10 => 10,
		11 => 11,
		12 => 12
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"`Ads`.`id`" => "id",
		"`Ads`.`CreatedOn`" => "CreatedOn",
		"`Ads`.`NickName`" => "NickName",
		"`Ads`.`Sex`" => "Sex",
		"`Ads`.`Age`" => "Age",
		"`Ads`.`Status`" => "Status",
		"`Ads`.`InterestedIn`" => "InterestedIn",
		"`Ads`.`Pic1`" => "Pic1",
		"`Ads`.`Pic2`" => "Pic2",
		"`Ads`.`Pic3`" => "Pic3",
		"`Ads`.`MoreInfo`" => "MoreInfo",
		"`Ads`.`Contact`" => "Contact"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"`Ads`.`id`" => "ID",
		"`Ads`.`CreatedOn`" => "CreatedOn",
		"`Ads`.`NickName`" => "NickName",
		"`Ads`.`Sex`" => "Sex",
		"`Ads`.`Age`" => "Age",
		"`Ads`.`Status`" => "Status",
		"`Ads`.`InterestedIn`" => "InterestedIn",
		"`Ads`.`Pic1`" => "Pictures1",
		"`Ads`.`Pic2`" => "Pic2",
		"`Ads`.`Pic3`" => "Pic3",
		"`Ads`.`MoreInfo`" => "MoreInfo",
		"`Ads`.`Contact`" => "Contact"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"`Ads`.`id`" => "id",
		"`Ads`.`CreatedOn`" => "CreatedOn",
		"`Ads`.`NickName`" => "NickName",
		"`Ads`.`Sex`" => "Sex",
		"`Ads`.`Age`" => "Age",
		"`Ads`.`Status`" => "Status",
		"`Ads`.`InterestedIn`" => "InterestedIn",
		"`Ads`.`Pic1`" => "Pic1",
		"`Ads`.`Pic2`" => "Pic2",
		"`Ads`.`Pic3`" => "Pic3",
		"`Ads`.`MoreInfo`" => "MoreInfo",
		"`Ads`.`Contact`" => "Contact"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom="`Ads` ";
	$x->QueryWhere='';
	$x->QueryOrder='';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 0;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "Ads_view.php";
	$x->RedirectAfterInsert = "Ads_view.php?SelectedID=#ID#";
	$x->TableTitle = "Ads";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`Ads`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("CreatedOn", "NickName", "Sex", "Age", "Status", "InterestedIn", "Pictures1", "Pic2", "Pic3", "MoreInfo", "Contact");
	$x->ColFieldName = array('CreatedOn', 'NickName', 'Sex', 'Age', 'Status', 'InterestedIn', 'Pic1', 'Pic2', 'Pic3', 'MoreInfo', 'Contact');
	$x->ColNumber  = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);

	$x->Template = 'templates/Ads_templateTV.html';
	$x->SelectedTemplate = 'templates/Ads_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `Ads`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='Ads' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `Ads`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='Ads' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`Ads`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: Ads_init
	$render=TRUE;
	if(function_exists('Ads_init')){
		$args=array();
		$render=Ads_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: Ads_header
	$headerCode='';
	if(function_exists('Ads_header')){
		$args=array();
		$headerCode=Ads_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: Ads_footer
	$footerCode='';
	if(function_exists('Ads_footer')){
		$args=array();
		$footerCode=Ads_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>