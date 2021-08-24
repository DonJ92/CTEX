@extends(Auth::user() ? 'layouts.dashboard' : 'layouts.app')

@section('content')
    <div class="container body-min-height">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-light background-dark">
            <div class="container">
                <div class="page-title">
                    <h1>Contact Us</h1>
                    <span>If you have any inquiries, please send them by entering the information below</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <hr>
        <!-- Content -->
        <section id="page-content" class="dark">
            <div class="container">
                <div class="col-lg-8 text-light">
                    <form class="widget-contact-form" data-success-message-delay="40000" novalidate action="include/contact-form.php" role="form" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" aria-required="true" name="widget-contact-form-name" required class="form-control input-dark-bg text-light required name" placeholder="Enter your Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" aria-required="true" name="widget-contact-form-email" required class="form-control input-dark-bg text-light required email" placeholder="Enter your Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="subject">Your Subject</label>
                                <input type="text" name="widget-contact-form-subject" required class="form-control input-dark-bg text-light required" placeholder="Subject...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea type="text" name="widget-contact-form-message" required rows="5" class="form-control input-dark-bg text-light required" placeholder="Enter your Message"></textarea>
                        </div>
                        <div class="form-group">
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            <div class="g-recaptcha" data-sitekey="6LddCxAUAAAAAKOg0-U6IprqOZ7vTfiMNSyQT2-M"></div>
                        </div>
                        <button class="btn btn-primary" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection