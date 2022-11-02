<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/styles/Posts.css">
</head>
<body>
    <div class="card">
        <a href="/home?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>" class="btn-close" aria-hidden="true">×</a>
        <h2 class="title" >Créez votre évènement</h2>

        <form action='/createEvent?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>' method='POST'>
          <label class="label-input">
            <input type="text" class="input-text" name="name" placeholder="&nbsp;" required />
            <span class="label">Nom</span>
          </label>
          <div class="input-start-date">
            <label class="label-input date">
              <input
                type="date"
                class="input-text input-date" name="startdate" required
                placeholder="&nbsp;"
              />
              <span class="label">Date de début</span>
            </label>
            <label class="label-input date">
              <input
                type="date"
                class="input-text input-date" name="enddate" required
                placeholder="&nbsp;"
              />
              <span class="label">Date de fin</span>
            </label>
          </div>
          <div class="input-end-date">
            <label class="label-input date">
              <input
                type="time"
                class="input-text input-date" name="starthour"
                placeholder="&nbsp;"
              />
              <span class="label">Heure de début</span>
            </label>
            <label class="label-input date">
              <input
                type="time"
                class="input-text input-date" name="endhour"
                placeholder="&nbsp;"
              />
              <span class="label">Heure de fin</span>
            </label>
          </div>

          <label class="label-input">
            <input type="text" class="input-text" name="invite" placeholder="&nbsp;" />
            <span class="label">Inviter des membres</span>
          </label>
          <label class="label-input">
            <textarea
              class="input-text textarea" name="description"
              placeholder="&nbsp;"
            ></textarea>
            <span class="label">Description</span>
            <div class="text-inside-description"></div>
          </label>
          <input type="submit" name="submitEvent" class="btn-save" value="Enregistrer">
          <div class="message-event"> <?=($error_name)??''?> </div>
          <div class="message-event"> <?=($error_startdate)??''?> </div>
          <div class="message-event"> <?=($error_enddate)??''?> </div>
          <div class="message-event"> <?=($error_agenda)??''?> </div>
          <div class="message-event"> <?=($error_plage)??''?> </div>
          <div class="message-event"> <?=($message_create_event)??''?> </div>
        </form>
      </div>
    </div>
</body>
</html>