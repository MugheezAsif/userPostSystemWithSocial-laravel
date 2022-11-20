<x-layout>
    <x-navcard class="bg-dark">

    </x-navcard>
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
        <div class="container">
    
            <div class="d-flex justify-content-between align-items-center">
            <h2>New Post</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>New</li>
            </ol>
            </div>
    
        </div>
        </section><!-- End Breadcrumbs Section -->
    
        <section class="inner-page mt-4">
            <section id="contact" class="section-bg">
                <div class="container" data-aos="fade-up">
        
                <div class="section-header">
                    <h3>create new post</h3>
                    <p>Follow the given steps to upload a new post</p>
                </div>
        
                <div class="row contact-info">
        
                    <div class="col-md-4">
                    <div class="contact-address">
                        <i class="bi bi-input-cursor-text"></i>
                        <h3>Step 1</h3>
                        <p>Fill in the details</p>
                    </div>
                    </div>
        
                    <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="bi bi-upload"></i>
                        <h3>Step 2</h3>
                        <p>Upload the Image</p>
                    </div>
                    </div>
        
                    <div class="col-md-4">
                    <div class="contact-email">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <h3>Step 3</h3>
                        <p>Click on Submit!!!</p>
                    </div>
                    </div>
        
                </div>
        
                <div class="form">
                    <form method="POST" action="/posts" enctype="multipart/form-data" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title" placeholder="Post title" required>
                                @error('title')
                                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input value="{{old('subject')}}" type="text" class="form-control" name="subject" id="subject" placeholder="Post Subject" required>
                                @error('subject')
                                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input value="{{old('tags')}}" type="text" class="form-control" name="tags" id="tags" placeholder="Catagory tags" required>
                            @error('tags')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input value="{{old('content')}}" type="text-box" class="form-control" name="content" id="content" placeholder="Content" required>
                            @error('content')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="customFile">Choose Logo Under 1MB</label>
                            <input name="logo" type="file" class="form-control" id="customFile" />
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