<?php
/* Smarty version 3.1.33, created on 2019-06-25 15:35:35
  from 'C:\xampp\htdocs\shopping_cart\view\layout\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d11cec7d22883_76329768',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bc1094c5b2b7d20af7420c30b20e8037b1c17cb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\layout\\header.tpl',
      1 => 1561448132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d11cec7d22883_76329768 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <title><?php echo '<?php ';?>if(isset($title)){ echo $title; }<?php echo '?>';?></title> -->
    <?php echo '<script'; ?>
 src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src = "/view/javascript/main.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://kit.fontawesome.com/f636442e25.js"><?php echo '</script'; ?>
>
    <!-- <?php echo '<script'; ?>
 src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" data-search-pseudo-elements><?php echo '</script'; ?>
> -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/css/main.css" rel="stylesheet">

</head>
<body style="background: rgb(245, 245, 245);">
    <div id="app">
        <nav class="nav  navbar-fixed-top" style = "background-color: #3e3b3b;padding: 2em">
            <div class = "container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home"></a>
                    <ul class="navbar-nav" style = "list-style-type:none;">
                        <?php if (isset($_SESSION['level'])) {?>
                            <?php if ($_SESSION['level'] == "admin") {?>
                                <li>
                                    <a class="nav-link" href="/admin_home"><h3>Home</h3></a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a class="nav-link" href="/home"><h3>Home</h3></a>
                                </li>
                            <?php }?>
                        <?php }?>
                    </ul>
                </div>
                <div>

                    <?php if (isset($_SESSION['username'])) {?>
                        <ul class="nav navbar-nav navbar-right" >
                            <li class="dropdown" style = "display:inline-flex;  padding-right: 3em;">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <?php if ($_SESSION['level'] == "admin") {?>
                                        <span class="glyphicon glyphicon-user"></span>
                                        <?php echo $_SESSION['username'];?>
 (Admin)
                                    <?php } else { ?>
                                        <img src = "uploads/<?php echo $_SESSION['avatar'];?>
" style = "width:32px;height:32px;border-radius:50%;">
                                        <?php echo $_SESSION['username'];?>

                                    <?php }?>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <?php if ($_SESSION['level'] == "admin") {?>
                                        <li>
                                            <!-- <a data-toggle="tab" href="#"><span class="glyphicon glyphicon-user"></span> Admin</a> -->
                                            <a class = "dropdown=item" href = "admin_home">Management</a>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a class = "dropdown-item" href = "profile">Personal Profile</a>
                                        </li>
                                    <?php }?>
                                    <li>
                                        <a class="dropdown-item" href="logout" onclick="return confirm('確認登出?')">
                                           登出
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
                            <!-- <li><a data-toggle="tab" href="#">Log out</a></li> -->
                            <!-- <li><a data-toggle="tab" href="#"><span class="glyphicon glyphicon-user"></span> Admin</a></li> -->
                        </ul>
                    <?php }?>
                </div>
            </div>
        </nav>
    </div>
<?php }
}
