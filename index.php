<?php

require 'config.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php

$pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
$pdostatement -> execute();
$result = $pdostatement->fetchAll();

?>
<div class="card" ">
    <div class="card-body">
        <div>
            <h5 class="card-title">To do Home Page</h5>
        </div>

        <div class="row">
            <a href="add.php" type="button" class="btn btn-primary ml-3">Create New</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if($result){
                    foreach($result as $key=> $value)
                    {
            ?>
                <tr>
                    
                    <td><?php echo ++$key; ?></td>
                    <td><?php echo $value['title'] ?></td>
                    <td><?php echo $value['description'] ?></td>
                    <td><?php echo date('Y-m-d' , strtotime($value['created_at'])); ?></td>
                    <td>
                    <a href="edit.php?id=<?php echo $value['id']; ?>" class="btn btn-primary" type ="button" > Edit</a>
                    <a href="delete.php?id=<?php echo $value['id']; ?>" class="btn btn-danger" type ="button" > Delete</a>


                    </td>
                </tr>
                <?php
                    }
                }
            ?>
            </tbody>
        </table>
    </div>  <!-- card-body -->
</div> <!-- card -->

</body>
</html>