<?php
class khachhang_controller extends controller
{
    public function __construct() {
        $this->pathview='View/KhachHang/';
    }
    function DSKhachHang()
    {
        $sotintrentrang = 2;
        $chisotrang = isset($_GET['trang']) && $_GET['trang']? $_GET['trang'] : 1;
        
        $vitritrang = ($chisotrang - 1) * $sotintrentrang;
        $kh = new khachhang();
        $tongsotrang = ceil($kh->Tong()/$sotintrentrang);
        $dskh = $kh->DSKhachHang($vitritrang, $sotintrentrang);
        $data = array('dskh'=>$dskh, 'tong'=>$tongsotrang);
       
        $this->render('DSKhachHang', $data);
    }
    function DSKhachHangPhanTrang()
    {
        $sotintrentrang = 2;
        $chisotrang = isset($_GET['trang']) && $_GET['trang']? $_GET['trang'] : 1;
        
        $vitritrang = ($chisotrang - 1) * $sotintrentrang;
        $kh = new khachhang();
        $tongsotrang = ceil($kh->Tong()/$sotintrentrang);
        $dskh = $kh->DSKhachHang($vitritrang, $sotintrentrang);
        foreach($dskh as $item)
        {
            echo '<tr class="'.doiMau($item->TRANGTHAI).'">
        <td>'.$item->MA.'</td>
        <td>'.$item->TEN.'</td>
        <td>'.$item->TENDN.'</td>
        <td>'.$item->MK.'</td>
        <td>'.$item->DIACHI.'</td>
        <td>'.$item->SDT.'</td>
        <td>'.$item->EMAIL.'</td>
        <td>'.$item->NGAYTAO.'</td>
        <td>'.$item->NGAYCAPNHAT.'</td>
        <td>'.doiTenTrangThai($item->TRANGTHAI).'</td>
        <td>
           
            <a onclick="return confirm("Bạn chắc chắn với điều này")" href="?controller=nguoidung&action=XoaKH&ma='.$item->MA.' class="tooltip-error" data-rel="tooltip" title="Delete">
                                                        <span class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                        </span>
            </a>
            
        </td>
      </tr>      ';
        }
    }
    function XoaKH()
    {
        $ma = isset($_GET['ma']) && $_GET['ma']?$_GET['ma']:0;
        if($ma !== 0)
        {
            $kh  = new khachhang();
            $r = $kh->Xoa($ma);
            if($r > 0)
            {
                chuyenHuong('?controller=khachhang&action=DSKhachHang');
            }
            else
            {
                chuyenHuong('?controller=hethong&action=trang404');
            }
        }
        else
        {
            chuyenHuong('?controller=hethong&action=trang404');
        }
    }
    function DangKi()
    {
        $tb='';
        $giohang = new giohang();
        
        $data=array('tb'=>$tb, 'tonggiohang'=>$giohang->tong());
        if(isset($_POST['dki']))
        {
            if(isset($_POST['ten'], $_POST['mk'], $_POST['mkxn'], $_POST['email'], $_POST['diachi'], $_POST['sdt'], $_POST['tdn']))
            {
                if(trim($_POST['ten']) && trim($_POST['mk']) && trim($_POST['mkxn']) && trim($_POST['email']) && trim($_POST['diachi']) && $_POST['sdt'] && trim($_POST['tdn']))
                {
                    
                    
                    $mk = trim($_POST['mk']);
                    $xnmk = trim($_POST['mkxn']);
                    if($mk === $xnmk)
                    {
                        $ten = trim($_POST['ten']);
                        $email = trim($_POST['email']);
                        $diachi = trim($_POST['diachi']);
                        $sdt = $_POST['sdt'];
                        $tdn = $_POST['tdn'];
                        $khachhang = new khachhang();
                        $dstdn = $khachhang->DSTenDangNhap();
                        $co = TRUE;
                        foreach ($dstdn as $item)
                        {
                            if($item->TENDN == $tdn)
                            {
                                $co = FALSE;
                                break;
                            }
                            else
                            {
                                $co = true;
                            }
                        }
                        if($co)
                        {
                            $tragthai = 1;
                            $ngtao = date('Y-m-d');
                            $khachhang = new khachhang();
                            $r = $khachhang->DangKi($ten, $tdn, $mk, $diachi, $sdt, $email, $ngtao, $tragthai);
                            if($r > 0)
                            {
                                $tb='<div class="alert alert-success">Đăng kí thành công!</div>';
                            }
                            else
                            {
                                 $tb='<div class="alert alert-danger">Đăng kí thất bại!</div>';
                            }
                        
                        }
                        else
                        {
                            $tb='<div class="alert alert-danger">Tên đăng nhập đã trùng! Vui lòng đặt tên khác!</div>';
                        }
                    
                    }
                    else
                    {
                         $tb='<div class="alert alert-danger">Mật khẩu xác nhận không đúng!</div>';
                    }
                    
                }
                else
                {
                    $tb='<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin!</div>';
                }
            }
            else
            {
                $tb='<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin!</div>';
            }
             $data=array('tb'=>$tb, 'tonggiohang'=>$giohang->tong());
             $this->render('DangKi', $data, 'LayoutSP');

        }
        $this->render('DangKi', $data, 'LayoutSP');
    }
    function DangNhap()
    {
         $tb='';
        $giohang = new giohang();
        
        $data=array('tb'=>$tb, 'tonggiohang'=>$giohang->tong());
        if(isset($_POST['dangnhap']))
        {
            if(isset($_POST['tdn'], $_POST['mk']) && trim($_POST['tdn']) && trim($_POST['mk']))
            {
                $kh = new khachhang();
                $tdn = trim($_POST['tdn']);
                $mk = trim($_POST['mk']);
                $tk = $kh->DangNhap($tdn, $mk);
                //xemMang($tk);
                $flag = false;
                if($tk)
                {
                    if($tk->TENDN === $tdn && $tk->MK === $mk)
                    {
                        $flag = true;
                        
                    }
               
                    if($flag)
                    {
                        $_SESSION['makh'] = (int)($tk->MA);
                        $_SESSION['tenkh'] = (string)($tk->TEN);
                        $_SESSION['loginkh'] = true;
                        $_SESSION['tendnkh'] = (string)($tk->TENDN);
                        $_SESSION['emailkh']=(string)($tk->EMAIL);
                        if(isset($_POST['remember']))
                        {
                            $tg = time() + 360;
                            setcookie('loginkh', true, $tg);
                            setcookie('tenkh', $_SESSION['tenkh'], $tg);
                            setcookie('makh', $_SESSION['makh'], $tg);
                            setcookie('tendnkh', $_SESSION['tendnkh'], $tg);
                        }
                        //chuyenHuong('?controller=sanpham&action=TrangChu');
                        $tb = '<div class="alert alert-success">Đăng nhập thành công!</div>';
                        
                    }
                    else 
                    {
                    
                        $tb = '<div class="alert alert-danger">Đăng nhập thất bại!</div>';
                    }
                    
                }
                else 
                    {
                    
                        $tb = '<div class="alert alert-danger">Đăng nhập thất bại!</div>';
                    }
            }
            else 
            {
                $tb = '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin!</div>';
            }
            $data = array('tb'=>$tb,'tonggiohang'=>$giohang->tong());
            $this->render('DangNhap', $data, 'LayoutSP');
        }
         $this->render('DangNhap', $data, 'LayoutSP');
    }
    function ChiTiet()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            
            $ma = $_GET['ma'];
            $kh = new khachhang();
            $ctkh = $kh->ChiTiet($ma);
            $giohang = new giohang();
            if($ctkh)
            {
                $data = array('ctkh'=>$ctkh, 'tonggiohang'=>$giohang->tong());
                $this->render('ChiTietKH', $data, 'LayoutSP');
            }
 else {
                chuyenHuong('?controller=hethong&action=trang404');
 }
        }
        else
        {
            chuyenHuong('?controller=hethong&action=trang404');
        }
    }
    function CapNhatThongTin()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $tb ='';
            $giohang = new giohang();
            $ma = $_GET['ma'];
            $kh = new khachhang();
            $ctkh = $kh->ChiTiet($ma);
            $data = array('tb'=>$tb,'tonggiohang'=>$giohang->tong(), 'ctkh'=>$ctkh);
            if(isset($_POST['capnhat']))
            {
           
                if(isset($_POST['ten'], $_POST['sdt'], $_POST['diachi'], $_POST['email']))
                {
                    if(trim($_POST['ten']) && trim($_POST['sdt']) && trim($_POST['diachi']) && trim($_POST['email']))
                    {
                        
                        $ten = trim($_POST['ten']);
                        $sdt = trim($_POST['sdt']);
                        $diachi = trim($_POST['diachi']);
                        $email = trim($_POST['email']);
                        $ngcn = date('Y-m-d');
                        
                        $r = $kh->CapNhatKH($ma, $ten, $diachi, $sdt, $email, $ngcn);
                        if($r > 0)
                        {
                            $tb = '<div class="alert alert-success">Cập nhật thành công!</div>';
                        }
                        else
                        {
                            $tb = '<div class="alert alert-danger">Cập nhật thất bại!</div>';
                        }
                    }
                    else
                    {
                        $tb = '<div class="alert alert-danger">Thông tin bạn nhập không hợp lệ!</div>';
                    }
                }
                else {
                    $tb = '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin!</div>';
                }
                $ctkh = $kh->ChiTiet($ma);
                $data = array('tb'=>$tb,'tonggiohang'=>$giohang->tong(), 'ctkh'=>$ctkh);
             $this->render('CapNhatThongTin', $data, 'LayoutSP');
            }
             
             $this->render('CapNhatThongTin', $data, 'LayoutSP');
        }
 else {
      chuyenHuong('?controller=hethong&action=trang404');
 }
       
    }
    function ThayDoiTaiKhoan()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $tb='';
            $ma = $_GET['ma'];
            $kh = new khachhang();
            $giohang = new giohang();
            $data = array('tb'=>$tb, 'tonggiohang'=>$giohang->tong());
            $tk = $kh->TaiKhoan($ma);
            $co = true;
            if(isset($_POST['thaydoi']))
            {
                if($tk)
                {
                    if(isset($_POST['mk'], $_POST['mkm'], $_POST['mkxn'], $_POST['tdn'])&& $_POST['mk'] && $_POST['mkm'] && $_POST['mkxn'] && $_POST['tdn'])
                    {
                        if($_POST['tdn'] != $tk->TENDN)
                        {
                            $tb='<div class="alert alert-danger">Tên đăng nhập không đúng!</div>';
                        }
                        else
                        {
                            $tdn = isset($_POST['tdnm']) && $_POST['tdnm']?$_POST['tdnm']:$tk->TENDN;
                            $dstdn = $kh->DSTenDangNhapHopLe($ma);
                            foreach ($dstdn as $item)
                            {
                                if($tdn == $item->TENDN)
                                {
                                    $co = false;
                                    break;
                                }
                                else
                                    $co = TRUE;
                            }
                            if($co)
                            {
                                $mkc = $_POST['mk'];
                                $mk = $tk->MK;
                                if($mk == $mkc)
                                {
                                    if($_POST['mkxn'] == $_POST['mkm'])
                                    {
                                        $mkm = $_POST['mkm'];
                                        $r = $kh->ThayDoiTaiKhoan($ma, $mkm, $tdn);
                                        if($r > 0)
                                        {
                                            $tb='<div class="alert alert-success">Thay đổi tài khoản thành công!</div>';
                                        }
                                        else
                                        {
                                         $tb='<div class="alert alert-danger">Thay đổi thất bại!</div>';
                                        }
                                    }
                                    else
                                    {
                                        $tb='<div class="alert alert-danger">Mật khẩu xác nhận không trùng khớp!</div>';
                                    }
                                }
                                else
                                {
                                    $tb='<div class="alert alert-danger">Mật khẩu cũ không đúng!</div>';
                                }
                            }
                            else
                            {
                                $tb='<div class="alert alert-danger">Tên đăng nhập đã trùng! Vui lòng nhập tên đăng nhập mới!</div>';
                            }
                        }


                    }
                    else
                    {
                        $tb='<div class="alert alert-danger">Thông tin không hợp lệ!</div>';
                    }
                }
                else
                {
                    $tb='<div class="alert alert-danger">Tài khoản không tồn tại!</div>';
                }
                $data = array('tb'=>$tb, 'tonggiohang'=>$giohang->tong());
                $this->render('ThayDoiTaiKhoan',$data, 'LayoutSP');
            }
            else {
                 $data = array('tb'=>$tb, 'tonggiohang'=>$giohang->tong());
                $this->render('ThayDoiTaiKhoan',$data, 'LayoutSP');
            }
        }
        else
            chuyenHuong ('?controller=hethong&action=trang404');
    }
    function DangXuat()
    {
        session_destroy();
        setcookie('loginkh', FALSE, 0);
        setcookie('tenkh', 0, 0);
        setcookie('makh', 0, 0);
        setcookie('tendnkh', 0, 0);
        chuyenHuong('?controller=sanpham&action=TrangChu');
    }
//    function LienHe()
//    {
//        $this->render('', array(), 'LayoutLH');
//    }
//    function GioiThieu()
//    {
//        $this->render('', array(), 'LayoutGT');
//    }
   
}
?>