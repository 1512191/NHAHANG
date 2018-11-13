

	 	<div class=" single_top">
	      <div class="single_grid">
				<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="<?php echo $ctma->HINH?>" class="img-responsive" />
									<img class="etalage_source_image" src="<?php echo $ctma->HINH?>" class="img-responsive" title="" />
								</a>
							</li>
							<li>
								<img class="etalage_thumb_image" src="<?php echo $ctma->HINH?>" class="img-responsive" />
								<img class="etalage_source_image" src="<?php echo $ctma->HINH?>" class="img-responsive" title="" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="<?php echo $ctma->HINH?>" class="img-responsive"  />
								<img class="etalage_source_image" src="<?php echo $ctma->HINH?>"class="img-responsive"  />
							</li>
						    <li>
								<img class="etalage_thumb_image" src="<?php echo $ctma->HINH?>" class="img-responsive"  />
								<img class="etalage_source_image" src="<?php echo $ctma->HINH?>"class="img-responsive"  />
							</li>
						</ul>
						 <div class="clearfix"> </div>		
				  </div> 
                  <script src="<?PHP echo TEMPLATE_PRODUCT?>javascripts/jquery.etalage.min.js"></script>
                  <script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
				  <div class="desc1 span_3_of_2">
				  
					
					<h4><?php echo $ctma->TEN?></h4>
				<div class="cart-b">
					<div class="left-n "><?php echo $ctma->GIA?></div>
				    <a class="now-get get-cart themhang"  data-add="<?php echo $ctma->MA;?>" >ADD TO CART</a>
				    <div class="clearfix"></div>
				 </div>
				 
			   	<p><?php echo $ctma->NOIDUNGTOMTAT;?></p>
			   	<div class="share">
							<h5>Share Product :</h5>
							<ul class="share_nav">
								<li><a href="#"><img src="<?PHP echo TEMPLATE_PRODUCT?>/images/facebook.png" title="facebook"></a></li>
								<li><a href="#"><img src="<?PHP echo TEMPLATE_PRODUCT?>/images/twitter.png" title="Twiiter"></a></li>
								<li><a href="#"><img src="<?PHP echo TEMPLATE_PRODUCT?>/images/rss.png" title="Rss"></a></li>
								<li><a href="#"><img src="<?PHP echo TEMPLATE_PRODUCT?>/images/gpluse.png" title="Google+"></a></li>
				    		</ul>
						</div>
			   
				
				</div>
          	    <div class="clearfix"> </div>
          	   </div>
          	   
	<script type="text/javascript" src="<?PHP echo TEMPLATE_PRODUCT?>javascripts/jquery.flexisel.js"></script>

          	    	<div class="toogle">
				     	<h3 class="m_3">Chi tiết món ăn</h3>
				     	<p class="m_text"><?php echo $ctma->NOIDUNGCHITIET;?></p>
				     </div>	
</div>
