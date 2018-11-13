
<div class="container">
	
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h1 style="color:#f97e76">THÔNG TIN NGƯỜI NHẬN</h3>
				
				
				
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
                                   
				   
			   </div>	
			    <table style="background: #f97e76" width="800px" align="center" cellpadding="10" cellspacing="0" border="1" style="border-collapse:collapse">
    <caption style="color: #f97e76; font-size: 30px; font-weight: bolder">GIỎ HÀNG CỦA BẠN</caption>
    <tr>
        <td style="text-align: center">Mã</td>    
        <td style="text-align: center">Sản phẩm</td>    
        <td style="text-align: center">Giá</td>    
        <td style="text-align: center">Số lượng</td>
        <td style="text-align: center">Thành tiền</td>
        
        
    </tr>
	<?php
	$tong = 0;
foreach($giohang as $item)
{
	$tt = $item['soluong']*$item['gia'];
	$tong +=$tt;
	?>
         <tr>
		<td style="text-align: center"><?=$item['ma']?></td>    
        <td style="text-align: center"><img src="<?=$item['hinh']?>" width="25" /> <?=$item['ten']?></td>    
        <td style="text-align: center"><?=$item['gia']?></td>    
        <td style="text-align: center"><?=$item['soluong']?></td>
         <td style="text-align: center"><?=$tt?></td> 
           
    </tr>
<?php } ?>
         <tr>		
             <td colspan="5" style="text-align: center; font-weight: bolder; font-size: 24px">Tổng: <?= number_format($tong)?>vnđ</td> 
         <td>&nbsp;</td>        
    </tr>
    
</table>
			   <div class="clearfix"> </div>
                           <form method="POST">
                               <input type="hidden" name="tong" value="<?php echo $tong?>" >
                               <button type="submit" name="mua" class="btn btn-success">Đặt mua</button>
                           </form>
                           <div><?php echo $tb?></div>
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
	