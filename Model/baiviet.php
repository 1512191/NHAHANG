<?php
class baiviet extends database
{
    function DSBaiViet($vtri=0, $soluong=0)
    {
        $limit='';
        if($soluong > 0 && $vtri >= 0)
        {
            $limit=" limit $vtri,$soluong";
        }
        $query = 'SELECT *FROM baiviet'.$limit;
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function Tong()
    {
        $query = "SELECT COUNT(MA) AS Tong FROM baiviet";
        $this->setQuery($query);
        return $this->loadRow()->Tong;
    }
            function CTBaiViet($id)
    {
        $query = "SELECT *FROM baiviet WHERE MA=?";
        $this->setQuery($query);
        return $this->loadRow(array($id));
    }
    function CapNhatBaiViet($ma, $ten,$alias, $nhom, $ndtt, $ndct, $hchiase, $tukhoa, $mttk,$trthai, $ngcn)
    {
        $query = "update baiviet set TEN=?, ALIAS=?, MANHOM=?, NOIDUNGTOMTAT=?, NOIDUNGCHITIET=?, TUKHOA=?, MTTIMKIEM=?, HINHCHIASE=?, TRANGTHAI=?, NGAYCAPNHAT=? where MA=?";
        $this->setQuery($query);
        return $this->exec1(array($ten, $alias, $nhom, $ndtt, $ndct,$tukhoa, $mttk, $hchiase, $trthai, $ngcn, $ma));
    }
    function ThemBaiViet($ten, $alias, $nhom, $ndtt, $ndct, $tukhoa, $mttk, $hchiase,$trthai, $ngtao)
    {
        $query="INSERT INTO baiviet(TEN, ALIAS, MANHOM, NOIDUNGTOMTAT, NOIDUNGCHITIET,TUKHOA, MTTIMKIEM, HINHCHIASE, TRANGTHAI, NGAYTAO)"
                . "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->setQuery($query);
        return $this->exec1(array($ten, $alias, $nhom, $ndtt, $ndct,$tukhoa, $mttk, $hchiase, $trthai, $ngtao));
    }
    function XoaBaiViet($ma)
    {
        $query = "DELETE FROM baiviet WHERE MA=?";
        $this->setQuery($query);
        return $this->exec1(array($ma));
    }
    
}
?>