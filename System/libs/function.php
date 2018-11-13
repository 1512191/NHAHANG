<?php
function chuyenHuong($path='?controller=hethong&action=TrangChu')
{
    header('Location: '.$path);
}
function xemMang($a=array())
{
    echo '<pre>';
    print_r($a);
    echo '</pre>';
}
function XoaFile($path)
{
    if(file_exists($path))
    {
        if(unlink($path))
        {
            return TRUE;
        }
        return FALSE;
    }
    return false;
}
function ktraDangNhap()
{
    if(isset($_SESSION['login']) && $_SESSION['login'])
    {
        return true;
    }
    return false;
}
function doiMau($trangthai)
{
    if($trangthai == 1)
    {
        return 'alert alert-warning';//chưa kích hoạt||thành viên
    }
    else if($trangthai == 0)
    {
        return 'alert alert-danger';//khóa
    }
    else
    {
        return 'alert alert-success';
    }
}
function doiTenTrangThai($trangthai)//khách hàng
{
    if($trangthai == 1)
    {
        return 'THÀNH VIÊN';//chưa kích hoạt||thành viên
    }
    else if($trangthai == 0)
    {
        return 'HẾT HẠN';//khóa
    }
    else
    {
        return 'VIP';
    }
}
function classtragThaiQT($tragthai)
{
    if($tragthai == 0)
    {
        return 'label label-inverse arrowed';
    }
    else
    {
        return 'label label-success arrowed-in arrowed-in-right';
    }
}
function TrangThai($tragthai)
{
    if($tragthai == 0)
    {
        return 'Ẩn';
    }
    else
    {
        return 'Đang hiện';
    }
}
function ktrDangNhapKH()
{
    if(isset($_SESSION['loginkh']) && $_SESSION['loginkh'])
    {
        return true;
    }
 else {
        return false;
    }
}
?>