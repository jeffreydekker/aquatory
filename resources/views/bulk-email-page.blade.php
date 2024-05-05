<x-layout>

    <div class="container py-md-5 container--narrow">
    <form action="/sendsave-bulk-email" method="POST">
        @csrf
        

        <label for="title" value="{{ old('title') }}" class="text-muted mb-1"><small>Titel</small></label>
        <input type="text" name="title" class="form-control form-control-lg form-control-title" placeholder="" autocomplete="off">
        @error('title')
        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
        @enderror

        <label for="description" value="{{ old('description') }}" class="text-muted mb-1"><small>Omschrijving</small></label>
        <input type="textarea" name="description" class="form-control form-control-lg form-control-title" placeholder="" autocomplete="off">
        @error('description')
        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
        @enderror

        <br>
        <button class="btn btn-primary">Opslaan</button>
    </form>

</x-layout>