<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## modification connection db
il faut aller dans le fichier .env a la racine et modifier les informations

## views
elles sont situées dans le dossier resources/views, quand on les appelles, on est pas obligé de mettre les / ` '/posts' => 'post' `
il utilise une class Route qui appel une function, exemple get Route::get, on lui donne une route et des arguments

on peut appeller une class apres le chemin avec 'adresse de route et la function avec un @ `class@function`, il faut mettre le chemin absolut sauf en faisant `[Nameclass::class]`
il ajoute directement le route du controller avec un `use \chemin_du_controller;`
dans cette chaine de charactere, on peut indiquer [] un 2eme argument donc la function `[Nameclass::class, 'index']`

on peut passer plusieurs argument notament le `compact('nom_de_variable')`
et dans la view, blade et comme twig, il suffit de mettre `{{ nom_de_variable }}`
on peut aussi utilise ('path')->with('title', $title) pour afficher dans la view

ou on peut passer un array sous forme de tableau, avec clé = variable
`[
    'title'=> $title,
    'title2' => $title2,
    ]`

    au niveau de la route vous pouvez indiquer une id ou autre avec `/post/{id}` et la recuperer dans la function

    dans la varibla on peut lui mettre une valeur 'sinon' avec `??`  $posts= post[$id] ?? 'sinon l autre titre';

    ### regex
    pour specifier un type de charactere nous pouvons joindre a la Route::get un ->wherenumber('id');

    ### organisation des views
    pour organiser et differencier sont body, header, footer,nav,etc... il faut organiser sa view avec des sous dossiers

    il faut mettre dans un fichier qui genere uniquement notre template un champ @yield('content'), le nommage est propre a chacun
    et pour l'appeler on fait un extend de ce champ avec @extend et dedans le chemin separer par des comma / ou un . layouts.app

    ### section

    il faut indiquer le contenu dans une @section('content') et indiquer le nom du champ de @yield

    pour mettre une navbar ou et footer, il faut faire un @include dans le fichier template principale

## nommage des chemins
pour nommer il suffit d'ajouter la function name apres le Route ->name('nom_choisi') + facile pour les noms de chemin
puis dans la template blade utiliser la function route `{{ route('welcome')}}`
***

## webpack
webpack est inclus dans le framework, il compile les css et js en un, pour installer les dependances
`npm install` et `npm run dev` pour par ex, framework css
ou bien un `npm run watch` pour qu'il recompile en live

## link css
il faut l'appeler dans le template avec un link traditionnel est en lien `{{asset('css/name.css')}}` le lien dans le dossier public

## env sql
pour changer le type de sql, il faut changer le type dans db_connection dans le fichier env a la racine mysql => postgres

il faut utiliser php artisan pour creer des tables, avant d'être envoyé, les commandes sql sont integrer dans un fichier dans le dossier `database/migrations`

les migrations sont relier au Models, la commande suivante
php artisan make:model Nom_model -m
creer un model+la migrations pour la mettre dans la database

il creait automatiquement des tables updated_at et created_at

pour migrer vers la database
`php artisan migrate`

on peut voir la function `blueprint` pour modifier en dur les types des champs que l'on veut

la function now() permet de generer l'heure

## factory
dans le dossier factory a userfactory, il y a une fonction faker qui permet de generer une list d'utilisateurs

## 
### raccourci emet

dans la view, vous pouvez utiliser le raccourci @ pour chercher une function, ex=> foreach
## php artisan
toute les commandes en faisant `php artisan --help` et `php artisan list`

creation d un factory avec la commande `php artisan make:factory --model=Post`  à la fin on peut le lier à un model avec la commande --model=
ensuite pour generer des post ou utilisateur avec facker, il faut entrer dans un terminal php avec
`php artisan tinker`
et une fois dedans il faut ecrire
le nom du factory User:factory()->count(10)->create(); qui permet avec la function count de generer le nombre d'user que l'on veut et la function create pour lancer le processus
***
# eloquence
permet de mapper des object et les relier à la base de données (ORM)
pour recuperer les données, c'est tres simple; $posts = post::all();

## view condition
maintenant pour afficher les elements de la databse, il suffit de faire `nom_dans_db->nom_title` dans un foreach et on peut ajouter des conditions @if ou @ifelse de nombre de post if($posts->count() > 0) show post @else nothing to show
la function find() permet de recuperer l id notamment ou autre d un tableau post::find($id)
findOrFail qui permet de s'occuper d'erreur 404 si il ne trouve pas l'user ou post
## find post specific
pour appeler un post specific $post = Post::where('title', '=' ,'dfdgv sdfdgd sddf').
1 - le = n est pas necessaire dans la requet
 on ajoute un get pour recuperer ->get();

Pour eviter de se retrouver dans un array qui causes des erreurs, il suffit de faire ->first();
et pour eviter les 404 firstOrFail();

# get et post
on peut nommer l url sur le même nom car la method est differente entre get et post, du coup la method dans le form est {{ route('posts.store') }}
## crsf
il faut vproteger son formulaire avec le code @crsf sinon il y a une erreur 419

on créé la nouvelle function store et dedans on peut lui indiquer request $request, qui permet de stocker notre formulaire dans une requete

## comment recuperer ces infos dans notre db
il faut creer une nouvelle instance de post `$post = new Post;` il suffit d'indiquer a quoi correspond les champs
`$post->title = $request->title;`
ensuite il suffit de faire un save `$post->save();`

## autre method
on peut faire simplement 
`Poste::create([
    'title' => $request->title, 
    'content' => $request->content ])`

    avec cette method laravel se protege car on lui a pas indiquer de le faire
    il faut aller dans le model et lui passer la ligne
    `protected $fillable = ['title', 'content']`

## list articles
on peut lister les articles un peu comme dans une db avec les attribut orderby et apres get `Post::orderBy('title')->get();` pour recuperer en nom il faut mettre l'attribut `->take(3)`
***

## enregistrement dans database
il faut moduler les elements par exemple dans un article, il faut separer l article des commentaires et leur attribuer a chacun une table propre et de les relier avec une method `one to many`

pour appeler une id etrangere a celle de la table, il faut faire `$table->unsignedBigIntegger('post_id);`
il faut indiquer a quelle table et colonne on veut la relier
`$table->foreign('post_id')->ireference('id')->on('post');
2 - si la table porte le même nom avec 's'
on peut faire `$table->foreignId('post_id')->constrained();`

dans le model, il faut ajouter cette public function
return $this->hasMany(Comment::class);

## afficher comment
enfin pour afficher les commentaires dans la vue, il suffit de faire un foreach de $post->comments as $comment pour afficher l'ensemble des commentaires

***

## relation One to one
pour illustrer cette methode, un post est lie a une image

un champ n'est pas forcement obligatoire , donc dans migration, $table->string('path')->nullable();
nullable pour indiquer donc qu'il n'est pas obligatoire, ou on peut lui mettre une valeur par default avec `default('')`
% important %
onDelete('cascade') permet de supprimer l'image si le post est effacé!!

la clé etrangere ici `post_id` peut etre defini dans le model hasone(Post:class, 'cle etrangere')

## relation manytomany
par exemple un tags peut representer plusieurs choses (voitures,design,maison) et il peut aussi etre attribue a plusieurs personnes
c'est une table pivot qui lie les 2 tables ensembles
-On créer toujours un model qu'on associe à une migration avec le drapeau -m  (php artisan make:model Tag -m)

il y a une function dans laravel pour creer la table pivot! (qui relie 2tables manytomany)
`php artisan make:migration create_pivot_table_` on ajoute a la fin le nom des tables a lier post_tag
ensuite on va dans le fichier migration, creer les lignes pour reliers les id `$table->foreingId('post_id)->constrained();`
idem pour tag_id

la function belongstomany accepte plusieurs arguments au cas ou le nom de la table pivot soit different, possible même d'indiquer les cles

Pour ecrire automatiquement le chemin Use \app\model\... , il faut etre sur la class et appuyer sur ctrl+alt+i
___
# relation one to many POLYMORPHYQUE
qui permet d'optimiser nos tables, par exemple nos tables posts et videos contiennent des commentaires, au lieu de creer 2 tables commentaires, nous rajoutons des champs dans la table commentaire comment_id et comment_type

## remove table en ligne de command
on creer une migration en indiquant son role remo_table
puis on ecrit `schema::dropifExists('name_of_table');`

## morphto et morphmany
pour relier les models ensembles `return $this->morphMany(Name::class, 'name_function')`

pour sauvegarder dans une table on utilise save() mais si il y a plusieurs instructions dans un array, on doit utiliser `saveMany()`

laravel se protege pour ne pas passer tous les arguments, il faut refaire un `protected $fillable = ['content']`
et pour autoriser tout sans probleme `$guarded = []`

## composer update pour mettre a jour laravel

***
# nouvelle relation has one through
pour recuperer ;e dernier commentaire
`
    public function latestComment() {
        return $this->hasOne(Comment::class)->latestOfMany();
    }` latestofmany qui va prendre le max id de la table et l'afficher
    ou le plus vieux oldofmany 

    pour selectionner au niveau quantitatif nous pouvons faire un ofmany avec 2 valeur `ofMany('mavaleur', 'max') pour afficher la valeur la plus grande ou min pour la plus petite`
***


# utilisation de Request
quand on appel la route on peut precise un $name par exemple et au niveau de la function de le passer après la request
public function store(request $request, $name)

dans la function $request il y a differentes options comme $request->path pour recuperer le chemin taper dans la method post
`isroute('show.route')` permet de verifier si le formulaire renvoi bien la bonne route
&& fullurlwithquery([argument1, argument2]) permet d'ajouter des arguments à l'url! http://mon.url?index?=argument1
les valeurs par default peuvent etre indiquer en second parametre $request->input('name', 'sarah)

pour recuperer les differents valeurs d'un formulaire il faut faire `$request->input('products.0.name')`, on recupere le champs products, le lien 0 (1er) et sa valeur name on peut le remplacer par *
pour recuperer une valeur de l'url on peut aussi faire un query
$request->query('name_of_valeur')

## method boolean dans request
$request->boolean('name'), permet d'attribuer et recuperer des valeurs dans une checkbox et la mettre en true ou false

ps; pour envoyer des fichiers img/pdf ou autres il faut definir dans form apres method enctype='multipart/form-data'

on peut utiliser certaines function comme extension $request->image->extension(); pour recuper l'extension d une image 'jpg'
l'option store('images') permet de stocker sur le serveur dans le dossier images, le fichier envoye, il le creer dans storage/app/
 ## deploy on heroku

`heroku create

echo 'web: heroku-php-apache2 public/' > Procfile

git init

git add . 


git commit -m "initial import"

 heroku addons:create heroku-postgresql:hobby-dev

heroku config:set SYMFONY_ENV=prod




"compile": [
"php bin/console doctrine:migrations:migrate"
]





composer require symfony/apache-pack

git add .

git commit -m "heroku config"

git push heroku master `
