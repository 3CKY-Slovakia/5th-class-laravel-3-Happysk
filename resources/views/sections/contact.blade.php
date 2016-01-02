<!-- Contact Section -->
<section id="contact" class="relative contact">

    <div class="grayscale-bg absolute background41 parallax9 xdark-bg"></div>

    <!-- Inner -->
    <div class="inner t-center clearfix no-black-white animated" data-animation="fadeIn" data-animation-delay="800">
        <!-- Header -->
        <h1 class="header header-style-1 white raleway uppercase t-center ">
            Get in Touch With Us!
        </h1>
        <!-- Header Text -->
        <p class="light t-center">
            There are many variations of passages of Lorem Ipsum available.
        </p>

        <!-- Address and Form -->
        <div class="fullwidth clearfix">

            <!-- Address -->
            <div class="address f-left t-left">

                <!-- Address Header -->
                <div class="address_head">
                    <!-- Header -->
                    <h3>
                        Visit Our Office
                    </h3>
                </div>
                <!-- End Address Header -->


                <!-- Address Box -->
                <a href="tel:0123456789" class="box light hover">
                    <!-- Icon -->
                    <div class="icon">
                        <!-- Icon SRC -->
                        <i class="fa fa-phone colored"></i>
                    </div>
                    <!-- Details -->
                    <div class="details">
                        <h4>
                            Phone
                        </h4>
                        <p>
                            0123 456 789 - 0123 456 788
                        </p>
                    </div>
                    <!-- Right Secret Button -->
                    <div class="button">
                        <img src="{{ asset('/images/plus.png') }}" alt="Crexis Plus">
                    </div>
                </a>
                <!-- End Box -->


                <!-- Address Box -->
                <a href="mailto:info@3cky.sk" class="box light hover">
                    <!-- Icon -->
                    <div class="icon">
                        <!-- Icon SRC -->
                        <i class="fa fa-envelope colored"></i>
                    </div>
                    <!-- Details -->
                    <div class="details">
                        <h4>
                            E-Mail;
                        </h4>
                        <p>
                            info@3cky.sk
                        </p>
                    </div>
                    <!-- Right Secret Button -->
                    <div class="button">
                        <img src="{{ asset('/images/plus.png') }}" alt="Crexis Plus">
                    </div>
                </a>
                <!-- End Box -->


                <!-- Address Box -->
                <a href="#map" class="box light hover scroll">
                    <!-- Icon -->
                    <div class="icon">
                        <!-- Icon SRC -->
                        <i class="fa fa-map-marker colored"></i>
                    </div>
                    <!-- Details -->
                    <div class="details">
                        <h4>
                            Address;
                        </h4>
                        <p>
                            Tupeho 23/A, 831 01, Bratislava
                        </p>
                    </div>
                    <!-- Right Secret Button -->
                    <div class="button">
                        <img src="{{ asset('/images/plus.png') }}" alt="Crexis Plus">
                    </div>
                </a>
                <!-- End Box -->


                <!-- Address Box -->
                <a class="box light">
                    <!-- Details -->
                    <div class="address-note">
                        <h4>
                            Get In Touch
                        </h4>
                        <p>
                            Contrary to popular belief, Lorem Ipsum.
                        </p>
                    </div>
                </a>
                <!-- End Box -->

                <!-- Address Box -->
                <div class="socials">

                    <!-- Social Button -->
                    <a href="#" class="facebook">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <!-- Social Button -->
                    <a href="#" class="twitter">
                        <i class="fa fa-twitter"></i>
                    </a>

                    <!-- Social Button -->
                    <a href="#" class="pinterest">
                        <i class="fa fa-pinterest"></i>
                    </a>

                    <!-- Social Button -->
                    <a href="#" class="linkedin">
                        <i class="fa fa-linkedin"></i>
                    </a>

                </div>
                <!-- End Box -->

            </div>
            <!-- End Address -->

            <!-- Contact Form -->
            <div class="contact_form f-right">
                <!-- Form -->
	            <form action="/contact" method="post">
		            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
		            <div class="row control-group">
			            <div class="form-group col-xs-12">
				            <label for="name">Name</label>
				            <input type="text" class="form-control" id="name" name="name"
				                   value="{{ old('name') }}">
			            </div>
		            </div>
		            <div class="row control-group">
			            <div class="form-group col-xs-12">
				            <label for="email">Email Address</label>
				            <input type="email" class="form-control" id="email" name="email"
				                   value="{{ old('email') }}">
			            </div>
		            </div>
		            <div class="row control-group">
			            <div class="form-group col-xs-12 controls">
				            <label for="subject">Subject</label>
				            <input type="text" class="form-control" id="suject" name="subject"
				                   value="{{ old('subject') }}">
			            </div>
		            </div>
		            <div class="row control-group">
			            <div class="form-group col-xs-12 controls">
				            <label for="message">Message</label>
              <textarea rows="5" class="form-control" id="message"
                        name="message">{{ old('message') }}</textarea>
			            </div>
		            </div>
		            <br>
		            <div class="row">
			            <div class="form-group col-xs-12">
				            <button type="submit" class="btn btn-default">Send</button>
			            </div>
		            </div>
	            </form>                <!-- End Form -->
            </div>
            <!-- End Contact Form -->
        </div>
        <!-- End Contact, Address Area -->
    </div>
    <!-- End Inner -->
</section>
<!-- End Contact Section -->