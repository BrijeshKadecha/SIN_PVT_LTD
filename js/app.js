$(document).foundation();

//  Smaller screens menu
$(".menu-trigger").click(function() {
    $(".menu-mask").fadeIn();
    $(".menu").addClass("is-open");
});

$(".menu-close, .menu-mask").click(function() {
    $(".menu-mask").fadeOut();
    $(".menu").removeClass("is-open");
});

// Hide header on scroll down / show on scroll up
$(document).ready(function () {
  
    'use strict';

    var video = jQuery('#myVideo');


    checkVideo(video);
    headerInit();

    jQuery(window).scroll(function(){
        checkVideo(video);
        headerInit();
    });
});

function headerInit() {
    var navbar = $('.site-header');

    var a = $(window).scrollTop();

    if (a > 0) {
        navbar.addClass("header-shrunk");
    } else {
        navbar.removeClass("header-shrunk");
    }
}

function checkVideo(video){
    if(video.length){
        if(video.is(":in-viewport(165)")){
            console.log('Play');

            var promise = video[0].play();

            if(promise !== undefined){
                promise.then(function(){

                }).catch(function(error) {
                    console.log('Autoplay is not allowed by your browser.');
                    console.log(error);
                })
            }
        }
        else {
            console.log('Pause');
            video[0].pause();
        }
    }
}

// On scroll animation
ScrollReveal().reveal('.fade-up', { distance: '40px', interval: 100, viewFactor: 0.5 });

// Home hero
$(".home-hero-slides").slick({
    arrows: false,
    autoplay: true,
    fade: true,
    dots: true
});

// Home services
$('#constructionTrigger').hover(function() {
    $("#constructionImage").toggleClass("is-visible");
});

$('#timber-systemsTrigger').hover(function() {
    $("#timber-systemsImage").toggleClass("is-visible");
});

$('#plant-hireTrigger').hover(function() {
    $("#plant-hireImage").toggleClass("is-visible");
});

$('#haulageTrigger').hover(function() {
    $("#haulageImage").toggleClass("is-visible");
});

// Gallery
$(".gallery").slick({
    arrows: true,
    dots: false,
    centerMode: true,
    variableWidth: true,
    adaptiveHeight: false,
    prevArrow: $('.gallery-arrow.prev'),
    nextArrow: $('.gallery-arrow.next')
});

// Project gallery
$(".project-gallery").slick({
    arrows: true,
    dots: true,
    slidesToShow: 1,
    autoplay: true,
    prevArrow: $('.project-gallery-arrow.prev'),
    nextArrow: $('.project-gallery-arrow.next')
});

// Related projects
$(".related-projects").slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1
          }
        }
      ]
});

// Modals
$('a[data-modal]').click(function(event) {
    $(this).modal({
        fadeDuration: 250
    });
    return false;
});

// Venobox
$(document).ready(function(){
    $('.venobox').venobox({
        bgcolor: 'transparent',
    }); 
});

// Funcy select
$('select[data-menu]').each(function() {

    let select = $(this),
        options = select.find('option'),
        menu = $('<div />').addClass('select-menu'),
        button = $('<div />').addClass('button'),
        list = $('<ul />'),
        arrow = $('<em />').prependTo(button);

    options.each(function(i) {
        let option = $(this);
        list.append($('<li />').text(option.text()));
    });

    menu.css('--t', select.find(':selected').index() * -48 + 'px');

    select.wrap(menu);

    button.append(list).insertAfter(select);

    list.clone().insertAfter(button);

});

$(document).on('click', '.select-menu', function(e) {

    let menu = $(this);

    if(!menu.hasClass('open')) {
        menu.addClass('open');
    }

});

$(document).on('click', '.select-menu > ul > li', function(e) {

    let li = $(this),
        menu = li.parent().parent(),
        select = menu.children('select'),
        selected = select.find('option:selected'),
        index = li.index();

    menu.css('--t', index * -48 + 'px');
    selected.attr('selected', false);
    select.find('option').eq(index).attr('selected', true);

    menu.addClass(index > selected.index() ? 'tilt-down' : 'tilt-up');

    setTimeout(() => {
        menu.removeClass('open tilt-up tilt-down');
    }, 500);

});

$(document).click(e => {
    e.stopPropagation();
    if($('.select-menu').has(e.target).length === 0) {
        $('.select-menu').removeClass('open');
    }
})

// Arrow animation
$('.arrow').mouseenter(function(e) {

    e.preventDefault();

    let arrow = $(this);

    if(!arrow.hasClass('animate')) {
        arrow.addClass('animate');
        setTimeout(() => {
            arrow.removeClass('animate');
        }, 1600);
    }
});

jQuery('.unmute').on('click', function() {
    const video = jQuery(this).next();
    if(video.prop('muted')) {
        video.prop('muted', false);
        jQuery(this).removeClass('muted')
    } else {
        video.prop('muted', true);
        jQuery(this).addClass('muted')
    }
});


function hasAudio (video) {
    return video.mozHasAudio ||
        Boolean(video.webkitAudioDecodedByteCount) ||
        Boolean(video.audioTracks && video.audioTracks.length);
}

$(document).ready(function() {
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1200,
        outDuration: 1200,
        linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([href^="mailto:"])',
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-custom',
        //loadingInner: '',
        timeout: true,
        timeoutCountdown: 300,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'body',
        transition: function(url){ window.location.href = url; }
    });

    jQuery('.dropdown-filter').on('click', function() {
        console.log('trigger');
    })
});