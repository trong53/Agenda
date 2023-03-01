Projet Agenda :  créer un site entier : maquette -> HTML CSS -> PHP + SQL (utiliser le MVC)

1/ Résumé

Le but de l'application est de pouvoir enregistrer des évènements selon une date précise ou une plage de date. Les évènements peuvent être publics ou privés, et concerner un seul ou plusieurs utilisateurs. Les évènements sont enregistrés sur un agenda. Plusieurs agendas peuvent être créés.

2/ Planning

Le planning suivant a été spécifié :

    • Initialisation du projet et maquettage : 2 jours 
    • Intégration des maquettes : 3 jours 
    • Modélisation et intégration de la base : 1 jour 
    • Développement de la partie agenda : 2 jours 
    • Développement de la partie évènements : 3 jours 
    • Développement de la partie utilisateur : 2 jours 
    
Temps global : 13 jours

a/ Spécifications fonctionnelles

- Utilisateurs :

 • L'application nécessite une inscription et être connecté afin de visualiser les agendas publics et ses agendas privés.

 • Les utilisateurs ont un nom, un email et un mot de passe.

 - Agendas :

 • Un agenda est composé d'un nom.
 
 • Un agenda peut être public ou privé.
 
 • Un agenda privé peut être collaboratif. C'est à dire, des utilisateurs peuvent y être ajoutés et ces utilisateurs peuvent ajouter des évènements.
 
 • Seul le créateur de l'agenda peut supprimer cet agenda.

 - Evènements :

 • Les évènements peuvent être ajoutés à un agenda.
 
 • Les évènements sont supprimables uniquement par le créateur de l'évènement.
 
 • Les évènements sont modifiables uniquement par le créateur de l'évènement.
 
 • Les évènements ont un nom, une description et des invités optionnels.
 
 • Il existe deux types d'évènements : Les évènements ponctuels (appelé tâche) ou les évènements classiques.

 - Tâches : 

 • Les tâches sont des évènements spécifiques. Ils contiennent qu'une date avec une heure.

 - Classiques :

 • Les évènements classiques contiennent une date de début et une date de fin. Les heures sont optionnelles.

3/ Conception

 - Agendas
 
    • Les agendas sont filtrables par visibilité (public ou privé). 
    
    • Les agendas sont triables par date du plus récent évènement. 
    
    • Les agendas sont triables par date de création (croissant et décroissant). 
    
    • Les agendas sont filtrables si l'on est le créateur ou juste invité. 
    
 - Evènements
 
    • Les évènements sont filtrables par type.
    
    • Les évènements sont triables par date (croissant et décroissant). 
    
    • Un utilisateur ne peut pas créer deux évènements concurrents (sur la même plage de date). 
    
 - Utilisateurs
 
    • Les emails doivent être uniques.
    
    ![Capture1](https://user-images.githubusercontent.com/107623849/222165242-bb9a1e58-6984-4c0d-af9b-7d073a21764d.jpg)
    ![Capture2](https://user-images.githubusercontent.com/107623849/222165288-8c28e959-4064-427e-bafb-f3155bf0ff90.jpg)
    ![Capture3](https://user-images.githubusercontent.com/107623849/222165333-ed949a55-1631-4090-b47c-f437c4f56d61.jpg)
    ![Capture4](https://user-images.githubusercontent.com/107623849/222165348-de705016-07bb-4228-9df4-b83a66fc65b9.png)
    ![Capture5](https://user-images.githubusercontent.com/107623849/222165359-bfa953ef-aef8-4107-8b1d-9d3b5122de78.png)
    ![Capture6](https://user-images.githubusercontent.com/107623849/222165384-8a49c34b-4ecb-459d-8542-bba516d56437.png)
    ![Capture7](https://user-images.githubusercontent.com/107623849/222165393-989e52a5-be3c-4a58-ae2c-36095d296e05.jpg)
    ![Capture8](https://user-images.githubusercontent.com/107623849/222165413-a040dd99-b6c8-46d2-aace-8808b94da584.jpg)
    ![Capture9](https://user-images.githubusercontent.com/107623849/222165423-8567bc4a-a527-47e8-b2c1-b63feb2b3284.jpg)

