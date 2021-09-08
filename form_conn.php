<?php
    Class Crudapp{
            public $servername,$username,$password,$dbname,$usrName,$usrEmail,$usrimagename,$usrimageTmpname,$insert,$conn;
        // function for connecion creat
        function sqlconnection()
                {
                    $this->servername = "127.0.0.1";
                    $this->username = "root";
                    $this->password = "";
                    $this->dbname ="student_info";
        
                    // Create connection
                    $this->conn = new mysqli($this->servername,$this->username, $this->password,$this->dbname);
        
                    // Check connection
                    if ($this->conn->connect_error)
                       {
                      die("Connection failed: " . $this->conn->connect_error);
                       }
                }

        // value receive
                public function valuereceive($_Value)
                {
    
                    $this->usrName = $_Value["userName"];
                    $this->usrEmail = $_Value['email'];
                    $this->usrimagename = $_FILES['image']['name'];
                    $this->usrimageTmpname = $_FILES['image']['tmp_name'];
                }



    // value sent to Database
                public function valuesent()
                {
                     $this->insert = "INSERT INTO  st_details(std_name,std_email,std_image) VALUE('$this->usrName','$this->usrEmail','$this->usrimagename')";

                    if(mysqli_query($this->conn,$this->insert))
                      {
                    move_uploaded_file($this->usrimageTmpname,'upload_image/'.$this->usrimagename);
                    return "successcully Added";
                      }

                }
    // This function for display data which is receive from database
            public function display()
                {
                  $queryforcol = "SELECT * FROM st_details";

                  if(mysqli_query($this->conn,$queryforcol))
                  {
                      $displaydata = mysqli_query($this->conn,$queryforcol);
                      return $displaydata;
                  }

                }


//Start the  work of edit.php 
    //Display Data in edit mode in edit.php page

    public function displayValueinEditMode($id)
           {
            $queryforcol = "SELECT * FROM st_details WHERE ID=$id";
                  if(mysqli_query($this->conn,$queryforcol))
                    {
                      $valuesFromDb = mysqli_query($this->conn,$queryforcol);
                      $valueFromDb = mysqli_fetch_assoc($valuesFromDb);
                      return $valueFromDb;
                    }

                  
           }


//Edit value Receive from edit.php and update value
           public function editValueRe($value)
            {
              $usrName = $value["userName"];
              $usrEmail = $value['email'];
              $usrimagename = $_FILES['image']['name'];
              $usrimageTmpname = $_FILES['image']['tmp_name'];
              $usrid = $value["id"];


              $updateQuery = "UPDATE st_details SET std_name='$usrName',std_email ='$usrEmail',std_image='$usrimagename' WHERE ID=$usrid";

              if(mysqli_query($this->conn,$updateQuery))
                {
                  move_uploaded_file($usrimageTmpname,'upload_image/'.$usrimagename);
                  return "Data uploaded successfully";
                }


            }

  //Delete Data from data base and image from upload_img file in form.php
  public function deleteData($id)
  {
    $queryforcol = "SELECT * FROM st_details WHERE ID=$id";
    $DataFrmDb = mysqli_query($this->conn,$queryforcol);
    $dataFetch = mysqli_fetch_assoc($DataFrmDb);
    $imgNamecol ='upload_image/'.$dataFetch['std_image'];

    $queryForDel ="DELETE FROM st_details WHERE ID=$id";
    if(mysqli_query($this->conn,$queryForDel))
      {

// ei function ta o kaj korlona
        if($imgNamecol===null)
          {
            die($imgNamecol);
          }
          else
            {
              unlink($imgNamecol);
          return "Successfully Deleted Your Profile";
            }
      }
  }




    }

?>