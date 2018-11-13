<?PHP
$time = strtotime($ctbv->NGAYTAO);

$newformat = date('d-m-Y',$time);  
$updateformat = strtotime($ctbv->NGAYCAPNHAT);
$dateupdate = date('d-m-Y',$updateformat);
?>
<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="?controller=baiviet&action=DSBaiViet">Danh sách bài viết</a>
            </li>

            <li>
                <a href="#">Chi tiết bài viết</a>
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
                Chi tiết bài viết

            </h1>
        </div>
<div class="wthree_general graph-form agile_info_shadow ">
    
    <div class="grid-1 ">
        <div class="form-body">
            <form class="form-horizontal">
                <div class="form-group has-info" >
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Hình</label>
                            <div class="col-xs-12 col-sm-5" style="text-align: center">
                                <img src="<?php echo $ctbv->HINHCHIASE; ?>" width="200px" height="auto">
                               
                           
                            </div>
                            
                        </div>
                            <div class="form-group has-info">
                                
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Mã</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" readonly="true" value="<?php echo $ctbv->MA;?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                           <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Tên</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" readonly="true" value="<?php echo $ctbv->TEN;?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                
                           <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Alias</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" readonly="true" value="<?php echo $ctbv->ALIAS;?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                          <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Nội dung tóm tắt</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" readonly="true" value="<?php echo $ctbv->NOIDUNGTOMTAT;?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
              
                 <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Từ khóa</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" readonly="true" value="<?php echo $ctbv->TUKHOA;?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Mô tả tìm kiếm</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" readonly="true" value="<?php echo $ctbv->MTTIMKIEM;?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Ngày lập</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" readonly="true" value="<?php echo $newformat;?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Ngày cập nhật</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="inputInfo" readonly="true" value="<?php echo $dateupdate;?>" class="width-100">
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                 <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Nội dung chi tiết</label>

                            <div class="col-xs-12 col-sm-5">
                                <span class="block input-icon input-icon-right">
                                    <textarea rows="10" type="text" id="inputInfo" readonly="true" class="width-100"><?php echo $ctbv->NOIDUNGCHITIET;?></textarea>
                                    <i class="ace-icon fa fa-info-circle"></i>
                                </span>
                            </div>
                           
                        </div>
                <div class="form-group has-info">
                         <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Nhóm tin</label>

                            <div class="col-xs-12 col-sm-5">
                                <select redonly="true">
                                    <?php
                                    foreach ($dstin as $item) {
                                        ?>

                                        <option value="<?php echo $item->MA; ?>" <?php if ($ctbv->MANHOM == $item->MA) echo "selected = 'selected'"; ?>><?php echo $item->TEN; ?></option>


                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                           <div class="form-group has-info">
                            <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Trạng thái
                            
                            </label>
                               <div class="col-xs-12 col-sm-5" style="color: #337ab7">
                                <div class="radio block"><label><input type="radio" value="1" <?php if ($ctbv->TRANGTHAI == 1) echo'checked'; ?> > Đang hoạt động</label>
                                    <label style="margin-left: 30px"><input type="radio" value="0" <?php if ($ctbv->TRANGTHAI == 0) echo'checked'; ?> > Ẩn</label>
                                </div>
                            </div>

                        </div>
                
                <div class="text-center">
                   
                    <a class="btn-success btn" href="?controller=baiviet&action=DSBaiViet">Trở về</a>
                    <hr />

                </div>
            </form>
        </div>

    </div>
</div>
</div>
</div>