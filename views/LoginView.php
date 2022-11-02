<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;900&family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
   
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <title>Connexion</title>
</head>
<body class="grid">
  
    <div class="sign-up">
     
      <form class="signup-form" action="/" method="POST" >

        <h1>Connexion</h1>

        <label class="label-input">
        <input type="email" class="input-text" name="email" placeholder="&nbsp;">
        <span class="label">Email</span>
        </label>

        <label class="label-input">
        <input type="password"  class="input-text" name="password" placeholder="&nbsp;">
        <span class="label">Mot de passe</span>
        </label>
        
        <button type="submit" name="submitLogin"><span>Se connecter<span></button>

        <div class="message-login"> <?=($message_signin)??''?> </div>

        <p>Nouveau client,<span> <a href="/signUp">Créer un compte</a><span></p>

      </form>
    </div>

    <div class="welcome-container">
    </div>

    
</body>
</html>
