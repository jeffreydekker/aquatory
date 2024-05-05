<x-layout>

    <div class="container py-md-5 container--narrow">
        <div class="d-flex justify-content-between">
          <h2>{{ $post->title }}</h2>
          <span class="pt-2">
            <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
            <form class="delete-post-form d-inline" action="#" method="POST">
              <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
            </form>
          </span>
        </div>

        <p class="text-muted small mb-4">
          <a href="#"><img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
          Posted by <a href="#">{{ $post->user->username }}</a> on {{ $post->created_at->format('n/j/Y') }}
        </p>

        <div class="body-content">
          {{-- In here we tell Laravel to render the content as it is and not
          protect us from anything i.e. malicious html/JS. To do this we use the single curly bracket 
          instead of the double one and use two '!' signs, as shown below.
          Do this with the right precautions (strip_tags in controller) and only when
          you have a really good reason to do so (like us wanting to support markdown functionality to users) --}}
          {!! $post->body !!}
        </div>
      </div>

</x-layout>