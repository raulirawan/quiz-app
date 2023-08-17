<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- FontAwesome-cdn include -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Google fonts include -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap-css include -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/bootstrap.min.css" />
    <!-- Animate-css include -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/animate.min.css" />
    <!-- Main-StyleSheet include -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/style.css" />
    <style>
        .card-list-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        article {
            text-align: left;
        }

        .card {
            border: 1px solid #d1d1d1;
            border-radius: 10px;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
            margin: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .vertical-center {
            min-height: 100%;
            /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh;
            /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }

        .container {
            margin-top: 75px;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: white;
            border-top: 1px solid #e1e1e1;
            box-shadow: 0px -2px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-around;
        }

        .nav-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #000;
            text-decoration: none;
            padding: 10px;
        }

        .bi {
            font-size: 1.5rem;
        }

        .btn-logout {
            display: block;
            margin-left: 12px;
            margin-right: 12px;
            margin-top: 20px;
        }
    </style>

</head>

<body>

    @yield('content')
    <nav class="bottom-nav">
        <a href="{{ route('materi') }}" class="nav-link">
            <i class="bi bi-book"></i>
            Materi
        </a>
        <a href="{{ route('home') }}" class="nav-link">
            <i class="bi bi-house-door"></i>
            Home
        </a>
        <a href="{{ route('quiz') }}" class="nav-link">
            <i class="bi bi-calendar-check"></i>
            Quiz
        </a>
    </nav>
    <!-- jQuery-js include -->
    <script src="{{ asset('/') }}frontend/assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap-js include -->
    <script src="{{ asset('/') }}frontend/assets/js/bootstrap.min.js"></script>
    <!-- jQuery-validate-js include -->
    <script src="{{ asset('/') }}frontend/assets/js/jquery.validate.min.js"></script>
    <!-- Custom-js include -->
    <script src="{{ asset('/') }}frontend/assets/js/script.js"></script>
</body>

</html>
