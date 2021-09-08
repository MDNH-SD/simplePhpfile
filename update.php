
<?php
 include('form_conn.php');

  $objCrudapp = new Crudapp();

  $objCrudapp->sqlconnection();

  if(isset($_GET['status']))
  {
    if($_GET['status']='edit')
    {
        $id = $_GET['id'];
       $displyEditVal = $objCrudapp->displayValueinEditMode($id);
    }
  }
  if(isset($_POST['edit_btn']))
    {
      $retunmeg = $objCrudapp->editValueRe($_POST);
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

    <title>Update Profile</title>
  </head>


  <body>
    <div class="container my-md-5 p-4 shadow">
        
        <h1 class="success"><a href="#" style="text-decoration: none;">MDNH SD Student Database</a></h1>


        <form action="" method="POST" enctype="multipart/form-data" class="form">
        <input type="text" value="<?php echo $displyEditVal['std_name']; ?>" name="userName" class="form-control mb-md-3">

        <input type="email" value="<?php echo $displyEditVal['std_email']; ?>"  name="email" class="form-control mb-md-2">

        <label for="image">Upload your image</label><br>
        <input type="file" id="image" name="image" class="mb-md-1 form-control"><br>

        <input type="hidden" name="id" id="" value="<?php echo $displyEditVal['ID']; ?>">

        <?php if(isset($retunmeg)){echo $retunmeg;} ?>

        <input type="submit" id="submit_btn" name="edit_btn" value="Update Information" class="btn btn-warning form-control">

        <?php if(isset($retunmeg)){echo "Click on Refresh button to see the result";} ?>

        </form>
    </div>

    <div class="container">
      <a href="./form.php" class="btn btn-primary">Refresh</a>
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