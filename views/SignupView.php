<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/signup.css">

    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;900&family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
   
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <title>Inscription</title>
</head>
<body class="grid">
  
    <div class="sign-up">

        <form class="signup-form"  action="/signUp" method="POST">
            <h1>Créer un compte</h1>
            
            <label class="label-input">
            <input type="text" class="input-text" name="name" placeholder="&nbsp;">
            <span class="label">Nom</span>
            </label>

            <label class="label-input">
            <input type="email" class="input-text" name="email" placeholder="&nbsp;">
            <span class="label">Email</span>
            </label>

            <label class="label-input">
            <input type="password" name="password" class="input-text" placeholder="&nbsp;">
            <span class="label">Mot de passe</span>
            </label>
            <div class="password"> Minimum 8 caractères : au moins une lettre Majuscule, un caractère spécial et un chiffre </div>

            <input type="submit" name="submitSignup" class="submit-button" value="S'inscrire">
            
            <div class="message-signup"> <?=($validation_params['name']['error'])??''?> </div>
            <div class="message-signup"> <?=($validation_params['password']['error'])??''?> </div>
            <div class="message-signup"> <?=($validation_params['email']['error'])??''?> </div>
            <div class="message-signup"> <?=($message_signup)??''?> </div>

            <p>Vous avez déjà un compte ?<span> <a href="/">Connectez-vous!</a><span></p>
        </form>
    </div>

    <div class="welcome-container">
    </div>  
</body>
</html>