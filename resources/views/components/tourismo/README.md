# Composants Tourismo Kim

Cette collection de composants Blade a été créée pour l'application de gestion de sites touristiques Tourismo Kim.

## Structure des Composants

### Composants de Layout
- `navigation.blade.php` - Barre de navigation principale avec menu mobile
- `footer.blade.php` - Pied de page avec liens et informations de contact
- `section.blade.php` - Composant de section réutilisable avec titre et sous-titre

### Composants de Contenu
- `hero.blade.php` - Section hero avec titre principal et boutons d'action
- `services.blade.php` - Section des services avec grille de cartes
- `statistics.blade.php` - Section des statistiques avec métriques
- `testimonials.blade.php` - Section des témoignages clients
- `benefits.blade.php` - Section des avantages avec cartes de fonctionnalités
- `pricing.blade.php` - Section des tarifs avec plans de pricing
- `contact.blade.php` - Section de contact avec formulaire et informations

### Composants Réutilisables
- `service-card.blade.php` - Carte de service avec icône, titre, description et fonctionnalités
- `stat-card.blade.php` - Carte de statistique avec valeur, label et icône optionnelle
- `testimonial-card.blade.php` - Carte de témoignage avec étoiles, contenu et auteur
- `feature-card.blade.php` - Carte de fonctionnalité avec icône, titre, description et avantages
- `button.blade.php` - Bouton réutilisable avec variantes (primary, secondary, outline)
- `contact-info.blade.php` - Information de contact avec icône, titre et valeur
- `contact-form.blade.php` - Formulaire de contact complet

### Composants Utilitaires
- `mobile-menu.blade.php` - Menu mobile avec Alpine.js
- `modal.blade.php` - Modal réutilisable
- `toast.blade.php` - Notification toast
- `loading.blade.php` - Écran de chargement
- `smooth-scroll.blade.php` - Script de scroll fluide

## Utilisation

### Exemple d'utilisation d'un composant de service
```blade
<x-tourismo.service-card 
    icon="🎫"
    title="Gestion des Réservations"
    description="Système de réservation en ligne..."
    :features="['Réservations en temps réel', 'Paiements en ligne']"
    gradient="from-blue-50 to-indigo-50"
/>
```

### Exemple d'utilisation d'un bouton
```blade
<x-tourismo.button href="#contact" variant="primary" size="lg">
    Nous contacter
</x-tourismo.button>
```

### Exemple d'utilisation d'une section
```blade
<x-tourismo.section id="services" title="Nos Services" subtitle="Des solutions complètes...">
    <!-- Contenu de la section -->
</x-tourismo.section>
```

## Personnalisation

Tous les composants utilisent Tailwind CSS et supportent le mode sombre. Les couleurs et styles peuvent être personnalisés via les classes CSS ou les props des composants.

## Dépendances

- Laravel Blade
- Tailwind CSS
- Alpine.js (pour l'interactivité)
- Vite (pour la compilation des assets)
