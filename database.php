<?php

class Model {
    private $server = 'localhost';
    private $username = 'root';
    private $password;
    private $dbname = 'batch_four';
    private $connect;


    public function __construct(){

      try{
        $this->connect = new mysqli($this->server,$this->username,$this->password,$this->dbname);

      }
      catch(Exception $exception){

         echo "connection Failed".$exception->getMessage();

      }

    }

    public function insert()
    {
        if(isset($_POST['submit'])){
            if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
                if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])){
                  $name = $_POST['name'];
                  $email = $_POST['email'];
                  $phone = $_POST['phone'];

                  $query = "INSERT INTO users (name,email,phone) VALUES ('$name','$email','$email')";

                  if($this->connect->query($query)){
                    echo "<script>alert('user has been created.')</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                  }else{
                    echo "<script>alert('sorry try again.')</script>";
                    echo "<script>window.location.href = 'create.php';</script>";
                  }
                }
                else{
                  echo "<script>alert('empty data.')</script>";
                }
            }
        }
    }

    public function getAllData()
    {
       $data = null;
       $query = "SELECT * FROM users";
       if($sql = $this->connect->query($query)){
           while($row = mysqli_fetch_assoc($sql)){
              $data[] = $row;
           }
       }
       return $data;
    }

    public function edit($id)
    {
      $data = null;
      $query = "SELECT * FROM users WHERE id ='$id'";
      if($sql = $this->connect->query($query)){
        while($row = mysqli_fetch_assoc($sql)){
          $data=$row;
       }
      }
      return $data;
    }

    public function update($data)
    {
        $update = "UPDATE users SET name = '$data[name]', email = '$data[email]', phone = '$data[phone]' WHERE id='$data[id]'";
        if($this->connect->query($update)){
          return true;
        }else{
          return false;
        }
    }

    public function delete($id)
    {
      $query = "DELETE FROM users WHERE id='$id'";

      if($this->connect->query($query)){
        return true;
      }
      else{
        return false;
      }
    }







}

?>