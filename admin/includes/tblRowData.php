<?php
	if($moduleName){
		$sql = "SELECT COUNT(*) AS num FROM ".$moduleName;
		$stmt = $DB->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	
	$oql = "SELECT COUNT(*) AS num FROM module_orders";
	$otmt = $DB->prepare($oql);
	$otmt->execute();
	$orow = $otmt->fetch(PDO::FETCH_ASSOC);

	$eql = "SELECT COUNT(*) AS num FROM module_enquiries";
	$etmt = $DB->prepare($eql);
	$etmt->execute();
	$erow = $etmt->fetch(PDO::FETCH_ASSOC);	
?>