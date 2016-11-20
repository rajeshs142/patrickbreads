$(function() {
    
    
      /* header */
      var headerEl = $('.site-header');
      var bodyEl = $('body');
      var viewportHeight = $(window).height();
      var headerShowHeight = headerEl.attr('data-viewport') || viewportHeight;
      var headerEnable = (headerEl.attr('data-header_enable') === 'six') ? false : true;
      var lastScrollTop = 0;
      var j = 1;
      
       $('.nav-more')[0].style.display = 'none';
      
      $(window).resize(function() {
          var nav = $('.navbar-nav');
          var navMore = $('.nav-more');
          if (navMore[0].style.display == 'block') {
              navMoreWidth = navMore.outerWidth();
          } else {
              navMoreWidth = 0;
          }
          var navWidth = nav.outerWidth();
          var windowWidth = window.outerWidth;
          var percentWidth = Math.round(((window.outerWidth-(nav.outerWidth()+navMore.outerWidth()))/window.outerWidth)*100);
          console.log("ww/2",windowWidth/2);
          console.log("nW",navWidth);
          
          if (windowWidth/2 > (navWidth-navMoreWidth+50)) {
              $('.nav-more')[0].style.display = 'none';
          } else {
              $('.nav-more')[0].style.display = 'block';
              var navLi = $('.navbar-nav > li')
              var navLiLength = (navLi.length)-1;
              var navLiAvgWidth = navWidth / navLiLength;
              if (windowWidth/(2*navLiLength) < navLiAvgWidth) {
                  var el = $(navLi[navLiLength-1]).detach();
                  $('#submenu').append(el);
              }
              
          }
          console.log(navLi);

      });
      
      
      
  var elemWidth, fitCount, varWidth = 0, ctr, 
      $menu = $(".navbar-nav"), $collectedSet;

  ctr = $menu.children().length;
  $menu.children().each(function() {
      varWidth += $(this).outerWidth();
  });

  collect();
  $(window).resize(collect);

  function collect() {
      elemWidth = $menu.width();
      fitCount = Math.floor((elemWidth / varWidth) * ctr) - 1;
      $menu.children().css({"display": "block", "width": "auto"});
      $collectedSet = $menu.children(":gt(" + fitCount + ")");
      $("#submenu").empty().append($collectedSet.clone());  
      $collectedSet.css({"display": "none", "width": "0"});
  }
      $(window).scroll(function() {
          
          // show or hide header
          if (document.body.classList.contains('home')) {
              if (document.body.scrollTop > 650) {
                  document.getElementsByClassName('navbar')[0].style.display = 'block';
                  if (document.body.scrollTop > 651) {
                      if (document.body.classList.contains('hide-header')) {
                          document.body.classList.remove('hide-header');
                      }
                  }
              }
              else if (document.body.scrollTop < 650) {
                  if (!document.body.classList.contains('hide-header')) {
                      document.body.classList.add('hide-header')
                  }
              }
          }
          
          
          var scrollTop = bodyEl.scrollTop();
          $('.hero-single').css('background-position-y', Math.max(-scrollTop/3, -750)+'px');
          if (scrollTop > 0) {
              $('.hero-wrapper').css('top', 35+scrollTop/14+'%');
              if(scrollTop > 700) {
                  $('.hero-wrapper').css('z-index', '-1');
              } else {
                  $('.hero-wrapper').css('z-index', '1');
              }
          } else {
              $('.hero-wrapper').css('top', '35%');
          }
        /* element in viewport - animate */
        /*if(inViewport('.categories')) {
          $('.categories').addClass('animate');
        }
        if(inViewport('.hero')) {
          $('.hero').addClass('animate');
        }

        if(inViewport('.story')) {
          $('.story').addClass('animate');
        } */

      });

      /* element in viewport */
      function inViewport(selector) {
         var el = $(selector);
         if (el.length) {
           var elH = el.outerHeight(),
               H   = $(window).height(),
               tmp = H-400,
               r   = el[0].getBoundingClientRect(), t=r.top, b=r.bottom;
           return Math.max(0, t>0? Math.min(elH, tmp-t) : (b<tmp?b:H));
         } else return false;
      }

    // gallery
    $('.hero-carousel').slick({
        arrows: true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 1,
        responsive: [
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1
            }
        }
        ]
    });
    $('.img-gallery').slick({
        lazyLoad: 'ondemand',
        arrows: true,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 3000,                
        dots: true,
        centerMode: true,
        centerPadding: '150px',
        slidesToShow: 1,
        responsive: [
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1
            }
        }
        ]
    });
});