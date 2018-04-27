﻿/*!
 * description: 弹框
 * require: jquery-1.10.2.js
 * relevancy: modal.css
 * 
 * date: 2015-08-27
 * update: (2016-02-26 XX:XX)
 */
// var comid;
$(document).on('click','[data-target]',function(){
   // 获取弹框id
    var modalBox = $(this).attr('data-target');
    var modalBoxPos = $(modalBox).find(".modal-effect");
    modal(modalBox,modalBoxPos);  
});
modalPostion = function(pos) {
    //获取改变之后的宽度
    var changeWidth=$(window).width();
    var changeHeight=$(window).height();
    // 获取DIV宽度
    var smallW = $(pos).width();
    var smallH = $(pos).height();
    //计算宽度修改比例
    var divChangeWidth  =   (changeWidth - smallW) / 2;
    var divChangeHeight =   (changeHeight - smallH) / 2;
    // 超过一屏幕的上下不居中给margin值
    if( divChangeHeight > 0 ) {
        $(pos).css('top', divChangeHeight);
        $(pos).css('left', divChangeWidth);
    } else {
        $(pos).css('left', divChangeWidth);
        $(pos).css('margin', "30px 0");
    }
};

modal = function(box,pos) {
    // 浮动窗口定位
    modalPostion(pos);
    // 显示
    $('body').addClass('modal-open').append('<div class="modal-backdrop"></div>');
    $('body').css('padding-right','15px');
    $(box).addClass("in");

    $(window).resize(function(){
        // 浮动窗口定位
        modalPostion(pos);
    });

    // 点击关闭按钮以及遮罩层时关闭浮动层
    $('.icon-close, .close-btn, .modal-backdrop').bind('click', function(){
        $(box).removeClass("in");
        $('.modal-backdrop').remove();
        $('body').removeClass("modal-open");
        $('body').css('padding-right','0');
    });
};