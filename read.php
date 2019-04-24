<?php include 'header.php'; ?>

<?php
$mysqli=new mysqli('localhost','root','','construction');
    if($mysqli->connect_error){
        printf("can not connect database %s\n",$mysqli->connect_error);
        exit();
    }

if(isset($_GET['posts'])){
   
    $id=$_GET['posts'];
    $query2="SELECT * FROM property where id='$id'";
    $readd=$mysqli->query($query2);
    
}


?>

<style type="text/css">
    .rooms img
    {
        width: 50px;
        height: 50px;
    }

</style>
<div class="container">
   <h3>profil</h3>
    
<hr>
           
           <table class="table table-striped table-hover">
              <thead>
                  <tr>
                      <th>property name</th>
                      <th>mensuel</th>
                      <th>Address</th>
                      <th>espace</th>
                      <th>descrip</th>
                  </tr>
              </thead>
              <tbody>
                <?php while ($row=$readd->fetch_assoc()){ ?>
                  <tr class="success">
                      <td>1</td>
                      <td><?php echo  $row['name'];  ?></td>
                      <td><?php echo  $row['mensuel'];  ?></td>
                      <td><?php echo  $row['Address'];  ?></td>
                      <td class="rooms">
                         <?php 
                          $image_name="SELECT * FROM
                            
                                    property as p
                                    join details as d
                                    on p.id =d.proid where d.proid =" .$row['id'];
                                    $read1=$mysqli->query($image_name);
                                    
                                    foreach ($read1 as $value){ ?>
                                    
                                        <img src="uploads/<?php echo $value['images'];?>">

                                    <?php } ?>
                          ?>
                          
                      </td>
                  </tr>
                  <?php } ?>
               </tbody>
    </table>                                           
    












</div>

<?php include 'footer.php'; ?>