﻿<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->




<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>deearth &#8211; Nurture. Create. Belong</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <!-- For third generation iPad Retina Display -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('apple-touch-icon-144x144-precomposed.png') }}">
  <!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('apple-touch-icon-114x114-precomposed.png') }}">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('apple-touch-icon-72x72-precomposed.png') }}">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="{{ asset('apple-touch-icon-precomposed.png') }}">
  <!-- For nokia devices: -->
  <link rel="shortcut icon" href="{{ asset('apple-touch-icon.png') }}">

  <link rel="stylesheet" href="{{ asset('fonts/Univers-Next-330-Basic-Light/font.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/Pawson-Icons/icons.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/Neue-Haas-Grotesk/stylesheet.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.mobile.css') }}">

  <!--[if lte IE 7]>  
      <link rel="stylesheet" href="/css/ie7.css"> 
    <![endif]-->

  <link rel="stylesheet" href="{{ asset('css/retina.css') }}">

  <script>
    var baseurl = "http://" + window.location.host;
  </script>


</head>

<body>

  <info></info>

  <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

  <div id="partialblock" style="position:fixed;left:0;top:0;width:100%;height:100%;z-index: 9980;background:#fff;">&nbsp;</div>


  <div id="menublock">
    <div id="menublock-margin">
      <div class="col-inner lh-adjust">

        <div class="relative">
          <h1><a href="{{ url('/') }}"><img src="{{ asset('img/logo.svg') }}" width="180" height="35"></a></h1>

          <div class="nav">
            <ul>


              <!--<a  href="index.html">Home</a>-->

              <a href="{{ url('homes') }}">Works</a>


              <a href="{{ url('aboutus') }}">Office</a>


              <a href="{{ url('publications') }}">Archives</a>




            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div id="menublocksocial">
    <div id="">
      <div class="">

        <!--<div class="relative">
            <a href="https://www.facebook.com/profile.php?id=100044406168884" target="_blank"><img src="img/fb.png"></a>
			<a href="https://www.instagram.com/de_earth_architects/" target="_blank"><img src="img/insta.png"></a>
			<a href="https://www.youtube.com/channel/UCAFy-1B7N2uSlh2IkImec2A" target="_blank"><img src="img/youtu.png"></a>
			<a href="https://www.linkedin.com/company/de-earth" target="_blank"><img src="img/linkd.png"></a>
            
          </div>-->

      </div>
    </div>
  </div>

  <div id="wrap">


    <div id="content">
      <!-- Section -->
      <div id="section" class="section">
        <div id="nav-col" class="supercol col col-f-165 menumargintop">
          <div class="col-inner lh-adjust">
            <!--<br><br>
        
          <a href="office.html" ><span class="icons">A</span> Office</a>
		  -->
            <div class="nav">
              <ul>
                <a href="{{ url('aboutus') }}">ABOUT US</a>
                <a href="{{ url('awards') }}">AWARDS</a>
                <a href="{{ url('people') }}" class="marked">PEOPLE</a>
                <a href="{{ url('contact') }}">CONTACT</a>
              </ul>
            </div>

          </div>
        </div>
        <div id="content-col" class="supercol col right col-f-537">
          <div class="col-inner lh-adjust">

            <h4 class="mb10 mt20">PEOPLE</h4>

            <ul class="team-members-list" data-fx="1">

              @foreach ($people as $person)
              <li class="link has-hover-image" data-img="img/team/vivek.png">

                <div class="team-member has-animation tooltip">
                  <div id="showmenu{{ $person->id }}">
                    {{ $person->name }}
                    @if ( $person->name == 'Ar.VIVEK.PP' )
                    <br>Architect, Urban designer
                    @elseif($person->name == 'Ar.NISHAN.M')
                    <br>Principal Architect
                    @endif
                  </div>
                  <span>{{ $person->designation }}</span>
                </div>

                <div class="menu{{ $person->id }} mt20 imgwidth" style="display: none;"><img src="{{('storage/' . $person->profile)}}"> </div>

              </li>
              @endforeach
            </ul>


          </div>
        </div>
        <div id="dynamic">&nbsp;</div>
      </div>
    </div>
    <!-- /content -->

  </div>

  <script src="{{ asset('ajax/libs/jquery/1.9.0/jquery.min.js') }}"></script>
  <script>
    window.jQuery || document.write('<script src="{{ asset("js/vendor/jquery-1.9.0.min.js") }}"><\/script>')
  </script>

  <!--[if !IE]> -->
  <script src="{{ asset('js/jquery.history.js') }}"></script>
  <!-- <![endif]-->
  <!--[if gte IE 9]>
    <script src="js/jquery.history.js"></script>
    <![endif]-->

  <script src="{{ asset('js/plugins.js') }}"></script>
  <script src="{{ asset('js/main.new.js') }}"></script>

  <!-- Analytics -->
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-41879787-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script');
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(ga, s);
    })();
  </script>

  @foreach ($people as $person)
  <script type="text/javascript">
    $(document).ready(function() {
      $('#showmenu{{ $person->id }}').click(function() {
        $('.menu{{ $person->id }}').toggle("slide");
      });
    });
  </script>
  @endforeach



</body>

</html>