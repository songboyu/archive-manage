/**
 * 根据事件下拉菜单内容的变化修改子事件下拉菜单的内容
 * @function change_subevent
 * @param {string} event_selector 事件下拉菜单选择器
 * @param {string} subevent_selector 子事件下拉菜单选择器
 * @return {void} void
 */
function change_subevent(event_selector, subevent_selector){
  $.post(
    base_url+'forum_retrieval/get_all_subevents/'+$(event_selector).val(),
    function(data){
      obj = eval('('+data+')');                   
      create_select(subevent_selector, "子任务", obj);
    });
}

/**
 * 建立select标签内容，obj数据格式要符合函数中定义，有id、description、keyword字段
 * @function change_subevent
 * @param {string} selector select标签选择器
 * @param {string} default_selected 默认选项内容
 * @param {json} obj 返回的数据内容
 * @return {string} select内容的html代码
 */
function create_select(selector, default_selected, obj){
  if((s = $(selector))==null)
	return;

  value = '';
  description = '';
  html = "<option value=''>"+default_selected+"</option>";

  for(i=0;i<obj.length;i++){
	for(d in obj[i]){
	  if(d.toLowerCase().indexOf('id')!=-1){
		value = obj[i][d];
	  }else if(d.toLowerCase().indexOf('description')!=-1){
		description = obj[i][d];
	  }else if(d.toLowerCase().indexOf('keyword')!=-1 && d.toLowerCase().indexOf('id')==-1){
		description = obj[i][d];
	  }
	}
	html += "<option value="+value+">"+description+"</option>";
  }
  s.html(html);
}

/**
 * 针对Metronic新模板的table行选择功能返回被选中行的属性数据
 * @function get_selected
 * @param {string} wrapper_selector 表格包裹容器选择器
 * @param {string} table_body_selector 表格tbody选择器
 * @return {json} 被选中行的dataid集合，用,分开 
 */
function get_selected(wrapper_selector, table_body_selector, method){
  method = method||'GET';
  var selected = [];
  var ts = $(wrapper_selector).find(table_body_selector).find('.active');
  ts.each(function() {
	selected.push($(this).attr('dataid'));
  });
  if (ts.size() == 0) {
	alert("请选择至少一个条目！");
	return null;
  }

  var rst_data;
  if(method=='GET'){
  	rst_data =  selected.join(',');
  }else if(method=='POST'){
  	rst_data = {'selected': selected.join(',')};
  }
  return rst_data;
}

/**
 * 添加由鼠标移动触发的悬浮窗，流程是函数将target_selector绑定mouseover和mouseout事件，
 * 当事件触发后，从target_selector对应的容器中取出dataid属性，附加在load_url_prefix之
 * 后，形成ajax加载数据的url地址，将返回的数据填充入menu_selector中，并显示。
 * @function add_flow_menu
 * @param {string} target_selector 绑定鼠标移入、移出事件的容器的选择器
 * @param {string} load_url_prefix ajax加载数据的url地址前缀，函数会在url之后增加属性
 * @param {string} menu_selector 浮动窗口容器的选择器
 * @return {void} void
 */
function add_flow_menu(target_selector, load_url_prefix, menu_selector){
	var timemout_fun = null;
	//为超链接绑定事件，当鼠标移动到超链接时，加载浮动div信息
	$(menu_selector).text('载入中，请稍后...');
	$(target_selector).live("mouseover", function(e) {
	  var dataid = $(this).attr('dataid');
	  if (dataid == '')
		return;
	  timemout_fun = setTimeout(function() {
		$(menu_selector).load(load_url_prefix + dataid);
			load_tip(e);//加载浮动div并设置坐标的的函数，实现见下方。
		}, 100);
	}).live("mouseout", function(e) {
		//当鼠标移出超链接时，设置延时任务，100毫秒后，隐藏浮动div
		clearTimeout(timemout_fun);
		timemout_fun = setTimeout(function() {
		  $(menu_selector).hide();
		  $(menu_selector).text('载入中，请稍后...');
		}, 100);
	});

	//当鼠标移动到浮动div中时,清除隐藏浮动div的延时任务
	$(menu_selector).live("mouseover", function() {
	  clearTimeout(timemout_fun);
	}).live("mouseout", function() {
		//当鼠标移出浮动div时，设置延时任务，100毫秒后隐藏浮动div
		clearTimeout(timemout_fun);
		timemout_fun = setTimeout(function() {
		  $(menu_selector).hide();
		  $(menu_selector).text('载入中，请稍后...');
		}, 100);
	});
	//加载浮动div信息并设置坐标
	function load_tip(e) {
	  $(menu_selector).css({
			"display": "block", //设置浮动div显示
			"top": (e.pageY) + "px", //设置浮动div的top坐标
			"left": (e.pageX - 500) + "px"//设置浮动div的left坐标
		});
		//例子中我只是简单在浮动div中写了些静态代码，当然你也可以通过ajax方式，从后台服务器获取数据填充到浮动div中。
	}
}
/**
 * 将datatables中的select下拉菜单进行扁平化渲染
 * @function datatables_flat_select
 * @param {string} table_wrapper datatables生成的表格容器的选择器
 * @return {void} void
 */
function datatables_flat_select(table_wrapper){
	$(table_wrapper).find('.dataTables_length select').select2();
}
/**
 * 对datatables中的checkbox进行事件添加/渲染
 * @function datatables_manage_checkboxes
 * @param {string} 对象table的选择器，如'#table_1'
 * @return {void} void
 */
function datatables_manage_checkboxes(selector){
	var table = jQuery(selector);
    table.find('.group-checkable').change(function () {
        var set = jQuery(this).attr("data-set");
        var checked = jQuery(this).is(":checked");
        jQuery(set).each(function () {
            if (checked) {
                $(this).attr("checked", true);
                $(this).parents('tr').addClass("active");
            } else {
                $(this).attr("checked", false);
                $(this).parents('tr').removeClass("active");
            }
        });
        jQuery.uniform.update(set);
    });

    table.on('change', 'tbody tr .checkboxes', function () {
        $(this).parents('tr').toggleClass("active");
    });
}
/**
 * 重新载入datatables数据表格
 * @function reload_datatable
 * @param {string} datatable_selector datatables表格选择器，如#reply_job_list_table
 * @return {void} void
 */
function reload_datatable(datatable_selector){
	$(datatable_selector).DataTable().ajax.reload();
}

/**
 * 渲染侧边栏选中效果
 * @function set_sidebar_selected
 * @param {string} main_li_selector 一级菜单li选择器，如#visualization
 * @param {intger} child_number 二级菜单序号,从1开始
 * @return {void} void
 */
function set_sidebar_selected(main_li_selector, child_number){
	var selected_li = $(main_li_selector);
	//增加一级菜单选中效果
	selected_li.addClass('active').addClass('open');
	//增加白色的选中三角符号
	selected_li.children('a').append('<span class="selected"></span>');
	//修改一级菜单三角符号向下
	selected_li.children('a').children('.arrow').addClass('open');
	//选择2级菜单
	child_number = child_number||0;
	child_number = child_number - 1;
	if (child_number!=-1) {
		var selected_child_li = $(main_li_selector+'> ul > li:eq('+child_number+')');
		selected_child_li.addClass('active');
	}
}