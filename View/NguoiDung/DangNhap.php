
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="login-container">
            <div class="center">
                <h1>
                    <i class="ace-icon fa fa-leaf green"></i>
                    <span class="red">Ace</span>
                    <span class="white" id="id-text2">Application</span>
                </h1>
                <h4 class="blue" id="id-company-text">&copy; Company Name</h4>
            </div>

            <div class="space-6"></div>

            <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <h4 class="header blue lighter bigger">
                                <i class="ace-icon fa fa-coffee green"></i>
                                Please Enter Your Information
                            </h4>

                            <div class="space-6"></div>

                            <form method="POST">
                                <div><?php echo $tb; ?></div>
                                <fieldset>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" class="form-control" name="tdn" placeholder="Username" />
                                            <i class="ace-icon fa fa-user"></i>
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="password" class="form-control" name="mk" placeholder="Password" />
                                            <i class="ace-icon fa fa-lock"></i>
                                        </span>
                                    </label>

                                    <div class="space"></div>

                                    <div class="clearfix">
                                        <label class="inline">
                                            <input type="checkbox" name="remember"class="ace" />
                                            <span class="lbl"> Remember Me</span>
                                        </label>

                                        <button type="submit" name="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                            <i class="ace-icon fa fa-key"></i>
                                            <span class="bigger-110">Login</span>
                                        </button>
                                    </div>

                                    <div class="space-4"></div>
                                </fieldset>
                            </form>

                            <div class="social-or-login center">
                                <span class="bigger-110">Or Login Using</span>
                            </div>

                            <div class="space-6"></div>

                            <div class="social-login center">
                                <a class="btn btn-primary">
                                    <i class="ace-icon fa fa-facebook"></i>
                                </a>

                                <a class="btn btn-info">
                                    <i class="ace-icon fa fa-twitter"></i>
                                </a>

                                <a class="btn btn-danger">
                                    <i class="ace-icon fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div><!-- /.widget-main -->

                        <div class="toolbar clearfix">
                            <div>
                                <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                    <i class="ace-icon fa fa-arrow-left"></i>
                                    I forgot my password
                                </a>
                            </div>

                            <div>
                                <a href="#" data-target="#signup-box" class="user-signup-link">
                                    I want to register
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- /.widget-body -->
                </div><!-- /.login-box -->

                <div id="forgot-box" class="forgot-box widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <h4 class="header red lighter bigger">
                                <i class="ace-icon fa fa-key"></i>
                                Retrieve Password
                            </h4>

                            <div class="space-6"></div>
                            <p>
                                Enter your email and to receive instructions
                            </p>

                            <form>
                                <fieldset>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="email" class="form-control" placeholder="Email" />
                                            <i class="ace-icon fa fa-envelope"></i>
                                        </span>
                                    </label>

                                    <div class="clearfix">
                                        <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                            <i class="ace-icon fa fa-lightbulb-o"></i>
                                            <span class="bigger-110">Send Me!</span>
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div><!-- /.widget-main -->

                        <div class="toolbar center">
                            <a href="#" data-target="#login-box" class="back-to-login-link">
                                Back to login
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div><!-- /.widget-body -->
                </div><!-- /.forgot-box -->

                <div id="signup-box" class="signup-box widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <h4 class="header green lighter bigger">
                                <i class="ace-icon fa fa-users blue"></i>
                                Đăng kí thông tin
                            </h4>

                            <div class="space-6"></div>
                            <p> Enter your details to begin: </p>

                            <form method="POST">
                                <div><?php echo @$tbdk;?></div>
                                <fieldset>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="email" class="form-control" placeholder="Email" />
                                            <i class="ace-icon fa fa-envelope"></i>
                                        </span>
                                    </label>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" class="form-control" value="<?php echo @$_POST['ten']?>" name="ten" placeholder="Tên" />
                                            <i class="ace-icon fa fa-user"></i>
                                        </span>
                                    </label>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" class="form-control" name="tendn" value="<?php echo @$_POST['tendn']?>" placeholder="Tên đăng nhập" />
                                            <i class="ace-icon fa fa-user"></i>
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="password" class="form-control" value="<?php echo @$_POST['matkhau']?>" name="matkhau" placeholder="Mật khẩu" />
                                            <i class="ace-icon fa fa-lock"></i>
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="password" class="form-control" name="matkhauxn" value="<?php echo @$_POST['matkhauxn']?>" placeholder="Nhập lại mật khẩu" />
                                            <i class="ace-icon fa fa-retweet"></i>
                                        </span>
                                    </label>
                                    <label class="block clearfix">
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
                                    </label>
                                    

                                    <div class="space-24"></div>

                                    <div class="clearfix">
                                        <button type="reset" class="width-30 pull-left btn btn-sm">
                                            <i class="ace-icon fa fa-refresh"></i>
                                            <span class="bigger-110">Reset</span>
                                        </button>

                                        <button type="submit" name="dki" class="width-65 pull-right btn btn-sm btn-success">
                                            <span class="bigger-110">Đăng kí</span>

                                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                        <div class="toolbar center">
                            <a href="#" data-target="#login-box" class="back-to-login-link">
                                <i class="ace-icon fa fa-arrow-left"></i>
                                Đăng nhập
                            </a>
                        </div>
                    </div><!-- /.widget-body -->
                </div><!-- /.signup-box -->
            </div><!-- /.position-relative -->

            <div class="navbar-fixed-top align-right">
                <br />
                &nbsp;
                <a id="btn-login-dark" href="#">Dark</a>
                &nbsp;
                <span class="blue">/</span>
                &nbsp;
                <a id="btn-login-blur" href="#">Blur</a>
                &nbsp;
                <span class="blue">/</span>
                &nbsp;
                <a id="btn-login-light" href="#">Light</a>
                &nbsp; &nbsp; &nbsp;
            </div>
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->