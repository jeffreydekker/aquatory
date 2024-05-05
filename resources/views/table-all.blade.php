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
                    <th onclick="sortTable(1)"><strong>Geslachtsnaam</strong></th>
                    <th onclick="sortTable(2)"><strong>Soortnaam</strong></th>
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
        </table>
        <br>


    {{-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <table id="myTable">
        <tr>
        <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->  
            <th onclick="sortTable(0)">Name</th>
            <th onclick="sortTable(1)">Country</th>
        </tr>
        <tr>
            <td>Berglunds snabbkop</td>
            <td>Sweden</td>
        </tr>
        <tr>
            <td>North/South</td>
            <td>UK</td>
        </tr>
        <tr>
            <td>Alfreds Futterkiste</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Koniglich Essen</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Magazzini Alimentari Riuniti</td>
            <td>Italy</td>
        </tr>
        <tr>
            <td>Paris specialites</td>
            <td>France</td>
        </tr>
        <tr>
            <td>Island Trading</td>
            <td>UK</td>
        </tr>
        <tr>
            <td>Laughing Bacchus Winecellars</td>
            <td>Canada</td>
        </tr>
    </table> --}}

</x-layout>