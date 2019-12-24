<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>items list</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap-theme.min.css">
    <style>body{padding-top:50px;}.starter-template{padding:40px 15px;text-align:center;}</style>

    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <style>
    
    .total{
    float: left;
    padding: 10px;
    background:  #ADFF2F;
    }
    </style>
</head>

<body>
    <?php  require_once "process.php";  ?>
    
    <?php  if(isset($_SESSION['message'])):  ?>
    
    
    
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
    <?php endif;      ?>
    <div class="container"> 
    
        
    <?php
    $mysqli = new mysqli('localhost','root','mypass123','mikro') or die(mysql_error($mysqli));
    $result = $mysqli->query("SELECT * FROM lista") or die($mysqli->error);
    //pre_r($result->fetch_assoc());
    ?>
    
    <div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th style="font-weight:bold">Product</th>
                <th style="font-weight:bold">Price</th>
                <th colspan="1"></th>
                <th style="font-weight:bold">VAT</th>
                <th style="font-weight:bold">Lisaa</th>
                <th style="font-weight:bold">Kate</th>
                
            </tr>
        </thead>
    
    <?php   while ($row = $result->fetch_assoc()):  ?>
        
        <tr>
        <td><?php echo $row['item'];  ?></td>
        <td><?php echo $row['price'];  ?></td>
        <td>
            <a href="index.php?edit=<?php echo $row['id']; ?>"
               class="btn btn-info">Edit</a>
            <a href="process.php?delete=<?php echo $row['id']; ?>"
               class="btn btn-danger">Delete</a>
            </td>
        <td><?php echo $row['vat'];  ?></td>
        <td><?php echo $row['lisaa'] . " %";  ?></td>
        <td><?php echo $row['kate'];  ?></td>

        </tr>
        <?php  endwhile;  ?>
    </table>
        
    <label style="font-weight:bold" class="total"><?php echo ("Tax total: $sum" . " €");  ?></label>
        
    </div>
    <pre>
    <?php
    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
    ?>
  
    </pre>
    <div class="row justify-content-center">
    <form action="process.php" method="POST">
        <input type="hidden" name="id" class="form-control" value="<?php echo $id;   ?>">
    <div  class="form-group" >
    <label style="font-weight:bold">Product</label>
    <input type="text" name="item" class="form-control"
           value="<?php echo $item;  ?>"  placeholder="Enter the product">
    </div>
    <div class="form-group">
    <label style="font-weight:bold">Price</label>
    <input type="text" name="price" class="form-control"
           value="<?php echo $price;  ?>" placeholder="Enter price">
    </div>
    <div class="form-group">
    <label style="font-weight:bold">Lisaa</label>
    <input type="text" name="lisaa" class="form-control"
           value="<?php echo $lisaa;  ?>" placeholder="addition %">
    </div>
    <div class="form-group">
    <?php  if($update ==true):    ?>
    <button type="submit" class="btn btn-info" name="update">Update</button>
    <?php  else:   ?>
    <button type="submit" class="btn btn-primary" name="save">Save</button>
    <?php  endif;   ?>
    </div>
    </form>
    </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

