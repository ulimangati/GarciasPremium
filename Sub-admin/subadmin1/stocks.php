<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Stocks</li>
			</ol>
		</div><!--/.row-->
		
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
				<h1 class="h2">Stocks</h1>
			</div>

			<?php
				$sql = "SELECT * from ((stock left join products on stock.productid = products.productid)
				left join branch on stock.branchid = branch.branchid) where branch.branchid = 1";
				$result = mysqli_query($conn, $sql);				
			?>

			<div class="table-responsive">
				<table class="table table-bordered table-striped table-sm">
					<thead>
						<tr>
							<th>Product</th>
							<th>Qty / Kg</th>
						</tr>
					</thead>
					<tbody>

					<?php
						if($result = mysqli_query($conn, $sql)) {
							while($row = mysqli_fetch_assoc($result)){ 
					?>
						<tr>
							<td> <?php echo $row["productname"]; ?> </td>
							<td> <?php echo $row["quantity"]; ?> </td>
						</tr>

					<?php
							}
						}
					?>

					</tbody>
				</table>
			</div>

			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
				<h1 class="h4">Remarks: <em class="fa fa-warning"></em>  This symbolized that the product is in critical level</h1>
			</div>

		</main>
		
		</div><!--/.row-->
	</div>	<!--/.main-->
		
</body>
</html>