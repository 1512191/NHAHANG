

<?php
defined('DOMAIN') or die('Lỗi truy cập');  
if(!ktraDangNhap())
{
    chuyenHuong('?controller=nguoidung&action=DangNhap');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Quản lí món ăn</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
                 <script src="//code.jquery.com/jquery-1.12.4.js"></script>;
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
                
                
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/css/ace-rtl.min.css" />
                <link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/css/select2.min.css" />
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH?>assets/css/bootstrap-editable.min.css" />
               
		<!-- ace settings handler -->
		<script src="<?php echo TEMPLATE_PATH?>assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo TEMPLATE_PATH?>assets/js/html5shiv.min.js"></script>
		<script src="<?php echo TEMPLATE_PATH?>assets/js/respond.min.js"></script>
		<![endif]-->
                <style>
                    .indam{
                        font-weight: bolder;
                    }
                </style>
	</head>

	<body class="no-skin">
		<?php
                $this->loadModule('header');
                ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php
                $this->loadModule('menu');
                ?>

			<div class="main-content">
				
						 <?php 
		 	$path = $this->pathview.$view.'.php';
                       
		 	$this->load($path, '', $data);
		 ?>
					
			</div><!-- /.main-content -->

			
			<?php
                $this->loadModule('footer');
                ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo TEMPLATE_PATH?>assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo TEMPLATE_PATH?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo TEMPLATE_PATH?>assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		

		<!-- ace scripts -->
		<script src="<?php echo TEMPLATE_PATH?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo TEMPLATE_PATH?>assets/js/ace.min.js"></script>
                <?php echo $this->js?>;
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
			
			})
		</script>
<!--                //************************************************CHI TIẾT NGƯỜI DÙNG-->
<script type="text/javascript">
    jQuery(function ($) {

        //editables on first profile page
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
        $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>' +
                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';

        //editables 

        //text editable
//        $('#username')
//                .editable({
//                    type: 'text',
//                    name: 'username'
//                });
//
//                 $('#fullname')
//                .editable({
//                    type: 'text',
//                    name: 'username'
//                });

        //select2 editable
        var countries = [];
        $.each({"CA": "Canada", "IN": "India", "NL": "Netherlands", "TR": "Turkey", "US": "United States"}, function (k, v) {
            countries.push({id: k, text: v});
        });

        var cities = [];
        cities["CA"] = [];
        $.each(["Toronto", "Ottawa", "Calgary", "Vancouver"], function (k, v) {
            cities["CA"].push({id: v, text: v});
        });
        cities["IN"] = [];
        $.each(["Delhi", "Mumbai", "Bangalore"], function (k, v) {
            cities["IN"].push({id: v, text: v});
        });
        cities["NL"] = [];
        $.each(["Amsterdam", "Rotterdam", "The Hague"], function (k, v) {
            cities["NL"].push({id: v, text: v});
        });
        cities["TR"] = [];
        $.each(["Ankara", "Istanbul", "Izmir"], function (k, v) {
            cities["TR"].push({id: v, text: v});
        });
        cities["US"] = [];
        $.each(["New York", "Miami", "Los Angeles", "Chicago", "Wysconsin"], function (k, v) {
            cities["US"].push({id: v, text: v});
        });

        var currentValue = "NL";
        $('#country').editable({
            type: 'select2',
            value: 'NL',
            //onblur:'ignore',
            source: countries,
            select2: {
                'width': 140
            },
            success: function (response, newValue) {
                if (currentValue == newValue)
                    return;
                currentValue = newValue;

                var new_source = (!newValue || newValue == "") ? [] : cities[newValue];

                //the destroy method is causing errors in x-editable v1.4.6+
                //it worked fine in v1.4.5
                /**			
                 $('#city').editable('destroy').editable({
                 type: 'select2',
                 source: new_source
                 }).editable('setValue', null);
                 */

                //so we remove it altogether and create a new element
                var city = $('#city').removeAttr('id').get(0);
                $(city).clone().attr('id', 'city').text('Select City').editable({
                    type: 'select2',
                    value: null,
                    //onblur:'ignore',
                    source: new_source,
                    select2: {
                        'width': 140
                    }
                }).insertAfter(city);//insert it after previous instance
                $(city).remove();//remove previous instance

            }
        });

        $('#city').editable({
            type: 'select2',
            value: 'Amsterdam',
            //onblur:'ignore',
            source: cities[currentValue],
            select2: {
                'width': 140
            }
        });



        //custom date editable
//        $('#signup').editable({
//            type: 'adate',
//            date: {
//                //datepicker plugin options
//                format: 'yyyy/mm/dd',
//                viewformat: 'yyyy/mm/dd',
//                weekStart: 1
//
//                        //,nativeUI: true//if true and browser support input[type=date], native browser control will be used
//                        //,format: 'yyyy-mm-dd',
//                        //viewformat: 'yyyy-mm-dd'
//            }
//        })
//         $('#signin').editable({
//            type: 'adate',
//            date: {
//                //datepicker plugin options
//                format: 'yyyy/mm/dd',
//                viewformat: 'yyyy/mm/dd',
//                weekStart: 1
//
//                        //,nativeUI: true//if true and browser support input[type=date], native browser control will be used
//                        //,format: 'yyyy-mm-dd',
//                        //viewformat: 'yyyy-mm-dd'
//            }
//        })
//        $('#age').editable({
//            type: 'spinner',
//            name: 'age',
//            spinner: {
//                min: 16,
//                max: 99,
//                step: 1,
//                on_sides: true
//                        //,nativeUI: true//if true and browser support input[type=number], native browser control will be used
//            }
//        });


        $('#login').editable({
            type: 'slider',
            name: 'login',

            slider: {
                min: 1,
                max: 50,
                width: 100
                        //,nativeUI: true//if true and browser support input[type=range], native browser control will be used
            },
            success: function (response, newValue) {
                if (parseInt(newValue) == 1)
                    $(this).html(newValue + " hour ago");
                else
                    $(this).html(newValue + " hours ago");
            }
        });

        $('#about').editable({
            mode: 'inline',
            type: 'wysiwyg',
            name: 'about',

            wysiwyg: {
                //css : {'max-width':'300px'}
            },
            success: function (response, newValue) {
            }
        });



        // *** editable avatar *** //
        try {//ie8 throws some harmless exceptions, so let's catch'em

            //first let's add a fake appendChild method for Image element for browsers that have a problem with this
            //because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
            try {
                document.createElement('IMG').appendChild(document.createElement('B'));
            } catch (e) {
                Image.prototype.appendChild = function (el) {}
            }

            var last_gritter
            $('#avatar').editable({
                type: 'image',
                name: 'avatar',
                value: null,
                //onblur: 'ignore',  //don't reset or hide editable onblur?!
                image: {
                    //specify ace file input plugin's options here
                    btn_choose: 'Change Avatar',
                    droppable: true,
                    maxSize: 110000, //~100Kb

                    //and a few extra ones here
                    name: 'avatar', //put the field name here as well, will be used inside the custom plugin
                    on_error: function (error_type) {//on_error function will be called when the selected file has a problem
                        if (last_gritter)
                            $.gritter.remove(last_gritter);
                        if (error_type == 1) {//file format error
                            last_gritter = $.gritter.add({
                                title: 'File is not an image!',
                                text: 'Please choose a jpg|gif|png image!',
                                class_name: 'gritter-error gritter-center'
                            });
                        } else if (error_type == 2) {//file size rror
                            last_gritter = $.gritter.add({
                                title: 'File too big!',
                                text: 'Image size should not exceed 100Kb!',
                                class_name: 'gritter-error gritter-center'
                            });
                        } else {//other error
                        }
                    },
                    on_success: function () {
                        $.gritter.removeAll();
                    }
                },
                url: function (params) {
                    // ***UPDATE AVATAR HERE*** //
                    //for a working upload example you can replace the contents of this function with 
                    //examples/profile-avatar-update.js

                    var deferred = new $.Deferred

                    var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
                    if (!value || value.length == 0) {
                        deferred.resolve();
                        return deferred.promise();
                    }


                    //dummy upload
                    setTimeout(function () {
                        if ("FileReader" in window) {
                            //for browsers that have a thumbnail of selected image
                            var thumb = $('#avatar').next().find('img').data('thumb');
                            if (thumb)
                                $('#avatar').get(0).src = thumb;
                        }

                        deferred.resolve({'status': 'OK'});

                        if (last_gritter)
                            $.gritter.remove(last_gritter);
                        last_gritter = $.gritter.add({
                            title: 'Avatar Updated!',
                            text: 'Uploading to server can be easily implemented. A working example is included with the template.',
                            class_name: 'gritter-info gritter-center'
                        });

                    }, parseInt(Math.random() * 800 + 800))

                    return deferred.promise();

                    // ***END OF UPDATE AVATAR HERE*** //
                },

                success: function (response, newValue) {
                }
            })
        } catch (e) {
        }

        /**
         //let's display edit mode by default?
         var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input at first
         if(blank_image) {
         $('#avatar').editable('show').on('hidden', function(e, reason) {
         if(reason == 'onblur') {
         $('#avatar').editable('show');
         return;
         }
         $('#avatar').off('hidden');
         })
         }
         */

        //another option is using modals
        $('#avatar2').on('click', function () {
            var modal =
                    '<div class="modal fade">\
                          <div class="modal-dialog">\
                           <div class="modal-content">\
                                <div class="modal-header">\
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>\
                                        <h4 class="blue">Change Avatar</h4>\
                                </div>\
                                \
                                <form class="no-margin">\
                                 <div class="modal-body">\
                                        <div class="space-4"></div>\
                                        <div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
                                 </div>\
                                \
                                 <div class="modal-footer center">\
                                        <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
                                        <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
                                 </div>\
                                </form>\
                          </div>\
                         </div>\
                        </div>';


            var modal = $(modal);
            modal.modal("show").on("hidden", function () {
                modal.remove();
            });

            var working = false;

            var form = modal.find('form:eq(0)');
            var file = form.find('input[type=file]').eq(0);
            file.ace_file_input({
                style: 'well',
                btn_choose: 'Click to choose new avatar',
                btn_change: null,
                no_icon: 'ace-icon fa fa-picture-o',
                thumbnail: 'small',
                before_remove: function () {
                    //don't remove/reset files while being uploaded
                    return !working;
                },
                allowExt: ['jpg', 'jpeg', 'png', 'gif'],
                allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
            });

            form.on('submit', function () {
                if (!file.data('ace_input_files'))
                    return false;

                file.ace_file_input('disable');
                form.find('button').attr('disabled', 'disabled');
                form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");

                var deferred = new $.Deferred;
                working = true;
                deferred.done(function () {
                    form.find('button').removeAttr('disabled');
                    form.find('input[type=file]').ace_file_input('enable');
                    form.find('.modal-body > :last-child').remove();

                    modal.modal("hide");

                    var thumb = file.next().find('img').data('thumb');
                    if (thumb)
                        $('#avatar2').get(0).src = thumb;

                    working = false;
                });


                setTimeout(function () {
                    deferred.resolve();
                }, parseInt(Math.random() * 800 + 800));

                return false;
            });

        });



        //////////////////////////////
        $('#profile-feed-1').ace_scroll({
            height: '250px',
            mouseWheelLock: true,
            alwaysVisible: true
        });

        $('a[ data-original-title]').tooltip();

        $('.easy-pie-chart.percentage').each(function () {
            var barColor = $(this).data('color') || '#555';
            var trackColor = '#E2E2E2';
            var size = parseInt($(this).data('size')) || 72;
            $(this).easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size / 10),
                animate: false,
                size: size
            }).css('color', barColor);
        });

        ///////////////////////////////////////////

        //right & left position
        //show the user info on right or left depending on its position
       

       
        $('.input-mask-phone').mask('(999) 999-9999');


        ////////////////////
        //change profile
        $('[data-toggle="buttons"] .btn').on('click', function (e) {
            var target = $(this).find('input[type=radio]');
            var which = parseInt(target.val());
            $('.user-profile').parent().addClass('hide');
            $('#user-profile-' + which).parent().removeClass('hide');
        });



        /////////////////////////////////////
        $(document).one('ajaxloadstart.page', function (e) {
            //in ajax mode, remove remaining elements before leaving page
            try {
                $('.editable').editable('destroy');
            } catch (e) {
            }
            $('[class*=select2]').remove();
        });
    });
    $('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});
</script>
               
		
	</body>
</html>
