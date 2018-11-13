<?php
include 'System/autoload.php';

if(isset($_COOKIE['login']) && $_COOKIE['login'])
{
    $_SESSION['login'] = true;
    $_SESSION['ten'] = $_COOKIE['ten'];
    $_SESSION['ma'] = $_COOKIE['ma'];
}


$controller = isset($_GET['controller']) && $_GET['controller'] ? $_GET['controller'] : 'HeThong';
$action = isset($_GET['action']) && $_GET['action'] ? $_GET['action'] : 'TrangChu';
$path = 'Controller/'.$controller.'_controller.php';
if(file_exists($path))
{
    include $path;
    $classname = $controller.'_controller';
    if(class_exists($classname))
    {
        $obj = new $classname();
        if(method_exists($obj, $action))
        {
            $obj->$action();
        }
        else 
        {
            //include_once 'Controller/hethong_controller.php';//sử dụng autoload
            $c = new hethong_controller();
            $c->trang404();
        }
    }
 else {
        //include_once 'Controller/hethong_controller.php';
        $c = new hethong_controller();
        $c->trang404();
    }
}
else
{
    //include_once 'Controller/hethong_controller.php';
    $c = new hethong_controller();
    $c->trang404();
}
 ob_end_flush();

?>