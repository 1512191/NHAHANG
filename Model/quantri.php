<?php
class quantri extends database
{
    function DSQuanTri()
    {
        $query = "SELECT *FROM nhomqtri";
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function TenQuanTri()
    {
        $query = "SELECT MA, LOAIQTRI FROM nhomqtri";
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function ThemLoaiQuanTri($tenqtri, $tragthai, $ngtao)
    {
        $query ="INSERT INTO nhomqtri(LOAIQTRI, TRANGTHAI, NGAYTAO) VALUES(?, ?, ?)";
        $this->setQuery($query);
        return $this->exec1(array($tenqtri, $tragthai, $ngtao));
    }
    function XoaQT($ma)
    {
        $query="DELETE FROM nhomqtri WHERE MA =?";
        $this->setQuery($query);
        return $this->loadRow(array($ma));
    }
    function CapNhatQT($ma, $ten, $tragthai, $ngaycn)
    {
        $query="UPDATE nhomqtri SET LOAIQTRI=?, TRANGTHAI=?, NGAYCAPNHAT=? WHERE MA=?";
        $this->setQuery($query);
        return $this->exec1(array($ten, $tragthai, $ngaycn, $ma));
    }
    function ChiTietQT($ma)
    {
        $query = "SELECT *FROM nhomqtri WHERE MA=?";
        $this->setQuery($query);
        return $this->loadRow(array($ma));
    }
}
?>