<x-layout>

    <div class="container py-md-5 container--narrow">
        <div class="d-flex justify-content-between">
          <h2>{{ $registraties->geslachtsnaam }}</h2>
          <span class="pt-2">
            <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
            <form class="delete-post-form d-inline" action="#" method="POST">
              <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
            </form>
          </span>
        </div>

        <p class="text-muted small mb-4">
          {{-- <a href="#"><img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a> --}}
          {{-- Posted by <a href="#">{{ $registraties->gebruiker->naam }}</a> on {{ $post->created_at->format('n/j/Y') }} --}}
          sfdsfsdsdf
        </p>

        <div class="body-content">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem error, ex corporis dignissimos eius corrupti voluptatibus sed earum repudiandae, nisi provident non enim obcaecati et sint placeat est. Facilis, nihil. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae similique doloremque eum distinctio voluptatum iusto illum hic, fugit facere voluptas sequi sapiente qui. Optio at obcaecati esse dicta, numquam corrupti.Natus recusandae veritatis incidunt dignissimos quidem facilis molestiae, laudantium vero amet blanditiis hic earum nisi? Alias a dignissimos totam doloremque culpa atque. Vel deleniti nam nisi nemo, iure accusantium laboriosam?
          {{-- {!! $registratie->body !!} --}}
        </div>
      </div>

</x-layout>