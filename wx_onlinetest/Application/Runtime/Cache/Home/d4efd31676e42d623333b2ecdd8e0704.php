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
 <form action="<?php echo U('Admin/add_question');?>" method="post">
        <?php define('NUMBER', $number); ?>
        <div class="weui-cells__title">添加题目</div>
       	<?php $__FOR_START_422078141__=1;$__FOR_END_422078141__=NUMBER;for($i=$__FOR_START_422078141__;$i < $__FOR_END_422078141__;$i+=1){ ?><div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" name="question_<?php echo ($i); ?>" placeholder="请输入题目">    
                </div>
            </div>
        </div><?php } ?>
        <input type="text" name="num" value="<?php echo ($number); ?>" hidden="hidden">
        <input type="text" name="type" value="<?php echo ($type); ?>" hidden="hidden">
        <input type="text" name="skill_id" value="<?php echo ($skill_id); ?>" hidden="hidden">
        <button type="submit" class="weui-btn weui-btn_plain-primary">添加</button>   
</form>

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