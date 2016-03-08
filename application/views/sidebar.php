    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler">
            </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <br>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper hide">
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search " action="extra_search.html" method="POST">
                <a href="javascript:;" class="remove">
                    <i class="icon-close"></i>
                </a>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="搜索...">
                    <span class="input-group-btn">
                //开启搜索功能，请修改为class="btn submit" 
                <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                </span>
                </div>
            </form>
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>

        <li class="start active open">
            <a href="javascript:;">
            <i class="icon-home"></i>
            <span class="title">学生信息</span>
            <span class="selected"></span>
            <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li class="active" id="archive">
                    <a href="<?php echo base_url('archive/index');?>">
                    <i class="icon-briefcase"></i>
                    档案管理</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
            <i class="icon-home"></i>
            <span class="title">报告设置</span>
            <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="#">
                    <i class="icon-bulb"></i>
                    问卷调查设置</a>
                </li>
                <li>
                    <a href="#">
                    <i class="icon-graph"></i>
                    试卷分析设置</a>
                </li>
                <li>
                    <a href="#">
                    <i class="icon-briefcase"></i>
                    教师建议设置</a>
                </li>
            </ul>
        </li>
    </ul>