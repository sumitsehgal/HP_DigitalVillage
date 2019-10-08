@extends('layouts.front')


@section('content')
<style>
div#login-admin-msg-div {
    color: red;
    font-weight: bold;
}
</style>
<!-- about -->
<div class="about" id="about">
	<div class="container">
		<h2 class="heading">About Us</h2>
		<div class="col-md-7 aboutleft">
			<font size="4" color="blue">This advance platform delivers e-learning content curated for our students</font>
			
			<p><i>HPE’s digital classroom solutions provide an environment that supports learner‐centric pedagogies, integrated curriculum and multiple assessment approach. It allows for an interactive and stimulating learning experience through collaborative and personal learning settings in virtual and physical learning spaces.</i> </p>
			<div class="more">
				<a href="#" class="hvr-shutter-in-vertical" data-toggle="modal" data-target="#">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
			</div>
		</div>
		<div class="col-md-5 aboutright">
			<div class="sreen-gallery-cursual">
				<div id="owl-demo" class="owl-carousel">
					<div class="item-owl">
					    <div class="test-review">
							<div class="img-agile">
								<img src="/assets/front/images/a1.jpg" class="img-responsive" alt=""/>
							</div>
					    </div>
					</div>
					<div class="item-owl">
					    <div class="test-review">
							<div class="img-agile">
								<img src="/assets/front/images/a2.jpg" class="img-responsive" alt=""/>
							</div>
						</div>
					</div>
					<div class="item-owl">
					    <div class="test-review">
							<div class="img-agile">
								<img src="/assets/front/images/a3.jpg" class="img-responsive" alt=""/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- about-agileits -->
<!-- Stats -->
	<div class="stats-agileits" id="stats">
	<div class="container">
		<h3 class="heading-agileinfo white-w3ls">We Have Something To Be Proud Of<span class="black-w3ls">Our Students, Teachers and Followers.</span></h3>
	</div>
		<div class="stats-info agileits w3layouts">
		<div class="container">
			<div class="col-md-3 agileits w3layouts col-sm-6 stats-grid stats-grid-1">
				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='<?php echo $student;?>' data-delay='3' data-increment="2"><?php echo $student;?></div>
				<div class="stat-info-w3ls">
					<h4 class="agileits w3layouts">Students Enrolled</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 agileits w3layouts stats-grid stats-grid-2">
				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='<?php echo $centerhead;?>' data-delay='3' data-increment="2"><?php echo $centerhead;?></div>
				<div class="stat-info-w3ls">
					<h4 class="agileits w3layouts">Total Classroom</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 stats-grid agileits w3layouts stats-grid-3">
				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='89' data-delay='3' data-increment="2">89</div>
				<div class="stat-info-w3ls">
					<h4 class="agileits w3layouts">Foreign Followers</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 stats-grid stats-grid-4 agileits w3layouts">
				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='28' data-delay='3' data-increment="2">28</div>
				<div class="stat-info-w3ls">
					<h4 class="agileits w3layouts">Available Courses</h4>
				</div>
			</div>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //Stats -->
<!--Events --> 
		<div class="events-agileits-w3layouts">
		<h3 class="heading-agileinfo">  Pinups<span>Event snaps to feed your brain.</span></h3>
		
				<div class="popular-grids">
					<div class="col-md-3 popular-grid">
						<img src="/assets/front/images/a1.jpg" class="img-responsive" alt=""/>
						<div class="popular-text">
							<h5><a href="#" data-toggle="modal" data-target="#myModal2">PRATHAM</a></h5>
							
						</div>
					</div>
					<div class="col-md-3 popular-grid">
						<img src="/assets/front/images/a2.jpg" class="img-responsive" alt=""/>
						<div class="popular-text">
							<h5><a href="#" data-toggle="modal" data-target="#myModal3">RANCHI POLYTECHNIC COLLEGE</a></h5>
							
						</div>
					</div>
					<div class="col-md-3 popular-grid">
						<img src="/assets/front/images/a3.jpg" class="img-responsive" alt=""/>
						<div class="popular-text">
							<h5><a href="#" data-toggle="modal" data-target="#myModal4">NASSCOM JAIPUR</a></h5>
							
						</div>
					</div>
					<div class="col-md-3 popular-grid">
						<img src="/assets/front/images/a4.jpg" class="img-responsive" alt=""/>
						<div class="popular-text">
							<h5><a href="#" data-toggle="modal" data-target="#myModal5">NASSCOM MUMBAI</a></h5>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
		</div>
<!-- //Events --> 
<!--testimonials-->
<div id="testimonials" class="testimonials">
	<div class="container">
		<h3 class="heading-agileinfo">What Our Students Say<span>HPE Digital Classrooms:Stage to excel </span></h3>
		<div class="flex-slider">
			<ul id="flexiselDemo1">			
				<li>
					<div class="laptop">
						<div class="col-md-8 team-right">
							<p>Educators  create opportunities for students to take a more active roles.</p>
							<div class="name-w3ls">
								<h5>Sakshi</h5>
								<span>student</span>
							</div>
						</div>
						<div class="col-md-4 team-left">
							<img class="img-responsive" src="/assets/front/images/test1.jpg" alt=" " />
						</div>
						<div class="clearfix"></div>
					</div>
				</li>
				<li>
					<div class="laptop">
						<div class="col-md-8 team-right">
							<p>It's a well structured course which helps us to understand things very effectively.</p>
							<div class="name-w3ls">
								<h5>Rahul</h5>
								<span>student</span>
							</div>
						</div>
						<div class="col-md-4 team-left">
							<img class="img-responsive" src="/assets/front/images/test2.jpg" alt=" " />
						</div>
						<div class="clearfix"></div>
					</div>
				</li>
			</ul>
			
		</div>

	</div>
</div>
<!--//testimonials-->
<!-- footer -->

@endsection