<style>
input, select{
  margin-top: 5px;
  margin-bottom: 0px;
}
</style>
<fieldset style="border:1px outset #F0F8FF;width: 1300px; margin-bottom:10px;-webkit-border-radius:6px">
  <legend>
    <font style="font-size: 13px; font-family: 微软雅黑; color: #ffffff; margin-left: 10px;">
      任务操作
    </font>
  </legend>
  <form method="post" id="form" style="width:90%; height:30px;" action="<?php echo base_url('word_manage/index'); ?>">
    <table align="center" style="width:25%; margin-left: 10px;">
        <td>
          <a href="#add_task" role="button" data-toggle="modal">
            <input class="btn" id="add_tag" value="新增任务" type="button" />
          </a>
        </td>
         <td>
          <a href="#add_keyword" role="button" data-toggle="modal">
            <input class="btn" id="add_tag" value="新增关键词" type="button" />
          </a>
        </td>
    </table>
  </form>
</fieldset>
<script type="text/javascript">
</script>