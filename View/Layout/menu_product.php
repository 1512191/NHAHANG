 <?PHP
 function menuCon($ptu,$mang)
 {
     //xemMang($mang);
     foreach ($mang as $value)
     {
         if($value->MANHOM == $ptu)
         {
             echo '<img class="arrow-img" style="float:right; margin-top:10px" src="'.TEMPLATE_PRODUCT.'images/arrow1.png" alt=""/>';
         }
         else 
              echo '';
             
     }
     
 }
 function dequymenu($data, $parent, $nhom)
 {
     foreach ($data as $value)
     {
         if($value->MANHOM == $parent)
         {
             echo '<li class="item1"><a href="?controller=sanpham&action=LayDanhMuc&ma='.$value->MA.'">'.$value->TEN.menuCon($value->MA, $nhom).'</a></li><br />';
             $id = $value->MA;
             dequymenu($data, $id, $nhom);
         }
     }
 }
 ?>
<?php
 xemMang($nhom);
?>
<div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">DANH MỤC THỰC ĐƠN</h3>
		 			<ul class="menu">
                                            <?php 
                                            foreach ($lsp as $value)
                                            {
                                                if($value->MANHOM == 0)
                                                {
                                                    echo '<li class="item1"><a href="?controller=sanpham&action=LayDanhMuc&ma='.$value->MA.'">'.$value->TEN.menuCon($value->MA, $nhom).'</a></li><br />';
                                                    $id = $value->MA;
                                                    dequymenu($lsp, $id, $nhom);
                                                }
                                            }
                                             ?>
					</ul>
				</div>
	   		    <a class="view-all all-product" href="?controller=sanpham&action=TrangChu">VIEW ALL PRODUCTS<span> </span></a> 	
	   		    <div class="clearfix"> </div>   
<!--				   <script type="text/javascript">
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
		</script>     	         -->
</div>