<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>教育信息综合管理平台</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="keywords" content="blue tech, free template, web design" />
	<meta name="description" content="Blue Tech is free website template by Metronic" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<!-- <link href="http://fonts.useso.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" /> -->
	<link href="<?php echo base_url('rs/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('rs/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('rs/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('rs/global/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('rs/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('rs/global/plugins/select2/select2.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('rs/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('rs/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('rs/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');?>" />
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo base_url('rs/global/css/components.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('rs/global/css/plugins.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('rs/admin/layout/css/layout.css');?>" rel="stylesheet" type="text/css" />
	<link id="style_color" href="<?php echo base_url('rs/admin/layout/css/themes/default.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('rs/admin/layout/css/custom.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('rs/global/plugins/jquery-file-upload/css/jquery.fileupload.css');?>" rel="stylesheet" type="text/css" />
	<!-- END THEME STYLES -->
    <!-- BEGIN CUSTOM STYLES -->
    <link href="<?php echo base_url('rs/css/puma2.css');?>" rel="stylesheet" type="text/css" />
    <!-- END CUSTOM STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
    <script src="<?php echo base_url('rs/global/plugins/jquery-1.11.0.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('rs/global/plugins/jquery-migrate-1.2.1.min.js');?>" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="<?php echo base_url('rs/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('rs/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('rs/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('rs/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('rs/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('rs/global/plugins/jquery.cokie.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('rs/global/plugins/uniform/jquery.uniform.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('rs/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="<?php echo base_url('rs/global/plugins/select2/select2.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('rs/global/plugins/datatables/media/js/jquery.dataTables.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('rs/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('rs/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('rs/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('rs/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');?>"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url('rs/global/scripts/metronic.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('rs/admin/layout/scripts/layout.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('rs/admin/layout/scripts/quick-sidebar.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('rs/admin/layout/scripts/demo.js');?>" type="text/javascript"></script>
    <script>
    //javascrip全局base_url变量
    var base_url = "<?php echo base_url();?>";
    //全局需要载入函数，用于初始化界面，在主体界面中需要调用该函数
    function global_function(){
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
    }
    </script>
    
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
	<script type="text/javascript" src="<?php echo base_url('rs/js/common_function.js');?>"></script>
	<!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo" style="padding: 10px 5px 5px 10px; width: 540px">
                    <p>
                    	<a href="<?php echo base_url();?>">
                    	<img src="<?php echo base_url('rs/images/logo.png');?>" alt="logo" height="28" width="28"/> 
                    	<font style = "color:#fff;font-size:1.3em;font-weight:bold;text-align:center;">教育信息综合管理平台</font>
                    </p>
                <!-- </a> -->
                <div class="menu-toggler sidebar-toggler hide">
                    <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
	                <!-- BEGIN INBOX DROPDOWN -->
					<!--<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-envelope-open"></i>
						<span class="badge badge-default">
						4 </span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<p>
									 您有12条未读消息
								</p>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 250px;">
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="<?php echo base_url('rs/admin/layout/img/avatar2.jpg') ?>" alt=""/>
										</span>
										<span class="subject">
										<span class="from">
										露西 </span>
										<span class="time">
										刚刚 </span>
										</span>
										<span class="message">
										最新任务：令计划接受组织调查... </span>
										</a>
									</li>
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="<?php echo base_url('rs/admin/layout/img/avatar3.jpg') ?>" alt=""/>
										</span>
										<span class="subject">
										<span class="from">
										格林 </span>
										<span class="time">
										16分钟前 </span>
										</span>
										<span class="message">
										系统运行十分流畅，请感谢项目方... </span>
										</a>
									</li>
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="<?php echo base_url('rs/admin/layout/img/avatar1.jpg') ?>" alt=""/>
										</span>
										<span class="subject">
										<span class="from">
										李雷 </span>
										<span class="time">
										2小时前 </span>
										</span>
										<span class="message">
										事件搜索完毕，请及时处理... </span>
										</a>
									</li>
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="<?php echo base_url('rs/admin/layout/img/avatar2.jpg') ?>" alt=""/>
										</span>
										<span class="subject">
										<span class="from">
										露西 </span>
										<span class="time">
										40分钟前 </span>
										</span>
										<span class="message">
										搜索事件已经到达一千个！ </span>
										</a>
									</li>
								</ul>
							</li>
							<li class="external">
								<a href="#">
								查看所有消息 <i class="m-icon-swapright"></i>
								</a>
							</li>
						</ul>
					</li>-->
					<!-- END INBOX DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="<?php echo base_url('rs/admin/layout/img/avatar3_small.jpg') ?>" />
                            <span class="username username-hide-on-mobile">
                    <?php echo $this->session->userdata("user_name"); ?> </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <!--<li>
                                <a href="extra_lock.html">
                                    <i class="icon-lock"></i> 锁定 </a>
                            </li>-->
                            <li>
                                <a href="" id = "log_out">
                                    <i class="icon-key"></i> 注销 </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <?php $this->load->view('sidebar'); ?>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
        <script>
        $("#log_out").click(function (e) {
            e.preventDefault();
            $.get("<?php echo site_url("login/logout"); ?>", function () {
            alert("注销成功");
            window.location.href = "<?php echo base_url(""); ?>";
            });
        });
        </script>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">