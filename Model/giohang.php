<?php
class giohang
{
    function taoGioHang()
    {
        if(!isset($_SESSION['giohang']))
            $_SESSION['giohang']=array();
    }
    function muaHang()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $ma = $_GET['ma'];
            $monan = new sanpham();
            $ctma = $monan->CTSanPham($ma);
            if($ctma)
            {
                if(!isset($_SESSION['giohang'][$ctma->MA]))
                {
                    $spms = array(
                        'ma'=>$ctma->MA,
                        'ten'=>$ctma->TEN,
                        'gia'=>$ctma->GIA,
                        'hinh'=>$ctma->HINH,
                        'giamgia'=>$ctma->GIA_KHUYEN_MAI,
                        'soluong'=>1
                    );
                    $_SESSION['giohang'][$ctma->MA]=$spms;
                }
                else
                {
                    $_SESSION['giohang'][$ctma->MA]['soluong'] += 1;
                }
                return true;
            }
            else
                return false;
        }
        return false;
        
    }
    function XoaHang()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $ma = $_GET['ma'];
            if(isset($_SESSION['giohang'][$ma]))
            {
                unset($_SESSION['giohang'][$ma]);
                return true;
            }
            return FALSE;
        }
        return false;
    }
    function tong()
    {
        if(isset($_SESSION['giohang']))
            return count($_SESSION['giohang']);
        return 0;
    }
}
?>