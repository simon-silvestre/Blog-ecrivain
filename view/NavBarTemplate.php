<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/kskfi39pi0ot1fuscttiugeqx9jsgvejbgftfo0k8akd9klg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://kit.fontawesome.com/b9aff8c9cf.js" crossorigin="anonymous"></script>
    
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <a class="navbar-brand" id="logo" href="index.php?action=Home">Jean Forteroche</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mr-lg-2">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?action=Home">Accueil<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=listPosts">Chapitres</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administration</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="index.php?action=ListChapitres">Chapitres manager</a>
            <a class="dropdown-item" href="index.php?action=listComment">Commentaires manager</a>
          </div>
        </li>
      </ul>
      <nav class="navbar navbar-light mr-lg-7">
      <form class="form-inline hamburger_button">
        <a href="index.php?action=logout" class="btn btn-outline-secondary connect_button">Se déconnecter</a>
        <a href="index.php?action=login" class="btn btn-outline-secondary connect_button">Se connecter</a>
      </form>
      </nav>
    </div>
  </nav>

  <?= $content ?>
</body>
</html>