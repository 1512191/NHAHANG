<?php
class nhomsanpham extends database
{
    function DSNhomSanPham($vtri=0, $soluong=0)
    {
        $limit='';
        if($soluong > 0 && $vtri >= 0)
        {
            $limit=" limit $vtri,$soluong";
        }
        $query = "SELECT *FROM nhom".$limit;
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function Tong()
    {
        $query = "SELECT COUNT(MA) AS Tong FROM nhom";
        $this->setQuery($query);
        return $this->loadRow()->Tong;
    }
    function TenNhomSanPham()
    {
        $query = "SELECT MA, TEN FROM nhom";
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function ThemNhomSP($ten, $manhom, $alias, $tukhoa, $mttk, $hchse, $ngtao, $tragthai)
    {
        $query = "INSERT INTO nhom(TEN, MANHOM, ALIAS, TUKHOA, MTTIMKIEM, HINHCHIASE, NGAYTAO, TRANGTHAI) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $this->setQuery($query);
        return $this->exec1(array($ten, $manhom, $alias, $tukhoa, $mttk, $hchse, $ngtao, $tragthai));
    }
    function CapNhatNSP($ten, $manhom, $alias, $tukhoa, $mttk, $hchse, $ngcn, $tragthai, $ma)
    {
        $query = "UPDATE nhom SET TEN=?, MANHOM=?, ALIAS=?, TUKHOA=?, MTTIMKIEM=?, HINHCHIASE=?, NGAYCAPNHAT=?, TRANGTHAI=? WHERE MA=?";
        $this->setQuery($query);
        return $this->exec1(array($ten, $manhom, $alias, $tukhoa, $mttk, $hchse, $ngcn, $tragthai, $ma));
    }
    function Xoa($id)
    {
        $query = "DELETE FROM nhom WHERE MA=?";
        $this->setQuery($query);
        return $this->exec1(array($id));
    }
    function CTNhomSanPham($id)
    {
        $query = "SELECT *FROM nhom WHERE MA=?";
        $this->setQuery($query);
        return $this->loadRow(array($id));
    }
    function LayMaNhom()
    {
         $query = "SELECT MANHOM, TEN FROM nhom";
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function MaNhom()
    {
         $query = "SELECT MANHOM FROM nhom";
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function ChonLoai($ma)
    {
        $query = "SELECT *FROM monan WHERE MANHOM IN (SELECT MA FROM nhom WHERE MA=?)";
        $this->setQuery($query);
        return $this->loadRowAll(array($ma));
    }
    
}
?>