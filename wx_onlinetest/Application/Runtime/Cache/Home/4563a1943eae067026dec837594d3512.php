<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>员工测评系统</title>
    <link rel="stylesheet" type="text/css" href="/wx_onlinetest/Public/Static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/wx_onlinetest/Public/Static/css/weui.min.css">
    <link rel="stylesheet" type="text/css" href="/wx_onlinetest/Public/Static/css/index.css">
</head>
<body ontouchstart>
    <div class="page__bd">
        <div class="weui-cells__title">素质考评题目</div>

        <?php if(is_array($kind)): $i = 0; $__LIST__ = $kind;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Pyschology/pyschology_display', array('id'=>$vo['pid'], 'type' => 0));?>">
        <div class="weui-cells">
            <div class="weui-cell weui-cell_access">
                <div class="weui-cell__bd"><?php echo ($vo["p_name"]); ?></div>
            </div>
        </div>
        </a>
        <div class="weui-form-preview__ft">
                <a class="weui-form-preview__btn weui-form-preview__btn_default psStauts" href="<?php echo U('Pyschology/pyschology_status', array('id'=>$vo['pid'],'status' => $vo['ps_status']));?>"></a>
                <div class="ps_status" hidden="hidden"><?php echo ($vo["ps_status"]); ?></div>
                <a class="weui-form-preview__btn weui-form-preview__btn_default" href="<?php echo U('Pyschology/pyschology_delete', array('id'=>$vo['pid']));?>">删除</a>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>  
    </div>

    <a href="<?php echo U('Pyschology/pyschology_add');?>" class="weui-btn weui-btn_plain-primary" id="btn">新加测试</a>
<div class="footer">
<div class="weui-tab">
    <div class="weui-tab__panel">

    </div>
    <div class="weui-tabbar" id="weiTab">
        <a href="<?php echo U('Home/index');?>" class="weui-tabbar__item">
            <img src="/wx_onlinetest/Public/Static/images/icon_nav_layout.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">首页</p>
        </a>
        <a href="<?php echo U('User/logout');?>" class="weui-tabbar__item">
            <img src="/wx_onlinetest/Public/Static/images/icon_nav_special.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">退出</p>
        </a>
    </div>
</div>
</div>
</body>

<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
<script type="text/javascript" src="/wx_onlinetest/Public/Static/js/zepto.min.js"></script>


<script type="text/javascript">
 
$(function(){
        var $searchBar = $('#searchBar'),
            $searchResult = $('#searchResult'),
            $searchText = $('#searchText'),
            $searchInput = $('#searchInput'),
            $searchClear = $('#searchClear'),
            $searchCancel = $('#searchCancel');

        function hideSearchResult(){
            $searchResult.hide();
            $searchInput.val('');
        }
        function cancelSearch(){
            hideSearchResult();
            $searchBar.removeClass('weui-search-bar_focusing');
            $searchText.show();
        }

        $searchText.on('click', function(){
            $searchBar.addClass('weui-search-bar_focusing');
            $searchInput.focus();
        });
        $searchInput
            .on('blur', function () {
                if(!this.value.length) cancelSearch();
            })
            .on('input', function(){
                if(this.value.length) {
                    $searchResult.show();
                } else {
                    $searchResult.hide();
                }
            })
        ;
        $searchClear.on('click', function(){
            hideSearchResult();
            $searchInput.focus();
        });
        $searchCancel.on('click', function(){
            cancelSearch();
            $searchInput.blur();
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        $('.weui-tabbar__item').on('click', function () {
            $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
        });
    });
</script>
<script type="text/javascript">
    var orderStatus = $('.order_status');
    var orderCannel = $('.order_cannel');

    for (var i=0; i<orderStatus.length; i++){
        if (orderStatus[i].innerHTML == 1){
            orderCannel[i].style.display = "none";
        }else{
            orderCannel[i].style.display = "block";
        }
    }
</script>
<script type="text/javascript" src="/wx_onlinetest/Public/Static/js/jquery.js"></script>
<script type="text/javascript" src="/wx_onlinetest/Public/Static/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var pic_circle = $('.item:first');
        var pic_icon = $('.pic_icon:first');
        pic_circle.addClass('active');
        pic_icon.addClass('active');

        $("#myCarousel").carousel('cycle')
    });
</script>
</html>

<script type="text/javascript">
    var psStatus = document.getElementsByClassName('psStauts');
    var psShow = document.getElementsByClassName('ps_status');
    for (var i=0; i<psStatus.length; i++){
        if (psShow[i].innerHTML == 1){
            psStatus[i].innerHTML = "禁用";
        }else{
            psStatus[i].innerHTML = "启用";
        }
    }
    
    
</script>