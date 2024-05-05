<x-layout>
            <div class="content" class="container py-md-5 container--narrow mt-5 mx-auto" style="width: 500px">
                <p>We zullen een link naar uw email adres sturen. Gebruik deze link om het password te resetten.</p>
                <form action="/forgot-password-post" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    @error('email')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror


                    <button type="submit" class="btn btn-primary">Reset link aanvragen</button>
                </form>
            </div>
</x-layout>