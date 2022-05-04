<?php include_once('inc/dbconfig.php');?>
<?php 
    include_once('inc/class.crud.clic.php');
    /*
    include_once('inc/class.crud.user.php');

    $user = new USER();
    
    if($_POST['action']=="delete"){
        $user->delete($link,$_POST['id']);
        $msg = "<b>Important:</b> Action finished.";
    }

    if($_POST['action']=="add"){
        $user->create($link,$_POST['name'],$_POST['email'],$_POST['startDate']);
        $msg = "<b>Congratulations:</b> User created";
    }

    if($_POST['action']=="update"){
        $userDetails = $user->find($link,$_POST['id']);
    }

    if($_POST['action']=="updateOk"){
        $user->update($link,$_POST['name'],$_POST['email'],$_POST['startDate'], $_POST['id']);
        $msg = "<b>Congratulations:</b> User updated";
        $userDetails = $user->find($link,$_POST['id']);
    }

    if($_POST['action']=="update"){
        $userDetails = $user->find($link,$_POST['id']);
    }

    $results = $user->read($link);
    */
?>

<?php include_once('includes/head.php');?>

<body>

    <?php include_once('includes/header.php');?>

    <!-- content -->
    <div class="container mt-4">
        <? if(!empty($_POST['action'])){?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary alert-sm" role="alert">
                        <?=$msg?>
                    </div>
                </div>
            </div>
        <?}?>
        <div class="row my-auto">

            <div class="col-4">
                <form action="" method="post" class="form-control">
                    <h5>Add User</h5>
                    <input type="text" class="form-control" placeholder="name" required name="name" value="<?=$userDetails['name']?>"><br>
                    <input type="email" class="form-control" placeholder="email" required name="email" value="<?=$userDetails['email']?>"><br>
                    <input type="date" class="form-control" placeholder="Fecha de Inicio" required name="startDate" value="<?=$userDetails['startDate']?>"><br>
                    <?if($_POST['action']=="update" || $_POST['action']=="updateOk" ){?>
                        <input type="hidden" name="action" value="updateOk">
                        <input type="hidden" name="id" value="<?=$userDetails['id']?>">
                        <button class="btn btn-primary form-control btn-sm">Update</button>
                        <a href="./" class="btn btn-warning form-control btn-sm mt-3">Clean</a>
                    <?}else{?>
                        <input type="hidden" name="action" value="add">
                        <button class="btn btn-primary form-control btn-sm">Add</button>
                    <?}?>
                </form>
            </div>

            <div class="col-8 d-flex justify-content-center s">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($result = mysqli_fetch_array($results)){
                        ?>
                            <tr>
                                <td><?=$result['id']?></td>
                                <td><?=$result['name']?></td>
                                <td><?=$result['email']?></td>
                                <td><?=$result['startDate']?></td>
                                <td>
                                    <form method="post" class="d-inline-flex">
                                        <input type="hidden" value="<?=$result['id']?>" name="id">
                                        <input type="hidden" value="update" name="action">
                                        <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('¿Desea modificar... ?')">
                                            <i class="fa icon-edit"></i>
                                        </button>
                                    </form>
                                    <form method="post" class="d-inline-flex">
                                        <input type="hidden" value="<?=$result['id']?>" name="id">
                                        <input type="hidden" value="delete" name="action">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar... ?')">
                                            <i class="fa icon-remove"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?}?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    

    
    <?php include_once('includes/footer.php');?>

</body>
</html>