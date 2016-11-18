<div class="container">
	
    <div class="card">

        <form class="form-signin center-block" id="login-form">
            
            <input type="email" id="inputEmail" class="form-control center-block" placeholder="Email address" required>
			
            <input type="password" id="inputPassword" class="form-control center-block" placeholder="Password" required>
			
            <button class="btn btn-lg btn-success btn-signin center-block" type="submit">Sign in</button>
			
			<div class="login-link">
				<a href="<?php echo URL. "home/register" ; ?>">Sign up!</a>
				
				<a href="#">Forgot Password?</a>
			</div>
			
        </form>

    </div>
</div>

<script src = "<?php echo URL; ?>js/user_login.js"></script>
<script type="text/javascript">

</script>