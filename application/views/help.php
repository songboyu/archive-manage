<div id="templatemo_slider" text-align="left" style="height:900px;width:1040px;padding:20px 130px;background:white" >
 <div class="slider-wrapper theme-default">
 <img src="<?php echo base_url('rs/images/user.jpg');?>"  style="width:1000px"/>
 <img src="<?php echo base_url('rs/images/system.jpg');?>"  style="width:1000px"/>
</div>




<div>
	<div>
	<br/>
		<p style="font-size: 16px;">系统概述：现有系统为应用服务和数据服务分离模式，由应用服务器，文件服务器，和数据库服务器组成
            <br>前台php框架，后台python程序，利用消息队列进行服务器之间的通信。<span lang="EN-US" xml:lang="EN-US"></span></p>
		<p style="font-size: 16px;"style="font-size: 16px;"style="font-size: 16px;"style="font-size: 16px;">系统配置：CPU	32核多线程 ，内存	64Gb，系统	64位CentOs操作系统，服务器系统	Apache，带宽    4M。<span lang="EN-US" xml:lang="EN-US"></span></p>
		<p style="font-size: 16px;"style="font-size: 16px;"style="font-size: 16px;">关键词提取速度：每分钟可以提取60-70个任务的关键词。<span lang="EN-US" xml:lang="EN-US"></span></p>
		<p style="font-size: 16px;"style="font-size: 16px;">网页爬取速度：获取百度查询结果的速度为1秒1百条，存入数据库为1分钟30条，url的二次爬取速度为1分钟60条，二次爬取正文成功率90%。<span lang="EN-US" xml:lang="EN-US"></span></p>
		<p style="font-size: 16px;">相似度计算速度：正文相似度匹配的速度为1分钟40次，正文内容的句子高亮标红为1分钟30次。<span lang="EN-US" xml:lang="EN-US"></span></p>
	</div>
</div>
<script>
    jQuery(document).ready(function() {
        //全局js函数，header中定义
        global_function();
        //common_function.js中定义，渲染侧边栏
        set_sidebar_selected('#help');
    });
</script>
