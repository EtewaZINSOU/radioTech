---------------------------------------------------------------------------------------------------------
                                    # Bundles internes
---------------------------------------------------------------------------------------------------------
RTechAppBundle : gere tous ceux qui concerne l'application en lui même.

RTechUserBundle: gère les utilisateurs


----------------------------------------------------------------------------------------------------------
                                    # Bundles externes
----------------------------------------------------------------------------------------------------------

FOSUserBundle : Dont hérite RTechUserBundle pour la gestion des utilisateurs

StofDoctrineExtensionBundle: a permis d'utliser  l'extension Sluggable sur les categories.

jms/i18n-routing-bundle: Permet l'internationalisation dans  un projet Symfony2, c'est à dire de proposer la gestion de 
                         plusieurs langues dans le back-end comme dans le front-end et d'exposer facilement les routes pour une utilsation
                         dans le js
                         
jms/translation-bundle: Utilser en complement de jms/i18n-routing-bundle

javiereguiluz/easyadmin-bundle: Pour la gestion de BackOffice
                         
---------------------------------------------------------------------------------------------------------------
                                # Les commandes neccessaires pour installer le projet
---------------------------------------------------------------------------------------------------------------

    php composer.phar install : Pour installer toutes les dépendances de composer.json et composer.lock
    php bin/console doctrine:database:create : Pour creer la base de donnees
    php app/console doctrine:schema:update --force
    
    Mais vu que j'ai mis un fichier sql contenant les informations pour tester certains fonctionnalites
                                
 ------------------------------------------------------------------------------------------------------------
                                         # Deployement
--------------------------------------------------------------------------------------------------------------

C'est un projet en mode prod donc le toolbar de symfony ne s'affiche. our afficher cette toolbar il faudrait faire ca:

     1. Dans app.php il faut changer la ligne $kernel = new AppKernel('prod', true); a false
     
     2.Vider le cache (cache:clear --env=prod --no-debug) et charger votre page pour voir si ca fonctionne et aussi
      si les images ont été chargées ou pas.
      
     Dans le cas échéant il est necessaire de suivre le reste de la procédure du déployement c'est à dire passer a 4.

     3. Ensuite faire : assetic:dump  --env=prod --no-debug

     4.Vider le cache (cache:clear --env=prod --no-debug) et charger votre page pour voir si ca fonctionne et aussi
     si les images ont été chargées ou pas.
     Dans le cas échéant il est necessaire de suivre le reste de la procédure du déployement c'est à dire passer a 6.

     5. Ensuite faire : assetic:dump  web


     6.Vider le cache (cache:clear --env=prod --no-debug) et charger votre page.Je pense qu'a ce stade ca devrait marcher


-------------------------------------------------------------------------------------------------------------------------
                                                # LES URLS UTILES
---------------------------------------------------------------------------------------------------------------------
            
                        GESTION DES UTILISATEURS
                        
            Langue: FRANCAIS
                    http://localhost/radioTech/web/fr/user/login
                    http://localhost/radioTech/web/fr/user/logout
                    http://localhost/radioTech/web/fr/user/register
                    http://localhost/radioTech/web/fr/user/profil
                    http://localhost/radioTech/web/fr/user/profil/edit
            
            Langue: ESPAGNOL
                    http://localhost/radioTech/web/es/user/login
                    http://localhost/radioTech/web/es/user/logout
                    http://localhost/radioTech/web/es/user/register
                    http://localhost/radioTech/web/es/user/profil
                    http://localhost/radioTech/web/es/user/profil/edit
            
## Users pour la connexion

Login                  |     Password          |          Role
----------------       |---------------------  |----------------------------------------------
charles@yopmail.com    |        admin          |         `ROLE_ADMIN`
job@gmail.com          |        admin1         |         `ROLE_ADMIN`
john@yopmail.com       |        user1          |         `ROLE_USER`
micky@gmail.com        |        user2          |         `ROLE_USER`


