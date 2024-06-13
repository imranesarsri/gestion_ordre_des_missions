# Prototype

## Guide de Démarrage pour prototype 

1. Ouvrez votre terminal.
2. Accédez au répertoire app
```bash
cd app
```

3. Installer les dépendances Composer :
```bash
composer install
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
```bash
npm install
```

9. Démarrer le serveur de développement :

```bash
php artisan serve
```
- Compiler les assets avec npm :
```bash
npm run dev
```
