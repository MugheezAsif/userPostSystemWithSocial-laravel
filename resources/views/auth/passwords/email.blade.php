<x-layout>
    <x-navcard class="bg-dark">

    </x-navcard>
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Reset Password</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="/login">Login</a></li>
                <li>Reset Password</li>
            </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page mt-4">
        <section id="contact" class="section-bg">
            <div class="container" data-aos="fade-up">
    
                <div class="section-header">
                    <h3>Reset Password</h3>
                    <p>Enter the account email then you will receive the password rest link in that email</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="php-email-form">
                    @csrf

                    <div class="form-group">
                            <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    
                    </div>
                </form>
            </div>
        </section>
    </section>


</x-layout>