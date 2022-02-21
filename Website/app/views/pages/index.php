
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
    <head></head>


    <body>
        <!-- <div class="scroll">
                <table style="table-layout: fixed; width : 100%; color:white;">
                    <tr>
                        <th><input style="color:white;" type="checkbox" id="" name="" value=""></th>
                        <th>#</th>
                        <th class="Hide_Name">Name</th>
                        <th>Price</th>
                        <th class="Hide_Cat">Category</th>
                        <th class="Hide_Date">Add Date</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($data['flights'] as $nft) { ?>
                        <tr id="<?php echo $nft['id']; ?>" onclick="ActivateRow('<?php echo $nft['id']; ?>')">
                            <td class="center"><input type="checkbox" id="" name="" value=""></td>
                            <td class="NFT-img"><a  href="#"><img src="<?php echo $nft['imgSrc'] ?>"></a></td>
                            <td class="Hide_Name"><a href="#"><?php echo $nft['productName'] ?></a></td>
                            <td><a href="#"><?php echo $nft['price'] ?></a></td>
                            <td class="Hide_Cat"><a href="#"><?php echo $nft['catName'] ?></a></td>
                            <td class="Hide_Date"><a href="#"><?php echo $nft['createdAt']; ?></a></td>
                            <td>
                                <div class="actions flex center">
                                    <form class="form_delete_button" action="crud_DB.php" method="POST">
                                        <input type="text" name="id_product" hidden value="<?php echo $nft['id']; ?>">
                                        <button class="DELETE_BUTTON filter-red" name="delete" style="background : none; border : none"><a href="#"><img  src="public/assets/images/delete.svg"></a></button>
                                    </form>
                                    <button class="UPDATE_BUTTON filter-green" name="update" style=" background : none; border : none"><a href="#"><img  src="public/assets/images/update.svg"></a></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Send id of product to highlight the row if clicked -->
                    <?php } ?>
                </table>
        </div> -->
    </body>
</html>

