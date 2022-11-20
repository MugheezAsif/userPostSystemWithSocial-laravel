
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
                    <p>Enter the account email and the new password</p>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="php-email-form">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                            <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <input placeholder="Confirm-Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>

            </div>
        </section>
    </section>
</x-layout>
