<?php
class nhomtin_controller extends controller
{
    function __construct() {
        $this->pathview='View/NhomTin/';
    }
    function DSNhomTin()
    {
        $nhomtin=new nhomtin();
        $data = array('dsnt'=>$nhomtin->DSNhomTin());
        $this->render('DSNhomTin', $data);
    }
    function CapNhatNhomTin()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $ma = $_GET['ma'];
            $nhomtin= new nhomtin();
            $ctnt = $nhomtin->ChiTietNhomTin($ma);
            $tb='';
            $data = array('ctnt'=>$ctnt, 'tb'=>$tb);
            
            if(isset($_POST['capnhat']))
            {
               
                if(isset($_POST['ten'], $_POST['tragthai'], $_POST['alias']) && trim($_POST['ten']) && trim($_POST['alias']))
                {
                    $ten = trim($_POST['ten']);
                    $ngcn = date('Y-m-d');
                    $tragthai= $_POST['tragthai'];
                    $alias = trim($_POST['alias']);
                    $r = $nhomtin->CapNhatNhomTin($ma, $ten, $alias, $tragthai, $ngcn);
                    if($r > 0)
                    {
                        $tb = '<div class="alert alert-success">Cập nhật thành công!</div>';
                    }
                    else
                    {
                        $tb = '<div class="alert alert-warning">Bạn không cập nhật gì cả!</div>';
                    }
                }
                else
                {
                    $tb = '<div class="alert alert-danger">Thông tin không hợp lệ!</div>';
                }
                $ctnt = $nhomtin->ChiTietNhomTin($ma);
                 $data = array('ctnt'=>$ctnt, 'tb'=>$tb);
                $this->render('CapNhatNhomTin', $data);
            }
            $this->render('CapNhatNhomTin', $data);
        }
        else
            chuyenHuong ('?controller=hethong&action=trang404');
        
        
    }
    function ThemNhomTin()
    {
        $tb ='';
        $data = array('tb'=>$tb);
        if(isset($_POST['them']))
        {
            if(isset($_POST['ten'], $_POST['tragthai'], $_POST['alias']) && trim($_POST['ten']) && trim($_POST['alias']))
            {
                $nhomtin= new nhomtin();
                $ten = trim($_POST['ten']);
                $alias = trim($_POST['alias']);
                $ngtao = date('Y-m-d');
                $tragthai= $_POST['tragthai'];
                $r = $nhomtin->ThemNhomTin($ten, $alias, $tragthai, $ngtao);
                if($r > 0)
                    {
                        $tb = '<div class="alert alert-success">Thêm thành công!</div>';
                    }
                    else
                    {
                        $tb = '<div class="alert alert-warning">Thêm thất bại!</div>';
                    }
                
            }
            else
            {
                $tb = '<div class="alert alert-danger">Thông tin không hợp lệ!</div>';
            }
            $data = array('tb'=>$tb);
            $this->render('ThemNhomTin', $data);
        }
 
        
        $this->render('ThemNhomTin', $data);
    }
    function XoaNhomTin()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $ma = $_GET['ma'];
            $nhomtin = new nhomtin();
            $r = $nhomtin->XoaNhomTin($ma);
            if($r > 0)
            {
                
                chuyenHuong('?controller=nhomtin&action=DSNhomTin');
            }
            else
            {
                chuyenHuong('?controller=hethong&action=trang404');
            }
        }
        chuyenHuong('?controller=hethong&action=trang404');
    }
    
}
?>