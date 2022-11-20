
<x-layout>
  <x-navcard class="bg-dark">

  </x-navcard>
    <section>
        <main id="main">

            <!-- ======= Breadcrumbs Section ======= -->
            <section class="breadcrumbs">
              <div class="container">
        
                <div class="d-flex justify-content-between align-items-center">
                  <h2>Post Details</h2>
                  <ol>
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Posts</a></li>
                    <li>Post Details</li>
                  </ol>
                </div>
        
              </div>
            </section><!-- Breadcrumbs Section -->
        
            <!-- ======= Portfolio Details Section ======= -->
            <section id="portfolio-details" class="portfolio-details">
              <div class="container">
        
                <div class="row gy-4">
        
                  <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                      <div class="swiper-wrapper align-items-center">
        
                        <div class="swiper">
                            <img src="{{ $post->logo ? asset('storage/' . $post->logo) : asset('images/no-image.jpg')}}" class="img-fluid p-3" alt="database problem">    
                        </div>
        
                      </div>
                    </div>
                  </div>
        
                  <div class="col-lg-4 p-3">
                    <div class="portfolio-info">
                      <div class="d-flex">
                        <div><h3>Post information</h3></div>
                        <div class="ms-auto">
                          <p>{{$post->likersCount()}}
                            @auth
          
                            @if (auth()->user()->hasLiked($post))
                            <a href="/posts/{{$post->id}}/unlike"><i class="bi bi-heart-fill"></i></a>    
                            @else
                            <a href="/posts/{{$post->id}}/like"><i class="bi bi-heart"></i></a>
                            @endif    

                            @else
                            <i class="bi bi-heart"></i>
                            @endauth

                            <span class="ms-2">
                              {{$post->favoritersCount()}}
                              @auth
                              @if (auth()->user()->hasFavorited($post))
                              <a href="/posts/{{$post->id}}/unfav"><i class="bi bi-star-fill"></i></a>
                              @else
                              <a href="/posts/{{$post->id}}/fav"><i class="bi bi-star"></i></a>
                              @endif

                              @else
                              <i class="bi bi-star"></i>
                              @endauth
                            </span>
                          </p>
                        </div>
                      
                      </div>
                      <ul>
                        <li><strong>Ttile</strong>: {{$post->title}}</li>
                        <li><strong>Subject</strong>: {{$post->subject}}</li>
                        <li><strong>Upload date</strong>: {{$post->created_at}}</li>
                        <x-tags-card :postTags="$post->tags"/>
                        <li><strong>By : </strong><a href="/profile/{{$user->id}}">{{$user->name}}</a></li>
                        <li>
                          @auth
                            @if ($post->user_id == Auth::user()->id)
                              <div class="mb-3">
                                <a class="my-2 btn btn-sm btn-outline-success" href="/posts/edit/{{$post->id}}">Edit</a>
                                <form action="/posts/{{$post->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                              </div>
                            @endif
                          @endauth
                        </li>
                      </ul>
                    </div>
                    <div class="portfolio-description">
                      <h2>Post content</h2>
                      <p> {{$post->content}} </p>
                    </div>
                  </div>
                  <hr>
                  <div>
                    <h3>Comments</h3>
                    <div class="my-2">
                      @if (count($comments) > 0)
                        @foreach ($comments as $comment)
                            <p><strong>=></strong>{{$comment->content}}</p>
                        @endforeach
                      @else
                        <p>No comments yet</p>
                      @endif
                      @auth
                      @unless (Auth::id() == $post->user_id)
                      <div class="mb-4">
                        <form method="POST" action="/posts/{{$post->id}}" class="php-email-form">
                          @csrf
                          <div class="form-group">
                            <input type="hidden" value="{{ $post->id }}" name="post_id">
                            <input class="form-control d-inline-block my-2" style="max-width: 250px" type="text" placeholder="Enter a new Comment" name="content">
                            <button class="btn btn-sm btn-success" type="submit">Comment</button>
                          </div>
                        </form>
                      </div>    
                      @endunless
                      @endauth
                      
                    </div>
                    
                  </div>
        
                </div>
                
        
              </div>
            </section><!-- End Portfolio Details Section -->
        
          </main><!-- End #main -->
    </section>
</x-layout>