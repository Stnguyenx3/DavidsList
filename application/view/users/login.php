<div class="container main">
	
    <div class="card">

        <form class="form-signin center-block" id="login-form">

        	<h3>Login</h3>
            
            <input type="email" id="inputEmail" class="form-control center-block" placeholder="Email address" required>
			
            <input type="password" id="inputPassword" class="form-control center-block" placeholder="Password" required>
			
            <button class="btn btn-lg btn-primary btn-signin center-block" type="submit">Sign in</button>
			
			<div class="login-link">
				<a href="<?php echo URL. "home/register" ; ?>">New User?</a>
				
				<a href="#">Forgot Password?</a>
			</div>
			
        </form>

    </div>
</div>

<script src = "<?php echo URL; ?>js/user_login.js"></script>

<script>
	
	$(document).ready(function() {
		//Override the autofocus of the search bar to login input field for better usability.
		$("#search-input").blur();
		$("#inputEmail").focus();
	});

</script>