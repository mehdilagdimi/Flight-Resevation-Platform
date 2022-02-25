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
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
</head>

<body>
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
                            <form class="" action="<?= URLROOT ?>flights/updateFlight" method="POST">
                                <input type="text" name="id_vol" hidden value="<?= $flight->volID; ?>">
                                <button class="btn btn-success" name="reserve" style="">RESERVE</button>
                            </form>
                            <!-- add a button for cancelling reservation -->
                            <form class="" action="<?= URLROOT ?>flights/deleteFlight" method="POST">
                                <input type="text" name="id_vol" hidden value="<?= $flight->volID; ?>">
                                <button class="btn btn-warning" name="cancel" style="">CENCEL</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>