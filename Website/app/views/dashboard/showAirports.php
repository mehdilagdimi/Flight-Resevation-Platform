<?php
    // var_dump($data);
    // echo 'hello from showusers';
    // foreach($data['users'] as $user){
    // echo 'Name of user ' . $user->id . ' : ' . $user->user_name . '<br>';
    // echo 'Pass of user ' . $user->id . ' : ' . $user->user_pass . '<br>';
    // }
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
                    <th scope="col">Airport ID</th>
                    <th scope="col">Location</th>
                    <th scopre="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['airports'] as $airport) { ?>
                    <tr id="<?php echo $airport->airportID; ?>">
                        <th scope="row"><input style="color:white;" type="checkbox" id="" name="" value=""></th>
                        <td><?= $airport->airportID; ?></td>
                        <td><?= $airport->airportAdress ; ?></td>
                        <td>
                            <div class="d-flex flex-row justify-content-between">
                                <form class="" action="<?=URLROOT?>flights/updateFlight" method="POST">
                                    <input type="text" name="id_vol" hidden value="<?= $airport->airportID; ?>">
                                    <button class="btn btn-primary" name="update" style="">UPDATE</button>
                                </form>
                                <form class="" action="<?=URLROOT?>flights/deleteFlight" method="POST">
                                    <input type="text" name="id_vol" hidden value="<?= $airport->airportID; ?>">
                                    <button class="btn btn-danger" name="delete" style="">DELETE</button>
                                </form>
                            </div>
                        </td>     
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
