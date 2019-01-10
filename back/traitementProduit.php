<?php

$dev = true;

include_once '../connect.php';
$Nom=$_POST['nom'];
$Descriptif=$_POST['descriptif'];
$Commentaire=$_POST['commentaire'];
$Image = $_POST['image'];
$Categorie= $_POST['choixCategorie'];
$Fournisseur= $_POST['choixFournisseur'];
$Prix= $_POST['prix'];
$Devise= $_POST['choixDevise'];

$QueryAjout = "INSERT INTO `produit`(`nom`, `descriptif`, `commentaire`, `image`, `categorie`) VALUES ('".$Nom."','".$Descriptif."','".$Commentaire."','".$Image."','".$Categorie."')";
$Result= $Connect->query($QueryAjout);


// Verification de l'existance du produit
$QuerySelectNom = 'SELECT * FROM  produit WHERE nom=\''.$Nom.'\';';
$responseSelectNom = $Connect->query($QuerySelectNom);
if ($dev) {echo '$responseSelectNom'; var_dump($responseSelectNom);}
if ($responseSelectNom->num_rows!=0){
    echo 'Le produit est déjà en BDD';
} else {
    echo 'Le produit n\'est pas en BDD<br><br>';

    // Verification de l'existance de la catégorie du produit
    $QuerySelectCategorie = 'SELECT id_categorie FROM  categorieProduit WHERE nom=\''.$Categorie.'\';';
    $idCategorie = $Connect->query($QuerySelectCategorie);
    if ($dev) {echo '$idCategorie<br><br>'; var_dump($idCategorie);}
    if ($idCategorie->num_rows==0) {
        echo 'Insertion de la categorie du produit en BDD';
        $Connect->query('INSERT INTO categorieProduit VALUES (DEFAULT, \''.$Categorie.'\'); ');
    }
    $idCategorie = $Connect->query($QuerySelectCategorie)->fetch_all()[0][0];
    if ($dev) {echo '<br>$idCategorie = '.$idCategorie.'<br><br>';}


    // Verification de l'existance du fournisseur
    $QuerySelectFournisseur = 'SELECT id_fournisseur FROM  fournisseur WHERE nom=\''.$Fournisseur.'\';';
    $idFournisseur = $Connect->query($QuerySelectFournisseur);
    if ($dev) {echo '$idFournisseur<br><br>'; var_dump($idFournisseur);}
    if ($idFournisseur->num_rows==0) {
        echo 'Insertion du fournisseur en BDD';
        $Connect->query('INSERT INTO fournisseur VALUES (DEFAULT, \''.substr($Fournisseur,0,3).'\', \''.$Fournisseur.'\');');
    }
    $idFournisseur = $Connect->query($QuerySelectFournisseur)->fetch_all()[0][0];
    if ($dev) {echo '<br>$idFournisseur = '.$idFournisseur.'<br><br>';}


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

header("location:../ajoutProduit.php");
?>