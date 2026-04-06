<?php 

if(isset($_GET['id'])){

$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","db_lms");
$sql="delete from books where book_id=$id";
$res=mysqli_query($conn,$sql);
if(isset($res)){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                      <strong>Success!</strong>New Book Added Successfully!
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                 </div>';
                                 header("location:view-books.php");
}



}








?>