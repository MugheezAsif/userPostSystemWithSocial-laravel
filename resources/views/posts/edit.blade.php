<x-layout>
    <x-navcard class="bg-dark">

    </x-navcard>
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
        <div class="container">
    
            <div class="d-flex justify-content-between align-items-center">
            <h2>Edit Post</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Edit</li>
            </ol>
            </div>
    
        </div>
        </section><!-- End Breadcrumbs Section -->
    
        <section class="inner-page mt-4">
            <section id="contact" class="section-bg">
                <div class="container" data-aos="fade-up">
        
                <div class="section-header">
                    <h3>Edit a post</h3>
                </div>
        
                <div class="form">
                    <form method="POST" action="/posts/{{$post->id}}" enctype="multipart/form-data" role="form" class="php-email-form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input value="{{$post->title}}" type="text" name="title" class="form-control" id="title" placeholder="Post title" required>
                                @error('title')
                                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input value="{{$post->subject}}" type="text" class="form-control" name="subject" id="subject" placeholder="Post Subject" required>
                                @error('subject')
                                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input value="{{$post->tags}}" type="text" class="form-control" name="tags" id="tags" placeholder="Catagory tags" required>
                            @error('tags')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input value="{{$post->content}}" type="text-box" class="form-control" name="content" id="content" placeholder="Content" required>
                            @error('content')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p>Leave this field if you don't want to change it</p>
                            <label class="form-label" for="customFile">Choose Logo Under 1MB</label>
                            <input value="{{$post->logo}}" name="logo" type="file" class="form-control" id="customFile" />
                            @error('logo')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        
                        @auth
                            <input name="user_id" type="hidden" value="{{Auth::id()}}" type="text">    
                        @endauth
                        
                        <div class="text-center">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
        
                </div>
            </section>
        </section>
    
    </main><!-- End #main -->

</x-layout>