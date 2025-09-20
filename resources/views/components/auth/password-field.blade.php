@props(['name' => 'password', 'label' => 'Mot de passe', 'placeholder' => 'Votre mot de passe', 'required' => true, 'showStrength' => false])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">
        <i class="bi bi-lock me-2"></i>{{ $label }}
    </label>
    <div class="input-group">
        <input type="password" 
               class="form-control @error($name) is-invalid @enderror" 
               id="{{ $name }}" 
               name="{{ $name }}" 
               {{ $required ? 'required' : '' }} 
               autocomplete="{{ $name === 'password' ? 'current-password' : 'new-password' }}"
               placeholder="{{ $placeholder }}">
        <button class="btn btn-outline-secondary" 
                type="button" 
                id="toggle{{ ucfirst($name) }}">
            <i class="bi bi-eye" id="toggle{{ ucfirst($name) }}Icon"></i>
        </button>
    </div>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    
    @if($showStrength)
        <div class="mt-2">
            <div class="progress" style="height: 5px;">
                <div class="progress-bar" id="{{ $name }}Strength" role="progressbar" style="width: 0%"></div>
            </div>
            <small class="text-muted" id="{{ $name }}StrengthText">Force du mot de passe</small>
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggle{{ ucfirst($name) }}');
    const passwordField = document.getElementById('{{ $name }}');
    const toggleIcon = document.getElementById('toggle{{ ucfirst($name) }}Icon');

    // Toggle password visibility
    toggleButton.addEventListener('click', function() {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('bi-eye');
            toggleIcon.classList.add('bi-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('bi-eye-slash');
            toggleIcon.classList.add('bi-eye');
        }
    });

    @if($showStrength)
        // Password strength indicator
        passwordField.addEventListener('input', function() {
            const value = this.value;
            let strength = 0;
            let strengthText = 'Très faible';
            let strengthClass = 'bg-danger';

            if (value.length >= 8) strength += 20;
            if (value.match(/[a-z]/)) strength += 20;
            if (value.match(/[A-Z]/)) strength += 20;
            if (value.match(/[0-9]/)) strength += 20;
            if (value.match(/[^a-zA-Z0-9]/)) strength += 20;

            if (strength >= 80) {
                strengthText = 'Très fort';
                strengthClass = 'bg-success';
            } else if (strength >= 60) {
                strengthText = 'Fort';
                strengthClass = 'bg-info';
            } else if (strength >= 40) {
                strengthText = 'Moyen';
                strengthClass = 'bg-warning';
            } else if (strength >= 20) {
                strengthText = 'Faible';
                strengthClass = 'bg-danger';
            }

            const strengthBar = document.getElementById('{{ $name }}Strength');
            const strengthTextEl = document.getElementById('{{ $name }}StrengthText');
            
            strengthBar.style.width = strength + '%';
            strengthBar.className = 'progress-bar ' + strengthClass;
            strengthTextEl.textContent = 'Force du mot de passe: ' + strengthText;
        });
    @endif
});
</script>
