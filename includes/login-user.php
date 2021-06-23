<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Elegant Modal Login Modal Form with Avatar Icon</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<style>

	.modal-dialog-centered  .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
		top: 30px;
	}
	.modal-dialog-centered .modal-header {
		border-bottom: none;   
        position: relative;
        justify-content: center;
	}
	.modal-dialog-centered h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-dialog-centered .form-control:focus {
		border-color: #70c5c0;
	}
	.modal-dialog-centered .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-dialog-centered .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-dialog-centered .modal-footer {
		background: #ecf0f1;
		border-color: #dee4e7;
		text-align: center;
        justify-content: center;
		margin: 0 -20px -20px;
		border-radius: 5px;
		font-size: 13px;
	}
	.modal-dialog-centered .modal-footer a {
		color: #999;
	}		
	.modal-dialog-centered .avatar {
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #60c7c1;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-dialog-centered .avatar img {
		width: 100%;
	}
    .modal-dialog-centered .btn {
        color: #fff;
        border-radius: 4px;
		background: #60c7c1;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-dialog-centered .btn:hover, .modal-login .btn:focus {
		background: #45aba6;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
</head>
<body>

<!-- Modal HTML -->
<div id="myModal" class="modal fade" style="z-index: 999999;">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="img/Avatar.png" alt="Avatar">
				</div>				
				<h4 class="modal-title">Member Login</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="check_login.php" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username" required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">	
					</div>        
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">เข้าสู่ระบบ</button>
					</div>
				</form>

				<div class="col-4" style="text-align: center;"> หรือ </div>

				<div class="form-group">
					<a href="register.php"><button class="btn btn-secondary btn-lg btn-block login-btn">สมัครสมาชิก</button></a>
				</div>
			</div>
			<div class="modal-footer">
				<a href="forgot_pass.php">Forgot Password?</a>
			</div>
		</div>
	</div>
</div>     
</body>
</html>