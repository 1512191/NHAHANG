<?php
class quantri_controller extends controller
{
    function __construct() {
        $this->pathview='View/NhomQT/';
    }
    function DSQTri()
    {
        $qtri=new quantri();
        $data = array('dsqt'=>$qtri->DSQuanTri());
        $this->render('DSQTri', $data);
    }
    function CapNhatQT()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $ma = $_GET['ma'];
            $qtri= new quantri();
            $ctqt = $qtri->ChiTietQT($ma);
            $tb='';
            $data = array('ctqt'=>$ctqt, 'tb'=>$tb);
            
            if(isset($_POST['capnhat']))
            {
               
                if(isset($_POST['ten'], $_POST['tragthai']) && trim($_POST['ten']))
                {
                    $ten = trim($_POST['ten']);
                    $ngcn = date('Y-m-d');
                    $tragthai= $_POST['tragthai'];
                    $r = $qtri->CapNhatQT($ma, $ten, $tragthai, $ngcn);
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
                $ctqt = $qtri->ChiTietQT($ma);
                 $data = array('ctqt'=>$ctqt, 'tb'=>$tb);
                $this->render('CapNhatQT', $data);
            }
            $this->render('CapNhatQT', $data);
        }
        else
            chuyenHuong ('?controller=hethong&action=trang404');
        
        
    }
    function ThemQT()
    {
        $tb ='';
        $data = array('tb'=>$tb);
        if(isset($_POST['them']))
        {
            if(isset($_POST['ten'], $_POST['tragthai']) && trim($_POST['ten']))
            {
                $qtri= new quantri();
                $ten = trim($_POST['ten']);
                $ngtao = date('Y-m-d');
                $tragthai= $_POST['tragthai'];
                $r = $qtri->ThemLoaiQuanTri($ten, $tragthai, $ngtao);
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
            $this->render('ThemQT', $data);
        }
 
        
        $this->render('ThemQT', $data);
    }
    function XoaQT()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $ma = $_GET['ma'];
            $qt = new quantri();
            $r = $qt->XoaQT($ma);
            if($r > 0)
            {
                
                chuyenHuong('?controller=quantri&action=DSQTri');
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