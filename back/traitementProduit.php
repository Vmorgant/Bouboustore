<?php
	include_once './connect.php';
	$Nom=$_POST['nom'];
	$Descriptif=$_POST['descriptif'];
	$Commentaire=$_POST['commentaire'];
	$Image = $_POST['image'];
    $Categorie= $_POST['choixcategorie'];
    $Fournisseur= $_POST['choixFournisseur'];
    $Prix= $_POST['prix'];
    $Devise= $_POST['choixDevise'];
	$QueryAjout = "INSERT INTO `produit`(`nom`, `descriptif`, `commentaire`, `image`, `categorie`) VALUES ('".$Nom."',"'.$Descriptif.'",'".$Commentaire."','".$Image."','".$Categorie."')";
	$Result= $Connect->query($QueryAjout);

    $QueryCategorie = "SELECT DISTINCT nom FROM `categorieProduit`";
    $CategorieList= $Connect->query($QueryCategorie);
    $present=0;
    $i=0;
    while ($Data = mysqli_fetch_array($CategorieList) ){
        if($Data[$i] == $Categorie){
            $present=1;
        }
        $i++;
    }
    if($present==0){
        $QueryAjout = "INSERT INTO `categorieProduit`(`nom`) VALUES ('".$Categorie."')";
        $Result= $Connect->query($QueryAjout);
    }

    $QueryFournisseur = "SELECT DISTINCT nom FROM `fournisseur`";
    $FournisseurList= $Connect->query($QueryFournisseur);
    $present=0;
    $i=0;
    while ($Data = mysqli_fetch_array($FournisseurList) ){
        if($Data[$i] == $Categorie){
            $present=1;
        }
        $i++;
    }
    if($present==0){
        $abreviation=substr($Fournisseur,0,3);
        $QueryAjout = "IF NOT EXISTS (SELECT `nom`,`abreviation` FROM `fournisseur` WHERE `nom`='".$Fournisseur."' && `abreviation`='".$abreviation."') INSERT INTO `fournisseur`(`nom`,`abreviation`) VALUES ('".$Fournisseur."','".$abreviation."')";
        $Result= $Connect->query($QueryAjout);
    }
    $QueryDevise = "SELECT DISTINCT `id_devise` FROM `Devise` WHERE `abreviation`== '".$choixDevise."'";
    $DeviseList= $Connect->query($QueryDevise);
    if($DeviseList==NULL){
        $QueryAjout = "INSERT INTO `devise`(`abreviation`) VALUES ('".$choixDevise."')";
        $Result= $Connect->query($QueryAjout);
        $QueryDevise = "SELECT DISTINCT `id_devise` FROM `devise` WHERE `abreviation`== '".$choixDevise."'";
        $DeviseList= $Connect->query($QueryDevise);
    }
   
	header("location:ajoutProduit.php");
?>