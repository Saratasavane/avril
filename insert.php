<?php include 'header.php'; ?>

<?php
$mysqli=new mysqli('localhost','root','','construction');
    if($mysqli->connect_error){
        printf("can not connect database %s\n",$mysqli->connect_error);
        exit();
    }

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mensuel=$_POST['mensuel'];
    $Address=$_POST['Address'];
    $espace=$_POST['espace'];
    $descrip=$_POST['descrip'];
   
    
    $target_dir="uploads/";
    $target_file=$target_dir .basename($_FILES['images']['name']);
    $temp_file=$_FILES['images']['name'];
    move_uploaded_file($_FILES['images']['tmp_name'], $target_file);
    
    
    $query="INSERT INTO property(name,mensuel,address,espace,descrip,images) VALUES('/')";
    $insert=$mysqli->query($query);
    $last_id = $mysqli->insert_id;
    $c=count($_FILES['img']['name']);
    if($insert){
     
        if($c < 10){
            
            for($i=0; $i <$c; $i++) {
                img_name=$FILES['img']['name'][$i];
                move_uploaded_file($_FILES['img']['tmp_name'][$i] , "uploads/" .$img_name);
                $query_multi="INSERT INTO details(images,proid) VALUES ('$img_name','$last_id')";
                $ins=$mysqli->query($query_multi);
            }

        }
    }
    
}



?>
<!DOCTYPE html>
<html lang="fr">
    <head>
       <meta charset="utf-8">
        <title>formulaire</title>
    </head>
    <body>
    <div class="container">
      
    <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">     
  <fieldset>
    <legend>Add a property</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Name of property</label>
      <div class="col-lg-10">
        <input type="text" name="name" class="form-control"placeholder="Name of property" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword"class="col-lg-2 control-label">Charge mensuel </label>
      <div class="col-lg-10">
        <input type="password" id="inputPassword" name="mensuel" class="form-control" placeholder="monthly charge">
      </div>
      </div>
      <div class="form-group">
      <label for="textArea"class="col-lg-2 control-label">Address:</label>
      <div class="col-lg-10">
      <textarea class="form-control" rows="3" name="Address" id="textArea"></textarea>
        </div>
      </div>
      <div class="form-group">
      <label for="inputPassword"class="col-lg-2 control-label">Espace au sol: </label>
      <div class="col-lg-10">
      <input type="text" class="form-control" name="espace" placeholder="Floor space">
        </div>
      </div>
      <div class="form-group">
      <label for="textArea"class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
      <textarea class="form-control" rows="3" name="descrip" id="textArea"></textarea>
        </div>
      </div>
      <div class="form-group">
      <label for="textArea"class="col-lg-2 control-label">featuread image</label>
      <div class="col-lg-10">
      <input type="file" name="images">
        </div>
      </div>
      <div class="form-group">
      <label for="textArea"class="col-lg-2 control-label">rooms image</label>
      <div class="col-lg-10">
      <input type="file" name="img[] multiple">
        </div>
      </div>
      <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
         <button type="reset" class="btn btn-danger">Retour</button>
         <button type="submit" name="submit"class="btn btn-primary">Envoyer</button>
        </div>   
      </div>
                
    </fieldset>
    </form>
    </div>
               
               
                
            
    </body>

<?php include 'footer.php'; ?>
</html>


