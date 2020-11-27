<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

   <h1><?= $title ?></h1>



<div class="row justify-content-center">
<?php if(isset($validation)) : ?>
<div class="col-12 col-sm-8 ml-auto">
    <div class="text-danger">
        <?= $validation->listErrors() ?>
    </div>
</div>
<?php endif ?>
    <div class="col-12 col-sm-5">
    <form method="post">
    <div class="form-group">
        <label >Name</label>
        <input type="text" name="name" value="<?= set_value('name') ?>" class="form-control"  placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label >Email address</label>
        <input type="text" name="email" class="form-control"  value="<?= set_value('email') ?>"  placeholder="Enter email">
    </div>
    <div class="form-group">
        <label >Password</label>
        <input type="password" name="password" class="form-control"  placeholder="Password">
    </div>
    <div class="form-group">
        <label >Confirm Password</label>
        <input type="password" name="confirmpassword" class="form-control"  placeholder="Confirm Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>

<?= $this->endSection() ?>