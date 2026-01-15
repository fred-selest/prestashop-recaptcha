# Instructions pour créer la Release v1.0.1

## ⚠️ Le push du tag a échoué (erreur 403)

Le tag `v1.0.1` a été créé localement mais ne peut pas être poussé automatiquement vers GitHub en raison de restrictions de permission.

## 📦 Fichier prêt pour la release

Le fichier **`psrecaptcha-v1.0.1.zip`** a été créé et est prêt à être uploadé sur GitHub.

Localisation : `/home/user/prestashop-recaptcha/psrecaptcha-v1.0.1.zip` (15 Ko)

## 🚀 Méthode 1 : Créer la release manuellement sur GitHub (Recommandé)

### Étapes :

1. **Allez sur GitHub**
   - URL : https://github.com/fred-selest/prestashop-recaptcha/releases/new

2. **Créer le tag**
   - Cliquez sur "Choose a tag"
   - Tapez : `v1.0.1`
   - Cliquez sur "Create new tag: v1.0.1 on publish"
   - Target : `claude/prestashop-recaptcha-module-COP9Y`

3. **Remplir les informations de la release**
   - **Release title** : `PrestaShop reCAPTCHA Module v1.0.1`

   - **Description** :
   ```markdown
   # Module Google reCAPTCHA pour PrestaShop 8+

   ## 🎉 Version 1.0.1

   Cette version améliore le processus de release avec des outils automatiques.

   ## ✨ Nouveautés

   - 🔧 Workflow GitHub Actions pour releases automatiques
   - 📦 Packaging automatique du module en ZIP
   - 📚 Documentation améliorée pour les releases
   - ✅ Module toujours compatible PrestaShop 8.0+

   ## 📦 Installation

   1. **Téléchargez** le fichier `psrecaptcha-v1.0.1.zip` ci-dessous
   2. Dans PrestaShop : **Modules** → **Module Manager** → **Uploader un module**
   3. Sélectionnez le fichier ZIP téléchargé
   4. Cliquez sur **Configurer**
   5. Ajoutez vos clés API Google reCAPTCHA

   ## 🔑 Obtenir les clés API

   Visitez [Google reCAPTCHA Admin](https://www.google.com/recaptcha/admin) pour obtenir vos clés gratuitement.

   ## 📚 Documentation complète

   Consultez le [README détaillé](https://github.com/fred-selest/prestashop-recaptcha/blob/claude/prestashop-recaptcha-module-COP9Y/psrecaptcha/README.md) pour :
   - Guide d'installation pas à pas
   - Configuration des clés API
   - Dépannage
   - Personnalisation

   ## 🔧 Fonctionnalités

   - ✅ Support reCAPTCHA v2, v2 Invisible et v3
   - ✅ Protection des formulaires de contact, inscription et avis produit
   - ✅ Configuration intuitive depuis le back-office
   - ✅ Thèmes personnalisables (clair/sombre)
   - ✅ Design responsive
   - ✅ Validation côté serveur sécurisée

   ## 📋 Prérequis

   - PrestaShop 8.0+
   - PHP 7.4+
   - Clés API Google reCAPTCHA

   ---

   **Développé avec ❤️ pour PrestaShop**
   ```

4. **Attacher le fichier ZIP**
   - Faites glisser le fichier `psrecaptcha-v1.0.1.zip` dans la zone "Attach binaries"
   - Ou cliquez et sélectionnez le fichier

5. **Publier**
   - Cochez "Set as the latest release"
   - Cliquez sur **Publish release**

## 🚀 Méthode 2 : Push du tag depuis une autre machine

Si vous avez accès à une autre machine ou un autre environnement Git :

```bash
# Cloner le dépôt
git clone https://github.com/fred-selest/prestashop-recaptcha.git
cd prestashop-recaptcha

# Récupérer la branche
git fetch origin claude/prestashop-recaptcha-module-COP9Y
git checkout claude/prestashop-recaptcha-module-COP9Y

# Créer et pousser le tag
git tag -a v1.0.1 -m "Release v1.0.1"
git push origin v1.0.1
```

Le workflow GitHub Actions se déclenchera automatiquement et créera la release.

## ✅ Vérification après création

Une fois la release créée, vérifiez :
- [ ] Le tag `v1.0.1` existe sur GitHub
- [ ] La release apparaît dans l'onglet Releases
- [ ] Le fichier `psrecaptcha-v1.0.1.zip` est attaché
- [ ] Le ZIP peut être téléchargé
- [ ] La description est correcte

## 📝 Notes

- Le tag `v1.0.1` est créé localement mais ne peut pas être poussé pour des raisons de permission
- Le fichier ZIP est prêt et contient la version 1.0.1 du module
- Toutes les versions sont à jour dans les fichiers du module
- Le workflow automatique fonctionnera pour les prochaines releases une fois que le problème de permission sera résolu

## 🔮 Pour les prochaines releases

Une fois le problème de permission résolu, les futures releases se feront automatiquement :

```bash
git tag -a v1.0.2 -m "Release v1.0.2"
git push origin v1.0.2
# GitHub Actions fait le reste automatiquement !
```
