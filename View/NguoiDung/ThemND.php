<?php
function classStatus($trangthai)
{
    if($trangthai == 0)
    {
        return 'light-grey';
    }
    else if($trangthai == 1)
    {
        return 'light-red';
    }
    else
    {
        return 'light-green'; 
    }
      
}

?>
<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Danh sách người dùng</a>
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
                Thêm người dùng
                
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
               
                <div class="hr dotted"></div>

                <div>
                    <div id="user-profile-1" class="user-profile row">
                        <form method="POST" enctype="multipart/form-data">
                            <div><?php echo @$tb;?></div>
                        <div class="col-xs-12 col-sm-3 center">
                            <div>
                                <span class="profile-picture">
                                    <img id="avatar" class="editable img-responsive" alt="Avatar" src="Image/<?php echo @$_FILES['hinh']['name']?>" />
                                    
                                </span>

                                <div class="space-4"></div>

                                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                    <div class="inline position-relative">
                                        <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                            <i class="ace-icon fa fa-circle <?php echo classStatus(@$_POST['trangthai']) ?>"></i>
                                            &nbsp;
                                            <span class="white"><?php echo @$_POST['ten'];?></span>
                                        </a>

                                       
                                    </div>
                                </div>
                            </div>

                            <div class="space-6"></div>

                           

                            <div class="hr hr12 dotted"></div>

                          

                            <div class="hr hr16 dotted"></div>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                           

                            <div class="space-12"></div>

                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Họ tên</div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="fullname"><input type="text" name="ten" value="<?php echo @$_POST['ten'];?>" /></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Tên đăng nhập </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="username"><input type="text" name="tdn" value="<?php echo @$_POST['tdn'];?>"></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Mật khẩu </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="age"><input name="mk" type="text" value="<?php echo @$_POST['mk'];?>"></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Loại quản trị </div>

                                    <div class="profile-info-value">
                                       <select name="manhom">
<?php
                
               
                foreach($qt as $item)
                {
                    ?>
                                    
                                    <option value="<?php echo $item->MA;?>" <?php if(@$_POST['manhom'] === $item->MA) echo "selected = 'selected'" ;?>><?php echo $item->LOAIQTRI;?></option>

                                    
<?php
                }
                ?>
                                </select>
                                       
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Trạng thái</div>
                                     <div class="profile-info-value">
                                         <input type="checkbox" name="trangthai" <?php if(@$_POST['trangthai'] == 0) echo "checked='checked'"?>value="0"/> Khóa
                                         &nbsp;
                                         <input type="checkbox" name="trangthai" <?php if(@$_POST['trangthai'] == 1) echo "checked='checked'"?>value="1"/> Chưa kích hoạt
                                         &nbsp;
                                         <input type="checkbox" name="trangthai" <?php if(@$_POST['trangthai'] == 2) echo "checked='checked'"?>value="2"/> Kích hoạt
                                         &nbsp;

                                     </div>
                                </div>
                                <div class="profile-info-row"> 
                                      <div class="profile-info-name"> Chọn hình</div>
                    
                                        <div class="profile-info-value">
                                            <input type="file" class="form-control" name="hinh">
                                        </div>

      
                                </div>

                            </div>
                            <div style="text-align: center; margin-top: 15px;">
                                <button class="btn btn-success" name="add">Thêm</button>
                            <button class="btn btn-info">Trở về</button>
                            </div>
                            <div class="space-20"></div>

                        </div>
                        </form>
                    </div>
                </div>


                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>