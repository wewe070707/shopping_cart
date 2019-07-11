<?php
/* Smarty version 3.1.33, created on 2019-07-11 10:33:45
  from 'C:\xampp\htdocs\shopping_cart\view\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d26a00923d975_96950063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6155fd3a762a32e8ee96c64e878f8f79d78494cc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\register.tpl',
      1 => 1562812424,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d26a00923d975_96950063 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
					<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error']->value, 'errors');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['errors']->value) {
?>
							<p class="bg-danger"><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</p>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php }?>

					<?php if (isset($_SESSION['error'])) {?>
						<div class = "alert alert-danger"><?php echo $_SESSION['error'];?>
</div>
					<?php }?>
					<!-- if action is joined show sucess -->
					<?php if (isset($_GET['action']) && ($_GET['action'] == 'joined')) {?>
						<h2 class='bg-success'>Registration successful, please check your email to activate your account</h2>
					<?php }?>
    				<div class="form-group">
    					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {
echo htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8', true);
}?>" tabindex="1">
    				</div>
    				<div class="form-group">
    					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {
echo htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8', true);
}?>" tabindex="2">
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
<?php }
}
