<?php
	include_once 'connect.php';
	$Nom=$_POST['nom'];
	$Descriptif=$_POST['descriptif'];
	$Commentaire=$_POST['commentaire'];
	$Image = $_POST['image'];
    $Categorie= $_POST['categorie'];
	$QueryAjout = "INSERT INTO `produit`(`nom`, `descriptif`, `commentaire`, `image`, `categorie`) VALUES ('".$Nom."',".$Descriptif.",".$Commentaire.",'".$Image."','".$Categorie."')";
	$Result= $Connect->query($QueryAjout);

    $QueryCategorie = "SELECT DISTINCT nom FROM `categorieProduit`";
                                    $Categorie= $Connect->query($QueryCategorie);
                                    $present=0;
                                    while ($Data = mysqli_fetch_array($Categorie) ){
                                        $i=0;
                                        if($Data[$i] == $Categorie){
                                            $present=1;
                                        }
                                        $i++;
                                    }
                                    if($present==0){
                                        $QueryAjout = "INSERT INTO `categorieProduit`(`nom`) VALUES ('".$Categorie."')";
                                    }
	header("location:ajoutProduit.php");
?>