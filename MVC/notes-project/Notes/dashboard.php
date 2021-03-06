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

    $search_result = $_POST['search_result'];
    $result_db = mysqli_query($conn,"SELECT COUNT(seller_note_id) FROM seller_notes WHERE note_title LIKE '%$search_result%' AND isactive=1"); 
    $row_db = mysqli_fetch_row($result_db);  
    $total_records = $row_db[0];  
    $total_pages = ceil($total_records/$limit);   

    $query = "SELECT seller_notes.seller_note_id, seller_notes.publisheddate ,seller_notes.note_title, note_categories.category_name, reference_data.ref_value
    FROM seller_notes LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id LEFT JOIN reference_data
    ON seller_notes.status=reference_data.reference_id where seller_notes.note_title LIKE '%$search_result%' AND
    reference_data.reference_id IN (6,7,8) AND seller_notes.isactive=1 LIMIT $start_from1, $limit";

    $result = mysqli_query($conn, $query); 

  }
  else{
    $result_db = mysqli_query($conn,"SELECT COUNT(seller_note_id) FROM seller_notes WHERE isactive=1"); 
    $row_db = mysqli_fetch_row($result_db);  
    $total_records = $row_db[0];  
    $total_pages = ceil($total_records/$limit); 
    $query = "SELECT seller_notes.seller_note_id, seller_notes.publisheddate ,seller_notes.note_title, note_categories.category_name, reference_data.ref_value
    FROM seller_notes LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id LEFT JOIN reference_data
    ON seller_notes.status=reference_data.reference_id WHERE reference_data.reference_id IN (6,7,8) AND seller_notes.isactive=1 LIMIT $start_from1, $limit";
    $result = mysqli_query($conn, $query); 
  }

  $limit2 = 4;

  if (isset($_GET["page2"])){
    $page2 = $_GET["page2"]; 
    } 
    else{ 
     $page2=1;
    }
$start_from2 = ($page2-1) * $limit2;


if(isset($_POST['publish'])){

    $publish_result = $_POST['publish_result'];
    $result_db2 = mysqli_query($conn,"SELECT COUNT(seller_note_id) FROM seller_notes where note_title LIKE '%$publish_result%' AND seller_notes.status=9"); 
    $row_db2 = mysqli_fetch_row($result_db2);  
    $total_records2 = $row_db2[0];  
    $total_pages2 = ceil($total_records2 / $limit2);   

    $query2 = "SELECT seller_notes.publisheddate ,seller_notes.note_title, note_categories.category_name, reference_data.ref_value, seller_notes.selling_price
    FROM seller_notes LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id LEFT JOIN reference_data
    ON seller_notes.ispaid =reference_data.reference_id WHERE note_title LIKE '%$publish_result%' AND seller_notes.status=9 LIMIT $start_from2, $limit2";
    


    $result2 = mysqli_query($conn, $query2); 

  }
  else{
    $result_db2 = mysqli_query($conn,"SELECT COUNT(seller_note_id) FROM seller_notes WHERE status=9"); 
    $row_db2 = mysqli_fetch_row($result_db2);  
    $total_records2 = $row_db2[0];  
    $total_pages2 = ceil($total_records2 / $limit2); 
    $query2 = "SELECT seller_notes.publisheddate ,seller_notes.note_title, note_categories.category_name, reference_data.ref_value, seller_notes.selling_price
    FROM seller_notes LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id LEFT JOIN reference_data
    ON seller_notes.ispaid =reference_data.reference_id WHERE seller_notes.status=9 LIMIT $start_from2, $limit2";
    $result2 = mysqli_query($conn, $query2); 
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
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <button type="button" class="btn">ADD NOTE</button>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="con-border">
                        <div class="row">

                            <div class="col-lg-3 first-border">
                                <img src="img/dashboard/earning-icon.svg" alt="earning">
                                <h5>My Earning</h5>
                            </div>


                            <div class="col-lg-4 second-border text-center">
                                <h5>100</h5>
                                <p>Number of notes sold</p>
                            </div>


                            <div class="col-lg-5 third-border text-center">
                                <h5>$10,00,000</h5>
                                <p>Money Earning</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-md-4 col-12 text-center common-border">
                            <h5>38</h5>
                            <p>My Downloads</p>
                        </div>
                        <div class="col-md-4 col-12 text-center common-border">
                            <h5>12</h5>
                            <p>My Rejected Notes</p>
                        </div>
                        <div class="col-md-4 col-12 text-center common-border">
                            <h5>102</h5>
                            <p>Buyer Requests</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="dashboard-table">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-5 col-12 dash-space general">
                    <h4>In Progress Notes</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-7 col-12 general">
                    <form action="" method="POST">
                    <button type="submit" name="search" class="btn">Search</button>
                    <input type="text" placeholder='  &#xf002;  Search' name="search_result" />
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table border general-table-width">
                            <tr>
                                <th scope="col">ADDED DATE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                            <?php
                             
                             while($row = mysqli_fetch_assoc($result)){
                                $seller_note_id  = $row['seller_note_id'];
                                $date = $row['publisheddate'];
                                $note_title = $row['note_title'];
                                $category_name = $row['category_name'];
                                $ref_value = $row['ref_value'];
                                
                                
                            echo "<tr>
                                <td>$date</td>
                                <td>$note_title</td>
                                <td>$category_name</td>
                                <td>$ref_value</td>";
                                
                                if($ref_value == 'Draft'){
                                     echo "<td>
                                     <a href='http://localhost/notes-project/Notes/addnotes.php?id=$seller_note_id'><img src='img/dashboard/edit.png' alt='edit'></a>
                                     <a href='http://localhost/notes-project/Notes/delete.php?id=$seller_note_id'><img src='img/dashboard/delete.png' alt='delete'></a>
                                     </td>";
                                    }
                                    else{
                                        echo "<td>
                                        <img src='img/dashboard/eye.png' alt='eye'>
                                   
                                        </td>";

                                    }
                                 
                                 
                                 
                             echo "</tr>";
                             }
                            ?>
                            
                    </table>
                </div>
            </div>


            
            <div class="row">
                <div class="col-md-12">

                 <ul class="pagination justify-content-center">

                 <?php

                 echo "<li class='page-item'><a href='dashboard.php?page=".($page1-1)."' class='page-link'>❮</a></li>"; 

                 for ($i=1; $i<=$total_pages; $i++) {
                    if($i == $page1)
                    {
                     echo "<li class='page-item active'><a class='page-link' href='dashboard.php?page=".$i."'>".$i."</a></li>";	
                    }
                    else{
                    echo "<li class='page-item'><a class='page-link' href='dashboard.php?page=".$i."'>".$i."</a></li>";	
                    }	
                  }

                  echo "<li class='page-item'><a href='dashboard.php?page=".($page1+1)."' class='page-link'>❯</a></li>"; 
                        
                 ?>

                 </ul>
                   
                </div>
            </div>
        </div>
    </section>
    
    <section class="dashboard-table">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-5 col-12 general">
                    <h4>Published Notes</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-7 col-12 general">
                <form action="dashboard.php" method="POST">
                    <button type="submit" name="publish" class="btn">Search</button>
                    <input type="text" name="publish_result" placeholder='  &#xf002;  Search' />
                </form>
                </div>
            </div>
            <div class="row">
                    <div class="table-responsive">
                    <table class="table border general-table-width">
                        <thead>
                            <tr>
                                <th scope="col">ADDED DATE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                             
                             while($row = mysqli_fetch_assoc($result2)){

                                $date = $row['publisheddate'];
                                $note_title = $row['note_title'];
                                $category_name = $row['category_name'];
                                $ref_value = $row['ref_value'];
                                $selling_price = $row['selling_price'];
                                
                                
                            echo "<tr>
                                <td>$date</td>
                                <td>$note_title</td>
                                <td>$category_name</td>
                                <td>$ref_value</td>
                                <td>$selling_price</td>
                                
                                
                                    
                                        <td>
                                        <img src='img/dashboard/eye.png' alt='eye'>
                                   
                                        </td>";

                                    
                                 
                                 
                                 
                             echo "</tr>";
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

                 echo "<li class='page-item'><a href='dashboard.php?page2=".($page2-1)."' class='page-link'>❮</a></li>"; 

                 for ($i=1; $i<=$total_pages2; $i++) {
                    if($i == $page2)
                    {
                     echo "<li class='page-item active'><a class='page-link' href='dashboard.php?page2=".$i."'>".$i."</a></li>";	
                    }
                    else{
                    echo "<li class='page-item'><a class='page-link' href='dashboard.php?page2=".$i."'>".$i."</a></li>";	
                    }	
                  }

                  echo "<li class='page-item'><a href='dashboard.php?page2=".($page2+1)."' class='page-link'>❯</a></li>"; 
                        
                 ?>

                 </ul>
                </div>
            </div>
        </div>
        
    </section>
    
    <!--footer-->
    <?php include "footer.php"; ?>

    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

</body>

</html>

 