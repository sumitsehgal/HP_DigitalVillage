@extends('layouts.front')


@section('content')

<div class="contact-page-w3ls inner-padding" style="background-color: #3FA982; ">
	<div class="container">
		<h3 class="heading-agileinfo">Contact Us<span style="color: #fff;">Welcome To Our Classrooms. We Are Glad To Have You Around.</span></h3>

		<div class="row">
			<div class="col-md-6">
				<div class="address">
					<h4>Address:</h4>
					<p>#1687-A,Sector-82,JLPL,Industrial Park,
						Mohali,Punjab-140306,India</p>
				</div>
				<div class="phone">
					<h4>Phone Number:</h4>
					<p>18001201687</p>
				</div>

				<div class="email">
					<h4>Email:</h4>
					<a href="mailto:Customersupporthpedc@clarity-medical.com" style="color:#000;">Customersupporthpedc@clarity-medical.com</a>
				</div>

				<div class="email">
					<h4>Contact Here:</h4>
					<a style="color:#000;" href="http://hpedigitalclassroom.com/contact_us">Contact &gt;&gt;</a>
				</div>



			</div>

			<div class="col-md-6">

				<div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="700" id="gmap_canvas" src="https://maps.google.com/maps?q=INDIA&t=&z=5&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:700px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:700px;width:600px;}</style></div>



			</div>


		</div>




	</div>
</div>

<style type="text/css">
	.address {
    padding: 50px;
    font-weight: bold;
    padding-top: 0;
}

.phone, .email {
    padding: 50px;
    font-weight: bold;
    /*padding-top: 0;*/
}
.contact-right-w3layouts {
    width: 100%;
    float: none;
    margin: auto;
}
.contact-page-w3ls iframe {
    width: 100%;
    height: 56em;
    border: none;
    margin-bottom: 2em;
}
</style>





<!-- Mail Us inner -->
<div class="contact-page-w3ls inner-padding">
	<div class="container">
		<h3 class="heading-agileinfo">Mail Us<span>HPe Digital Classrooms</span></h3>

		<div class="contact-info-w3ls">
			
			<div class="contact-right-w3layouts">
				<h5 class="title-w3">We Would Love To Hear From You!</h5>
				<p class="head-w3-agileits">If you have any questions, please call us or fill in the form below and we will get back to you very soon.</p>
				<form action="/post_contact_us" method="post">
                    @csrf
					<input type="text" placeholder="YOUR NAME" name="name" required="">
					<input type="email" placeholder="YOUR EMAIL" name="email" required="">
					<input type="text"  placeholder="YOUR PHONE NUMBER" name="phone" required="">
					<textarea  placeholder="YOUR MESSAGE" name="message" required=""></textarea>
					<input type="submit" value="Send Message">
				</form>
			</div>

			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //Mail Us inner -->


@endsection