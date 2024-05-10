<x-layout>
{{-- ---------------------------------------------------------------- --}}
  {{-- Nieuwe gebruiker toevoegen --}}
  <div class="container py-md-5 container--narrow">
    <h1>Beheerder pagina</h1>
    <br><br>
    <strong>Nieuwe gebruiker toevoegen:</strong>
    <form action="/register" method="POST">
      @csrf
      <div class="form-group">

        <label for="lidnummer" class="text-muted mb-1"><small>Lid nummer</small></label>
        <input name="lidnummer" id="lidnummer" class="form-control form-control-lg form-control-title" value="{{ old('lidnummer') }}" autocomplete="on" />
        @error('lidnummer')
        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
        @enderror

        <label for="naam" class="text-muted mb-1"><small>Naam</small></label>
        <input name="naam" id="username-register" class="form-control form-control-lg form-control-title" value="{{ old('naam') }}" autocomplete="on" />
        @error('naam')
        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
        @enderror

        <label for="achternaam" class="text-muted mb-1"><small>Achternaam</small></label>
        <input name="achternaam" id="achternaam" class="form-control form-control-lg form-control-title" value="{{ old('achternaam') }}" autocomplete="on" />
        @error('achternaam')
        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
        @enderror

        <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
        <input name="email" id="email-register" value="{{ old('email') }}" class="form-control form-control-lg form-control-title" type="text" autocomplete="on" />
        @error('email')
        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
        @enderror
      <br>
      <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
  </div>
{{-- ---------------------------------------------------------------- --}}
<br>
  {{-- Nieuwe visregistratie opties toevoegen voor gebruikers: --}}
  <div class="">
    <strong>Nieuwe opties toevoegen voor gebruikers:</strong>
    <form action="/opties-opslaan" method="POST">
    @csrf
      <div class="form-group">
        <label for="geslachtsnaam" value="{{ old('geslachtsnaam') }}" class="text-muted mb-1"><small>Geslacht snaam</small></label>
        <input type="text" name="geslachtsnaam" class="form-control form-control-lg form-control-title" placeholder="" autocomplete="off">
        @error('geslachtsnaam')
        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
        @enderror

        <label for="soortnaam" class="text-muted mb-1"><small>Soort naam</small></label>
        <input type="text" name="soortnaam" value="{{ old('soort') }}" class="form-control form-control-lg form-control-title" placeholder="" autocomplete="off">
        @error('soort')
        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
        @enderror

        <label for="ondersoort" value="{{ old('ondersoort') }}" class="text-muted mb-1"><small>Ondersoort</small></label>
        <input type="text" name="ondersoort" class="form-control form-control-lg form-control-title" placeholder="" autocomplete="off">
        @error('ordersoort')
        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
        @enderror

        <label for="vangplaats" value="{{ old('vangplaats') }}" class="text-muted mb-1"><small>Vangplaats</small></label>
        <input type="text" name="vangplaats" class="form-control form-control-lg form-control-title" placeholder="" autocomplete="off">
        @error('vangplaats')
        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
        @enderror

        <br>
      <button class="btn btn-primary">Opslaan</button>
    </form>
  </div>
  <br><br><br>

  {{-- Lijst gebruikers: --}}
  <table class="table table-striped table-bordered table-hover">
    <strong>Lijst van gebruikers:</strong>
    <br><br>
    <thead class="thead-dark">
        <tr>
            {{-- <td><strong>Naam</strong></td> --}}
            <td><strong>Lidnummer</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Volledige naam</strong></td>
            <td><strong>Registraties</strong></td>
        </tr>
    </thead>
    <tr>
        @foreach ($users as $user)
        <tr>
            <td> {{ $user->lidnummer }}</td>
            <td> {{ $user->email }}</td>
            <td> {{ $user->naam . " " . $user->achternaam}}</td>
            <td> {{ $user->registraties->count() }}</td>
        </tr>
    @endforeach
    {{ $users->links() }}
    </tr>
</table>

  <a href="mailto:@foreach ($users as $user)
  {{ $user->email }},@endforeach">Bulk email</a>
  <br><br>

{{-- Lijst opties --}}
<table class="table table-striped table-bordered table-hover">
  <strong>Lijst van opties:</strong>
  <br><br>
  <thead class="thead-dark">
      <tr>
          <td><strong>Geslachtsnaam</strong></td>
          <td><strong>Soortnaam</strong></td>
          <td><strong>Vangplaats</strong></td>
      </tr>
  </thead>
  <tr>
      @foreach ($options as $option)
      <tr>
          <td> {{ $option->geslachtsnaam }}</td>
          <td> {{ $option->soortnaam }}</td>
          <td> {{ $option->vangplaats }}</td>
      </tr>
  @endforeach
  {{ $options->links() }}
  </tr>
</table>

{{-- Lijst registraties --}}
<table class="table table-striped table-bordered table-hover">
  <strong>Lijst van registraties</strong>
  <thead class="thead-dark">
      <tr>
          {{-- <td><strong>Naam</strong></td> --}}
          <td><strong>Lidnummer</strong></td>
          <td><strong>Geslachtsnaam</strong></td>
          <td><strong>Soortnaam</strong></td>
          <td><strong>Vangplaats</strong></td>
          <td><strong>AS</strong></td>
          <td><strong>KV</strong></td>
      </tr>
  </thead>
  <tr>
      @foreach ($registraties as $registratie)
      <tr>
          <td> {{ $registratie->gebruiker->lidnummer }}</td>
          <td>{{ $registratie->geslachtsnaam }}</td>
          <td>{{ $registratie->soortnaam }}</td>
          <td>{{ $registratie->vangplaats }}</td>
          <td>{{ $registratie->AS }}</td>
          <td>{{ $registratie->KV }}</td>
      </tr>
  @endforeach
  {{ $registraties->links() }}
  </tr>
</table>
      
</x-layout>
