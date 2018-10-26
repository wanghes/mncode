<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-transform"/>
	<meta http-equiv="Cache-Control" content="no-siteapp"/>
	<meta name="applicable-device" content="pc,mobile"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
	<title><?php echo $title.'-码农技术'; ?></title>
	<meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $keycontents; ?>">
    <meta name="renderer" content="webkit">
    <link rel="icon" type="image/png" href="/static/images/favicon.png">
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="/static/images/favicon.png">
    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php echo $title; ?>">
    <link rel="apple-touch-icon-precomposed" href="/static/images/favicon.png">
    <link rel="stylesheet" href="/static/css/font-awesome.css">
    <link rel="stylesheet" href="/static/css/style.css">
    <!-- <link rel="stylesheet" href="/static/css/prettify.css"> -->
    <link rel="stylesheet" href="/static/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="/static/js/highlightJS/highlightJS/styles/github.css">
    <script src="/static/js/common_tpl.js"></script>
    <script src="/static/js/swiper.min.js"></script>
</head>
<body>
    <div class="header-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 clearfix">
                    <div class="header-logo">
                        <a href="/"><img src="/static/images/logo.png" alt="码农技术"></a>
                    </div>
                    <div class="header-nav">
                        <div class="js_toggle_nav header-nav-bar"><i class="fa fa-bars"></i></div>
                        <div class="js_nav header-nav-list d-none">
                            <span class="nav-arrow"></span>
                            <ul>
                                <li class="<?php echo !isset($current_cate) ? 'active' : ''; ?>">
                                    <a href="/" title="首页"><i class="fa fa-home"></i>首页</a>
                                </li>
                                <?php foreach ($cates as $item): ?>
                                    <li class="<?php echo isset($current_cate) && $item['id'] == $current_cate['id'] ? 'active' : '' ?>">
                                        <a target="_self" href="/index/cate/<?php echo $item['id'] ?>" title="<?php echo $item['name'] ?>">
                                            <i class="fa fa-grav"></i><?php echo $item['name'] ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="header-search">
                        <div class="js_toggle_search header-search-bar">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="js_search header-search-list d-none">
                            <form name="keyform" method="get" action="#">
                                <input name="keyword" type="text" placeholder="请输入关键字">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
