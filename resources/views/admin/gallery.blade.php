<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>De Earth Admin Panel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('favicon.ico') }}" rel="icon">
  <link href="{{ asset('apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <div class="logo">
      <h1><a href="{{ route('dashboard') }}"><img src="{{ asset('img/logo.svg') }}" width="130" height="35"></a></h1>
    </div>

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="{{ url('/management/dashboard') }}" class="nav-link scrollto"><i class="bx bxs-home"></i> <span>HOME</span></a></li>
        <li><a href="{{ url('/management/works') }}" class="nav-link scrollto"><i class="bx bxs-building-house"></i> <span>WORKS</span></a></li>
        <li><a href="{{ url('/management/office') }}" class="nav-link scrollto"><i class="bx bxs-briefcase"></i> <span>OFFICE</span></a></li>
        <li><a href="{{ url('/management/archives') }}" class="nav-link scrollto"><i class="bx bxs-file-archive"></i> <span>ARCHIVES</span></a></li>
        <li><a href="{{ url('/management/change-password') }}" class="nav-link scrollto"><i class="bx bxs-lock-open-alt"></i> <span>CHANGE PASSWORD</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <section id="hero" style="padding-bottom: 100px;">

    <div class="main_body">

      <!-- Logout Modal -->
      <div class="text-end">
        <button class="btn logout-button" data-bs-toggle="modal" data-bs-target="#LogOutModal">
          <i class="las la-power-off"></i>
        </button>
      </div>

      <!-- Logout Modal -->
      <div class="modal fade" id="LogOutModal" tabindex="-1" aria-labelledby="LogOutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to logout ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
              <form method="post" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-all" data-bs-dismiss="modal">LogOut</button>
              </form>
            </div>
          </div>
        </div>
      </div>


      @if ($context === 'home')


      <h3>Homes Gallery</h3>
      <h4><b>{{ $model->title }}</b></h4>

      <form id="add-{{ $context }}-form" method="post" action="{{ route('add.' . $context . '.image', ['id' => $model['id']]) }}" enctype="multipart/form-data">
        @csrf
        <label>Image</label>
        <input type="file" class="form-control mb-3 mt-2" name="images[]" multiple>
        <button type="submit" class="btn btn-all">Add Image</button>
      </form>

      @elseif ($context === 'urbandesign')

      <h3>Urban Designs Gallery</h3>

      <form id="add-{{ $context }}-form" method="post" action="{{ route('add.' . $context . '.image', ['id' => $model['id']]) }}" enctype="multipart/form-data">
        @csrf
        <label>Image</label>
        <input type="file" class="form-control mb-3 mt-2" name="images[]" multiple>
        <button type="submit" class="btn btn-all">Add Image</button>
      </form>

      @elseif ($context === 'institution')

      <h3>Institutions Gallery</h3>

      <form id="add-{{ $context }}-form" method="post" action="{{ route('add.' . $context . '.image', ['id' => $model['id']]) }}" enctype="multipart/form-data">
        @csrf
        <label>Image</label>
        <input type="file" class="form-control mb-3 mt-2" name="images[]" multiple>
        <button type="submit" class="btn btn-all">Add Image</button>
      </form>

      @elseif ($context === 'commercial')

      <h3>Commercials Gallery</h3>

      <form id="add-{{ $context }}-form" method="post" action="{{ route('add.' . $context . '.image', ['id' => $model['id']]) }}" enctype="multipart/form-data">
        @csrf
        <label>Image</label>
        <input type="file" class="form-control mb-3 mt-2" name="images[]" multiple>
        <button type="submit" class="btn btn-all">Add Image</button>
      </form>
      
       @elseif ($context === 'publications')

      <h3>Publication Gallery</h3>

      <form id="add-{{ $context }}-form" method="post" action="{{ route('add.' . $context . '.image', ['id' => $model['id']]) }}" enctype="multipart/form-data">
        @csrf
        <label>Image</label>
        <input type="file" class="form-control mb-3 mt-2" name="images[]" multiple>
        <button type="submit" class="btn btn-all">Add Image</button>
      </form>

      @elseif ($context === 'chinthaer')

      <h3>Chinthaer Gallery</h3>

      <form id="add-{{ $context }}-form" method="post" action="{{ route('add.' . $context . '.image', ['id' => $model['id']]) }}" enctype="multipart/form-data">
        @csrf
        <label>Image</label>
        <input type="file" class="form-control mb-3 mt-2" name="images[]" multiple>
        <button type="submit" class="btn btn-all">Add Image</button>
      </form>

      @endif 



      <section id="portfolio" class="portfolio section-bg">
        <div class="container mt-4">
          <div class="row portfolio-container" data-aos-delay="200">
            @foreach ($gallery as $image)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid" alt="">
                <div class="portfolio-info">

                  <div class="portfolio-links">
                    <a data-bs-toggle="modal" data-bs-target="#DeleteModal_{{ $image['id'] }}">
                      <i class="las la-trash-alt" style="font-size: 40px; color: black;"></i>
                    </a>
                    <a href="{{ asset('storage/' . $image->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                      <i class="las la-plus" style="font-size: 40px; color: black;"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="DeleteModal_{{ $image['id'] }}" tabindex="-1" aria-labelledby="DeleteModal_{{ $image['id'] }}Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Delete Image ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <form id="delete-form" method="post" action="{{ route('delete.' . $context . '.image', ['id' => $image['id']]) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Delete Image</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            @endforeach

          </div>

        </div>
      </section>






    </div>
  </section>



  <footer id="footer" class="fixed-bottom">
    <div class="container">
      <div class="credits">
        Powered by <a href="https://coperor.in/" target="_blank">Coperor</a>
        <span class="version">Ver 2.0</span>
      </div>
    </div>
  </footer>


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/typed.js/typed.umd.js') }}"></script>
  <script src="{{ asset('admin/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('admin/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('admin/js/main.js') }}"></script>
  <script src="{{ asset('admin/js/custom-gallery.js') }}"></script>
  <script src="{{ asset('admin/js/custom-logout.js') }}"></script>


</body>

</html>