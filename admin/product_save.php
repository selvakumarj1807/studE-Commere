<?php
require ('db.php');
$name=$_POST['name'];

$category=$_POST['category'];
$display=$_POST['display'];
$rate1=$_POST['rate1'];
$rate2=$_POST['rate2'];
$type=$_POST['type'];
$instock=$_POST['instock'];
$saleqty=$_POST['saleqty'];
$description=$_POST['description'];
$offer=$_POST['offer'];

$res = mysqli_query($conn,"Select * from products");  
$no = mysqli_num_rows($res)+1;

//image1
$sourcePath= $_FILES['image']['tmp_name'];
$targetPath = "Upload/".$_FILES['image']['name'];
$filename = $_FILES['image']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
   $image=$filename;
}

$sql="INSERT INTO `products`(`category`, `name`, `item_id`, `image`, `rate1`, `rate2`, `type`, `instock`, `saleqty`, `description`, `offer`, `display`) 
        VALUES('$category','$name','product_$no','$image','$rate1','$rate2','$type','$instock','$saleqty','$description','$offer','$display')";

if($conn->query($sql)==TRUE)
{
echo "<script>alert('Added Successfully!');</script>";
echo "<script type='text/javascript'>
window.location.href = 'product.php?category=$category';
</script>";
}
else
{
	
echo "Error: ".$sql."<br>".$conn->error;

}
	?>