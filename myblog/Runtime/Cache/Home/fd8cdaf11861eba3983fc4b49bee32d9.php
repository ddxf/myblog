<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport"    content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
  
  <title>LD~Dawn个人博客</title>

  <link rel="shortcut icon" href="/Public/home/images/gt_favicon.png">
  <link rel="stylesheet" href="/Public/css/page.css">
  
  <!-- Bootstrap -->
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <!-- Fonts -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alice|Open+Sans:400,300,700">
  <!-- Custom styles -->
  <link rel="stylesheet" href="/Public/home/css/styles.css">

  <!--[if lt IE 9]> <script src="assets/js/html5shiv.js"></script> <![endif]-->
</head>
<body class="home">

<header id="header">
  <div id="head" class="parallax" parallax-speed="2">
    <h1 id="logo" class="text-center">
      <img class="img-circle" src="<?php echo session('adminuser')['avatar'];?>" alt="">
      <span class="title"><?php echo session('adminuser')['username'];?></span>
      <span class="tagline"><?php echo session('adminuser')['person'];?><br>
        <a href="/fileds">修改个人信息</a></span>
    </h1>
  </div>

  <nav class="navbar navbar-default navbar-sticky">
    <div class="container-fluid">
      
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      
      <div class="navbar-collapse collapse">
        
        <ul class="nav navbar-nav">
          <li class="active"><a href="/index">首页</a></li>
          <?php if(empty($_SESSION['adminuser'])): ?><li><a href="/login">登录</a></li>
            <li class="dropdown">
              <a href="/register" class="dropdown-toggle">注册</a>
            </li>
          <?php else: ?>
            <li style="float:right;"><a href="/outline">注销</a></li><?php endif; ?>
          <li style="left:400px;">
            <form action="/seach" method="post" >
                <input type="text" name="name" placeholder="填写搜索内容">
                <input type="submit" name="submit">
            </form>
          </li>
        </ul>
      </div><!--/.nav-collapse -->      
    </div>  
  </nav>
</header>

<main id="main">
	<div class="container">
		<div class="row topspace">
			<div class="col-sm-8 col-sm-offset-2">
				<?php if(is_array($list)): foreach($list as $key=>$val): ?><article class="post">
					<header class="entry-header">
						<div class="entry-meta"> 
							<span class="posted-on"><time class="entry-date published" date="2013-09-27"></time><?php echo (date("Y-m-d",$val['created_at'])); ?></span>			
						</div>
						<h1 class="entry-title"><a href="/new_list/<?php echo ($val['id']); ?>" rel="bookmark"><?php echo ($val['title']); ?></a></h1>
					</header>
					<div class="entry-content">
						<p><?php echo ($val['desc']); ?></p>
					</div>
				</article><?php endforeach; endif; ?>
			</div> 
		</div>

		<center class="pu_page mtm">
				<?php echo ($page); ?>
		</center>
	

	</div>	<!-- /container -->

</main>

<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 widget">
        <h3 class="widget-title">博主信息</h3>
        <div class="widget-body">
          <p>QQ:1377488192<br>
            <a href="mailto:#">dxf1457@163.com</a><br>
            <br>
            本博客属于网络免费模板，请勿妄言！
          </p>  
        </div>
      </div>

      <div class="col-md-3 widget">
        <h3 class="widget-title">我的信息(部分暂未实现)</h3>
        <div class="widget-body">
          <p class="follow-me-icons">
            <a href=""><i class="fa fa-twitter fa-2"></i></a>
            <a href=""><i class="fa fa-dribbble fa-2"></i></a>
            <a href=""><i class="fa fa-github fa-2"></i></a>
            <a href=""><i class="fa fa-facebook fa-2"></i></a>
          </p>
        </div>
      </div>

      <div class="col-md-3 widget">
        <h3 class="widget-title">博主至理名言</h3>
        <div class="widget-body">
          <p>一般人的信心时有时无，若有若无，或者时过境迁就淡忘，怀疑了。没有经过锻炼的信心是无法经得起磕磕碰碰。</p>
          <p>A man who has not climb the GREAT WALL is not a true man,sure,you must do well youself!</p>
        </div>
      </div>

      <div class="col-md-3 widget">
        <h3 class="widget-title">关注度</h3>
        <div class="widget-body">
          <p>杨青-wx：yangqq_1987wx：<br>
            <a href="http://www.yangqq.com/">杨青博客</a><br>
            <br>
            网页设计相对简单大方，个人比较喜欢。
          </p>  
        </div>
      </div>

    </div> <!-- /row of widgets -->
  </div>
</footer>

<footer id="underfooter">
  <div class="container">
    <div class="row">
      
      <div class="col-md-6 widget">
        <div class="widget-body">
          <p>234 Hidden Pond Road, Ashland City, TN 37015 </p>
        </div>
      </div>

      <div class="col-md-6 widget">
        <div class="widget-body">
          <p class="text-right">
            Copyright &copy; 2014, Your awesome name here<br> 
            <a href="#" rel="designer">GetTemplate</a>. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
        </div>
      </div>

    </div> <!-- /row of widgets -->
  </div>
</footer>



<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="/Public/home/js/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="/Public/home/js/template.js"></script>
</body>
</html>