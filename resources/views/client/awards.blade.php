<!DOCTYPE html>
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

<body id="default" class="desktop">

  <info id="default" class="desktop"></info>

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
        
          <a href="office.html" ><span class="icons">A</span> Office</a>-->

            <div class="nav">
              <ul>
                <a href="{{ url('aboutus') }}">ABOUT US</a>
                <a href="{{ url('awards') }}" class="marked">AWARDS</a>
                <a href="{{ url('people') }}">PEOPLE</a>
                <a href="{{ url('contact') }}">CONTACT</a>
              </ul>
            </div>

          </div>
        </div>
        <div id="content-col" class="supercol col right col-f-537">
          <div class="col-inner lh-adjust">
            <div class="page-post">
              <div class="chunk page-body editable">

                <h4 class="mb10">AWARDS</h4>

                @foreach ($awards as $award)
                <h4 class="mb10 mt10 curspointer" id="showmenu{{$award->id}}">{{ $award->name }}</h4>

                <h3>{{ $award->description }}</h3>

                <div class="menu{{$award->id}} mt20 mb20 imgwidth100" style="display: none;"><img src="{{ asset('storage/' . $award->image)}}"> </div>

                @endforeach

                <!-- <h4 class="mb10 mt10 curspointer" id="showmenu2">ACE ALPHA - ACE ARCHITECT 2017 AWARD</h4>

                <h3>ACE ALPHA – ACE ARCHITECT 2017 AWARD for the <strong>BEST RESIDENCE</strong>(mid segment) <strong>in India</strong></h3>

                <div class="menu2 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu3">NDTV DAA national awards for excellence in architecture 2016</h4>

                <h3><strong>NDTV DAA</strong> national awards for excellence in architecture 2016, commendation in <strong>Heritage architecture</strong>- Adaptive re use category</h3>

                <div class="menu3 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu4">10 best practices in India 2016</h4>

                <h3>Shortlisted among <strong>10 best practices in India 2016</strong> by Trendz Havells Awards.</h3>

                <div class="menu4 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu5">Gold Leaf Award 2016 in IIA Kerala Chapter</h4>

                <h3><strong>Gold Leaf Award 2016</strong> in IIA Kerala Chapter Awards for Excellence in Architecture</h3>

                <div class="menu5 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu6">Mathrubhumi Mastercraft Awards</h4>

                <h3>Commendation in <strong>Mathrubhumi Mastercraft Awards</strong> in re-modelled house category</h3>

                <div class="menu6 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu7">HOT 100 architects and designers in India</h4>

                <h3>Featured among <strong>HOT 100 architects and designers in India</strong> , by Architecture + Interiors Magazine in their 100th edition</h3>

                <div class="menu7 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu8">IIID Design Excellence Award 2015</h4>

                <h3><strong>IIID Design Excellence Award 2015</strong> for Hospitality sector, India South Zone</h3>

                <div class="menu8 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu9">One among top 50 architects and designers
                  2015</h4>

                <h3><strong>One among top 50 architects and designers</strong> who made it to the i Gen 2015 hotlist, architecture + Interiors magazine, ITP india.</h3>

                <div class="menu9 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu10">IIA Crossroads Most Popular project in Un-built category
                  2014</h4>

                <h3><strong>IIA Crossroads Most Popular project in Un-built category</strong> Award 2014</h3>

                <div class="menu10 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu11">Best Young Architect Award 2014</h4>

                <h3>Malayala Manorama <strong>Best Young Architect Award 2014</strong></h3>

                <div class="menu11 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu12">IIA Kerala Chapter Silver leaf Award 2013</h4>

                <h3>Asian paints <strong>IIA Kerala Chapter Silver leaf Award</strong>: Best residence unbuilt 2013</h3>

                <div class="menu12 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu13">Best Young Architect Award 2012</h4>

                <h3>Malayala Manorama <strong>Best Young Architect Award 2012</strong></h3>

                <div class="menu13 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu14">Young Architect Award 2010</h4>

                <h3><strong>Young Architect Award</strong> of Designer Plus Builder Magazine 2010</h3>

                <div class="menu14 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu15">Young Architect Award 2009-11</h4>

                <h3><strong>Young Architect Award</strong> of Malayala Manorama Parpidam 2009-11</h3>

                <div class="menu15 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu16">Best Home Design Award 2009-10</h4>

                <h3><strong>Best Home Design Award</strong> of Malayala Manorama Parpidam 2009-10</h3>

                <div class="menu16 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>

                <h4 class="mb10 mt10 curspointer" id="showmenu17">IIA Calicut Centre competition winner 2007</h4>

                <h3>IIA Calicut Centre office building <strong>competition winner</strong> 2007</h3>

                <div class="menu17 mt20 mb20 imgwidth100" style="display: none;"><img src="img/awards.png"> </div>
 -->



              </div>
            </div>
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

  @foreach ($awards as $award)
  <script type="text/javascript">
    $(document).ready(function() {
      $('#showmenu{{ $award->id }}').click(function() {
        $('.menu{{ $award->id }}').toggle("slide");
      });
    });
  </script>
  @endforeach

</body>

</html>