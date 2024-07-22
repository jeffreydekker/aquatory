<x-layout>

  
    <div class="container py-md-5 container--narrow">
      <h1>Visregistratie</h1>
      <form action="/registratie/{{$registratie->id}}" method="POST">
        @csrf
        @method('PUT')
          <div class="form-group">

            <label for="geslachtsnaam"><strong>Geslachtsnaam</strong></label>
            <br>
            <select name="geslachtsnaam" id="geslachtsnaam" style="width: 700px">
              <option value="old{{'geslachtsnaam', $registratie->geslachtsnaam}}" disabled selected>---Selecteer een optie---</option>
                @foreach ($all as $row)
                @if ($row->geslachtsnaam != NULL)
                <option value="{{ $row->geslachtsnaam }}">{{ $row->geslachtsnaam }}</option>
                @endif
                @endforeach  
            </select>
            @error('geslachtsnaam')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
            <br>

            <label for="soortnaam"><strong>Soort naam</strong></label>
            <br>
            <select name="soortnaam" id="soortnaam" style="width: 700px">
              <option value="old{{'soortnaam', $registratie->soortnaam}}" disabled selected>---Selecteer een optie---</option>
                @foreach ($all as $row)
                @if ($row->soortnaam != NULL)
                <option value="{{ $row->soortnaam }}">{{ $row->soortnaam }}</option>
                @endif
                @endforeach  
            </select>
            @error('soortnaam')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
            <br>

            <label for="ondersoort"><strong>Onder soort</strong></label>
            <br>
            <select name="ondersoort" id="ondersoort" style="width: 700px">
              <option value="" disabled selected>---Selecteer een optie---</option>
                @foreach ($all as $row)
                @if ($row->ondersoort != NULL)
                <option value="{{ $row->ondersoort }}">{{ $row->ondersoort }}</option>
                @endif
                @endforeach  
            </select>
            @error('ondersoort')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
            <br>

            <label for="vangplaats"><strong>Vangplaats</strong></label>
            <br>
            <select name="vangplaats" id="vangplaats" style="width: 700px">
              <option value="old{{'vangplaats', $registratie->vangplaats}}" disabled selected>---Selecteer een optie---</option>
                @foreach ($all as $row)
                @if ($row->vangplaats != NULL)
                <option value="{{ $row->vangplaats }}">{{ $row->vangplaats }}</option>
                @endif
                @endforeach  
            </select>
            @error('vangplaats')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
            <br>
            <br>

            <p><strong>Betreft het een aquariumstam?</strong></p>
            <input type="radio" id="jaAS" name="AS" value="Ja">
            <label for="jaAS">Ja</label><br>
            <input type="radio" id="neeAS" name="AS" value="Nee">
            <label for="neeAS">Nee</label><br>
          @error('AS')
          <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
          @enderror

          <p><strong>Betreft het een kweekvorm?</strong></p>
            <input type="radio" id="jaKV" name="KV" value="Ja">
            <label for="jaKV">Ja</label><br>
            <input type="radio" id="neeKV" name="KV" value="Nee">
            <label for="neeKV">Nee</label><br>
          @error('KV')
          <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
          @enderror

          <p><strong>Mannelijk of vrouwelijk?</strong></p>
            <input type="radio" id="mmv" name="mv" value="M">
            <label for="mmv">M</label><br>
            <input type="radio" id="vmv" name="mv" value="V">
            <label for="vmv">V</label><br>
          @error('mv')
          <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
          @enderror

          <p><strong>Betreft het een groep?</strong></p>
            <input type="radio" id="groepJa" name="groep" value="Ja">
            <label for="groepJa">Ja</label><br>
            <input type="radio" id="groepNee" name="groep" value="Nee">
            <label for="groepNee">Nee</label><br>
          @error('groep')
          <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
          @enderror

          <p><strong>Heeft het jongen?</strong></p>
            <input type="radio" id="jongenJa" name="jongen" value="Ja">
            <label for="jongenJa">Ja</label><br>
            <input type="radio" id="jongenNee" name="jongen" value="Nee">
            <label for="jongenNee">Nee</label><br>
          @error('jongen')
          <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
          @enderror
          <br>


          <label for="aantal"><strong>Aantal gevangen:</strong></label>
          <br>
          <input id="counter-value" class="value" value="1" type="number" name="aantal" placeholder="1" min="1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" style="width: 40px">
          @error('aantal')
          <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
          @enderror
          <br><br>

          <label for="notitie" class="text-muted mb-1"><small><strong>Notitie</strong></small></label>
          <textarea name="notitie" id="notitie" class="form-control form-control-lg form-control-title" value="" autocomplete="off" /></textarea>
          @error('notitie')
          <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
          @enderror
          <br><br>

          <button class="btn btn-primary">Wijzigen</button>
            <br><br>
          <p><small><strong>Let op:</strong> staan de uw gewenste opties uit de dropdown menu's er niet tussen? Neem dan contact op met een van de beheerders.</small></p>

        </div>
      </form> --}}

</x-layout>