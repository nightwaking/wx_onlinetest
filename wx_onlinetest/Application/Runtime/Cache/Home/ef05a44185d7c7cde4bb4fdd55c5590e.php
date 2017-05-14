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
        <div class="weui-cells__title">测试题目</div>
        <form action="<?php echo U('Common/pyDisplay');?>" method="post">
        <div class="weui-cell weui-cell_access">
            <div class="weui-cell__bd">套题总分数:<?php echo ($mark); ?></div>
        </div>
        <?php if(is_array($kind)): $i = 0; $__LIST__ = $kind;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="weui-cells">
            <div class="weui-cell weui-cell_access">
                <div class="weui-cell__bd">题目:<?php echo ($vo["q_question"]); ?></div>
            </div>
            <div class="weui-cells weui-cells_radio">
            <?php $__FOR_START_272706331__=1;$__FOR_END_272706331__=5;for($i=$__FOR_START_272706331__;$i < $__FOR_END_272706331__;$i+=1){ if(is_array($choice)): $i = 0; $__LIST__ = $choice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ve): $mod = ($i % 2 );++$i; if((($vo['qid']) == ($ve['choice_sid']))): ?><label class="weui-cell weui-check__label" for="(<?php echo ($ve["cid"]); ?>+<?php echo ($i); ?>)">
                <div class="weui-cell__bd">
                    <p><?php echo ($ve["choice_name"]); ?></p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" class="weui-check" name="radio_<?php echo ($vo["qid"]); ?>" id="(<?php echo ($ve["cid"]); ?>+<?php echo ($i); ?>)" value="">
                    <span class="weui-icon-checked"></span>
                </div>
            </label><?php endif; endforeach; endif; else: echo "" ;endif; } ?>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <input type="text" name="count" value="<?php echo ($count); ?>" hidden="hidden">
        <input type="text" name="sid" value="<?php echo ($sid); ?>" hidden="hidden">
        <button type="submit" class="weui-btn weui-btn_plain-primary">提交试卷</button>
        </form>
    </div>

<div class="footer">
<div class="weui-tab">
    <div class="weui-tab__panel">

    </div>
    <div class="weui-tabbar" id="weiTab">
        <a href="<?php echo U('Home/index');?>" class="weui-tabbar__item">
            <img src="/wx_onlinetest/Public/Static/images/icon_nav_layout.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">首页</p>
        </a>
        <a href="<?php echo U('Common/index');?>" class="weui-tabbar__item">
            <img src="/wx_onlinetest/Public/Static/images/icon_nav_cell.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">个人信息</p>
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