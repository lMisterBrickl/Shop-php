
<!DOCTYPE html>
<html lang="en">

  <?php
  include ("navbar.php");
   ?>

<head>
    <title>Marius Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
    img {
        width: 100px !important;
        height: 100px !important;
        object-fit: contain
    }

    h3 {
        text-align: center;
        white-space;
    }

    h6 {
        text-align: center
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-7">
            <div class="row">

<?php

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
// echo $row['id'] ." ". $row['name'] ." ". $row['image'] ." ". $row['price']."<br>";
?>
<div class="col-md-3 text-center mt-5" >
    <img src="images/<?php echo $row['image']?>" alt="">
    <h3><?php echo $row['name']?></h3>
    <h6>Pret: <?php echo $row['price']?></h6>
    <div class="form-group" id ="focalizare">
        <label>Selecteaza:</label>
        <select class="form-control" id="quantity<?php echo $row['id']?>">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
        <input type="hidden" id="name<?php echo $row['id']?>" value='<?php echo $row['name']?>'>
        <input type="hidden" id="price<?php echo $row['id']?>" value='<?php echo $row['price']?>'>

        <button class='btn btn-danger add mt-2' data-id="<?php echo $row['id']?>">Adauga in cos</button>

    </div>

</div>






<?php
}

?>

</div>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-4">
            <h3 class='text-center'>Cos</h3>
            <div id="displayCheckout">
            <?php
                if(!empty($_SESSION['cart'])){
                    $outputTable = '';
                    $total = 0;
                    $outputTable .= "<table class='table table-bordered'><thead><tr><td>Nume</td><td>Pret</td><td>Cantitate</td><td>Actiune</td> </tr></thead>";
                    foreach($_SESSION['cart'] as $key => $value){
                        $outputTable .= "<tr><td>".$value['p_name']."</td><td>".($value['p_price'] * $value['p_quantity']) ."</td><td>".$value['p_quantity']."</td><td><button id=".$value['p_id']." class='btn btn-danger delete'>Delete</button></td></tr>";
                        $total = $total + ($value['p_price'] * $value['p_quantity']);
                    }
                    $outputTable .= "</table>";
                    $outputTable .= "<div class='text-center'><b>Total: ".$total."</b></div>";
                    echo $outputTable;
                }

?>
            </div>
            </div>
        </div>



    </div>


    <script>
    $(document).ready(function() {
         alldeleteBtn = document.querySelectorAll('.delete')
         alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click',deleteINsession)
         })

function deleteINsession(){
    removable_id = this.id;
    $.ajax({
                url:'cart.php',
                method:'POST',
                dataType:'json',
                data:{
                      id_to_remove:removable_id,
                      action:'remove'
                },
                success:function(data){
                        $('#displayCheckout').html(data);
           alldeleteBtn = document.querySelectorAll('.delete')
         alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click',deleteINsession)
         })
                      }
              }).fail( function(xhr, textStatus, errorThrown) {
        alert(xhr.responseText);
    });

}


        $('.add').click(function() {
            id = $(this).data('id');
            name = $('#name' + id).val();
            price = $('#price' + id).val();
            quantity = $('#quantity' + id).val();
              $.ajax({
                url:'cart.php',
                method:'POST',
                dataType:'json',
                data:{
                      cart_id : id,
                      cart_name : name,
                      cart_price : price,
                      cart_quantity : quantity,
                      action:'add'
                },
                success:function(data){
                        $('#displayCheckout').html(data);
                        alldeleteBtn = document.querySelectorAll('.delete')
         alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click',deleteINsession)
         })
                      }
              }).fail( function(xhr, textStatus, errorThrown) {
        alert(xhr.responseText);
    });

        })
    })
    </script>

</body>

</html>


<?php


mysqli_close($conn);


?>
