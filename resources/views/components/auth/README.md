# Composants d'Authentification TOURISM237

Ce dossier contient tous les composants et pages liés à l'authentification des utilisateurs.

## 📁 Structure des fichiers

### Pages d'authentification
- `login.blade.php` - Page de connexion
- `register.blade.php` - Page d'inscription
- `forgot-password.blade.php` - Page de mot de passe oublié
- `reset-password.blade.php` - Page de réinitialisation du mot de passe

### Composants réutilisables
- `auth-form.blade.php` - Layout commun pour les pages d'auth
- `social-button.blade.php` - Boutons de connexion sociale
- `password-field.blade.php` - Champ de mot de passe avec indicateur de force

## 🎨 Design et fonctionnalités

### Caractéristiques communes
- **Layout en deux colonnes** : Image à gauche, formulaire à droite
- **Design responsive** : Adaptation mobile et desktop
- **Validation en temps réel** : Feedback immédiat sur les erreurs
- **Indicateurs visuels** : Icônes Bootstrap et couleurs cohérentes

### Pages de connexion
- Formulaire de connexion avec email/mot de passe
- Option "Se souvenir de moi"
- Lien vers mot de passe oublié
- Boutons de connexion sociale (Google, Facebook)
- Lien vers l'inscription

### Pages d'inscription
- Formulaire complet avec nom, email, téléphone
- Sélection du type de compte (Touriste/Professionnel)
- Indicateur de force du mot de passe
- Acceptation des conditions d'utilisation
- Option newsletter

### Pages de mot de passe
- Demande de réinitialisation par email
- Création de nouveau mot de passe sécurisé
- Indicateur de force du mot de passe en temps réel
- Conseils de sécurité

## 🔧 Utilisation

### Routes disponibles
```php
Route::get('/connexion', function () {
    return view('auth.login');
})->name('login');

Route::get('/inscription', function () {
    return view('auth.register');
})->name('register');

Route::get('/mot-de-passe-oublie', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::get('/nouveau-mot-de-passe', function () {
    return view('auth.reset-password');
})->name('password.reset');
```

### Composants réutilisables

#### AuthForm
```blade
<x-auth.auth-form type="login" title="Connexion" subtitle="Accédez à votre compte">
    <!-- Contenu du formulaire -->
</x-auth.auth-form>
```

#### SocialButton
```blade
<x-auth.social-button provider="google" />
<x-auth.social-button provider="facebook" />
```

#### PasswordField
```blade
<x-auth.password-field 
    name="password" 
    label="Mot de passe" 
    :show-strength="true" 
/>
```

## 🎯 Fonctionnalités avancées

### Indicateur de force du mot de passe
- Analyse en temps réel de la force du mot de passe
- Barre de progression colorée
- Conseils de sécurité intégrés

### Validation côté client
- Vérification de la force du mot de passe
- Confirmation de mot de passe
- Validation des formats email/téléphone

### Design responsive
- Adaptation automatique sur mobile
- Images de fond optimisées
- Navigation intuitive

## 🔒 Sécurité

- Validation côté serveur requise
- Protection CSRF avec tokens
- Champs de mot de passe sécurisés
- Validation des formats d'entrée

## 📱 Responsive Design

- **Desktop** : Layout en deux colonnes avec image
- **Tablet** : Adaptation de la largeur des colonnes
- **Mobile** : Stack vertical avec image en haut

## 🎨 Personnalisation

Les composants utilisent les variables CSS de TOURISM237 :
- `--primary-color: #FF7D1A`
- `--secondary-color: #2FAB73`
- `--dark-color: #1A1A2E`
- `--light-color: #F8F9FA`

## 📝 Notes de développement

- Tous les formulaires incluent la validation Laravel
- Les composants sont modulaires et réutilisables
- Le design suit les guidelines de TOURISM237
- Compatible avec Bootstrap 5.3.7
