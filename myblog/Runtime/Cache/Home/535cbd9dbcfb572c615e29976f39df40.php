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
    
    <div class="row section topspace">
      <div class="col-md-12">
        <p class="lead text-center text-muted">我只想说我要分享一些比较有趣的事情，希望你能喜欢。<a href="">相关报道</a> 当然，我所希望的个人日记记录人生的 <a href="">关于一周哦</a>. </p>
      </div>
    </div> <!-- / section -->
    
    <div class="row section featured topspace">
      <h2 class="section-title"><span>文章主分类</span></h2>
      <div class="row">
        <?php if(is_array($typelist)): foreach($typelist as $key=>$vo): ?><div class="col-sm-6 col-md-3">
          <h3 class="text-center"><?php echo ($vo['name']); ?></h3>
          <p><?php echo ($vo['desc']); ?></p>
          <p class="text-center"><a href="/class/<?php echo ($vo['id']); ?>" class="btn btn-action">更多内容</a></p>
        </div><?php endforeach; endif; ?>
      </div>
    </div><div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >免费网站模板</a></div>
  
    <div class="row section recentworks topspace">
      
      <h2 class="section-title"><span>最新文章</span></h2>
      
      <div class="thumbnails recentworks row">
        <?php if(is_array($list)): foreach($list as $key=>$val): ?><div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <a class="thumbnail" href="/Home/new_list/<?php echo ($val['id']); ?>">
            <span class="img">
              <img src="<?php echo ($val['cover']); ?>" alt="">
              <span class="cover"><span class="more">点击阅读 &rarr;</span></span></a>
            </span>
            <span class="title"><?php echo ($val['title']); ?></span>
          </a>
          <span class="details"><a href=""><?php echo ($val['id']); ?></a> | <a href=""><?php echo ($val['author']); ?></a> | <a href=""><?php echo (date("Y-m-d",$val['created_at'])); ?></a></span>
          <h4></h4>
          <p></p>
        </div><?php endforeach; endif; ?>
    </div> <!-- /section -->

    <div class="row section topspace">
      <div class="panel panel-cta"><div class="panel-body">
        <div class="col-lg-8">
          <p>A simple, nice-looking <b>call to action box</b>. Boxing is about respect. getting it for yourself, 
          and taking it away from the other guy. no, this is mount everest. </p>
        </div>
        <div class="col-lg-4 text-right">
          <a href="http://www.cssmoban.com/cssthemes/7037.shtml " class="btn btn-primary btn-lg">模板下载</a>
        </div>
      </div></div>
    </div> <!-- /section -->

    <div class="row section clients topspace">
      <h2 class="section-title"><span>本模板应用</span></h2>
      <div class="col-lg-12">
        <p>
          <img src="/Public/home/images/sample_clients.png" alt="">
        </p>
      </div>
    </div> <!-- /section -->

  </div>  <!-- /container -->

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