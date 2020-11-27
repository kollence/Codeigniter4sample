<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div style="padding: 20px">
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 offset-sm-1">
    <h1><?= $title ?></h1>

<a href="/create" class="btn btn-info">Create</a>

<?php if(isset($err)) : ?>
            <div class="text-primary">
            <?= $err ?>    
            </div>
            <?php elseif(isset($success)) : ?>
            <div class="text-success">
            <?= $success ?>    
            </div>
        <?php endif ?>
    <ul class="list-group">
        <?php foreach ($clanci as $clanak) : ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
      <a href="/dashboard/clanak/<?= $clanak['clanak_id'] ?>" ><?= $clanak['naslov'] ?></a>
        <span class="badge badge-primary">
            <a class="btn btn-danger btn-small" href="/dashboard/delete/<?= $clanak['clanak_id'] ?>">Delete</a>
            <a class="btn btn-warning btn-small" href="/edit/<?= $clanak['clanak_id'] ?>">Edit</a>
        </span>
      </li>
        <?php endforeach ?>
    </ul>
    </div>
    <!-- <div class="col-12"> -->
      <div class="col-12 col-sm-7 offset-sm-4 ">
                      <?= $pager->links('dashboard', 'clanci_pagination') ?>
      </div>
    <!-- </div> -->
  </div>
</div>
</div>




<?= $this->endSection() ?>