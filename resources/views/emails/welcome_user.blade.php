<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f4f6f9;
            font-family: Arial, Helvetica, sans-serif;
            padding: 40px 15px;
            color: #333;
        }

        .mail-wrapper {
            max-width: 600px;
            margin: auto;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background: #0d6efd;
            color: white;
            text-align: center;
            padding: 25px;
        }

        .card-header h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .card-body {
            padding: 35px 30px;
        }

        .card-body h2 {
            margin-bottom: 15px;
            color: #222;
            font-size: 24px;
        }

        .card-body p {
            margin-bottom: 15px;
            line-height: 1.7;
            font-size: 15px;
            color: #555;
        }

        .credentials {
            background: #f8f9fa;
            border: 1px solid #e5e5e5;
            border-radius: 10px;
            padding: 20px;
            margin-top: 25px;
        }

        .credentials h4 {
            margin-bottom: 10px;
            color: #0d6efd;
        }

        .credentials p {
            margin: 8px 0;
            font-size: 15px;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            background: #0d6efd;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 15px;
        }

        .footer {
            text-align: center;
            font-size: 13px;
            color: #888;
            padding: 20px;
        }

        @media(max-width: 600px) {
            .card-body {
                padding: 25px 20px;
            }

            .card-header h1 {
                font-size: 24px;
            }
        }
    </style>

</head>

<body>

    <div class="mail-wrapper">

        <div class="card">

            <div class="card-header">
                <h1>Welcome 🎉</h1>
                <p>Your account has been created successfully</p>
            </div>

            <div class="card-body">

                <h2>Hello {{ $user->name ?? 'User' }},</h2>

                <p>
                    We're excited to have you on board.
                    Your account is now ready and you can start using our platform immediately.
                </p>

                <p>
                    Below are your login credentials:
                </p>

                <div class="credentials">
                    <h4>Account Credentials</h4>

                    <p>
                        <strong>Email:</strong>
                        {{ $user->email ?? 'example@gmail.com' }}
                    </p>

                    <p>
                        <strong>Password:</strong>
                        {{ $password ?? '********' }}
                    </p>
                </div>

                <a href="{{ url('/login') }}" class="btn">
                    Login Now
                </a>

            </div>

            <div class="footer">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </div>

        </div>

    </div>

</body>

</html>