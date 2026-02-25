<?php 
	require("includes/admin-header-open.php"); 
	$moduleName = 'module_orders';
	include('includes/tblRowData.php');
?>
<body>
<div class="holder">
    <div class="sidebar">
		<?php 
            $adminPage = "adminTools";
            include('includes/sideBar.php'); 
        ?>
    </div>
    <div class="content-wrapper">
    	<div class="top-bar">
            <div class="breadcrumb">
                <a class="fa fa-home" href="home.php"></a> <span>/</span> <span>Admin Tools</span>
            </div>
            <div class="dev">
				<a class="fa fa-desktop" href="<?=SERVER;?>" title="Preview Site" target="_blank"></a>
			</div>         
			<div class="live">
				<a class="fa fa-globe" href="<?=LIVE_SERVER;?>" title="Live Site" target="_blank"></a>
			</div>
        </div>
        <div class="inner-wrapper">
         	<h2 class="section-heading">Tools</h2>
            <ul class="modules">
				<li><a href='reviewData.php?m=module_orders'><span class="icon-font fa fa-birthday-cake">Orders</span><span class="details">Total records: <?php echo $orow['num']; ?></span></a></li>
				<li><a href='enquiryData.php?m=module_enquiries'><span class="icon-font fa fa-address-card-o">Enquiry</span><span class="details">Total records: <?php echo $erow['num'];?></span></a></li>
            </ul>
        </div>
    </div>
</div>  
</body>
</html>

