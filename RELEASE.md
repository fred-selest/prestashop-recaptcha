# Guide de Release

## Création automatique de release

Ce dépôt utilise GitHub Actions pour créer automatiquement des releases avec le module PrestaShop packagé.

### Comment créer une nouvelle release

1. **Créer un tag** :
   ```bash
   git tag -a v1.0.1 -m "Release v1.0.1"
   git push origin v1.0.1
   ```

2. **GitHub Actions se déclenche automatiquement** et :
   - Crée le fichier ZIP du module `psrecaptcha`
   - Crée une release GitHub
   - Attache le ZIP à la release

3. **Télécharger le module** :
   - Allez sur la page [Releases](https://github.com/fred-selest/prestashop-recaptcha/releases)
   - Téléchargez `psrecaptcha-v1.0.1.zip`
   - Installez directement dans PrestaShop

## Création manuelle de release (sans GitHub Actions)

Si vous préférez créer la release manuellement :

### 1. Créer le ZIP du module

```bash
cd /chemin/vers/prestashop-recaptcha
zip -r psrecaptcha-v1.0.0.zip psrecaptcha/ -x "*.DS_Store" "*.git*"
```

### 2. Créer un tag Git

```bash
git tag -a v1.0.0 -m "Release v1.0.0"
git push origin v1.0.0
```

### 3. Créer la release sur GitHub

1. Allez sur https://github.com/fred-selest/prestashop-recaptcha/releases/new
2. Sélectionnez le tag `v1.0.0`
3. Titre : `PrestaShop reCAPTCHA Module v1.0.0`
4. Description :
   ```markdown
   # Module Google reCAPTCHA pour PrestaShop 8+

   ## Installation
   1. Téléchargez le fichier `psrecaptcha-v1.0.0.zip`
   2. Dans PrestaShop : **Modules** → **Module Manager** → **Uploader un module**
   3. Sélectionnez le fichier ZIP
   4. Configurez vos clés API

   ## Fonctionnalités
   - Support reCAPTCHA v2, v2 Invisible et v3
   - Protection des formulaires
   - Compatible PrestaShop 8.0+
   ```
5. **Attachez le fichier** `psrecaptcha-v1.0.0.zip`
6. Cliquez sur **Publish release**

## Format de version

Suivez le [Semantic Versioning](https://semver.org/) :
- **v1.0.0** : Version majeure (changements incompatibles)
- **v1.1.0** : Version mineure (nouvelles fonctionnalités)
- **v1.0.1** : Version patch (corrections de bugs)

## Checklist avant release

- [ ] Tester le module sur PrestaShop 8.x
- [ ] Mettre à jour le numéro de version dans `psrecaptcha/psrecaptcha.php`
- [ ] Mettre à jour le numéro de version dans `psrecaptcha/config.xml`
- [ ] Mettre à jour le CHANGELOG dans les README
- [ ] Créer le tag Git
- [ ] Pousser le tag (déclenche GitHub Actions)
- [ ] Vérifier que la release est créée correctement
- [ ] Tester le téléchargement et l'installation du ZIP

## Structure du ZIP

Le fichier ZIP doit contenir :
```
psrecaptcha/
├── psrecaptcha.php
├── config.xml
├── README.md
├── index.php
├── config/
├── translations/
└── views/
    ├── css/
    ├── js/
    └── templates/
```

⚠️ **Important** : Le ZIP doit contenir le dossier `psrecaptcha/` à la racine pour que PrestaShop puisse l'extraire correctement dans `/modules/`.
