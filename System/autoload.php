<?php
ob_start();
session_start();
spl_autoload_register(function($classname){// autoload class nào được new
    
    $pathcontroller = "Controller/$classname.php";
    $pathmodel = "Model/$classname.php";
    $pathsystemconfig ="System/config/config.php";
    $pathsystemdefine = "System/define/define.php";
    $pathsystemdb = "System/db/$classname.php";
    $pathsystemlib = "System/libs/function.php";
    $pathdbconfig = "System/config/$classname.php";
    $pathphpmailer = "System/mail/class.phpmailer.php";
    $pathsmtp = "System/mail/class.smtp.php";
    $pathmailer = "System/mail/mailer.php";
    if(file_exists($pathsystemdefine))
    {
        include_once "$pathsystemdefine";
    }
    if(file_exists($pathsystemconfig))
    {
        include_once "$pathsystemconfig";
    }
    if(file_exists($pathsystemlib))
    {
        include_once "$pathsystemlib";
    }
    if(file_exists($pathcontroller))
    {
        include_once "$pathcontroller";
    }
    if(file_exists($pathsystemdb))
    {
         include_once "$pathsystemdb";;
    }
    if(file_exists($pathdbconfig))
    {
         include_once "$pathdbconfig";
    }
    if(file_exists($pathmodel))
    {
        include_once "$pathmodel";
    }
    
    if(file_exists($pathmailer))
    {
        include_once "$pathmailer";
    }
})

?>