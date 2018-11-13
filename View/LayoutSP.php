
<!DOCTYPE html>
<html>
<head>
<title>Food Corner a Hotels and Restaurants Category Flat Bootstrap responsive Website Template | Menu :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Food Corner Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="<?php echo TEMPLATE_PRODUCT?>stylesheets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="<?php echo TEMPLATE_PRODUCT?>stylesheets/css/style1.css" type="text/css" media="all" />
<!--// css -->
<link rel="stylesheet" href="<?php echo TEMPLATE_PRODUCT?>stylesheets/css/owl.carousel.css" type="text/css" media="all">
<link href="<?php echo TEMPLATE_PRODUCT?>stylesheets/css/owl.theme.css" rel="stylesheet">
<!-- font-awesome icons -->
<link href="<?php echo TEMPLATE_PRODUCT?>stylesheets/css/font-awesome.css" rel="stylesheet"> 
<link href="<?php echo TEMPLATE_PRODUCT?>stylesheets/css/etalage.css"rel="stylesheet">
<link href="<?php echo TEMPLATE_PRODUCT?>stylesheets/css/form.css"rel="stylesheet">
<link href="<?php echo TEMPLATE_PRODUCT?>stylesheets/css/font-awesome.css"rel="stylesheet">
<!-- //font-awesome icons -->
<!-- font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="<?php echo TEMPLATE_PRODUCT?>javascripts/jquery-1.11.1.min.js"></script>
<script src="<?php echo TEMPLATE_PRODUCT?>javascripts/boostrap.js"></script>
<script src="<?php echo TEMPLATE_PRODUCT?>javascripts/SmoothScroll.min.js"></script>

<script src="<?php echo TEMPLATE_PRODUCT?>javascripts/jquery.flexisel.js"></script>
<script src="<?php echo TEMPLATE_PRODUCT?>javascripts/jquery.min.js"></script>
<script src="<?php echo TEMPLATE_PRODUCT?>javascripts/jquery.wmuSlider.js"></script>
</head>
<body>
    
		<!--header-->
		<?php $this->load('View/Layout/header_product.php', '',$data)?>
		<!--//header-->
		
	
	<div class="container">
            <?php $this->LoadMenuSP('menu_product');?>
		
		
<?php 
		 	$path = $this->pathview.$view.'.php';
                       
		 	$this->load($path, '', $data);
?>
	</div>


	   		   
<?php $this->loadModule('footer_product');?>
<div class="agileits-copyright">
		<div class="container">
			<p>© 2016 Food Corner. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
</div>
</body>
</html>
<script>
    $(function(){
        var trangcuoi = $('#cuoi').data('trang');
        $('.page-link').click(function(){
            var tranght = $(this);
            
            tranght.addClass( "indam" );
            var _trang = tranght.data('trang');
           
            $.get('http://localhost:81/DoAnMVC/?controller=sanpham&action=TrangChuPhanTrang', {trang:_trang})
                    .done(function(data){
                        if(_trang > 0 && _trang <= trangcuoi ){
                        $('#prev').data('trang',_trang - 1);
                        $('#next').data('trang',_trang + 1);
                        $('#kq').html(data)
                    }
            })
        })
    })
</script>
<script>
                                    $(function(){
                                        $('.themhang').click(function(){
            var tranght = $(this);
            
           
            var ma = tranght.data('add');
           alert(ma)
            $.get('http://localhost:81/DoAnMVC/?controller=giohang&action=ThemGioHang', {ma:ma})
                    .done(function(data){
                        
                        $('#giohang').html(data)
                    })
            
        })
                                    })
                                    </script>
		

	
