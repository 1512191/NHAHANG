	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
				<form method="POST">
				 <?php echo $tb;?>
				  <div>
					<span>TÊN ĐĂNG NHẬP<label>*</label></span>
					<input name="tdn" type="text"> 
				  </div>
				  <div>
					<span>MẬT KHẨU<label>*</label></span>
					<input name="mk" type="text"> 
				  </div>
				   <a class="forgot" href="#">Forgot Your Password?</a>
				 	
                                   <button type="submit" name="dangnhap" class="btn btn-primary">Đăng nhập</button>
			    </form>
			   </div>	
			    <div class=" login-left">
			  	 <h3>NEW CUSTOMERS</h3>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                                 <a class="acount-btn" href="?controller=khachhang&action=DangKi">Tạo tài khoản mới?</a>
			   </div>
			   <div class="clearfix"> </div>
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
					
			</div>
			  <div class="clearfix"> </div>
      	 </div>
</div>
	<!---->
	