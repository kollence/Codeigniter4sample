
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php 

// echo '<pre>';
//     var_dump($pager->links());
//     echo '</pre>';
?>

   <h1><?= $title ?></h1>
    <?php if ($clanci): ?>
        <div class="row  justify-content-center">
                <div class="col-12 col-sm-7 offset-sm-2">
                    <ul>
                    <?php foreach($clanci as $clanak) : ?>
                                <li>
                                <div class="row justify-space-between">
                                <div class="col-sm-5" style="border-bottom: 1px solid black">
                                <small>ID: <?= $clanak['clanak_id'] ?></small>
                                    <h3><?= $clanak['naslov'] ?></h3>
                                </div>
                                <div class="col-sm-1" >
                                    <a href="/clanak/<?= $clanak['clanak_id'] ?>" class="btn btn-warning  btn-sm">Detalji</a>
                                </div>
                            </div>
                                </li>
                        <?php endforeach ?>  
                    </ul> 
                </div>
                <!-- <div class="row  justify-content-center"> -->
                    <div class="col-12 col-sm-7 offset-sm-4 ">
                    <?= $pager->links('clanci', 'clanci_pagination') ?>
                    </div>
                <!-- </div> -->
        </div>
    <?php endif ?>


<?= $this->endSection() ?>