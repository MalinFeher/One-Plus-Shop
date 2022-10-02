<?php
include_once ('../login/add/db.add.php');
include_once('header.php');
?>

<?php
if (isset($_POST["add"])){
   if (isset($_SESSION['cart'])){
       $item_array_id= array_column($_SESSION["cart"], "product_id");
       if (!in_array($_GET["id"], $item_array_id)){
           $count = count($_SESSION["cart"]);
           $item_array = array(
            'product_id'=> $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
          );
          $_SESSION["cart"][$count] = $item_array;
          header("location: cart.php");
       } 
       else
       {
        echo '<script>alert("Product already in the cart")</script>';
        header("location: cart.php");
       }
      }
    else {

      $item_array = array(
        'product_id'=> $_GET["id"],
        'item_name' => $_POST["hidden_name"],
        'product_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"],
      );
      $_SESSION["cart"][0] = $item_array;
    }
  }

if (isset($_GET['action'])){
    if($_GET['action'] == "delete"){
      foreach ($_SESSION["cart"] as $key=>$value){
        if($value['product_id'] == $_GET["id"]){
          unset($_SESSION["cart"]["$key"]);
        }
        }
      }
    }


if (isset($_GET['action'])){
          $qt = "1";
          if($_GET['action'] == "addqt"){
            foreach ($_SESSION["cart"] as $key=>$value){
              if($key == $_GET["id"]){
              $_SESSION["cart"][$key]['item_quantity'] += $qt;
        }    
      }
    }
 } 
?>

<h3>Shopping cart details</h3>
<table>
  <tr>
    <th>Product Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Total price</th>
  </tr>

<?php
if(!empty($_SESSION["cart"])){
  $total=0;
  foreach ($_SESSION["cart"] as $key=>$value){
?>
    <tr>
      <td><?php echo $value["item_name"];?></td>
      <td><?php echo $value["item_quantity"];?></td>
      <td><?php echo $value["product_price"];?></td>
      <td><?php echo ($value["product_price"] * $value["item_quantity"]);?></td>
      <td><a href="cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span>Remove item</span></td></a>
      <td><a href="cart.php?action=addqt&id=<?php echo $key; ?>"><span>Add</span></td></a>
    </tr>
    <?php
    $total= $total +($value["product_price"] * $value["item_quantity"]);
  }
    ?>
    <tr>
      <td>Total</td>
      <th><?php echo $total ?></td>
    </tr>
  </table>
</div>
</div>
<?php
  }
?>


 









<?php
include_once('footer.php');
?>