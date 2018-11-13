	<div class="container"> 
			         
		<div class="register">
                    <form method="POST"> 
				 <div class="  register-top-grid">
                                     <h3 style="text-align: center">CẬP NHẬT THÔNG TIN</h3>
                                        <?php echo $tb;?>
                                     <div class="mation" style="color: #F97E76">
						<span>Họ tên<label>*</label></span>
                                                <input type="text" name="ten" value="<?php echo $ctkh->TEN ?>" > 
					
						
						 <span>Địa chỉ<label>*</label></span>
                                                 <input type="text" name="diachi" value="<?php echo $ctkh->DIACHI ?>"> 
                                                 <span>Số điện thoại<label>*</label></span>
                                                 <input type="text" name="sdt" value="<?php echo $ctkh->SDT ?>" > 
                                                 <span>Email<label>*</label></span>
                                                 <input type="text" name="email"  value="<?php echo $ctkh->EMAIL?> "> 
					 
                                                 
					 
					 
					 
					</div>
					 <div class="clearfix"> </div>
                                         <div class="mation" style="text-align: center">
                                            <button style="margin-left: 10px;" name="capnhat" type="submit" class="btn btn-success">Cập nhật</button>
                                            <a href="?controller=sanpham&action=TrangChu" class="btn btn-success">Trở về</a>
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