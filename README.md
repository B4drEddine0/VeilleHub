# VeilleHub - Système de Gestion de Veille Pédagogique

## Contexte
Le **Système de Gestion de Veille Pédagogique (VeilleHub)** vise à optimiser le rituel quotidien éducatif où les étudiants présentent des sujets techniques à leurs pairs. Cette plateforme permet de gérer les sujets de présentation, planifier les sessions et suivre la participation des étudiants, offrant ainsi un outil de gestion complet pour les enseignants et les étudiants.

---

## Fonctionnalités

### 1. Front Office
- **Calendrier des présentations à venir** : Accès public pour consulter les présentations planifiées.
- **Inscription avec choix de rôle** : Les utilisateurs peuvent s'inscrire en tant qu'étudiants ou enseignants.
- **Récupération de mot de passe** : Un système sécurisé de récupération de mot de passe est intégré.
- **Suggestions de nouveaux sujets** : Les utilisateurs peuvent proposer de nouveaux sujets à présenter.
- **Tableau de bord personnalisé** :
  - Suivi des présentations à venir et passées.
  - État des suggestions de sujets.
  - Accès au calendrier complet des présentations.
  - Notifications par email.
  - Statistiques et classement.

### 2. Back Office
- **Gestion des sujets suggérés** : Validation, rejet, et attribution des sujets aux étudiants (minimum 2 étudiants par sujet).
- **Gestion des utilisateurs** : Validation des inscriptions, suppression des comptes et gestion des rôles.
- **Gestion des présentations** : Planification et gestion du calendrier des présentations.
- **Statistiques globales** : Suivi des présentations effectuées, des étudiants les plus actifs, et du taux de participation des étudiants.

### 3. Fonctionnalités Transversales
- **Système d'authentification et d'autorisation** : Contrôle d'accès basé sur les rôles.
- **Notifications par email** : Envoi automatique de notifications sur les actions pertinentes.
- **Calendrier et planification** : Système de gestion des événements liés aux présentations.
- **Génération de statistiques** : Visualisation des performances des étudiants et de l'état des présentations.

---

## Exigences Techniques

### Architecture MVC
Le système suit rigoureusement l'architecture **MVC** (Model-View-Controller) :
- **Models** : Gestion des données et logique métier.
- **Views** : Interface utilisateur pour une expérience fluide.
- **Controllers** : Traitement des requêtes et coordination des actions.

Le code est structuré de la manière suivante :

```
project/
├── app/
│   ├── models/
│   │   ├── User.php
│   │   ├── Subject.php
│   │   ├── Presentation.php
│   │   └── BaseModel.php
│   ├── views/
│   │   ├── auth/
│   │   │   ├── login.php
│   │   │   ├── register.php
│   │   │   └── reset-password.php
│   │   ├── subjects/
│   │   │   ├── list.php
│   │   │   ├── suggest.php
│   │   │   └── manage.php
│   │   ├── presentations/
│   │   │   ├── calendar.php
│   │   │   └── dashboard.php
│   │   ├── admin/
│   │   │   ├── users.php
│   │   │   └── statistics.php
│   │   └── templates/
│   │       ├── header.php
│   │       └── footer.php
│   ├── controllers/
│   │   ├── AuthController.php
│   │   ├── SubjectController.php
│   │   ├── PresentationController.php
│   │   └── AdminController.php
│   └── core/
│       ├── Database.php
│       ├── Router.php
│       ├── Session.php
│       └── Mailer.php
├── public/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── main.js
│   └── index.php
└── config/
    ├── config.php
    └── routes.php
```

### Sécurité
- **Validation des Entrées** : Vérification côté serveur avec PHP pour prévenir les attaques XSS et injections SQL.
- **Authentification et Gestion des Sessions** : Mots de passe hachés avec `password_hash()` et gestion des sessions sécurisée.
- **Contrôle d'accès** : Basé sur les rôles utilisateurs (étudiant, enseignant, admin).
- **Sécurité de la Base de Données** : Utilisation de requêtes préparées et assainissement des entrées pour éviter les attaques SQL.

---

## Interface Utilisateur
- **Responsive Design** : L'interface est conçue pour s'adapter à différents appareils (PC, tablettes, smartphones).
- **Navigation claire** : L'interface facilite une navigation intuitive entre les différentes sections de la plateforme.
- **Accessibilité** : Les éléments de design sont pensés pour être accessibles à un large public.

---

## Fonctionnalités Bonus
- **Système de Vote** : Permet aux étudiants de voter pour leurs sujets préférés.
- **Évaluations et Commentaires** : Les utilisateurs peuvent noter les présentations et laisser des commentaires.
- **Historique des Présentations** : Accès aux ressources et liens des présentations passées.
- **Gestion Multi-Classes** : Support pour plusieurs classes, avec des tableaux de bord distincts et la possibilité d'attribuer des enseignants à chaque classe.

---

## Installation

1. **Clonez le dépôt** :
   ```bash
   git clone https://github.com/B4drEddine0/VeilleHub.git
   ```
2. **Configuration de la base de données** :
   - Créez une base de données et configurez le fichier `config/config.php` avec vos informations de connexion.
3. **Installation des dépendances** (si nécessaire) :
   - Installez les dépendances avec Composer ou autres gestionnaires de dépendances.
4. **Lancer l'application** :
   - Accédez à `public/index.php` via votre serveur local ou en ligne.

---

## Livrables
- Dépôt GitHub avec le code source complet.
- Diagrammes UML : Diagramme de classes, Diagramme de cas d'utilisation.
  
---

## Critères de performance
- **Qualité du Code** : Implémentation correcte de l'architecture MVC, respect des principes de la programmation orientée objet (OOP).
- **Fonctionnalité** : Complétude des fonctionnalités avec gestion des erreurs et performance optimale.
- **Expérience Utilisateur** : Interface fluide et intuitive.

---

## Contributions
Si vous souhaitez contribuer à ce projet, n'hésitez pas à ouvrir des **issues** ou des **pull requests**. Toute amélioration ou suggestion est la bienvenue.

---

**Auteur :** B4drEddine0

**Licence :** MIT
