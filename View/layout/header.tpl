<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <title><?php if(isset($title)){ echo $title; }?></title> -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src = "/view/javascript/main.js"></script>
    <script src="https://kit.fontawesome.com/f636442e25.js"></script>
    <!-- <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" data-search-pseudo-elements></script> -->
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
                        {if isset($smarty.session.level)}
                            {if $smarty.session.level eq "admin"}
                                <li>
                                    <a class="nav-link" href="/admin_home"><h3>Home</h3></a>
                                </li>
                            {else}
                                <li>
                                    <a class="nav-link" href="/home"><h3>Home</h3></a>
                                </li>
                            {/if}
                        {/if}
                    </ul>
                </div>
                <div>

                    {if isset($smarty.session.username)}
                        <ul class="nav navbar-nav navbar-right" >
                            <li class="dropdown" style = "display:inline-flex;  padding-right: 3em;">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    {if $smarty.session.level eq "admin"}
                                        <span class="glyphicon glyphicon-user"></span>
                                        {$smarty.session.username} (Admin)
                                    {else}
                                        <img src = "uploads/{$smarty.session.avatar}" style = "width:32px;height:32px;border-radius:50%;">
                                        {$smarty.session.username}
                                    {/if}
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    {if $smarty.session.level eq "admin"}
                                        <li>
                                            <!-- <a data-toggle="tab" href="#"><span class="glyphicon glyphicon-user"></span> Admin</a> -->
                                            <a class = "dropdown=item" href = "admin_home">Management</a>
                                        </li>
                                    {else}
                                        <li>
                                            <a class = "dropdown-item" href = "profile">Personal Profile</a>
                                        </li>
                                    {/if}
                                    <li>
                                        <a class="dropdown-item" href="logout" onclick="return confirm('確認登出?')">
                                           登出
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    {else}
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
                            <!-- <li><a data-toggle="tab" href="#">Log out</a></li> -->
                            <!-- <li><a data-toggle="tab" href="#"><span class="glyphicon glyphicon-user"></span> Admin</a></li> -->
                        </ul>
                    {/if}
                </div>
            </div>
        </nav>
    </div>
