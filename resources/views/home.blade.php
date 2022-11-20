<x-layout>
    <x-navcard class="bg-dark">

    </x-navcard>
    <section>
        <main id="main">

            <!-- ======= Breadcrumbs Section ======= -->
            <section class="breadcrumbs">
              <div class="container">
        
                <div class="d-flex justify-content-between align-items-center">
                  <h2>Dashboard</h2>
                  <ol>
                    <li><a href="/">Home</a></li>
                    <li>Dashboard</li>
                  </ol>
                </div>
        
              </div>
            </section><!-- Breadcrumbs Section -->

            <section id="portfolio" class="section-bg">
                <div class="container" data-aos="fade-up">
                
                    <div class="row">
                        <div class="col-md">
                            <header class="section-header">
                                <h3 class="section-title">Personal Information</h3>
                            </header>
                            <div class="container">
                                <p><strong>Name : </strong> {{auth()->user()->name}}</p>
                                <p><strong>Email : </strong> {{auth()->user()->email}}</p>
                                <p><strong>Joined Date : </strong> {{auth()->user()->created_at}}</p>
                                <p><strong>Followers : </strong> {{auth()->user()->followersCount()}}</p>
                                <p><strong>Total Friends : </strong> {{auth()->user()->getFriendsCount()}}</p>
                            </div>
                        </div>
                        <div class="col-md">
                            <header class="section-header">
                                <h3 class="section-title">Friends</h3>
                            </header>
                            <div class="container">
                                <p><strong>Pendings</strong></p>
                                <div class="px-3">
                                    @foreach ($pendingFriends as $friend)
                                    <div class="d-flex mb-1">
                                        <div>
                                            <p class="m-0">User ID : <a href="/profile/{{$friend->sender_id}}">{{$friend->sender_id}}</a> </p>
                                        </div>
                                        <div class="ms-auto">
                                            <a class="btn btn-sm btn-outline-success" href="/user/{{$friend->sender_id}}/accept">accept request</a>
                                        </div>       
                                        
                                    </div>
                                    @endforeach
                                </div>
                                <hr>

                                <p><strong>Friends</strong></p>
                                <div class="row">
                                    @foreach ($friends as $friend)
                                        <div class="col-4 mb-1">
                                            
                                            <p class="m-0">User ID : <a href="/profile/{{$friend->sender_id}}">{{$friend->sender_id}}</a></p>
                                            
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                            </div>

                        </div>
                    </div>
                    

                    <header class="section-header">
                        <h3 class="section-title">Your Posts</h3>
                    </header>
                
                    <div class="row" data-aos="fade-up" data-aos-delay="100"">
                        <div class=" col-lg-12">
                            <ul id="portfolio-flters">
                                <li data-filter="*" class="filter-active"> <a style="color: black" href="/home/?tag=">All</a></li>
                                <li data-filter=".filter-app"> <a style="color: black" href="/home/?tag=laravel">Laravel</a></li>
                                <li data-filter=".filter-card"> <a style="color: black" href="/home/?tag=ruby">Ruby</a> </li>
                                <li data-filter=".filter-web"> <a style="color: black" href="/home/?tag=javascript">Javascript</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                
                        @unless (count($posts) == 0)
                            @foreach ($posts as $post)
                                @if ($post->user_id == Auth::id())
                                    <x-post-card :post=$post/>
                                @endif
                            @endforeach
                        @else
                            <p>Sorry No Posts Yet</p>    
                        @endunless
                    </div>

                    {{-- <header class="section-header">
                        <h3 class="section-title">Favourite Posts</h3>
                    </header>

                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                
                        @unless (count($favPosts) == 0)
                            @foreach ($favPosts as $post)
                                @if ($post->user_id == Auth::id())
                                    <x-post-card :post=$post/>
                                @endif
                            @endforeach
                        @else
                            <p>Sorry No Posts Yet</p>    
                        @endunless
                    </div> --}}
        
                </div>
                
            </section>
        </main>
    </section>
</x-layout>
