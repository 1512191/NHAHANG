<?php
class nguoidung extends database
{
    function DSNguoiDung($vtri=0, $soluong=0)
    {
        
        $query = 'SELECT *FROM tai_khoan';
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function CTNguoiDung($ma)
    {
        $query = "SELECT *FROM tai_khoan WHERE MA=?";
        $this->setQuery($query);
        return $this->loadRow(array($ma));
    }
    function CapNhatND($ma, $tendn, $ten, $mk, $maqt, $tragthai, $ngcn, $avatar)
    {
        $query = "update tai_khoan set TEN=?, TENDN=?, MATKHAU=?, MAQT=?, TRANGTHAI=?, NGAYCAPNHAT=?, AVATAR=? where MA=?";
        $this->setQuery($query);
        return $this->exec1(array($ten, $tendn, $mk, $maqt, $tragthai, $ngcn, $avatar, $ma));
    }
    function ThemND($tendn, $ten, $mk, $maqt, $tragthai, $nglap, $avatar)
    {
        $query = "INSERT INTO tai_khoan(TEN, TENDN, MATKHAU, MAQT, TRANGTHAI, NGAYLAP, AVATAR) VALUES(?, ?, ?, ?, ?, ?,?)";
        $this->setQuery($query);
        return $this->exec1(array($tendn, $ten, $mk, $maqt, $tragthai, $nglap, $avatar));
    }
    function DangNhap($tendn, $mk)
    {
        $query = "SELECT *FROM tai_khoan WHERE TENDN=? AND MATKHAU=?";
        $this->setQuery($query);
        return $this->loadRow(array($tendn, $mk));
    }
    function DangKi($tendn, $mk, $nglap, $maqt, $ten, $trangthai)
    {
        $query = "INSERT INTO tai_khoan(TEN, TENDN, MATKHAU, MAQT, NGAYLAP,TRANGTHAI) VALUES(?, ?, ?, ?, ?, ?)";
        $this->setQuery($query);
        return $this->exec1(array($ten, $tendn, $mk, $maqt, $nglap, $trangthai));    
    }
    function QuenMatKhau()
    {
        
        
        
    }
    function ktraTenDangNhap($tendn)
    {
        $dsnd = $this->DSNguoiDung();
        $co = true;
        foreach ($dsnd as $item)
        {
            if($item->TENDN === $tendn)
                $co = false;
        }
    }
    function XoaND($id)
    {
        $query = "DELETE FROM tai_khoan WHERE MA=?";
        $this->setQuery($query);
        return $this->exec1(array($id));
    }
}
?>