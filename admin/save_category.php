<?php

require ('db.php');

$category = $_POST["category"];
//$img  = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 

$sourcePath = $_FILES['image']['tmp_name'];
$targetPath = "Upload/".$_FILES['image']['name'];
$filename = $_FILES['image']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
   $image=$filename;
}
   
$sql="INSERT INTO `category`(`category`,`image`)
VALUES ('$category','$image')";

if($conn->query($sql)==TRUE)
{
echo "<script>alert('Added  Successfully!');</script>";
echo "<script type='text/javascript'>
window.location.href = 'addCategory.php';
</script>";
}
else
{
echo "Error: ".$sql."<br>".$conn->error;

}

?>
