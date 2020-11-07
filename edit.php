<?php

require 'config.php';


if($_POST)
{
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
    $result = $pdostatement->execute();
    

    if($result)
    {
        echo "<script>
        alert('New todo is updated');
        window.location.href = 'index.php ';
        </script>";
    }
}
    else{
        $pdostatment = $pdo->prepare("Select * from todo where id =". $_GET['id']);
        $pdostatment->execute();
        $result = $pdostatment->fetchAll();

    }
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
<div class="card">
    <div class="card-body">
        <div>
            <h5 class="card-title">Edit Todo</h5>
        </div>

        <form action="" class="" method="post">
            <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
            <div class="form-group clearfix">
                <div class="col-sm-3 float-md-left text-left">
                    <p><strong> Title </strong></p>
                </div> <!-- form group -->

                <div class="col-sm-10 float-md-left">
                    <input type="text" name="title" value="<?php echo $result[0]['title'] ?>" required="" class="form-control">
                </div>
            </div> <!-- form group -->
          
            <div class="form-group clearfix">
                <div class="col-sm-3 float-md-left text-left">
                <p><strong> Description </strong></p>
                </div> <!-- form group -->

                <div class="col-sm-10 float-md-left">
                    <textarea cols="10" name="description" rows="10" class="form-control"><?php echo $result[0]['description'] ?></textarea>
                </div>
            </div> <!-- form group -->

            <div class="form-group ml-3">
                <input type="submit" value="UPDATE" class="btn btn-primary">
                <a href="index.php" class="btn btn-default">Back</a>
            </div>
        </form>
    </div>  <!-- card-body -->
</div>
</body>
</html>