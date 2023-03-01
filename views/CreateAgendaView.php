<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Agenda">
    <title>AGENDALY - Create agenda</title>
    <link rel="stylesheet" href="../assets/styles/Posts.css">
</head>
<body>
    <div class="card">
        <a href="/home?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>" class="btn-close" aria-hidden="true">×</a>

        <h2 class="title">Créez votre agenda</h2>

        <form action="/createAgenda?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>" method="POST">
          <label class="label-input" for="name">
            <input type="text" class="input-text" name="name" id="name" placeholder="&nbsp;" />
            <span class="label">Nom</span>
          </label>
        <div class="radio-privacy">
          <div>
            <input type="radio" id="public" name="is_public" value='1'>
            <label for="public">public</label>
          </div>
          
          <div>
            <input type="radio" id="private" name="is_public" value='0' checked>
            <label for="private">privée</label>
          </div>
        </div>

          <label class="label-input">
            <input type="text" class="input-text input-text-invite" placeholder="mail_1@email.com, mail_2@email.com, ..." name="invite" />
            <span class="label">Inviter des membres</span>
          </label>
          <button type="submit" name="submitAgenda" class="btn-save">Enregistrer</button>
          <br/>
          <div class="message-event"> <?=($error_name)??''?> </div>
          <div class="message-event"> <?=($message_create_agenda)??''?> </div>
          
        </form>

      </div>
    </div>
</body>
</html>