﻿$(function(){
    $('.warp_list .rit>span>em').click(function(){
        $(this).parent('span').addClass('on').siblings().removeClass('on');
    })
    //弹框
    $('.yanzheng input').focus(function(){
        $(this).parent().css({"border":"1px solid #3499da"})
    })
     $('.yanzheng input').blur(function(){
        $(this).parent().css({"border":"1px solid #eaedf0"})
    })
//选择下拉框
        $(".option").click(function(ev){
        var o = $(this).find('ol').css('display');
        var ev = window.event || event; 
            ev.stopPropagation(); 
        if( o == 'none' ){
            $(this).find(".sel_option").slideDown();
        }else{
            $(this).find(".sel_option").slideUp();
        }
    });
    $(".sel_option").click(function(ev){
        ev.stopPropagation();
    });
    $(document).click(function(){
        $(".sel_option").slideUp();
    });

    //     /*点击任何地方关闭层*/
    //     $(document).click(function(event){
    //         var tar = $(event.target).attr("class");
    //         if( tar != $this ){
    //             $this.find(".sel_option").slideUp();
    //         }
    //     });
    //     return false;
    // });

    $(".sel_option a").click(function(){
        var rel = $(this).attr("rel");
        var list = $(this).parents(".sel_option");
        var titVal = $(this).text();

        $(".sel_option a").parent("li").removeClass("on");
        $(this).parent("li").addClass("on");
        
        list.parent(".option").find("span").text(titVal);
        list.parent(".option").find("input").val(titVal);
        list.slideUp();

    });

})