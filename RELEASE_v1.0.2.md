# 🚀 Instructions pour créer la Release v1.0.2

## ✅ Fichier prêt pour la release

Le fichier **`psrecaptcha-v1.0.2.zip`** (16 Ko) a été créé et est prêt à être uploadé sur GitHub.

**Localisation** : `/home/user/prestashop-recaptcha/psrecaptcha-v1.0.2.zip`

### ✨ Contenu du ZIP :
- ✅ Module complet avec logo.png
- ✅ Version 1.0.2
- ✅ Prêt pour installation directe sur PrestaShop
- ✅ Tous les fichiers requis inclus

---

## 📝 Créer la release sur GitHub

### Étapes :

1. **Allez sur GitHub**
   - URL : https://github.com/fred-selest/prestashop-recaptcha/releases/new

2. **Créer le tag**
   - Cliquez sur "Choose a tag"
   - Tapez : `v1.0.2`
   - Cliquez sur "Create new tag: v1.0.2 on publish"
   - Target : Sélectionnez `claude/prestashop-recaptcha-module-COP9Y`

3. **Titre de la release**
   ```
   Module Google reCAPTCHA v1.0.2 - Prêt pour PrestaShop
   ```

4. **Description de la release** (copiez-collez ceci) :

```markdown
# 🎉 Module Google reCAPTCHA pour PrestaShop 8+ - v1.0.2

## 🐛 Corrections importantes

Cette version corrige un problème critique d'installation :
- ✅ **Ajout du fichier `logo.png` obligatoire** pour PrestaShop
- ✅ **Module maintenant installable** directement via le back-office
- ✅ **Fichier ZIP prêt à l'emploi** sans erreur d'upload

## 📦 Installation

### Téléchargement et installation

1. **Téléchargez** le fichier `psrecaptcha-v1.0.2.zip` ci-dessous
2. Dans votre **PrestaShop** :
   - Allez dans **Modules** → **Module Manager**
   - Cliquez sur **Uploader un module**
3. Sélectionnez le fichier ZIP téléchargé
4. Cliquez sur **Configurer**
5. Ajoutez vos clés API Google reCAPTCHA

### Obtenir les clés API

1. Visitez [Google reCAPTCHA Admin Console](https://www.google.com/recaptcha/admin)
2. Créez un nouveau site
3. Choisissez le type de reCAPTCHA (v2 ou v3 recommandé)
4. Ajoutez votre domaine
5. Copiez vos **Site Key** et **Secret Key**

## ✨ Fonctionnalités

- ✅ **Support reCAPTCHA v2** (Checkbox)
- ✅ **Support reCAPTCHA v2 Invisible**
- ✅ **Support reCAPTCHA v3** (recommandé)
- ✅ **Protection des formulaires** :
  - Formulaire de contact
  - Formulaire d'inscription client
  - Formulaire d'avis produit
- ✅ **Configuration intuitive** depuis le back-office
- ✅ **Thèmes personnalisables** (clair/sombre)
- ✅ **Design responsive** pour mobile et desktop
- ✅ **Validation côté serveur** sécurisée

## 📋 Prérequis

- PrestaShop 8.0 ou supérieur
- PHP 7.4 ou supérieur
- Clés API Google reCAPTCHA (gratuites)

## 📚 Documentation

Consultez la [documentation complète](https://github.com/fred-selest/prestashop-recaptcha/blob/claude/prestashop-recaptcha-module-COP9Y/psrecaptcha/README.md) pour :
- Guide d'installation détaillé
- Configuration des clés API
- Dépannage
- Personnalisation avancée

## 🔄 Mise à jour depuis v1.0.0 ou v1.0.1

Si vous avez installé une version précédente qui ne fonctionnait pas :
1. Désinstallez l'ancienne version
2. Installez cette version v1.0.2
3. Reconfigurez vos clés API

## 📝 Changelog

### v1.0.2 (2026-01-15)
- 🐛 **Correction** : Ajout du fichier logo.png obligatoire pour PrestaShop
- ✅ Module maintenant installable directement via le back-office
- 📦 Fichier ZIP prêt à l'emploi

### v1.0.1 (2026-01-15)
- 🔧 Ajout du workflow GitHub Actions pour releases automatiques
- 📦 Packaging automatique du module en ZIP
- 📚 Documentation améliorée pour les releases

### v1.0.0 (2026-01-15)
- 🎉 Première version stable
- ✅ Support reCAPTCHA v2, v2 Invisible et v3
- ✅ Protection des formulaires de contact, inscription et avis
- ✅ Compatible PrestaShop 8.0+

---

## 🆘 Support

Pour toute question ou problème :
- Consultez la [documentation](https://github.com/fred-selest/prestashop-recaptcha/blob/claude/prestashop-recaptcha-module-COP9Y/psrecaptcha/README.md)
- Ouvrez une [issue sur GitHub](https://github.com/fred-selest/prestashop-recaptcha/issues)
- Consultez la [documentation Google reCAPTCHA](https://developers.google.com/recaptcha)

---

**Développé avec ❤️ pour PrestaShop**
```

5. **Attacher le fichier ZIP**
   - Faites glisser le fichier `psrecaptcha-v1.0.2.zip` dans la zone "Attach binaries by dropping them here or selecting them"
   - Ou cliquez sur cette zone et sélectionnez le fichier

6. **Options de publication**
   - ✅ Cochez **"Set as the latest release"**
   - ✅ Laissez décoché "Set as a pre-release" (c'est une version stable)

7. **Publier**
   - Cliquez sur le bouton vert **"Publish release"**

---

## ✅ Vérification après publication

Une fois la release créée, vérifiez :
- [ ] Le tag `v1.0.2` apparaît sur GitHub
- [ ] La release est visible dans l'onglet "Releases"
- [ ] Le fichier `psrecaptcha-v1.0.2.zip` est attaché et téléchargeable
- [ ] Le badge "Latest" apparaît sur la release
- [ ] La description s'affiche correctement

---

## 🎯 Test d'installation

Après avoir créé la release, testez l'installation :

1. Téléchargez le ZIP depuis la release GitHub
2. Uploadez-le dans PrestaShop
3. Vérifiez que l'installation réussit
4. Configurez avec vos clés API de test
5. Testez sur un formulaire de contact

---

## 📊 Informations du fichier

- **Nom** : `psrecaptcha-v1.0.2.zip`
- **Taille** : 16 Ko
- **Fichiers** : 24 fichiers inclus
- **Version module** : 1.0.2
- **Compatible** : PrestaShop 8.0+

---

## 🔮 Pour les prochaines releases

Pour les futures versions, une fois le problème de permission résolu, les releases se feront automatiquement avec GitHub Actions :

```bash
git tag -a v1.0.3 -m "Release v1.0.3"
git push origin v1.0.3
# GitHub Actions créera automatiquement la release avec le ZIP
```

---

**Note** : Le commit a été poussé vers la branche `claude/prestashop-recaptcha-module-COP9Y`. Seul le tag nécessite une création manuelle sur GitHub en raison des permissions.
