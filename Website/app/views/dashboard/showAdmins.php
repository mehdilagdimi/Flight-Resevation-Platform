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
                    <th scope="col">Admin ID</th>
                    <th scope="col">Privilege</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Birth Date</th>
                    <th scope="col">Created At</th>
                    <th scopre="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['admins'] as $admin) { ?>
                    <tr id="<?php echo $admin->adminID; ?>">
                        <th scope="row"><input style="color:white;" type="checkbox" id="" name="" value=""></th>
                        <td><?= $admin->adminID; ?></td>
                        <td><?= $admin->privilege ; ?></td>
                        <td><?= $admin->fName; ?></td>
                        <td><?= $admin->lName; ?></td>
                        <td><?= $admin->phone; ?></td>
                        <td><?= $admin->email; ?></td>
                        <td><?= $admin->birthDate; ?></td>
                        <td><?= $admin->createdAt; ?></td>
                        <td>
                            <div class="">
                                <form class="" action="" method="POST">
                                    <input type="text" name="id_vol" hidden value="<?= $admin->adminID; ?>">
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
