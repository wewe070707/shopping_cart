<?php
/* Smarty version 3.1.33, created on 2019-06-13 12:28:41
  from 'C:\xampp\htdocs\shopping_cart\first.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d022559e16d90_70593414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd92789f4a82b0d349eea2dc4e059c2f4759dc45d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\first.tpl',
      1 => 1560421720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d022559e16d90_70593414 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<title>Smarty</title>
</head>
<body>
Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!
<?php echo $_SESSION['id'];?>

</body>
</html>
<?php }
}
