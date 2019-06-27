<?php
session_start();
require('vendor/autoload.php'); // 載入 composer
require('route.php');
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
// require 'libs/Smarty.class.php';
// $smarty = new Smarty;

// if(isset($_GET['page']) AND !empty($_GET['page'])){
//     $page = $_GET['page'];
// }else{
//     $page = "main";
// }
//
// // include dirname(__FILE__) . '/View/header.php'; // 載入共用的頁首
// switch($page){  // 依照 GET 參數載入共用的內容
//     case "list":
//       include('list.php');
//     break;
// }
// // include dirname(__FILE__) . '/View/footer.php'; // 載入共用的頁尾
