<div class="container-fluid bg-light">
    <!-- NAV BAR -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-text bg-light navbar-light"">
            <div class=" container-fluid">
            <!-- <a href="#" class="navbar-brand mx-auto">RDA</a> -->
            <div class="d-flex text-primary">
                <a href="<?= URLROOT . '/flights/index'?>" class="text-decoration-none fs-2">
                    <!-- <img class="img-fluid -white w-100 h-100" src="<?= URLROOT . '/public/img/logo.svg' ?>" class="fs-6 m-0"> -->
                    <i class="fas fa-globe-africa"></i>
                </a>
                <a class="text-decoration-none fs-4" href="<?= URLROOT . '/flights/index'?>">Air Travel</div></a>

            </div>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav fs-6 fw-bold mx-auto align-items-center">
                    <!-- <a href="./index.html" class="nav-item nav-link">Home</a> -->
                    <a href="<?= URLROOT . 'flights/index' ?>" class="nav-item nav-link text-center">BOOK FLIGHT</a>
                    <a href="<?= URLROOT . 'reservations' ?>" class="nav-item nav-link text-center">MY RESERVATIONS</a>
                    <a href="<?= URLROOT . 'logins/logout' ?>" class="nav-item nav-link text-center">LOGOUT</a>

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
        </nav>
    </div>
</div>