# Module Google reCAPTCHA pour PrestaShop 8+

## Description

Ce module intègre Google reCAPTCHA dans votre boutique PrestaShop 8+ pour protéger vos formulaires contre le spam et les abus automatisés. Il supporte reCAPTCHA v2, v2 Invisible et v3.

## Fonctionnalités

- ✅ Support de reCAPTCHA v2 (Checkbox)
- ✅ Support de reCAPTCHA v2 (Invisible)
- ✅ Support de reCAPTCHA v3
- ✅ Protection du formulaire de contact
- ✅ Protection du formulaire d'inscription client
- ✅ Protection du formulaire d'avis produit
- ✅ Configuration facile depuis le back-office
- ✅ Thèmes clair et sombre (v2)
- ✅ Tailles normale et compacte (v2)
- ✅ Compatible PrestaShop 8.0+

## Prérequis

- PrestaShop 8.0 ou supérieur
- PHP 7.4 ou supérieur
- Clés API Google reCAPTCHA (Site Key et Secret Key)

## Installation

### Étape 1 : Télécharger le module

1. Téléchargez le dossier `psrecaptcha`
2. Compressez-le en fichier ZIP (si nécessaire)

### Étape 2 : Installer le module dans PrestaShop

#### Option A : Installation via le Back-Office

1. Connectez-vous à votre back-office PrestaShop
2. Allez dans **Modules** > **Module Manager**
3. Cliquez sur **Uploader un module**
4. Sélectionnez le fichier ZIP du module
5. Cliquez sur **Configurer** une fois installé

#### Option B : Installation manuelle

1. Connectez-vous à votre serveur via FTP/SFTP
2. Uploadez le dossier `psrecaptcha` dans le répertoire `/modules/` de votre installation PrestaShop
3. Allez dans **Modules** > **Module Manager** dans votre back-office
4. Recherchez "Google reCAPTCHA"
5. Cliquez sur **Installer**

### Étape 3 : Obtenir les clés API Google reCAPTCHA

1. Visitez [Google reCAPTCHA Admin Console](https://www.google.com/recaptcha/admin)
2. Connectez-vous avec votre compte Google
3. Cliquez sur **+** pour créer un nouveau site
4. Remplissez les informations :
   - **Label** : Nom de votre site (ex: "Ma Boutique PrestaShop")
   - **Type de reCAPTCHA** :
     - **reCAPTCHA v2** → "Case à cocher «Je ne suis pas un robot»" (Checkbox)
     - **reCAPTCHA v2** → "Badge reCAPTCHA invisible" (Invisible)
     - **reCAPTCHA v3** (recommandé pour une meilleure expérience utilisateur)
   - **Domaines** : Ajoutez votre(vos) nom(s) de domaine (ex: `example.com`, `www.example.com`)
   - Acceptez les conditions d'utilisation
5. Cliquez sur **Envoyer**
6. Copiez vos clés :
   - **Site Key** (Clé du site)
   - **Secret Key** (Clé secrète)

### Étape 4 : Configurer le module

1. Dans votre back-office PrestaShop, allez dans **Modules** > **Module Manager**
2. Recherchez "Google reCAPTCHA"
3. Cliquez sur **Configurer**
4. Remplissez les champs :
   - **Enable reCAPTCHA** : Activez le module
   - **Site Key** : Collez votre Site Key de Google
   - **Secret Key** : Collez votre Secret Key de Google
   - **reCAPTCHA Version** : Choisissez la version (v2, v2 Invisible, ou v3)
   - **Theme** : Choisissez le thème (Clair ou Sombre) - uniquement pour v2
   - **Size** : Choisissez la taille (Normal ou Compact) - uniquement pour v2
5. Sélectionnez les formulaires à protéger :
   - **Contact Form** : Protège le formulaire de contact
   - **Customer Registration Form** : Protège le formulaire d'inscription
   - **Product Review Form** : Protège le formulaire d'avis produit
6. Cliquez sur **Enregistrer**

## Configuration recommandée

### Pour la meilleure expérience utilisateur

- **Version** : reCAPTCHA v3
- **Avantages** :
  - Invisible pour l'utilisateur
  - Pas d'interaction requise
  - Score de confiance automatique
  - Meilleure conversion

### Pour une protection maximale

- **Version** : reCAPTCHA v2 (Checkbox)
- **Theme** : Light
- **Size** : Normal
- **Avantages** :
  - Validation explicite
  - Protection robuste
  - Détection visuelle des robots

## Utilisation

Une fois configuré, le module protégera automatiquement les formulaires sélectionnés. Les utilisateurs devront compléter le reCAPTCHA avant de soumettre les formulaires protégés.

### reCAPTCHA v3

- Le badge Google reCAPTCHA apparaîtra en bas à droite de la page
- Aucune interaction utilisateur requise
- La validation se fait automatiquement en arrière-plan
- Les soumissions avec un score faible seront rejetées

### reCAPTCHA v2

- Une case à cocher "Je ne suis pas un robot" apparaîtra dans le formulaire
- L'utilisateur doit cliquer sur la case pour valider
- Un défi visuel peut être présenté si nécessaire

### reCAPTCHA v2 Invisible

- Aucune case à cocher visible
- La validation se déclenche lors de la soumission du formulaire
- Un défi peut apparaître si nécessaire

## Hooks utilisés

Le module utilise les hooks PrestaShop suivants :

- `displayHeader` : Ajoute les scripts reCAPTCHA dans l'en-tête
- `displayContactForm` : Affiche reCAPTCHA sur le formulaire de contact
- `displayCustomerAccountForm` : Affiche reCAPTCHA sur le formulaire d'inscription
- `actionContactFormSubmitBefore` : Vérifie reCAPTCHA avant soumission du formulaire de contact
- `actionCustomerAccountAdd` : Vérifie reCAPTCHA lors de l'inscription client

## Dépannage

### Le reCAPTCHA n'apparaît pas

1. Vérifiez que le module est activé dans la configuration
2. Vérifiez que les clés API sont correctement saisies
3. Vérifiez que le formulaire est sélectionné pour être protégé
4. Videz le cache PrestaShop : **Paramètres avancés** > **Performances** > **Vider le cache**
5. Vérifiez la console JavaScript du navigateur pour les erreurs

### Erreur "Invalid site key"

- Vérifiez que votre Site Key est correcte
- Vérifiez que votre domaine est bien ajouté dans la configuration Google reCAPTCHA
- Assurez-vous d'utiliser la bonne version de reCAPTCHA (v2 ou v3)

### Erreur "Invalid secret key"

- Vérifiez que votre Secret Key est correcte
- Assurez-vous de ne pas avoir confondu Site Key et Secret Key

### Le formulaire ne se soumet pas

1. Vérifiez que vous avez complété le reCAPTCHA
2. Vérifiez la console JavaScript pour les erreurs
3. Vérifiez que votre version PHP supporte les requêtes HTTP externes
4. Pour v3, vérifiez que le score minimum n'est pas trop élevé

## Structure du module

```
psrecaptcha/
├── config.xml                          # Configuration du module
├── index.php                           # Protection du répertoire
├── psrecaptcha.php                     # Fichier principal du module
├── README.md                           # Ce fichier
├── config/
│   └── index.php
├── translations/
│   └── index.php
├── views/
│   ├── css/
│   │   ├── recaptcha.css              # Styles CSS
│   │   └── index.php
│   ├── js/
│   │   ├── recaptcha.js               # JavaScript frontend
│   │   └── index.php
│   └── templates/
│       ├── admin/
│       │   └── index.php
│       └── hook/
│           ├── recaptcha.tpl          # Template du widget reCAPTCHA
│           └── index.php
```

## Sécurité

- Les clés secrètes sont stockées de manière sécurisée dans la base de données PrestaShop
- La validation se fait côté serveur pour empêcher le contournement
- Support HTTPS obligatoire pour reCAPTCHA v3

## Personnalisation

### Modifier le score minimum pour reCAPTCHA v3

Dans le fichier `psrecaptcha.php`, méthode `verifyRecaptcha()`, ligne ~440 :

```php
$minScore = 0.5; // Valeur par défaut
```

- **0.0** : Très permissif (plus de spam possible)
- **0.5** : Équilibré (recommandé)
- **1.0** : Très strict (peut bloquer des utilisateurs légitimes)

### Ajouter reCAPTCHA à d'autres formulaires

1. Enregistrez un nouveau hook dans la méthode `install()`
2. Créez une méthode hook correspondante
3. Appelez `displayRecaptcha()` dans votre hook
4. Ajoutez la vérification dans le hook de soumission

## Support

Pour toute question ou problème :

1. Vérifiez la section **Dépannage** ci-dessus
2. Consultez la [documentation Google reCAPTCHA](https://developers.google.com/recaptcha)
3. Vérifiez les logs d'erreur PrestaShop

## Licence

Ce module est distribué sous licence MIT.

## Auteur

Développé pour PrestaShop 8+

## Changelog

### Version 1.0.0 (2026-01-15)

- Première version
- Support reCAPTCHA v2, v2 Invisible et v3
- Protection des formulaires de contact, inscription et avis
- Configuration complète depuis le back-office
- Compatible PrestaShop 8.0+

## Contributions

Les contributions sont les bienvenues ! N'hésitez pas à proposer des améliorations.

---

**Note** : Ce module nécessite une connexion internet active pour fonctionner, car il communique avec les serveurs Google reCAPTCHA.
