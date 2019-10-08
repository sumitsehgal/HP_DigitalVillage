@extends('layouts.front')

@section('content')

<div class="container inner-padding">
<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h3 class="heading-agileinfo">FAQ<span>Questions in your mind</span></h3>
					
					
				</div>			 		
			</div> 


  

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Q) How can I contact www.hpedigitalclassroom.com?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                   You can either call us on 18001201687 (9:30 am to 5:30 pm) and speak with our customer service representative or write to us at Customersupporthpedc@clarity-medical.com for any queries about hpedigitalclassroom.com.
                </div>
            </div>
        </div>
		
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Q) I live outside India, can I order be a part of it?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                    Contact customer care regarding this query.       </div>
            </div>
        </div>


		
		<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsetwelve12">Q)	What is HPe Digital Classrooms? </a>
                </h4>
            </div>
            <div id="collapsetwelve12" class="panel-collapse collapse">
                <div class="panel-body">
               HPE’s digital classroom solutions provide an environment that supports learner centric pedagogies, integrated curriculum and multiple assessment approach. It allows for an interactive and stimulating learning experience through collaborative and personal learning settings in virtual and physical learning spaces.
                </div>
            </div>
        </div>
		
		<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsethirteen13">Q)	How this program and HPe Digital Classrooms works? </a>
                </h4>
            </div>
            <div id="collapsethirteen13" class="panel-collapse collapse">
                <div class="panel-body">
              It's a live environment class provided to students.
                </div>
            </div>
        </div>
 </div>

		
		
<style>
    .faqHeader {
        font-size: 27px;
        margin: 20px;
    }

    .panel-heading [data-toggle="collapse"]:after {
        font-family: 'Glyphicons Halflings';
        color: #F58723;
        font-size: 18px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
</style>		
		
		
</div>


@endsection