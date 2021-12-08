


$(".aside_nav>li>a").click(function() {


if ($(this).hasClass('active_li')){
    $('.aside_nav>li>a').removeClass('active_li');
    $('.aside_nav>li>a').siblings(".menu_sub").removeClass('show_ul');
    $(this).removeClass('active_li');
    $(this).siblings(".menu_sub").removeClass('show_ul');

    } else {
    $('.aside_nav>li>a').removeClass('active_li');
    $('.aside_nav>li>a').siblings(".menu_sub").removeClass('show_ul');
    $(this).addClass('active_li');
    $(this).siblings(".menu_sub").addClass('show_ul');
      }


    if ($(this).siblings(".show_ul").length) {
        $('.main_sec').addClass('menu_shrink');

    } else {
        $('.main_sec').removeClass('menu_shrink');
    }

});



$('.sub_ul li a').click(function() {

    $('.sub_ul li a').removeClass('active_li');
    $(this).addClass('active_li');

});

$('button#menu_switch').click(function() {
    $(this).toggleClass('crossed');
    $('.main_sec ').toggleClass('menu_mobil');

});

