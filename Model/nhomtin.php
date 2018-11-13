<?php
class nhomtin extends database
{
    function DSNhomTin()
    {
        $query = "SELECT *FROM nhomtin";
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function TenNhomTin()
    {
        $query = "SELECT MA, TEN FROM nhomtin";
        $this->setQuery($query);
        return $this->loadRowAll();
    }
            function ThemNhomTin($ten, $alias,$tragthai, $ngtao)
    {
        $query ="INSERT INTO nhomtin(TEN, ALIAS, TRANGTHAI, NGAYTAO) VALUES(?,?, ?, ?)";
        $this->setQuery($query);
        return $this->exec1(array($ten, $alias,$tragthai, $ngtao));
    }
    function XoaNhomTin($ma)
    {
        $query="DELETE FROM nhomtin WHERE MA =?";
        $this->setQuery($query);
        return $this->loadRow(array($ma));
    }
    function CapNhatNhomTin($ma, $ten, $alias, $tragthai, $ngaycn)
    {
        $query="UPDATE nhomtin SET TEN=?, ALIAS=?, TRANGTHAI=?, NGAYCAPNHAT=? WHERE MA=?";
        $this->setQuery($query);
        return $this->exec1(array($ten, $alias, $tragthai, $ngaycn, $ma));
    }
    function ChiTietNhomTin($ma)
    {
        $query = "SELECT *FROM nhomtin WHERE MA=?";
        $this->setQuery($query);
        return $this->loadRow(array($ma));
    }
}
?>