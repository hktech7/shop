<?php 
$cat = "mens-accessories";
$colorCatLink = "";
if(isset($_REQUEST['cat']) && !empty($_REQUEST['cat'])){
	$cat = $_REQUEST['cat'];			
	$colorCatLink = "?cat=".$cat;
}

if(isset($_REQUEST['sb']) && !empty($_REQUEST['sb'])){
	$cat = $_REQUEST['sb'];
	$colorCatLink = "?cat=".$_REQUEST['cat']."&sb=".$_REQUEST['sb'];
	
}

if(isset($_REQUEST['searchterm']) && !empty($_REQUEST['searchterm'])){	
	$cat = "mens-".urlencode(trim($_REQUEST['searchterm']));
	$searchSring = $cat;
	$colorCatLink = "?cat=".$cat;
	
}

$brandUrl = "";
if(isset($_REQUEST['brand']) && !empty($_REQUEST['brand'])){
	$brand = $_REQUEST['brand'];	
	$brandUrl = '&fl=b'.$brand;
}

$colorUrl = "";
if(isset($_REQUEST['cl']) && !empty($_REQUEST['cl'])){
	$color = $_REQUEST['cl'];
	$colorUrl = '&fl=c'.$color;
}

if(isset($_REQUEST['searchterm']) && !empty($_REQUEST['searchterm'])){	
	$cat = "mens-".urlencode(trim($_REQUEST['searchterm']));		
}

?>
