<?php
defined('DOMAIN') or die('Lỗi truy cập');
class controller
{
    var $pathview = "View/";
    var $css='';
    var $js ='';
    function render($view, $data= array(),$layout='layout')
    {
       
        $this->load('View/'.$layout.'.php', $view, $data);
    }
    //load js, load css, load phương thức, 
    function load_css($ar = array())
    {
        if(is_array($ar))
        {
            foreach ($ar as $item)
            {
                $this->css.= '<link rel="stylesheet" href="'.$item.'" />';
            }
        }
 else {
            $this->css= '<link rel="stylesheet" href="'.$ar.'" />';
        }
    }
    function load_js($ar=array())
    {
         if(is_array($ar))
        {
            foreach ($ar as $item)
            {
               $this->js.= '<script src="'.$item.'"></script>';
            }
        }
 else {
            $this->js= '<script src="'.$ar.'"></script>';
        }
    }
    function loadModule($module = array(), $path='View/Layout/')
    {
        if(is_array($module))
        {
            foreach($module as $item)
            {
                $this->load($path.$item.'.php');
            }
        }
        else
        {
            $this->load($path.$module.'.php');
        }
    }
    function LoadMenuSP($module,$path='View/Layout/')
    {
        $pathms = $path.$module.'.php';
        $loaisp = new nhomsanpham();
        $tenloaisp = $loaisp->TenNhomSanPham();
        $manhom = $loaisp->LayMaNhom();
        $data = array('lsp'=>$loaisp->DSNhomSanPham(), 'manhom'=>$manhom, 'nhom'=>$loaisp->MaNhom());
        $this->load($pathms, '', $data);
    }
    function load($path, $view='', $data= array())
    {
         extract($data);
        include_once $path;
    }
    
}
?>