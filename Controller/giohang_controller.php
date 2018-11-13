<?php
class giohang_controller extends controller
{
    function __construct() {
        $this->pathview='View/GioHang/';
    }
    function ThemGioHang()
    {
        if(isset($_GET['ma']))
        {
            $giohang = new giohang();
            if($giohang->muaHang())
            {
                echo '<div>'.$giohang->tong().'<div>';
            }
            else
                echo '';
        }
        else
           echo '';
    }
    function giohang()
    {
        $giohang = new giohang();
        $data = array('giohang'=>$_SESSION['giohang'], 'tonggiohang'=>$giohang->tong());
        $this->render('GioHang', $data, 'LayoutSP');
    }
    function xoa()
    {
         if(isset($_GET['ma']))
        {
            $giohang = new giohang();
            if($giohang->XoaHang())
            {
                chuyenHuong('?controller=giohang&action=giohang');
            }
            else
                chuyenHuong ('?controller=sanpham&action=TrangChu');
        }
        else
            chuyenHuong ('?controller=sanpham&action=TrangChu');
    }
    function ThanhToan()
    {
        if(!ktrDangNhapKH())
        {
            chuyenHuong('?controller=khachhang&action=DangNhap');
        }
 else {
     if(isset($_SESSION['makh']) && $_SESSION['makh'])
            {
                $ma = $_SESSION['makh'];
                $kh = new khachhang;
                $ctkh = $kh->ChiTiet($ma);
                $giohang = new giohang();
                $tb ='';
                $data = array('tb'=>$tb, 'ctkh'=>$ctkh, 'giohang'=>$_SESSION['giohang'],'tonggiohang'=>$giohang->tong());
                if(isset($_POST['mua']))
                {
                    $ngtao = date('Y-m-d');
                    $tongtien = $_POST['tong'];
                    $mahd = time();
                    echo($mahd);
                    $makh = $_SESSION['makh'];
                    $hd = new hoadon();
                    $r = $hd->ThemHoaDon($mahd, $makh, $tongtien, $ngtao);
                    if($r > 0)
                    {
                        $cthd = new chitiethoadon();
                        foreach ($_SESSION['giohang'] as $item)
                        {
                            $themct = $cthd->ThemChiTiet($mahd, $item['ma'], $item['soluong'], $item['gia'], $item['giamgia']);

                        }
                        guimail($_SESSION['emailkh'], 'Đặt hàng', 'Đặt hàng thành công');
                    }
                    else
                    {
                        $tb = '<div class="btn btn-danger">Đặt hàng thất bại!</div>';
                    }
                    $data = array('tb'=>$tb, 'ctkh'=>$ctkh, 'giohang'=>$_SESSION['giohang'],'tonggiohang'=>$giohang->tong());
                    $this->render('ThanhToan', $data, 'LayoutSP');
                }
                $this->render('ThanhToan', $data, 'LayoutSP');
            }
            else
            {
                chuyenHuong('?controller=hethong&action=Trang404');
            }
 }
            
    }
}
?>