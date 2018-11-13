

			<div class="shoes-grid">
				<a href="#">
					<div class="wrap-in">
						<div class="wmuSlider example1 slide-grid">		 
				   			<div class="wmuSliderWrapper">		  
					   			<article style="position: absolute; width: 100%; opacity: 0;">					
									<div class="banner-matter">
										<div class="col-md-5 banner-bag">
											<img class="img-responsive " src="<?php echo TEMPLATE_PRODUCT?>/images/1.jpg" alt=" " />
										</div>
										<div class="col-md-7 banner-off">							
											<h2>FLAT 50% 0FF</h2>
											<label>FOR ALL PURCHASE <b>VALUE</b></label>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>					
											<span class="on-get">GET NOW</span>
										</div>
						
										<div class="clearfix"> </div>
									</div>
						
					 			</article>		
					 			<article style="position: absolute; width: 100%; opacity: 0;">					
								<div class="banner-matter">
									<div class="col-md-5 banner-bag">
										<img class="img-responsive " src="<?php echo TEMPLATE_PRODUCT?>/images/5.jpg" alt=" " />
									</div>
									<div class="col-md-7 banner-off">							
										<h2>FLAT 50% 0FF</h2>
										<label>FOR ALL PURCHASE <b>VALUE</b></label>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>					
										<span class="on-get">GET NOW</span>
									</div>
							
									<div class="clearfix"> </div>
								</div>
						
					 			</article>
					 			<article style="position: absolute; width: 100%; opacity: 0;">					
									<div class="banner-matter">
										<div class="col-md-5 banner-bag">
											<img class="img-responsive " src="<?php echo TEMPLATE_PRODUCT?>/images/7.jpg" alt=" " />
										</div>
										<div class="col-md-7 banner-off">							
											<h2>FLAT 50% 0FF</h2>
											<label>FOR ALL PURCHASE <b>VALUE</b></label>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>					
											<span class="on-get">GET NOW</span>
										</div>
							
										<div class="clearfix"> </div>
									</div>
						
					 			</article>
						
					 		</div>
						</div>
					</div>
							 
				</a>
	                
					 <script src="<?php echo TEMPLATE_PRODUCT ?>/javascripts/jquery.wmuSlider.js"></script> 
				  <script>
	       			$('.example1').wmuSlider();         
	   		     </script> 
	           
	   		      <!---->
	   		    
	   		     <div class="products">
	   		     	<h5 class="latest-product">LATEST PRODUCTS</h5>	
	   		     	  <a class="view-all" href="product.html">VIEW ALL<span> </span></a> 		     
	   		     </div>
		
               
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
			 	             
				  <div class="clearfix"> </div>
                                   <nav style="text-align:center" aria-label="Page navigation example">
        <ul  class="pagination">
      <li class="page-item">
      <a data-trang="1" class="page-link" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span>First</span>
      </a>
    </li>
    <li class="page-item">
      <a data-trang="1" class="page-link" id="prev" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span>Previous</span>
      </a>
    </li>
    <?php
    for($i = 1; $i<=$tong; $i++)
    {
       ?>
   
    <li class="page-item"><a data-trang="<?php echo $i ?>"class="page-link"><?php echo $i?></a></li>
    
     <?php
    }
    ?>
    <li class="page-item">
      <a data-trang="2" class="page-link" id="next" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span>Next</span>
      </a>
    </li>
    <li class="page-item">
      <a data-trang="<?php echo $tong ?>" class="page-link" id="cuoi" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span>Last</span>
      </a>
    </li>
  </ul>
</nav>
			</div>   

