<?php 
	require("includes/admin-header-open.php");
?>
    <body>
        <div class="holder">
            <div class="sidebar">
            	<?php 
					$adminPage = "home";
					include('includes/sideBar.php');
					include('includes/homePageStats.php');

					$sql = "SELECT * FROM module_orders ORDER BY id DESC LIMIT 5";
                    $q = $DB->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
				?>
            </div>
            <div class="content-wrapper">
            	<div class="top-bar">
                	<div class="breadcrumb">
                    	<a class="fa fa-home" href="home.php"></a>
					</div>
                    <div class="dev">
                    	<a class="fa fa-desktop" href="<?=SERVER;?>" title="Preview Site" target="_blank"></a>
                    </div>         
                    <div class="live">
                    	<a class="fa fa-globe" href="<?=LIVE_SERVER;?>" title="Live Site" target="_blank"></a>
                    </div>
                </div>
                
                <!-- start - include -->
                
                <div class="dash-board-items-wrapper">
				
					<!-- start - highlights -->
					
                	<ul class="no-bullets">
                        <li class="dash-board-item modules-block">
                        	<a href="modules.php" title="MODULES">
                                <div class="item-content-wrapper">
                                    <div class="item-content-inner-wrapper">
                                        <div class="icon-wrapper">
                                            <span class="icon fa fa-pencil-square-o"></span>
                                        </div>
                                        <div class="flex-wrapper">
                                            <h3>PAGES</h3>
                                            <p>Manage your content...</p>
                                            <p>Total Pages: 5</p>
                                        </div>
                                    </div>
                                </div>
                             </a>
                        </li>
                        <li class="dash-board-item media-block">
                        	<a href="mediaLib.php" title="MEDIA">
                                <div class="item-content-wrapper">
                                    <div class="item-content-inner-wrapper">
                                        <div class="icon-wrapper">
                                            <span class="icon fa fa-file-image-o"></span>
                                        </div>
                                        <div class="flex-wrapper">
                                            <h3>MEDIA MANAGER</h3>
                                            <p>Manage files stored in the media folder...</p>
                                            <p>Total Files: <?=count_files('img/uploads/');?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dash-board-item admin-block">
                        	<a href="adminTools.php" title="ADMIN TOOLS">
                                <div class="item-content-wrapper">
                                    <div class="item-content-inner-wrapper">
                                        <div class="icon-wrapper">
                                            <span class="icon fa fa-cubes"></span>
                                        </div>
                                        <div class="flex-wrapper">
                                            <h3>ADMIN TOOLS</h3>
                                            <p>Access the CMS administration tools...</p>
                                            <p>Total Tools: 2</p>
                                        </div>
                                    </div>
                                </div>
                             </a>
                        </li>
                        <li class="dash-board-item access-block">
                        	<a href="userManager.php" title="USER MANAGEE">
                                <div class="item-content-wrapper">
                                    <div class="item-content-inner-wrapper">
                                        <div class="icon-wrapper">
                                            <span class="icon fa fa-users"></span>
                                        </div>
                                        <div class="flex-wrapper">
                                            <h3>USER MANAGER</h3>
                                            <p>Manage admin accounts...</p>
                                        	<p>Total Acounts: <?=$adminAccounts;?></p>
                                        </div>
                                    </div>
                                </div>
                             </a>
                        </li>
                    </ul>
					
					<!-- end - highlights -->
					
					<!-- start - widgets -->
					
					<div class="dash-board-widget-wrapper">
					
						<div class="grid-stack-item-content">
						  <div class="card">
							<div class="card-header">Latest orders</div>
							<div class="card-block">
							  <table class="table">
								<thead>
								  <tr>
									<th width="1">#</th>
									<th>Product</th>
									<th>Status</th>
									<th>Date received</th>
									<th>Total</th>
								  </tr>
								</thead>
								<tbody>

								<?php while ($row = $q->fetch()){ ?>
								  <tr>
									<td scope="row" class="text-center"><?php echo $row["id"]; ?></td>
									<td><?php echo $row["productName"]; ?></td>
									<td width="100" title="processing"><?php echo ($row["status"] == 'active') ? 'Completed' : 'In Progress'; ?></td>
									<td width="150" title="<?php echo $row["orderdate"]; ?>"><?php echo $row["orderdate"]; ?></td>
									<td width="150">
									  <span class="price" title="<?php echo $row["price"]; ?>"><?php echo $row["price"]; ?></span>
									</td>
								  </tr>
								<?php } ?>  
								</tbody>
								
							  </table>
							</div>
						  </div>
						</div>
						
						<div class="grid-stack-item-content">
						  <div class="card salse-card">
							<div class="card-header">Salse</div>
								<div class="card-block">
									<canvas id="salesChart" width="400" height="200"></canvas>
								</div>
							</div>
						</div>
					</div>
					
					<!-- end - widgets -->
					
    			</div>
                
                <!-- end - include -->
				
            </div>

			<?php 

				$sql = "SELECT 
						MONTH(orderdate) AS month,
						SUM(price) AS total
					FROM module_orders
					WHERE YEAR(orderdate) = YEAR(CURDATE())
					AND status != 'deactive'
					GROUP BY MONTH(orderdate)
					ORDER BY MONTH(orderdate)";
					$q = $DB->query($sql);
					$q->setFetchMode(PDO::FETCH_ASSOC);

				$monthlySales = array_fill(1, 12, 0); // Months 1–12

				while ($row = $q->fetch()){
					$price = $row['total'];
					$price = str_replace('€', '', $price);
					$monthlySales[(int)$row['month']] = (float)$price;
				}
			?>
        </div>
		
		<script>
			const ctx = document.getElementById('salesChart');

			new Chart(ctx, {
			  type: 'line',
			  data: {
				labels: [
				  'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
				],
				datasets: [{
				  label: 'Sales (€)',
				  data: <?php echo json_encode(array_values($monthlySales)); ?>,
				  borderWidth: 2,
				  borderColor: 'rgba(75, 192, 192, 1)',
				  backgroundColor: 'rgba(75, 192, 192, 0.2)',
				  tension: 0.3  // smooth curve
				}]
			  },
			  options: {
				responsive: true,
				scales: {
				  y: {
					beginAtZero: true
				  }
				}
			  }
			});
		</script>
    </body>
</html>