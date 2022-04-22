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
### raccourci emet

dans la view, vous pouvez utiliser le raccourci @ pour chercher une function, ex=> foreach
## php artisan
toute les commandes en faisant `php artisan --help` et `php artisan list`

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
