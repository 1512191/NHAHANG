<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="?controller=sanpham&action=DSSanPham">Danh sách món ăn</a>
            </li>

            <li>
                <a href="#">Thêm người dùng</a>
            </li>

        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
            </form>
        </div><!-- /.nav-search -->
    </div>
    <div class="page-content">
        <div class="ace-settings-container" id="ace-settings-container">
            <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-cog bigger-130"></i>
            </div>

            <div class="ace-settings-box clearfix" id="ace-settings-box">
                <div class="pull-left width-50">
                    <div class="ace-settings-item">
                        <div class="pull-left">
                            <select id="skin-colorpicker" class="hide">
                                <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                            </select>
                        </div>
                        <span>&nbsp; Choose Skin</span>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                        <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                        <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                        <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                        <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                        <label class="lbl" for="ace-settings-add-container">
                            Inside
                            <b>.container</b>
                        </label>
                    </div>
                </div><!-- /.pull-left -->

                <div class="pull-left width-50">
                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                        <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                        <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                        <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                    </div>
                </div><!-- /.pull-left -->
            </div><!-- /.ace-settings-box -->
        </div><!-- /.ace-settings-container -->

        <div class="page-header">
            <h1 style="text-align: center">
                Thêm món ăn

            </h1>
        </div>
        <div class="wthree_general graph-form agile_info_shadow ">
            <div class="grid-2 ">
                <div class="form-body">
                    <form class="form-horizontal"method="POST" enctype="multipart/form-data">
                        <div class="form-group has-info"><?php echo $tb;?></div>
                        <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Tên món</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" name="ten" value="<?php echo @$_POST['ten']; ?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                       <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Đơn giá</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="number" id="inputInfo" name="gia" value="<?php echo @$_POST['gia']; ?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                        <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Alias</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" name="alias" value="<?php echo @$_POST['alias']; ?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                        
                        <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Trạng thái
                            
                            </label>
                            <div class="col-sm-8">
                                <div class="radio block"><label><input type="radio" value="1"name="tragthai" <?php if (@$_POST['tragthai'] == 1) echo'checked'; ?> > Mới</label>
                                    <label><input type="radio" value="0"name="tragthai" <?php if (@$_POST['tragthai'] == 0) echo'checked'; ?> > Cũ</label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group has-info">
                         <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Nhóm thức ăn</label>

                            <div class="col-xs-12 col-sm-5">
                                <select name="nhom">
                                    <?php
                                    foreach ($dslsp as $item) {
                                        ?>

                                        <option value="<?php echo $item->MA; ?>" <?php if (@$_POST['nhom'] == $item->MA) echo "selected = 'selected'"; ?>><?php echo $item->TEN; ?></option>


                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group has-info"> 
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Chọn hình</label>
                            <div class="col-xs-12 col-sm-5">
                                <input type="file" class="form-control" name="hinh">

                            </div>

                        </div>
                        <?php
                        if(isset($_POST['them'],$_FILES['hinh'] ) &&$_FILES['hinh']['error'] == 0)
                        {
                        ?>
                        <div class="form-group has-info" >
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Hình</label>
                            <div class="col-xs-12 col-sm-5">
                                <img src="<?php echo 'Image/'.$_FILES['hinh']['name']; ?>" width="100px" height="auto">
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="form-group has-info"> 
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Chọn hình chia sẻ</label>
                            <div class="col-xs-12 col-sm-5">
                                <input type="file" class="form-control" name="hchse">

                            </div>

                        </div>
                        <?php
                        if(isset($_POST['them'],$_FILES['hchse'] ) && $_FILES['hchse']['error'] == 0)
                        {
                        ?>
                        <div class="form-group has-info">
                             <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Hình chia sẻ</label>
                            <div class="col-xs-12 col-sm-5">
                                <img src="<?php echo 'Image/'.$_FILES['hchse']['name']; ?>" width="100px" height="auto">
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="form-group has-info"> 
                             <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Chọn danh sách hình</label>
                            <div class="col-xs-12 col-sm-5">
                                <input type="file" class="form-control" name="dshinh[]" multiple>
                            </div>
                        </div>
                        <?php
                        if(isset($_POST['them'],$_FILES['dshinh'])&& $_FILES['dshinh']['error'] == 0)
                        {
                        ?>
                        <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Danh sách hình</label>
                            <div class="col-xs-12 col-sm-5">
                                <?php
                                
                                foreach ($_FILES['dshinh']['name'] as $item) {
                                    ?>
                                    <img src="<?php echo 'Image/'.$item; ?>" width="100px" height="100px">
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        }
                        ?>

                        <div class="form-group has-info">
                             <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Nội dung chi tiết</label>
                            <div class="col-xs-12 col-sm-5">
                                <textarea id="ndctiet" rows="10" class="form-control1" name="ndct"><?php echo @$_POST['ndct']; ?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Nội dung tóm tắt</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" name="ndtt" value="<?php echo @$_POST['ndtt']; ?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                       <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Giá khuyến mãi</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="number" id="inputInfo" name="giakm" value="<?php echo @$_POST['giakm']; ?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>

                       <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Khuyến mãi</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" name="kmai" value="<?php echo @$_POST['kmai']; ?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                        <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Thành phần</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" name="tphan" value="<?php echo @$_POST['tphan']; ?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                        <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Từ khóa</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" name="tukhoa" value="<?php echo @$_POST['tukhoa']; ?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                        <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Mô tả tìm kiếm</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" name="mttk" value="<?php echo @$_POST['mttk']; ?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" name="them" class="btn btn-app">Thêm</button>
                            <a class="btn btn-app" href="?controller=sanpham&action=DSSanPham">Trở về</a>
                            <hr />

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    var DOMAIN = 'http://localhost:81/DoAnMVC/tool/';
    function chonfile(field)
    {
        CKFinder.popup('../../', null, null, function (url) {
            caigiatrichoinput(url, field)
        });
    }
    function caigiatrichoinput(fileUrl, id)
    {
        $('#' + id).val(fileUrl);
        $('#' + id).parent().children('img').attr('src', fileUrl);
    }
</script>
<script src="http://localhost:81/DoAnMVC/tool/ckeditor/ckeditor.js"></script>
<script src="http://localhost:81/DoAnMVC/tool/ckfinder/ckfinder.js"></script>
<script>CKEDITOR.replace('ndctiet')</script>