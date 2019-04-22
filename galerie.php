<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
if (isset($_GET['image'])) {

    $road = 'upload/' . $_GET['image'];
    unlink($road);
}
$files = scandir('upload');
?>
<div class="row">
    <?php
foreach ($files as $file => $data) {

    if ($data != '.' && $data != '..') {

        // echo '<img style="width:300px;" src="upload/' . $data . '"><a href="galerie.php?image=' . $data . '"><button name="' . $data . '">Supprimer</button></a><br>';
        ?>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="upload/<?php echo $data ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $data ?></h5>

                <a href="galerie.php?image=<?= $data ?>" class="btn btn-primary">Suprimer</a>
            </div>
        </div>


        <?php
    }
}
?>
</div>
<a href="index.php">
    <button class="btn btn-primary" style="margin-top: 30px">Retour</button>
</a>
