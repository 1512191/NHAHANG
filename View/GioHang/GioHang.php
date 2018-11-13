<form  method="post">
<table style="background: #f97e76" width="800px" align="center" cellpadding="10" cellspacing="0" border="1" style="border-collapse:collapse">
    <caption style="color: #f97e76; font-size: 30px; font-weight: bolder">GIỎ HÀNG CỦA BẠN</caption>
    <tr>
        <td style="text-align: center">Mã</td>    
        <td style="text-align: center">Sản phẩm</td>    
        <td style="text-align: center">Giá</td>    
        <td style="text-align: center">Số lượng</td>
        <td style="text-align: center">Thành tiền</td>
        <td style="text-align: center"><button class="btn btn-success " name="capnhat"><span class="glyphicon glyphicon-edit"></span>Cập nhật</button></td>    
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
        <td style="text-align: center"><input name="soluong" type="number"value="<?=$item['soluong']?>" /></td>
         <td style="text-align: center"><?=$tt?></td> 
         <td style="text-align: center" width="100px" height="auto"><button class="btn btn-danger" href="?controller=giohang&action=xoa&ma=<?=$item['ma']?>" > <span class="glyphicon glyphicon-remove"></span></button></td>    
    </tr>
<?php } ?>
         <tr>		
             <td colspan="5" style="text-align: center; font-weight: bolder; font-size: 24px">Tổng: <?= number_format($tong)?>vnđ</td> 
         <td>&nbsp;</td>        
    </tr>
    
</table>
</form>
<div style="text-align:right;width:800px">
<a href="?controller=sanpham&action=TrangChu">Mua tiếp</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?controller=giohang&action=ThanhToan">Thanh toán</a>
</div>