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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
    </head>

    <body>
        <table class="table table-dark table-hover">
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
                        <td><?= $flight->departureDate; ?></td>
                        <td><?= $flight->departureAdress ; ?></td>
                        <td><?= $flight->destinationAdress; ?></td>
                        <td><?= $flight->arrivalDate; ?></td>
                        <td><?= $flight->availableSeats; ?></td>
                        <td><?= $flight->plane; ?></td>
                        <td><?= $flight->price; ?></td>
                        <td>
                            <div class="">
                                <form class="" action="" method="POST">
                                    <input type="text" name="id_vol" hidden value="<?= $flight->volID; ?>">
                                    <a href="#"><i style="color:white;" class="fa-solid fa-circle-plus"></i></a>
                                </form>
                                <a href="#"><i class="fa-solid fa-rotate-right"></i></a>
                            </div>
                        </td>     
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>

