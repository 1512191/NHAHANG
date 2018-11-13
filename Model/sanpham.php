<?php
class sanpham extends database
{
    function DSSanPham($vtri=0, $soluong=0)
    {
        $limit='';
        if($soluong > 0 && $vtri >= 0)
        {
            $limit=" limit $vtri,$soluong";
        }
        $query = 'SELECT *FROM monan'.$limit;
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function Tong()
    {
        $query = "SELECT COUNT(MA) AS Tong FROM monan";
        $this->setQuery($query);
        return $this->loadRow()->Tong;
    }
            function CTSanPham($id)
    {
        $query = "SELECT *FROM monan WHERE MA=?";
        $this->setQuery($query);
        return $this->loadRow(array($id));
    }
    function CapNhatSP($ma, $ten, $gia, $alias, $nhom, $ndtt, $ndct, $giakm, $km, $hinh, $dshinh, $thphan, $tukhoa, $mttk, $hchiase, 
            $trthai, $ngcn)
    {
        $query = "update monan set TEN=?, GIA=?, ALIAS=?, MANHOM=?, NOIDUNGTOMTAT=?, NOIDUNGCHITIET=?, GIA_KHUYEN_MAI=?, KHUYENMAI=?,HINH=?, DSHINH=?, THANHPHAN=?, TUKHOA=?, MTTIMKIEM=?, HINHCHIASE=?, TRANGTHAI=?, NGAYCAPNHAT=? where MA=?";
        $this->setQuery($query);
        return $this->exec1(array($ten, $gia, $alias, $nhom, $ndtt, $ndct,$giakm, $km, $hinh, $dshinh, $thphan, $tukhoa, $mttk, $hchiase, $trthai, $ngcn, $ma));
    }
    function ThemSP($ten, $gia, $alias, $nhom, $ndtt, $ndct, $giakm, $km, $hinh, $dshinh, $thphan, $tukhoa, $mttk, $hchiase, 
            $trthai, $ngtao)
    {
        $query="INSERT INTO monan(TEN, GIA, ALIAS, MANHOM, NOIDUNGTOMTAT, NOIDUNGCHITIET, "
                . "GIA_KHUYEN_MAI, KHUYENMAI, HINH, DSHINH, THANHPHAN, TUKHOA, MTTIMKIEM, HINHCHIASE, TRANGTHAI, NGAYTAO)"
                . "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->setQuery($query);
        return $this->exec1(array($ten, $gia, $alias, $nhom, $ndtt, $ndct, $giakm, $km, $hinh, $dshinh, $thphan, $tukhoa, $mttk, $hchiase, $trthai, $ngtao));
    }
    function XoaSP($ma)
    {
        $query = "DELETE FROM monan WHERE MA=?";
        $this->setQuery($query);
        return $this->exec1(array($ma));
    }
    
}
?>