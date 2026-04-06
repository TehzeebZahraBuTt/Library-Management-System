
<?php

$r="";
 
 session_start();
 $conn=mysqli_connect("localhost","root","","db_lms");
  if(isset($_POST['index'])){
   extract($_POST);
   $table = mysqli_real_escape_string($conn, $_POST['table']);
   $column = mysqli_real_escape_string($conn, $_POST['cols']);
    // OPTIONAL: Check against allowed table names
    $allowedTables = ['users', 'books', 'book_categories', 'borrowed_books', 'returned_books'];
    if (!in_array($table, $allowedTables)) {
        echo "<div class='alert alert-danger'>Invalid table selected.</div>";
        exit;
    }

    $check_sql = "SHOW INDEX FROM `$table` WHERE Key_name = 'idx_{$table}_{$column}'";
    $check_result = mysqli_query($conn, $check_sql);
   
    $num=mysqli_num_rows($check_result);
if($num=0){
    $r=0;
}
if (mysqli_num_rows($check_result) == 0) {
    $index_sql = "CREATE INDEX `idx_{$table}_{$column}` ON `$table`(`$column`)";
    $r= mysqli_query($conn, $index_sql);

} 

}
if (isset($_GET['id']) && isset($_GET['tab'])) {
    $index = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['id']);
    $tab = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['tab']);
    
    $ind = "DROP INDEX `$index` ON `$tab`";
    $droped = mysqli_query($conn, $ind);
    if ($droped) {
        $_SESSION['drop_success'] = true;
    } 
     header("Location: indexing-page.php");
    exit;
    
}


?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Librarian Profile Settings</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <?php include("admin_css.php")  ?>
     
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php include("admin_sidebar.php")   ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php include("admin_topbar.php")   ?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                       
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>


                         <div class="col-md-12">
                         <?php  if(($r)): ?>

                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Success!</strong> Index Created  Successfully!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php endif;  ?>
                                 <?php if($r==0): ?>

                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>Warning!</strong> Index already exists!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php endif;  ?>

                                              

                         <div id="status_msg" class="mt-3"></div>
                            <form action="" method="POST" >
                            <div class="row mb-5">
                                <div class="col-4"><h1>Create Indexing</h1></div>
                                <div class="col-8"> </div>
                               

                    </div>

                        
                        

                            <div class="row mb-3">
                                <div class="col-sm-3">

                                    <h6 class="mb-0">Select  Table </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    
                                                   <select class="form-control form-control-md" name="table" id="table">
                                                    <option>--Select Table--</option>
                                                    <option value="users">Users</option>
                                                    <option value="books">Books</option>
                                                    <option value="book_categories">Books Categories</option>
                                                    <option value="borrowed_books">Borrowed Books</option>
                                                    <option value="returned_books">Returned Books</option>

                                                    
                                                    
                                                    </select>
                                                     
                                </div>
                            </div>
                        

                            <div class="row mb-3">
                                <div class="col-sm-3">

                                    <h6 class="mb-0">Columns</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <select class="form-control form-control-md" name="cols" id="cols">
                                                    <option>--Select Column--</option>
                                                    <option value="users">Users</option>   
                                                    </select>
                                </div>
                            </div>
                            
                             <div class="row">
                                <div class="col-sm-3"></div>
                                 <div class="col-sm-3"></div>
                                  <div class="col-sm-3"></div>
                                <div class="col-sm-3 text-secondary">
                                    <input type="submit" name="index" class="btn btn-compose px-4" value="Create Index  " id="create_index">
                                </div>
                            </div>
                            

                           


                        </div>

                    </form>
                   <hr>
                    <form action="" method="post">
                    <div class="row">
                                <div class="col-3"><h1>View Indexing</h1></div>
                                <div class="col-11">  <?php 
    // Show drop success message if it exists, then clear it
                                if(isset($_SESSION['drop_success'])): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> Index Deleted Successfully!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php unset($_SESSION['drop_success']); ?>
                                <?php endif; ?></div>
                                                        

                    </div>

                           

                            
                    <div class="row mb-3">
                                <div class="col-sm-3 mt-5">

                                    <h6 class="mb-0">Select Table</h6>
                                </div>
                                <div class="col-sm-6 text-secondary mt-5">
                                    
                                    <select class="form-control form-control-md" name="table" id="table" style="height:100%;">
                                     <option>--Select Table--</option>
                                     <option value="users">Users</option>
                                     <option value="books">Books</option>
                                     <option value="book_categories">Books Categories</option>
                                     <option value="borrowed_books">Borrowed Books</option>
                                     <option value="returned_books">Returned Books</option>

                                     
                                     
                                     </select>
                                     
                            </div>
                            <div class="col-sm-3 text-secondary mt-5">
                                     <input type="submit" name="view-index" class="btn btn-compose px-4" value="View Indexing  ">
                            </div>
                    </div>
                     <div class="row mb-5">
                                        <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                        <div class="col-sm-3 text-secondary">
                                        </div>
                                        </div>

                                        <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th >No</th>
                                                   <th >Table Name</th> 
                                                   <th>Column Name</th>
                                                   <th> Index </th>
                                                   <th> Action </th>
                                                   
                                                </tr>
                                             </thead>
                                             <tbody>

                                            <?php  
                                           
                                        if(isset($_POST['view-index'])):
                                            extract($_POST);
                                            $table = mysqli_real_escape_string($conn, $_POST['table']);
                                            // OPTIONAL: Check against allowed table names
                                            $allowedTables = ['users', 'books', 'book_categories', 'borrowed_books', 'returned_books'];
                                            if (!in_array($table, $allowedTables)) {
                                                echo "<div class='alert alert-danger'>Invalid table selected.</div>";
                                                exit;
                                            }
                                        
                                            $index_sql = "SHOW INDEX FROM `$table`";
                                            
                                            $res= mysqli_query($conn, $index_sql);
                                            $sr=1;
                                            foreach($res as $row):
                                               
                                        
                                        

                                              ?>
                                                <tr>
                                                   <td><?php  echo $sr++; ?></td>
                                                   <td>
                                                      <?php
                                                    
                                                        echo $row['Table']; ?>
                                                   </td>
                                                   <td> <?php
                                                        echo $row['Column_name']; ?></td>
                                                 <td> <?php
                                                        echo $row['Key_name']; ?></td>
                                                        <td><a href="indexing-page.php?id=<?php  echo $row['Key_name']; ?>& tab= <?php
                                                    
                                                        echo $row['Table']; ?>" class=" fa fa-trash btn btn-danger"></a>
                                                        </td>
                                                   
                                                   
                                                </tr>

<?php  endforeach;  endif;?>
                                           
                                               
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>

                    </form>


                  
                  <!-- footer -->
                
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <?php include("admin_scripts.php")  ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    // Fetch columns when table changes
    $('#table').change(function() {
        var table = $(this).val();
        $.ajax({
            url: 'indexing-ajax.php',
            method: 'POST',
            data: { type: 'tables', val: table },
            success: function(data) {
                $('#cols').html(data);
            }
        });
    });

   
        });
  
</script>
<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

   </body>
</html>