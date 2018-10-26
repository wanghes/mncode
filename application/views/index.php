<div class="main-center">
    <div class="main-cont">
        <div class="breadcrumb">
            <i class="fa fa-home"></i>
            <a href="/" title="返回首页">首页</a>
            <?php if(isset($current_cate_name)): ?>
            <i class="fa fa-angle-right"></i><?php echo $current_cate_name; ?>
            <?php endif; ?>
        </div>
        <?php  if (!empty($data)): ?>
        <?php foreach ($data as $item): ?>
        <div class="list-loop">
            <div class="list-title">
                <a href="/index/detail/<?php echo $item['cate'].'/'.$item['id']; ?>" target="_self"><?php echo $item['title'];?></a>
            </div>
            <div class="list-des">
                <?php echo $item['keycontents'];?>
            </div>
            <div class="list-info clearfix">
                <span class="pull-left mr-2">
                    <i class="fa fa-clock-o"></i><?php echo substr($item['updatetime'],0,10);?>
                </span>
                <i class="fa fa-list-ul"></i>
                <span><?php echo $item['author'];?></span>
                <span class="pull-right">
                    <a href="/index/detail/<?php echo $item['cate'].'/'.$item['id']; ?>">阅读全文<i class="fa fa-chevron-circle-right"></i></a>
                </span>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="alert alert-danger">还没有相关的数据</div>
        <?php endif; ?>
        <?php echo $pages; ?>
    </div>
</div>
