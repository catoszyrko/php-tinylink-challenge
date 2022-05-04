<?php include_once('inc/dbconfig.php');?>
<?php 
    include_once('inc/class.crud.clic.php');

    $clic = new CLIC();
    $results = $clic->read($link);
?>


<?php include_once('includes/head.php');?>

<body>

    <?php include_once('includes/header.php');?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th><b>URL</b></th>
                            <th><b>Quantity</b></th>
                            <th><b>NewUrl</b></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while($result= mysqli_fetch_array($results)){
                        ?>
                        <tr>
                            <td><?=$result['url']?></td>
                            <td><?=$result['quantity']?></td>
                            <td>
                                <a href="?url=<?=$result['url']?>">
                                    <?=$result['newUrl']?>
                                </a>
                            </td>

                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include_once('includes/footer.php');?>

</body>
</html>
