<?php include '../inc/header.php';

// if(!isset($_SESSION['username'])){
//     header('Location: login.php');
// }

?>


<div class="container">
    
    <h1 class="text-primary mt-3">All Users </h1>

   
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $i = 1;

            ?>
            <?php foreach($users as $user):?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?=$user->username?></td>
                <td><?=$user->email?></td>
                <td>
                    <a href="index.php?id=<?=$user->id;?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="delete.php?id=<?=$user->id?>" class="btn btn-danger btn-sm">Delete</a>

                </td>
            </tr>

                <?php endforeach;?>

        </tbody>
    </table>

   
</div>
<?php include '../inc/footer.php'?>