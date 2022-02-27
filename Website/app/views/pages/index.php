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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
</head>

<body>


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

                            <div class="form-outline mb-4">
                                <label class="form-label" for="fName"">First Name</label>
                                <input type=" text" id="fName" name="fName" class="form-control" />
                            </div>


                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="lName">Last Name</label>
                                <input type="text" id="lName" name="lName" class="form-control" />

                            </div>


                            <!-- Number input -->
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="birthDate">BirthDate</label>
                                    <input type="date" id="birthDate" name="birthDate" class="form-control" />

                                </div>

                                <!-- Text input -->
                                <div class="form-outline mb-4">
                                    <select class="form-select" name="type" aria-label="Default select example">
                                        <option selected>Type of Flight</option>
                                        <option value="simpleFlight">Simple Flight</option>
                                        <option value="roundTrip">Round Trip</option>
                                    </select>
                                    <!-- <label class="form-label" for="id_state">Going/Coming</label>
                                    <input type="text" id="id_state" name="id_state" class="form-control" /> -->
                                </div>
                            </div>
                            <!-- Message input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="seatNum">Seat</label>
                                <input type="number" id="seatNum" name="seatNum" class="form-control" />

                            </div>
                            <!-- Submit button -->
                            <div class="form-outline d-flex flex-row justify-content-end">
                                <input type="hidden" class="volID" name="volID" value="">
                                <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addReservation" class="btn btn-success btn-block mx-1">ADD RESERVATION</button>
                            </div>
                        </div>
                        <!-- </form> -->
                </div>

            </div>
        </div>
    </div>
    <table class="table table-dark table-hover text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Departure</th>
                <th scope="col">Destination</th>
                <th scope="col">Arrival Date</th>
                <th scope="col">Available Seats</th>
                <th scope="col">Plane</th>
                <th scope="col">Price</th>
                <th scopre="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['flights'] as $flight) { ?>
                <tr id="<?php echo $flight->volID; ?>">
                    <th scope="row"><input style="color:white;" type="checkbox" id="" name="" value=""></th>
                    <td><?= $flight->departureAdress; ?></td>
                    <td><?= $flight->destinationAdress; ?></td>
                    <td><?= $flight->departureDate; ?></td>
                    <td><?= $flight->arrivalDate; ?></td>
                    <td><?= $flight->availableSeats; ?></td>
                    <td><?= $flight->plane; ?></td>
                    <td><?= $flight->price; ?>DHs</td>
                    <td>
                        <div class="d-flex flex-row justify-content-between">
                            <!-- ADD RESERVATION POP UP  -->
                            <!-- Button trigger modal -->
                            <!-- <input type="text" name="flightID" hidden data-id="<?= $flight->volID ?>"> -->
                            <button type="button" class="btn btn-success reserve" name="reserve" value="<?= $flight->volID; ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">RESERVE</button>
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
    </form>

    <script>
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
        resr.forEach(function(resr){
            resr.addEventListener('click', setVolID, false);
            resr.volID = resr.value;
            // console.log(resr.volID);
            // console.log(resr.value);
        })
        

        function setVolID(evt) {
            // console.log(document.querySelector('.volID').name);
            document.querySelector('.volID').value = evt.currentTarget.volID;
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

</html>