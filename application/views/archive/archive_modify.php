<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="archive_modify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:600px">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      </div> -->
      <div class="modal-body">
          <div class="portlet box green-haze " id="modify">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-gift"></i> 修改学员信息
              </div>
            </div>
            <div class="portlet-body form">
              <form class="form-horizontal" role="form">
                <div class="form-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">姓名</label>
                    <div class="col-md-9">
                          <div class="input-icon">
                          <i class="fa fa-user"></i>
                          <input type="text" class="form-control" id='name'>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">性别</label>
                    <div class="col-md-9">
                      <select class="form-control" id='sex'> 
                        <option>男</option>
                        <option>女</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">出生日期</label>
                    <div class="col-md-9">
                      <div class="input-icon">
                      <i class="fa fa-calendar"></i>
                      <input class="form-control date-picker" type="text" id='birthday' data-date-format="yyyy-mm-dd"
                      value="1998-01-01" data-date="1998-01-01" data-date-viewmode="years"/>
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">学校</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" id='school'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">年级</label>
                    <div class="col-md-9">
                      <select class="form-control" id='grade'>
                        <option>高三</option>
                        <option>高二</option>
                        <option>高一</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">学生类别</label>
                    <div class="col-md-9">
                      <select class="form-control" id='student_type'>
                        <option>理科</option>
                        <option>文科</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">联系电话</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" id='phone_number'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">QQ号</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" id='qq'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">微信</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" id='wechat'>
                    </div>
                  </div>
                  <input type="text" class="form-control hide" id='SID'>
                  <div class="form-group">
                    <label class="col-md-3 control-label">住址</label>
                    <div class="col-md-9">
                      <textarea class="form-control" rows="1" id='address'></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">如何了解本学校</label>
                    <div class="col-md-9">
                      <select class="form-control" id='info_channel'> 
                        <option>朋友介绍</option>
                        <option>微信公众号</option>
                        <option>传单</option>
                        <option>偶尔发现</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">优势科目</label>
                    <div class="col-md-9">
                      <select class="form-control" id='good_subject'>
                        <option>数学</option>
                        <option>物理</option>
                        <option>化学</option>
                        <option>生物</option>
                        <option>政治</option>
                        <option>历史</option>
                        <option>地理</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">劣势科目</label>
                    <div class="col-md-9">
                      <select class="form-control" id='bad_subject'>
                        <option>数学</option>
                        <option>物理</option>
                        <option>化学</option>
                        <option>生物</option>
                        <option>政治</option>
                        <option>历史</option>
                        <option>地理</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">爱好</label>
                    <div class="col-md-9">
                      <select class="form-control" id='interest'>
                        <option>动漫</option>
                        <option>音乐</option>
                        <option>运动</option>
                        <option>电子游戏</option>
                        <option>电影</option>
                        <option>科学</option>
                        <option>小说</option>
                        <option>其他</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">是否有补习经历</label>
                    <div class="col-md-9">
                      <select class="form-control" id='remediation_experience'>
                        <option>有</option>
                        <option>没有</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-actions" style='padding:10px 10px'>
                  <div class="row">
                    <div class="col-md-offset-4 col-md-6">
                      <button type="button" class="btn green-haze" id="submit_modify">保存</button>
                      <button type="reset" class="btn blue" id="reset">重置</button>
                      <button type="button" class="btn default" data-dismiss="modal" aria-hidden="true" id='cancle'>取消</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

<script type="text/javascript">
  var base_url = "<?php echo base_url();?>";
  $("#submit_modify").click(function() {
    if(confirm('确认修改？')!=true)
      return;
    $.post(base_url+"archive/modify_archive", 
      {
        SID:          $('#modify #SID').val(),
        name:         $("#modify #name").val(),
        sex:          $("#modify #sex").val(),
        birthday:     $("#modify #birthday").val(),
        school:       $("#modify #school").val(),
        grade:        $("#modify #grade").val(),
        student_type: $("#modify #student_type").val(),
        phone_number: $("#modify #phone_number").val(),
        qq:           $("#modify #qq").val(),
        wechat:       $("#modify #wechat").val(),
        address:      $("#modify #address").val(),
        info_channel: $("#modify #info_channel").val(),
        good_subject: $("#modify #good_subject").val(),
        bad_subject:  $("#modify #bad_subject").val(),
        interest:     $("#modify #interest").val(),
        remediation_experience: $("#modify #remediation_experience").val(),
      },
      function(data){
        if(data == 1){
          $("#modify #cancle").trigger("click");
          reload_datatable('#archive_manage_table');
        }

      });
  });
</script>