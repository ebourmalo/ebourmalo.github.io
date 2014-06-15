---
layout: post
title: Server Push Technologies, le bilan
---

Aujourd’hui, le système d’information d’une entreprise est capital. Il permet la compréhension et le bon fonctionnement de la logique métier à travers ses différents acteurs. L’information doit donc être partagée pour tous les acteurs (et corps de métier) afin d’assurer une bonne communication.
Pour répondre à ce besoin, les solutions informatiques proposent leurs services à partir d’une architecture distribuée. Chaque client envoie une requête à un serveur web (central) qui communique la plupart du temps avec une base de données, où sont stockées les informations et effectue des traitements sur celles-ci. La base de données peut être locale (elle se situe directement sur le serveur web) ou externe (elle se situe sur un autre serveur dédié à son usage). Il s’agit dans ce dernier cas d’architecture 3-tiers. Une fois les traitements effectués, le serveur peut renvoyer le rendu généré aux différents clients.    Les informations sont alors actualisées à chaque requête que le client envoie au serveur. Cet événement est matérialisé sous forme de rafraichissement de la page sur le navigateur web. Il s’agit du mode synchrone puisque le navigateur client reste en attente de la réponse du serveur avant de continuer ses opérations.
Avec l’avancée des technologies, la demande du marché a également évolué. En effet, la diffusion de l’information est essentielle mais que se passe-t-il si elle est amenée à être modifiée constamment par différents acteurs ?
Etudions le cas suivant : un client demande au serveur d’obtenir une information, quelle qu’elle soit. Le serveur lui envoie à un instant T0. Supposons que l’information soit modifiée à un instant T1, quelques secondes après T0, nous pouvons constater 2 choses :
* l’information que le client reçoit et conserve devient obsolète en quelques secondes
* Si cette information est manipulée et enregistrée par ce même client, la version la plus récente de l’information sera écrasée inconsciemment
Une des solutions à la problématique du deuxième point réside en l’implémentation de la concurrence optimiste mais elle ne résout pas la problématique soulevée au premier point. Nous nous concentrerons donc sur cet axe.

## L’émergence d’un nouveau besoin

Tout en conservant le concept précédent, le nouveau besoin réside dans le délai de la diffusion de l’information. Nous en venons au concept d’information temps réel afin de garantir constamment la bonne validité de l’information à chaque client. Dans le domaine informatique, le concept de temps réel est abstrait. Il s’agit d’un délai de temps suffisamment petit pour le confondre avec la notion d’instantanéité. Dans le cas concret, les délais constatés sont de l’ordre du dixième de secondes, expliqué par le temps d’acheminement de l’information à travers les différentes architectures réseaux d’Internet.
Dans le schéma suivant, les étapes 4 et 5 représentent la demande de mise à jour en mode asynchrone. La page est déjà affichée (étapes 1, 2 et 3 en mode synchrone) et l’on demande lors de certains évènements un rafraichissement des données uniquement.

## Problématique

Au sein d’une application distribuée, il existe aujourd’hui des solutions afin de partager l’information en temps réel pour les différents utilisateurs. Seulement, les contraintes que cette mise en place exige ne sont pas négligeables. D’une part, une importante quantité de bande passante est utilisée en continue afin de garantir l’intégrité et la disponibilité de l’information. D’autre part, lors d’une montée en charge de plusieurs dizaines de milliers d’utilisateurs, nous constatons que l’architecture ne convient plus.
Comment optimiser la bande passante de ce genre d’architecture tout en gardant le concept de l’information temps réel et pouvoir supporter une charge conséquente d’utilisateurs ?
Nous présenterons les différentes solutions existantes avec leurs avantages et inconvénients afin d’étudier la solution la plus adaptée. L’étude sera cadrée sur les technologies web dans le cadre de la communication entre les clients et le serveur.
Solutions

Nous allons étudier les deux types de technologies web existantes pour mettre en place des solutions web temps réel : celles basées sur le protocole HTTP et celle basée sur le protocole WebSocket.

## Http-based solutions

### Polling

Le polling est la technique la plus simple à mettre en place. Elle consiste à envoyer des requêtes asynchrones au serveur à intervalles réguliers (toutes les n secondes) afin d’avoir l’information synchronisée. Plus l’intervalle sera petit, plus on se rapproche de la notion de temps réel et plus on garantie la validité de l’information. Il est important de noter qu’à chaque envoi de requête au serveur, celui-ci renvoie immédiatement l’information voulue.

#### Avantages :
* Risque d’obsolescence de l’information sur un court délai
 * Compatible avec tous les navigateurs web

#### Contraintes :
* ouvre une connexion avec le serveur à chaque requête 
* Le serveur renvoie les données dans tous les cas (modifiées ou non) : consommation de bande passante inutile

### Long Polling

Le long polling, long-held HTTP request de son vrai nom, reprend les mêmes principes que le polling tout en présentant deux différences.
La première, se rencontre côté client. Le délai des requêtes est supprimé afin de maintenir une connexion active avec le serveur en permanence. Dès que la connexion est fermée, une requête est instantanément renvoyée au serveur afin d’en ouvrir une nouvelle. Une connexion persistante est ainsi simulée à travers plusieurs connexions « micro-interrompues ».
La seconde, côté serveur, intervient lors de la réception d’une requête client. A travers une boucle, les données  sont uniquement renvoyées lorsqu’elles sont différentes de celles du client. Un changement a donc été détecté. Il est également possible de fixer une durée maximale pendant laquelle, si aucun changement n’est détecté, le serveur renverra une réponse pour fermer la connexion.
Dans tous les cas, une connexion reste ainsi toujours active avec le client jusqu’à lui envoyer les nouvelles informations.    

#### Avantages :
* L’information est synchronisée en temps réel 
* Economie sur la bande passante (on envoie uniquement les informations si elles ont subies des modifications) 
* Compatible avec tous les navigateurs web

#### Contraintes :
* Le serveur effectue plus de traitements qu’avec le polling (traitement constant pour vérifier si l’utilisateur possède la dernière version) 
* Le serveur peut vite être surchargé par une charge d’utilisateurs moyenne

### Http Streaming

Le HTTP Streaming (également appelé ajax multipart streaming) est une technologie qui permet de garder une seule et même connexion active avec le serveur grâce à la fonctionnalité « keep-alive » du protocole HTTP 1.1. Il s’agit de l’utilisation des connexions persistantes.
Le client envoie tout d’abord une requête initiale asynchrone qui permettra l’ouverture de la connexion. Le serveur renvoie alors une réponse qu’il met à jour continuellement lorsqu’il en a besoin et ne la ferme jamais.
Une alternative consiste à envoyer une requête asynchrone avec le paramètre multipart définit à true. La réponse pourra alors utiliser le paramètre content-type définit sur multipart/x-mixed-replace et permettra d’envoyer en continue les données. Attention cependant, seuls les navigateurs avec le moteur de rendu Gecko (firefox) disposent de cette fonctionnalité.
On notera également que la technologie Pushlet, qui propose les mêmes fonctionnalités, est basée sur cette technique. Elle reste cependant appliquée au milieu Java (Pushlet est la compression de Push server et Servlet).
Etant donné que cette technologie utilise le protocole http, la connexion établie est unidirectionnelle (push serveur uniquement). Le client ne peut donc pas à travers cette connexion envoyer d’informations au serveur.

#### Avantages :
* Optimisation de la bande passante : seules les informations utiles sont envoyées 
* Réception des informations en temps réel + Une seule connexion établie avec le serveur

#### Contraintes :
* Le serveur effectue plus de traitements qu’avec le polling (traitements constant pour vérifier si ses informations sont à jour) 
* Internet Explorer ne supporte pas cette technologie. Celui-ci attend la réponse complète du serveur pour pourvoir l’exploiter. 
* Certains proxy utilisent le buffering rendant inexploitable cette technique

### Server-Sent Event

Le Server-Sent Event (appelé SSE) est une spécification implémentée dans le package HTML5 sous le nom de « Event Source ». Contrairement aux technologies précédentes, le serveur peut ici envoyer des données au client n’importe quand et ce, sans aucun appel/requête initial du client. Les informations à jour peuvent donc être streamées en temps réel. En réalité, un délai de 3 secondes est constaté entre l’évènement déclencheur du serveur et la réception côté client. Ce délai est conseillé pour avoir le meilleur compromis bande passante / synchronisation temps réel mais peut être modifié.
Il s’agit ici d’un canal unidirectionnel du serveur vers le client. La différence notable par rapport au http Streaming est donc le support natif du navigateur. Le client écoute naturellement (sans demande) les messages du canal.  
Pour résumer, une application cliente s’abonne à un flux d’informations temps réel généré par le serveur qui, dès qu’un événement survient, lui envoie une notification. Un nombre indéfini de clients peut s’inscrire sur ce même flux.
Le paramètre content-type de la réponse est de type text/event-stream, nouveauté insérée avec HTML5.

#### Avantages :
* Fonctionnalité de reconnexion automatique + Peu de ressources utilisées (implémenté nativement dans le navigateur) 
* Peu consommateur de bande passante

#### Contraintes :
* Canal unidirectionnel 
* Non compatible avec tous les navigateurs


## WebSocket-based solution

Une websocket est une technologie plus récente utilisant une seule connexion TCP (socket) et répondant aux problématiques de simulation de temps réel précédemment citées dû au protocole http :
* Envoi de requêtes et de réponses http impliquant l’envoi inutile d’informations redondantes (headers http) ainsi qu’une latence 
* Simulation d’une connexion full duplex client-serveur possible via la création de deux connexions distinctes complexes à synchroniser. Il y a donc une surcharge de la bande passante entrainant une charge excessive pour le serveur avec un nombre conséquent de clients.
Le protocole http n’a initialement pas été créé pour de la communication temps réel entre le client et le serveur. C’est pourquoi les websockets utilisent leur propre protocole afin de répondre à ce besoin :
* Communication en temps réel des informations entre le client et le serveur (full duplex) 
* Les informations circulant sur le réseau sont uniquement des données utiles : maitrise de la bande passante
Le protocole a été standardisé par l’IETF et l’api a été standardisé par HTML5.

#### Avantages :
* Canal full duplex pour la communication entre le serveur et le client 
* Envoi de données utiles uniquement

#### Contraintes :
* Peu de navigateurs 
* Souvent bloqué par des proxy ou des routeurs dans les entreprises 
* Echange constant de requêtes sur le canal

## Conclusion

La technologie Server-Sent Event semble aujourd’hui la plus adaptée afin de répondre aux problématiques de la bande passante et d’une charge conséquente d’utilisateurs.
Face aux problématiques de la compatibilité au niveau des navigateurs, certains frameworks proposent l’échange automatique de la technologie de manière  totalement transparente pour le développeur et l’utilisateur. En effet, le framework va utiliser la technologie la plus adaptée à l’environnement sur lequel il est utilisé. Tout d’abord, il va tester si la technologie WebSocket est supportée. Sinon, il testera le Server-Sent Event, et ainsi de suite jusqu’à utiliser le long-polling si nécessaire.
Les tendances actuelles semblent malgré tout converger vers une seule et même technologie : le WebSocket. Tout l’éco-système (matériel et logiciel) empêchant actuellement son utilisation sera mis à jour afin d’en bénéficier. Elle est également adoptée par de plus en plus de sites web de référence.

Les technologies Push server sont intéressantes pour transmettre de l’information aux clients lors d’un événement côté serveur mais qu’en est-il de la communication avec la base de données ? L’information provenant la plupart du temps d’une base, il existe les mêmes problématiques qu’avec celles du client et le serveur.
Si nous définissons la base de données en tant que source de données,  il existe des solutions permettant d’avertir le serveur en cas de modifications des données à partir de la base, sans qu’elle soit interrogée. Cette dernière envoie alors un message (une notification) au serveur via un MOM lui annonçant une modification. Par exemple, une base Oracle peut utiliser la technologie JMS pour avertir un serveur.

Pour résumer, le serveur de base de données avise le serveur applicatif que l’information a changé en l’envoyant aux clients. Le partage de l’information se fait donc via le serveur de base de données. L’événement initial responsable du déclenchement de la mise à jour de l’information est donc la modification de l’information elle-même. Cela permet, d’une part, d’utiliser un minimum de bande passante concernant l’architecture réseau et d’autre part, de pouvoir supporter une charge conséquente d’utilisateurs puisque l’architecture de l’application est totalement orientée évènement. Des requêtes ne sont alors plus envoyées en permanence afin de vérifier si des modifications ont été effectuées.

