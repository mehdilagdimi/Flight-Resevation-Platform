<?php
    //  foreach($data['planes'] as $plane){
    //     echo "Plane model : " . $plane->model;
    //     echo '<br>';
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
                    <th scope="col">Plane ID</th>
                    <th scope="col">Model</th>
                    <th scope="col">Number of Seats</th>
                    <th scopre="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['planes'] as $plane) { ?>
                    <tr id="<?php echo $plane->planeID; ?>">
                        <th scope="row"><input style="color:white;" type="checkbox" id="" name="" value=""></th>
                        <td><?= $plane->planeID; ?></td>
                        <td><?= $plane->model ; ?></td>
                        <td><?= $plane->seats; ?></td>
                        <td>
                        <div class="d-flex flex-row justify-content-between">
                                <form class="" action="<?=URLROOT?>flights/updateFlight" method="POST">
                                    <input type="text" name="id_vol" hidden value="<?= $plane->planeID; ?>">
                                    <button class="btn btn-primary" name="update" style="">UPDATE</button>
                                </form>
                                <form class="" action="<?=URLROOT?>flights/deleteFlight" method="POST">
                                    <input type="text" name="id_plane" hidden value="<?= $plane->planeID; ?>">
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
