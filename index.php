<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<form action="" method="post" enctype="multipart/form-data">
    <label for="upload">Votre photo : </label>
    <input type="file" id="upload" name="upload[]" multiple="multiple"/>
    <input type="submit" name="submit" value="Enregistrer"/>
</form>


<?php
if (isset($_POST['submit'])) {
    $maxi_size = 1000000;
    $upload_dir = 'upload';

   // var_dump($_FILES);


    for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {

        $size = $_FILES['upload']['size'][$i];
        $file = $_FILES['upload']['name'][$i];
        $type = $_FILES['upload']['type'][$i];
        $types=['image/jpeg','image/png','image/gif'];

        if (($size < $maxi_size) && (in_array($type,$types))) {



            $name = $_FILES['upload']['name'][$i];
            $infos = new SplFileInfo($name);
            $ext = $infos->getExtension();
            $filename = 'image' . str_replace('/tmp/php', '', $_FILES['upload']['tmp_name'][$i]) . '.' . $ext;
            echo '<img style="width:100px" src="upload/'.$filename.'"><h3 style="color:green">Ton fichier ' . $file . ' de taille ' . $size . ' Mo est bien enregistré !</h3><br><br>';

            //var_dump (pathinfo($_FILES['upload']['name'][$i]));


            $tmp_name = ($_FILES['upload']['tmp_name'][$i]);
            move_uploaded_file($tmp_name, "$upload_dir/$filename");
        }elseif(($size < $maxi_size) && (!in_array($type,$types))){
            echo '<h3 style="color: red;">pas le bon format ! Uniquement fichiers jpeg,png,gif.</h3>';
        } else {
            echo '<h3 style="color:red;">Fichier ' . $file . ' trop volumineux ! ' . $maxi_size . ' maximum !</h3><br><br>';
        }
    }


}


?>

<a href="galerie.php"><button class="btn btn-primary">Vers galerie</button></a>