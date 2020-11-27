<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

   <div class="container">
           <button class='btn btn-small btn-default' onclick="javascript:window.history.go(-1);"><< Back</button>
           <?php if(session()->get('isLogged')) : ?>
        <a class="btn btn-danger" href="/clanak/delete/<?= $clanak['clanak_id'] ?>">Delete</a>
                     <a class="btn btn-warning" href="/edit/<?= $clanak['clanak_id'] ?>">Edit</a>
        <?php endif ?>
           
        <div class="row justify-content-center">
                <?php if(isset($clanak)) : ?>
                        <div class="col-12 col-sm-7">
                    <h1><?= $naslov ?></h1>
                    <p><?= $tekst ?></p>
                     
                </div>
                <?php if(isset($img_file)) : ?>
                <div class="col-12 col-sm-7">
                <div class="row">
                        <?php foreach($galery as $img) : ?>
                                        <div class="col-12 col-sm-3">
                                                <img src="/<?= $img ?>" width="100" height="100" alt="">
                                        </div>
                        <?php endforeach ?>
                </div>
                </div>
                <?php endif ?>
                <?php endif ?>
        </div>
   </div>
<?= $this->endSection() ?>