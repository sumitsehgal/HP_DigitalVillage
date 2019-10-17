@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
          <h2>Welcome {{Auth::user()->name()}}</h2>
      </div>


    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>



<div class="content">
      <div class="container-fluid">
        @if(Auth::user()->isAdmin())
        <div class="row">
          <div class="col-md-7"></div>
          <div class="col-md-5">
            <label>Select Partner</label>
            <select class="form-control select-partner">
                  <option value="all">All</option>
              @if(!empty($partners))
                @foreach($partners as $partner)
                    <option value="{{$partner->partners}}">{{$partner->partners}}</option>
                @endforeach
              @endif
            </select>
          </div>
        </div>
        @endif

        <!-- Other Stat -->

        <div class="row">
        @if(( Auth::user()->isAdmin() || Auth::user()->isCenter()) && $studentCollectiveData->isNotEmpty() )
          <div class="col-md-3 col-sm-6 col-12">
            @foreach($studentCollectiveData as $dt)
              <div class="info-box" style="display:none !important;">
                <span class="info-box-icon @if($dt->is_active == 0) bg-danger @else bg-success @endif""><i class="far fa-user"></i></span>
                <div class="info-box-content">
                  <span class="info-box-number">{{$dt->getStatus()}} Students</span>
                  <span class="info-box-text">{{$dt->total}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              @endforeach
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3 id="total-students">{{$studentCollectiveData->sum('total')}}</h3>
                  <p>Number of Students</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="javascript:void(0);" class="small-box-footer">
                @foreach($studentCollectiveData as $dt) <span style="display:block;"><b>{{$dt->getStatus()}} </b><span id="{{$dt->getStatus()}}Student">({{$dt->total}}) </span> </span> @endforeach
                </a>
              </div>
              
          </div>
          @elseif(Auth::user()->isStudent())
          <h3>Coming Soon</h3>
          @endif
          <!-- /.col -->
            @if(Auth::user()->isAdmin())
              <div class="col-md-3 col-sm-6 col-12">
              @foreach($centerCollectiveData as $dt)
                <div class="info-box" style="display:none !important;">
                  <span class="info-box-icon @if($dt->is_active == 0) bg-danger @else bg-success @endif"><i class="far fa-flag"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-number">{{$dt->getStatus()}} Centers</span>
                    <span class="info-box-text">{{$dt->total}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                @endforeach
                <div class="small-box bg-sweet">
                  <div class="inner">
                    <h3 id="total-centers">{{$centerCollectiveData->sum('total')}}</h3>
                    <p>Total Classrooms</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-home"></i>
                  </div>
                  <a href="javascript:void(0);" class="small-box-footer">
                  @foreach($centerCollectiveData as $dt) <span style="display:block;"><b>{{$dt->getStatus()}} </b><span id="{{$dt->getStatus()}}Center">({{$dt->total}}) </span> </span> @endforeach
                  </a>
                </div>

              </div>
            @endif
          <!-- /.col -->
          @if(Auth::user()->isAdmin() || Auth::user()->isCenter())
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box" style="display:none !important;">
              <span class="info-box-icon bg-warning"><i class="far fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">Total Students</span>
                <span class="info-box-text">
                  {{$studentCollectiveData->sum('total')}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            @endif
            @if(Auth::user()->isAdmin())
            <div class="info-box" style="display:none !important;">
              <span class="info-box-icon bg-warning"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">Total Centers</span>
                <span class="info-box-text">{{$centerCollectiveData->sum('total')}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          @endif

          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12" style="visibility:hidden;">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">93,139</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>



        <!-- End other stat -->



        <div class="row">
            @if(Auth::user()->isAdmin())
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Center-Student</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                  
                    </div>
                <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <canvas id="sales-chart" height="250"></canvas>
                  </div>
                </div>
              </div>
            <!-- /.card -->
          </div>
          @elseif(Auth::user()->isCenter())
            <div class="col-lg-4">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Active-InActive Students</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                  
                    </div>
                <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <canvas id="active-inactive" height="250"></canvas>
                  </div>
                </div>
              </div>
            <!-- /.card -->
          </div>


          <div class="col-lg-4">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Male-Female Students</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                  
                    </div>
                <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <canvas id="male-female" height="250"></canvas>
                  </div>
                </div>
              </div>
            <!-- /.card -->
          </div>



          <div class="col-lg-4" style="display:none;">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Marriage Status Stat</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                  
                    </div>
                <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <canvas id="martial-status" height="250"></canvas>
                  </div>
                </div>
              </div>
            <!-- /.card -->
          </div>


          @endif
        </div>







        <div class="row">
          <div class="col-lg-6">
            <div class="card" style="display:none;">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Online Store Visitors</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart1" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->
            
            @if(Auth::user()->isAdmin())
            <div class="card" >
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Male Female</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <!-- <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p> -->
                  <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <!-- <span class="mr-2">
                    <i class="fas fa-square text-primary" style="color:rgba(0, 100, 255, .8) !important;"></i> Student Registration
                  </span> -->

                  <!-- <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span> -->
                </div>
              </div>
          </div>
          @endif



            <!-- /.card -->
          </div>

          
          <!-- /.col-md-6 -->
          <div class="col-lg-6" >

          @if($students->isNotEmpty())
            <div class="card" style="display:none;">
              <div class="card-header border-0">
                <h3 class="card-title">Recently Added User</h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Login Id</th>
                    <th>Center</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($students as $student)
                  <tr>
                    <td>
                      {{$loop->iteration}}
                    </td>
                    <td>{{$student->name()}}</td>
                    <td>
                      {{$student->username}}
                    </td>
                    <td>
                      {{$student->parent->name()}}
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @endif
          
          </div>
          <!-- /.col-md-6 -->


        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
@endsection
