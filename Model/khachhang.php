<?php
class khachhang extends database
{
    function DSKhachHang($vtri=0, $soluong=0)
    {
        $limit='';
        if($soluong > 0 && $vtri >= 0)
        {
            $limit=" limit $vtri,$soluong";
        }
        $query = "SELECT *FROM khachhang".$limit;
        $this->setQuery($query);
        return $this->loadRowAll();
                
    }
    function Tong()
    {
        $query="SELECT COUNT(MA) AS Tong FROM khachhang";
        $this->setQuery($query);
        return $this->loadRow()->Tong;
    }
    function Xoa($ma)
    {
        $query = "DELETE FROM khachhang WHERE MA=?";
        $this->setQuery($query);
        return $this->exec1(array($ma));
    }
    function CapNhatKH($ma, $ten, $diachi, $sdt, $email,$ngcn)
    {
        $query = "UPDATE khachhang SET TEN=?,DIACHI=?, SDT=?, EMAIL=?, NGAYCAPNHAT=? WHERE MA=?";
        $this->setQuery($query);
        return $this->exec1(array($ten, $diachi, $sdt, $email, $ngcn,$ma));
    }
    function DangKi($ten, $tendn, $mk, $diachi, $sdt, $email, $ngtao, $trangthai)
    {
        $query = "INSERT INTO khachhang(TEN, TENDN, MK, DIACHI, SDT, EMAIL, NGAYTAO, TRANGTHAI) VALUES(?, ?, ?, ?, ?,?, ?, ?)";
        $this->setQuery($query);
        return $this->exec1(array($ten, $tendn, $mk, $diachi, $sdt, $email, $ngtao, $trangthai));
    }
    function DSTenDangNhap()
    {
        $query = "SELECT TENDN FROM khachhang";
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function DangNhap($tdn, $mk)
    {
        $query = "SELECT * FROM khachhang WHERE TENDN=? AND MK=?";
        $this->setQuery($query);
        return $this->loadRow(array($tdn, $mk));
    }
    function ChiTiet($ma)
    {
        $query = "SELECT *FROM khachhang WHERE MA=?";
        $this->setQuery($query);
        return $this->loadRow(array($ma));
    }
    function TaiKhoan($ma)
    {
        $query ="SELECT TENDN, MK FROM khachhang WHERE MA=?";
        $this->setQuery($query);
        return $this->loadRow(array($ma));
    }
    function ThayDoiTaiKhoan($ma, $mk, $tdn)
    {
        $query = "UPDATE khachhang SET TENDN=?, MK=? WHERE MA=?";
        $this->setQuery($query);
        return $this->exec1(array($tdn, $mk, $ma));
    }
    function DSTenDangNhapHopLe($ma)
    {
        $query="SELECT TENDN FROM khachhang WHERE TENDN NOT IN (SELECT TENDN FROM khachhang WHERE MA=?)";
        $this->setQuery($query);
        return $this->loadRowAll(array($ma));
    }
}
?>