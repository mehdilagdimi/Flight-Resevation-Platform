<?php
//this page is the home page showing reservation,  reservations need loging in
//APPROOT is a contant defined in config.php file
// echo APPROOT;   
// echo "<br>" . URLROOT;
// echo '<br>'. SITENAME;
// echo "<br>" .  __FILE__;

// header('location : home.php');
// foreach($data['flights'] as $flight){
//     echo "Flight departure : " . $flight->departureAdress;
//     echo '<br>';
// }

// echo $data['user'];
// echo "hello";

?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!-- <script src="https://kit.fontawesome.com/c4254e24a8.js"></script> -->
    <?php require_once APPROOT . '/views/styling.php' ?>
</head>

<body>

    <?php require_once APPROOT . '/views/header.php'; ?>

    <div class="container-fluid gradient p-4">
        <div class="container bg-light p-2 text-center align-items-center">
            <form action="<?= URLROOT . 'flights/showFlights'?>" method="POST" class="row gy-2 gx-3 mb-0 p-2 justify-content-center align-items-center">
                <div class="col-3">
                    <div class="form-outline">
                        <!-- <input type="text" id="form11Example1" class="form-control" /> -->
                        <label class="form-label" for="form11Example1">Departure</label>
                        <select class="form-select" name ="departure" aria-label="Default select example">
                            <option selected></option>

                            <?php foreach($data['airports'] as $airport) { ?>
                            <option value="<?= $airport->airportAdress ?>"> <?= $airport->airportAdress ?> </option>
                            <!-- <option value="2">Two</option>
                            <option value="3">Three</option> -->
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <!-- <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form11Example2" checked />
                        <label class="form-check-label" for="form11Example2"> Checked </label>
                    </div>
                </div> -->
                <div class="col-3">
                    <div class="form-outline">
                        <!-- <input type="text" id="form11Example3" class="form-control" /> -->
                        <label class="form-label" for="form11Example3">Destination</label>
                        <select class="form-select" name="destination" aria-label="Default select example">

                            <option selected></option>
                            <?php foreach($data['airports'] as $airport) { ?>
                            <option value="<?= $airport->airportAdress ?>"> <?= $airport->airportAdress ?> </option>
                            <!-- <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option> -->
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="col-auto d-flex flex-column align-items-center">
                        <label class="form-check-label" for="form11Example4">
                            Round Trip
                        </label>
                        <div class="form-check form-switch">

                            <input class="form-check-input" name ="roundTrip" type="checkbox" id="form11Example4" />
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" name="searchFlights" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

</body>
<?php require_once APPROOT . '/views/footer.php' ?>

</html>