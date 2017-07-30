{include file="public/toper" /}
<div class="layui-tab layui-tab-brief main-tab-container">
    <ul class="layui-tab-title main-tab-title">
      <div class="main-tab-item">信息修改</div>
    </ul>
    <div class="layui-tab-content">
       <form class="layui-form">
        <div class="layui-tab-item layui-show">
          <input type="hidden" name="id" value="<?php echo $admin_user['id'] ?>">
          <?php echo Form::input('text','username',$admin_user['username'],'用户名','','请输用户名','username');?>
          <?php echo Form::input('password','password','','密码','','请输密码','password');?>
          <?php //echo Form::input('text','name',$admin_user['name'],'姓名','用于文章发布的作者','请输用户名','required');?>
          <div class="layui-form-item">
            <div class="layui-input-block">
              <button class="layui-btn" lay-submit="" lay-filter="edit">立即提交</button>
            </div>
          </div>
        </div>   
      </form>
    </div>
</div>
<script type="text/javascript">
layui.use('form',function(){
    var form = layui.form()
    ,jq = layui.jquery;

    //自定义验证规则
      form.verify({
        username: function(value){
          if(value.length < 5){
            return '用户名至少得5个字符啊';
          }
        }
        ,password: [/(.+){6,12}$/, '密码必须6到12位']
      });

    //监听提交
      form.on('submit(edit)', function(data){
        loading = layer.load(2, {
          shade: [0.2,'#000'] //0.2透明度的白色背景
        });
        var param = data.field;
        jq.post('{:url("admin/edit")}',param,function(data){
          if(data.code == 200){
            layer.close(loading);
            layer.msg(data.msg, {icon: 1, time: 1000}, function(){
              window.top.location.reload();
            });
          }else{
            layer.close(loading);
            layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
          }
        });
        return false;
      });
});
</script>
{include file="public/footer" /}