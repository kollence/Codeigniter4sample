<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cyborg/bootstrap.min.css" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/codemirror.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/theme/eclipse.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body  class="bg-secondary">
<?php 
    $uri = service('uri');
?>
<!-- HEADER -->
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav justify-content-end">
                <?php if(session()->get('isLogged')) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?= session()->get('name') ?></a>
                        <div class="dropdown-menu  dropdown-menu-right">
                        <a class="dropdown-item" href="/logout">Logout</a>
                        <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item"  href="#">Dashboard</a>
                        </div> -->
                    </li>
                    <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null )?>" >
                    <a  class="nav-link"  href="/dashboard">Dashboard</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item <?= ($uri->getSegment(1) == 'login' ? 'active' : null )?>">
                        <a class="nav-link"  href="/login">Login</a>
                    </li>
                    <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null )?>">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                <?php endif ?>
            

            
            </ul>
        </div>
    </nav>
   
</div>
<!-- CONTENT -->
<div class="bg-secondary">
    <?= $this->renderSection('content') ?>
</div>
<!-- FOOTER -->
<div class="fixed-bottom navbar-dark bg-dark" >
    <h4>Footer</h4>
    <ul>
        <li>1</li>
        <li>1</li>
        <li>1</li>
    </ul>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/mode/xml/xml.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/formatting.js"></script>
<script>
        $('.summernote').summernote({
            height: 150,
            codemirror: {
                theme: 'eclipse'
            },
            // toolbar: [
            //     ['basic', ['style','fontname','fontsize']],
            //     ['color', ['forecolor','backcolor']],
            //     ['style', ['bold','italic','underline','clear']],
                
            // ]
        });
</script>
</body>
</html>