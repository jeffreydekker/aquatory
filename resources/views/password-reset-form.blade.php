<x-layout>
    <div class="container py-md-5 container--narrow">
        <strong>Voer uw email in en kies vervolgens een nieuw (sterk) wachtwoord.</strong>
        <form action="/password-reset" method="POST">
            @csrf
            <div class="form-group">
            <br>
            <label for="email" class="text-muted mb-1"><small>Email</small></label>
            <input name="email" id="email" value="{{ old('email') }}" class="form-control form-control-lg form-control-title" type="text" autocomplete="on" />
            @error('email')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror

            <label for="password" class="text-muted mb-1"><small>Nieuw wachtwoord</small></label>
            <input name="password" id="password" class="form-control form-control-lg form-control-title" type="password"/>
            @error('password')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror

            <label for="password_confirmation" class="text-muted mb-1"><small>Nieuw wachtwoord check</small></label>
            {{-- From the register function in the user controller we can confirm that 
            the 2 password fields are the same by using "_confirmation" as the 
            second field's name. Also make sure that the names match apart form the
            _confirmation postfix --}}
            <input name="password_confirmation" id="password_confirmation" class="form-control form-control-lg form-control-title" type="password"/>
            @error('password_confirmation')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
            </div>
            
            <input type="hidden" value="{{ $token }}" name="token" required>
            <br>
            
            <button type="submit" class="btn btn-primary">Reset wachtwoord</button>
            <br>
        </form>
    </div>
</x-layout>