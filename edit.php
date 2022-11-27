<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OOP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
     <div class="container">
        <div class="card mt-5">
            <div class="card-header">user upDATE
            <a href="index.php" class="btn btn-sm btn-success float-end">User List</a>
            </div>
            <div class="card-body">
                <?php
                
                   include "database.php";

                   $model = new Model();
                   $id =$_REQUEST['id'];
                   $row = $model->edit($id);
                
                   if(isset($_POST['submit'])){
                    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
                        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])){

                          $data['id'] = $id;
                          $data['name'] = $_POST['name'];
                          $data['email']  = $_POST['email'];
                          $data['phone']  = $_POST['phone'];
        
                          $update = $model-> update($data);
        
                          if($update){

                             
                            echo "<script>alert('user has been updated.')</script>";
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
                ?>
                <form action="" method="POST">
                <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" value ="<?php echo $row ['name'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" value ="<?php echo $row ['email'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                    <input type="tel" name="phone" value ="<?php echo $row ['phone'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
            
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
        
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>