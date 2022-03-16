<div class="container-fluid bg-light">
    <!-- NAV BAR -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-text bg-light navbar-light">
            <div class="container-fluid">
                <!-- <a href="#" class="navbar-brand mx-auto">RDA</a> -->
                <div class="text-primary">
                    <a href="<?= URLROOT . '/flights/index' ?>" class="text-decoration-none fs-2">

                        <i class="fas fa-globe-africa"></i>
                    </a>
                    <a class="text-decoration-none fs-4" href="<?= URLROOT . '/flights/index' ?>">Air Travel</a>

                </div>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                    <div class="navbar-nav w-100 fs-6 fw-bold justify-content-end">
                        
                        <!-- <a href="./index.html" class="nav-item nav-link">Home</a> -->
                        <a href="<?= URLROOT . 'flights/index' ?>" class="nav-item nav-link text-center text-primary"> <span id="Flights"> BOOK FLIGHT </span></a>
                        <a href="<?= URLROOT . 'reservations' ?>" class="nav-item nav-link text-center text-primary"> <span id="Reservations"> MY RESERVATIONS </span></a>
                        <a href="<?= URLROOT . 'planes' ?>" class="nav-item nav-link text-center text-primary" id="Planes"> <span id="Planes"> PLANES </span></a>
                        <a href="<?= URLROOT . 'airports' ?>" class="nav-item nav-link text-center text-primary" id="Airports"> <span id="Airports"> AIRPORTS </span></a>
                        <a href="<?= URLROOT . 'users' ?>" class="nav-item nav-link text-center text-primary" id="Users"> <span id="Users"> USERS </span></a>
                        <a href="<?= URLROOT . 'users/showAdmins' ?>" class="nav-item nav-link text-center text-primary" id="Admins"> <span id="Admins"> ADMINS </span></a>
                        <a href="<?= URLROOT . 'logins/logout' ?>" class="nav-item nav-link text-center text-primary"> <span> LOGOUT </span></a>
                    
                        <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                        <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Messages</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Inbox</a>
                                    <a href="#" class="dropdown-item">Sent</a>
                                    <a href="#" class="dropdown-item">Drafts</a>
                                </div>
                            </div> -->
                    </div>
                    <!-- <form class="d-flex">
                            <div class="input-group">                    
                                <input type="text" class="form-control" placeholder="Search">
                                <button type="button" class="btn btn-secondary"><i class="bi-search"></i></button>
                            </div>
                        </form>
                        <div class="navbar-nav">
                            <a href="#" class="nav-item nav-link">Login</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </nav>
    </div>
</div>

<script>
    let privileg = "<?php echo $_SESSION['privilege']; ?>";
    // console.log(privileg);
    // <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true && ($_SESSION['privilege'] == 'admin')) { ?>

        document.querySelector("#Flights").innerHTML = "FLIGHTS";
        document.querySelector("#Reservations").innerHTML = "RESERVATIONS";

    <?php } else if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true && ($_SESSION['privilege'] == 'user')) {?>

        document.querySelector("#Admins").style.display = 'none';
        document.querySelector("#Users").style.display = 'none';
        document.querySelector("#Airports").style.display = 'none';
        document.querySelector("#Planes").style.display = 'none';
    <?php }   ?>
</script>