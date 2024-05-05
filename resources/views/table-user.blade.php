<x-layout>

  <div class="container py-md-5 container--wide">
    <h1>Lijst registraties van {{ $username }}</h1>
        {{-- Lijst registraties --}}
        <table class="table table-striped table-bordered table-hover">
          <thead class="thead-dark">
              <tr>
                  <td><strong><em>Geslachtsnaam</em></strong></td>
                  <td><strong><em>Soortnaam</em></strong></td>
                  <td><strong><em>Vangplaats</em></strong></td>
                  <td><strong><em>AS</em></strong></td>
                  <td><strong><em>KV</em></strong></td>
                  <td><strong><em>Notitie</em></strong></td>
                  <td><strong><em>Aangemaakt</em></strong></td>
                  <td><strong><em>Verwijderen</em></strong></td>
              </tr>
          </thead>
          @foreach ($registraties as $registratie)
          <tr>
              <td>{{ $registratie->geslachtsnaam }}</td>
              <td>{{ $registratie->soortnaam }}</td>
              <td>{{ $registratie->vangplaats }}</td>
              <td>{{ $registratie->AS }}</td>
              <td>{{ $registratie->KV }}</td>
              <td>{{ $registratie->notitie }}</td>
              <td>{{ $registratie->created_at->format('j-n-Y') }}</td>
              @can('delete', $registratie)
              <td style="text-align:center; vertical-align:middle">            
                <form class="delete-post-form d-inline" action="/registratie/{{ $registratie->id }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Verwijderen"><i style="color:black" class="fas fa-trash"></i></button>
                </form>
              </td>
              @endcan
          </tr>
          @endforeach
    </table>
  </div>


  <div class="container py-md-5 container--wide">
    <h2>
      <img class="avatar-small" src="https://gravatar.com/avatar/b9408a09298632b5151200f3449434ef?s=128" /> {{ $username }}
      <form class="ml-2 d-inline" action="#" method="POST">
        <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
        <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
      </form>
    </h2>

    <div class="profile-nav nav nav-tabs pt-2 mb-4">
      <a href="#" class="profile-nav-link nav-item nav-link active">Registraties: {{ $registraties->count() }} </a>
      <a href="#" class="profile-nav-link nav-item nav-link">Volgers: 3</a>
      <a href="#" class="profile-nav-link nav-item nav-link">Volgend: 2</a>
    </div>

    <div class="list-group">
        @foreach ($registraties as $registratie)
        <a href="/registratie/{{ $registratie->id }}" class="list-group-item list-group-item-action">
            <img class="avatar-tiny" src="https://gravatar.com/avatar/b9408a09298632b5151200f3449434ef?s=128" />
            <strong>{{ $registratie->soortnaam }}</strong> on {{ $registratie->created_at->format('j-n-Y') }}
          </a>
        @endforeach
    </div>
  </div>

  <div class="container py-md-5 container--narrow"">
    <h2>Profiel instellingen</h2>
    <form action="/password-reset-from-profile" method="GET">
      @csrf
      <p>Wachtwoord (opnieuw) instellen</p>
      <button>Stel in</button>
    </form>

    <form action="/password-reset-from-profile" method="GET">
      @csrf
      <p>Naam wijzigen</p>
      <button>Stel in</button>
    </form>

    <form action="/password-reset-from-profile" method="GET">
      @csrf
      <p>Email wijzigen</p>
      <button>Stel in</button>
    </form>

    <form action="/password-reset-from-profile" method="GET">
      @csrf
      <p>Account verwijderen</p>
      <button>Stel in</button>
    </form>
    
  </div>
</x-layout>