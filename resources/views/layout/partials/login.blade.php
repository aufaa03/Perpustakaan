<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Digital Library</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 360px;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-header img {
            width: 150px;
            margin-bottom: 20px;
        }

        .login-header h2 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.2);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #007bff;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-login:hover {
            background: #0056b3;
        }

        .text-center {
            margin-top: 15px;
        }

        .text-center a {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .text-center a:hover {
            color: #0056b3;
        }

        @media (max-width: 980px) {
            body {
                height: 100vh;
                justify-content: center;
                align-items: center;
                padding: 0;
            }

            .login-container {
                width: 100%;
                max-width: none;
                height: 100vh;
                border-radius: 0;
                box-shadow: none;
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding: 20px;
            }

            .form-control {
                font-size: 12px;
            }

            .btn-login {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
   {{$slot}}
</body>

</html>
