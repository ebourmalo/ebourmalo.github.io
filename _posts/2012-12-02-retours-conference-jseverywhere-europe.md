---
layout: post
title: Retours sur la conférence js.everywhere(europe) 2012
---

## La conférence

La conférence js.everywhere(europe) s’est déroulée le vendredi 16 et le samedi 17 novembre au Tapis rouge, dans le 10ème arrondissement de Paris. Organisée par la société 4D, la première journée était destinée à faire découvrir son nouveau produit : Wakanda. La seconde journée était quant à elle réservée aux présentations des technologies liées au JavaScript.
Waka quoi ?
Wakanda est le nouveau produit développé par 4D, une entreprise connue pour son précédent produit également appelé 4D. Wakanda est, comme sans prédécesseur, une plateforme de developpement All-in-one permettant de développer rapidement des Business Webapp avec une stack full js. 
Cette plateforme comprend :

* Wakanda Server : un serveur web ainsi qu’une base de données intégrée 
* Wakanda Framework : le framework avec ses nombreux widgets 
* Wakanda Studio : l’IDE permettant de gérer le serveur web, d’avoir un support natif du framework au sein de l’éditeur de code et d’avoir l’outil de conception d’UI en drag’n'drop.

Personnellement, les solutions tout en un ne m’ont jamais vraiment emballées. Bien qu’il s’agisse d’un outil open source (core c++) avec une stack fonctionnelle full js, cette plateforme me rappelle Visual Studio et l’environnement .Net. Si vous êtes comme moi pour rester sur des solutions légères et rester maître du code de bout en bout et ce, sans surcouche, passez votre chemin. Cela dit, cette solution peut être une très bonne alternative pour qui veut réaliser une business webapp rapidement.

## Journée du Vendredi – Wakanday

#### 9.00 – 9.30am : Wakanday Keynote

Cette keynote d’ouverture a commencé par une présentation des sponsors de la conférence (Amazon Web Services, Mozilla). Après une présentation des chiffres clés depuis les débuts de Wakanda, le fondateur de 4D, Laurent Ribardière liste les amélioriations de la version 3 :

* Envoi d’emails avec pièces jointes simplifié 
* Fonctionnalité de full restore & backup de la webapp (avec les données) 
* Backup journaling 
* Nouvelle structure des pages web 
* Intégration de GitHub 
* Fonctionnalité de connexion à distance d’une autre base de données Wakanda

On pourra également noter que le process de quality assurance est à base de Jenkins, phantomJS, maven et Sikuli.
Une première démo nous montre la facilité de créer un modèle de données (2 entités) à l’aide de code js. Dans la vue “Visualisation du modèle” de W. Studio, nous constatons que l’association entre les 2 entités s’est effectuée automatiquement.

Pour finir, nous assistons à une autre démo live d’une webapp Wakanda à partir d’un modèle de données existant. Quelques minutes et clics plus tard (drag’n'drop), une IHM avec écran splité permettait d’afficher la liste des speakers de la conférence sur la gauche et les différentes sessions de la journée sur la droite à l’aide d’une connexion à distance à un modèle existant avec quelques lignes de js. Le binding data – ui est fait également dans le concepteur d’IHM.

#### 9.30 – 10.15 : Utilisation d’un modèle de données distant avec Wakanda

Le speaker a mis en avant la fonctionnalité d’exposition automatique du modèle de données pour le front-end puisqu’une architecture REST est automatiquement créée en conséquence.
Cette présentation nous a permis de voir la simplicité de pouvoir se connecter a un modèle de données existant.

#### 10.30 – 11.25 : Create your first business app

Démonstration d’une single-page webapp developpée avec wakanda. Les points à retenir : - possibilité de surcharger les CSS générées par le concepteur d’IHM à travers un fichier custom.css. - un objet côté client appelé WAF (Wakanda Ajax Framework) contenant notamment le modèle manipulé. - test avec un modèle de données conséquent (1 million de tuples) affiché sous forme de v-scrolling table. Conclusion : en fonction du scrolling effectué par le user, des requêtes ajax sont envoyées automatiquement au serveur afin de récupérer au fur à mesure les informations du modèle. Un système de cache a également été mis en place pour ne pas envoyer de requêtes inutiles au serveur.

#### 11.30 – 12.15 : Building a multi-platform application

Démonstration d’une création d’application multi-platforme. Chaque plateforme possède finalement sa propre UI en passant par le concepteur d’IHM de Wakanda mais chaque vue utilise le même modèle et même logique métier. Seule contrainte pour le moment : les widgets graphiques pour la création d’UI mobiles sont orientés iOS. On se retrouve donc avec une interface ios aussi bien sur un iphone que sur un smartphone android ou windows phone.

#### Lunch

Mis à part le fait que j’ai loupé la mousse au chocolat pour le dessert, j’ai rencontré Brice A. qui s’occupait notamment du TP HTML5 qui s’est déroulé la journée suivante.

#### Agile development with Wakanda and Javascript

Le speaker a montré dans quel contexte il était intéressant de travailler en agile à partir d’un petit exemple amusant auquel j’ai participé. Avec une autre personne du public, nous avons dû écrire 20 fois une phrase du type : “I should definitely work with agile”. Personnellement, je devais l’écrire de manière séquentielle une phrase après l’autre. Quant à elle, elle devait l’écrire de manière itérative soit une rangée du même mot l’une après l’autre. Au bout de 30 secondes, le speaker dit alors : “Stop please, I wanna see what you did.”.

Bilan : j’avais terminé d’écrire ma troisième phrase et commençais la quatrième. Elle, avait terminé sa première colonne de “I” et commençait celle de “should”. J’avais donc quelque chose de produit, 3 phrases. Elle, rien.
Tout ça pour dire que les méthodes agiles sont adaptées aux projets IT dans le sens où : - le client a une bonne visibilité sur le projet - il peut tester à tout moment le produit et changer les fonctionnalités en cours de projet - un produit est fourni au fur et à mesure
Le lien avec Wakanda et JavaScript ?? Et bien je n’en vois pas.

#### 16.30 – 17.15 : Wakanda, AngularJS

Cette conférence nous a permis de voir comment débuter simplement et rapidement avec AngularJS avec de simples exemples tels que l’éternel TODO List. Ce qui différencie ce framework client des autres vient surtout de son aspect fonctionnel. Une intégration à Wakanda a été apportée afin de rendre son utilisation simple et native (Support et autocomplétion disponible sous W. Studio).

Après une discussion post-talk très intéressante avec le speaker, j’apprends que Angular est également le seul framework client à pratiquer la technique du “dirty checking” (et non a implémenter le design pattern Observer) pour détecter les changements liés au modèle de données ou aux éléments du DOM. Cette technique, également utilisée dans l’univers du jeux vidéo, permet de mettre à jour les éléments modifiés sans forcément savoir la cause du changement ni le comment de la modification. Cela rend le système plus réactif.

## Journée du samedi – JavaScript everywhere

#### 9:00 – 9:40 : Welcome – secured business web applications in the cloud

3 points a retenir de cette présentation : 1 – Design for failure (Assume everything fails and design backward) 2 – Loosely coupled design (The looser the layers are coupled, the bigger they are scale) 3 – NoSQL DataBase (DynamoDB, low latency, seamless scalability, predictable performence)

####9:40 – 10:10 : The full javascript stack for business apps

La présentation a débuté par la définition d’une business webapp : - un modèle de données - une logique métier - accès par client léger (navigateur web) - mise en place de sécurité - déploiement aisé
Vint ensuite la citation de plusieurs technologies (dont certaines basées sur JavaScript) dont je vous laisserai faire quelques recherches si vous êtes intéressés : aptana, varnish, acegi, django, extjs, joyent, ql.io

#### ArangoDB – Using javascript in the database

ArangoDB peut se présenter comme une alternative intéressante à la solution aujourd’hui favorite de systèmes NoSQL à base d’execution JavaScript : MongoDB. Elle permet d’effectuer notamment des requêtes complexes via un langage “sql-like”. Il peut être défini en tant que DBServer ou en tant que Serveur d’application avec architecture REST gérant automatiquement les requêtes Http.

#### OrientDB – Javascript-based nosql database

OrientDB est également une alternative à MongoDB. Il garde cependant le langage natif SQL pour les requêtes complexes et permet de communiquer avec les clients et/ou avec le serveur entièrement et nativement en JSON. Le speaker a également projeté une architecture web Client – DBServer sans intermédiaire (serveur d’app). Il s’en dégageait alors notamment des problématiques d’accès concurrents et de sécurité, notamment vis à vis de l’exposition du code côté serveur.

#### Testacular – The spectacular javascript test runner

Testacular est un produit signé Google permettant de lancer de manière automatique des tests unitaires javascript. Il affiche le résultat des tests sur la console à partir de laquelle il sera lancé, mais également sur une page web si besoin. Une démo nous a été présentée avec l’outils Jasmine, favoris aujourd’hui des tests unitaires en javascript. Le speaker rappelle que Testacular reste un Test Runner et non un outil pour concevoir les tests.

Voici une présentation quasi similaire :

<iframe width="560" height="315" src="//www.youtube.com/embed/MVw8N3hTfCI?rel=0" frameborder="0" allowfullscreen></iframe>


#### Javascript – your new overlord

Douglas Crockford, développeur actif JavaScript, créateur du format Json et de l’outil JsLint, nous a narré l’histoire du web liée à la technologie JavaScript. Très intéressante, je vous recommande chaudement de regarder cette conférence :
<iframe width="560" height="315" src="//www.youtube.com/embed/Trurfqh_6fQ?rel=0" frameborder="0" allowfullscreen></iframe>

#### You want to do what with javascript !?!

Cette présentation nous a montré qu’il était possible d’interagir avec des cartes électroniques en utilisant le langage javascript. Le speaker nous a fait une petite démo avec une webapp qui permettait à travers son interface de contrôler des LEDs situées sur la carte et de récupérer en temps réel les informations de ses capteurs.

## Conclusion

Ces 2 jours de conférence m’ont vraiment fait prendre conscience que le JavaScript est aujourd’hui présent sur beaucoup de plateformes différentes (pc, mobiles, console de salon, appareils électroniques) et possède un écosystème robuste. Je pense personnellement que son développement en est encore à son début et nous commençons à en découvrir les avantages. Bien qu’il ne soit pas forcément une solution pour tous les projets, il peut-être intéressant de s’y pencher un moment pour en découvrir ses bons côtés.
Cela m’a également permis de rencontrer les créateurs de “Human Coders” (merci à Brice) ainsi que Vojta Jína travaillant dans l’équipe de développement AngularJS. 
Un petit coucou également à Emmanuel Blonvia, Samuli Ulmanen, Ricardo Mello et Carl Ogren, tous développeurs js, avec qui j’ai passé un bon moment.
