<?php
class hethong_controller extends controller
{
    function __construct() {
        $this->pathview='View/HeThong/';
    }
    function trangChu()
    {
        $array = array(1, 2, 3);
        $this->render('TrangChu', $array);
    }
    function trang404()
    {
        $this->render('404', 'Emty');
    }
    function trangGioiThieu()
    {
        $this->render('GioiThieu');
    }
    function trangLienHe()
    {
        $this->render('LienHe');
    }
}
?>