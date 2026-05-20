<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>{{ $title }}</title>

    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" />

    <style>
        * {
            margin: 0px;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            overflow-x: hidden;
        }

        .sidebar {
            width: 280px;
            min-height: 100vh;
        }

        .main-content {
            width: 100%;
            min-height: 100vh;
        }

        .btn-toggle-nav a {
            padding: .4rem 1rem;
        }

        .btn-toggle-nav a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
        <div class="container-fluid">

            <a class="navbar-brand fw-bold" href="#">PM</a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li>

                </ul>

                <form class="d-flex">
                    <input class="form-control me-2"
                        type="search"
                        placeholder="Search">

                    <button class="btn btn-outline-success"
                        type="submit">
                        Search
                    </button>
                </form>

            </div>
        </div>
    </nav>

    <!-- Main Layout -->
    <div class="d-flex">

        <!-- Sidebar -->
        <aside class="sidebar border-end bg-light p-3">

            <a href="/"
                class="d-flex align-items-center pb-3 mb-3 text-decoration-none border-bottom">

                <span class="fs-5 fw-semibold">
                    User Management
                </span>
            </a>

            <ul class="list-unstyled ps-0">

                <li class="mb-2">

                    <button class="btn btn-toggle d-inline-flex align-items-center border-0"
                        data-bs-toggle="collapse"
                        data-bs-target="#home-collapse">

                        Home
                    </button>

                    <div class="collapse show" id="home-collapse">

                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">

                            <li>
                                <a href="#"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    Overview
                                </a>
                            </li>

                            <li>
                                <a href="#"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    Updates
                                </a>
                            </li>

                            <li>
                                <a href="#"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    Reports
                                </a>
                            </li>

                        </ul>

                    </div>
                </li>

                <li class="mb-2">

                    <button class="btn btn-toggle d-inline-flex align-items-center border-0 collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#dashboard-collapse">

                        Products
                    </button>

                    <div class="collapse" id="dashboard-collapse">

                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">

                            <li>
                                <a href="products"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    Product List
                                </a>
                            </li>

                            <li>
                                <a href="#"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    Monthly
                                </a>
                            </li>

                            <li>
                                <a href="#"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    Annually
                                </a>
                            </li>

                        </ul>

                    </div>
                </li>

                <li class="mb-2">

                    <button class="btn btn-toggle d-inline-flex align-items-center border-0 collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#orders-collapse">

                        Orders
                    </button>

                    <div class="collapse" id="orders-collapse">

                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">

                            <li>
                                <a href="#"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    New Orders
                                </a>
                            </li>

                            <li>
                                <a href="#"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    Processed
                                </a>
                            </li>

                            <li>
                                <a href="#"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    Returned
                                </a>
                            </li>

                        </ul>

                    </div>
                </li>

                <li class="border-top my-3"></li>

                <li class="mb-2">

                    <button class="btn btn-toggle d-inline-flex align-items-center border-0 collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#account-collapse">

                        Account
                    </button>

                    <div class="collapse" id="account-collapse">

                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a href="{{ route('users') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    User
                                </a>
                            </li>


                            <li>
                                <a href="#"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    Settings
                                </a>
                            </li>

                            <li>
                                <a href="#"
                                    class="link-dark d-inline-flex text-decoration-none rounded w-100">
                                    Logout
                                </a>
                            </li>

                        </ul>

                    </div>
                </li>

            </ul>

        </aside>

        <main class="main-content p-4">

            {{ $slot }}

        </main>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')
</body>

</html>