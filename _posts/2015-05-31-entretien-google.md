---
layout: post

title: Le recrutement @Google, ça se passe comment ?
subtitle: "Le parcours d'un hobbit"

image: post_google.png
---

![](/images/googleInterview_logo.jpg)

Nous sommes en 2012. J'ai toujours été très curieux et je me demandais comment se passait le recrutement chez Google. Je pense ne pas être le seul
à m'interroger sur le sujet :) <!-- more -->
Ce fameux process qui, d'après de nombreux ouï-dires, prend des semaines et se présente sous différentes formes. 
Bref, après avoir demandé à tous mes contacts, personne ne l'avait essayé. 

![](/images/angular.png){: .right .width100}
En participant à une conférence technique à Paris, je rencontre Vojta Jina qui travaille pour Google dans l'équipe Angular (nouveau kid on the block des frameworks js).
Après de bonnes heures de discussion, il m'invite à postuler pour rejoindre Google. Il me propose de donner mon adresse email à un recruteur 
si je suis intéressé, ce que j'accepte volontier. Après tout, je n'ai rien à perdre et ce sera une bonne expérience. 

## Premier round

![](/images/googleInterview_call.jpg){: .left .width150}
Je reçois un premier email d'un recruteur Google de Londres une semaine après. On convient d'une date pour un RDV téléphonique.
Le jour J arrive et voilà, le téléphone sonne. Inutile de vous précisez que l'échange se fait en anglais.
Le recruteur se présente et me dit comment va se passer l'échange. 
C'est à mon tour de me présenter et de décrire mon parcours professionnel. 

***Vient ensuite 3 questions techniques:***

- A quoi sert le doctype dans un document web
- La différence entre un noeud DOM définit en `display: none` et un autre définit en `visibility: hidden`
- Qu'est ce qu'une closure dans un contexte javascript et comment en créér une

{: .center}
![](/images/front-end.png){: .width200}

Si vous n'avez pas les réponses, je vous laisse Googler ça. Mon constat était de voir que ces premières questions étaient très "de surface"
et couvraientt rapidement l'environnement front-end (compréhension générale du web, feuilles de style CSS et javascript). *Elles permettent de faire une première sélection sur les candidats.*

Le recruteur me dit que j'aurai rapidement des nouvelles et me remercie pour l'entretien. 

## Second round

Je rentre en contact avec un deuxième recruteur par email me proposant un second entretien téléphonique. 
J'apprends que le poste pour lequel je postule est développeur front-end sur le projet Cultural Institute.
Puis rentre en contact avec un autre Googler, s'occupant de coordonner mes entretiens et de suivre mon parcours de recrutement. 

![](/images/googleInterview_cultural.png)

L'entretien téléphonique a lieu, celui-ci se veut beaucoup plus informel. Le recruteur se présente et me demande de me présenter également.
Il me demande également l'expérience qui m'a le plus marqué et de développer sur le sujet.
S'en suit de quelques questions pour compléter mon CV et me remercie pour l'échange.

## Troisième round

![](/images/google_docs.png){: .right .width100}
Il m'annonce le jour d'après que je vais pouvoir passer un entretien technique avec un développeur front-end.
Cet entretien s'est fait par Google Hangout avec une session de live coding via un Google doc.
Le développeur se présente, développeur front-end sur Youtube.
Les choses sérieuses commencent. Une image apparait sur le Google doc. 

***Le scénario***

![](/images/googleInterview_youtube.png)


Voici une nouvelle interface Youtube que l'on voudrait développé pour les TV connectées. L'exercice est de
développer le code HTML, css et javascript pour créer un prototype fonctionnel. 

***Exercice***

Il me demande dans un premier temps d'écrire le code HTML en expliquant mon résonnement et mes choix.

Un bout de ce que j'ai écrit:

<figure>
  <figcaption>File: folderName/fileName.rb</figcaption>
{% highlight html linenos %}
<div id="div_panelMusic">
    <ul id="ul_musicElement">
    
    {{ items.forEach(index, musicItem, array) }}
        <li id="{$musicItem.id$}" class="li_musicItem">
            <h2>{$musicItem.name$}</h2>
            <img src="{$musicItem.webPath$}" alt="{$musicItem.altDesc$}" 
                 title="{$musicItem.title$}" />
        </li>
    {$ end forEach $}

    </ul>
</div>
{% endhighlight %}
</figure>

Quelques questions générales m'ont également été posées sur le HTML:

- la différence entre un noeud `div` et un noeud `span`
- comment aligner horizontalement plusieurs div
- pourquoi utiliser un id plus qu'une class

Je dois ensuite écrire la partie CSS avec également quelques questions:

- comment prioriser certaines règles
- qu'est-ce qu'une mega propriété


Un autre bout de ce que j'ai écrit:
{% highlight css %}
#div_content {
    background: url(“/image/somePathToTheBackgroundPicture.png”) 0 0 transparent;
}

#div_leftMenu {
    width: 10%;
    height: 100%;
    float: left;
    border-right: 1px grey solid; 
}

#div_rightContent {
    margin-left: 3%;
}

#ul_menuItems .li_menuItem {
    margin-top: 10px;
    margin-bottom: 10px;
    list-style-type: none;
}

#h1_sectionTitle {
    text-transform: uppercase;
    color: white;
    margin-top: 15%;
    font-size: 2.0em;
}
{% endhighlight %}


Puis il me demande, sans l'écrire, comment je gérerais la partie javascript.

![](/images/mime.png){: .right .width100}
Finalement, il me remercie, me demande si j'ai des question et me dit de passer le bonjour à Mime. A ce stade, j'y voyais deux significations. 
La première, que j'avais raté le test car je n'avais pas parlé du Mime Type.
La seconde, que j'allais rencontré un développeur qui s'appelle Mime.
Je pariais pour la première et j'avais tord =)

## Quatrième round

Je reçois quelques temps après un email d'un nouveau Googler, m'invitant à passer une journée de tests 
aux bureaux parisiens avec l'équipe travaillant actuellement sur le projet.

### entretien front-end

Je rencontre le tech lead front-end. Les choses suivantes me sont demandées, en étant le plus précis possible:

***Décrire le process de bout en bout quand un utilisateur tappe www.google.com sur son navigateur***

[Vous pouvez les trouver ici](https://friendlybit.com/css/rendering-a-web-page-step-by-step/). N'étant pas assez précis dans ma réponse, j'ai le droit à cette question bonus:

***Comment le navigateur interprète le css reçu pour mettre en forme la page html ?***

Un plus de connaitre le dom tree, le cssom tree, le render tree et [leurs modes de faire](https://developers.google.com/web/fundamentals/performance/critical-rendering-path/render-tree-construction)

***Exercice***

*1) Créer une fonction qui prend en paramètre un numero de page et qui, avec une url donnée, va lancer une requête ajax pour recupérer des données.*

Penser à vérifier le paramètre `page`, le caster en int avec `parseInt(page, 10)` et il peut renvoyer un NaN si cast non possible
mais a ne pas mettre dans un try catch

***Question:*** *Comment faire pour traiter les données après la réception (asynchrone) de la réponse ?*

Ajout d'un paramètre `callback`, une fonction qui sera invoquée avec le résultat de la requête ajax en argument

*2) Intégrer cette fonction en tant que méthode d'un objet "xhr"*

*3) Mettre en place un système de cache pour ne pas effectuer de requêtes inutiles* 

On peut définir une propriété `cache` dans l'object `xhr` par exemple.

***Question:*** *Quelle est la différence entre invoquer une fonction X par la méthode `call` et l'invoquer par la méthode `apply` ?*



Un exemple de rendu partiel pour cet exercice:

{% highlight javascript %}
var url = 'http://sampleUrl.com/api/?page=';

var xhr = {
    cache: {},
    get: function (page, cb) {
        ... // check and cast page (never trust user input)
        var cachedResponse = this.cache[page];

        if (cachedResponse) {
            return cb(cachedResponse)
        }
        
	    ..... // do XHR 
	    
	    this.cache[page] = response;
	    cb(response);
	}
};


// using the xhr object

xhr.get(10, function (result) {
    // play with result
});
{% endhighlight %}

### entretien UI

Après la séance de présentation avec un développeur front-end, nous débutons l'entretien.

***Que signifie en css le sélecteur suivant:***
{% highlight css %}
div.bar > #foo input[file='check']
{% endhighlight %}

le chevron est important à connaitre pour des raisons de performance de sélection.

***Comment optimiser les appels http pour les ressources/assets statiques (fichiers css et js) ?***

Il est intéressant ici de parler de cache à tous ces niveaux (http/header, applicatif, reverse proxy), et des méthodes d'optimisation des assets (concaténer, uglifier. ..)

***Scénario:*** Imaginons une petite application web de musique. Une grosse image est affichée au centre pour l'illustration de la musique en cours et une liste de petits thumbnails en dessous, alignés horizontalement, représentent d'autres musiques à jouer.
En cliquant sur une des petites images du dessous ou en navigant avec les flèches du clavier, la chanson sélectionnée doit apparaitre en grand en image centrale et garder l'ordre originale des musiques.
Si on est arrivé à la dernière musique et que l'on navigue au clavier pour la musique suivante, on reboucle sur la première chanson.

***Exercice:*** Ecrire la partie HTML correspondante ainsi que le code javascript nécessaire.


### entretien back-end 

Je rencontre cette fois le tech lead back-end du projet.

***Scénario:*** On dispose des 2 fonctions définies ci-dessous
 
 {% highlight javascript %}
 function createNode(label) {
 	return {
 	    label: label, 
 	    child: []
 	};
 }
 
 function addNode(node, children) {
 	node.child.push(children);
 }
 {% endhighlight %}
 
***Exercice***
 
1) Créer l'arbre suivant:

{% highlight yaml %}
‌‌ ‌‌ ‌‌ ‌‌ ‌‌ a

  b     e 

c   d       f
{% endhighlight %}

2) Ecrire une methode `alertNode(node)` qui permet d'alert le label du noeud et de tous
ces noeuds fils (depth first)

***Scénario:*** Imaginons un site web de Football, durant la coupe du monde, qui affiche uniquement le score 
et les deux équipes correspondantes. Pendant 4h, le site est blindé et des centaines de milliers
de connexions arrivent en simultanné. 

***Questions:*** *Comment concevoir et créer l'architecture pour un tel usage ?*

Optimisations, caches, virtualisation pour scaler automatiquement et rapidement


### entretien UX

Petite particularité pour cet échange, je l'ai fait via Hangout. Mon interlocuteur, UX developer UX, était en Allemagne :)

***Scénario:*** Imaginons que tu travailles sur google maps. Tu dois développer une nouvelle fonctionnalité.
A partir d'un champ de texte, on saisit un pays. L'application doit pouvoir mettre en surbrillance ce pays 
et mettre un voile noir (layout shadow) tout autour.

***Questions:*** *Comment implémenter cette fonctionnalité de manière précise ?*

Récupérer les coordonnées, utiliser SVG ou canvas, bind évènement js..


![](/images/googleInterview_login.png){: .aaa .bbb}

***Scénario:*** Imaginons un écran de connexion demandant un couple login / password. 
Le User doit obligatoirement utiliser son adresse email en tant que login.
Le mot de passe suit également quelques contraintes.

***Questions***

- Comment gérer un nouvel utilisateur à partir de cet écran
- Comment gérer la validation du login et du mot de passe 
- Comment contraindre un email dans le champ login ? 
- Comment bien gérer un mot de passe oublié ?
- Quelles solutions pour assurer l'utilisateur qu'il ne se trompe pas de mot de passe ?
- Des idées d'améliorations d'ergonomie et/ou d'utilisation ?


## Bilan

Après cette journée passée dans les locaux, je savais que ça ne passerait pas. Je n'étais sincèrement pas assez préparé mais quelle expérience. C'était la première fois qu'on me poussait dans mes retranchements au niveau technique. Quand je pouvais répondre, on me demandais d'aller au niveau au dessous voir si je pouvais décrire plus précisément les mécanismes. 

Le process de recrutement a dû bien changé depuis. Cela dit, j'ai appris une chose intéressante en discutant avec un développeur: un candidat est validé uniquement si toutes les personnes l'ayant eu en entretien sont OK. Ils sont également censés trouver meilleurs techniciens qu'eux mêmes :)

Si j'avais quelques conseils à donner pour rejoindre Google:
- soyez bien préparé techniquement (révisez vos algoritmes)
- ayer un bon niveau d'anglais
- soyez à l'aise pour vous exprimer et argumenter vos réflexions

