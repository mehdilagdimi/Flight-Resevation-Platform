<?php
//inventory of flights : this is only for admins
// var_dump($_POST['fName']);
// print_r($_POST['fName']);
// var_dump($data[1][0]);
// echo gettype($data['admin']);
// $row = $data['admin'];
// var_dump($data = 'fName');
// if($data => $data['fName']){
//     echo $data;
// }

// foreach($data['admin'] as $user){
//     var_dump($datas);
//     echo $user->fName;
// }

// $this->flightModel = $this->model('Flight');
// $flights = $this->flightModel->getFlights();
// $data = [
//     'title' => 'List of flights',
//     'flights' => $flights
// ];

// $this->view('pages/index', $data);
// $this->view('dashboard/index', $data);

// foreach($data['flights'] as $flight){
//     var_dump($datas);
//     echo $flight->price;
// }

// echo $data['admin'];
// echo "hello";
// history.pushstate in javascript
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"> -->
    <?php require_once APPROOT . '/views/styling.php' ?>
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
</head>

<?php require_once APPROOT . '/views/header.php'; ?>

<body class="">
    <div class="container-fluid gradient p-4">
        <div class="container">

            <!-- ADD FORM POP UP  -->
            <!-- Button trigger modal -->
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    ADD FLIGHT
                </button>
            </div>

            <!-- ADD FLIGHT POPUP Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">ADD A FLIGHT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> -->
                        <div class="modal-body modal-dialog-centered">
                            <form action="<?= URLROOT ?>flights/addFlight" method="POST">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-4">

                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="plane"">Plane Model</label>
                                    <!-- <input type=" text" id="id_plane" name="plane" class="form-control" /> -->
                                        <select class="form-select" name="plane" aria-label="Default select example">
                                            <option selected></option>

                                            <?php foreach ($data['planes'] as $plane) { ?>
                                                <option value="<?= $plane->model ?>"> <?= $plane->model ?> </option>
                                            <?php } ?>

                                        </select>

                                    </div>


                                    <div class=" form-outline mb-4">
                                        <label class="form-label" for="id_departDate">Departure Date</label>
                                        <input type="datetime-local" id="id_departDate" name="id_departDate" class="form-control" />

                                    </div>

                                    <!-- Email input -->

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="id_arrivalDate">Arrival Date</label>
                                        <input type="datetime-local" id="id_arrivalDate" name="id_arrivalDate" class="form-control" />

                                    </div>


                                    <!-- Text input -->
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="id_airport">From</label>
                                            <!-- <input type="text" id="id_airportFROM" name="id_airportFROM" class="form-control" /> -->
                                            <select class="form-select" name="id_airportFROM" aria-label="Default select example">
                                                <option selected></option>
                                                <?php foreach ($data['airports'] as $airport) { ?>
                                                    <option value="<?= $airport->airportAdress ?>"> <?= $airport->airportAdress ?> </option>
                                                <?php } ?>
                                            </select>

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="id_seats">Available Seats</label>
                                            <input type="number" id="id_seats" name="id_seats" class="form-control" value="<?= $data['planes'][0]->seats ?>" />

                                        </div>

                                    </div>

                                    <!-- Number input -->
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="id_airportTo">To</label>
                                            <!-- <input type="text" id="id_airportTO" name="id_airportTO" class="form-control" /> -->
                                            <select class="form-select" name="id_airportTO" aria-label="Default select example">
                                                <option selected></option>
                                                <?php foreach ($data['airports'] as $airport) { ?>
                                                    <option value="<?= $airport->airportAdress ?>"> <?= $airport->airportAdress ?> </option>
                                                <?php } ?>
                                            </select>

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="id_price">Price (DH)</label>
                                            <input type="number" step="0.01" min=0 id="id_price" name="id_price" class="form-control" />

                                        </div>
                                        <!-- Text input -->
                                    </div>

                                    <!-- Submit button -->
                                    <div class="form-outline d-flex flex-row justify-content-end">
                                        <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="saveflight" class="btn btn-success btn-block mx-1">SAVE FLIGHT</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- UPDATE FLIGHT POPUP -->
            <div class="modal fade" id="UpdatePopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">ADD A FLIGHT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> -->
                        <div class="modal-body modal-dialog-centered">
                            <form action="<?= URLROOT ?>flights/updateFlight" method="POST">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-4">

                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="id_plane"">Plane Model</label>
                                    <!-- <input type=" text" id="id_plane" name="plane" class="form-control" /> -->
                                        <select class="form-select" name="id_plane" aria-label="Default select example">
                                            <option selected></option>

                                            <?php foreach ($data['planes'] as $plane) { ?>
                                                <option value="<?= $plane->planeID ?>"> <?= $plane->model ?> </option>
                                            <?php } ?>

                                        </select>

                                    </div>


                                    <div class=" form-outline mb-4">
                                        <label class="form-label" for="id_departDate">Departure Date</label>
                                        <input type="datetime-local" id="id_departDate" name="id_departDate" class="form-control" />

                                    </div>

                                    <!-- Email input -->

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="id_arrivalDate">Arrival Date</label>
                                        <input type="datetime-local" id="id_arrivalDate" name="id_arrivalDate" class="form-control" />

                                    </div>


                                    <!-- Text input -->
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="id_airport">From</label>
                                            <!-- <input type="text" id="id_airportFROM" name="id_airportFROM" class="form-control" /> -->
                                            <select class="form-select" name="id_airportFROM" aria-label="Default select example">
                                                <option selected></option>
                                                <?php foreach ($data['airports'] as $airport) { ?>
                                                    <option value="<?= $airport->airportID ?>"> <?= $airport->airportAdress ?> </option>
                                                <?php } ?>
                                            </select>

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="id_seats">Available Seats</label>
                                            <input type="number" id="id_seats" name="id_seats" class="form-control" value="<?= $data['planes'][0]->seats ?>" />

                                        </div>

                                    </div>

                                    <!-- Number input -->
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="id_airportTo">To</label>
                                            <!-- <input type="text" id="id_airportTO" name="id_airportTO" class="form-control" /> -->
                                            <select class="form-select" name="id_airportTO" aria-label="Default select example">
                                                <option selected></option>
                                                <?php foreach ($data['airports'] as $airport) { ?>
                                                    <option value="<?= $airport->airportID ?>"> <?= $airport->airportAdress ?> </option>
                                                <?php } ?>
                                            </select>

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="id_price">Price (DH)</label>
                                            <input type="number" step="0.01" min=0 id="id_price" name="id_price" class="form-control" />

                                        </div>
                                        <!-- Text input -->
                                    </div>

                                    <!-- Submit button -->
                                    <div class="form-outline d-flex flex-row justify-content-end">
                                        <input type="hidden" class="volID" name="volID" value="">
                                        <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="updateFlight" class="btn btn-success btn-block mx-1">UPDATE FLIGHT</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Flights table -->
            <section class="my-4 table-responsive">
                <table class="table table-dark table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Flight ID</th>
                            <th scope="col">FROM</th>
                            <th scope="col">TO</th>
                            <th scope="col">Departure</th>
                            <th scope="col">Arrival</th>
                            <th scope="col">Available Seats</th>
                            <th scope="col">Plane</th>
                            <th scope="col">Price</th>
                            <th scopre="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['flights'] as $flight) { ?>
                            <tr id="<?php echo $flight->volID; ?>">
                                <!-- <th scope="row"><input style="color:white;" type="checkbox" id="" name="" value=""></th>                           -->
                                <td><?= $flight->volID; ?></td>
                                <td><?= $flight->departAirport; ?></td>
                                <td><?= $flight->destAirport; ?></td>
                                <td><?= $flight->departureDate; ?></td>
                                <td><?= $flight->arrivalDate; ?></td>
                                <td><?= $flight->availableSeats; ?></td>
                                <td><?= $flight->model; ?></td>
                                <td><?= $flight->price; ?>DH</td>
                                <td>
                                    <div class="h-100 d-flex flex-row justify-content-evenly">
                                        <!-- <form class=""> -->
                                        <!-- <input type="text" name="id_vol" hidden value="<?= $flight->volID; ?>"> -->
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button class="update btn btn-primary mx-1" name="update" value="<?= $flight->volID; ?>" data-bs-toggle="modal" data-bs-target="#UpdatePopup">UPDATE</button>
                                        </div>
                                        <!-- </form> -->
                                        
                                            <form class="mb-0" action="<?= URLROOT ?>flights/deleteFlight" method="POST">
                                                <input type="text" name="id_vol" hidden value="<?= $flight->volID; ?>">
                                                <div class="d-flex align-items-center justify-content-center">
                                                <button class="btn btn-danger mx-1" name="delete">DELETE</button>
                                                </div>
                                            </form>
                                        <!-- </div> -->
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>

        </div>
    </div>

    <script>
         let update = document.querySelectorAll('.update');
        update.forEach(function(upd) {
            upd.volID = upd.value;
            upd.addEventListener('click', setVolID, false);
            // console.log(upd.volID);
            // upd.volID = upd.value;
            // console.log(upd.volID);
            // console.log(upd.value);
        })


        function setVolID(evt) {
            // console.log(document.querySelector('.volID').name);
            document.querySelector('.volID').value = evt.currentTarget.volID;
            // console.log(document.querySelector('.volID').value);
            
            // document.querySelector('.id_plane').value = evt.currentTarget.airID;
            // document.querySelector('.airportFrom').value = evt.currentTarget.airID;
            // document.querySelector('.airportTo').value = evt.currentTarget.volID;
        }
    </script>
</body>

<?php require_once APPROOT . '/views/footer.php' ?>

</html>