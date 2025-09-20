@extends('layouts.app')

@section('title', 'Mon Profil - TOURISM237')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="images/default-avatar.jpg" 
                         class="rounded-circle mb-3" 
                         width="100" 
                         height="100" 
                         alt="Avatar">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="text-muted">Membre depuis {{ $user->created_at->format('F Y') }}</p>
                    <x-auth.account-badge :type="$user->account_type" size="md" />
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Modifier le profil
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation du profil -->
            <div class="card mt-3">
                <div class="list-group list-group-flush">
                    <a href="#profile" class="list-group-item list-group-item-action active">
                        <i class="bi bi-person me-2"></i>Informations personnelles
                    </a>
                    <a href="#bookings" class="list-group-item list-group-item-action">
                        <i class="bi bi-calendar-check me-2"></i>Mes réservations
                    </a>
                    <a href="#favorites" class="list-group-item list-group-item-action">
                        <i class="bi bi-heart me-2"></i>Favoris
                    </a>
                    <a href="#settings" class="list-group-item list-group-item-action">
                        <i class="bi bi-gear me-2"></i>Paramètres
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="list-group-item list-group-item-action text-danger border-0 bg-transparent w-100 text-start">
                            <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="col-md-9">
            <!-- Informations personnelles -->
            <div id="profile" class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-person me-2"></i>Informations personnelles
                    </h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nom complet</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="account_type" class="form-label">Type de compte</label>
                                <input type="text" class="form-control" id="account_type" value="{{ ucfirst(str_replace('_', ' ', $user->account_type)) }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="phone" value="{{ $user->phone ?? 'Non renseigné' }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">Localisation</label>
                                <input type="text" class="form-control" id="location" value="{{ $user->location ?? 'Non renseigné' }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="created_at" class="form-label">Membre depuis</label>
                                <input type="text" class="form-control" id="created_at" value="{{ $user->created_at->format('d/m/Y') }}" readonly>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check me-1"></i>Enregistrer les modifications
                        </button>
                    </form>
                </div>
            </div>

            <!-- Mes réservations -->
            <div id="bookings" class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-calendar-check me-2"></i>Mes réservations
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Réservation</th>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="images/reunification.jpg" 
                                                 class="rounded me-3" 
                                                 width="50" 
                                                 height="50" 
                                                 style="object-fit: cover;" 
                                                 alt="Monument de la Réunification">
                                            <div>
                                                <h6 class="mb-0">Tour de Yaoundé</h6>
                                                <small class="text-muted">Monument de la Réunification</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>15 Jan 2024</td>
                                    <td>150,000 FCFA</td>
                                    <td><span class="badge bg-success">Confirmé</span></td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="images/hotel-yaounde.jpg" 
                                                 class="rounded me-3" 
                                                 width="50" 
                                                 height="50" 
                                                 style="object-fit: cover;" 
                                                 alt="Hôtel Mont Fébé">
                                            <div>
                                                <h6 class="mb-0">Hôtel Mont Fébé</h6>
                                                <small class="text-muted">2 nuits</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>20 Jan 2024</td>
                                    <td>90,000 FCFA</td>
                                    <td><span class="badge bg-warning">En attente</span></td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Favoris -->
            <div id="favorites" class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-heart me-2"></i>Mes favoris
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <img src="images/mont-cameroun.jpg" 
                                     class="card-img-top" 
                                     height="150" 
                                     style="object-fit: cover;" 
                                     alt="Mont Cameroun">
                                <div class="card-body">
                                    <h6 class="card-title">Mont Cameroun</h6>
                                    <p class="card-text small text-muted">Buea, Sud-Ouest</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-primary fw-bold">15,000 FCFA</span>
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-heart-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <img src="images/plage3.jpg" 
                                     class="card-img-top" 
                                     height="150" 
                                     style="object-fit: cover;" 
                                     alt="Plages de Kribi">
                                <div class="card-body">
                                    <h6 class="card-title">Plages de Kribi</h6>
                                    <p class="card-text small text-muted">Kribi, Sud</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-primary fw-bold">Gratuit</span>
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-heart-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
