<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Email</title>




</head>

<body>

    <div class="container mt-5">

        <div class="card">
            <div class="card-header bg-link text-grey-800">
                Welcome {{ $name }} to Laravel Mail
            </div>
            <div class="card-body">
                <h5 class="card-title">Welcome to Laravel Mail</h5>
                <p class="card-text">We're excited to have you on board!, So, your account has been created successfully.</p>
                <p class="card-text">And you can now access all the features of our platform. And your credentials are ready to use .</p>
                <div class="info text-center">
                    <h5>Credentials Email = email </h5>
                    <h5>Credentials Password = password</h5>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>