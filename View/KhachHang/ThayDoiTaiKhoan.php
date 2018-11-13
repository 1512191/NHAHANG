	<div class="container"> 
			         
		<div class="register">
                    <form method="POST"> 
				 <div class="  register-top-grid">
                                     <h3 style="text-align: center">THAY ĐỔI THÔNG TIN</h3>
                                        <?php echo $tb;?>
                                     <div class="mation" style="color: #F97E76">
						<span>Tên đăng nhập<label>*</label></span>
                                                <input type="text" name="tdn" value="<?php echo @$_POST['tdn'] ?>" > 
					<span>Tên đăng nhập mới<label>*</label></span>
                                                <input type="text" name="tdnm" value="<?php echo @$_POST['tdnm'] ?>" > 
						
						 <span>Mật khẩu cũ<label>*</label></span>
                                                 <input type="password" name="mk" value="<?php echo @$_POST['mk'] ?>"> 
                                                 <span>Mật khẩu mới<label>*</label></span>
                                                 <input type="password" name="mkm" value="<?php echo @$_POST['mkm'] ?>" > 
                                                 <span>Xác nhận mật lại khẩu<label>*</label></span>
                                                 <input type="password" name="mkxn" value="<?php echo @$_POST['mkxn'] ?>" > 
					 
					 
					 
					</div>
					 <div class="clearfix"> </div>
                                         <div class="mation" style="text-align: center">
                                            <button style="margin-left: 10px;" name="thaydoi" type="submit" class="btn btn-success">Thay đổi</button>
                                            <a href="?controller=khachhang&action=dangnhap" class="btn btn-success">Đăng nhập</a>
                                         </div>
					 </div>
				   
				</form>
				<div class="clearfix"> </div>
				
		   </div>
	
					</div>
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
					
	   		     	 <a class="view-all all-product" href="?controller=sanpham&action=TrangChu">Trang chủ<span> </span></a> 	
			</div>      
	</div>