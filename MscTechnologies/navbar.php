
<?php
// Start or resume the session
session_start();

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<header>
    <img class="logor" src="./Images/MSCLogo.png"/>

    <nav class="Navs navbar navbar-dark navbar-expand-lg">
        <button class="navbar-toggler m-2" data-toggle="collapse" data-target="#coldow">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="coldow">
            <ul class="navbar-nav fw-bold hovef">
            <?php
                if (!isset($_SESSION['id'])) {
                    echo '<li class="nav-item"><a href="signin.php" class="Login nav-link glow-on-hover">Sign In</a></li>';
                }

                if (isset($_SESSION['id'])) {
                    
                    echo '<li class="nav-item"><a href="./userprofile.php" class="links nav-link"><span></span>User</a></li>';
                    echo '<li class="nav-item"><a href="./viewcart.php" class="links nav-link"><span></span>Cart</a></li>';
                    echo '<li class="nav-item"><a href="logout.php" class="Login nav-link glow-on-hover">Sign out</a></li>';
                }

                ?>
                <?php 
                echo '<li class="nav-item"><a href="./index.php" class="links nav-link"><span></span>Home</a></li>
                <li class="nav-item"><a href="./product.php" class="links nav-link"><span></span>Product</a></li>
                <li class="nav-item"><a href="./services.php" class="links nav-link"><span></span>Services</a></li>';
                ?>

                

                
            </ul>
        </div>

    </nav>
    <button class="nav-btn">
        <!-- Add appropriate Font Awesome icon HTML here -->
    </button>
</header>
