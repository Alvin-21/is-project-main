<?php
	session_start(); 

	if (!isset($_SESSION['is_logged_in'])) {
		header('location: login.php');
	}

    require_once("connection.php");
    $file_id = $_GET['fileID'];
    $query = "select * from case_file where file_id='".$file_id."'";
    $result = mysqli_query($db, $query);

    while($row=mysqli_fetch_assoc($result)){
        $file_id = $row['file_id'];
        $user_id = $row['user_id'];
        $file_name = $row['file_name'];
        $case_number = $row['case_number'];
        $description = $row['description'];
    }
?>


<?php include('process.php') ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		<?php include "css/style.css" ?>
	</style>
	<title>CMS | Case Upload</title>
</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="my-3">
						<h2 class="heading-section">Case Upload Form</h2>
					</div>
					<div class="login-wrap py-0">
						<form method="post" action="case-file-update.php?fileID=<?php echo $file_id; ?>">
							<div>
								<?php if (isset($_SESSION['err'])) : ?>
									<div class="error">
										<p>
											<?php
											echo $_SESSION['err'];
											unset($_SESSION['err']);
											?>
										</p>
									</div>
								<?php endif ?>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">File Name</label>
								<input type="text" name="file_name" class="form-control" value="<?php echo $file_name ?>" required>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Case Number</label>
								<input type="text" name="case_number" class="form-control" value="<?php echo $case_number ?>" required>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Case Description</label>
								<input type="text" name="description" class="form-control" value="<?php echo $description ?>" required>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Case File</label>
								<input type="file" name="case_file" class="form-control" required>
							</div>
							<div class="form-group mb-3">
								<button type="submit" name="update_file" class="btn form-control btn-primary rounded submit px-3 btn-custom">Upload</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Jquery JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- Script JS -->
	<script src="js/script.js"></script>
</body>

</html>