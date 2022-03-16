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

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">ADD A FLIGHT</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div> -->
                <div class="modal-body modal-dialog-centered">

                    <form action="<?= URLROOT ?>reservations/addReservation" method="POST">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">

                            <div class="inputs-group">
                                <div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="fName">First Name</label>
                                        <input type=" text" id="fName" name="fName[]" class="form-control" />
                                    </div>
                                    <!-- Text input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="lName">Last Name</label>
                                        <input type="text" id="lName" name="lName[]" class="form-control" />
                                    </div>
                                    <!-- Number input -->
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="birthDate">BirthDate</label>
                                            <input type="date" id="birthDate" name="birthDate[]" class="form-control" />
                                        </div>
                                    </div>
                                    <!-- Message input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="seatNumG">Seat ---></label>
                                        <input type="number" id="seatNumG" name="seatNumG[]" class="form-control" />

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="seatNumC">Seat <--- </label>
                                                <input type="number" id="seatNumC" name="seatNumC[]" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <div class="form-outline d-flex flex-row justify-content-end">
                                <input type="hidden" class="typeFlight" name="type" value="">
                                <input type="hidden" class="volID" name="volID" value="">
                                <input type="hidden" class="volIDReturn" name="volIDReturn" value="">
                                <div class="append btn btn-dark mx-1">Add Passenger</div>
                                <button type="button" class="btn btn-secondary mx-1 close" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addReservation" class="btn btn-success btn-block mx-1">ADD RESERVATION</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Flights going to -->
    <div class="container-fluid gradient p-2">
        <div class="container table-responsive">
            <h2>----></h2>
            <table class="table table-responsive table-dark table-hover text-center my-4">
                <thead>
                    <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Departure Date</th>
                        <th scope="col">Arrival Date</th>
                        <th scope="col">Available Seats</th>
                        <th scope="col">Plane</th>
                        <th scope="col">Price</th>
                        <th scopre="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['Goingflights'] as $flight) { ?>
                        <tr id="<?php echo $flight->volID; ?>">
                            <!-- <th scope="row"><input style="color:white;" type="checkbox" id="" name="" value=""></th> -->
                            <td><?= $flight->departAirport; ?></td>
                            <td><?= $flight->destAirport; ?></td>
                            <td><?= $flight->departureDate; ?></td>
                            <td><?= $flight->arrivalDate; ?></td>
                            <td><?= $flight->availableSeats; ?></td>
                            <td><?= $flight->model; ?></td>
                            <td><?= $flight->price; ?>DHs</td>
                            <td>
                                <div class="d-flex flex-row justify-content-between">
                                    <!-- ADD RESERVATION POP UP  -->
                                    <!-- Button trigger modal -->
                                    <!-- <input type="text" name="flightID" hidden data-id="<?= $flight->volID ?>"> -->
                                    <!-- <button type="button" class="btn btn-success reserve" name="reserve" value="<?= $flight->volID ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">RESERVE</button> -->
                                    <button type="button" class="btn btn-success reserve" data-bs-toggle="" data-bs-target="" name="reserve" value="<?= $flight->volID ?>">RESERVE</button>
                                    <!-- Modal -->
                                    <!-- add a button for cancelling reservation -->
                                    <!-- <form class="" action="" method="POST">
                                <input type="text" name="id_vol" hidden value="">
                                <button class="btn btn-warning" name="cancel" style="">CENCEL</button>
                            </form> -->
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
            <!-- </form> -->
        </div>
    </div>

    <!-- Flights coming from -->
    <?php if (isset($data['Comingflights'])) { ?>
        <div class="container-fluid gradient p-2">
            <div class="container">
                <h2>
                    <h2>----></h2>
                    <table class="table table-responsive table-dark table-hover text-center my-4">
                        <thead>
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Departure Date</th>
                                <th scope="col">Arrival Date</th>
                                <th scope="col">Available Seats</th>
                                <th scope="col">Plane</th>
                                <th scope="col">Price</th>
                                <th scopre="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($data['Comingflights'])) {
                                foreach ($data['Comingflights'] as $flight) { ?>
                                    <tr id="<?php echo $flight->volID; ?>">
                                        <!-- <th scope="row"><input style="color:white;" type="checkbox" id="" name="" value=""></th> -->
                                        <td><?= $flight->departAirport; ?></td>
                                        <td><?= $flight->destAirport; ?></td>
                                        <td><?= $flight->departureDate; ?></td>
                                        <td><?= $flight->arrivalDate; ?></td>
                                        <td><?= $flight->availableSeats; ?></td>
                                        <td><?= $flight->model; ?></td>
                                        <td><?= $flight->price; ?>DHs</td>
                                        <td>
                                            <div class="d-flex flex-row justify-content-between">
                                                <!-- ADD RESERVATION POP UP  -->
                                                <!-- Button trigger modal -->
                                                <!-- <input type="text" name="flightID" hidden data-id="<?= $flight->volID ?>"> -->
                                                <button type="button" class="btn btn-success reserveReturn" name="reserveReturn" value="<?= $flight->volID ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">RESERVE</button>
                                                <!-- Modal -->
                                                <!-- add a button for cancelling reservation -->
                                                <!-- <form class="" action="" method="POST">
                                <input type="text" name="id_vol" hidden value="">
                                <button class="btn btn-warning" name="cancel" style="">CENCEL</button>
                            </form> -->
                                            </div>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>

                    </table>
                    <!-- </form> -->
            </div>
        </div>

    <?php } ?>

    <script>
        document.querySelector('.append').addEventListener('click', appendInputs);
        let inputs = document.querySelector('.inputs-group');



        function appendInputs() {
            let element = document.createElement('div');
            element.innerHTML = `
                <hr> <br><h2>Next Passenger</h2>
                <div class="form-outline mb-4">
                    <label class="form-label" for="fName">First Name</label>
                    <input type=" text" id="fName" name="fName[]" class="form-control" />
                </div>
                <!-- Text input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="lName">Last Name</label>
                    <input type="text" id="lName" name="lName[]" class="form-control" />
                </div>
                <!-- Number input -->
                <div class="col">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="birthDate">BirthDate</label>
                        <input type="date" id="birthDate" name="birthDate[]" class="form-control" />
                    </div>
                </div>
                <!-- Message input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="seatNumG">Seat ---></label>
                    <input type="number" id="seatNumG" name="seatNumG[]" class="form-control />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="seatNumC">Seat <--- </label>
                    <input type="number" id="seatNumC" name="seatNumC[]" class="form-control" />
                </div>
            `;
            inputs.append(element);
        }

        // let reserve = document.querySelectorAll('.reserve');
        // reserve.forEach(addEvent);
        // function addEvent(row){
        //     row.addEventListener('click',open(){

        //     });
        // }
        // function open(row){
        // document.querySelector('.volID').value = row.dataset.id.value;

        // }

        // let reserve = document.querySelectorAll('.reserve');
        let resr = document.querySelectorAll('.reserve');
        let resrReturn = document.querySelectorAll('.reserveReturn');
        let cancelRes = document.querySelector('.close');
        let currentReservButtonA, currentReservButtonB;
        let typeFlight = document.querySelector(".typeFlight");

        let roundT = "<?php echo isset($_POST['roundTrip']) ?>";

        // console.log(roundT); 
        if (!roundT) {
            console.log(roundT);
            resr.forEach(function(resr) {
                // console.log(resr.volID);
                // console.log(resr.classList.contains("reserve"));
                resr.setAttribute("data-bs-toggle", "modal");
                resr.setAttribute("data-bs-target", "#staticBackdrop");


                // resr.dataset.bsToggle = "modal";
                // resr.dataset.bsTarget = "#staticBackdrop";

                typeFlight.value = "simple";
                // console.log(resr.dataset.bsToggle);
                // resr.addEventListener('click', setVolID, false);
                // resr.volID = resr.value;
                // console.log(resr.volID);
                // console.log(resr.value);
                // console.log(resr.name);
            });
        } else {
            typeFlight.value = "roundTrip";
        }
        //activate flight row and send flight ID to the popup/form
        resr.forEach(function(resr) {
            // console.log(resr.volID);
            resr.volID = resr.value;
            resr.addEventListener('click', setVolID, false);
            // resr.volID = resr.value;
            // console.log(resr.volID);
            // console.log(resr.value);
            // console.log(resr.name);
        });
        //when simple flight is chosed
        resrReturn.forEach(function(resr) {
            resr.volID = resr.value;
            resr.addEventListener('click', setVolID, false);
        });

        cancelRes.addEventListener("click", setVolID, false);

        function setVolID(evt) {
            // console.log(document.querySelector('.volID').name);

            if (evt.currentTarget.name == 'reserve') {
                if (typeof(currentReservButtonA) !== 'undefined') {
                    currentReservButtonA.classList.remove("btn-secondary");
                    currentReservButtonA.classList.add("btn-success");
                }
                currentReservButtonA = evt.currentTarget; //save the clicked/activated reserve button

                document.querySelector('.volID').value = evt.currentTarget.volID;
                evt.currentTarget.classList.remove("btn-success");
                evt.currentTarget.classList.toggle("btn-secondary");

                if (!evt.currentTarget.classList.contains("btn-secondary")) {
                    evt.currentTarget.classList.add("btn-success");
                }

            } else if (evt.currentTarget.name == 'reserveReturn') {

                if (typeof(currentReservButtonB) !== 'undefined') {
                    currentReservButtonB.classList.remove("btn-secondary");
                    currentReservButtonB.classList.add("btn-success");
                }
                currentReservButtonB = evt.currentTarget; //save the clicked/activated reserve button

                document.querySelector('.volIDReturn').value = evt.currentTarget.volID;

                evt.currentTarget.classList.remove("btn-success");
                evt.currentTarget.classList.toggle("btn-secondary");
                if (!evt.currentTarget.classList.contains("btn-secondary")) {
                    evt.currentTarget.classList.add("btn-success");
                }

            } else if (evt.currentTarget.classList.contains('close')) {
                currentReservButtonA.classList.remove("btn-secondary");
                currentReservButtonA.classList.add("btn-success");
                currentReservButtonB.classList.remove("btn-secondary");
                currentReservButtonB.classList.add("btn-success");
            }
            // console.log(document.querySelector('.volID').value);
        }

        // reserve.forEach(function(element) {
        //     element.addEventListener('click', function() {
        //         var hello = element.dataset.id.value;
        //         console.log(hello);

        //         document.querySelector('.volID').value = element.dataset.id;
        //     })

        // });


        // let reserve = document.querySelectorAll('.reserve');
        //     reserve.forEach(open);
        //     // reserve.addEventListener('click', open);

        //     function open(row) {
        //         row.addEventListener('click', setID(row));

        //     }
        //     function setID(row){
        //         document.querySelector('.volID').value = row.value;
        //     }
    </script>
</body>
<?php require_once APPROOT . '/views/footer.php' ?>

</html>