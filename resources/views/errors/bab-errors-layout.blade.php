<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book a book - @yield('title')</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            background-color: #F4F6FC;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family:'nunito';
            color: #2f465b;
        }
        .error-container{
            text-align: center;
        }
        .error-code{
            font-size: 15rem;
            text-shadow: 5px 5px 5px #5d7ebe;
        }
        .error-message{
            font-size: 1.8rem;
            margin-top: -2rem;
            margin-bottom: 2rem;
        }
        .error-link{
            font-size: 1.4rem;
            padding: 0.4rem 1.9rem;
            background-color: #5d7ebe;
            color: white;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px
        }
    </style>
</head>
<body>
    <div class="error-container">
        <p class="error-code">
            @yield('code')
        </p>
        <p class="error-message">
            @yield('message')
        </p>
        <a href="/" class="error-link">
        Retour à l'accueil</a>
    </div>
</body>
</html>
