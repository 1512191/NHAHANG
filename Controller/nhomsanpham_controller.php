<?php
class nhomsanpham_controller extends controller
{
    function __construct() {
        $this->pathview='View/NhomSP/';
    }
    function DSNhomSP()
    {
       
         $sotintrentrang = 2;
        $chisotrang = isset($_GET['trang']) && $_GET['trang'] ? $_GET['trang'] : 1;
        $lsp = new nhomsanpham();
        $vitritrang = ($chisotrang - 1) * $sotintrentrang;
        $tongsotrang = ceil($lsp->Tong() / $sotintrentrang);
        
        $data = array('dslsp'=>$lsp->DSNhomSanPham($vitritrang, $sotintrentrang), 'TongSoTrang'=>$tongsotrang);
        $this->render('DSNhomSP', $data);
    }
    function DSNhomSPPhanTrang()
    {
        $sotintrentrang = 2;
        $chisotrang = isset($_GET['trang']) && $_GET['trang'] ? $_GET['trang'] : 1;
        $lsp = new nhomsanpham();
        $vitritrang = ($chisotrang - 1) * $sotintrentrang;
        $tongsotrang = ceil($lsp->Tong() / $sotintrentrang);
        $dslsp = $lsp->DSNhomSanPham($vitritrang, $sotintrentrang);
        foreach ($dslsp as $item)
        {
            echo '<tr class="' . doiMau($item->TRANGTHAI) . '">
                 <td>' . $item->MA . '</td>
        <td>' . $item->TEN . '</td>
        <td>' . $item->MANHOM . '</td>
        <td>' . $item->ALIAS . '</td>
        <td>' . $item->TUKHOA . '</td>
        <td>' . $item->MTTIMKIEM . '</td>
        <td>' . date('d-m-Y',strtotime($item->NGAYTAO)) . '</td>
        <td>' . date('d-m-Y',strtotime($item->NGAYCAPNHAT)) . '</td>
        <td><img src="' . $item->HINHCHIASE . '"width="100px" height="100px"></td>
        <td>' . $item->TRANGTHAI . '</td>
        <td>
           
            
            <a href="?controller=nhomsanpham&action=CapNhatNSP&ma=' . $item->MA . '" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                        </span>
                                                    </a>
            
            <a onclick="return confirm("Bạn chắc chắn với điều này")" href="?controller=nhomsanpham&action=XoaNSP&ma=' . $item->MA . '" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                        <span class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                        </span>
            </a>
        </td>    
     </tr>';
        }
        
    }
    function CapNhatNSP()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $ma = $_GET['ma'];
            $lsp = new nhomsanpham();
            $tb = '';
            $tenlsp = $lsp->TenNhomSanPham();
            $ctma = $lsp->CTNhomSanPham($ma);
            $data = array('ctma'=>$ctma,'tb'=>$tb, 'tenlsp'=>$tenlsp);
            if(isset($_POST['capnhat']))
            {
                if(isset($_POST['ten'], $_POST['alias']) && trim($_POST['ten']) && trim($_POST['alias']))
                {
                    $ten = trim($_POST['ten']);
                    $alias = trim($_POST['alias']);
                    $manhom = isset($_POST['manhom']) && $_POST['manhom']? $_POST['manhom'] : 0;
                   
                    $tukhoa = isset($_POST['tukhoa']) && trim($_POST['tukhoa'])? trim($_POST['tukhoa']) : '';
                    $mttk= isset($_POST['mttk']) && trim($_POST['mttk'])? trim($_POST['mttk']) : '';
                    $tragthai = $_POST['tragthai'];
                    $ngcn=date('Y-m-d');
                    $path = 'Image/';
                    $pathhinh = '';
                    if(isset($_FILES['hinh']) && $_FILES['hinh']['error'] == 0)
                    {
                        $hinh = $_FILES['hinh']['name'];
                        $pathhinh = $path.$hinh;
                        if(move_uploaded_file($_FILES['hinh']['tmp_name'], $pathhinh))
                        {
                            $pathhinh = $path.$hinh;
                            if($pathhinh != $ctma->HINHCHIASE )
                            {
                                unlink($ctma->HINHCHIASE);
                            }
                        }
                        else
                        {
                            $pathhinh = $ctma->HINHCHIASE;
                            $tb='<div class="alert alert-danger">Upload thất bại!</div>';
                        }
                                
                    }
                    else
                    {
                        $pathhinh = $ctma->HINHCHIASE;
                    }
                    $r = $lsp->CapNhatNSP($ten, $manhom, $alias, $tukhoa, $mttk, $pathhinh, $ngcn, $tragthai, $ma);
                    if($r > 0)
                    {
                        
                        $tb='<div class="alert alert-success">Cập nhật thành công</div>';
                    }
                    else
                        $tb='<div class="alert alert-warning">Bạn không thay đổi gì cả!</div>';
                }
                else
                {
                    $tb='<div class="alert alert-danger">Thông tin không hợp lệ</div>';
                }
                 $ctma = $lsp->CTNhomSanPham($ma);
                 $data = array('ctma'=>$ctma,'tb'=>$tb,'tenlsp'=>$tenlsp);
                 $this->render('CapNhatNSP', $data);
            }
            $this->render('CapNhatNSP', $data);
        }
        else
            chuyenHuong ('?controller=hethong&action=trang404');
    }
    function XoaNSP()
    {
        if(isset($_GET['ma']) && $_GET['ma'])
        {
            $ma = $_GET['ma'];
            $lsp = new nhomsanpham();
            $r = $lsp->Xoa($ma);
            if($r > 0)
            {
                chuyenHuong('?controller=nhomsanpham&action=DSNhomSP');
            }
            else
                chuyenHuong ('?controller=hethong&action=trang404');
        }
        else
            chuyenHuong ('?controller=hethong&action=trang404');
    }
    function ThemNSP()
    {
        $lsp = new nhomsanpham();
        $tenlsp = $lsp->TenNhomSanPham();
        $tb='';
        $data = array('tenlsp'=>$tenlsp, 'tb'=>$tb);
        if(isset($_POST['them']))
        {
            if(isset($_POST['ten'], $_POST['alias'], $_FILES['hinh']))
            {
                if(trim($_POST['ten']) && trim($_POST['alias']) && $_FILES['hinh']['error'] == 0)
                {
                    $ten = trim($_POST['ten']);
                    $alias = trim($_POST['alias']);
                    $nhom = isset($_POST['manhom'])&& $_POST['manhom'] ? $_POST['manhom'] : 0;
                    $mttk = isset($_POST['mttk']) && $_POST['mttk'] ? $_POST['mttk'] :'';
                    $tukhoa = isset($_POST['tukhoa']) && $_POST['tukhoa'] ?$_POST['tukhoa'] : '';
                    $tragthai = isset($_POST['tragthai'])&& $_POST['tragthai'] ? $_POST['tragthai'] : 0;
                    $ngtao = date('Y-m-d');
                    $path = 'Image/';
                    $hinh = $path.$_FILES['hinh']['name'];
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $hinh))
                    {
                        $r = $lsp->ThemNhomSP($ten, $nhom, $alias, $tukhoa, $mttk, $hinh, $ngtao, $tragthai);
                        if($r > 0)
                        {
                            $tb='<div class="alert alert-success">Thêm thành công!</div>';
                        }
                        else
                            $tb='<div class="alert alert-danger">Thông thất bại!</div>';
                    }
                    else
                    {
                        $tb='<div class="alert alert-danger">Upload thất bại!</div>';
                    }
                }
                else
                {
                    $tb='<div class="alert alert-danger">Thông tin không hợp lệ!</div>';
                }
            }
            else
            {
                $tb='<div class="alert alert-danger">Vui lòng nhập tên, alias, và upload file ảnh!</div>';
            }
            $data = array('tenlsp'=>$tenlsp, 'tb'=>$tb);
            $this->render('ThemNSP', $data);
        }
        $this->render('ThemNSP', $data);
    }
}
?>