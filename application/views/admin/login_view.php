<!DOCTYPE html>
<html lang="en">
<head>
	<title>Portofilio-Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/css/main.css">
<!--===============================================================================================-->

<style>
    .messageErreur p{
        color:red;
        font-size: 14px;
    }
	.logoImg{
		text-align:center;
	}
	.logoImg img{
		width: 55%;
	}
</style>
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('<?php echo base_url();?>assets/login/images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="<?php echo base_url();?>Admin/Login/verificationUser" method="post">
				<div class="logoImg">
					<img src="<?php echo base_url();?>assets/login/images/logo.png" alt="">
				</div>	
				<span class="login100-form-title p-b-37">
					Connexion
				</span>
                <?php if($this->session->flashdata('error')!= NULL):?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif;?>
                
                <span class="messageErreur">
                        <?php echo form_error('username'); ?>
                    </span>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Entrer votre nom d'utilisateur">
					<input class="input100" type="text" name="username" placeholder="Nom d'utilisateur">
					<span class="focus-input100"></span>
				</div>

                <span class="messageErreur">
                        <?php echo form_error('pass'); ?>
                    </span>
				<div class="wrap-input100 validate-input m-b-25" data-validate = "Entrer votre mot de passe">
					<input class="input100" type="password" name="pass" placeholder="Mot de passe">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Se connecter
					</button>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Mot passe oublié?
					</span>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================
	<script src="<?php echo base_url();?>assets/login/js/main.js"></script>-->

</body>
</html>
