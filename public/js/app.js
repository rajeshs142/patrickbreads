$(function() {
    
   /* search fuctioality */ 
  /*
      $('.search-icon').on('click', function() {
          $('.search-icon').addClass('hidden');
          $('.search-wrapper').removeClass('hidden');
          $('#search-inpt').focus();
      });
      $('.search-icon-nav-top').on('click', function() {
          $('.search-icon-nav-top').addClass('hidden');
          $('.search-wrapper-nav-top').removeClass('hidden');
          $('#search-inpt-nav-top').focus();
      });
      $('#search-inpt').on('blur', function(e) {
          e.preventDefault();
          if((e.relatedTarget == null || e.relatedTarget.id !== 'search-btn')) {
              $('.search-icon').removeClass('hidden');
              $('.search-wrapper').addClass('hidden');
          }
      });
      $('#search-inpt-nav-top').on('blur', function(e) {
          e.preventDefault();
          if((e.relatedTarget == null || e.relatedTarget.id !== 'search-btn-nav-top')) {
              $('.search-icon-nav-top').removeClass('hidden');
              $('.search-wrapper-nav-top').addClass('hidden');
          }
      });
     */ 
      /* header */
      var headerEl = $('.navbar');
      var bodyEl = $('body');
      var viewportHeight = $(window).height();
      var headerShowHeight = headerEl.attr('data-viewport') || viewportHeight;
      var headerEnable = (headerEl.attr('data-header_enable') === 'six') ? false : true;
      var lastScrollTop = 0;
      var j = 1;
 
      $(window).scroll(function() {
          
          // show or hide header
              if (document.body.scrollTop > headerShowHeight-10) {
                  if (!document.body.classList.contains('adjust-header')) {
                      document.body.classList.add('adjust-header');
                  }
                  if (document.body.scrollTop > headerShowHeight) {
                      if (!document.body.classList.contains('show-header')) {
                          document.body.classList.add('show-header');
                      }
                  }
              }
              else if (document.body.scrollTop < headerShowHeight) {
                  if (document.body.classList.contains('show-header')) {
                      document.body.classList.remove('show-header')
                      document.body.classList.remove('adjust-header');
                  }
              }
          
          
          var scrollTop = bodyEl.scrollTop();
          $('.hero-single').css('background-position-y', Math.max(-scrollTop/3, -750)+'px');
          if (scrollTop > 0) {
              $('.hero-wrapper').css('top', 0+scrollTop/14+'%');
          } else {
              $('.hero-wrapper').css('top', '0%');
          }

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
    
    var items = [];

    $.ajax({
      url: "/api/products"
    }).done(function(data) {
        items = data;
    });
    
    $('#search-inpt-nav-top').on('keyup',function() {
        var that = this;
        var filter = [];
        var ul = $('#autocomplete');
        var i = 0;
        
        ul.empty();
        
        filter = $.grep( items, function( n, i ) {
          if (n.name.toUpperCase().indexOf(that.value.toUpperCase()) > -1) {
              return n;
          }
        });
        filter.forEach(function( n ) {
            if (i < 10) {
                var li = $('<li><a href="/item/'+n.product_slug+'">'+n.name+'</a></li>');
                ul.append(li);
            }
            i++;
        });
    });
});

// feedback form submission
// $(document).ready(function() {
//
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $('.contact-btn').on('click', function(event) {
//
//         $('.form-group').removeClass('has-error');
//         $('.help-block').remove();
//
//         var formData = {
//             'name'                  : $('input[name=name]').val(),
//             'email'                 : $('input[name=email]').val(),
//             'message'               : $('textarea[name=message]').val(),
//             '_token'                : $('input[name=_token]').val(),
//             'g-recaptcha-response'  : $('textarea[name=g-recaptcha-response]').val()
//         };
//
//         $.ajax({
//             type        : 'POST',
//             url         : '/contact/store',
//             data        : formData,
//             dataType    : 'json',
//             encode      : true,
//             success: function(data) {
//                 if(data && data.message)
//                     $('.contact-form .modal-body').prepend('<div class="alert alert-success">' + data.message + '</div>');
//             },
//             error: function(data) {
//                 console.log(data);
//                 var responseText = data && data.responseText;
//                 responseText = jQuery.parseJSON(responseText);
//                 var errors = responseText && responseText.message;
//
//                 if (errors) {
//                     for (let x in errors) {
//                         var node = $('.'+x);
//                         node.addClass('has-error');
//                         var newNode = $('<span class="help-block"><strong>'+errors[x][0]+'</strong></span>');
//                         $('.'+x+' .col-sm-12').append(newNode);
//                     }
//                 }
//             }
//         });
//         event.preventDefault();
//     });
//
// });
