Contexte du projet : 

Une compagnie aérienne veut créer une application pour gérer les réservations des vols offerts. L'application doit avoir un back-office pour gérer les vols et aussi un front-office pour que les utilisateurs suivent l'état de leurs réservations et peuvent aussi imprimer le ticket de vol.



Réaliser la conception UML de l'application (diagramme Use Case et de Classes) selon les critères suivants :
Trois entités à prévoir : utilisateurs (users), vols, réservations

Les utilisateurs doivent s’inscrire pour pouvoir réserver des vols. Les utilisateurs peuvent modifier et annuler les réservations qui ont déjà.

Réaliser le front-office de l'application où les utilisateurs peuvent réserver et faire le suivi de leurs réservations.
L'application requière la création de compte et l'authentification
Réaliser un formulaire dynamique de réservation qui s'adapte selon les besoins suivants :
Le formulaire s'adapte selon le choix (aller-simple ou aller-retour), dans le cas d'aller-retour surgit la nécessité de persister deux vols en même temps à la base de donnée
Possibilité de réserver le vol pour plusieurs personnes en introduisants leurs informations personnels nom, prénom, date de naissance (dans la limite des places disponibles dans le dit vol)
(Optionnel) Le formulaire peut gérer les réservations multi-destinations
(Optionnel) L'utilisateur peut imprimer le ticket du vol via l'application
Réaliser le back-office de l'application où l'admin peut gérer les vols offerts (CRUD des vols) et voir les réservations.


Contraintes technologiques :

L'application doit être programmée en PHP avec les principes de programmation orientée objet.
L'application doit respecter l'architecture MVC (Model-View-Controller)
L'utilisation de Bootstrap
Utilisation du Sass pour adapter Bootstrap
Utilisation de JS pour faire le formulaire dynamique