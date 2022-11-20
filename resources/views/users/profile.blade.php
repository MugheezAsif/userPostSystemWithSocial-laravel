<x-layout>
    <x-navcard class="bg-dark"/>
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
        <div class="container">
    
            <div class="d-flex justify-content-between align-items-center">
            <h2>Profile</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Profile</li>
            </ol>
            </div>
    
        </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page mt-4">
            <section id="contact" class="section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md">
                            <div class="text-center">
                                <h3 class="test-center">Personal Information</h3>
                            </div>
                            
                            <p><strong>Name : </strong> {{$user->name}}</p>
                            <p><strong>Email : </strong> {{auth()->user()->id == $user->id ? $user->email : "******"}}</p>
                            <p><strong>Join Date : </strong> {{$user->created_at}}</p>
                            @auth
                            @if ($user != auth()->user())
                                @if ($user->isFriendWith(auth()->user()) )
                                <a class="btn btn-outline-danger" href="/profile/{{$user->id}}/unfriend">Unfriend</a>
                                @elseif (auth()->user()->hasSentFriendRequestTo($user))
                                <p>Pending Request</p>
                                @else
                                <a class="btn btn-outline-success" href="/profile/{{$user->id}}/request">Send Request</a>    
                                @endif
                            @endif
                            @endauth
                            
                        </div>
                        <div class="col-md">
                            <div class="text-center">
                                <h3 class="test-center">Posts Information</h3>
                            </div>
                            <p><strong>Total Posts : </strong></p>
                            <p><strong>Followers : </strong> {{ $user->followersCountReadable() }}</p>
                            @if ($user->id != auth()->user()->id)
                                @if ($user->isFollowedBy(auth()->user()))
                                <a href="/profile/{{$user->id}}/unfollow" class="btn btn-outline-success">Unfollow User</a>
                                @else    
                                <a href="/profile/{{$user->id}}/follow" class="btn btn-outline-success">Follow User</a>
                            
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
</x-layout>