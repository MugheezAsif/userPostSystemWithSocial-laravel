<x-layout>
    <x-navcard class="bg-dark">

    </x-navcard>
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Confirm Password</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="/login">Login</a></li>
                <li>Confirm Password</li>
            </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page mt-4">
        <section id="contact" class="section-bg">
            <div class="container" data-aos="fade-up">
    
                <div class="section-header">
                    <h3>Confirm Password</h3>
                    <p>Confirm your password here</p>
                </div>

                    <form method="POST" action="{{ route('password.confirm') }}" class="php-email-form">
                        @csrf

                        <div class="form-group">
                            <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirm Password') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        
                        </div>
                    </form>

            </div>
        </section>
    </section>
</x-layout>

