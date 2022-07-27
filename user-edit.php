<?php 

    require_once("connection.php");
    $user_id = $_GET['userID'];
    $query = "select * from user where user_id='".$user_id."'";
    $result = mysqli_query($db,$query);

    while($row=mysqli_fetch_assoc($result)){
        $user_id = $row['user_id'];
        $user_type = $row['user_type'];
        $f_name = $row['f_name'];
        $l_name = $row['l_name'];
        $username = $row['username'];
        $phone_number = $row['phone_number'];
        $email = $row['email'];
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<style>
			<?php include "css/style.css" ?>
		</style>
        <title>CMS | User Edit</title>
    </head>
    <body>
        <section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="my-3">
							<h2 class="heading-section">Edit User Information</h2>
						</div>
						<div class="login-wrap py-0">
							<form method="post" action="update.php?userID=<?php echo $user_id; ?>" id="class="login-form">
								<span>Select user type:</span>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="user_type" id="employee" value="employee" checked>
									<label class="form-check-label" for="employee">
										Employee
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="user_type" id="admin" value="admin">
									<label class="form-check-label" for="admin">
										Admin
									</label>
								</div>
								<div id="temp_occupation"></div>
								<div id="occupation">
									<span>Select your occupation:</span>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="court_official" value="court_official" checked>
										<label class="form-check-label" for="court_official">
											Court Official
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="record_officer" value="record_officer">
										<label class="form-check-label" for="record_officer">
											Record Officer
										</label>
									</div>
								</div>
								<div class="form-group mb-3">
									<label class="form-label">First Name</label>
									<input type="text" name="f_name" class="form-control" value="<?php echo $f_name ?>" required>
								</div>
								<div class="form-group mb-3">
									<label class="form-label">Last Name</label>
									<input type="text" name="l_name" class="form-control" value="<?php echo $l_name ?>" required>
								</div>
								<div class="form-group mb-3">
									<label class="form-label">Phone Number</label>
									<input type="text" name="phone_number" class="form-control" value="<?php echo $phone_number ?>" minlength="10" required>
								</div>
								<div class="form-group mb-3">
									<label class="form-label">Username</label>
									<input type="text" name="username" class="form-control" value="<?php echo $username ?>" required>
								</div>
                                <div class="form-group mb-3">
									<label class="form-label">Email</label>
									<input type="email" name="email" class="form-control" value="<?php echo $email ?>" required>
								</div>
								<div class="form-group mb-3" >
									<button type="submit" name="update" class="btn form-control btn-primary rounded submit px-3 btn-custom">Update</button>
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