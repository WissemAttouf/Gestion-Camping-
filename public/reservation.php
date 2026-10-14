
     
    <?php
    $conn = mysqli_connect("localhost","root","","camp") or die("Error " . mysqli_error($connection));
        if(isset($_POST['reserver']))
        {
            $visiteur=$_POST['id_visiteur'];
            $lieux=$_POST['id_lieux'];
            $debut=$_POST['date_debut'];
            $services=$_POST['id_service'];
            $guide=$_POST['id_guide'];
            $nbr_place=$_POST['nbr_place'];
            $p_t=$_POST['nbr_place_tot'];
            $p_r=$p_t - $nbr_place;
            $etat=$_POST['etat'];
            $prix=$_POST['prix'];
            $prix_tot= $prix * $nbr_place;           
            $dte=date('Y-m-d');
            
            if($p_r>=0)
            {
                $req=mysqli_query($conn,"INSERT INTO `reservation`(`idvisiteurs`, `nbreplacetotale`, `idlieux`, `idservice`, `idguide`, `payement`, `datereservation`, `datedebut`, `etat`, `nbreplacereserve`, `nbreplacereste`, `created_at`, `updated_at`) VALUES ('$visiteur','$p_r','$lieux','$services','$guide','$prix_tot','$dte','$debut','$etat','$nbr_place','$p_r','$dte','$dte')");
                if(!$req)
                {
                    echo("Error description: " . mysqli_error($conn));
                }
                else
                {
           
                $req2=mysqli_query($conn,"UPDATE lieux set NbrPlaces='$p_r' where id='$lieux' ");
                if(!$req2)
                {
                    echo("Error description: " . mysqli_error($conn));
                }

                header('Location:reservation?msg=1');
            
                }
            }
            elseif($p_r < 0 )
            {
                header('Location:reservation?msg=2');
            }
           }

    ?>
