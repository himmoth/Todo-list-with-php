<?php include 'inc/header.php';

if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

?>

<div class="container">
    
    <!-- <h1 class="text-primary text-center mt-3">Todo List</h1> -->
    <?php if(isset($_GET['id'])):?>
        <a href="index.php" class="btn btn-primary btn-sm">Back</a>

        <form action="create.php?id=<?=$todo->id?>" method="POST" class="text-center d-flex justify-content-center">
        <div class="mb-3 d-flex w-50 gap-2">     
        <input type="text" class="form-control" name="item" id="item" required placeholder="New Task" value="<?=$todo->item;?>">
            
            <input type="submit" name="btn-update" value="Update" class="btn btn-primary">
        </div>
    </form>
     <?php else:?>
        <form action="create.php" method="POST" class="text-center d-flex justify-content-center">
        <div class="mb-3 d-flex w-50 gap-2">     
            <input type="text" class="form-control" name="item" id="item" required placeholder="New Task">
            
            <input type="submit" name="btn-add" value="Add" class="btn btn-primary">
        </div>
    </form>
    <?php endif;?>
   
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Todo Items</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $i = 1;

            ?>
            <?php foreach($todos as $todo):?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?=$todo->item?></td>
                <td><span class="boder-bottom">In progress</span></td>
                <td>
                    <a href="index.php?id=<?=$todo->id;?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="delete.php?id=<?=$todo->id?>" class="btn btn-danger btn-sm">Delete</a>
                    <a href="finish.php?id=<?=$todo->id;?>" class="btn btn-primary btn-sm">Finished</a>

                </td>
            </tr>

                <?php endforeach;?>

        </tbody>
    </table>

    <h1 class="text-center text-success mt-2">Finished</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Todo Items</th>
                <th scope="col">Goal</th>

            </tr>
        </thead>
        <tbody>

            <?php
            $i = 1;
            foreach ($completeds as $completed) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $completed->item ?></td>
                    <td>
                        <p class="text-primary">Done</p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include 'inc/footer.php'?>