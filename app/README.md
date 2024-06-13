# Gestion personnels 

<!-- TODO rédaction-2 : 
- Introduction 
- Objectif de gestion personnels 
-->


# Installation de Laravel

1. Ouvrez votre terminal.
2. Accédez au répertoire app

```bash
cd app
```
3. Installer les dépendances Composer :

Consulter  la documentation pour avoir une idée détaillée des packages installés dans ce prototype.

```bash
composer install
npm install
```

4. Créer un fichier .env en copiant .env.example :
   
```bash
cp .env.example .env
```

5. Configuration de la Base de Données pour un Projet Laravel
   
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=password
```
6. Générer une clé d'application avec artisan :

```bash
php artisan key:generate
```
7. Migrer la base de données :

```bash
php artisan migrate
```
8. Exécuter les seeders pour peupler la base de données :
   
```bash
php artisan db:seed
```

9. Installer les dépendances npm :


## Exécution de projet 


```bash
php artisan serve
```

L'exécution de projet nécessite la présence des fichiers 

- public\build\assets
  - app.css
  - app.js

Ces deux fichier sont générer par 

```bash
npm run build
```

ou 

```bash
npm run dev
```


## Loin and password 

### admin

login : admin@solicode.co
password : admin

### responsable

login : responsable@solicode.co
password : responsable



