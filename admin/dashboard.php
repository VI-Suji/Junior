<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
?>
	<!doctype html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">

		<title>Admin Dashboard</title>

		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<?php include('includes/header.php'); ?>

		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Dashboard</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email`";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														<div class="stat-panel-title text-uppercase">Total Users</div>
													</div>
												</div>
												<a href="finance.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
									</div>
									<div class="row">
										<h1>MECHANICAL</h1>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='M1A'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='M1A'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : M1A</div>
														

														<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='M1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='M1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : M1B</div>
														

<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='M1C'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='M1C'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : M1C</div>
														

<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>													</div>
												</div>
											</div>
										</div>
										</div>
									<div class="row">
										<h1>ELECTRONICS</h1>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='T1A'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='T1A'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : T1A</div>
														

<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='T1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='T1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : T1B</div>
														

<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>													</div>
												</div>
											</div>
										</div>
										</div>
									<div class="row">
										<h1>ELECTRICAL</h1>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='E1A'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='E1A'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : E1A</div>
														

<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='E1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='E1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : E1B</div>
														

<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>													</div>
												</div>
											</div>
										</div>
										</div>
									<div class="row">
										
										<h1>CHEMICAL</h1>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='H1'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='H1'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : H1</div>

	
	<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>												</div>
												</div>
											</div>
										</div>
										</div>
									<div class="row">
										<h1>ARCHITECTURE</h1>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='AR1A'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='AR1A'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : AR1A</div
														>
														<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='AR1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='AR1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : AR1B</div
														>
														<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>
													</div>
												</div>
											</div>
										</div>
										</div>
									<div class="row">
										<h1>COMPUTER-SCIENCE</h1>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='R1A'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														$sql = "SELECT * FROM register r WHERE `register`.`batch`='R1A' AND NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0)";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : R1A</div>
														

<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='R1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='R1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : R1B</div>
														

<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>													</div>
												</div>
											</div>
										</div>
										</div>
									<div class="row">
										<h1>CIVIL</h1>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='C1A'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														?>
														<?php
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='C1A'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : C1A</div>
														

<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT `user_id` from `payments`,`register` WHERE `payments`.`user_id` = `register`.`email` and `register`.`batch`='C1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg = $query->rowCount();
														$sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) and `register`.`batch`='C1B'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$bg1 = $query->rowCount();
														?>
														
														<div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
														
														<div class="stat-panel-title text-uppercase">TOTAL USERS : C1B</div>
														

<div class="stat-panel-title text-uppercase">TOTAL UNPAID : <?php echo htmlentities($bg1); ?></div>													</div>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>

		<script>
			window.onload = function() {

				// Line chart from swirlData for dashReport
				var ctx = document.getElementById("dashReport").getContext("2d");
				window.myLine = new Chart(ctx).Line(swirlData, {
					responsive: true,
					scaleShowVerticalLines: false,
					scaleBeginAtZero: true,
					multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
				});

				// Pie Chart from doughutData
				var doctx = document.getElementById("chart-area3").getContext("2d");
				window.myDoughnut = new Chart(doctx).Pie(doughnutData, {
					responsive: true
				});

				// Dougnut Chart from doughnutData
				var doctx = document.getElementById("chart-area4").getContext("2d");
				window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {
					responsive: true
				});

			}
		</script>
	</body>

	</html>
<?php } ?>