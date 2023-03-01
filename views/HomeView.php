<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Agenda">
    <title>AGENDALY</title>
    <link rel="stylesheet" href="../assets/styles/homepage.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&family=Lato:wght@300;400;700;900&display=swap"
      rel="stylesheet">
  </head>
  <body>
    <!-- Navbar -->

    <nav>
      <ul>
        <li>
          <a href="#" onclick="openNav()"><i class="fa-solid fa-bars"></i></a>
        </li>
        <li><h1>AGENDALY</h1></li>
        <li>
          <a href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </li>
      </ul>
    </nav>
    
    <div id="sideMenu" class="overlay">
        <div class="overlay-content">
          <a href="#" class="close-btn" onclick="closeNav()">&times;</a>
          <div class="bg-img">
            <img src="../assets/img/img-logIn.png" alt="" class="bg-blur" >
          </div>
  
          <!-- SideMenu -->
          <div class="side-menu-header">
            <h3>Mes agendas</h3>
            <div class="side-menu-header-navbar">
              <a 
                href="/createAgenda?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>">
                <div class="create-agenda">
                  <i class="fa-regular fa-plus"></i> Créer Agenda
                </div> 
              </a>

              <form method="GET">
                <select name="filter-is_public" id="filter-is_public" class="filter-choice" onchange="window.location = '/home?filterExist=<?=$filter_exist?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>&filter='+this.value">
                  <option value="dateRecent" <?= ($filter === "dateRecent")?"selected":"" ?>>Date &uarr;</option>
                  <option value="dateFar" <?= ($filter === "dateFar")?"selected":"" ?>>Date &darr;</option>
                  <option value="public" <?= ($filter === "public")?"selected":"" ?> >Public</option>
                  <option value="private" <?= ($filter === "private")?"selected":"" ?> >Privé</option>
                </select>
              </form>
            </div>
          </div>
        
          <div class="side-menu-body">
          
            <form 
              action="/home?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>" 
              method="POST"
            >
              <div class="agendas">
                <?php
                if (!empty($owned_agendas)) {
                  foreach ($owned_agendas as $key=>$agenda) { ?>
                    <div class="agenda">
                      <input id="agenda<?=$agenda['id']?>" class="agenda-toggle" type="checkbox" name="<?=$agenda['id']?>" <?= (!empty($_SESSION['checkedAgendas']) && in_array($agenda['id'], $_SESSION['checkedAgendas'])) ? 'checked' : ''?> />
                      <label for="agenda<?=$agenda['id']?>" class="agenda-title"><?=$agenda['name']?></label>
                      <a href="/deleteAgenda?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>&id=<?= $agenda['id']?>"><i class="fa-solid fa-trash"></i></a>
                    </div>
                <?php } } ?>
              </div>
              
              <h3 class="other-agendas-title">Autres agendas</h3>
              <div class="agendas"> 
                <?php
                if (!empty($collaboratif_agendas)) {
                  foreach ($collaboratif_agendas as $key=>$agenda) { ?>
                    <div class="agenda">
                      <input id="agenda<?=$agenda['id']?>" class="agenda-toggle" type="checkbox" name="<?=$agenda['id']?>" <?= (!empty($_SESSION['checkedAgendas']) && in_array($agenda['id'], $_SESSION['checkedAgendas'])) ? 'checked' : ''?> />
                      <label for="agenda<?=$agenda['id']?>" class="agenda-title"><?=$agenda['name']?></label>
                      <a href="#">&nbsp;</a>
                    </div>
                <?php } } ?>
              </div>
              
              <input type="submit" name="submitAgenda" value="Valider Agendas">

            </form>

          </div>
          
          <div class="side-menu-footer">
            <ul>
                <li><a href="#">Confidentialités</a></li>
                <li><a href="#">Mentions légales</a></li>
            </ul>
          </div>
        </div>
      </div>

    <main class="homepage">
      <section class="main-header">
        <h2>Planning de <?php echo $_SESSION['name']; ?></h2>

        <ul class="create-post">
          <li>
            <div class="create">
              <i class="fa-solid fa-plus"></i>
              <span> Créer </span>
              <i class="fa-solid fa-chevron-down"></i>
            </div>
            <ul class="dropdown-create">
              <li>
                <a href="/createEvent?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>">
                  <div class="create-event">
                    <span> Un évènement </span>
                    <i class="fa-solid fa-chevron-right"></i>
                  </div>
                </a>
              </li>
              <li>
                <a href="/createTask?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>">
                  <div class="create-task">
                    <span> Une tâche </span>
                    <i class="fa-solid fa-chevron-right"></i>
                  </div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <div class="header-tools">
          <div class="pagination">
            <a class=" <?=($currentPage == 1) ? 'hidden' : '' ?>" href="/home?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$currentPage-1 ?>"> <i class="fa-solid fa-chevron-left"></i> </a>
            
            <a class=" <?=($currentPage == $pages) ? 'hidden' : '' ?>" href="/home?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$currentPage+1?>"> <i class="fa-solid fa-chevron-right"></i> </a>
          </div>

          <div class="filter">
            <select class="filter-choice" name="filter" id="filter" onchange="window.location = '/home?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&page=<?=$current_page?>&filterEvent='+this.value">
              <option value="dateRecent" <?= ($filter_event === "startdate")?"selected":"" ?> >Date &uarr;</option>
              <option value="dateFar" <?= ($filter_event === "dateFar")?"selected":"" ?>>Date &darr;</option>
              <option value="event" <?= ($filter_event === "event")?"selected":"" ?> >Evènement</option>
              <option value="task" <?= ($filter_event === "task")?"selected":"" ?> >Tâche</option>
            </select>
          </div>
        </div>
      </section>

      <!-- homepage body -->

      <section class="posts">

      <?php
      if (!empty($events)) {
        foreach ($events as $key=>$event) { ?>
          <div class="card-event">
            <a 
              href="<?=($event['id_user'] === (int)$_SESSION['id']) ? (($event['type']=='event') ? '/modifyEvent?id='.$event['id'].'&filterExist='.$filter_exist.'&filter='.$filter.'&filterEvent='.$filter_event.'&page='.$current_page : '/modifyTask?id='.$event['id'].'&filterExist='.$filter_exist.'&filter='.$filter.'&filterEvent='.$filter_event.'&page='.$current_page) : ''?>"
              class="btn-toggle-modal">

                <span class="card-start-date"><?=(!empty($event['startdate'])? 'Du &nbsp;'. $event['startdate'] :'')?></span>
                <span class="card-end-date"><?=(!empty($event['enddate'])? 'Au &nbsp;'. $event['enddate'] :'')?></span>
                <span class="card-start-hour"><?=(!empty($event['starthour'])? ' &mdash; '. $event['starthour'] :'')?></span>
                <span class="card-end-hour"><?=(!empty($event['endhour'])? ' &mdash; '. $event['endhour'] :'')?></span>

                <h3 class="card-title"> <?= $event['name'] ?> </h3>

                <p class="card-description">
                    <?= $event['description'] ?>
                </p>
            </a>
            <?php
                  if ($event['id_user'] === (int)$_SESSION['id']) { ?>
                  <a class="card-delete" href="/deleteEvent?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>&id=<?= $event['id'] ?>" ><i class="fa-solid fa-trash"></i></a>
                  <?php } ?>
          </div>
        <?php } } ?>        
            
    </section>
        
            <div class="btn-create-mobile">
              <i class="fa-solid fa-plus"></i>
              <div class="dropdown-content">
                  <a href="/createEvent?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>">
                      <div class="create-event">
                        <span> Un évènement </span>
                        <i class="fa-solid fa-chevron-right"></i>
                      </div>
                      </a>
                  <a href="/createTask?filterExist=<?=$filter_exist?>&filter=<?=($filter)?>&filterEvent=<?=($filter_event)?>&page=<?=$current_page?>">
                      <div class="create-task">
                        <span> Une tâche </span>
                        <i class="fa-solid fa-chevron-right"></i>
                      </div>
                      </a>
              </div>
            </div>

    </main>
    <script src="../assets/script/app.js"></script>
  </body>
</html>
