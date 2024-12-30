<?php
session_start();
$connected = false;
$isAdmin = false;

if (isset($_SESSION['customer']) && is_array($_SESSION['customer'])) {
    $connected = true;
    if ($_SESSION['customer']['email'] === 'ihadjkaddour7@gmail.com') {
        $isAdmin = true;
    }
}
?>


<nav id="navbar">
    <div class="toggle" onclick="toggleNavbar()">☰</div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>

        <?php if ($isAdmin): ?>
            <li><a href="pages/addProductPage.php">Add Product</a></li>
            <li><a href="../pages/categoryPage.php">Categories</a></li>
        <?php else: ?>
            <li><a href="cart.php">Cart</a></li>
        <?php endif; ?>

        <?php if ($connected): ?>
            <li><a>Logout</a></li>
        <?php else: ?>
            <li><a href="../pages/loginPage.php">Login</a></li>
        <?php endif; ?>
        
    </ul>
</nav>


<script>
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function() {
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // Scroll Down
            navbar.classList.add("hidden");
        } else {
            // Scroll Up
            navbar.classList.remove("hidden");
        }
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Prevent negative scroll
    });

    function toggleNavbar() {
        const navList = document.querySelector("#navbar ul");
        navList.classList.toggle("show");
    }
</script>


<!-- <style>
    #navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #333;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        transition: top 0.3s, box-shadow 0.3s;
    }

    /* Navbar list */
    #navbar ul {
        display: flex;
        justify-content: center;
        align-items: center;
        list-style-type: none;
        padding: 12px 0;
        margin: 0;
        flex-wrap: wrap; /* Allow wrapping for smaller screens */
    }

    #navbar ul li {
        margin: 0 25px;
    }

    /* Navbar links */
    #navbar ul li a {
        text-decoration: none;
        color: white;
        font-size: 18px;
        font-weight: 500;
        padding: 10px 20px;
        transition: background-color 0.3s, transform 0.3s;
        display: block;/* none */
        border-radius: 4px;
    }

    /* Navbar hover effect */
    #navbar ul li a:hover {
        background-color: #555;
        transform: translateY(-2px);
    }

    /* Navbar hidden state */
    #navbar.hidden {
        top: -80px;
        box-shadow: none;
    }

    /* Hide the toggle button on larger screens */
    #navbar .toggle {
        display: none; /* Default state: hidden */
    }

    /* Responsive styling for smaller screens */
    @media (max-width: 768px) {
        #navbar ul {
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
            display: none; /* Hide by default */
        }

        #navbar ul.show {
            display: flex; /* Show when toggled */
        }

        #navbar ul li {
            margin: 10px 0;
        }

        #navbar ul li a {
            font-size: 20px;
            padding: 12px 20px;
        }

        /* Show the toggle button only on smaller screens */
        #navbar .toggle {
            display: block; /* Visible only on small screens */
            cursor: pointer;
            color: white;
            font-size: 20px;
            padding: 10px;
        }
    }
</style> -->
<style>
    #navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: rgba(241, 241, 241, 0.9); /* Match the login/signup page background and add transparency */
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Increased shadow for depth */
        z-index: 1000;
        transition: top 0.3s, box-shadow 0.3s;
        padding: 20px 0; /* Double the height */
        border-radius: 0 0 10px 10px; /* Rounded bottom corners */
    }

    /* Navbar list */
    #navbar ul {
        display: flex;
        justify-content: center;
        align-items: center;
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #navbar ul li {
        margin: 0 30px; /* Adjust spacing for the new height */
    }

    /* Navbar links */
    #navbar ul li a {
        text-decoration: none;
        color: royalblue; /* Updated text color */
        font-size: 20px; /* Slightly larger font */
        font-weight: 600;
        padding: 15px 25px; /* Increased padding for better spacing */
        transition: background-color 0.3s, transform 0.3s;
        display: block;
        border-radius: 6px; /* Slightly round corners for links */
    }

    /* Navbar hover effect */
    #navbar ul li a:hover {
        background-color: rgba(135, 206, 235, 0.5); /* Light blue hover effect */
        transform: translateY(-2px);
    }

    /* Navbar hidden state */
    #navbar.hidden {
        top: -100px; /* Adjusted for increased height */
        box-shadow: none;
    }

    /* Toggle button for small screens */
    #navbar .toggle {
        display: none; /* Default hidden */
    }

    /* Responsive styling for smaller screens */
    @media (max-width: 870px) {
        #navbar ul {
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
            display: none; /* Hidden by default */
        }

        #navbar ul.show {
            display: flex; /* Show when toggled */
        }

        #navbar ul li {
            margin: 10px 0;
        }

        #navbar ul li a {
            font-size: 20px;
            padding: 15px 20px; /* Adjust for consistency */
        }

        /* Toggle button visibility */
        #navbar .toggle {
            display: block; /* Visible on smaller screens */
            cursor: pointer;
            color: royalblue;
            font-size: 24px; /* Slightly larger */
            padding: 10px;
        }
    }
</style>
