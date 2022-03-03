<?php

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
    </head>

    <body>
        <table class="table table-dark text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Reservation Number</th>
                    <!-- <th scope="col">Flight ID</th> -->
                    <th scope="col">Passenger Name</th>
                    <th scope="col">Departure Date</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Arrival Date</th>
                    <th scope="col">Seat Number</th>
                    <th scope="col">Price</th>
                    <th scope="col">Seat Number</th>
                     <th scope="col">Going / Coming</th>
                    <th scope="col">Date of Reservation</th>
                    <!-- <th scopre="col"></th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['reservations'] as $reservation) { ?>
                    <tr id="<?php echo $reservation->reservID; ?>">
                        <th scope="row"><input style="color:white;" type="checkbox" id="" name="" value=""></th>
                        <td><?= $reservation->reservID; ?></td>
                        <td><?= "$reservation->fName  $reservation->lName" ;?></td>
                        <!-- <td><?= $reservation->lName; ?></td> -->
                        <td><?= $reservation->departureDate; ?></td>
                        <td><?= $reservation->departAirport; ?></td>
                        <td><?= $reservation->destAirport; ?></td>
                        <td><?= $reservation->arrivalDate; ?></td>
                        <td><?= $reservation->seatNum; ?></td>
                        <td><?= $reservation->price; ?></td>
                        <td><?= $reservation->goingComing; ?></td>
                        <td><?= $reservation->dateReserv; ?></td>
                       
                        <td >
                            <div class="d-flex flex-row justify-content-between">
                                <form class="" action="<?=URLROOT?>flights/updateFlight" method="POST">
                                    <input type="text" name="id_reserv" hidden value="<?= $reservation->reservID; ?>">
                                    <button class="btn btn-outline-secondary" name="update" style="">SHOW DETAILS</button>
                                </form>
                                <form class="" action="<?=URLROOT?>flights/deleteFlight" method="POST">
                                    <input type="text" name="id_reserv" hidden value="<?= $reservation->reservID; ?>">
                                    <button class="btn btn-outline-danger" name="delete" style="">CANCEL</button>
                                </form>
                            </div>
                        </td>     
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>