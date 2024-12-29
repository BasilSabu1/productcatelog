<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e Product Catelog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome CDN -->
    <style>
        body, ul, li, a {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
        }

        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 40px 20px;
            margin-top: 60px;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: auto;
        }

        .footer-column {
            width: 23%;
            margin-bottom: 20px;
        }

        .footer-logo {
            max-width: 100px;
        }

        .footer h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .footer p {
            font-size: 14px;
            line-height: 1.6;
        }

        .social-media-list {
            list-style: none;
            padding: 0;
        }

        .social-media-list li {
            margin: 10px 0;
        }

        .social-media-list a {
            color: #fff;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .social-media-list i {
            font-size: 20px; 
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .footer-column {
                width: 48%;
                margin-bottom: 20px;
               
            }
            .social-media-list{
                position: relative;
                left:40%
            }
        }

        @media (max-width: 480px) {
            .footer-column {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-column">
            <img src="assets/images/headerlogo.webp" alt="Logo" class="footer-logo">
            <p>&copy; 2024 Product Catalog</p>
        </div>

        <div class="footer-column">
            <h3>About</h3>
            <p>Welcome to our Product Catalog! We offer a wide range of products to suit your needs. Explore, filter, and find the best deals here!</p>
        </div>

        <div class="footer-column">
            <h3>Social Media</h3>
            <ul class="social-media-list">
                <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Location</h3>
            <p>123 Main Street</p>
            <p>Cityville, Country</p>
            <p>+123 456 7890</p>
            <p>email@example.com</p>
        </div>
    </div>
</footer>

</body>
</html>
