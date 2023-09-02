$(document).ready(function () {

  // Global Variables
  var scrollBarWidth = 0;
  scrollBarWidth = window.innerWidth - $("body").width();
  if (!isCanvasSupported()) {
    var viewportHeight = $(window).height();
    var viewportWidth = $(window).width();
  } else {
    var viewportHeight = $(window).height();
    var viewportWidth = $(window).width() + scrollBarWidth;
  }
  //console.log(viewportHeight);
  var viewportRatio = viewportWidth / viewportHeight;
  var wrapwidth = 22;
  var wrapslidewidth = 44;
  var uiready = false;
  var documentheight = $(document).height();
  var easing = 'easeInOutQuart';
  var pagetransitionspeed = 100;
  var lastPageScroll = 0;
  var lastscrollpos = 0;
  var resetScroll = 0;
  var replacepagetype;
  var imagefadespeed = 150;
  var royalspeed = 500;
  var royaldelay = 7000;
  //var homecache = false;
  var baseurl = window.location.protocol+"//"+window.location.host + "/";

  // Identify rusty rusty browsers
  function isCanvasSupported() {
    var elem = document.createElement('canvas');
    return !!(elem.getContext && elem.getContext('2d'));
  }

  // The action for the rusty rusty browsers	
  /*
	if (!isCanvasSupported()) {

	}
	*/

  // Device detection
  var device;

  function checkdevice() {
    device = $('body').attr('class');
  }

  checkdevice();

  // HTML 5 push + History + Ajax
  var pushstate = 'push';

  if (history.pushState) {
    // supported.
  } else {
    pushstate = 'no';
  }
  
  var ajaxCache = {};

  var replacePage = function (url) {

    if (typeof (window.history.pushState) == 'function' && pushstate == 'push') {

      if (replacepagetype == 'default') {
      /*
      	if(url in ajaxCache)
      	{
      		console.log('from cache');
	      	var $response = ajaxCache[url];
	      	pageid = $response.filter('info').attr('id');
            pageclass = $response.filter('info').attr('class');
            $('body').attr('id', pageid).attr('class', pageclass);
            $('info').attr('id', pageid).attr('class', pageclass);
            targetTitle = $response.filter('title').text();
            $("#content").empty().append(one);
            
            if ($('#home').length) {
              $('#menublock').removeClass('dark');
            }
            
            $('#partialblock').fadeTo(0, 1).fadeTo(0, 0, function () {
              $('#partialblock').hide();
            });
            document.title = targetTitle;
            reinit();
	      	
      	} else {
*/
        $.ajax({
          url: url,
          type: 'get',
          dataType: 'html',
          success: function (data) {
	        //console.log(data);
            var $response = $(data);
            one = $response.find('#content').html();
            
            ajaxCache[url] = $response;

            pageid = $(data).filter('info').attr('id');
            pageclass = $(data).filter('info').attr('class');
            $('body').attr('id', pageid).attr('class', pageclass);
            $('info').attr('id', pageid).attr('class', pageclass);
            targetTitle = $response.filter('title').text();
            $("#content").empty().append(one);
            
            if ($('#home').length) {
              $('#menublock').removeClass('dark');
            }
            
            $('#partialblock').fadeTo(0, 1).fadeTo(0, 0, function () {
              $('#partialblock').hide();
            });
            document.title = targetTitle;
            reinit();
          }
        });
        
        //}

      } else {

        if (device == 'mobile' || device == 'tablet') {
          
            if ($('#home').length) {
              $('#menublock').css({'z-index':'9999'});
            } else {
              $('#menublock').removeClass('dark');
            }

            $('#partialblock').show().fadeTo(0, 0).fadeTo(200, 1, function () {
  
              setTimeout(function () {
                $(window).scrollTop(0);
              }, 100);
  
              $.ajax({
                url: url,
                type: 'get',
                dataType: 'html',
                success: function (data) {
	               console.log(data);
                  var $response = $(data);
                  one = $response.find('#content').html();
  
                  pageid = $(data).filter('info').attr('id');
                  pageclass = $(data).filter('info').attr('class');
                  $('body').attr('id', pageid).attr('class', pageclass);
                  $('info').attr('id', pageid).attr('class', pageclass);
                  targetTitle = $response.filter('title').text();
                  $("#content").empty().append(one);
                  $('#partialblock').fadeTo(300, 1).fadeTo(pagetransitionspeed, 0, function () {
                    $('#partialblock').hide();
                  });
                  document.title = targetTitle;
                  reinit();
                }
              });
            });
          


        } else {


          
            bodyscrollto(0, 500, easing);
            
            if ($('#home').length) {
              $('#menublock').css({'z-index':'9999'});
            } else {
              $('#menublock').removeClass('dark');
            }
            
            $('#partialblock').show().fadeTo(0, 0).fadeTo(pagetransitionspeed, 1, function () {
              $.ajax({
                url: url,
                type: 'get',
                dataType: 'html',
                success: function (data) {
	              //console.log(data);
	              var $div = $('<div/>');
	              $div.html(data);
	              console.log('data set',$div.find('#content').length);
                  var $response = $div;
                  one = $response.find('#content').html();
                  console.log('hi!');
                  pageid = $response.find('info').attr('id');
                  pageclass = $response.find('info').attr('class');
                  $('body').attr('id', pageid).attr('class', pageclass);
                  $('info').attr('id', pageid).attr('class', pageclass);
                  
                  
                  
                  targetTitle = $response.filter('title').text();
                  $("#content").empty().append(one);
                  $('#partialblock').fadeTo(150, 1).fadeTo(300, 0, function () {
                    $('#partialblock').hide();
                  });
                  document.title = targetTitle;
                  reinit();
                }
              });
            });
            
       

        }
      }


    } else {
      window.location.href = url;
    }

  }

  // Bind to State Change (only if pushstate is turned on in the settings)
  if (pushstate == 'push') {

    History.Adapter.bind(window, 'statechange', function () {
      var State = History.getState();
      console.log('statechange');
      replacePage(State.url);
    });

    $('body').on('click', 'a.history, .history a', function (e) {
      e.preventDefault();
      if (!$(this).hasClass('back') && !resetScroll) {
        lastPageScroll = $(window).scrollTop();
      } else {
        resetScroll = true;
      }
      if (typeof (window.history.pushState) == 'function' && pushstate == 'push') {
        replacepagetype = 'click';
        History.pushState({
          state: 1,
          rand: Math.random()
        }, null, this.href);
      } else {
        window.location.href = this.href;
      }
    });

  }

  // Pre-loading

  function prepreloading() {
    $('#content img').each(function () {
      // Set parent bg-color
      if ($(this).parent().hasClass('color')) {
        $(this).parent().css({
          'background': '#999999'
        });
      }
      // Pre re-sizing (to avoid flicker)
      parentwidth = $(this).parent().width();
      imgwidth = $(this).attr('data-width');
      imgheight = $(this).attr('data-height');
      imgdim = imgwidth / imgheight;
      newheight = parentwidth / imgdim;
      newheight = Math.round(newheight);
      $(this).width(parentwidth);
      $(this).height(newheight);
    });
  }
  
  // Analytics on Ajax update
  
	$(document).on('ajaxComplete', function (event, request, settings) {
		mypath = window.location.pathname;
    _gaq.push(['_trackPageview', mypath]);
  });
  

  // Image preloading is handy
  function preloadimages() {

	  if($('div.lazy').length) return false;
    // Adding Preload Graphics
    $('#content img').each(function (i) {
      if ($(this).parent().hasClass('not-me')) {

      } else {
        $(this).fadeTo(0, 0).parent().prepend('<div class="slide-spinn"><div class="dot">&nbsp;</div><div class="dot">&nbsp;</div><div class="dot">&nbsp;</div></div>');
      }
    });

    $('#content img').imgpreload({
      each: function () {
        // callback executes when each image loads
        if ($(this).parent().hasClass('color')) {
          $(this).parent().css({
            'background': 'transparent'
          });
        }

        var p = $(this).parent();

        if ($(this).parent().hasClass('not-me')) {
          $(this).fadeTo(imagefadespeed, 1, function () {
            p.find('.slide-spinn').fadeTo(imagefadespeed, 0, function () {
              p.find('.slide-spinn').remove();
            });
          });
        } else {
          if ($(this).hasClass('rsImg')) {
            $(this).fadeTo(imagefadespeed, 1, function () {
              //alert('yes');
            });
          } else {
            $(this).css({
              'width': '100%',
              'height': 'auto'
            }).fadeTo(imagefadespeed, 1, function () {
              p.find('.slide-spinn').fadeTo(imagefadespeed, 0, function () {
                p.find('.slide-spinn').remove();
              });
            });
          }

        }


      },
      all: function () {
        // callback executes when all images are loaded
        resize();
        if(device != 'desktop') checkOrientation();
      }
    });

  }

  // Resizers	

  function setdynamiccolumn() {
    if (device == 'mobile') {
      minheight = viewportHeight + 100;
    } else {
      minheight = viewportHeight - 44;
    }
    
    //console.log(minheight);
    $('#wrap #section').css({
      'height': '' + minheight + 'px'
    });
    
  }

  function resize() {
    setdynamiccolumn();
    // Resize Royals
    royalminiresize();
    royalbigresize();  
    royalhomeresize();    
  }

  // Scrollers
  var bodyscrollpos = 0;
  var bodyoldscrollpos = 0;
  var bodyscrolldir = 'down';

  // When scrolling the window

  function bodyscrolling() {

    bodyscrollpos = $(window).scrollTop();

    if (device == 'desktop' && isCanvasSupported()) {

      if (bodyscrollpos < 0) {
        bodyscrollpos = 0;
      }
      // Identify scroll direction. Not used atm, but left for future reference
      /*
			if (bodyoldscrollpos > bodyscrollpos) {
			  bodyscrolldir = 'up';
			} else {
			  bodyscrolldir = 'down';
			}
			*/

      // Archive the old pos
      bodyoldscrollpos = bodyscrollpos;

    }
  }

  // Bundle bind scrollers

  function bindScrollers() {
    $(window).bind('scroll', bodyscrolling);
  }

  function bodyscrollto(pos, s, easing) {
    newspeed = s;
    $('body, html').animate({
      scrollTop: '' + pos + 'px'
    }, newspeed, easing, function () {
      // Animation complete.
    });
  }
  
  // Main Menu
  function openmenu() {
    if ($('#menublock .nav').hasClass('open')) {

      if ($('#home').length) {
        closemenu();
        $('#wrap').show();
        $('#menublock .nav').removeClass('open');
        $('#menublock').removeClass('dark');
      }else {

        if (!$(this).hasClass('back') && !resetScroll) {
          lastPageScroll = $(window).scrollTop();
        } else {
          resetScroll = true;
        }
        if (typeof (window.history.pushState) == 'function' && pushstate == 'push') {
          replacepagetype = 'click';
          History.pushState({
            state: 1,
            rand: Math.random()
          }, null, baseurl);
        } else {
          window.location.href = baseurl;
        }
        
        $('#menublock .nav').hide();
        $('#menublock .nav').removeClass('open');
        $('#menublock').removeClass('dark');
      
      }
      
    } else {
      $('#menublock .nav').show();
      $('#menublock .nav').addClass('open');
      $('#menublock').addClass('dark');
      $('#wrap').hide(); 
    }
  }
  
  function closemenu() {
    $('#menublock .nav').hide();
  }

  // Clicks
  
  $('h1 a').click(function(e) {
    e.preventDefault();
    openmenu();
  });
  
  $('#menublock .nav li a').click(function(e) {
    e.preventDefault();
    closemenu();
  });    

  // ROYAL
  // Mini
  $('body').on('click', '#royalSliderMiniHolder .a-right', function (e) {
    e.preventDefault();
    rsMini = $('#royalSliderMini').data('royalSlider');
    gettheid = rsMini.currSlideId;
    gettheid++;
    rsMini.goTo(gettheid);
  });
  $('body').on('click', '#royalSliderMiniHolder .a-left', function (e) {
    e.preventDefault();
    rsMini = $('#royalSliderMini').data('royalSlider');
    gettheid = rsMini.currSlideId;
    gettheid--;
    rsMini.goTo(gettheid);
  });
  $('body').on('click', '#royalSliderMiniHolder .a-center', function () {
    resize();
    showslideshow();
  });
  
  // Big
  $('body').on('click', '#royalSliderBigHolder .a-right', function (e) {
    e.preventDefault();
    rsBig = $('#royalSliderBig').data('royalSlider');
    gettheid = rsBig.currSlideId;
    gettheid++;
    rsBig.goTo(gettheid);
  });
  $('body').on('click', '#royalSliderBigHolder .a-left', function (e) {
    e.preventDefault();
    rsBig = $('#royalSliderBig').data('royalSlider');
    gettheid = rsBig.currSlideId;
    gettheid--;
    rsBig.goTo(gettheid);
  });
  
  $('body').on('click', '#royalSliderBigHolder .a-center', function () {
    if ($('#selected').length) {

      $('#menublock').css({'z-index': '9989'});
      
      link = $('h1 a').attr('href');
      
      if (typeof (window.history.pushState) == 'function' && pushstate == 'push') {
        $('#royalSliderBigHolder.show').css({
          'z-index': '999'
        });
        replacepagetype = 'click';
        History.pushState({
          state: 1,
          rand: Math.random()
        }, null, link);
      } else {
        $('#royalSliderBigHolder.show').hide();
        window.location.href = link;
      }
      

    } else {
      hideslideshow();
    }
  });
  
  
  // Home
  $('body').on('click', '#royalSliderHomeHolder .a-right', function (e) {
    e.preventDefault();
    rsHome = $('#royalSliderHome').data('royalSlider');
    gettheid = rsHome.currSlideId;
    gettheid++;
    rsHome.goTo(gettheid);
  });
  $('body').on('click', '#royalSliderHomeHolder .a-left', function (e) {
    e.preventDefault();
    rsHome = $('#royalSliderHome').data('royalSlider');
    gettheid = rsHome.currSlideId;
    gettheid--;
    rsHome.goTo(gettheid);
  });

  function hideslideshow() {
    /*
    if ($('#project').length && $('#royalSliderMini').length && $('#royalSliderBig').length) {
      rsMini = $('#royalSliderMini').data('royalSlider');
      rsBig = $('#royalSliderBig').data('royalSlider');
      gettheid = rsBig.currSlideId;
      rsMini.st.transitionSpeed = 0;
      rsMini.goTo(gettheid);
      rsMini.st.transitionSpeed = royalspeed;
    }
    */
    
    $('#content-col .lh-adjust').removeClass('hide');
    $('#wrap').css({'height': ''});
    bodyscrollto(lastscrollpos, 0, easing);
    $('#menublock').css({'z-index': '9989'});
    $('#royalSliderBigHolder').removeClass('show');
    
    if (device == 'mobile' || device == 'tablet') {
      //alert('hide');
      $('#royalSliderHomeHolder').removeClass('show');
    }
    
    /*
    if ($('#royalSliderMini').length) {
      rsMini = $('#royalSliderMini').data('royalSlider');
      rsMini.stopAutoPlay();
    }
    */
    
    if ($('#royalSliderBig').length) {
      rsBig = $('#royalSliderBig').data('royalSlider');
      rsBig.stopAutoPlay();
    }
    
    if ($('#royalSliderHome').length) {
      rsHome = $('#royalSliderHome').data('royalSlider');
      rsHome.stopAutoPlay();
    }
    
  }

  function showslideshow() {
    /*
    if ($('#project').length && $('#royalSliderMini').length && $('#royalSliderBig').length) {
      rsMini = $('#royalSliderMini').data('royalSlider');
      rsBig = $('#royalSliderBig').data('royalSlider');
      gettheid = rsMini.currSlideId;
      rsBig.st.transitionSpeed = 0;
      rsBig.goTo(gettheid);
      rsBig.st.transitionSpeed = royalspeed;
    }
    */

    lastscrollpos = $(window).scrollTop();
    $('#content-col .lh-adjust').addClass('hide');
    h = viewportHeight - wrapslidewidth - 44;
    //console.log(h);
    $('#wrap').css({'height': '' + h + 'px'});
    
    if ($('#home').length) {
      $('#menublock').css({'z-index': '9950'});
    } else {
      $('#menublock').css({'z-index': '9950'});
    }
    
    $('#royalSliderBigHolder').addClass('show');
    $('#royalSliderHomeHolder').addClass('show');
    
    if ($('#royalSliderMini').length) {
      rsMini = $('#royalSliderMini').data('royalSlider');
      rsMini.stopAutoPlay();
    }
    
    if ($('#royalSliderBig').length) {
      rsBig = $('#royalSliderBig').data('royalSlider');
      rsBig.stopAutoPlay();
    }
    
    if ($('#royalSliderHome').length) {
      rsHome = $('#royalSliderHome').data('royalSlider');
      rsHome.startAutoPlay();
    }
    
  }
  
  /*
  if ($('#royalSliderMini')) {
    var slider = $('#royalSliderMini').data('royalSlider');
    slider.ev.on('rsBeforeAnimStart', function(event) {
    // before animation between slides start
    alert('test');
    });
  }
  */
  
  function royalminiresize() {
    if ($('#royalSliderMini').length) {
      highestdim = 0;
      iheight = 0;
      royalwidth = 537;
  
      $('#royalSliderMini img').each(function () {
        w = $(this).attr('data-rsw');
        h = $(this).attr('data-rsh');
        dim = w / h;
        $(this).attr('data-dim', '' + dim + '');
  
        if (dim > highestdim) {
          highestdim = dim;
          iheight = royalwidth / highestdim;
        }
      });
  
      iheight = Math.round(iheight);
  
      royalheight = iheight;
  
      $('#royalSliderMini').height(royalheight);
      $('#royalSliderMini img.rsImg').height(royalheight).css({
        'width': 'auto'
      });
      
      //rsMini = $('#royalSliderMini').data('royalSlider');
      //rsBig = $('#royalSliderBig').data('royalSlider');
      //rsMini.updateSliderSize();
      //rsBig.updateSliderSize();
    }
  }
  
  function royalbigresize() {
    if ($('#royalSliderBig').length) {
      highestdim = 0;
      iheight = 0;
      royalwidth = viewportWidth;

      $('#royalSliderBig img').each(function () {
        w = $(this).attr('data-rsw');
        h = $(this).attr('data-rsh');
        dim = w / h;
        $(this).attr('data-dim', '' + dim + '');

        if (dim > highestdim) {
          highestdim = dim;
          iheight = royalwidth / highestdim;
        }
      });

      iheight = Math.round(iheight);
      royalheight = iheight;

      if (royalheight > (viewportHeight - 44)) {
        royalheight = viewportHeight - 44;
      }

      $('#royalSliderBig').height(royalheight);
      $('#royalSliderBig img.rsImg').height(royalheight).css({
        'width': 'auto'
      });
      
      //rsMini = $('#royalSliderMini').data('royalSlider');
      //rsBig = $('#royalSliderBig').data('royalSlider');
      //rsMini.updateSliderSize();
      //rsBig.updateSliderSize();
    }
  }
  
  function royalhomeresize() {
    if ($('#royalSliderHome').length) {
    
      $('#royalSliderHomeHolderInner .a-left, #royalSliderHomeHolderInner .a-right').height(viewportHeight - 60);
    
      /*
      highestdim = 0;
      iheight = 0;
      royalwidth = viewportWidth;

      $('#royalSliderHome img').each(function () {
        w = $(this).attr('data-rsw');
        h = $(this).attr('data-rsh');
        dim = w / h;
        $(this).attr('data-dim', '' + dim + '');

        if (dim > highestdim) {
          highestdim = dim;
          iheight = royalwidth / highestdim;
        }
      });

      iheight = Math.round(iheight);
      royalheight = iheight;

      if (royalheight > (viewportHeight - 44)) {
        royalheight = viewportHeight - 44;
      }
      */

      $('#royalSliderHome,#royalSliderHomeHolder').height(viewportHeight).width(viewportWidth);
      
      /*
      $('#royalSliderHome img.rsImg').height(royalheight).css({
        'width': 'auto'
      });
      */
      
      
      
      
		wm = viewportWidth;
	  hm = viewportHeight;
	  
	  /*
	  if (hm > (wm - 100)) {
	    hm = wm - 100;
	  }
	  
  	
  	spaceRatio = wm/hm;
  	
  	$("#royalSliderHome img.rsImg").each(function(intIndex){
    	selector = $(this);
    	imageWidth = $(selector).attr('data-rsw');
    	imageHeight = $(selector).attr('data-rsh');
    	imageRatio = imageWidth / imageHeight;
	  	
    	newHeight = 0;
    	newWidth = 0;
	  	
    	if (spaceRatio > imageRatio) {
    	  newHeight = (wm / imageWidth) * imageHeight;
    	  newWidth = wm;
    	} else {
    	  newHeight = hm;
    	  newWidth = (hm / imageHeight) * imageWidth;
    	}
	  	
    	newTop = 0 - ((newHeight - hm) / 2);
    	newLeft =  0 - ((newWidth - wm) / 2); 
    	
    	/* Holder */
	  	//$(selectorHolder).height(hm).width(wm);
	  	
  		/* Img */
  		
  		/*
  		$(selector).css({height: newHeight, width: newWidth, marginTop: newTop, marginLeft: newLeft});
	  	
		});	
      */
      
    }
  }

  function initJournalSlideshow()
  {
  	var index = 0;
  	$('.journal-post .a-center').each(function()
  	{
  		$(this).data('sIndex',index);
  		index++;
  		$(this).click(function()
  		{
  			rsBig.st.transitionSpeed = 0;
            rsBig.goTo($(this).data('sIndex'));
            rsBig.st.transitionSpeed = royalspeed;
            showslideshow();
  		})
  	});
  }

  function setroyal() {
      var allowCSS = device == 'mobile' ? false : true;

    // Mini Slider
    if ($('#royalSliderMini').length) {

      royalminiresize();
      

      $('#royalSliderMini').royalSlider({
        arrowsNav: true,
        arrowsNavAutoHide: false,
        fadeinLoadedSlide: true,
        sliderDrag: false,
        controlNavigation: 'none',
        imageScaleMode: 'none',
        imageAlignCenter: false,
        loop: false,
        loopRewind: false,
        numImagesToPreload: 10,
        slidesOrientation: 'horizontal',
        keyboardNavEnabled: false,
        slidesSpacing: 22,
        autoScaleSlider: false,
        autoScaleSliderWidth: 400,
        autoScaleSliderHeight: 400,
        transitionSpeed: royalspeed,
        autoPlay: {
          enabled: true,
          pauseOnHover: true,
          delay: royaldelay,
          stopAtAction: true
        },
        allowCSS3: allowCSS

      });
      
      rsMini = $('#royalSliderMini').data('royalSlider');
      rsBig = $('#royalSliderBig').data('royalSlider');
      
      rsMini.ev.on('rsAfterSlideChange', function(event) {
      	//alert('change');
        // triggers after slide change
        
        if ($('#royalSliderBigHolder').hasClass('show')) {
        
        } else {
          if ($('#selected').length || $('#home').length) {
          
          } else {
            gettheid = rsMini.currSlideId;
            rsBig.st.transitionSpeed = 0;
            rsBig.goTo(gettheid);
            rsBig.st.transitionSpeed = royalspeed;
          }
        }
      });
      
      if(device == 'tablet')
      {
	      rsMini.ev.on('rsSlideClick', function() {
		      // triggers when user clicks on slide
		      // doesn't trigger after click and drag
		      resize();
		      showslideshow();
		  });
      }

    }

    // Big slider

    if ($('#royalSliderBig').length) {
    
      royalbigresize();

      $('#royalSliderBig').royalSlider({
        arrowsNav: true,
        arrowsNavAutoHide: false,
        fadeinLoadedSlide: true,
        controlNavigation: 'none',
        imageScaleMode: 'none',
        imageAlignCenter: false,
        loop: false,
        loopRewind: false,
        numImagesToPreload: 10,
        slidesOrientation: 'horizontal',
        keyboardNavEnabled: true,
        slidesSpacing: 22,
        autoScaleSlider: false,
        autoScaleSliderWidth: 400,
        autoScaleSliderHeight: 400,
        transitionSpeed: royalspeed,
        allowCSS3: allowCSS,
        
        autoPlay: {
          enabled: false,
          pauseOnHover: true,
          delay: royaldelay
        }

      });
      
      rsMini = $('#royalSliderMini').data('royalSlider');
      rsBig = $('#royalSliderBig').data('royalSlider');
      rsBig.ev.on('rsAfterSlideChange', function(event) {
        // triggers after slide change
    	//console.log('big change');

    	if($('.journal-post .a-center').length)
    	{
    		gettheid = rsBig.currSlideId;
    		var curImage = $('.journal-post .a-center').eq(gettheid);
    		var top = curImage.offset().top;
    		//console.log(gettheid,top);
    		lastscrollpos = top - 30;

    	}
        
        if ($('#royalSliderBigHolder').hasClass('show')) {
          if ($('#selected').length || $('#home').length) {
            
          } else {
          	if($('#royalSliderMini').length)
          	{
	            gettheid = rsBig.currSlideId;
	            rsMini.st.transitionSpeed = 0;
	            rsMini.goTo(gettheid);
	            rsMini.st.transitionSpeed = royalspeed;
	          }
          }
        }
      });
      
      if(device == 'tablet')
      {
	      rsBig.ev.on('rsSlideClick', function() {
		      // triggers when user clicks on slide
		      // doesn't trigger after click and drag
		      resize();
		      hideslideshow();
		  });
      }
      
    }
    
    
    // Home slider

    if ($('#royalSliderHome').length) {
    
      royalhomeresize();

      $('#royalSliderHome').royalSlider({
        arrowsNav: true,
        arrowsNavAutoHide: false,
        fadeinLoadedSlide: true,
        controlNavigation: 'none',
        imageScaleMode: 'fill',
        imageAlignCenter: true,
        loop: false,
        loopRewind: false,
        numImagesToPreload: 10,
        slidesOrientation: 'horizontal',
        keyboardNavEnabled: true,
        slidesSpacing: 0,
        autoScaleSlider: false,
        autoScaleSliderWidth: 400,
        autoScaleSliderHeight: 400,
        transitionSpeed: royalspeed,
        sliderDrag: false,
        allowCSS3: allowCSS,
        
        autoPlay: {
          enabled: false,
          pauseOnHover: true,
          delay: royaldelay
        }

      });
      
    }
    
    
  }

  // Pre-Init, Init & Re-Init

  function preinit() {
    lastscrollpos = 0;
    bindScrollers();
    bodyscrolling();
    prepreloading();
    preloadimages();
    setroyal();
    initJournalSlideshow();
    resize();

    
    // laxy load imagery 
    lazyLoad();
    
    if ($('#selected').length || $('#home').length) {
      if (device == 'mobile') {
        //hideslideshow();
      }
      else {
        showslideshow();
      }
      wrapslidewidth = 44;
    } else {
      hideslideshow();
      wrapslidewidth = 44;
    }

    $('#partialblock').fadeTo(300, 0, function () {
      $(this).hide();
    });

  }
  
  function lazyLoad()
  {
	
	$toLoad = $('div.lazy');
	curImage = 0;
	loadImg();
  }
  
  function loadImg()
  {
	  var $el = $toLoad.eq(curImage);
	  
	  if($el.length)
	  {
		  var src = $el.data('src');
		  var image = new Image();
		  $(image).load(function()
		  {
		  	//var $holder = $('<div class="img-holder"/>');
			var $img = $('<img src="' + this.src + '">');
			 $img.css({
				display : 'none',
				'opacity':1
			 });
			 /*
			 $holder.css({
			 	width:$el.data('width'),
			 	height:$el.data('height')
			 }).append($img).show();*/
			 $el.append($img);
			 $img.fadeIn();
			 //$el.hide();
			 curImage++;
			 //console.log('loaded image '+curImage);
			 loadImg(); 
		  });
		  image.src = src;
	  }
	  
	  
  }

  preinit();

  function init() {
    uiready = true;
    resize();
    initSearch();
  }

  function reinit() {
    $('#wrap').show();
    $('#menublock .nav').removeClass('open');
    lastscrollpos = 0;
    bindScrollers();
    bodyscrolling();
    prepreloading();
    preloadimages();
    setroyal();
    resize();
    initSearch();
    replacepagetype = 'default';
    lazyLoad();

    initJournalSlideshow();

    $('.journal-post .a-center').click(function()
    {
    	showslideshow();
    });
    
    
    

    $('#wrap').css({'max-height': ''});

    if ($('#selected').length || $('#home').length) {
      if (device == 'mobile') {
        //hideslideshow();
        showslideshow();
      }
      else {
        showslideshow();
      }
      wrapslidewidth = 44;
    } else {
      hideslideshow();
      wrapslidewidth = 44;
    }

    if (resetScroll) {
	  console.log('scrolling to',lastPageScroll);
      //$(window).scrollTop(lastPageScroll);
      bodyscrollto(lastPageScroll, 0 , 'linear')
      resetScroll = false;
    }

  }

  // Window events
  if (device == 'desktop') {
    $(window).resize(function () {
      if (!isCanvasSupported()) {
        viewportHeight = $(window).height();
        viewportWidth = $(window).width();
      } else {
        viewportHeight = $(window).height();
        viewportWidth = $(window).width() + scrollBarWidth;
      }
      viewportRatio = viewportWidth / viewportHeight;
      documentheight = $(document).height();
      if($('#home').length) $('#wrap').height(viewportHeight - 44);
      else $('#wrap').height('auto');
      resize();
    });
  }

  var first = true;

  // MOBILE Specifics
  if (device == 'mobile' || device == 'tablet') {

    var previousOrientation = window.orientation;
    var checkOrientation = function () {
    //console.log(window.orientation);
	    //if(device == 'tablet') $('#wrap').width('auto');
      if (window.orientation !== previousOrientation || first == true) {
        first = false;
        previousOrientation = window.orientation;
        // orientation changed, do your magic here
        if (window.orientation == 0) {

          // Portrait
          if (!isCanvasSupported()) {
            viewportHeight = $(window).height();
            viewportWidth = $(window).width();
          } else {
            viewportHeight = $(window).height();
            viewportWidth = $(window).width() + scrollBarWidth;
          }

          viewportRatio = viewportWidth / viewportHeight;

          documentheight = $(document).height();
          resize();

          if ($('#selected').length || $('#home').length) {
            //hideslideshow();
            if(device == 'mobile') showslideshow();
          }
          
          if($('#project').length || $('#journal_entry').length)
          {
	          if(device == 'mobile') {
	          	hideslideshow();
	          	$('#menublock').show();
	          }
          }

        } else if (window.orientation == 90 || window.orientation == -90) {
          // Landscape
          if (!isCanvasSupported()) {
            viewportHeight = $(window).height();
            viewportWidth = $(window).width();
          } else {
            viewportHeight = $(window).height();
            viewportWidth = $(window).width() + scrollBarWidth;
          }
        	//console.log('landscape',viewportWidth);
        	
        	

          viewportRatio = viewportWidth / viewportHeight;

          documentheight = $(document).height();
          resize();

          if ($('#project').length || $('#selected').length || $('#home').length || $('#journal_entry').length) {
            if(device == 'mobile') {
            	showslideshow();
            	if ($('#project').length || $('#journal_entry').length) $('#menublock').hide();
            }
          }

        } else {
          // Portrait
          if (!isCanvasSupported()) {
            viewportHeight = $(window).height();
            viewportWidth = $(window).width();
          } else {
            viewportHeight = $(window).height();
            viewportWidth = $(window).width() + scrollBarWidth;
          }

          viewportRatio = viewportWidth / viewportHeight;

          documentheight = $(document).height();
          resize();

          if ($('#project').length || $('#selected').length || $('#home').length) {
            //hideslideshow();
          }

        }
        
        //if(device == 'tablet') $('#wrap').width(viewportWidth);
      }
    };

    window.addEventListener("resize", checkOrientation, false);
    window.addEventListener("orientationchange", checkOrientation, false);

    // (optional) Android doesn't always fire orientationChange on 180 degree turns
    //checkOrientation();
    //setInterval(checkOrientation, 500);
    
    

  }

  $(window).ready(function () {
    init();
  });

  // Search
  function initSearch() {
  
  	$("#search-query").prop("disabled", true);
  	$.getJSON('/tags.json', function(data) {
	  	var items = [];
 
	  	$.each(data, function(key, val) {
		  	items.push('<li class="json" data-label="' + val + '"><a href="javascript:;">' + val + '</a></li>');
		});
		$('ul.suggest.tags').append(items);
		setupSearch();
		$("#search-query").prop("disabled", false);
		//console.log(items);
	});
	
	}
	
	function setupSearch()
	{
  
	var current_ids = [];
	var is_journal = $('#journal_list').length ? 1:0;
    var $search = $('#search-query');
    var $posts = $('.searchable');
    var $tags = $('ul.suggest.tags li');
    $tags.hide(); // default

    var $noResults = $('<div id="no-results">No results</div>');
    $noResults.hide();
    $('#content-col .col-inner').append($noResults);

    var catTimer = 0;
    var forceClose = false;
    var $selectedItem = false;
    var $activeList = $('ul.suggest.categories');
    var added = [];
    
    // collect id list for search exclusion
    
    if(is_journal)
    {
	    $posts.each(function()
	    {
		   current_ids.push($(this).find('.journal-post').data('id')); 
	    });
	    var exclude_ids = $.param(current_ids);
		//console.log(exclude_ids);
    }

    $search.submit(function(e)
    {
    	e.preventDefault();
    	return false;
    }).focus(function () {
    	if(device == 'tablet')
    	{
    	$('html,body').css({
        	scrollTop: 0
        	});
        	$('#menublock,#nav-col').css('position','absolute');
        	//$('#menublock,#nav-col').css('top','0px');
    	}
      $(this).parents('.nav').addClass('focus');
      $('.paginate').hide();
      $selectedItem = false;
      
      $('#menublock').css({
        'z-index': '500'
      });
      if (!$('#content .nav .close').length) {
        var $close = $('<div class="close"/>');

        $close.click(function () {
          forceClose = true;
          $('.nav').removeClass('focus');
          $posts.css('opacity', 1).show();
          $search.val('');
        }).show();
        $('#content .nav').append($close);

      }
      if ($(this).val() == '') {
        $(this).val('');
        if(device == 'mobile') $posts.hide();
        else $posts.css('opacity', 0.3);
        $('ul.suggest.categories').show();
      }
      if ($(this).hasClass('iscat')) $('ul.suggest.categories').show();
    }).keyup(function (event) {
    	
    	var key = event.which; // down 40, up 38
    	//console.log(key);
    	var $nextItem = false;
    	var clicked = false;
    	var navKey = false;
    	
    	if(key == 40)
    	{
    		event.preventDefault();
    		navKey = true;
	    	if(!$selectedItem) $nextItem = $activeList.find('li:visible:first');
	    	else $nextItem = $selectedItem.nextAll('li:visible:first');
    	} else if(key == 38)
    	{
    		event.preventDefault();
    		navKey = true;
	    	if($selectedItem)
	    	{
		    	$nextItem = $selectedItem.prevAll('li:visible:first');
	    	} else $nextItem = false;
    	} else if(key == 13 && $selectedItem)
    	{
	    	event.preventDefault();
    		navKey = true;
	    	$selectedItem.find('a').click();
	    	clicked = true;
    	} else if(key == 27)
    	{
	    	event.preventDefault();
    		navKey = true;
    		clicked = true;
    		$(this).val('').blur();
    	}
    	
    	if($nextItem && $nextItem.length)
    	{
    		console.log($nextItem.html());
	    	$nextItem.addClass('selected').siblings().removeClass('selected');
	    	$selectedItem = $nextItem;
    	} else {
	    	$activeList.find('li').removeClass('selected');
	    	$selectedItem = 0;
    	}
    	
    	if(!clicked) {
      var query = $(this).val();
      $(this).removeClass('iscat');
      if (query.length > 0 && !navKey) {
        $('ul.suggest.categories').hide();
        $activeList = $('ul.suggest.tags');
        $nextItem = 0;
        $selectedItem = 0;
        $posts.hide();
        //$('a.loaded').remove();
        $noResults.hide();
        var results = 0;
        $posts.filter('[data-tags*="' + query.toLowerCase() + '"]').css('opacity', 1).show();
        $posts.each(function () {
          if ($(this).find('h2').text().toLowerCase().indexOf(query.toLowerCase()) != -1) {
            $(this).css('opacity', 1).show();
          }
        });
        
        if(is_journal)
        	{
        		//$('a.loaded').remove();
        		//$noResults.text('Please wait...').show();
	        	$.post('/journal_search.json',{nocache:true,query:query,exclude:current_ids},function(results)
	        	{
	        		$('a.loaded').hide();
		        	if(results.length)
		        	{
			        	for(var i=0;i<results.length;i++)
			        	{
				        	var res = results[i];
				        	
				        	
				        	//if(!$('.loaded#post-' + res.id).length) {
				        	
				        	$newPost = $('<a/>');
				        	$newPost.attr('href',res.path).addClass('loaded block').attr('id','post-' + res.id).hide();
				        	
				        	$entry = $('<div class="journal-post"/>');
				        	$img = $('<div class="img-holder"/>').append('<img src="' + res.image + '" style="opacity:1"/>');
				        	$title = $('<div class="chunk title"/>');
				        	$title.append('<time>' + res.date + '</time>');
				        	$title.append('<h2>' + res.title + '</h2>');
				        	$title.append('<div class="read-more">Read more</div>');
				        	
				        	$entry.append($img, $title);
				        	$newPost.append($entry);
				        	
				        	//added.push(res.id.toString());
				        	
				        	$('a.block').last().after($newPost);
				        	
				        	$newPost.show();
				        	$noResults.hide();
				        	
				        	//}
				        	
				        	//$('<a href="' + res.path + '" class="loaded block"><div class="journal-post"></a>');
			        	}
		        	} else {
			        	//$noResults.text('No results').show();
		        	}
	        	})
        	}

        if (!$posts.filter(':visible').length) {
        	
        	
        	if(!$('a.loaded:visible').length) $noResults.text('No results').show();
        	
        	
        } else {
	        $('a.loaded').remove();
        }

        if (query.length > 1) {
          /// auto tag suggestion
          $('ul.suggest.tags').show();
          $tags.hide();
          $tags.filter('[data-label^="' + query.toLowerCase() + '"]').show();
          //console.log('Tags',$tags.filter(':visible').length);
        } else {
          $('ul.suggest.tags').hide();
          $tags.hide();
        }
      } else if(!navKey) {
        $('ul.suggest.categories').show();
        if(device == 'mobile') $posts.hide();
        else $posts.css('opacity', 0.3).show();
        
      }
      }
    }).keydown(function()
    {
    	if($(this).val().length == 0 && !$('ul.suggest.categories').is(':visible')) {
	    	$('ul.suggest.categories').show();
	    	if(device == 'mobile') $posts.hide();
	    	else $posts.css('opacity', 0.3).show();
	    	$activeList = $('ul.suggest.categories');
	    	$nextItem = 0;
	    	$selectedItem = 0;
    	}
    }).blur(function () {
      if (device != 'mobile') {
        	$('#menublock,#nav-col').css('position','fixed');
        	//$('#menublock,#nav-col').css('top','0px');
        $(this).parents('.nav').removeClass('focus');
        $activeList = $('ul.suggest.categories');
        $nextItem = 0;
        $selectedItem = 0;
        $('#menublock').css({
          'z-index': '9989'
        });
        if ($(this).val() == '') {
          $(this).removeClass('iscat');
          $posts.css('opacity', 1).show();
		  $('a.loaded').remove();
        }
        if($noResults.is(':hidden') && !$('a.loaded').length) $('.paginate').show();
        catTimer = setTimeout(function () {
          $('ul.suggest').hide();
        }, 100);
      } else {
        setTimeout(function () {
          $search.parents('.nav').removeClass('focus');
          $('#menublock').css({
            'z-index': '9989'
          });
          $('ul.suggest').hide();
          if ($search.val() == '') $posts.css('opacity', 1).show();
        }, 200);
      }
    });

    $('#search').submit(function () {
      $(this).parents('.nav').removeClass('focus');
      $('#menublock').css({
        'z-index': '9989'
      });
      if ($search.val() == '') {
        $search.removeClass('iscat');
        $posts.css('opacity', 1).show();
      }
      catTimer = setTimeout(function () {
        $('ul.suggest').hide();
      }, 100);
      $search.blur();
    })

    // category clicks
    $cats = $('.suggest.categories');
    $cats.find('li a').click(function () {
      clearTimeout(catTimer);
      var query = $(this).text();
      $search.val(query).addClass('iscat');
      $cats.hide();
      $noResults.hide();
      $posts.hide().filter('a[data-categories*="' + query + '"]').css('opacity', 1).show();
      if (!$posts.filter(':visible').length) $noResults.show();
      $(this).parents('.nav').removeClass('focus');
      $('#menublock').css({
        'z-index': '9989'
      });
    });

    $('ul.suggest.tags li a').click(function () {
      var query = $(this).text()
      $search.val(query);
      $('ul.suggest.tags').hide();
      $noResults.hide();
      $posts.hide().filter('a[data-tags*="' + query.toLowerCase() + '"]').css('opacity', 1).show();
      if (!$posts.filter(':visible').length) $noResults.show();
      $(this).parents('.nav').removeClass('focus');
      $('#menublock').css({
        'z-index': '9989'
      });
    });

  }
  
  //$( window ).orientationchange();
  //$(window).trigger('orientationchange');

});

function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}