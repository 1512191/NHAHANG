<?php
class nguoidung_controller extends controller
{
    function __construct() {
        $this->pathview = 'View/NguoiDung/';
    }
    function DSNguoiDung()
    {
        //muốn đẩy dữ liệu tên loại quản trị (có khóa ngoại tham chiếu)
        $nd=new nguoidung();
        $qt = new quantri();
        $data = array('dsnd'=>$nd->DSNguoiDung(), 'dsqt'=>$qt->TenQuanTri());
        $this->load_js(array(TEMPLATE_PATH.'assets/js/jquery.dataTables.min.js',TEMPLATE_PATH.'assets/js/jquery.dataTables.bootstrap.min.js',TEMPLATE_PATH.'assets/js/dataTables.buttons.min.js',
        TEMPLATE_PATH.'assets/js/buttons.html5.min.js',TEMPLATE_PATH.'assets/js/buttons.print.min.js', TEMPLATE_PATH.'assets/js/buttons.colVis.min.js',
        TEMPLATE_PATH.'assets/js/dataTables.select.min.js'));
        $this->render('DSNguoiDung',$data);
        
    }
    function ChiTietND()
    {
        $ma = $_GET['ma'];
       
        $nd = new nguoidung();
        $data = array('nd'=>$nd->CTNguoiDung($ma), 'thu'=>$ma);
         $this->load_js(array(TEMPLATE_PATH.'assets/js/jquery.ui.touch-punch.min.js', TEMPLATE_PATH.'assets/js/jquery-ui.custom.min.js',
            TEMPLATE_PATH.'assets/js/jquery.gritter.min.js', TEMPLATE_PATH.'assets/js/bootbox.js', TEMPLATE_PATH.'assets/js/jquery.easypiechart.min.js',
            TEMPLATE_PATH.'assets/js/bootstrap-datepicker.min.js', TEMPLATE_PATH.'assets/js/jquery.hotkeys.index.min.js', TEMPLATE_PATH.'assets/js/bootstrap-wysiwyg.min.js',
            TEMPLATE_PATH.'assets/js/select2.min.js', TEMPLATE_PATH.'assets/js/spinbox.min.js', TEMPLATE_PATH.'assets/js/bootstrap-editable.min.js', 
            TEMPLATE_PATH.'assets/js/ace-editable.min.js', TEMPLATE_PATH.'assets/js/jquery.maskedinput.min.js'));
        $this->render('ChiTietND', $data);
        
    }
    function ThemND()
    {       
            $qt = new quantri();
            $nd = new nguoidung();
            $data = array('qt'=>$qt->TenQuanTri());
            if(isset($_POST['add']))
            {
                $tendn = trim($_POST['tdn']);
                $mk = trim($_POST['mk']);
                $ten = trim($_POST['ten']);

                $maqt = trim($_POST['manhom']);
                $tragthai = $_POST['trangthai'];
                $ngcn= date('Y-m-d');
                $nglap = date('Y-m-d');
                $tb='';
                if(isset($_FILES['hinh']))
                {
                    $path = 'Image/';
                    $ten = $_FILES['hinh']['name'];
                    $fullpath = $path.$ten;
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $fullpath) == FALSE)
                    {
                        $tb='<div class="alert alert-danger">Upload thất bại</div>';
                    }
                    else
                    {
                        $r = $nd->ThemND($tendn, $ten, $mk, $maqt, $tragthai,$nglap, $fullpath);
                        if($r > 0)
                        {
                            $tb='<div class="alert alert-success">Thêm thành công</div>';
                        }
                        else
                        {
                             $tb='<div class="alert alert-danger">Thêm thất bại</div>';
                        }
                       
                    }
                    $data = array('qt'=>$qt->TenQuanTri(),'tb'=>$tb);
                    $this->render('ThemND', $data);
                }
            }
            $this->load_js(array(TEMPLATE_PATH.'assets/js/jquery.ui.touch-punch.min.js', TEMPLATE_PATH.'assets/js/jquery-ui.custom.min.js',
            TEMPLATE_PATH.'assets/js/jquery.gritter.min.js', TEMPLATE_PATH.'assets/js/bootbox.js', TEMPLATE_PATH.'assets/js/jquery.easypiechart.min.js',
            TEMPLATE_PATH.'assets/js/bootstrap-datepicker.min.js', TEMPLATE_PATH.'assets/js/jquery.hotkeys.index.min.js', TEMPLATE_PATH.'assets/js/bootstrap-wysiwyg.min.js',
            TEMPLATE_PATH.'assets/js/select2.min.js', TEMPLATE_PATH.'assets/js/spinbox.min.js', TEMPLATE_PATH.'assets/js/bootstrap-editable.min.js', 
            TEMPLATE_PATH.'assets/js/ace-editable.min.js', TEMPLATE_PATH.'assets/js/jquery.maskedinput.min.js'));
            $this->render('ThemND', $data);
    }
    function CapNhatND()//Hiển thị giao diện người dùng khi chưa submit
    {
        if(isset($_GET['ma']) && trim($_GET['ma']))
        {
             $ma = trim($_GET['ma']);
             $nd = new nguoidung();
             $qt = new quantri();
            $data = array('nd'=>$nd->CTNguoiDung($ma), 'qt'=>$qt->TenQuanTri());
            if(isset($_POST['save']))
            {
//                if(isset($_POST['tdn'], $_POST['mk'], $_POST['nglap']))
//                {
                    $tendn = trim($_POST['tdn']);
                    $mk = trim($_POST['mk']);
                    $ten = trim($_POST['ten']);
                   
                    $maqt = trim($_POST['manhom']);
                    $tragthai = $_POST['trangthai'];
                    //$nglap = $_POST['nglap'];
                    $ngcn= date('Y-m-d');
                    $avatar='';
                    $r = $nd->CapNhatND($ma, $tendn, $ten, $mk, $maqt, $tragthai, $ngcn, $avatar);
                    $data = array('nd'=>$nd->CTNguoiDung($ma), 'qt'=>$qt->TenQuanTri());
                    if($r > 0)
                    {
                         $this->render('CapNhatND', $data);
                    }
 else {
     echo 'Lỗi rồi';
 }
                //}
            }
           
           
            $this->load_js(array(TEMPLATE_PATH.'assets/js/jquery.ui.touch-punch.min.js', TEMPLATE_PATH.'assets/js/jquery-ui.custom.min.js',
            TEMPLATE_PATH.'assets/js/jquery.gritter.min.js', TEMPLATE_PATH.'assets/js/bootbox.js', TEMPLATE_PATH.'assets/js/jquery.easypiechart.min.js',
            TEMPLATE_PATH.'assets/js/bootstrap-datepicker.min.js', TEMPLATE_PATH.'assets/js/jquery.hotkeys.index.min.js', TEMPLATE_PATH.'assets/js/bootstrap-wysiwyg.min.js',
            TEMPLATE_PATH.'assets/js/select2.min.js', TEMPLATE_PATH.'assets/js/spinbox.min.js', TEMPLATE_PATH.'assets/js/bootstrap-editable.min.js', 
            TEMPLATE_PATH.'assets/js/ace-editable.min.js', TEMPLATE_PATH.'assets/js/jquery.maskedinput.min.js'));
            $this->render('CapNhatND', $data);
        }
        else 
        {
            echo 'Không tìm thấy!';
        }
    }
    
    function DangNhap()
    {
        
        $tb='';
        $qt = new quantri();
        $data=array('qt'=>$qt->TenQuanTri(),'tb'=>$tb);
        if(isset($_POST['submit']))
        {
            if(isset($_POST['tdn'], $_POST['mk']) && trim($_POST['tdn']) && trim($_POST['mk']))
            {
                $nd = new nguoidung();
                $tdn = trim($_POST['tdn']);
                $mk = trim($_POST['mk']);
                $tk = $nd->DangNhap($tdn, $mk);
                //xemMang($tk);
                $flag = false;
                if($tk)
                {
                    if($tk->TENDN === $tdn && $tk->MATKHAU === $mk)
                    {
                        $flag = true;
                        
                    }
               
                    if($flag)
                    {
                        $_SESSION['ma'] = (int)($tk->MA);
                        $_SESSION['ten'] = (string)($tk->TEN);
                        $_SESSION['login'] = true;
                        
                        if(isset($_POST['remember']))
                        {
                            $tg = time() + 360;
                            setcookie('login', true, $tg);
                            setcookie('ten', $_SESSION['ten'], $tg);
                            setcookie('ma', $_SESSION['ma'], $tg);
                        }
                        chuyenHuong();
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
            $data = array('tb'=>$tb);
        }
        else if(isset($_POST['dki']))
        {
            if(isset($_POST['ten'], $_POST['tendn'], $_POST['matkhau'], $_POST['manhom'], $_POST['matkhauxn']) && 
                   trim($_POST['ten']) && trim($_POST['tendn']) && trim($_POST['matkhau']) && trim($_POST['manhom']) && trim($_POST['matkhauxn']))
           {
                $nd = new nguoidung();
               $tendn= trim($_POST['tendn']);
              $co = $nd->ktraTenDangNhap($tendn);
              if($co)
              {
                  $mk = trim($_POST['matkhau']);
               $mkxn = trim($_POST['matkhauxn']);
               $ten = trim($_POST['ten']);
               $maqt = $_POST['manhom'];
               $trangthai = 1;
               $nglap = date('Y-m-d');
               if($mk != $mkxn)
               {
                   $tbdk='<div class="alert alert-danger">Mật khẩu xác nhận không đúng!</div>';
               }
               else
               {
                  
                    $r = $nd->DangKi($tendn, $mk, $nglap, $maqt, $ten, $trangthai);
                    if($r > 0)
                    {
                        $tbdk='<div class="alert alert-success">Đăng kí thành công!</div>';
                    }
                    else
                    {
                        $tbdk='<div class="alert alert-danger">Đăng kí không thành công!</div>';
                    }
               }
              }
               else
               {
                   $tbdk = '<div class="alert alert-danger">Tên đăng nhập đã trùng vui lòng nhập lại!</div>';
               }
               
               
              
           }
           else
           {
               $tbdk='<div class="alert alert-warming">Vui lòng nhập đầy đủ thông tin!</div>';
           }
           $data = array('qt'=>$qt->TenQuanTri(), 'tb'=>$tb, 'tbdk'=>$tbdk);
        }
        $this->render('DangNhap',$data,'LayoutSignIn');
    }
    function DangXuat()
    {
        session_destroy();
        setcookie('login', FALSE, 0);
        setcookie('ten', 0, 0);
        setcookie('ma', 0, 0);
        chuyenHuong('?controller=nguoidung&action=DangNhap');
    }
    function DangKi()
    {
       $qt = new quantri();
       $nd = new nguoidung();
       $data = array('qt'=>$qt->TenQuanTri());
       $tb = '';
       if(isset($_POST['dki']))
       {
           if(isset($_POST['ten'], $_POST['tendn'], $_POST['matkhau'], $_POST['manhom'], $_POST['matkhauxn']) && 
                   trim($_POST['ten']) && trim($_POST['tendn']) && trim($_POST['matkhau']) && trim($_POST['manhom']) && trim($_POST['matkhauxn']))
           {
               $tendn= trim($_POST['tendn']);
               $mk = trim($_POST['matkhau']);
               $mkxn = trim($_POST['matkhauxn']);
               $ten = trim($_POST['ten']);
               $maqt = $_POST['manhom'];
               $trangthai = 1;
               $nglap = date('Y-m-d');
               if($mk != $mkxn)
               {
                   $tb='<div class="alert alert-danger">Mật khẩu xác nhận không đúng!</div>';
               }
               else
               {
                    $r = $nd->DangKi($tendn, $mk, $nglap, $maqt, $ten, $trangthai);
                    if($r > 0)
                    {
                        $tb='<div class="alert alert-success">Đăng kí thành công!</div>';
                    }
                    else
                    {
                        $tb='<div class="alert alert-danger">Đăng kí không thành công!</div>';
                    }
               }
               
              
           }
           else
           {
               $tb='<div class="alert alert-warming">Vui lòng nhập đầy đủ thông tin!</div>';
           }
           $data = array('qt'=>$qt->TenQuanTri(), 'tb'=>$tb);
           $this->render('DangNhap', $data);
       }
       $this->render('DangNhap', $data);
    }
    function XoaND()
    {
        if(isset($_GET['ma']) && trim($_GET['ma']))
        {
            $ma = trim($_GET['ma']);
            $nd  = new nguoidung();
            $r = $nd->XoaND($ma);
            if($r > 0)
            {
                chuyenHuong('?controller=nguoidung&action=DSNguoiDung');
            }
            else
            {
                chuyenHuong('?controller=hethong&action=trang404');
            }
        }
    }
}
?>

