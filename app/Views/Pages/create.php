<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div>
<h1><?= $title ?></h1>

<div class="row  justify-content-center">
    <div class="col-12 col-md-7">
        <?php if(isset($err_valid)) : ?>
            <div class="text-danger">
            <?= $err_valid->listErrors() ?>    
            </div>
            <?php elseif(isset($success)) : ?>
            <div class="text-success">
            <?= $success ?>    
            </div>
        <?php endif ?>
        <form method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="exampleInputName">Naslov</label>
            <input name="naslov" value="<?= set_value('naslov') == false ? $naslov ?? '' : set_value('naslov') ?>" type="text"  class="form-control" id="exampleInputName">
        </div>
        <div class="form-group" style="background-color: #fff" >
            <textarea  name="tekst"  class="summernote" cols="30" rows="10" style="b"><?= set_value('tekst') == false ? $tekst ?? '' : set_value('tekst') ?></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Upload Picture</label>
            <input type="file" multiple name="file[]" class="form-control-file" id="exampleFormControlFile1" >
        </div>

        <div class="row  d-flex justify-content-between">
            <div class="col-1">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-1">
                <a  href="/dashboard" class="btn  btn-outline-warning" role="button">Back</a>
            </div>
        </div>
        </form>
    </div>
    <?php if(!empty($galery)) : ?>
        <div class="col-12 col-md-7 py-2 my-3" style="border: solid black 1px">
            <div class="row justify-space-around">
        <?php foreach($galery as $img) : ?>
                                        <div class="col-12 col-sm-2">
                                                <img src="/<?= $img ?>" width="100" height="100" alt="">
                                                <form method="post" action="/dashboard/removeimg">
                                                <input type="hidden" value="<?= $img ?>" name="delete_file" />
                                                <button  class="btn btn-danger btn-small mt-2" value="" >    Delete   </button>
                                                </form>
                                        </div>
        <?php endforeach ?>                
            </div>

        </div>
    <?php endif ?>
</div>
</div>


<?= $this->endSection() ?>