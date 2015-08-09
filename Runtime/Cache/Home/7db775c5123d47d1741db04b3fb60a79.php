<?php if (!defined('THINK_PATH')) exit();?><p class="normal_tips" style="margin:0"><b class="fa fa-info-circle"></b> 常用配置地址：<br/>
&lt;a href=&quot;[follow]&quot;&gt;绑定帐号&lt;/a&gt;<br/>
&lt;a href=&quot;[website]&quot;&gt;微首页&lt;/a&gt;<br/>
&lt;a href=&quot;http://xxxx?token=[token]&quot;&gt;Token&lt;/a&gt;<br/>
&lt;a href=&quot;http://xxxx?opneid=[openid]&quot;&gt;OpenId&lt;/a&gt;
</p>

<div class="form-item cf">
  <label class="item-label"> 类型: </label>
  <div class="controls">
    	<div class="check-item">
      <input type="radio" name="config[type]" value="1" class="regular-radio" id="config[type]_1" onClick="changeOption()">
      <label for="config[type]_1"></label>文本
      </div>
<!--    <label class="radio">
      <input type="radio" name="config[type]" value="2" onClick="changeOption()">
      图片 </label>-->
    <div class="check-item">
      <input type="radio" name="config[type]" value="3" class="regular-radio" id="config[type]_3" onClick="changeOption()">
      <label for="config[type]_3"></label>图文
      </div>
    <label class="radio">
      <input type="radio" name="config[type]" value="2" onClick="changeOption()">
      关键词 </label>      
  </div>
</div>
<div class="form-item cf show show2">
  <label class="item-label"> 关键词: <span class="check-tips">（可以是自定义回复，多图文等中的关键词）</span> </label>
  <div class="controls">
    <input type="text" name="config[keyword]" class="text input-large" value="<?php echo ($data["config"]["keyword"]["value"]); ?>">
  </div>
</div>
<div class="form-item cf show show3">
  <label class="item-label"> 标题: </label>
  <div class="controls">
    <input type="text" name="config[title]" class="text input-large" value="<?php echo ($data["config"]["title"]["value"]); ?>">
  </div>
</div>
<div class="form-item cf show show3 show1">
  <label class="item-label"> 内容: </label>
  <div class="controls">
    <label class="textarea input-large">
      <textarea name="config[description]"><?php echo ($data["config"]["description"]["value"]); ?></textarea>
    </label>
  </div>
  
</div>

<div class="form-item cf show show3">
  <label class="item-label"> 图片: <span class="check-tips">图片链接，支持JPG、PNG格式，较好的效果为大图360*200，小图200*200</span> </label>
  <div class="controls">
    <input type="hidden" name="config[pic_url]" class="text input-large" id="config_img" value="<?php echo ($data["config"]["pic_url"]["value"]); ?>">
  </div>
  
                          <div class="controls uploadrow2" title="点击修改图片">
                            <input type="file" id="upload_picture_pic_url">
                            
                            <div class="upload-img-box" id="img_preview">
                              <?php if(!empty($data["config"]["pic_url"]["value"])): ?><div class="upload-pre-item2"><img width="180" height="100" src="<?php echo ($data["config"]["pic_url"]["value"]); ?>"/></div><?php endif; ?>
                            </div>
                          </div>
                         
                          <script type="text/javascript">
								//上传图片
							    /* 初始化上传插件 */
								$("#upload_picture_pic_url").uploadify({
							        "height"          : 100,
							        "swf"             : "/pines/weiphp2.0.1202/Public/static/uploadify/uploadify.swf",
							        "fileObjName"     : "download",
							        "buttonText"      : "上传图片",
							        "uploader"        : "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>",
							        "width"           : 180,
							        'removeTimeout'	  : 1,
							        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
							        "onUploadSuccess" : uploadPicturepic_url
							    });
								function uploadPicturepic_url(file, data){
							    	var data = $.parseJSON(data);
							    	var src = '';
							        if(data.status){
							        	src = data.url || '/pines/weiphp2.0.1202' + data.path;
							        	$("#img_preview").html('<div class="upload-pre-item2"><img width="180" height="100" src="' + src + '"/></div>');
										var site = "<?php echo SITE_URL;?>";
										$('#config_img').val(site+data.path);
							        } else {
							        	updateAlert(data.info);
							        	setTimeout(function(){
							                $('#top-alert').find('.close').click();
							                $(that).removeClass('disabled').prop('disabled',false);
							            },1500);
							        }
							    }
								</script> 
</div>
<div class="form-item cf show show3">
  <label class="item-label"> 链接: <span class="check-tips">点击图文消息跳转链接</span> </label>
  <div class="controls">
    <input type="text" name="config[url]" class="text input-large" value="<?php echo ($data["config"]["url"]["value"]); ?>">
  </div>
</div>
<script type="text/javascript">
function changeOption(){
	$(".show").each(function(){
		$(this).hide();
		
	});
	
	var val = $("input[name='config[type]']:checked").val();
	$('.show'+val).each(function(){
		$(this).show();
	});
}
$(function(){
	var type = "<?php echo (intval($data["config"]["type"]["value"])); ?>";
	if(type=="0")
	    type = 3;
		
	$("input[name='config[type]'][value="+type+"]").attr("checked",true); 
	changeOption();
})
</script>