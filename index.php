
<?php
 include('form_conn.php');

  $objCrudapp = new Crudapp();

  $objCrudapp->sqlconnection();

  if(isset($_POST['submit']))
        {
            $objCrudapp->valuereceive($_POST);
        }



    $displaydatas = $objCrudapp->display();


    if(isset($_GET['status']))
    {
        if($_GET['status']='delete')
        {
            $idForDel = $_GET['id'];
           $delMsg = $objCrudapp->deleteData($idForDel);
        }
    }
    
?>









<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Form data collecting</title>
  </head>
  <body>
     
    <div class="container my-md-5 p-4 shadow">
        
        <h1 class="success"><a href="#" style="text-decoration: none;">MDNH SD Student Database</a></h1>


        <form action="" method="POST" enctype="multipart/form-data" class="form">

        <?php if(isset($_POST['submit'])) {echo $objCrudapp->valuesent();} ?><br>
        <?php if(isset($_POST['submit'])) {echo "Click on refresh button and scroll down to see the result";} ?>

        <input type="text" placeholder="Inter your name" name="userName" class="form-control mb-md-3" required>

        <input type="email" placeholder="Inter your email" name="email" class="form-control mb-md-2" required>

        <label for="image">Upload your image</label><br>
        <input type="file" id="image" name="image" class="mb-md-1 form-control" required><br>

        <input type="submit" id="submit_btn" name="submit" value="Add Information" class="btn btn-warning form-control">

        <?php if(isset($delMsg)){echo $delMsg;} ?><br>
        <?php if(isset($delMsg)){echo "Click on refresh button to see the result";} ?>

        <p id="para"></p>

        </form>
    </div>
<!-- Refresh Buttom -->
<div class="container">
          <a href="form.php" class="btn btn-primary">Refresh</a>
      </div>
<!-- second table start -->
    <div class="container shadow my-md-5 p-4">

        <table class="table table-responsive">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
<?php while($displaydata = mysqli_fetch_assoc($displaydatas)){   ?>
            <tbody>
                <tr>
                    <td><?php echo $displaydata['ID'] ?></td>
                    <td><?php echo $displaydata['std_name'] ?></td>
                    <td><?php echo $displaydata['std_email'] ?></td>
                    <td><img src="./upload_image/<?php echo $displaydata['std_image'] ?>" style="width: 100px; height: 60px;" alt="আপনি ছবি আপলোড করেননি"></td>
                    <td>
<!-- edit button -->
                        <button class="btn btn-success"><a href="./update.php?status=edit&&id=<?php echo $displaydata['ID'] ?>" style="text-decoration: none; color: white;">
                        Edit</a></button>
<!-- Delete button -->
                        <button class="btn btn-danger"><a href="?status=delet&&id=<?php echo $displaydata['ID'] ?>" style="text-decoration: none; color: white;">
                        Delete</a></button>
                    </td>
                </tr>
            </tbody>
            <?php  }  ?>
        </table>
    </div>
    








<script src="./index.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>