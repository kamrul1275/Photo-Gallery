<?php 
include "Class/admin.php";
$obj_adminBack = new adminBack();
$img = $obj_adminBack->display_image();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fluid Gallery HTML5 CSS3 Template</title>
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<body>
    <a href="index.html" style="font-size: 30px; text-align: center; margin-top: 20px; margin-bottom: 20px; display: block; font-weight: bold;">Upload More Image</a>
    <?php 
        while($img_data = mysqli_fetch_assoc($img)){

        
    ?>
    <div class="grid-item">
        <figure class="effect-sadie">
            <img src="upload/<?php echo $img_data['img_name']; ?>" alt="Image" class="img-fluid tm-img">
            <figcaption>
                <h2><?php echo $img_data['title']; ?></span></h2>
            </figcaption>
        </figure>
    </div>
    <?php } ?>
</body>

</html>