@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">List of Center</h1>
            </div><!-- /.col -->
            
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<div class="content">
    <div class="container-fluid">

    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Centers</h3>
                <h3 class="card-title" style="float:right;"><a href="/centers/create" class="btn btn-primary">Add New</a></h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->

                    <div class="input-group-append">
                      <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
              @include('partials.flash')
              <br/>
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Login ID</th>
                      <th>Phone</th>
                      <th>City</th>
                      <th>Partner</th>
                      <th>Status</th>
                      <th>Students</th>
                      <th colspan="3">Action</th>
                    </tr>
                  </thead>
                  <tbody style="font-size:0.93rem;">
                        @forelse($centers as $center)
                            <tr  class="@if($center->is_active == 0) bg-danger @else tr-class  @endif " >
                            <td>{{ ($centers->currentpage()-1) * $centers->perpage() + $loop->index + 1 }}</td>        
                                <td>{{$center->name()}}</td>    
                                <td>{{$center->username}}</td>        
                                <td>{{$center->phone}}</td>    
                                <td>{{$center->city}}</td>    
                                <td>{{$center->partners}}</td> 
                                <td>{{$center->getStatus()}}</td>   
                                <td>{{$center->children->count()}}</td>    
                                <td><a href="/centers/{{$center->id}}/edit">Edit</a></td>    
                                <td>
                                  <a href="javascript:void(0);" class="delete-btn">Delete</a>
                                    <form action="/centers/{{$center->id}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                    </form>
                              </td>   
                                <td><a href="/user/{{$center->id}}/password">Password</a></td>     
                            <tr>
                        @empty
                            <tr>
                                <td colspan="11">No Center</td>
                            </tr>
                        @endforelse
                  </tbody>
                </table>
               <br/>
                {{ $centers->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

    </div>
</div>


@endsection