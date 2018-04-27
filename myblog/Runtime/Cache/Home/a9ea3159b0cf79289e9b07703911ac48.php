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
      <img class="img-circle" src="<?php echo ($adminUser['avatar']); ?>" alt="">
      <span class="title"><?php echo ($adminUser['username']); ?></span>
      <span class="tagline"><?php echo ($adminUser['person']); ?><br>
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
          <li><a href="/login">登录</a></li>
          <li class="dropdown">
            <a href="/register" class="dropdown-toggle">注册</a>
          </li>
          <li><a href="/outline">退出</a></li>
          <li>
            <form action="/seach" method="post">
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
                              
        <article class="post">
          <header class="entry-header">
            <div class="entry-meta"> 
              <span class="posted-on"><time class="entry-date published" date=""><?php echo (date("Y-m-d",$dlist['title'])); ?></time></span>      
            </div> 
            <h1 class="entry-title"><a href="#" rel="bookmark"><?php echo ($dlist['title']); ?></a></h1>
          </header> 
          <div class="entry-content"> 
            <p><?php echo (htmlspecialchars_decode($dlist['content'])); ?></p>
        </article><!-- #post-## -->

      </div> 
    </div> <!-- /row post  -->

    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">

        <div id="comments"> 
          <h3 class="comments-title"><?php echo ($count['id']); ?>条评论</h3>
          <a href="#comment-form" class="leave-comment">Leave a Comment</a>
          <ol class="comments-list">
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><li class="comment">
              <div>
                <img src="/Public/home/images/avatar_woman.png" alt="Avatar" class="avatar">
                
                <div class="comment-meta">
                  <span class="author"><a href="#"><?php echo ($vo['name']); ?></a></span>
                  <span class="date"><a href="#"><?php echo (date("Y-m-d",$vo['datetime'])); ?></a></span>
                  <span class="reply"><a href="#">回复暂时没实现</a></span>
                </div>
                <div class="comment-body"><?php echo ($vo['comment']); ?>
                                        </div><!-- .comment-body -->
              </div>
            </li><?php endforeach; endif; ?>
          </ol>
          
          <div class="clearfix"></div>

          <nav id="comment-nav-below" class="comment-navigation clearfix" role="navigation"><div class="nav-content">
              <div class="nav-previous"><a href="/index">回到首页</a></div>
              <div class="nav-next"><a href="#">回到顶部</a>&rarr;</div>
          </div></nav><!-- #comment-nav-below -->


          <div id="respond">
            <h3 id="reply-title">请留下评论吧！</h3>
            <form action="/comintinfo/<?php echo ($dlist['id']); ?>" method="post" id="commentform" class="">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" placeholder="Enter your name" name="name">
              </div>
              <div class="form-group">
                <label for="inputEmail">Email address <i class="text-danger">*</i></label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email" name="email">
              </div>
              <div class="form-group">
                <label for="inputWeb">Website</label>
                <input type="nane" class="form-control" id="inputWeb" placeholder="http://" naem="http">
              </div>
              <div class="form-group">
                <label for="inputComment" >Comment</label>
                <textarea class="form-control" rows="6" name="comment"></textarea>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="checkbox">
                    <label> <input type="checkbox"> Subscribe to updates</label>
                  </div>
                </div>
                <div class="col-md-4 text-right">
                    <button type="submit" class="btn btn-action">Submit</button>
                </div>
            </form>
          </div> <!-- /respond -->
        </div>
      </div>
    </div> <!-- /row comments -->
    <div class="clearfix"></div>

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