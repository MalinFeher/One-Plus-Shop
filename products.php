<?php
include_once ('../login/add/db.add.php');
?>
<?php
$query= "SELECT * FROM products ORDER BY ID ASC";
$result= mysqli_query($conn, $query);
if(mysqli_num_rows($result) >0){
    while($row=mysqli_fetch_array($result)){
?>
<div class="product">
  <form method="post" action="cart.php?action=add&id=<?php echo $row['id'] ?>">
      <img src="<?php echo $row["image"];?>"/>
      <h5 class='text-info'><?php echo $row["name"]; ?> </h5>
      <h5 class='text-danger'><?php echo $row["price"]; ?> </h5>
      <input type="text" name="quantity" class="form-control" value="1">
      <input type="hidden" name="hidden_name" value="<?php echo $row['name'];?>">
      <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
      <button type='submit'  name="add" style="margin-top: 5px" class='buy'>Buy Now</button>
  </form>
</div>
<?php
    }
}
?>
<?php
include_once('footer.php');
?>