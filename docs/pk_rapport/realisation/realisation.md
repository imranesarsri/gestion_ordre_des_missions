---
layout: default
presentation: false
chapitre: true
package : pkg_rapport
order: 890
---

# Réalisation

## Installation des packages

1. **Adminlte 3.1**

   ```js
   npm install admin-lte@^3.1 --save
   ```

2. **Laravel/ui**

   ```php
   composer require laravel/ui
   ```

3. **Lang Localization**

   ```php
   php artisan lang:publish
   ```

4. **maatwebsite/excel**

   ```bash
   composer require maatwebsite/excel:^3.1
   ```

   ```bash
   composer update
   ```

5. **ckeditor5**

   ```bash
   npm install --save @ckeditor/ckeditor5-build-classic
   ```

Ajoutez ce JavaScript dans `app.js`

```js
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

ClassicEditor.create(document.querySelector("#editor"))
  .then((editor) => {
    window.editor = editor;
  })
  .catch((error) => {
    console.error(
      "Il y a eu un problème lors de l'initialisation de l'éditeur.",
      error
    );
  });
```

6. **Laravel Spatie**

   ```php
   composer require spatie/laravel-permission
   ```

Ajoutez le fournisseur de services dans votre fichier `config/app.php` dans `'providers'`:

```bash
Spatie\Permission\PermissionServiceProvider::class,
```

7. **jquery**

   ```php
   npm install jquery@3.6.0 --save-dev
   ```

8. **Font Awsome Icons**

   ```js
   npm i @fortawesome/fontawesome-free
   ```

9. **Select2**

   ```js
   npm install select2 --save-dev
   ```

   ```bash
      $(document).ready(function() {
       $('.select2').select2();
   });
   ```
Ajoutez le code dans `'resources/js/app.js'`: