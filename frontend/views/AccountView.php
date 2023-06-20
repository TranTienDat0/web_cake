<?php $layout = "LayoutAccount.php"; ?>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						
						<h2>Login to your account</h2>
						<form action="index.php?controller=account&action=loginPost" method="post">
							<input type="email" name="dn_email" placeholder="Email Address" />
							<input type="password" name="dn_password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					    
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<?php if(isset($_GET['notify']) && $_GET['notify']=='error'): ?>
                            <p style="color:red;">Đăng ký chưa thành công, bạn hãy kiểm tra lại thông tin!</p>      
                        <?php endif; ?>
						<form action="index.php?controller=account&action=registerPost" method="post">							
							<input type="text" name="name" placeholder="Name"/>
							<input type="email" name="email" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password"/>
							<input type="text" name="address" placeholder="Address"/>
							<input type="text" name="phone" placeholder="Phone"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->