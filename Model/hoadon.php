<?php
class hoadon extends database
{
    function DSHoaDon($vtri = 0, $soluong = 0)
    {
        $limit='';
        if($soluong > 0 && $vtri >= 0)
        {
            $limit=" limit $vtri,$soluong";
        }
        $query = "SELECT *FROM hoadon".$limit;
        $this->setQuery($query);
        return $this->loadRowAll();
    }
    function ThemHoaDon($mahd, $makh, $tongtien, $ngtao)
    {
        $query="INSERT INTO hoadon(MADH, MAKH, TONGTIEN, NGAYTAO) VALUES(?, ?, ?, ?)";
        $this->setQuery($query);
        return $this->exec1(array($mahd, $makh, $tongtien, $ngtao));
    }
}
?>