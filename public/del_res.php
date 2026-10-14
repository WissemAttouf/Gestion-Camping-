
     
    <?php
    $conn = mysqli_connect("localhost","root","","camp") or die("Error " . mysqli_error($connection));

    $id=$_GET['id_res'];
    $user=$_GET['usr'];
    $req=mysqli_query($conn,"DELETE from reservation where id=$id");
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
    header('location:mes_reservations?msg=1&id='.$user);
    exit;           

    ?>
