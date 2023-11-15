<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>deearth - Admin Panel</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    <link href="{{ asset('admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/lineawesome/css/line-awesome.min.css') }}" rel="stylesheet">
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
                <li><a href="{{ url('/management/archives') }}" class="nav-link scrollto active"><i class="bx bxs-file-archive"></i> <span>ARCHIVES</span></a></li>
                <li><a href="{{ url('/management/change-password') }}" class="nav-link scrollto"><i class="bx bxs-lock-open-alt"></i> <span>CHANGE PASSWORD</span></a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" style="padding-bottom: 100px;">
        <!-- home -->
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
            <?php
            $publicationReadMore = 1;
            $chinthaerReadMore = 1;
            ?>

            <h2>ARCHIVES</h2>
            <div class="row">
                <div class="col-6">
                    <div class="tab-container">
                        <ul class="nav nav-tabs" id="myTab" style="margin-left: 10px">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-tab-id="publications" id="publications-tab" data-bs-toggle="tab" data-bs-target="#publications" type="button" role="tab" aria-selected="true">
                                    <b>PUBLICATIONS</b>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-tab-id="chinthaer" id="chinthaer-tab" data-bs-toggle="tab" data-bs-target="#chinthaer" type="button" role="tab" aria-selected="false">
                                    <b>CHINTHAER</b>
                                </button>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- <div class="col-6 text-right">
                    <button type="button" class="btn btn-all mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#AddModal">
                        Add work
                    </button>
                </div> -->
            </div>


            <div class="tab-content" style="margin-left: 10px; margin-top: 50px">

                <!-- PUBLICATIONS -->
                <div class="tab-pane fade show active" role="tabpanel" id="publications" aria-labelledby="publications-tab">

                    <!-- Add Modal -->
                    <button type="button" class="btn btn-all mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#PublicationsAddModal">
                        Add Publications
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="PublicationsAddModal" tabindex="-1" aria-labelledby="PublicationsAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="PublicationsAddModalLabel">Add Publication</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="add-publications-form" method="post" action="{{ route('add.publication') }}" class="px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <label for="order">Order</label>
                                        <input type="text" name="order" id="order" class="form-control" value="{{ $nextPublicationOrder }}" placeholder="Enter Order">
                                        <p lass="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                        <label for="name">Publication Name</label>
                                        <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Enter Publication Name">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control mb-2" placeholder="Enter Description" rows="5"></textarea>
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control mb-2" rows="5">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <td>Order</td>
                                <td>Award Name</td>
                                <td style="width: 500px;">Description</td>
                                <td>Image</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $publications as $publication)
                            <tr>
                                <td>{{ $publication->order . $publication->order_suffix }}</td>
                                <td>{{ $publication->name }}</td>
                                <td>
                                    @if($publication->description == NULL)
                                    <p></p>
                                    @else
                                    <div class="row read-more-less" data-id="100">
                                        <p class="read-toggle" data-id='{{ $publicationReadMore++ }}'>{!! nl2br($publication->description) !!}</p>
                                    </div>
                                    @endif

                                </td>
                                <td>
                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                        <div class="portfolio-wrap">
                                            <div class="portfolio-links hover01">
                                                <a href="{{ asset('storage/' . $publication->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                                    <img src="{{ asset('storage/' . $publication->image) }}" class="archive" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <!-- publications gallery -->
                                    <a href="{{ route('view.gallery', [ 'context' => 'publications', 'id' => $publication->id ]) }}" style="text-decoration: none;">
                                        <i class="bx bx-images"></i>
                                    </a>

                                    <!-- Edit Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#PublicationsEditModal_{{ $publication->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    <div class="modal fade" id="PublicationsEditModal_{{ $publication->id }}" tabindex="-1" aria-labelledby="PublicationsEditModal_{{ $publication->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="PublicationsEditModal_{{ $publication->id }}Label">Edit Publication</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="edit-publications-form" method="post" action="{{ route('edit.publication', ['id' => $publication->id]) }}" class="px-5" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <label for="order">Order</label>
                                                        <input type="text" name="order" id="order" class="form-control mb-2" value="{{ $publication->order . $publication->order_suffix }}" placeholder="Enter Publication Order">
                                                        <label for="name">Publication Name</label>
                                                        <input type="text" name="name" id="name" class="form-control mb-2" value="{{ $publication->name }}" placeholder="Enter Publication Name">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description" class="form-control mb-2" placeholder="Enter Description" rows="5">{!! nl2br($publication->description) !!}</textarea>
                                                        <label for="image">Image</label>
                                                        <input type="file" name="image" id="image" class="form-control mb-2" rows="5">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#PublicationsDeleteModal_{{ $publication->id }}">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>

                                    <div class="modal fade" id="PublicationsDeleteModal_{{ $publication->id }}" tabindex="-1" aria-labelledby="PublicationsDeleteModal_{{ $publication->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="PublicationsDeleteModal_{{ $publication->id }}Label">Delete Publication</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    delete {{ $publication->name }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                    <form id="delete-publications-form" method="post" action="{{ route('delete.publication', ['id' => $publication->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Confirm Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- END PUBLICATIONS -->

                <!-- CHINTHAER -->
                <div class="tab-pane fade" role="tabpanel" id="chinthaer" aria-labelledby="chinthaer-tab">

                    <!-- Add Modal -->
                    <button type="button" class="btn btn-all mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#ChinthaerAddModal">
                        Add Chinthaer
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="ChinthaerAddModal" tabindex="-1" aria-labelledby="ChinthaerAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ChinthaerAddModalLabel">Add Chinthaer</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="add-chinthaer-form" action="{{ route('add.chinthaer') }}" method="post" class="px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <label for="order">Order</label>
                                        <input type="text" name="order" class="form-control" value="{{ $nextChinthaerOrder }}" placeholder="Enter Order">
                                        <p lass="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Enter Name">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control mb-2" placeholder="Enter Description" rows="5"></textarea>
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control mb-2" rows="5">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <td>Order</td>
                                <td>Award Name</td>
                                <td style="width: 500px;">Description</td>
                                <td>Image</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $chinthaers as $chinthaer)
                            <tr>
                                <td>{{ $chinthaer->order . $chinthaer->order_suffix }}</td>
                                <td>{{ $chinthaer->name }}</td>
                                <td>
                                    <div class="row read-more-less" data-id="100">
                                        <p class="read-toggle" data-id='{{ $chinthaerReadMore++ }}'>{!! nl2br($chinthaer->description) !!}</p>
                                    </div>
                                </td>
                                <td><img src="{{ asset('storage/' . $chinthaer->image) }}" alt="image" class="archive"></td>
                                <td>

                                    <!-- chinthaer gallery -->
                                    <a href="{{ route('view.gallery', [ 'context' => 'chinthaer', 'id' => $chinthaer->id ]) }}" style="text-decoration: none;">
                                        <i class="bx bx-images"></i>
                                    </a>

                                    <!-- Edit Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#ChinthaerEditModal_{{ $chinthaer->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    <div class="modal fade" id="ChinthaerEditModal_{{ $chinthaer->id }}" tabindex="-1" aria-labelledby="ChinthaerEditModal_{{ $chinthaer->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="ChinthaerEditModal_{{ $chinthaer->id }}Label">Edit Chinthaer</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="edit-chinthaer-form" method="post" action="{{ route('edit.chinthaer', ['id' => $chinthaer->id]) }}" class="px-5" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <label for="order">Order</label>
                                                        <input type="text" name="order" id="order" class="form-control mb-2" value="{{ $chinthaer->order . $chinthaer->order_suffix }}" placeholder="Enter Order">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" id="name" class="form-control mb-2" value="{{ $chinthaer->name }}" placeholder="Enter chinthaer Name">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description" class="form-control mb-2" placeholder="Enter Description" rows="5">{!! nl2br($chinthaer->description) !!}</textarea>
                                                        <label for="image">Image</label>
                                                        <input type="file" name="image" id="image" class="form-control mb-2" rows="5">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#ChinthaerDeleteModal_{{ $chinthaer->id }}">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>

                                    <div class="modal fade" id="ChinthaerDeleteModal_{{ $chinthaer->id }}" tabindex="-1" aria-labelledby="ChinthaerDeleteModal_{{ $chinthaer->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="ChinthaerDeleteModal_{{ $chinthaer->id }}Label">Delete Chinthaer</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    delete {{ $chinthaer->name }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                    <form id="delete-chinthaer-form" method="post" action="{{ route('delete.chinthaer', ['id' => $chinthaer->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Confirm Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- END CHINTHAER -->

            </div>


        </div>
        <!-- home ends -->


    </section><!-- End Hero -->

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
    <script src="{{ asset('admin/js/custom-archive.js') }}"></script>
    <script src="{{ asset('admin/js/custom-logout.js') }}"></script>
    <script src="{{ asset('admin/js/read-more.js') }}"></script>

</body>

</html>