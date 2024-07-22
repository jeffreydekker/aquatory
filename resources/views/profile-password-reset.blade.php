<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="/password-reset-from-profile" method="POST">
            @csrf
                <div class="form-group">
                <br>
                <label for="currentPassword" class="text-muted mb-1"><small>Huidig wachtwoord</small></label>
                <input type="password" name="currentPassword" class="form-control form-control-lg form-control-title" placeholder="" autocomplete="off">
                @error('currentPassword')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
        
                <label for="newPassword" class="text-muted mb-1"><small>Nieuw wachtwoord</small></label>
                <input type="password" name="newPassword" class="form-control form-control-lg form-control-title" placeholder="" autocomplete="off">
                @error('newPassword')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
        
                <label for="newPassword_confirmed" class="text-muted mb-1"><small>Nieuw wachtwoord herhaling</small></label>
                <input type="password" name="newPassword_confirmed" class="form-control form-control-lg form-control-title" placeholder="" autocomplete="off">
                @error('newPassword_confirmed')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
                <br>
                <button class="btn btn-primary">Opslaan</button>
        </form>
    </div>


</x-layout>