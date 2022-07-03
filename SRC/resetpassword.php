
<?php include('server1.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Awesome -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/loginstylef.css">


</head>
<body>
      <!-- Material form register -->
  <div class="modal-wrap">

  <div class="modal-bodies">
    <div class="modal-body modal-body-step-1 is-showing">
      <a  ><img src="image/logo1.png" alt="Logo"></a>
      <br><br>
      <div class="title">
      Neauveau mot de passe</div>
      <div class="description">Entrez votre nouveau mot de passe!</div>
      <br>
                        <!-- Form -->
                        <form class="text-center" action="resetpassword.php" method="POST">
                        <?php include('errors.php'); ?>
                            <div class="form-row">
                                <div class="col">

                            <!-- Password -->
                            <div class="md-form">
                                <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                            </div>
                            <!-- Sign up button -->
                            <button class="button " type="submit" name="submit">Connexion</button>
                            <!-- Social register -->
                         
                            <!-- Terms of service -->
                            <div class="forgetpass"><a>Vous avez déja un compte</a><a href="logIn.php"> Connectez vous 
        </a></div></div>
                        </form>
                        <!-- Form -->
                    </div>
                </div>
                <!-- Material form register -->
            </div>
        </div>
    </div>

</body>
</html>

