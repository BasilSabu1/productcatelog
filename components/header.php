<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link rel="stylesheet" href="header.css">
    <style>
        body, ul, li, a {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
        }

        header {
            background-color: #f8f9fa;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            height: 50px;
            top: 0;
            left: 0;
            z-index: 1000;
            padding: 10px 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: auto;
        }

        .navbar-logo img {
            height: 50px;
            width: auto;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
        }

        .menu-list {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .menu-list li a {
            color: #333;
            font-size: 16px;
            font-weight: 600;
            transition: color 0.3s;
        }

        .menu-list li a:hover {
            color: #007bff;
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 18px;
            background-color: transparent;
            border: none;
            color: #333;
        }

        .menu-toggle.active {
            background-color: #007bff;
            color: #fff;
        }

        @media (max-width: 768px) {
            .navbar-menu {
                display: none;
                position: absolute;
                top: 60px;
                right: 20px;
                background-color: #f8f9fa;
                width: 200px;
                border-radius: 5px;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
                flex-direction: column;
                height: 0;  
                overflow: hidden;
                transition: height 0.3s ease;
            }

            .navbar-menu.active {
                display: flex;
                height: 300px; 
            }

            .menu-list {
                flex-direction: column;
                gap: 10px;
            }

            .menu-list li a {
                padding: 10px 15px;
                text-align: center;
                font-size: 18px;
            }

            .menu-toggle {
                display: flex;
            }
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="assets/images/headerlogo.webp" alt="Logo">
        </div>

        <div class="navbar-menu">
            <ul class="menu-list">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>

        <button class="menu-toggle" id="mobile-menu">☰</button>
    </nav>
</header>

<script>
    const mobileMenu = document.getElementById('mobile-menu');
    const navbarMenu = document.querySelector('.navbar-menu');

    mobileMenu.addEventListener('click', () => {
        navbarMenu.classList.toggle('active');
        mobileMenu.classList.toggle('active'); 
    });
</script>

</body>
</html>
