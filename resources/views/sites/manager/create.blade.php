@extends('layouts.site-manager')

@section('title', 'Ajouter un Site - TOURISM237')

@section('content')
<div class="container-fluid py-4">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">
                        <i class="bi bi-plus-circle me-2"></i>Nouveau Site
                    </h2>
                    <p class="text-muted mb-0">Ajoutez un nouveau site touristique</p>
                </div>
                <div class="btn-group">
                    <a href="{{ route('sites.manager.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i>Mes Sites
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-geo-alt me-2 text-primary"></i>Informations du Site
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('sites.manager.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nom du Site *</label>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="region" class="form-label">Région *</label>
                                <select class="form-select @error('region') is-invalid @enderror" 
                                        id="region" 
                                        name="region" 
                                        required>
                                    <option value="">Sélectionner une région</option>
                                    @foreach($regions as $key => $value)
                                        <option value="{{ $key }}" {{ old('region') == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('region')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Localisation *</label>
                            <input type="text" 
                                   class="form-control @error('location') is-invalid @enderror" 
                                   id="location" 
                                   name="location" 
                                   value="{{ old('location') }}" 
                                   placeholder="Ex: Yaoundé, Cameroun"
                                   required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="number" 
                                       class="form-control @error('latitude') is-invalid @enderror" 
                                       id="latitude" 
                                       name="latitude" 
                                       value="{{ old('latitude') }}" 
                                       step="any"
                                       placeholder="Ex: 3.8480">
                                @error('latitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="number" 
                                       class="form-control @error('longitude') is-invalid @enderror" 
                                       id="longitude" 
                                       name="longitude" 
                                       value="{{ old('longitude') }}" 
                                       step="any"
                                       placeholder="Ex: 11.5021">
                                @error('longitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">Prix (FCFA)</label>
                                <input type="number" 
                                       class="form-control @error('price') is-invalid @enderror" 
                                       id="price" 
                                       name="price" 
                                       value="{{ old('price') }}" 
                                       min="0"
                                       step="0.01"
                                       placeholder="Ex: 15000">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Image Principale</label>
                                <input type="file" 
                                       class="form-control @error('image') is-invalid @enderror" 
                                       id="image" 
                                       name="image" 
                                       accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="gallery" class="form-label">Galerie d'Images</label>
                            <input type="file" 
                                   class="form-control @error('gallery.*') is-invalid @enderror" 
                                   id="gallery" 
                                   name="gallery[]" 
                                   accept="image/*"
                                   multiple>
                            <div class="form-text">Vous pouvez sélectionner plusieurs images</div>
                            @error('gallery.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contact_phone" class="form-label">Téléphone de Contact</label>
                                <input type="tel" 
                                       class="form-control @error('contact_phone') is-invalid @enderror" 
                                       id="contact_phone" 
                                       name="contact_phone" 
                                       value="{{ old('contact_phone') }}"
                                       placeholder="Ex: +237 6XX XX XX XX">
                                @error('contact_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="contact_email" class="form-label">Email de Contact</label>
                                <input type="email" 
                                       class="form-control @error('contact_email') is-invalid @enderror" 
                                       id="contact_email" 
                                       name="contact_email" 
                                       value="{{ old('contact_email') }}"
                                       placeholder="Ex: contact@site.com">
                                @error('contact_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="opening_hours" class="form-label">Horaires d'Ouverture</label>
                            <textarea class="form-control @error('opening_hours') is-invalid @enderror" 
                                      id="opening_hours" 
                                      name="opening_hours" 
                                      rows="2" 
                                      placeholder="Ex: Lundi - Vendredi: 8h00 - 18h00">{{ old('opening_hours') }}</textarea>
                            @error('opening_hours')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="access_info" class="form-label">Informations d'Accès</label>
                            <textarea class="form-control @error('access_info') is-invalid @enderror" 
                                      id="access_info" 
                                      name="access_info" 
                                      rows="2" 
                                      placeholder="Ex: Accessible en voiture, parking disponible">{{ old('access_info') }}</textarea>
                            @error('access_info')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Caractéristiques</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="features[]" 
                                               value="parking" 
                                               id="parking"
                                               {{ in_array('parking', old('features', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="parking">Parking</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="features[]" 
                                               value="restaurant" 
                                               id="restaurant"
                                               {{ in_array('restaurant', old('features', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="restaurant">Restaurant</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="features[]" 
                                               value="guide" 
                                               id="guide"
                                               {{ in_array('guide', old('features', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="guide">Guide</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="features[]" 
                                               value="wifi" 
                                               id="wifi"
                                               {{ in_array('wifi', old('features', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="wifi">WiFi</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="features[]" 
                                               value="toilettes" 
                                               id="toilettes"
                                               {{ in_array('toilettes', old('features', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="toilettes">Toilettes</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="features[]" 
                                               value="handicap" 
                                               id="handicap"
                                               {{ in_array('handicap', old('features', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="handicap">Accessible handicapés</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Créer le Site
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
