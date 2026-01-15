# Module Google reCAPTCHA pour PrestaShop 8+

![PrestaShop](https://img.shields.io/badge/PrestaShop-8.0+-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4+-purple.svg)
![License](https://img.shields.io/badge/License-MIT-green.svg)

Module PrestaShop pour intégrer Google reCAPTCHA et protéger vos formulaires contre le spam et les abus automatisés.

## 🚀 Fonctionnalités

- ✅ **Support complet de reCAPTCHA v2, v2 Invisible et v3**
- ✅ **Protection des formulaires** : Contact, Inscription client, Avis produit
- ✅ **Configuration intuitive** depuis le back-office PrestaShop
- ✅ **Personnalisation** : Thèmes (clair/sombre), Tailles (normal/compact)
- ✅ **Compatible PrestaShop 8.0+**
- ✅ **Responsive** : S'adapte à tous les écrans
- ✅ **Multilingue** : Français et Anglais inclus

## 📋 Prérequis

- PrestaShop 8.0 ou supérieur
- PHP 7.4 ou supérieur
- Clés API Google reCAPTCHA ([Obtenir ici](https://www.google.com/recaptcha/admin))

## 📦 Installation

### Méthode 1 : Installation via le Back-Office (Recommandé)

1. Téléchargez le module depuis ce dépôt
2. Compressez le dossier `psrecaptcha` en fichier ZIP
3. Dans votre back-office PrestaShop : **Modules** → **Module Manager**
4. Cliquez sur **Uploader un module**
5. Sélectionnez le fichier ZIP
6. Cliquez sur **Configurer**

### Méthode 2 : Installation manuelle via FTP

1. Téléchargez le dossier `psrecaptcha`
2. Uploadez-le dans `/modules/` de votre installation PrestaShop
3. Dans votre back-office : **Modules** → **Module Manager**
4. Recherchez "Google reCAPTCHA" et cliquez sur **Installer**

## ⚙️ Configuration

### 1. Obtenir les clés API Google

1. Visitez [Google reCAPTCHA Admin](https://www.google.com/recaptcha/admin)
2. Créez un nouveau site
3. Choisissez le type de reCAPTCHA (v2 ou v3 recommandé)
4. Ajoutez votre domaine
5. Copiez vos **Site Key** et **Secret Key**

### 2. Configurer le module

1. Dans PrestaShop : **Modules** → **Module Manager**
2. Recherchez "Google reCAPTCHA" → **Configurer**
3. Renseignez :
   - **Site Key** et **Secret Key**
   - Choisissez la **version** de reCAPTCHA
   - Sélectionnez les **formulaires à protéger**
4. Cliquez sur **Enregistrer**

## 📖 Documentation complète

Pour une documentation détaillée incluant :
- Instructions d'installation pas à pas
- Configuration avancée
- Dépannage
- Personnalisation

👉 Consultez le [README détaillé du module](psrecaptcha/README.md)

## 🛠️ Structure du module

```
psrecaptcha/
├── psrecaptcha.php          # Fichier principal
├── config.xml               # Configuration
├── views/
│   ├── css/
│   │   └── recaptcha.css   # Styles
│   ├── js/
│   │   └── recaptcha.js    # JavaScript
│   └── templates/
│       └── hook/
│           └── recaptcha.tpl # Template
└── README.md                # Documentation détaillée
```

## 🔒 Sécurité

- Validation côté serveur pour empêcher les contournements
- Clés stockées de manière sécurisée dans la base de données
- Support HTTPS obligatoire pour reCAPTCHA v3

## 📝 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 🤝 Contribution

Les contributions sont les bienvenues ! N'hésitez pas à ouvrir une issue ou une pull request.

## 📞 Support

Pour toute question ou problème :
- Consultez la [documentation détaillée](psrecaptcha/README.md)
- Vérifiez la section Dépannage
- Consultez la [documentation Google reCAPTCHA](https://developers.google.com/recaptcha)

## 📅 Changelog

### Version 1.0.2 (2026-01-15)
- 🐛 Correction : Ajout du fichier logo.png obligatoire pour PrestaShop
- ✅ Module maintenant installable directement via le back-office
- 📦 Fichier ZIP prêt à l'emploi

### Version 1.0.1 (2026-01-15)
- 🔧 Ajout du workflow GitHub Actions pour releases automatiques
- 📦 Packaging automatique du module en ZIP
- 📚 Documentation améliorée pour les releases

### Version 1.0.0 (2026-01-15)
- 🎉 Première version stable
- ✅ Support reCAPTCHA v2, v2 Invisible et v3
- ✅ Protection des formulaires de contact, inscription et avis
- ✅ Compatible PrestaShop 8.0+

---

**Développé avec ❤️ pour PrestaShop**
