<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <div class="container">
    	<div class="container">
    	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" style = " padding: 1em;">
    			<form role="form" method="post" action="register" autocomplete="off">
    				<h2>Please Sign Up</h2>
    				<p>Already a member? <a href='/login'>Login</a></p>
    				<hr>
    				<!-- check for any errors -->
					{if isset($error)}
						{foreach $error as $errors}
							<p class="bg-danger">{$errors}</p>
						{/foreach}
					{/if}

					{if isset($smarty.session.error)}
						<div class = "alert alert-danger">{$smarty.session.error}</div>
					{/if}
					<!-- if action is joined show sucess -->
					{if isset($smarty.get.action) and ($smarty.get.action == 'joined')}
						<h2 class='bg-success'>Registration successful, please check your email to activate your account</h2>
					{/if}
    				<div class="form-group">
    					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="{if isset($error)}{$smarty.post.username|escape}{/if}" tabindex="1">
    				</div>
    				<div class="form-group">
    					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="{if isset($error)}{$smarty.post.email|escape}{/if}" tabindex="2">
    				</div>
    				<div class="row">
    					<div class="col-xs-6 col-sm-6 col-md-6">
    						<div class="form-group">
    							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
    						</div>
    					</div>
    					<div class="col-xs-6 col-sm-6 col-md-6">
    						<div class="form-group">
    							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4">
    						</div>
    					</div>
    				</div>
    				<div class="row">
    					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
    				</div>
    			</form>
    		</div>
    	</div>

    </div>
</body>
</html>
