	<div class="container">
	
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h1 style="color:#f97e76">THÔNG TIN CÁ NHÂN</h3>
				
				
				
				  <div>
					<span>Họ và tên<label class="ct">: <?php echo $ctkh->TEN;?></label></span>
                                       
				  </div>
				  <div>
					<span>Địa chỉ<label>:<?php echo $ctkh->DIACHI;?></label></span>
					
				  </div>
                                    <div>
					<span>Số điện thoại<label>: <?php echo $ctkh->SDT;?></label></span>
					
				  </div>
                                    <div>
					<span>Email<label>: <?php echo $ctkh->EMAIL;?></label></span>
					
				  </div>
                                    <div>
					<span>Địa chỉ<label>: <?php echo $ctkh->DIACHI;?></label></span>
					
				  </div>
                                    <div>
					<span>Ngày đăng kí<label>: <?php echo date('d-m-Y',strtotime($ctkh->NGAYTAO));?></label></span>
					
				  </div>
                                    <div>
					<span>Ngày cập nhật<label>: <?php echo date('d-m-Y',strtotime($ctkh->NGAYCAPNHAT));?></label></span>
					
				  </div>
                                    <div>
                                        <span>Trạng thái<label>: <?php echo doiTenTrangThai($ctkh->TRANGTHAI)?></label></span>
                                        
				  </div>
				   
			   </div>	
			    
			   <div class="clearfix"> </div>
                           <a class="btn btn-success" href="?controller=sanpham&action=TrangChu">Trở về</a>
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
					
			
			  <div class="clearfix"> </div>
      	 
	<!---->
	