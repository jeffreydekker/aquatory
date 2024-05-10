<x-layout>

    
    <div class="container py-md-5 container--wide">
        <h1>Lijst alle gebruiker registraties</h1>
        <br>

        <p><strong>Klik op de kolomnamen om te sorteren op de betreffende kolomnaam.</strong></p>
        <p>De eerste keer dat u klikt zullen de kolommen geordend worden van A naar Z.<br>
            Klinkt u nogmaals, dan zullen de kolommen geordend worden van Z naar A. <br>
            Ook kunt onderstaande zoekfunctie gebruiken om te zoeken op een specifieke registratie. <br>
            Onderaan de tabel heeft u de optie om te complete lijst van registraties te exporteren naar Excel.
        </p> <br>

        {{-- Table all registrations --}}
        <div class="action export-table" style="display: inline-block">
            <div style="display: inline-block;">
                <input class="searchField" type="text" id="searchInput" onkeyup="searchFunction()" placeholder="       Zoek op naam" title="Zoek op naam ">     <i class="fas fa-search"></i>
            </div>
            <div style="display: inline-block; padding-left:100px" class="py-md-1 container--wide">
                
                <span>Export naar:</span>
                <button>XLSX</button>
                <button>XLS</button>
                <button>CSV</button>
            </div>
        </div>
    
        <table class="table table-hover" id="tableAll">
            <thead>
                <tr>
                    <th onclick="sortTable(0)"><strong>Lidnummer</strong></th>
                    <th onclick="sortTable(1)"><strong>Geslacht</strong></th>
                    <th onclick="sortTable(2)"><strong>Soort</strong></th>
                    <th onclick="sortTable(3)"><strong>Vangplaats</strong></th>
                    <th onclick="sortTable(4)"><strong>AS</strong></th>
                    <th onclick="sortTable(5)"><strong>KV</strong></th>
                    <th onclick="sortTable(6)"><strong>Notitie</strong></th>
                </tr>
            </thead>
            
                @foreach ($registraties as $registratie)
                <tr>
                    <td> <a href="mailto:{{ $registratie->gebruiker->email }}">{{ $registratie->gebruiker->lidnummer }}</a></td>
                    <td>{{ $registratie->geslachtsnaam }}</td>
                    <td>{{ $registratie->soortnaam }}</td>
                    <td>{{ $registratie->vangplaats }}</td>
                    <td>{{ $registratie->AS }}</td>
                    <td>{{ $registratie->KV }}</td>
                    <td>{{ $registratie->notitie }}</td>
                </tr>
            @endforeach
            {{ $registraties->links() }}
        </table>
        <br>

</x-layout>