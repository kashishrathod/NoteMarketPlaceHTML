<?php include "db_connection.php";

$limit = 4; 
 
if (isset($_GET["page"])){
    $page1 = $_GET["page"]; 
    } 
    else{ 
     $page1=1;
    }
$start_from1 = ($page1-1) * $limit;
   

if(isset($_POST['search'])){

    $buyer_request = $_POST['buyer_request'];
    $result_db = mysqli_query($conn,"SELECT COUNT(download_id) FROM downloads where note_title LIKE '%$buyer_request%'"); 
    $row_db = mysqli_fetch_row($result_db);  
    $total_records = $row_db[0];  
    $total_pages = ceil($total_records / $limit);   

    $query = "SELECT downloads.note_title, downloads.note_category, reference_data.ref_value,
    downloads.purchased_price, downloads.downloaded_date FROM downloads LEFT JOIN reference_data ON downloads.ispaid=reference_data.reference_id
    WHERE downloads.note_title LIKE '%$buyer_request%' LIMIT $start_from1, $limit";

    $result = mysqli_query($conn, $query); 

  }
  else{
    $result_db = mysqli_query($conn,"SELECT COUNT(download_id) FROM downloads"); 
    $row_db = mysqli_fetch_row($result_db);  
    $total_records = $row_db[0];  
    $total_pages = ceil($total_records / $limit); 
    $query = "SELECT downloads.note_title, downloads.note_category, reference_data.ref_value,
    downloads.purchased_price, downloads.downloaded_date FROM downloads LEFT JOIN reference_data ON
    downloads.ispaid=reference_data.reference_id LIMIT $start_from1, $limit";
    $result = mysqli_query($conn, $query); 
  }



?>

<html>

<head>
    <!--meta tages-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
    <!--title-->
    <title>Notes Marketplace</title>
    <!--favicon-->
    <link rel="shortcut icon" href="img/home/favicon.ico">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<?php include "nav.php";
       
       ?>

    <section id="buyer-request">
        <div class="container buyer">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-4 col-12 general">
                    <h4>Buyer-request</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-8 col-12 general">
                   <form action="buyerrequest.php" method="POST">
                    <button type="submit" class="btn" name="search">Search</button>
                    <input type="text" name="buyer_request" placeholder='  &#xf002;  Search' />
                    </form>
                </div>
            </div>
            <div class="row">
                
                   <div class="table-responsive">
                    <table class="table border dashboard-width">
                        <thead>
                            <tr>
                                <th scope="col">SR NO.</th>
                                <th scope="col">NOTE TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">BUYER</th>
                                <th scope="col">PHONE NO</th>
                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">DOWNLOADED DATE/TIME</th>
                                <th scope="col"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        
                          <?php
                          $i=1;

                        while($row = mysqli_fetch_assoc($result)){

                            
                            $note_title = $row['note_title'];
                            $category_name = $row['note_category'];
                            $ref_value = $row['ref_value'];
                            $purchased_price = $row['purchased_price'];
                            $downloaded_date = $row['downloaded_date'];

                            
                        
                            echo "<tr>
                                <td>$i</td>
                                <td>$note_title</td>
                                <td>$category_name</td>
                                <td>testing123@gmail.com</td>
                                <td>+91 9845798765</td>
                                <td>$ref_value</td>
                                <td>$purchased_price</td>
                                <td>$downloaded_date</td>
                                <td>";
                                echo "<div class='display-block'>";
                                 echo "<img src='img/dashboard/eye.png' alt='delete' class='eye-img'>";
                                  
                                    echo "<div class='dropdown dropleft drop-border'>";
                                       echo "<a class='btn' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                                           echo "<img src='img/Dashboard/dots.png'>";
                                       echo "</a>";
                                       echo "<div class='dropdown-menu dots-shadow' aria-labelledby='dropdownMenuLink'>";

                                            echo "<a class='dropdown-item' href='#'>Allow Download</a>";
                                       echo "</div>";
                                   echo "</div>";
                                    echo "</div>";
                                   echo "</td>";
                            echo "</tr>";
                            $i++;
                        }
                            ?>
                        
                           
                            
                        </tbody>
                    </table>
                    </div>
                
            </div>

            <div class="row">
                <div class="col-md-12">

                <ul class="pagination justify-content-center">
                       

                       <?php

               echo "<li class='page-item'><a href='buyerrequest.php?page=".($page1-1)."' class='page-link'>❮</a></li>"; 

            for ($i=1; $i<=$total_pages; $i++) {
              if($i == $page1)
               {
               echo "<li class='page-item active'><a class='page-link' href='buyerrequest.php?page=".$i."'>".$i."</a></li>";	
                }
                else{
             echo "<li class='page-item'><a class='page-link' href='buyerrequest.php?page=".$i."'>".$i."</a></li>";	
              }	
              }

            echo "<li class='page-item'><a href='buyerrequest.php?page=".($page1+1)."' class='page-link'>❯</a></li>"; 
       
?>


                  </ul>
                
                </div>
            </div>
        </div>
    </section>
    
    <!--footer-->
    <?php include "footer.php"; ?>
    
    <!--popper-->
    <script src="js/popper.min.js"></script>

    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>

</html>