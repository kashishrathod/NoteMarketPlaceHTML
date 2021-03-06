<?php include "db_connection.php";
session_start();


$email = $_SESSION['email'];
$query = "select userid from users where email_id='$email'";
$userid = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($userid)){
    $id = $row['userid'];
}

$validation_1 = true;
$validation_2 = true;
$validation_3 = true;

if(isset($_SESSION['email'])){
    $title= "";
    $notetype = "";
    $category = "";
    $pages = "";
    $description = "";
    $country = "";
    $institute = "";
    $course = "";
    $professor = "";
    $course_code = "";
    $price = "";
    $free = "";

    if(isset($_POST['save'])){
        $title = $_POST['title'];
        $notetype = $_POST['notetype'];
        $category = $_POST['category'];
        $pages = $_POST['pages'];
        $description = $_POST['description'];
        $country = $_POST['country'];
        $institute = $_POST['institute'];
        $course = $_POST['course'];
        $professor = $_POST['professor'];
        $course_code = $_POST['course_code'];
        $price = $_POST['price'];
        $free = $_POST['free'];
    
        $query = "INSERT INTO seller_notes(seller_id, status, publisheddate, note_title, category, display_picture, 
        note_type, num_of_pages, note_description, university_name, country, course,
        course_code, professor, ispaid, selling_price, createddate, isactive) 
        VALUES ($id ,6, NOW(), '$title', $category , '../Member/default/reviewer-3.png', $notetype, $pages, 
        '$description', '$institute', $country, '$course', '$course_code', '$professor',
        $free, $price, NOW(), 1)";
    
        $result = mysqli_query($conn, $query);
    
    
        $files =$_FILES['display_picture'];
        
    // print_r($files);
     
        $filename =$files['name']; 
        $filetmp = $files['tmp_name']; 
    
    
     $extention =explode('.',$filename);
     $filecheck = strtolower(end($extention));
     
     $fileextstored =array('jpg','png','jpeg');
    
     $note_id = mysqli_insert_id($conn);
     
     if(in_array($filecheck, $fileextstored)){
        if(!is_dir('../Member/')){
         mkdir('../Member/');
        }
    
        if(!is_dir('../Member/' .$id)){
         mkdir('../Member/' .$id);
        }
    
        if(!is_dir('../Member/' .$id. '/' .$note_id)){
         mkdir('../Member/' .$id. '/' .$note_id);
        }
         $destinationfile = '../Member/' .$id. '/' .$note_id. '/' ."display-pic-". time() . '.' .$filecheck;
         move_uploaded_file($filetmp,$destinationfile);
         $query_pic = "update seller_notes set display_picture='$destinationfile' where seller_note_id='$note_id'";
         $result = mysqli_query($conn, $query_pic);   
        }
        else{
         $validation_1 = false;
        }
    
     $files1 =$_FILES['preview'];
     
     //print_r($files1);
     
     $filename1 =$files1['name']; 
     $filetmp1 = $files1['tmp_name']; 
    
    
     $extention1 =explode('.',$filename1);
     $filecheck1 = strtolower(end($extention1));
     
     $fileextstored1 =array('jpg','png','jpeg');
     
     if(in_array($filecheck1, $fileextstored1)){
         
        if(!is_dir('../Member/')){
            mkdir('../Member/');
           }
       
           if(!is_dir('../Member/' .$id)){
            mkdir('../Member/' .$id);
           }
       
           if(!is_dir('../Member/' .$id. '/' .$note_id)){
            mkdir('../Member/' .$id. '/' .$note_id);
           }
    
    
         $destinationfile1 = '../Member/' .$id. '/' .$note_id. '/' ."preview-". time() . '.' .$filecheck1;
         move_uploaded_file($filetmp1, $destinationfile1);
         $query_preview = "update seller_notes set note_preview='$destinationfile1' where seller_note_id='$note_id'";
         $result = mysqli_query($conn, $query_preview);   
         
         
     }
     else{
         $validation_3 = false;
     }
    
           
            
            $countfiles = count($_FILES['upload_note']['name']);
    
            for($i=0;$i<$countfiles;$i++){
            $filename2 = $_FILES['upload_note']['name'][$i];
    
            $extention2 =explode('.',$filename2);
            $filecheck2 = strtolower(end($extention2));
        
            $fileextstored2 =array('pdf');
    
            if(in_array($filecheck2, $fileextstored2)){
    
            $query_multiple = "insert into seller_notes_attachments(note_id, isactive)
            values($note_id, 1)";
            $result_multiple = mysqli_query($conn, $query_multiple);
            $id_attach = mysqli_insert_id($conn);
            
            
            // Upload file
            if(!is_dir('../Member/')){
                mkdir('../Member/');
               }
           
               if(!is_dir('../Member/' .$id)){
                mkdir('../Member/' .$id);
               }
           
               if(!is_dir('Member/' .$id)){
                mkdir('../Member/' .$id. '/' .$note_id);
               }
    
               if(!is_dir('../Member/' .$id. '/' .$note_id. '/' .'attachment')){
                mkdir('../Member/' .$id. '/' .$note_id. '/' .'attachment');
               }
    
            $path = '../Member/' .$id. '/' .$note_id. '/' .'attachment'. '/' .$id_attach. '_' .time(). '.' .$filecheck2;
            move_uploaded_file($_FILES['upload_note']['tmp_name'][$i], $path);
            $query_attach = "update seller_notes_attachments set file_path='$path' where attach_id='$id_attach'";
            $result = mysqli_query($conn, $query_attach);   
            
    
            } 
            else{
                $validation_2 = false;
            }
            
            
        }    
    }


    else if(isset($_GET['id'])){

        $id = $_GET['id'];
        $get_details = mysqli_query($conn, "SELECT * FROM seller_notes WHERE seller_note_id=$id");

        while($row = mysqli_fetch_assoc($get_details)){
            $title = $row['note_title'];
            $notetype_id = $row['note_type'];
            $category_id = $row['category'];
            $pages = $row['num_of_pages'];
            $description = $row['note_description'];
            $country_id = $row['country'];
            $institute = $row['university_name'];
            $course = $row['course'];
            $professor = $row['professor'];
            $course_code = $row['course_code'];
            $price = $row['selling_price'];
            $free = $row['ispaid'];

        }


        $get_type = mysqli_query($conn, "SELECT * FROM note_type WHERE type_id =$notetype_id");
        while($row = mysqli_fetch_assoc($get_type)){
            $type_name_1 = $row['type_name'];
        }

        $get_category = mysqli_query($conn, "SELECT * FROM note_categories WHERE note_categories_id=$category_id");
        while($row = mysqli_fetch_assoc($get_category)){
            $category_name_1 = $row['category_name'];
        }

        $get_country = mysqli_query($conn, "SELECT * FROM countries WHERE country_id=$country_id");
        while($row = mysqli_fetch_assoc($get_country)){
            $country_name_1 = $row['country_name'];
        }
        



    }
    
    

}
else
header('Location: login.php');
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
        
    
        
       <section id="userprofile">
       <div class="content-box-lg">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div id="statement" class="text-center">
                           <h3>Add Notes</h3>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </section>
       <form action="addnotes.php" method="POST" enctype="multipart/form-data">
       <section id="basic-note-details">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                       <h3>Basic Note Details</h3> 
                   </div>
               </div>
               
               <div class="row">
                   <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                    <label for="title">Title<span class="required">*</span></label>
                    <input type="text" name="title" value = "<?php echo $title?>" class="form-control" id="title" placeholder="Enter your notes title" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Display Picture</label>
                    <div class="displaypicture">
                        <label for="file-input3">
                            <img src="img/Add-notes/upload-file.png">
                        </label>
                        <input id="file-input3" type="file" name="display_picture">
                       </div>
                       <div class="incorrect-psd">
                       <?php
                       
                       if(!$validation_1){
                           echo "only jpeg, jpg, png file supported.";
                       }
                       
                       ?>
                       </div>
                       </div>
                    
                    <div class="form-group">
                    <label for="type">Type</label>
                         <select id="type" name="notetype" class="form-control arrow-down">
                         
                         <?php

                           if(isset($_GET['id'])){
                            echo "<option value='$notetype_id'>$type_name_1</option>";
                            $query_type = "select * from note_type";
                            $result = mysqli_query($conn, $query_type);
                            while($row = mysqli_fetch_assoc($result)){
                                $type_id = $row['type_id'];
                                $type_name = $row['type_name'];
                                if($notetype_id == $type_id){
                                    echo "";
                                }
                                else{

                                echo "<option value='$type_id'>$type_name</option>";
                            }
                               }

                           }
                           
                           else{
                            $query_type = "select * from note_type";
                            $result = mysqli_query($conn, $query_type);
                            echo "<option selected disabled>select note type</option>";
                            while($row = mysqli_fetch_assoc($result)){
                             $type_id = $row['type_id'];
                             $type_name = $row['type_name'];

                             echo "<option value='$type_id'>$type_name</option>";
                            }
                           }
                           ?>
                          </select>
                     </div>
                   </div>
                   <div class="col-lg-6 col-md-6">
                       <div class="form-group">
                       <label for="category">Category<span class="required">*</span></label>
                       <select id="category" name="category" class="form-control arrow-down" required>
                           
                           
                           <?php

                           if(isset($_GET['id'])){
                            echo "<option value='$category_id'>$category_name_1</option>";

                            $query_category = "select * from note_categories";
                            $result = mysqli_query($conn, $query_category);
                            while($row = mysqli_fetch_assoc($result)){
                                $note_categories_id = $row['note_categories_id'];
                                $category_name = $row['category_name']; 
                                if($note_categories_id == $category_id){
                                    echo "";
                                }
                                else{
                                echo "<option value='$note_categories_id'>$category_name</option>";
                            }
                               }


                           }
                           

                           else{
                            $query_category = "select * from note_categories";
                            $result = mysqli_query($conn, $query_category);
                            echo "<option selected disabled>select your category</option>";
                            while($row = mysqli_fetch_assoc($result)){
                             $note_categories_id = $row['note_categories_id'];
                             $category_name = $row['category_name'];
                             echo "<option value='$note_categories_id'>$category_name</option>";
                            }
                            


                           }
                           
                           
                           
                           ?>
                           
                           
                       </select>
                       </div>
                       
                       <div class="form-group">
                       <label>Upload Notes</label>
                       <div class="displaypicture">
                        <label for="file-input2">
                            <img src="img/Add-notes/upload-note.svg">
                            
                        </label>
                        <input id="file-input2" type="file" name="upload_note[]" multiple>
                        </div>
                        <div class="incorrect-psd">
                       <?php
                       
                       if(!$validation_2){
                           echo "only pdf file supported.";
                       }
                       
                       ?>
                       </div>

                       </div>
                       
                       <div class="form-group">
                       <label for="number-page">Number of Pages</label>
                       <input type="text" name="pages" value = "<?php echo $pages?>" class="form-control" id="number-page" placeholder="Enter number of note pages">
                       </div>
                   </div>
               </div>
               
               <div class="row">
                   <div class="col-lg-12 col-md-12">
                       <div class="form-group">
                                <label for="description">Description<span class="required">*</span></label><br>
                                <textarea id="description" name="description" rows="4" cols="65" placeholder="Enter your description"><?php echo $description?></textarea>
                            </div>
                   </div>
               </div>
           </div>
       </section>
       
       <section id="institute-info">
           <div class="container">
              <div class="row">
                   <div class="col-lg-12 col-md-12">
                       <h3>Institute Information</h3> 
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-6">
                       
                       <div class="form-group">
                       <label for="country">Country</label>
                         <select id="country" name="country" class="form-control arrow-down">
                         
                         <?php

                         if(isset($_GET['id'])){
                            echo "<option value='$country_id'>$country_name_1</option>";
                            $query_country = "select * from countries";
                            $result = mysqli_query($conn, $query_country);
                            
                            while($row = mysqli_fetch_assoc($result)){
                                $country_id_1 = $row['country_id'];
                                $country_name = $row['country_name'];
                                if($country_id_1 == $country_id){
                                    echo "";
                                }
                                else{
                                echo "<option value='$country_id'>$country_name</option>";
                            }
                            }

                         }

                         else{
                            $query_country = "select * from countries";
                            $result = mysqli_query($conn, $query_country);
                            echo "<option selected disabled>select your country name</option>";
                            while($row = mysqli_fetch_assoc($result)){
                                $country_id_1 = $row['country_id'];
                                $country_name = $row['country_name'];
                                echo "<option value='$country_id_1'>$country_name</option>";
                            }
                         }
                         ?>
                       </select>
                     </div>
                       
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                       <label for="institute-name">Institution Name</label>
                       
                       <input type="text" name="institute" value = "<?php echo $institute ?>" class="form-control" id="institute-name" placeholder="Enter institute name">
                       </div>
                   </div>
               </div>
           </div>
       </section>
       
       <section id="course">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12 col-md-12">
                       <h3>Course Details</h3> 
                   </div>
               </div>
               
               <div class="row">
                   <div class="col-lg-6 col-md-6">
                       <div class="form-group">
                       <label for="course-name">Course Name</label>
                       <input type="text" name="course" value = "<?php echo $course ?>" class="form-control" id="course-name" placeholder="Enter your course name">
                       </div>
                       <div class="form-group">
                       <label for="prof-name">Professor / Lecturer</label>
                       <input type="text" name="professor" value = "<?php echo $professor?>" class="form-control" id="prof-name" placeholder="Enter your professor name">
                       </div>
                   </div>
                   <div class="col-lg-6 col-md-6">
                       <div class="form-group">
                       <label for="course-code">Course Code</label>
                       <input type="text" name="course_code" value = "<?php echo $course_code?>" class="form-control" id="course-code" placeholder="Enter your course code">
                       </div>
                   </div>
               </div>
           </div>
       </section>
       
       <section id="selling-info">
           <div class="container">

               <div class="row">
                   <div class="col-lg-12 col-md-6">
                       <h3>Selling Information</h3> 
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-6 col-md-6">
                   <div class="form-group">
                   
                   <label for="sell">Sell for<span class="required">*</span></label><br>
                  
                   <?php
                   if(isset($_GET['id'])){
                       ?>

                    <input type='radio' <?php if($free == '2') echo "checked";?> id='free' name='free' value='2'>

                  <?php }


                   else{
                    $query_sell= "select reference_id from reference_data where ref_value='Free'";
                    $result_sell=mysqli_query($conn, $query_sell);
                    while($row = mysqli_fetch_assoc($result_sell)){
                        $note_type = $row['reference_id'];
                        echo "<input type='radio' id='free' name='free' value='$note_type'>";
                    }
                   }
                   
                   ?>
                   
                   <label for="free">Free</label>

                   <?php
                     if(isset($_GET['id'])){
                         ?>
                       <input type='radio' id='paid' <?php if($free == '1') echo "checked";?> name='free' value='1'>

                    <?php }

                   else{
                    $query_sell_paid= "select reference_id from reference_data where ref_value='paid'";
                    $result_sell_paid=mysqli_query($conn, $query_sell_paid);
                    while($row = mysqli_fetch_assoc($result_sell_paid)){
                        $note_type_paid = $row['reference_id'];
                        echo "<input type='radio' id='paid' name='free' value='$note_type_paid'>";
                    }
                   }
                   
                   ?>
                   <label for="paid">Paid</label>
                   
                   </div>
                   
                       <div class="form-group">
                       <label for="sell-price">Sell Price<span class="required">*</span></label>
                       <input type="number" step=".001" name="price" value = "<?php echo $price?>" class="form-control" id="sell-price" placeholder="Enter your price" required>
                       </div>
                   
                   </div>
                   <div class="col-lg-6 col-md-6">
                       <div class="form-group">
                       <label>Note Preview</label>
                       <div class="displaypicture">
                        <label for="file-input1">
                            <img src="img/Add-notes/upload-file.png">
                        </label>
                        <input id="file-input1" name="preview" type="file">
                        </div>
                        <div class="incorrect-psd">
                       <?php
                       
                       if(!$validation_3){
                           echo "only jpeg, jpg, png file supported.";
                       }
                       
                       ?>
                       </div>


                       </div>
                       
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-12 col-md-12">
                       <button type="submit" name="save" class="btn save">SAVE</button>
                       <button type="submit" name="publish" class="btn save">PUBLISH</button>
                   </div>
               </div>
               
           </div>
       </section>
       </form>
       
       <!--footer-->
       <?php include "footer.php"; ?>
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    
    <script src="js/script.js"></script>
    </body>
</html>