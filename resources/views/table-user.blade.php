<x-layout>

  <div class="container py-md-5 container--wide">
    <h1>Lijst registraties van {{ $username }}</h1>
        {{-- Lijst eigen registraties --}}
        <div class="action export-table" style="display: inline-block">
          <div style="display: inline-block;">
              <input class="searchField" type="text" id="searchInput" onkeyup="searchFunctionTableUser()" placeholder="       Zoek op naam" title="Zoek op naam ">     <i class="fas fa-search"></i>
          </div>
          <div style="display: inline-block; padding-left:100px" class="py-md-1 container--wide">
              
              <span>Export naar:</span>
              <button>XLSX</button>
              <button>XLS</button>
              <button>CSV</button>
          </div>
      </div>
      <div style="overflow-x:auto;">
        <table class="table table-hover" id="tableUser" style="cursor: pointer">
          <thead>
              <tr>
                <th onclick="sortTableUser(0)"><strong>Aangemaakt</strong></th>
                <th onclick="sortTableUser(1)"><strong>Geslacht</strong></th>
                <th onclick="sortTableUser(2)"><strong>Soort</strong></th>
                <th onclick="sortTableUser(3)"><strong>Vangplaats</strong></th>
                <th onclick="sortTableUser(4)"><strong>AS</strong></th>
                <th onclick="sortTableUser(5)"><strong>KV</strong></th>
                <th onclick="sortTableUser(6)"><strong>Notitie</strong></th>
                <th onclick="sortTableUser(7)"><strong>Ondersoort</strong></th>
                <th onclick="sortTableUser(8)"><strong>M/V</strong></th>
                <th onclick="sortTableUser(9)"><strong>Aantal</strong></th>
                <th onclick="sortTableUser(10)"><strong>Groep</strong></th>
                <th onclick="sortTableUser(11)"><strong>Jongen</strong></th>
                <th><strong>Delete</strong></th>
              </tr>
          </thead>

          @foreach ($registraties as $registratie)
            <tr class="clickable-row" data-href="{{ route('registratie.show', $registratie->id) }}">
              <td>{{ $registratie->created_at->format('j-n-Y') }}</td>
              <td>{{ $registratie->geslachtsnaam }}</td>
              <td>{{ $registratie->soortnaam }}</td>
              <td>{{ $registratie->vangplaats }}</td>
              <td>{{ $registratie->AS }}</td>
              <td>{{ $registratie->KV }}</td>
              <td>{{ $registratie->notitie }}</td>
              <td>{{ $registratie->ondersoort }}</td>
              <td>{{ $registratie->mv }}</td>
              <td>{{ $registratie->aantal }}</td>
              <td>{{ $registratie->groep }}</td>
              <td>{{ $registratie->jongen }}</td>
              @can('delete', $registratie)
              <td style="text-align:center; vertical-align:middle">            
                <form class="delete-post-form d-inline" action="/registratie/{{ $registratie->id }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Verwijderen"><i style="color:red" class="fas fa-trash"></i></button>
                </form>
              </td>
              @endcan
          </tr>


          @endforeach
          {{ $registraties->links() }}
        </table>
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