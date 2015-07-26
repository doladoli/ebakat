
<!DOCTYPE html>
<html lang="en">

<head>
<title>Customers :: Customers - Administration panel</title>
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<meta name="viewport" content="width=1240,maximum-scale=1.0" />
<link href="http://localhost/cscart/design/backend/media/images/favicon.ico" rel="shortcut icon">
<link type="text/css" rel="stylesheet" href="http://localhost/cscart/var/cache/misc/statics/design/backend/css/standalone.23c5bbcd9030c5b1744e3e1df8d2da1f1412099411.css" />
<script type="text/javascript" src="http://localhost/cscart/var/cache/misc/statics/js/tygh/scripts-f7928e337bc7e0605afb3a1f915f353b1412099411.js?ver=4.1.5"></script>
<script type="text/javascript">
//<![CDATA[
(function(_, $) {
    $(document).ready(function(){
        $.runCart('A');
    });
}(Tygh, Tygh.$));
//]]>
</script>


</head>






<!--[if lte IE 8 ]><body class="ie8"><![endif]-->
<!--[if lte IE 9 ]><body class="ie9"><![endif]-->
<!--[if !IE]><!--><body><!--<![endif]-->     
    <div id="ajax_overlay" class="ajax-overlay"></div>
<div id="ajax_loading_box" class="hidden ajax-loading-box">
    <strong>Loading...</strong>
</div>

        


<div class="cm-notification-container alert-wrap ">
            
    </div>


    

    <div id="main_column" class="main-wrap">
            <div class="admin-content">

            <div id="header" class="header">
                        

<div class="navbar-admin-top">
    <!--Navbar-->
    <div class="navbar navbar-inverse" id="header_navbar">
        <div class="navbar-inner">

                            
                   <?php echo $this->load->view('header_menu');?>
        
                    <?php echo $this->load->view('top_menu');?>
        
                  
        </div>
    <!--header_navbar--></div>

    <!--Subnav-->
    <div class="subnav cm-sticky-scroll" data-ce-top="41" data-ce-padding="0" id="header_subnav">
        <!--quick search-->
       <?php echo $this->load->view('quick_search');?>
        <!--end quick search-->

        <!-- quick menu -->
        <?php echo $this->load->view('quick_menu');?>


      <!-- end quick menu -->
 <?php echo $this->load->view('main_menu');?>
   <!--header_subnav--></div>
</div>


            <!--header--></div>

            <div class="admin-content-wrap">
                

                    


<form name="profile_form" action="http://localhost/cscart/admin.php" method="post" class="form-horizontal form-edit form-table ">

                    


        

<script type="text/javascript">
//<![CDATA[
// Init ajax callback (rebuild)
var menu_content = '';

//]]>
</script>

<!-- Actions -->
<?php echo $this->load->view('action')?>
<!-- Sidebar -->
<?php // echo $this->load->view('side_bar');?>


<!--Content-->
<div class="content ufa" >
<?php echo $this->load->view('content')?>
</div>

<!--/Content-->

<script type="text/javascript">
    var ajax_callback_data = menu_content;
</script>

</form>
                
            </div>

        </div>
            
    <!--main_column--></div>
    
    


    

<script type="text/javascript">
Tygh.$(document).ready(function(){
    
    Tygh.$(document).on('click', '#store_mode_dialog li:not(.disabled)', function(){
        $('#store_mode_dialog li').removeClass('active');
        $(this).addClass('active').find('input[type="radio"]').prop('checked', true);
    });
});
</script>

    </body>
</html>