

<div class="header1">
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul class="support">
						<li><a href="#"><label> </label></a></li>
						<li><a href="#">24x7 live<span class="live"> support</span></a></li>
					</ul>
					<ul class="support">
						<li class="van"><a href="#"><label> </label></a></li>
						<li><a href="#">Free shipping <span class="live">on order over 500</span></a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="top-header-right">
				 <div class="down-top">		
                                     <a href="#">Liên hệ</a>
					 </div>
					<div class="down-top top-down">
						  <a href="#"> Giới thiệu</a>
					 </div>
					 <!---->
					<div class="clearfix"> </div>	
				</div>
				<div class="clearfix"> </div>		
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<a href="index.html"><img src="<?php echo TEMPLATE_PRODUCT?>images/logo.png" alt=" " /></a>
					</div>
					<div id="search">
						<input type="text" value=""  >
						<input type="submit"  value="SEARCH">

					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">
                                    <?php 
                                    if(ktrDangNhapKH())
                                    {
                                    ?>
                                    <div class="dropdown account">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['tendnkh'];?>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="?controller=khachhang&action=ChiTiet&ma=<?php echo $_SESSION['makh'];?>">Thông tin tài khoản</a></li>
    <li><a href="?controller=khachhang&action=CapNhatThongTin&ma=<?php echo $_SESSION['makh'];?>">Thay đổi thông tin</a></li>
     <li><a href="?controller=khachhang&action=ThayDoiTaiKhoan&ma=<?php echo $_SESSION['makh'];?>">Thay đổi tài khoản</a></li>
    <li><a href="?controller=khachhang&action=DangXuat">Thoát</a></li>
  </ul>
</div>
                                    <?php
                                    }
 else {
     ?>
                                    <ul class="login">
								
									
								
									<li><a href="?controller=khachhang&action=DangNhap"><span> </span>ĐĂNG NHẬP</a></li> |
									<li ><a href="?controller=khachhang&action=DangKi">ĐĂNG KÍ</a></li>
								
							</ul>
                                    <?PHP
 }
                                    ?>
                                    
							
						
						<div class="cart"><a href="?controller=giohang&action=GioHang"><span id="giohang"> <?php echo $tonggiohang?></span></a>
							<span class="badge"></span>
						</div>
                                </div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
                                
                                    
			</div>
		</div>
	</div>