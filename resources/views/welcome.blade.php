@extends(Auth::user() ? 'layouts.dashboard' : 'layouts.app')

@section('title', 'Home')

@section('content')
    <!-- WELCOME -->
    <section id="welcome" class="p-b-0 body-min-height dark">
        <div class="container">
            <div class="heading-text heading-section text-center m-b-40" data-animate="animate__fadeInUp">
                <h2>ADAM Bit Exchange</h2>
                <span class="lead">Create amam ipsum dolor sit amet, Beautiful nature, and rare feathers!.</span>
            </div>
        </div>
    </section>
    <!-- end: WELCOME -->
@endsection
