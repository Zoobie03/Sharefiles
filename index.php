<?php
  // $_FILES contains an image and its error code is 0
  if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    // The image is less than 3 mo
    if ($_FILES['image']['size'] <= 3000000) {
      // Additional information about our image
      $informationsImage = pathinfo($_FILES['image']['name']);

      // Recovering our image extension
      $extensionImage = $informationsImage['extension'];

      // Array of extensions accepted by our server
      $extensionsArray = ['png', 'gif', 'jpg', 'jpeg'];

      // Image has a valid extension
      if (in_array($extensionImage, $extensionsArray)) {

        // Move image to uploads folder with a unique filename
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.time().rand().rand().'.'.$extensionImage);
      }
    }

  } else {
  }

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/default.css">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>ShareFiles - Hébergez gratuitement vos images et en illimité</title>
  </head>
  <body>
    <header>
      <a href="../">
        <span>ShareFiles</span>
      </a>
    </header>

    <section>
      <h1>
        <i class="fas fa-paper-plane"></i>
      </h1>

      <form method="post" action="index.php" enctype="multipart/form-data">
        <p>
          <label for="image">Sélectionnez votre fichier</label><br>
          <input type="file" name="image" id="image">
        </p>
        <p id="send">
          <button type="submit">Envoyer <i class="fas fa-long-arrow-alt-right"></i></button>
        </p>
      </form>
    </section>
  </body>
</html>