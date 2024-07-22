<x-layout>

    <table class="table table-striped table-dark table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <td><strong>Title</strong></td>
                <td><strong>Body</strong></td>
                <td><strong>User_id</strong></td>
            </tr>
        </thead>
        <tr>
            @foreach ($posts as $post)
            <tr>
                <td> <a href="#">{{ $post->title }}</a></td>
                <td> {{ $post->body }}</td>
                <td> {{ $post->user_id }}</td>
            </tr>
        @endforeach
        </tr>
    </table>

</x-layout>