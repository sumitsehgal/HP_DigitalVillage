@extends('layouts.front')

@section('content')


<div class="container-fluid">
    <div class="blocks container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-6">
                <center>
                    <a href="/hp_videobook">
                        <img src="/assets/front/images/hpbook.jpg" class="img-responsive">
                        <h4>HP Videobook</h4>
                    </a>
                </center>
            </div>
            <div class="col-md-6">
                <center>
                    <a target="_blank" href="https://hplife.edcastcloud.com/users/sign_in">
                        <img src="/assets/front/images/hplife.jpg" class="img-responsive">
                        <h4>HP Life</h4>
                    </a>
                </center>
            </div>
        </div>
    </div>
    <!--//blocks -->
    <!--//pills -->
    <div class="books container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">All Posts</div>
                </div>
                <div class="panel panel-default second">
                    <div class="panel-heading">
                        No data available in the table
	                    <ul class="pager">
                            <li><a href="#">Previous</a></li>
                            <li><a href="#">Next</a></li>
                        </ul> 
	                </div>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="nav nav-pills nav-stacked">
                    <li class=""><a href="/popular_tags"> <i class="fa fa-tag"></i>Popular Tags</a></li>
                </ul>
                <ul class="nav nav-pills nav-stacked">
                    <li class=""><a href="/popular_posts"> <i class="fa fa-comments-o"></i>Popular Posts</a></li>
                </ul>
                <ul class="nav nav-pills nav-stacked">
                    <li class=""><a href="/categories"> <i class="fa fa-anchor"></i>Categories</a></li>
                </ul>
            </div>
        </div>
    </div>
<!--//pills -->
</div>


@endsection