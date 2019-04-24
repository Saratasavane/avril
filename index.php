        <?php include 'header.php'; ?>
        <?php 

         $mysqli=new mysqli('localhost','root','','construction');
    if($mysqli->connect_error){
        printf("can not connect database %s\n",$mysqli->connect_error);
        exit();
    }
    $query="SELECT * FROM property";
    $read=$mysqli->query(query);

        ?>
        
        <div class="container-fluid">
           <div class="banner">
            <section id="carousel">
                    
                        <div class="carousel slide text-center" data-ride="carousel" id="mycarousel">
                            <ol class="carousel-indicators">
                                <li data-target="#mycarousel" data-slide-to="0"></li>
                                <li data-target="#mycarousel" data-slide-to="1"></li>
                                <li data-target="#mycarousel" data-slide-to="2"></li>
                                <li data-target="#mycarousel" data-slide-to="3"></li>
                                <li data-target="#mycarousel" data-slide-to="4"></li>
                                <li data-target="#mycarousel" data-slide-to="5"></li>
                                <li data-target="#mycarousel" data-slide-to="6"></li>
                                <li data-target="#mycarousel" data-slide-to="7"></li>
                                <li data-target="#mycarousel" data-slide-to="8"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="images/banner.png">
                                    <h1>Trouvez votre oasis de vacances au dans nos localites</h1>
                                
                                </div>
                                <div class="item">
                                    <img src="images/banner-a.jpg">
                                    <h1>Soyez la bienvenue</h1>
                                </div>
                                <div class="item">
                                    <img src="images/banner1.jpg">
                                    <h1>Laissez votre voyage vous emmener encore plus loin</h1>
                                </div>
                                <div class="item">
                                    <img src="images/buy-property.jpg">
                                    <h1>Faites vous chouchouter comme une star en profitant du service exclusif de notre etablissement</h1>
                                </div>
                                <div class="item">
                                    <img src="images/comner-banner.jpg">
                                    <h1>Faites la decouverte de nos localites</h1>
                                </div>
                                <div class="item">
                                    <img src="images/Northern-Investment-Banner-1.jpg">
                                    <h1>Des appartements paradisiaques</h1>
                                </div>
                                <div class="item">
                                    <img src="images/property-banner-01.jpg">
                                    <h1>Des chambres magnifiques</h1>
                                </div>
                                
                            </div>
                            
                        </div>
                    
                    <a href="#mycarousel" class="left carousel-control" role="button" data-slide="pev" id="a1">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                     <a href="#mycarousel" class="right carousel-control" role="button" data-slide="next" id="a2">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                    
                </section>
           </div>
            
        </div>
        
        <div class="container">
           <h2>Property list</h2>
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
                <?php while ($row=$read->fetch_assoc()){ ?>
                  <tr class="success">
                      <td>1</td>
                      <td><?php echo  $row['name'];  ?></td>
                      <td><?php echo  $row['mensuel'];  ?></td>
                      <td><?php echo  $row['Address'];  ?></td>
                      <td><img src="uploads/<?php echo  $row['images']; ?>"></td>
                      <td><a href="read.php?posts=<?php echo  $row['id'];  ?>">Voir le profil</a></td>
                  </tr>
                  <?php } ?>
                  
              </tbody>
               
               
           </table>
            
        </div>
        <?php include 'footer.php';?>
        
        
    