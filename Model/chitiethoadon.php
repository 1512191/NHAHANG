<?php
class chitiethoadon extends database
{
    function ThemChiTiet($mahd, $mamon, $soluong, $gia, $giamgia)
    {
        $query = "INSERT INTO chitiethd(MAHD, MAMON, SOLUONG, GIA, GIAMGIA) VALUES(?,?, ?, ?, ?)";
        $this->setQuery($query);
        return $this->exec1(array($mahd, $mamon, $soluong, $gia, $giamgia));
                
    }
    function ChiTietHD($mahd)
    {
        $query = "SELECT *FROM chitiethd WHERE MAHD=?";
        $this->setQuery($query);
        return $this->loadRowAll(array($mahd));
    }
}
?>