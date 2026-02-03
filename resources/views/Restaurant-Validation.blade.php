<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <meta name="description" content="Proiect Restaurant">
    <meta name="googlebot" content="index,follow">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <meta name="googlebot" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <nav class="nav">
            <div class="poza-logo">
            <a href="/"><img src="{{ asset('imagini/Logo-Restaurant.svg') }}" alt="poza logo"></a>
            </div>
            <div class="nav-container">
                <ul class="nav-items">
                    <li><a class="nav-element" href="#">ABOUT US</a></li>
                    <li><a class="nav-element" href="#">MENU</a></li>
                    <li><a class="nav-element" href="#">CONTACT US</a></li>
                    <li><a class="nav-element" href="#">BLOG</a></li>
                    <li><a class="nav-element" href="#">DELIVERY</a></li>
                </ul>
                <div class="order-container">
                    <input class="input-nav" type="text" placeholder="search">
                    <button class="btn-nav" type="submit">Log in</button>
                    <img class="poza-cart" src="imagini/icon-cart.svg" alt="poza-cart">
                </div>
            </div>
        </nav>
        <section class="mesaj-form">
            <p>Your reservation was successfull!</p>
        </section>
    <footer class="footer">
        <div class="newsletter">
            <h3 class="h3-newsletter">Newsletter</h3>
            <div class="form-newsletter">
                <input class="input-footer" type="email" placeholder="example@example.com">
                <button class="btn-footer" type="submit">Send</button>
            </div>
        </div>
        <div class="social-media">
            <div class="social">
                <img class="poza-social" src="imagini/Icoana-Facebook-Desktop.svg" alt="poza instagram">
                <img class="poza-social" src="imagini/Icoana-Instagram-Desktop.svg" alt="poza facebook">
                <img class="poza-social" src="imagini/Icoana-Youtube-Desktop.svg" alt="poza twitter">
                <img class="poza-social" src="imagini/Icoana-X-Desktop.svg" alt="poza youtube">
            </div>
        </div>
    </footer>
</body>
<script src="index.js"></script>
</html>