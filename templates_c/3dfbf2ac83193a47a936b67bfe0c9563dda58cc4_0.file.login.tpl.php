<?php
/* Smarty version 3.1.33, created on 2019-06-14 10:38:48
  from 'C:\xampp\htdocs\shopping_cart\view\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d035d18956bc5_53000272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dfbf2ac83193a47a936b67bfe0c9563dda58cc4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\login.tpl',
      1 => 1560501527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d035d18956bc5_53000272 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="/login" autocomplete="off">
				<h2>Please Login</h2>
				<p><a href='./home'>Back to home page</a></p>
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

				<?php if (isset($_GET['action'])) {?>
					<?php if (($_GET['action']) == 'active') {?>
						<h2 class='bg-success'>Your account is now active you may now log in</h2>
					<?php } elseif (($_GET['action']) == 'reset') {?>
						<h2 class='bg-success'>Please check your inbox for a reset link</h2>
					<?php } elseif (($_GET['action']) == 'resetAccount') {?>
						<h2 class='bg-success'>Password changed, you may now login</h2>
					<?php }?>
				<?php }?>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {
echo htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8', true);
}?>" tabindex="1">
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
<?php }
}
