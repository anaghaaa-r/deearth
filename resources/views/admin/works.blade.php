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
            <h1><a href="{{ url('/management/dashboard') }}"><img src="{{ asset('img/logo.svg') }}" width="130" height="35"></a></h1>
        </div>

        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="{{ url('/management/dashboard') }}" class="nav-link scrollto"><i class="bx bxs-home"></i> <span>HOME</span></a></li>
                <li><a href="{{ url('/management/works') }}" class="nav-link scrollto active"><i class="bx bxs-building-house"></i> <span>WORKS</span></a></li>
                <li><a href="{{ url('/management/office') }}" class="nav-link scrollto"><i class="bx bxs-briefcase"></i> <span>OFFICE</span></a></li>
                <li><a href="{{ url('/management/archives') }}" class="nav-link scrollto"><i class="bx bxs-file-archive"></i> <span>ARCHIVES</span></a></li>
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



            <h2>WORKS </h2>
            <div class="row">
                <div class="col-6">
                    <div class="tab-container">
                        <ul class="nav nav-tabs" id="myTab" style="margin-left: 10px">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-tab-id="homes" id="homes-tab" data-bs-toggle="tab" data-bs-target="#homes" type="button" role="tab" aria-selected="true">
                                    <b>HOMES</b>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-tab-id="urbandesign" id="urbandesign-tab" data-bs-toggle="tab" data-bs-target="#urbandesign" type="button" role="tab" aria-selected="false">
                                    <b>URBAN DESIGN</b>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-tab-id="institution" id="institution-tab" data-bs-toggle="tab" data-bs-target="#institution" type="button" role="tab" aria-selected="false">
                                    <b>INSTITUTION</b>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-tab-id="commercial" id="commercial-tab" data-bs-toggle="tab" data-bs-target="#commercial" type="button" role="tab" aria-selected="false">
                                    <b>COMMERCIAL</b>
                                </button>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>




            <div class="tab-content" style="margin-left: 10px; margin-top: 50px">

                <!-- HOMES -->
                <div class="tab-pane fade show active" role="tabpanel" id="homes" aria-labelledby="homes-tab">

                    <!-- Add Modal -->
                    <button type="button" class="btn btn-all mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#HomesAddModal">
                        Add work
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="HomesAddModal" tabindex="-1" aria-labelledby="HomesAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="HomesAddModalLabel">Add a Work</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="add-homes-form" method="post" action="{{ route('add.homes') }}" class="px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <label for="order">Order</label>
                                        <input type="text" name="order" id="order" class="form-control" value="{{ $nextHomeOrder }}" placeholder="Enter Order">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control mb-2" placeholder="Enter Title">
                                        <label for="place">Place</label>
                                        <textarea name="place" id="place" class="form-control mb-2" placeholder="Enter Place" rows="3"></textarea>
                                        <label for="year">Year</label>
                                        <input type="text" name="year" id="year" class="form-control mb-2" placeholder="Enter Year">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control mb-2" placeholder="Enter Description" rows="5"></textarea>
                                        <label for="monogram">Monogram</label>
                                        <input type="file" name="monogram" id="monogram" class="form-control">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*monogram dimension should be 69px X 64px</p>
                                        <label for="thumbnail">Thumbnail Image</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*thumbnail dimension should be 404px X 270px</p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table class="table" id="list-table">
                        <thead>
                            <tr>
                                <td>Order</td>
                                <td style="width: 150px;">Title</td>
                                <td style="width: 100px;">Place</td>
                                <td>Year</td>
                                <td style="width: 350px;">Description</td>
                                <td>Monogram</td>
                                <td>Thumbnail</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $homes as $home)
                            <tr>
                                <td>{{ $home->order . $home->order_suffix }}</td>
                                <td>{{ $home->title }}</td>
                                <td>{{ $home->place }}</td>
                                <td>{{ $home->year }}</td>
                                <td>
                                    <div class="row read-more-less" data-id="100">
                                        <p class="read-toggle" data-id='{{ $home->title }}'>{!! nl2br($home->description) !!}</p>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $home->monogram) }}" alt="monogram" class="monogram">
                                </td>
                                <td>

                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                        <div class="portfolio-wrap">
                                            <div class="portfolio-links hover01">
                                                <a href="{{ asset('storage/' . $home->thumbnail) }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                                    <img src="{{ asset('storage/' . $home->thumbnail) }}" class="thumbnail" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>

                                    <a href="{{ route('view.gallery', [ 'context' => 'home', 'id' => $home->id ]) }}" style="text-decoration: none;">
                                        <i class="bx bx-images"></i>
                                    </a>

                                    <!-- Edit Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#HomesEditModal_{{ $home->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    <div class="modal fade" id="HomesEditModal_{{ $home->id }}" tabindex="-1" aria-labelledby="HomesEditModal_{{ $home->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="HomesEditModal_{{ $home->id }}Label">Edit Work</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="edit-homes-form" method="post" action="{{ route('edit.home', [ 'id' => $home->id ]) }}" class="px-5" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <label for="order">Order</label>
                                                        <input type="text" name="order" id="order" class="form-control mb-2" value="{{ $home->order . $home->order_suffix }}">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control mb-2" value="{{ $home->title }}">
                                                        <label for="place">Place</label>
                                                        <textarea name="place" id="" rows="3" class="form-control mb-2">{{ $home->place }}</textarea>
                                                        <label for="year">Year</label>
                                                        <input type="text" name="year" id="year" class="form-control mb-2" value="{{ $home->year }}">
                                                        <label>Description</label>
                                                        <textarea name="description" class="form-control mb-2" rows="5">{!! nl2br($home->description) !!}</textarea>
                                                        <label for="monogram">Monogram</label>
                                                        <input type="file" name="monogram" id="monogram" class="form-control">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*monogram dimension should be 69px X 64px</p>
                                                        <label for="thumbnail">Thumbnail</label>
                                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*thumbnail dimension should be 404px X 270px</p>

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
                                    <a data-bs-toggle="modal" data-bs-target="#HomesDeleteModal_{{ $home->id }}">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="HomesDeleteModal_{{ $home->id }}" tabindex="-1" aria-labelledby="HomesDeleteModal_{{ $home->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="HomesDeleteModal_{{ $home->id }}Label">Delete a Work</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Delete {{ $home->title }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                    <form id="delete-homes-form" method="post" action="{{ route('delete.home', [ 'id' => $home->id ]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Delete Work</button>
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
                <!-- END HOMES -->

                <!-- URBAN DESIGNS -->
                <div class="tab-pane fade" role="tabpanel" id="urbandesign" aria-labelledby="urbandesign-tab">

                    <!-- Add Modal -->
                    <button type="button" class="btn btn-all mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#UrbanDesignAddModal">
                        Add work
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="UrbanDesignAddModal" tabindex="-1" aria-labelledby="UrbanDesignAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="UrbanDesignAddModalLabel">Add a Work</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="add-urbandesign-form" method="post" action="{{ route('add.urbandesigns') }}" class="px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <label for="order">Order</label>
                                        <input type="text" name="order" id="order" class="form-control" value="{{ $nextUrbanDesignOrder }}" placeholder="Enter Order">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control mb-2" placeholder="Enter Title">
                                        <label for="place">Place</label>
                                        <textarea name="place" id="placce" class="form-control mb-2" placeholder="Enter Place" rows="3"></textarea>
                                        <label for="year">Year</label>
                                        <input type="text" id="year" name="year" class="form-control mb-2" placeholder="Enter Year">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control mb-2" placeholder="Enter Description" rows="5"></textarea>
                                        <label for="monogram">Monogram</label>
                                        <input type="file" name="monogram" id="monogram" class="form-control">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*monogram dimension should be 69px X 64px</p>
                                        <label for="thumbnail">Thumbnail Image</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*thumbnail dimension should be 512px X 240px</p>

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
                                <td style="width: 150px;">Title</td>
                                <td style="width: 100px;">place</td>
                                <td>Year</td>
                                <td style="width: 350px;">Description</td>
                                <td>Monogram</td>
                                <td>Thumbnail</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $urbandesigns as $urbandesign)
                            <tr>
                                <td>{{ $urbandesign->order . $urbandesign->order_suffix }}</td>
                                <td>{{ $urbandesign->title }}</td>
                                <td>{{ $urbandesign->place }}</td>
                                <td>{{ $urbandesign->year }}</td>
                                <td>
                                    <div class="row read-more-less" data-id="100">
                                        <p class="read-toggle" data-id='{{ $urbandesign->title }}'>{!! nl2br($urbandesign->description) !!}</p>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $urbandesign->monogram) }}" alt="monogram" class="monogram">
                                </td>
                                <td>

                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                        <div class="portfolio-wrap">
                                            <div class="portfolio-links hover01">
                                                <a href="{{ asset('storage/' . $urbandesign->thumbnail) }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                                    <img src="{{ asset('storage/' . $urbandesign->thumbnail) }}" class="thumbnail" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>

                                    <a href="{{ route('view.gallery', [ 'context' => 'urbandesign', 'id' => $urbandesign->id ]) }}" style="text-decoration: none;">
                                        <i class="bx bx-images"></i>
                                    </a>

                                    <!-- Edit Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#UrbanDesignEditModal_{{ $urbandesign->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    <div class="modal fade" id="UrbanDesignEditModal_{{ $urbandesign->id }}" tabindex="-1" aria-labelledby="UrbanDesignEditModal_{{ $urbandesign->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="UrbanDesignEditModal_{{ $urbandesign->id }}Label">Edit Work</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="edit-urbandesign-form" method="post" action="{{ route('edit.urbandesign', [ 'id' => $urbandesign->id ]) }}" class="px-5" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <label for="order">Order</label>
                                                        <input type="text" name="order" id="order" class="form-control mb-2" value="{{ $urbandesign->order . $urbandesign->order_suffix }}">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control mb-2" value="{{ $urbandesign->title }}">
                                                        <label for="place">Place</label>
                                                        <textarea name="place" id="" rows="3" class="form-control mb-2">{{ $urbandesign->place }}</textarea>
                                                        <label for="year">Year</label>
                                                        <input type="text" name="year" id="year" class="form-control mb-2" value="{{ $urbandesign->year }}">
                                                        <label>Description</label>
                                                        <textarea name="description" class="form-control mb-2" rows="5">{!! nl2br($urbandesign->description) !!}</textarea>
                                                        <label for="monogram">Monogram</label>
                                                        <input type="file" name="monogram" id="monogram" class="form-control">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*monogram dimension should be 69px X 64px</p>
                                                        <label for="thumbnail">Thumbnail</label>
                                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*thumbnail dimension should be 512px X 240px</p>

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
                                    <a data-bs-toggle="modal" data-bs-target="#UrbanDesignDeleteModal_{{ $urbandesign->id }}">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="UrbanDesignDeleteModal_{{ $urbandesign->id }}" tabindex="-1" aria-labelledby="UrbanDesignDeleteModal_{{ $urbandesign->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="UrbanDesignDeleteModal_{{ $urbandesign->id }}Label">Delete Work</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    delete {{ $urbandesign->title }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                    <form id="delete-urbandesign-form" method="post" action="{{ route('delete.urbandesign', [ 'id' => $urbandesign->id ]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Delete Work</button>
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
                <!-- END URBAN DESIGNS -->

                <!-- INSTITUTION -->
                <div class="tab-pane fade" id="institution" role="tabpanel" aria-labelledby="institution-tab">

                    <!-- Add Modal -->
                    <button type="button" class="btn btn-all mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#InstitutionAddModal">
                        Add work
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="InstitutionAddModal" tabindex="-1" aria-labelledby="InstitutionAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="InstitutionAddModalLabel">Add a Work</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="add-institution-form" method="post" action="{{ route('add.institutions') }}" class="px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <label for="order">Order</label>
                                        <input type="text" name="order" id="order" class="form-control" value="{{ $nextInstitutionOrder }}" placeholder="Enter Order">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control mb-2" placeholder="Enter Title">
                                        <label for="place">Place</label>
                                        <textarea name="place" id="place" class="form-control mb-2" placeholder="Enter Place" rows="3"></textarea>
                                        <label for="year">Year</label>
                                        <input type="text" name="year" id="year" class="form-control mb-2" placeholder="Enter Year">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control mb-2" placeholder="Enter Description" rows="5"></textarea>
                                        <label for="monogram">Monogram</label>
                                        <input type="file" name="monogram" id="monogram" class="form-control">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*monogram dimension should be 69px X 64px</p>
                                        <label for="thumbnail">Thumbnail Image</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*thumbnail dimension should be 512px X 240px</p>

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
                                <td style="width: 150px;">Title</td>
                                <td style="width: 100px;">Place</td>
                                <td>Year</td>
                                <td style="width: 350px;">Description</td>
                                <td>Monogram</td>
                                <td>Thumbnail</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $institutions as $institution)
                            <tr>
                                <td>{{ $institution->order . $institution->order_suffix }}</td>
                                <td>{{ $institution->title }}</td>
                                <td>{{ $institution->place }}</td>
                                <td>{{ $institution->year }}</td>
                                <td>
                                    <div class="row read-more-less" data-id="100">
                                        <p class="read-toggle" data-id='{{ $institution->title }}'>{!! nl2br($institution->description) !!}</p>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $institution->monogram) }}" alt="monogram" class="monogram">
                                </td>
                                <td>

                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                        <div class="portfolio-wrap">
                                            <div class="portfolio-links hover01">
                                                <a href="{{ asset('storage/' . $institution->thumbnail) }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                                    <img src="{{ asset('storage/' . $institution->thumbnail) }}" class="thumbnail" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>

                                    <a href="{{ route('view.gallery', [ 'context' => 'institution', 'id' => $institution->id ]) }}" style="text-decoration: none;">
                                        <i class="bx bx-images"></i>
                                    </a>

                                    <!-- Edit Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#InstitutionEditModal_{{ $institution->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    <div class="modal fade" id="InstitutionEditModal_{{ $institution->id }}" tabindex="-1" aria-labelledby="InstitutionEditModal_{{ $institution->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="InstitutionEditModal_{{ $institution->id }}Label">Edit Work</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="edit-institution-form" method="post" action="{{ route('edit.institution', [ 'id' => $institution->id]) }}" class="px-5" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <label for="order">Order</label>
                                                        <input type="text" name="order" id="order" class="form-control mb-2" value="{{ $institution->order . $institution->order_suffix }}">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control mb-2" value="{{ $institution->title }}">
                                                        <label for="place">Place</label>
                                                        <textarea name="place" id="" rows="3" class="form-control mb-2">{{ $institution->place }}</textarea>
                                                        <label for="year">Year</label>
                                                        <input type="text" name="year" id="year" class="form-control mb-2" value="{{ $institution->year }}">
                                                        <label>Description</label>
                                                        <textarea name="description" class="form-control mb-2" rows="5">{!! nl2br($institution->description) !!}</textarea>
                                                        <label for="monogram">Monogram</label>
                                                        <input type="file" name="monogram" id="monogram" class="form-control">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*monogram dimension should be 69px X 64px</p>
                                                        <label for="thumbnail">Thumbnail</label>
                                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*thumbnail dimension should be 512px X 240px</p>

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
                                    <a data-bs-toggle="modal" data-bs-target="#InstitutionDeleteModal_{{ $institution->id }}">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="InstitutionDeleteModal_{{ $institution->id }}" tabindex="-1" aria-labelledby="InstitutionDeleteModal_{{ $institution->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="InstitutionDeleteModal_{{ $institution->id }}Label">Delete Work</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    delete {{ $institution->title }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                    <form id="delete-institution-form" method="post" action="{{ route('delete.institution', [ 'id' => $institution->id ]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Delete Work</button>
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
                <!-- END INSTITUTION -->

                <!-- COMMERCIAL -->
                <div class="tab-pane fade" id="commercial" role="tabpanel" aria-labelledby="commercial-tab">

                    <!-- AddModal -->
                    <button type="button" class="btn btn-all mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#CommercialAddModal">
                        Add work
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="CommercialAddModal" tabindex="-1" aria-labelledby="CommercialAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="CommercialAddModalLabel">Add a Work</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="add-commercial-form" method="post" action="{{ route('add.commercials') }}" class="px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <label for="order">Order</label>
                                        <input type="text" name="order" id="order" class="form-control" value="{{ $nextCommercialOrder }}" placeholder="Enter Order">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control mb-2" placeholder="Enter Title">
                                        <label for="place">Place</label>
                                        <textarea name="place" id="place" class="form-control mb-2" placeholder="Enter Place" rows="3"></textarea>
                                        <label for="year">Year</label>
                                        <input type="text" name="year" id="year" class="form-control mb-2" placeholder="Enter Year">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control mb-2" placeholder="Enter Description" rows="5"></textarea>
                                        <label for="monogram">Monogram</label>
                                        <input type="file" name="monogram" id="monogram" class="form-control">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*monogram dimension should be 69px X 64px</p>
                                        <label id="thumbnail">Thumbnail Image</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*thumbnail dimension should be 512px X 240px</p>

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
                                <td style="width: 150px;">Title</td>
                                <td style="width: 100px;">Place</td>
                                <td>Year</td>
                                <td style="width: 350px;">Description</td>
                                <td>Monogram</td>
                                <td>Thumbnail</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $commercials as $commercial)
                            <tr>
                                <td>{{ $commercial->order . $commercial->order_suffix }}</td>
                                <td>{{ $commercial->title }}</td>
                                <td>{{ $commercial->place }}</td>
                                <td>{{ $commercial->year }}</td>
                                <td>
                                    <div class="row read-more-less" data-id="100">
                                        <p class="read-toggle" data-id='{{ $commercial->title }}'>{!! nl2br($commercial->description) !!}</p>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $commercial->monogram) }}" alt="monogram" class="monogram">
                                </td>
                                <td>

                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                        <div class="portfolio-wrap">
                                            <div class="portfolio-links hover01">
                                                <a href="{{ asset('storage/' . $commercial->thumbnail) }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                                    <img src="{{ asset('storage/' . $commercial->thumbnail) }}" class="thumbnail" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>

                                    <a href="{{ route('view.gallery', [ 'context' => 'commercial', 'id' => $commercial->id ]) }}" style="text-decoration: none;">
                                        <i class="bx bx-images"></i>
                                    </a>

                                    <!-- Edit Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#CommercialEditModal_{{ $commercial->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    <div class="modal fade" id="CommercialEditModal_{{ $commercial->id }}" tabindex="-1" aria-labelledby="CommercialEditModal_{{ $commercial->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="CommercialEditModal_{{ $commercial->id }}Label">Edit Work</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="edit-commercial-form" method="post" action="{{ route('edit.commercial', [ 'id' => $commercial->id]) }}" class="px-5" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <label for="order">Order</label>
                                                        <input type="text" name="order" id="order" class="form-control mb-2" value="{{ $commercial->order . $commercial->order_suffix }}">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control mb-2" value="{{ $commercial->title }}">
                                                        <label for="place">Place</label>
                                                        <textarea name="place" id="" rows="3" class="form-control mb-2">{{ $commercial->place }}</textarea>
                                                        <label for="year">Year</label>
                                                        <input type="text" name="year" id="year" class="form-control mb-2" value="{{ $commercial->year }}">
                                                        <label>Description</label>
                                                        <textarea name="description" class="form-control mb-2" rows="5">{!! nl2br($commercial->description) !!}</textarea>
                                                        <label for="monogram">Monogram</label>
                                                        <input type="file" name="monogram" id="monogram" class="form-control">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*monogram dimension should be 69px X 64px</p>
                                                        <label for="thumbnail">Thumbnail</label>
                                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                                        <p class="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*thumbnail dimension should be 512px X 240px</p>

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
                                    <a data-bs-toggle="modal" data-bs-target="#CommercialDeleteModal_{{ $commercial->id }}">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="CommercialDeleteModal_{{ $commercial->id }}" tabindex="-1" aria-labelledby="CommercialDeleteModal_{{ $commercial->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="CommercialDeleteModal_{{ $commercial->id }}Label">Delete Work</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    delete {{ $commercial->title }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                    <form id="delete-commercial-form" method="post" action="{{ route('delete.commercial', [ 'id' => $commercial->id ]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-all" data-bs-dismiss="modal">Delete Work</button>
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
                <!-- END COMMERCIAL -->
            </div>


        </div>
        <!-- home ends -->


    </section>
    <!-- End Hero -->

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

    <!-- <script>
        function confirmDelete() {
            if (confirm("Are you sure you want to delete this institution?")) {
                // The user clicked "OK" in the confirmation dialog.
                // Submit the form to delete the institution.
                return true;
            } else {
                // The user clicked "Cancel" in the confirmation dialog.
                // You can display a message or take other actions here.
                alert("Deletion canceled.");
                return false; // Prevent the form submission.
            }
        }
    </script> -->

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
    <script src="{{ asset('admin/js/custom-works.js') }}"></script>
    <script src="{{ asset('admin/js/custom-logout.js') }}"></script>
    <script src="{{ asset('admin/js/read-more.js') }}"></script>

</body>

</html>