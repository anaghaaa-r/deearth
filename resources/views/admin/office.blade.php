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
                <li><a href="{{ url('/management/office') }}" class="nav-link scrollto  active"><i class="bx bxs-briefcase"></i> <span>OFFICE</span></a></li>
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


            <h2>OFFICE</h2>
            <div class="row">
                <div class="col-6">
                    <div class="tab-container">
                        <ul class="nav nav-tabs" id="myTab" style="margin-left: 10px">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-tab-id="aboutus" id="aboutus-tab" data-bs-toggle="tab" data-bs-target="#aboutus" type="button" role="tab" aria-selected="true">
                                    <b>ABOUT US</b>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-tab-id="awards" id="awards-tab" data-bs-toggle="tab" data-bs-target="#awards" type="button" role="tab" aria-selected="false">
                                    <b>AWARDS</b>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-tab-id="people" id="people-tab" data-bs-toggle="tab" data-bs-target="#people" type="button" role="tab" aria-selected="false">
                                    <b>PEOPLE</b>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-tab-id="contact" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-selected="false">
                                    <b>CONTACT</b>
                                </button>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>




            <div class="tab-content" style="margin-left: 10px; margin-top: 50px">

                <!-- ABOUT US -->
                <div class="tab-pane fade show active" role="tabpanel" id="aboutus" aria-labelledby="aboutus-tab">

                    <!-- Add Modal -->
                    <button type="button" class="btn btn-all mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#AboutUsAddModal">
                        Add About Us
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="AboutUsAddModal" tabindex="-1" aria-labelledby="AboutUsAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="AboutUsAddModalLabel">Add About Us</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="add-aboutus-form" method="post" action="{{ route('add.aboutus') }}" class="px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control mb-2" placeholder="Enter Title">
                                        <label for="subtitle">Subtitle</label>
                                        <input type="text" name="subtitle" id="subtitle" class="form-control mb-2" placeholder="Enter Subtitle">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control mb-2" placeholder="Enter Description" rows="5"></textarea>
                                        <label for="thumbnail">Thumbnail</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control mb-2">

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
                                <td>Title</td>
                                <td>Subtitle</td>
                                <td>Description</td>
                                <td>Thumbnail</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $aboutus as $data)
                            <tr>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->subtitle }}</td>
                                <td>
                                    <div class="row read-more-less" data-id="100">
                                        <p class="read-toggle" data-id='{{ $data->title }}'>{!! nl2br($data->description) !!}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                        <div class="portfolio-wrap">
                                            <div class="portfolio-links hover01">
                                                <a href="{{ asset('storage/' . $data->thumbnail) }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                                    <img src="{{ asset('storage/' . $data->thumbnail) }}" class="thumbnail" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>


                                    <!-- Edit Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#AboutUsEditModal_{{ $data->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    <div class="modal fade" id="AboutUsEditModal_{{ $data->id }}" tabindex="-1" aria-labelledby="AboutUsEditModal_{{ $data->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="AboutUsEditModal_{{ $data->id }}Label">Edit About Us</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="edit-aboutus-form" method="post" action="{{ route('edit.aboutus', [ 'id' => $data->id ]) }}" class="px-5" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control mb-2" value="{{ $data->title }}">
                                                        <label for="subtitle">Subtitle</label>
                                                        <input type="text" name="subtitle" id="subtitle" class="form-control mb-2" value="{{ $data->subtitle }}">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description" class="form-control mb-2" rows="5">{!! nl2br($data->description) !!}</textarea>
                                                        <label for="thumbnail">Thumbnail</label>
                                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control mb-2">

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
                                    <a data-bs-toggle="modal" data-bs-target="#AboutUsDeleteModal_{{ $data->id }}">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>

                                    <div class="modal fade" id="AboutUsDeleteModal_{{ $data->id }}" tabindex="-1" aria-labelledby="AboutUsDeleteModal_{{ $data->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="AboutUsDeleteModal_{{ $data->id }}Label">Delete About Us</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    delete
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                    <form id="delete-aboutus-form" method="post" action="{{ route('delete.aboutus', [ 'id' => $data->id ]) }}">
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
                <!-- END ABOUT US -->

                <!-- AWARDS -->
                <div class="tab-pane fade" role="tabpanel" id="awards" aria-labelledby="awards-tab">

                    <!-- Add Modal -->
                    <button type="button" class="btn btn-all mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#AwardAddModal">
                        Add Awards
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="AwardAddModal" tabindex="-1" aria-labelledby="AwardAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="AwardAddModalLabel">Add About Us</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="add-awards-form" method="post" action="{{ route('add.awards') }}" class="px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <label for="order">Order</label>
                                        <input type="text" name="order" class="form-control" value="{{ $nextAwardOrder }}" placeholder="Enter Order">
                                        <p lass="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                        <label for="name">Award Name</label>
                                        <input type="text" name="name" class="form-control mb-2" placeholder="Enter Award Name">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control mb-2" placeholder="Enter Description" rows="5"></textarea>
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control mb-2">

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
                                <td>Description</td>
                                <td>Image</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $awards as $award)
                            <tr>
                                <td>{{ $award->order . $award->order_suffix }}</td>
                                <td>{{ $award->name }}</td>
                                <td>{!! nl2br($award->description) !!}</td>
                                <td>
                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                        <div class="portfolio-wrap">
                                            <div class="portfolio-links hover01">
                                                <a href="{{ asset('storage/' . $award->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                                    <img src="{{ asset('storage/' . $award->image) }}" class="thumbnail" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <!-- Edit Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#AwardEditModal_{{ $award->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    <div class="modal fade" id="AwardEditModal_{{ $award->id }}" tabindex="-1" aria-labelledby="AwardEditModal_{{ $award->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="AwardEditModal_{{ $award->id }}Label">Edit Award</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="edit-awards-form" method="post" action="{{ route('edit.award', [ 'id' => $award->id ]) }}" class="px-5" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <label for="order">Order</label>
                                                        <input type="text" name="order" id="order" class="form-control mb-2" value="{{ $award->order . $award->order_suffix }}">
                                                        <label for="award">Award Name</label>
                                                        <input type="text" name="name" class="form-control mb-2" value="{{ $award->name }}">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" class="form-control mb-2" rows="5">{!! nl2br($award->description) !!}</textarea>
                                                        <label for="image">Image</label>
                                                        <input type="file" name="image" id="image" class="form-control mb-2">

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
                                    <a data-bs-toggle="modal" data-bs-target="#AwardDeleteModal_{{ $award->id }}">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>

                                    <div class="modal fade" id="AwardDeleteModal_{{ $award->id }}" tabindex="-1" aria-labelledby="AwardDeleteModal_{{ $award->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="AwardDeleteModal_{{ $award->id }}Label">Delete Award</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    delete {{ $award->name }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                    <form id="delete-awards-form" method="post" action="{{ route('delete.award', [ 'id' => $award->id ]) }}">
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
                <!-- AWARDS -->

                <!-- PEOPLE -->
                <div class="tab-pane fade" id="people" role="tabpanel" aria-labelledby="people-tab">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-all mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#PeopleAddModal">
                        Add People
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="PeopleAddModal" tabindex="-1" aria-labelledby="PeopleAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="PeopleAddModalLabel">Add People</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="add-people-form" method="post" action="{{ route('add.people') }}" class="px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <label for="order">Order</label>
                                        <input type="text" name="order" class="form-control" value="{{ $nextPeopleOrder }}" placeholder="Enter Order">
                                        <p lass="text-danger mb-2 lead" style="font-size: 13px; color: brown;">*when changing order, set order as 1a, 1b, 2a, 2b...</p>
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control mb-2" placeholder="Enter Name">
                                        <label for="designation">Designation</label>
                                        <input type="text" name="designation" class="form-control mb-2" placeholder="Enter Designation">
                                        <label for="profile">Profile</label>
                                        <input type="file" name="profile" class="form-control mb-2">

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
                                <td>Name</td>
                                <td>Designation</td>
                                <td>Profile</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($people as $data)
                            <tr>
                                <td>{{ $data->order . $data->order_suffix }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->designation }}</td>
                                <td>
                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                        <div class="portfolio-wrap">
                                            <div class="portfolio-links hover01">
                                                <a href="{{ asset('storage/' . $data->profile) }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                                    <img src="{{ asset('storage/' . $data->profile) }}" class="profile" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>


                                    <!-- Edit Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#PeopleEditModal_{{ $data->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    <div class="modal fade" id="PeopleEditModal_{{ $data->id }}" tabindex="-1" aria-labelledby="PeopleEditModal_{{ $data->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="PeopleEditModal_{{ $data->id }}Label">Edit Person</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="edit-people-form" method="post" action="{{ route('edit.people', [ 'id' => $data->id ]) }}" class="px-5" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <label for="order">Order</label>
                                                        <input type="text" name="order" id="order" class="form-control mb-2" value="{{ $data->order . $data->order_suffix }}">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" id="name" class="form-control mb-2" value="{{ $data->name }}">
                                                        <label for="designation">Designation</label>
                                                        <input type="text" name="designation" id="designation" class="form-control mb-2" value="{{ $data->designation }}">
                                                        <label for="profile">Profile</label>
                                                        <input type="file" name="profile" id="profile" class="form-control mb-2">

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
                                    <a data-bs-toggle="modal" data-bs-target="#PeopleDeleteModal_{{ $data->id }}">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>

                                    <div class="modal fade" id="PeopleDeleteModal_{{ $data->id }}" tabindex="-1" aria-labelledby="PeopleDeleteModal_{{ $data->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="PeopleDeleteModal_{{ $data->id }}Label">Delete Person</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    delete {{ $data->name }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                    <form id="delete-people-form" method="post" action="{{ route('delete.people', [ 'id' => $data->id ]) }}">
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
                <!-- END PEOPLE -->

                <!-- CONTACT -->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                    <!-- Add Modal -->
                    <button type="button" class="btn btn-all mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#ContactAddModal">
                        Add Contact
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="ContactAddModal" tabindex="-1" aria-labelledby="ContactAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ContactAddModalLabel">Add Contact</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="add-contacts-form" method="post" action="{{ route('add.contact') }}" class="px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <label for="map">Map Link</label>
                                        <textarea type="text" name="map" id="map" class="form-control mb-2" placeholder="Enter Map Link"></textarea>
                                        <label for="location">Location</label>
                                        <textarea type="text" name="location" id="location" class="form-control mb-2" placeholder="Enter Location"></textarea>
                                        <label for="telephone">Phone</label>
                                        <input type="text" name="telephone" id="telephone" class="form-control mb-2" placeholder="Enter Telephone Number">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" name="mobile" id="mobile" class="form-control mb-2" placeholder="Enter Mobile Number">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Enter Email Address">
                                        <label for="blog">Blog</label>
                                        <input type="text" name="blog" id="blog" class="form-control mb-2" placeholder="Enter Blog Address">
                                        <label for="website">Website</label>
                                        <input type="text" name="website" id="website" class="form-control mb-2" placeholder="Enter Website Address">

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
                                <td>Map</td>
                                <td>Location</td>
                                <td>Phone</td>
                                <td>Mobile</td>
                                <td>Email</td>
                                <td>Blog</td>
                                <td>Website</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $data)
                            <tr>
                                <td>
                                    <iframe src="{{ $data->map }}" width="300" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </td>
                                <td>{!! nl2br($data->location) !!}</td>
                                <td>{{ $data->telephone }}</td>
                                <td>{{ $data->mobile }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->blog }}</td>
                                <td>{{ $data->website }}</td>
                                <td>

                                    <!-- Edit Modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#ContactEditModal_{{ $data->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    <div class="modal fade" id="ContactEditModal_{{ $data->id }}" tabindex="-1" aria-labelledby="ContactEditModal_{{ $data->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="ContactEditModal_{{ $data->id }}Label">Edit Contact</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="edit-contacts-form" method="post" action="{{ route('edit.contact', ['id' => $data->id]) }}" class="px-5" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <label for="map">Map Link</label>
                                                        <input type="text" name="map" id="map" class="form-control mb-2" value="{{ $data->map }}" placeholder="Enter Map Link">
                                                        <label for="location">Location</label>
                                                        <textarea type="text" name="location" rows="3" id="location" class="form-control mb-2" placeholder="Enter Location">{!! nl2br($data->location) !!}</textarea>
                                                        <label for="telephone">Phone</label>
                                                        <input type="text" name="telephone" id="telephone" class="form-control mb-2" value="{{ $data->telephone }}" placeholder="Enter Telephone Number">
                                                        <label for="mobile">Mobile</label>
                                                        <input type="text" name="mobile" id="mobile" class="form-control mb-2" value="{{ $data->mobile }}" placeholder="Enter Mobile Number">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control mb-2" value="{{ $data->email }}" placeholder="Enter Email Address">
                                                        <label for="blog">Blog</label>
                                                        <input type="text" name="blog" id="blog" class="form-control mb-2" value="{{ $data->blog }}" placeholder="Enter Blog Address">
                                                        <label for="website">Website</label>
                                                        <input type="text" name="website" id="website" class="form-control mb-2" value="{{ $data->website }}" placeholder="Enter Website Address">

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
                                    <a data-bs-toggle="modal" data-bs-target="#ContactDeleteModal_{{ $data->id }}">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>

                                    <div class="modal fade" id="ContactDeleteModal_{{ $data->id }}" tabindex="-1" aria-labelledby="ContactDeleteModal_{{ $data->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="ContactDeleteModal_{{ $data->id }}Label">Delete Contact</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    delete
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                    <form id="delete-contacts-form" method="post" action="{{ route('delete.contact', ['id' => $data->id]) }}">
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
                <!-- END CONTACT -->
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
    <script src="{{ asset('admin/js/custom-office.js') }}"></script>
    <script src="{{ asset('admin/js/custom-logout.js') }}"></script>
    <script src="{{ asset('admin/js/read-more.js') }}"></script>


</body>

</html>