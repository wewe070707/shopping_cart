<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="/login" autocomplete="off">
				<h2>Please Login</h2>
				<p><a href='./home'>Back to home page</a></p>
				<hr>

				<!-- check for any errors -->
				{if isset($error)}
					{foreach $error as $errors}
						<p class="bg-danger">{$errors}</p>
					{/foreach}
				{/if}

				{if isset($smarty.get.action)}
					{if ($smarty.get.action) == 'active'}
						<h2 class='bg-success'>Your account is now active you may now log in</h2>
					{elseif ($smarty.get.action) == 'reset'}
						<h2 class='bg-success'>Please check your inbox for a reset link</h2>
					{elseif ($smarty.get.action) == 'resetAccount'}
						<h2 class='bg-success'>Password changed, you may now login</h2>
					{/if}
				{/if}

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="{if isset($error)}{$smarty.post.username|escape}{/if}" tabindex="1">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>

				<div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9">
						 <!-- <a href='reset'>Forgot your Password?</a> -->
						 <a href='register'>Register account</a>
					</div>
				</div>

				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
		</div>
	</div>
</div>
