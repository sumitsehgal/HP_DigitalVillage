<div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Center Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{old('first_name') ?? $center->first_name}}" >
                        <p style="color:red;font-weight:bold;">@error('first_name') {{$message}}  @enderror</p>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{old('email') ?? $center->email }}" >
                            <p style="color:red;font-weight:bold;">@error('email') {{$message}}  @enderror</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username') ?? $center->username }}" >
                            <p style="color:red;font-weight:bold;">@error('username') {{$message}}  @enderror</p>
                        </div>
                    </div>
                  </div>

                  @if(empty($center->id))
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" />
                                <p style="color:red;font-weight:bold;">@error('password') {{$message}}  @enderror</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" />
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Select Partner</label>
                            <select class="form-control" name="partners">
                                @if(!empty($partners))
                                    @foreach($partners as $partner)
                                        <option value="{{$partner->partners}}" @if(strtolower($partner->partners) == strtolower($center->partners)) selected="selected"  @endif  >  {{$partner->partners}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                  <hr/>

                  <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label>Address</label>
                              <textarea class="form-control" name="address" >{{old('address') ?? $center->address }}</textarea>
                          </div>
                      </div>

                      <div class="col-sm-4">
                          <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" name="city" value="{{old('city') ?? $center->city }}" />
                          </div>
                      </div>


                      <div class="col-sm-4">
                          <div class="form-group">
                              <label>District</label>
                              <input type="text" class="form-control" name="district" value="{{old('district') ?? $center->district }}" />
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">State</label>
                            <input type="text" class="form-control" name="state" value="{{old('state') ?? $center->state }}" />
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Pincode</label>
                            <input type="text" class="form-control" name="pincode" value="{{old('pincode') ?? $center->pincode}}" />
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{old('phone') ?? $center->phone }}" />
                        </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Latitude</label>
                              <input type="text" class="form-control" name="latitude" value="{{old('latitude') ?? $center->latitude}}" />
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Longitude</label>
                              <input type="text" class="form-control" name="longitude" value="{{old('longitude') ?? $center->longitude }}" />
                          </div>
                      </div>
                      <a href="https://www.latlong.net/" style="text-align:center;width:100%;" target="_blank">Find your Latitude and Longitude</a>
                  </div>

                  <hr/>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="is_active">
                                <option value="1" @if(old('is_active') == "1" || $center->is_active == "1" )  selected="selected"  @endif >Active</option>
                                <option value="0" @if(old('is_active') == "0" || $center->is_active == "0" )  selected="selected"  @endif>InActive</option>
                            </select>
                          </div>
                      </div>
                  </div>