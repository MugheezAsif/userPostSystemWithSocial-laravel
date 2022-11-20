<x-layout>
    <x-navcard class="bg-dark">

    </x-navcard>
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Verify</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Verify</li>
            </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page mt-4">
        <section id="contact" class="section-bg">
            <div class="container" data-aos="fade-up">
    
                <div class="section-header">
                    <h3>Verify</h3>
                    <p>Verify that its you by checking your email</p>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </section>
    </section>
</x-layout>
