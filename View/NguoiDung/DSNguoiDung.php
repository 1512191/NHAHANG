<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Danh sách người dùng</a>
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
            <h1>
                User Profile Page
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    3 styles with inline editable feature
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <table id="simple-table" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th class="detail-col">Chi tiết</th>
                            <th>Mã</th>


                            <th>
                                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                Ngày cập nhật
                            </th>
                            <th class="hidden-480">Tình trạng</th>

                            <th>Tác vụ</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($dsnd as $item) {
                            ?>
                            <tr>
                                <td class="center">
                                    <label class="pos-rel">
                                        <input type="checkbox" class="ace" />
                                        <span class="lbl"></span>
                                    </label>
                                </td>

                                <td class="center">
                                    <div class="action-buttons">
                                        <a href="#" class="green bigger-140 show-details-btn" title="Xem chi tiết">
                                            <i class="ace-icon fa fa-angle-double-down"></i>
                                            <span class="sr-only">Chi tiết</span>
                                        </a>
                                    </div>
                                </td>


                                <td><?php echo $item->MA; ?></td>

                                <td><?php echo $item->NGAYCAPNHAT; ?></td>

                                <td class="hidden-480">
                                    <span class="label label-sm label-warning"><?php echo $item->TRANGTHAI; ?></span>
                                </td>

                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <button class="btn btn-xs btn-success">
                                            <i class="ace-icon fa fa-check bigger-120"></i>
                                        </button>

                                        <button class="btn btn-xs btn-info">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </button>

                                        <a class="btn btn-xs btn-danger" onclick="return confirm('Bạn chắc chắn với điều này')" href="?controller=nguoidung&action=XoaND&ma=<?php echo $item->MA;?>">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            
                                        </a>

                                        <button class="btn btn-xs btn-warning">
                                            <i class="ace-icon fa fa-flag bigger-120"></i>
                                        </button>
                                    </div>

                                    <div class="hidden-md hidden-lg">
                                        <div class="inline pos-rel">
                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                <li>
                                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                        <span class="blue">
                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a onclick="return confirm('Bạn chắc chắn với điều này')" href="?controller=nguoidung&action=XoaND&ma=<?php echo $item->MA;?>" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                        <span class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr class="detail-row">
                                <td colspan="8">
                                    <div class="table-detail">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-2">
                                                <div class="text-center">
                                                    <img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="<?php echo $item->AVATAR; ?>" />
                                                    <br />
                                                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                                        <div class="inline position-relative">
                                                            <a class="user-title-label" href="#">
                                                                <i class="ace-icon fa fa-circle light-green"></i>
                                                                &nbsp;
                                                                <span class="white"><?php echo $item->TEN; ?></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-7">
                                                <div class="space visible-xs"></div>

                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Tên đăng nhập </div>

                                                        <div class="profile-info-value">
                                                            <span><?php echo $item->TENDN; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Mật khẩu </div>

                                                        <div class="profile-info-value">
                                                            <span><?php echo $item->MATKHAU; ?></span>
                                                        </div>
                                                    </div>

                                                    <!--                                        <div class="profile-info-row">
                                                                                                <div class="profile-info-name"> Location </div>
                                                    
                                                                                                <div class="profile-info-value">
                                                                                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                                                                    <span>Netherlands, Amsterdam</span>
                                                                                                </div>
                                                                                            </div>-->

                                                    <!--                                        <div class="profile-info-row">
                                                                                                <div class="profile-info-name"> Age </div>
                                                    
                                                                                                <div class="profile-info-value">
                                                                                                    <span>38</span>
                                                                                                </div>
                                                                                            </div>-->
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Loại quản trị </div>

                                                        <div class="profile-info-value">
                                                            <?php
                                                            foreach($dsqt as $qt)
                                                            {
                                                                if($item->MAQT === $qt->MA)
                                                                {
                                                                    ?>
                                                            <span><?php echo $qt->LOAIQTRI; ?></span>
                                                            <?php
                                                            
                                                                }
                                                            }
                                                            ?>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Ngày tham gia </div>

                                                        <div class="profile-info-value">
                                                            <span><?php echo $item->NGAYLAP; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Lần cuối online </div>

                                                        <div class="profile-info-value">
                                                            <span>3 hours ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Ngày cập nhật mới nhất </div>

                                                        <div class="profile-info-value">
                                                            <span><?php echo $item->NGAYCAPNHAT; ?></span>
                                                        </div>
                                                    </div>
                                                    <!--                                        <div class="profile-info-row">
                                                                                                <div class="profile-info-name"> About Me </div>
                                                    
                                                                                                <div class="profile-info-value">
                                                                                                    <span>Bio</span>
                                                                                                </div>
                                                                                            </div>-->
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-3">
                                                <div class="space visible-xs"></div>
                                                <h4 class="header blue lighter less-margin">Send a message to Alex</h4>

                                                <div class="space-6"></div>

                                                <form>
                                                    <fieldset>
                                                        <textarea class="width-100" resize="none" placeholder="Type something…"></textarea>
                                                    </fieldset>

                                                    <div class="hr hr-dotted"></div>

                                                    <div class="clearfix">
                                                        <label class="pull-left">
                                                            <input type="checkbox" class="ace" />
                                                            <span class="lbl"> Email me a copy</span>
                                                        </label>

                                                        <button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="button">
                                                            Submit
                                                            <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div><!-- /.span -->
        </div>
    </div>
</div>