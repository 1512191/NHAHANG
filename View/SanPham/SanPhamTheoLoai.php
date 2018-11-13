<div class="shoes-grid"> 
<div class="product-left" id="kq">
				
				
                                 <?php 
                                 foreach($dsma as $item)
                                 {
                                 ?>
	   		     	<div class="col-md-4 chain-grid grid-top-chain">
					
                                    <a href="?controller=sanpham&action=ChiTietSP&ma=<?php echo $item->MA;?>"><img class="img-responsive chain" src="<?php echo $item->HINH?>" alt=" " /></a>
	   		     		<span class="star"> </span>
	   		     		<div class="grid-chain-bottom">
	   		     			<h6><a href="?controller=sanpham&action=ChiTietSP&ma=<?php echo $item->MA;?>"><?PHP echo $item->TEN;?></a></h6>
	   		     			<div class="star-price">
	   		     				<div class="dolor-grid"> 
		   		     				<span class="actual"><?PHP echo $item->GIA_KHUYEN_MAI;?></span>
		   		     				<span class="reducedfrom"><?PHP echo $item->GIA;?></span>
		   		     				  <span class="rating">
									        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
									        <label for="rating-input-1-5" class="rating-star1"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
									        <label for="rating-input-1-4" class="rating-star1"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
									        <label for="rating-input-1-3" class="rating-star"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
									        <label for="rating-input-1-2" class="rating-star"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
									        <label for="rating-input-1-1" class="rating-star"> </label>
							    	   </span>
	   		     				</div>
	   		     				<a class="now-get get-cart themhang"  data-add="<?php echo $item->MA;?>" >ADD TO CART</a> 
	   		     				<div class="clearfix"> </div>
							</div>
	   		     		</div>
							
	   		     	</div>
				<?php
                                 }
                                ?>
	   		     	 <div class="clearfix"> </div>		 
				</div>
</div>