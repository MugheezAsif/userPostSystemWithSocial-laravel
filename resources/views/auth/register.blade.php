<x-layout>
    <x-navcard class="bg-dark">

    </x-navcard>
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
        <div class="container">
    
            <div class="d-flex justify-content-between align-items-center">
            <h2>New User Register</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Sign Up</li>
            </ol>
            </div>
    
        </div>
        </section><!-- End Breadcrumbs Section -->
    
        <section class="inner-page mt-4">
            <section id="contact" class="section-bg">
                <div class="container" data-aos="fade-up">
        
                <div class="section-header">
                    <h3>Register</h3>
                    <p>Create a profile to upload books. Your role will be as a user not as a admin</p>
                </div>
        
                
                <div class="form">
                    <form method="POST" action="{{ route('register') }}" class="php-email-form">
                        @csrf

                        <div class="form-group">
                            <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="form-group">
                            <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="form-group">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
                </div>
                </div>
            </section>
        </section>
    </main>

</x-layout>