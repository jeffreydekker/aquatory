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
  <table class="table table-striped table-bordered table-hover" id="tableAll">
    <strong>Lijst van gebruikers:</strong>
    <br><br>
    <thead>
        <tr>
            {{-- <td><strong>Naam</strong></td> --}}
            <td><strong>Lid sinds</strong></td>
            <td><strong>Lidnummer</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Volledige naam</strong></td>
            <td><strong>Registraties</strong></td>
            <td><strong><em>Verwijderen</em></strong></td>
        </tr>
    </thead>
    <tr>
        @foreach ($users as $user)
        <tr>
          <td> {{ $user->created_at->format('j-n-Y') }}</td>
          <td> <a href="mailto:{{ $user->email }}">{{ $user->lidnummer }}</a></td>
          <td> {{ $user->email }}</td>
          <td> {{ $user->naam . " " . $user->achternaam}}</td>
          <td> {{ $user->registraties->count() }}</td>
          {{-- @can('delete', $user) --}}
          <td style="text-align:center; vertical-align:middle">            
              <form class="delete-post-form d-inline" action="/profiel/{{ $user->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Verwijderen"><i style="color:red" class="fas fa-trash"></i></button>
              </form>
            </td>
            {{-- @endcan --}}
        </tr>
    @endforeach
    {{ $users->links(data: ['scrollTo' => false]) }}
    </tr>
  </table>

  {{-- Send email to all users --}}
  <a href="mailto:@foreach ($users as $user)
  {{ $user->email }},@endforeach">Bulk email</a>
  <br><br>

{{-- Lijst opties --}}
<table class="table table-striped table-bordered table-hover" id="options">
  <strong>Lijst van opties:</strong>
  <br><br>
  <thead class="thead-dark">
      <tr>
          <th><strong>Geslachtsnaam</strong></th>
          <th><strong>Soortnaam</strong></th>
          <th><strong>Vangplaats</strong></th>
      </tr>
  </thead>
  <tbody id="table-data">
    
      @foreach ($options as $option)
      <tr>
          <td> {{ $option->geslachtsnaam }}</td>
          <td> {{ $option->soortnaam }}</td>
          <td> {{ $option->vangplaats }}</td>
      </tr>
    @endforeach
    
    <tr>
      <td colspan="3">
          {{ $options->links() }}
      </td>
  </tr>
  </tbody>
</table>


{{-- Lijst registraties --}}
<table class="table table-striped table-bordered table-hover" id="registraties">
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
          <td><strong>Verwijderen</strong></td>
      </tr>
  </thead>
  <tr>
      @foreach ($registraties as $registratie)
      <tr>
        @if($registratie->gebruiker)
        <td> {{ $registratie->gebruiker->lidnummer }}</td>
        @endif
          <td>{{ $registratie->geslachtsnaam }}</td>
          <td>{{ $registratie->soortnaam }}</td>
          <td>{{ $registratie->vangplaats }}</td>
          <td>{{ $registratie->AS }}</td>
          <td>{{ $registratie->KV }}</td>
          @can('delete', $registratie)
          <td style="text-align:center; vertical-align:middle">            
            <form class="delete-post-form d-inline" action="/registratieviabeheerder/{{ $registratie->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Verwijderen"><i style="color:red" class="fas fa-trash"></i></button>
            </form>
          </td>
          @endcan
      </tr>
  @endforeach
  {{ $registraties->links(data: ['scrollTo' => false]) }}
  </tr>
</table>
      
</x-layout>
