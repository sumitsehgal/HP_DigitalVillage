<div class="row">
    <div class="col-sm-4">
        <!-- text input -->
        <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{old('first_name') ?? $student->first_name}}" >
        <p style="color:red;font-weight:bold;">@error('first_name') {{$message}}  @enderror</p>
        </div>
    </div>

    <div class="col-sm-4">
        <!-- text input -->
        <div class="form-group">
        <label>Middle Name</label>
        <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{old('middle_name') ?? $student->middle_name}}" >
        </div>
    </div>

    <div class="col-sm-4">
        <!-- text input -->
        <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{old('last_name') ?? $student->last_name}}" >
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{old('email') ?? $student->email }}" >
            <p style="color:red;font-weight:bold;">@error('email') {{$message}}  @enderror</p>
        </div>
    </div>
<div class="col-sm-6">
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username') ?? $student->username }}" >
        <p style="color:red;font-weight:bold;">@error('username') {{$message}}  @enderror</p>
    </div>
</div>
</div>

@if(empty($student->id))
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
            <label for="">Upload Profile Image</label>
            <input type="file" name="avatarfile" class="form-control avatar" accept="image/x-png,image/gif,image/jpeg" />
        </div>
    </div>
    @if(!empty($student->id))
        <div class="col-sm-6">
            @if(!empty($student->avatar))
                <img src="{{ Storage::url($student->avatar) }}" height="200" width="200" class="img-responsive img-thumbnail" />  
                <input type="hidden" value="{{$student->avatar}}" name="avatar" />
            @else
                @if($student->gender == "Female")
                    <img src="{{ Storage::url('public/female.png') }}" height="200" width="200" class="img-responsive img-thumbnail" />  
                @else
                    <img src="{{ Storage::url('public/male.jpg') }}" height="200" width="200" class="img-responsive img-thumbnail" />  
                @endif
            @endif
        </div>
    @endif

</div>


<hr/>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Father Name</label>
            <input type="text" class="form-control" name="father_name" value="{{old('father_name') ?? $student->father_name }}" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Mother Name</label>
            <input type="text" class="form-control" name="mother_name" value="{{old('mother_name') ?? $student->mother_name }}" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="text" class="form-control datepicker" name="date_of_birth" value="{{old('date_of_birth') ?? $student->date_of_birth }}" autocomplete="off" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender">
                <option value="Male" @if(old('gender') == 'Male' || $student->gender == 'Male') selected="selected"  @endif > Male</option>
                <option value="Female" @if(old('gender') == 'Male' || $student->gender == 'Female') selected="selected"  @endif> Female</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Blood Group</label>
            <select class="form-control" name="blood_group">
                <option value="A+" @if(old('blood_group') == 'A+' || $student->blood_group == 'A+') selected="selected"  @endif > A+</option>
                <option value="A-" @if(old('blood_group') == 'A-' || $student->blood_group == 'A-') selected="selected"  @endif > A-</option>
                <option value="B+" @if(old('blood_group') == 'B+' || $student->blood_group == 'B+') selected="selected"  @endif > B+</option>
                <option value="B-" @if(old('blood_group') == 'B-' || $student->blood_group == 'B-') selected="selected"  @endif > B-</option>
                <option value="AB+" @if(old('blood_group') == 'AB+' || $student->blood_group == 'AB+') selected="selected"  @endif > AB+</option>
                <option value="AB-" @if(old('blood_group') == 'AB-' || $student->blood_group == 'AB-') selected="selected"  @endif > AB-</option>
                <option value="O+" @if(old('blood_group') == 'O+' || $student->blood_group == 'O+') selected="selected"  @endif > O+</option>
                <option value="O-" @if(old('blood_group') == 'O-' || $student->blood_group == 'O-') selected="selected"  @endif > O-</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Religion</label>
            <input type="text" class="form-control" name="religion" value="{{old('religion') ?? $student->religion }}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Physical Disability</label>
            <select name="physical_disability" class="form-control">
                <option value="No" @if(old('physical_disability') == 'No' || $student->physical_disability == 'No') selected="selected"  @endif > No</option>
                <option value="Yes" @if(old('physical_disability') == 'Yes' || $student->physical_disability == 'Yes') selected="selected"  @endif > Yes</option>
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Marriage Status</label>
            <select name="martial_status" class="form-control">
                <option value="Single" @if(old('martial_status') == 'Single' || $student->martial_status == 'Single') selected="selected"  @endif > Single</option>
                <option value="Married" @if(old('martial_status') == 'Married' || $student->martial_status == 'Married') selected="selected"  @endif > Married</option>
                <option value="Divorced/Seperated" @if(old('martial_status') == 'Divorced/Seperated' || $student->martial_status == 'Divorced/Seperated') selected="selected"  @endif > Divorced/Seperated</option>
                <option value="Widow" @if(old('martial_status') == 'Widow' || $student->martial_status == 'Widow') selected="selected"  @endif > Divorced/Seperated</option>
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label>Education</label>
            <input type="text" class="form-control" name="education" value="{{old('education') ?? $student->education }}" />
        </div>
    </div>


</div>


<hr/>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="address" >{{old('address') ?? $student->address }}</textarea>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" name="city" value="{{old('city') ?? $student->city }}" />
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label>District</label>
            <input type="text" class="form-control" name="district" value="{{old('district') ?? $student->district }}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">State</label>
            <input type="text" class="form-control" name="state" value="{{old('state') ?? $student->state }}" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Pincode</label>
            <input type="text" class="form-control" name="pincode" value="{{old('pincode') ?? $student->pincode}}" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" class="form-control" name="phone" value="{{old('phone') ?? $student->phone }}" />
        </div>
    </div>
</div>

<hr/>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Proof Type</label>
            <select class="form-control" name="proof_type">
                <option value="Aadhar Card" @if(old('proof_type') == 'Aadhar Card' || $student->proof_type == 'Aadhar Card') selected="selected"  @endif >Aadhar Card</option>
                <option value="Voter card" @if(old('proof_type') == 'Voter card' || $student->proof_type == 'Voter card') selected="selected"  @endif >Voter card</option>
                <option value="Ration Card" @if(old('proof_type') == 'Ration Card' || $student->proof_type == 'Ration Card') selected="selected"  @endif >Ration Card</option>
                <option value="PAN Card" @if(old('proof_type') == 'PAN Card' || $student->proof_type == 'PAN Card') selected="selected"  @endif >PAN Card</option>
                <option value="License No" @if(old('proof_type') == 'License No' || $student->proof_type == 'License No') selected="selected"  @endif  >License No</option>
                <option value="Passport" @if(old('proof_type') == 'Passport' || $student->proof_type == 'Passport') selected="selected"  @endif >Passport</option>
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Proof ID</label>
            <input type="text" class="form-control" name="proof_identification" value="{{old('proof_identification') ?? $student->proof_identification }}" >
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="">BPL Card No (if any)</label>
            <input type="text" class="form-control" name="bpl_card" value="{{old('bpl_card') ?? $student->bpl_card }}" >
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Caste Category</label>
            <select class="form-control" name="caste_category">
                <option value="General" @if(old('caste_category') == 'General' || $student->caste_category == 'General') selected="selected"  @endif >General</option>
                <option value="OBC" @if(old('caste_category') == 'OBC' || $student->caste_category == 'OBC') selected="selected"  @endif >OBC</option>
                <option value="SC" @if(old('caste_category') == 'SC' || $student->caste_category == 'SC') selected="selected"  @endif >SC</option>
                <option value="ST" @if(old('caste_category') == 'ST' || $student->caste_category == 'ST') selected="selected"  @endif >ST</option>
                <option value="NT" @if(old('caste_category') == 'NT' || $student->caste_category == 'NT') selected="selected"  @endif  >NT</option>
                <option value="Minority" @if(old('caste_category') == 'Minority' || $student->caste_category == 'Minority') selected="selected"  @endif >Minority</option>
                <option value="VJNT" @if(old('caste_category') == 'VJNT' || $student->caste_category == 'VJNT') selected="selected"  @endif >VJNT</option>
                <option value="Others" @if(old('caste_category') == 'Others' || $student->caste_category == 'Others') selected="selected"  @endif >Others</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Residence Type</label>
            <select class="form-control" name="residence_type">
                <option value="Pakka Ghar" @if(old('residence_type') == 'Pakka Ghar' || $student->residence_type == 'Pakka Ghar') selected="selected"  @endif >Pakka Ghar</option>
                <option value="Kacha Ghar" @if(old('residence_type') == 'Kacha Ghar' || $student->residence_type == 'Kacha Ghar') selected="selected"  @endif >Kacha Ghar</option>
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Residence Information</label>
            <input type="text" class="form-control" name="residence" value="{{old('residence') ?? $student->residence }}" />
        </div>
    </div>

</div>

<hr/>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Account Number</label>
            <input type="text" class="form-control" name="account_no" value="{{old('account_no') ?? $student->account_no }}" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Bank Name</label>
            <input type="text" class="form-control" name="bank_name" value="{{old('bank_name') ?? $student->bank_name }}" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Bank IFSC</label>
            <input type="text" class="form-control" name="bank_ifsc" value="{{old('bank_ifsc') ?? $student->bank_ifsc }}" />
        </div>
    </div>
</div>


<hr/>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="is_active">
            <option value="1" @if(old('is_active') == "1" || $student->is_active == "1" )  selected="selected"  @endif >Active</option>
            <option value="0" @if(old('is_active') == "0" || $student->is_active == "0" )  selected="selected"  @endif>InActive</option>
        </select>
        </div>
    </div>
    @if(Auth::user()->isAdmin())
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Center Head</label>
                <select class="form-control" name="parent_id" required>
                    <option value="">Select a Center Head</option>
                    @forelse($centers as $center)
                        <option value="{{$center->id}}" @if(old('parent_id') == $center->id  || $student->parent_id == $center->id ) selected="selected"  @endif >{{$center->name()}}</option>
                    @empty

                    @endforelse
                </select>
            </div>
        </div>
    @endif
</div>