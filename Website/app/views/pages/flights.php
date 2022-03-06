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
        resr.forEach(function(resr) {
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
<?php require_once APPROOT . '/views/footer.php' ?>

</html>