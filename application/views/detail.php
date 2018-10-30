<div class="container">
    <div class="row">
        <div class="col-12 clearfix">
            <div class="col-left">
                <div id="J_main_left">
                    <div class="side-nav">
                        <ul>
                            <?php if(isset($news)): ?>
                            <?php foreach ($news as $item): ?>
                            <li><a href="/index/detail/<?php echo $item['cate'].'/'.$item['id']; ?>"><i class="fa fa-file-text"></i><?php echo $item['title']; ?></a></li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="side-box">
                        <h5 class="sidebar-title">热门标签</h5>
                        <div class="sidebar-tag clearfix">
                            <?php foreach ($labels as $item): ?>
                            <a href="/index/label/<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-right">
                <div class="col-cont">
                    <div class="echo-main">
                        <div class="breadcrumb">
                            <i class="fa fa-home"></i>
                            <a href="<?php echo site_url(); ?>" title="返回首页">首页</a>
                            <i class="fa fa-angle-right"></i><a href="/index/cate/<?php echo $current_cate['id']; ?>"><?php echo $current_cate['name']; ?></a>
                            <i class="fa fa-angle-right"></i>正文
                        </div>
                        <div class="echo-info clearfix">
                            <div class="am-left">
                                <h4 class="mb-1"><?php echo $row['title']; ?></h4>
                                <div class="t-info clearfix">
                                    <span><i class="fa fa-user"></i><a><?php echo $row['author']; ?></a></span>
                                    <span><i class="fa fa-clock-o"></i><?php echo substr($row['updatetime'], 0, 10); ?></span>
                                    <span><i class="fa fa-eye"></i><?php echo $row['pv']; ?></span>
                                </div>
                                <div class="t-info clearfix">
                                    <?php if(!empty($row['selectLabels'])): ?>
                                        <i class="fa fa-tag"></i>
                                        <?php foreach ($row['selectLabels'] as $item): ?>
                                            <em class="label label-important"><?php echo $item['name']; ?></em>
                                        <?php endforeach ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
					    <div class="echo-article"><?php echo $row['content']; ?></div>
                    </div>
                    <div class="echo-neighbor clearfix">
                        <?php if(isset($prev)): ?>
                        <a class="t-left" href="/index/detail/<?php echo $prev['cate'].'/'.$prev['id']; ?>">
                            <em><i class="fa fa-angle-double-left"></i></em>
                            <?php echo $prev['title']; ?>
                        </a>
                        <?php endif; ?>
                        <?php if(isset($next)): ?>
                        <a class="t-right" href="/index/detail/<?php echo $next['cate'].'/'.$next['id']; ?>">
                            <em><i class="fa fa-angle-double-right"></i></em>
                            <?php echo $next['title']; ?>
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="echo-main echo-readmore clearfix">
                        <div class="t-hotlog">
                            <div class="t-title"><span></span>热门文章</div>
                            <ul>
                                <?php foreach ($hots as $key => $value): ?>
                                <li>
                                    <span><?php echo ++$key; ?></span>
                                    <a href="/index/detail/<?php echo $value['cate'].'/'.$value['id']; ?>"><?php echo $value['title'] ?></a>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="t-random">
                            <div class="t-title"><span></span>相关文章</div>
                            <ul>
                                <li>
                                    <span>1</span>
                                    <a href="#">自媒体人广告收入300的自诉</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
