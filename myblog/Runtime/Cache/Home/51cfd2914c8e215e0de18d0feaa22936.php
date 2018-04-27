<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <title>个人中心</title>
    <link rel="stylesheet" href="http://s5.ui.cn/css/all/uicn.v1.css">
    <link rel="stylesheet" href="/Public/home/css/new_enter.css">
</head>
<body>
    <!-- 内容 -->
    <div class="container">
        <div class="warp_1180 wpn cl">
            <!--左侧菜单-->
            
            <!-- 右侧内容 账户安全-->
            <div class="main more z">
                <div class="main_warp">
                    <div class="title cl">
                        <div class="h1 z" data-target="#modal-setphone">个人信息</div>
                        <div class="h3 z mln" data-target="#modal-changepwd">
                            － 我的个人信息 <a href="/Home"><返回></a>
                        </div>
                    </div>
                    <form action="/insertangle" method="post" id="" enctype="multipart/form-data">
                        <div class="account_warp ptv">
                            <div class="cont cl">
                                <em class="p1 z" data-target="#modal-setpwd">审核状态：</em>
                                <span class="h2 z">未提交审核</span>
                            </div>
                            <div class="cont mtv cl">
                                <em class="h2 lin54 z">用户名：</em>
                                <span class="z">
                                    <input class="nav_in" type="text" name="username" value="<?php echo ($adminuser['username']); ?>" placeholder="填写修改名称">
                                </span>
                            </div>
                            <div class="cont mtv cl" >
                                <em class="h2 lin54 z">个性签名：</em>
                                <span class="z">
                                    <input   class="nav_in" type="text" name="person" value="<?php echo ($adminuser['person']); ?>" placeholder="">
                                </span>
                               
                            </div>
                          
                            <div class="cont mtv cl">
                                <em class="h2 z">个人头像：</em>
                                <div class="up_img pos z">
                                    <input type="file" accept=".jpg,.gif,.png" name="avatar" style="font-size:80px;" multiple="multiple" class="upload-icon-file" title="上传" onchange="admin(this)">
                                    <div id="preview" class="icon-add-round">
                                    	<img src="<?php echo ($adminuser['avatar']); ?>" style="height:200px;">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="post ptv_">
                        	<button class="btn post_btn" type="">提交</button>
                    	</div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
      <script type="text/javascript">
        function admin(file) {
            var prevDiv = document.getElementById('preview');
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(evt) {
                    prevDiv.innerHTML = '<img style="width:150px;height:150px;" src="' + evt.target.result + '" />';
                }
                reader.readAsDataURL(file.files[0]);
            } else {
                prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
            }
        }
</script>

</html>