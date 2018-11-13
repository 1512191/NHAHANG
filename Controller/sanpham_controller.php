
<?php

class sanpham_controller extends controller {

    function __construct() {
        $this->pathview = 'View/SanPham/';
    }

    function DSSanPham() {
        //$this->load('Model/sanpham.php');//bởi sử dụng autoload nên không cần load file sanpham.php
        $sotintrentrang = 2;
        $chisotrang = isset($_GET['trang']) && $_GET['trang'] ? $_GET['trang'] : 1;

        $vitritrang = ($chisotrang - 1) * $sotintrentrang;
        $monAn = new sanpham();
        $tongsotrang = ceil($monAn->Tong() / $sotintrentrang);
        //$tong = $monAn->Tong();
        $data = array('dsma' => $monAn->DSSanPham($vitritrang, $sotintrentrang), 'tong' => $tongsotrang);
        $this->render('DSSanPham', $data);
    }

    function DSSanPhamPhanTrang() {
        $sotintrentrang = 2;
        $chisotrang = isset($_GET['trang']) && $_GET['trang'] ? $_GET['trang'] : 1;

        $vitritrang = ($chisotrang - 1) * $sotintrentrang;
        $monAn = new sanpham();
        $tongsotrang = ceil($monAn->Tong() / $sotintrentrang);
        $dsma = $monAn->DSSanPham($vitritrang, $sotintrentrang);
        foreach ($dsma as $item) {
            echo '<tr class="' . doiMau($item->TRANGTHAI) . '">
                 <td>' . $item->MA . '</td>
        <td>' . $item->TEN . '</td>
        <td>' . $item->GIA . '</td>
        <td><img src="' . $item->HINH . '"width="100px" height="100px"></td>
        <td>' . doiTenTrangThai($item->TRANGTHAI) . '</td>
        <td>
           
            <a href="?controller=sanpham&action=CTSanPham&ma=' . $item->MA . '" class="tooltip-info" data-rel="tooltip" title="View">
                                                        <span class="blue">
                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                        </span>
                                                    </a>
            <a href="?controller=sanpham&action=CapNhatSP&ma=' . $item->MA . '" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                        </span>
                                                    </a>
            
            <a onclick="return confirm("Bạn chắc chắn với điều này")" href="?controller=sanpham&action=XoaSP&ma=' . $item->MA . '" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                        <span class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                        </span>
            </a>
        </td>    
     </tr>';
        }
    }

    function CTSanPham() {
        if (isset($_GET['ma']) && $_GET['ma']) {
            $ma = $_GET['ma'];
            $monAn = new sanpham();
            $loaiMonAn = new nhomsanpham();
            $dslsp = $loaiMonAn->TenNhomSanPham();
            $ctma = $monAn->CTSanPham($ma);
            $data = array('ctma' => $ctma, 'dslsp' => $dslsp);
            $this->render('ChiTietSanPham', $data);
        } else {
            chuyenHuong('?controller=hethong&action=trang404');
        }
    }

    function ThemSP() {
        $nhomsp = new nhomsanpham();
        $tb = '';
        $data = array('dslsp' => $nhomsp->TenNhomSanPham(), 'tb' => $tb);
        if (isset($_POST['them'])) {
            if (isset($_POST['ten'], $_POST['gia'], $_POST['alias'], $_POST['nhom'], $_POST['ndtt'], $_POST['ndct'], $_FILES['hinh'], $_FILES['hchse'], $_FILES['dshinh'], $_POST['tphan'], $_POST['tragthai'])) {
                if (trim($_POST['ten']) && trim($_POST['gia']) && trim($_POST['alias']) && trim($_POST['ndtt']) && trim($_POST['ndct']) && trim($_POST['tphan'])) {
                    $ten = trim($_POST['ten']);
                    $gia = trim($_POST['gia']);
                    $alias = trim($_POST['alias']);
                    $nhom = $_POST['nhom'];
                    $ndtt = trim($_POST['ndtt']);
                    $ndct = trim($_POST['ndct']);
                    $tphan = trim($_POST['tphan']);
                    $tragthai = $_POST['tragthai'];
                    $mttk = isset($_POST['mttk']) && $_POST['mttk'] ? $_POST['mttk'] : "";
                    $tukhoa = isset($_POST['tukhoa']) && $_POST['tukhoa'] ? $_POST['tukhoa'] : "";
                    $giakm = isset($_POST['giakm']) && $_POST['giakm'] ? $_POST['giakm'] : 0;
                    $km = isset($_POST['kmai']) && $_POST['kmai'] ? $_POST['kmai'] : "Khăn lạnh";
                    $hinh = $_FILES['hinh']['name'];
                    $path = 'Image/';
                    $co = false;
                    if (move_uploaded_file($_FILES['hinh']['tmp_name'], $path . $hinh)) {
                        $co = true;
                    }
                    $hinhchse = $_FILES['hchse']['name'];
                    if (move_uploaded_file($_FILES['hchse']['tmp_name'], $path . $hinhchse)) {
                        $co = true;
                    }
                    $dshinh = $_FILES['dshinh']['name'];
                    $path_list = '';
                    foreach ($dshinh as $item => $value) {
                        $des = $path . $value;
                        if (move_uploaded_file($_FILES['dshinh']['tmp_name'][$item], $des)) {
                            $co = true;
                            $path_list = $path_list . $des . ';';
                        } else {
                            $co = false;
                            break;
                        }
                    }
                    if ($co) {
                        $sp = new sanpham();
                        $ngtao = date('Y-m-d');
                        $r = $sp->ThemSP($ten, $gia, $alias, $nhom, $ndtt, $ndct, $giakm, $km, $path . $hinh, $path_list, $tphan, $tukhoa, $mttk, $path . $hinhchse, $tragthai, $ngtao);
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
            $data = array('dslsp' => $nhomsp->TenNhomSanPham(), 'tb' => $tb);
            $this->render('ThemSanPham', $data);
        }
        $this->render('ThemSanPham', $data);
    }

    function XoaSP() {
        if (isset($_GET['ma']) && $_GET['ma']) {

            $ma = trim($_GET['ma']);
            $sp = new sanpham();
            $r = $sp->XoaSP($ma);
            if ($r > 0) {
                chuyenHuong('?controller=sanpham&action=DSSanPham');
            } else {
                chuyenHuong('?controller=hethong&action=trang404');
            }
        }
    }

    function CapNhatSP() {
        $nhomsp = new nhomsanpham();
        $tb = '';


        if (isset($_GET['ma']) && $_GET['ma']) {
            $monan = new sanpham();
            $id = $_GET['ma'];
            $ctma = $monan->CTSanPham($id);
            $data = array('dslsp' => $nhomsp->TenNhomSanPham(), 'tb' => $tb, 'ctma' => $ctma);
            if (isset($_POST['capnhat'])) {
                if (isset($_POST['ten'], $_POST['gia'], $_POST['alias'], $_POST['nhom'], $_POST['ndtt'], $_POST['ndct'], $_POST['tphan'], $_POST['tragthai'])) {
                    if (trim($_POST['ten']) && $_POST['gia'] > 0 && trim($_POST['alias']) && trim($_POST['ndtt']) && trim($_POST['ndct']) && trim($_POST['tphan'])) {
                        $ten = trim($_POST['ten']);
                        $gia = $_POST['gia'];
                        $alias = trim($_POST['alias']);
                        $nhom = $_POST['nhom'];
                        $ndtt = trim($_POST['ndtt']);
                        $ndct = trim($_POST['ndct']);
                        $tphan = trim($_POST['tphan']);
                        $tragthai = $_POST['tragthai'];
                        $mttk = isset($_POST['mttk']) && $_POST['mttk'] ? $_POST['mttk'] : "";
                        $tukhoa = isset($_POST['tukhoa']) && $_POST['tukhoa'] ? $_POST['tukhoa'] : "";
                        $giakm = isset($_POST['giakm']) && $_POST['giakm'] ? $_POST['giakm'] : 0;
                        $km = isset($_POST['kmai']) && $_POST['kmai'] ? $_POST['kmai'] : "Khăn lạnh";
                        $path = 'Image/';
                        $hinhchse = $ctma->HINHCHIASE;
                        $pathold = $ctma->HINH;
                        $patholdshare = $ctma->HINHCHIASE;
                        $pathlistold = $ctma->DSHINH;
                         $arrHinh = explode(';', $pathlistold);
                         unset($arrHinh[count($arrHinh)-1]);
                        $pathhinh='';
                        $pathhchse='';
                        $co=TRUE;
                        if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == 0) {
                            $hinh = $_FILES['hinh']['name'];
                            $pathhinh = $path.$hinh;
                            $co=move_uploaded_file($_FILES['hinh']['tmp_name'], $pathhinh)?TRUE:FALSE;
                            
                            
                            
                        } else {
                            $co = TRUE;
                            $pathhinh = $ctma->HINH;
                        }
                        if (isset($_FILES['hchse']) && $_FILES['hchse']['error'] == 0) {
                            $hinhchse = $_FILES['hchse']['name'];
                            $pathhchse = $path . $hinhchse;
                            $co = move_uploaded_file($_FILES['hchse']['tmp_name'],$pathhchse )?TRUE:FALSE;
                        } else {
                            $co = TRUE;
                            $pathhchse = $ctma->HINHCHIASE;
                        }
                        if (isset($_FILES['dshinh']) && $_FILES['dshinh']['error'] == 0) {
                            $dshinh = $_FILES['dshinh']['name'];
                            $path_list = '';
                            foreach ($dshinh as $item => $value) {
                                $des = $path . $value;
                                if (move_uploaded_file($_FILES['dshinh']['tmp_name'][$item], $des)) {
                                    $co = true;
                                    $path_list = $path_list . $des . ';';
                                } else {
                                    $co = false;
                                    break;
                                }
                            }
                        } else {
                            $co = TRUE;
                            $path_list = $ctma->DSHINH;
                        }
                        if ($co) {
                            
                           if($pathold != $pathhinh && $pathold != $patholdshare && !in_array($pathold, $arrHinh))
                            {
                                    unlink($pathold);
                            }
                            if($patholdshare != $pathhchse && $patholdshare != $pathold && !in_array($patholdshare, $arrHinh))
                            {
                                unlink($patholdshare);
                            }
                            if(!in_array($pathold, $arrHinh)&& !in_array($patholdshare, $arrHinh))
                                {
                                foreach ($arrHinh as $item)
                                {
                                    unlink($item);
                                }
                                }
                            $ngcn = date('Y-m-d');
                            
                            $r = $monan->CapNhatSP($id, $ten, $gia, $alias, $nhom, $ndtt, $ndct, $giakm, $km, $pathhinh, $path_list, $tphan, $tukhoa, $mttk, $pathhchse, $tragthai, $ngcn);
                            
                            if ($r > 0) {
                                $tb = '<div class="alert alert-success">Cập nhật thành công!</div>';
                            } else {
                                $tb = '<div class="alert alert-warning">Cập nhật thất bại! (Cũng có thể bạn không thay đổi gì cả :)))</div>';
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
                 $ctma = $monan->CTSanPham($id);
                $data = array('dslsp' => $nhomsp->TenNhomSanPham(), 'tb' => $tb, 'ctma' => $ctma);
//                xemMang($_POST);
//                xemMang($_FILES);
                $this->render('CNSanPham', $data);
            }
            $this->render('CNSanPham', $data);
        } else {
            chuyenHuong('?controller=hethong&action=trang404');
        }
    }
    function TrangChu()
    {
        $giohang = new giohang();
        $capphat = $giohang->taoGioHang();
        $sotintrentrang = 2;
        $chisotrang = isset($_GET['trang']) && $_GET['trang'] ? $_GET['trang'] : 1;

        $vitritrang = ($chisotrang - 1) * $sotintrentrang;
        $monAn = new sanpham();
        $tongsotrang = ceil($monAn->Tong() / $sotintrentrang);
        //$tong = $monAn->Tong();
        $data = array('dsma' => $monAn->DSSanPham($vitritrang, $sotintrentrang), 'tong' => $tongsotrang,'giohang'=>$capphat,'tonggiohang'=>$giohang->tong());
        $this->render('SanPhamKH', $data, 'LayoutSP');
    }
    function TrangChuPhanTrang()
    {
        $sotintrentrang = 2;
        $chisotrang = isset($_GET['trang']) && $_GET['trang'] ? $_GET['trang'] : 1;
         $giohang = new giohang();
        $capphat = $giohang->taoGioHang();
        $vitritrang = ($chisotrang - 1) * $sotintrentrang;
        $monAn = new sanpham();
        $tongsotrang = ceil($monAn->Tong() / $sotintrentrang);
        $dsma = $monAn->DSSanPham($vitritrang, $sotintrentrang);
        foreach ($dsma as $item) {
            echo '<div class="col-md-4 chain-grid grid-top-chain">
					
                  <a href="?controller=sanpham&action=ChiTietSP&ma='.$item->MA.'"><img class="img-responsive chain" src="'.$item->HINH.'" alt=" " /></a>
	   		     		<span class="star"> </span>
	   		     		<div class="grid-chain-bottom">
	   		     			<h6><a href="?controller=sanpham&action=ChiTietSP&ma='.$item->MA.'">'.$item->TEN.'</a></h6>
	   		     			<div class="star-price">
	   		     				<div class="dolor-grid"> 
		   		     				<span class="actual">'.$item->GIA_KHUYEN_MAI.'</span>
		   		     				<span class="reducedfrom">'.$item->GIA.'</span>
		   		     				  <span class="rating">
									        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
									        <label for="rating-input-1-5" class="rating-star1"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
									        <label for="rating-input-1-4" class="rating-star1"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
									        <label for="rating-input-1-3" class="rating-star"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
									        <label for="rating-input-1-2" class="rating-star"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
									        <label for="rating-input-1-1" class="rating-star"> </label>
							    	   </span>
	   		     				</div>
	   		     				<a class="now-get get-cart themhang"  data-add="'.$item->MA.'" >ADD TO CART</a>
	   		     				<div class="clearfix"> </div>
							</div>
	   		     		</div>
							
	   		     	</div>';
        }
    }
//href="?controller=giohang&action=ThemGioHang&ma='.$item->MA.'"
    function ChiTietSP()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $monan = new sanpham();
            $ma = $_GET['ma'];
            $ctma = $monan->CTSanPham($ma);
            $giohang = new giohang();
            $data = array('ctma'=>$ctma,'tonggiohang'=>$giohang->tong() );
            $this->render('ChiTietSPKH', $data, 'LayoutSP');
        }
 else {
            chuyenHuong('?controller=hethong&action=trang404');
 }
    }
    function LayDanhMuc()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $ma = $_GET['ma'];
            $nhom = new nhomsanpham();
            $dsspnhom = $nhom->ChonLoai($ma);
            $giohang = new giohang();
            $data = array('tonggiohang'=>$giohang->tong(), 'dsma'=>$dsspnhom );
            $this->render('SanPhamTheoLoai', $data, 'LayoutSP');
        }
        else
        {
            chuyenHuong('?controller=sanpham&action=TrangChu');
        }
    }
}

?>