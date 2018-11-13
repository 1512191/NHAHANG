
<?php

class baiviet_controller extends controller {

    function __construct() {
        $this->pathview = 'View/BaiViet/';
    }

    function DSBaiViet() {
        //$this->load('Model/sanpham.php');//bởi sử dụng autoload nên không cần load file sanpham.php
        $sotintrentrang = 2;
        $chisotrang = isset($_GET['trang']) && $_GET['trang'] ? $_GET['trang'] : 1;

        $vitritrang = ($chisotrang - 1) * $sotintrentrang;
        $baiviet = new baiviet();
        $tongsotrang = ceil($baiviet->Tong() / $sotintrentrang);
        //$tong = $monAn->Tong();
        $data = array('dsbv' => $baiviet->DSBaiViet($vitritrang, $sotintrentrang), 'tong' => $tongsotrang);
        $this->render('DSBaiViet', $data);
    }

    function DSBaiVietPhanTrang() {
        $sotintrentrang = 2;
        $chisotrang = isset($_GET['trang']) && $_GET['trang'] ? $_GET['trang'] : 1;

        $vitritrang = ($chisotrang - 1) * $sotintrentrang;
        $baiviet = new baiviet();
        $tongsotrang = ceil($baiviet->Tong() / $sotintrentrang);
        $dsbv = $baiviet->DSBaiViet($vitritrang, $sotintrentrang);
        foreach ($dsbv as $item) {
            echo '<tr >
                 <td>' . $item->MA . '</td>
        <td>' . $item->TEN . '</td>
        <td>' . $item->ALIAS . '</td>
        <td><img src="' . $item->HINHCHIASE . '"width="100px" height="100px"></td>
        
            <td class="hidden-480">
                                <span class="'.classtragThaiQT($item->TRANGTHAI).'">'.TrangThai($item->TRANGTHAI).'</span>
                            </td>
        <td>
           
            <a href="?controller=baiviet&action=CTBaiViet&ma=' . $item->MA . '" class="tooltip-info" data-rel="tooltip" title="View">
                                                        <span class="blue">
                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                        </span>
                                                    </a>
            <a href="?controller=baiviet&action=CapNhatBaiViet&ma=' . $item->MA . '" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                        </span>
                                                    </a>
            
            <a onclick="return confirm("Bạn chắc chắn với điều này")" href="?controller=baiviet&action=XoaBaiViet&ma=' . $item->MA . '" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                        <span class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                        </span>
            </a>
        </td>    
     </tr>';
        }
    }

    function CTBaiViet() {
        if (isset($_GET['ma']) && $_GET['ma']) {
            $ma = $_GET['ma'];
            $baiviet = new baiviet();
            $nhomtin = new nhomtin();
            $dsntin = $nhomtin->TenNhomTin();
            $ctbv = $baiviet->CTBaiViet($ma);
            $data = array('ctbv' => $ctbv, 'dstin' => $dsntin);
            $this->render('CTBaiViet', $data);
        } else {
            chuyenHuong('?controller=hethong&action=trang404');
        }
    }

    function ThemBaiViet() {
        $nhomtin = new nhomtin();
        $tb = '';
        $data = array('dstin' => $nhomtin->TenNhomTin(), 'tb' => $tb);
        if (isset($_POST['them'])) {
            if (isset($_POST['ten'], $_POST['alias'], $_POST['nhom'], $_POST['ndtt'], $_POST['ndct'],$_FILES['hchse'],$_POST['tragthai'])) {
                if (trim($_POST['ten']) && trim($_POST['alias']) && trim($_POST['ndtt']) && trim($_POST['ndct'])) {
                    $ten = trim($_POST['ten']);
                   
                    $alias = trim($_POST['alias']);
                    $nhom = $_POST['nhom'];
                    $ndtt = trim($_POST['ndtt']);
                    $ndct = trim($_POST['ndct']);
                    
                    $tragthai = $_POST['tragthai'];
                    $mttk = isset($_POST['mttk']) && $_POST['mttk'] ? $_POST['mttk'] : "";
                    $tukhoa = isset($_POST['tukhoa']) && $_POST['tukhoa'] ? $_POST['tukhoa'] : "";
                    
                    $path = 'Image/';
                    $co = false;
                   $hinhchse = $_FILES['hchse']['name'];
                    if (move_uploaded_file($_FILES['hchse']['tmp_name'], $path . $hinhchse)) {
                        $co = true;
                    }
                    
                    if ($co) {
                        $baiviet = new baiviet();
                        $ngtao = date('Y-m-d');
                        $r = $baiviet->ThemBaiViet($ten,$alias, $nhom, $ndtt, $ndct,$tukhoa, $mttk, $path . $hinhchse, $tragthai, $ngtao);
                        if ($r > 0) {
                            $tb = '<div class="alert alert-success">Thêm thành công!</div>';
                        } else {
                            $tb = '<div class="alert alert-danger">Thêm thất bại!</div>';
                        }
                    } else {
                        $tb = '<div class="alert alert-danger">Upload thất bại!</div>';
                    }
                } else {
                    $tb = '<div class="alert alert-danger">Thông tin không hợp lệ!</div>';
                }
            } else {
                $tb = '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin!</div>';
            }
            $data = array('dstin' => $nhomtin->TenNhomTin(), 'tb' => $tb);
            $this->render('ThemBaiViet', $data);
        }
        $this->render('ThemBaiViet', $data);
    }

    function XoaBaiViet() {
        if (isset($_GET['ma']) && $_GET['ma']) {

            $ma = trim($_GET['ma']);
            $baiviet = new baiviet();
            $r = $baiviet->XoaBaiViet($ma);
            if ($r > 0) {
                chuyenHuong('?controller=baiviet&action=DSBaiViet');
            } else {
                chuyenHuong('?controller=hethong&action=trang404');
            }
        }
    }

    function CapNhatBaiViet() {
        $nhomtin = new nhomtin();
        $tb = '';


        if (isset($_GET['ma']) && $_GET['ma']) {
            $baiviet = new baiviet();
            $id = $_GET['ma'];
            $ctbv = $baiviet->CTBaiViet($id);
            $data = array('dstin' => $nhomtin->TenNhomTin(), 'tb' => $tb, 'ctbv' => $ctbv);
            if (isset($_POST['capnhat'])) {
                if (isset($_POST['ten'], $_POST['alias'], $_POST['nhom'], $_POST['ndtt'], $_POST['ndct'], $_POST['tragthai'])) {
                    if (trim($_POST['ten']) && trim($_POST['alias']) && trim($_POST['ndtt']) && trim($_POST['ndct'])) {
                        $ten = trim($_POST['ten']);
                        
                        $alias = trim($_POST['alias']);
                        $nhom = $_POST['nhom'];
                        $ndtt = trim($_POST['ndtt']);
                        $ndct = trim($_POST['ndct']);
                       
                        $tragthai = $_POST['tragthai'];
                        $mttk = isset($_POST['mttk']) && $_POST['mttk'] ? $_POST['mttk'] : "";
                        $tukhoa = isset($_POST['tukhoa']) && $_POST['tukhoa'] ? $_POST['tukhoa'] : "";
                       
                        $path = 'Image/';
                        $hinhchse = $ctma->HINHCHIASE;
                        $pathold = $ctma->HINH;
                        $patholdshare = $ctma->HINHCHIASE;
                        $pathlistold = $ctma->DSHINH;
                      
                        $pathhchse='';
                        $co=TRUE;
                        
                        if (isset($_FILES['hchse']) && $_FILES['hchse']['error'] == 0) {
                            $hinhchse = $_FILES['hchse']['name'];
                            $pathhchse = $path . $hinhchse;
                            $co = move_uploaded_file($_FILES['hchse']['tmp_name'],$pathhchse )?TRUE:FALSE;
                        } else {
                            $co = TRUE;
                            $pathhchse = $ctma->HINHCHIASE;
                        }
                       
                        if ($co) {
                            
                          
                            if($patholdshare != $pathhchse )
                            {
                                unlink($patholdshare);
                            }
                           
                            $ngcn = date('Y-m-d');
                            
                            $r = $baiviet->CapNhatBaiViet($id, $ten,$alias, $nhom, $ndtt, $ndct, $tukhoa, $mttk, $pathhchse, $tragthai, $ngcn);
                            
                            if ($r > 0) {
                                $tb = '<div class="alert alert-success">Cập nhật thành công!</div>';
                            } else {
                                $tb = '<div class="alert alert-warning">Bạn không có thông tin gì cập nhật!</div>';
                            }
                        } else {
                            $tb = '<div class="alert alert-danger">Upload thất bại!</div>';
                        }
                    } else {
                        $tb = '<div class="alert alert-danger">Thông tin không hợp lệ!</div>';
                    }
                } else {
                    $tb = '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin!</div>';
                }
                 $ctbv = $baiviet->CTBaiViet($id);
                $data = array('dstin' => $nhomtin->TenNhomTin(), 'tb' => $tb, 'ctbv' => $ctbv);
//                xemMang($_POST);
//                xemMang($_FILES);
                $this->render('CapNhatBaiViet', $data);
            }
            $this->render('CapNhatBaiViet', $data);
        } else {
            chuyenHuong('?controller=hethong&action=trang404');
        }
    }

}

?>