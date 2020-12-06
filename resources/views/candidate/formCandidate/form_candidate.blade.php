<div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label textR">Full name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{ $errors->has('full_name') ? 'border-danger' : '' }}"
                   name="full_name" value="{{ isset($candidate) ? $candidate->full_name : '' }}">
            @error('full_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label textR" for="date" >Birthday</label>
        <div class="col-sm-10">
            <input type="date" class="form-control {{ $errors->has('birthday') ? 'border-danger' : '' }}"
                   name="birthday" value="{{isset($candidate) ?$candidate->birthday : ''}}">
            @error('birthday')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label textR">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}"
                   name="email" value="{{ isset($candidate) ? $candidate->email : '' }}">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label textR">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}"
                   name="password" placeholder="Password">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label textR">Password Confirm</label>
        <div class="col-sm-10">
            <input type="password"
                   class="form-control {{ $errors->has('password_confirmation') ? 'border-danger' : '' }}"
                   name="password_confirmation" placeholder="Password">
            @error('password_confirmation')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label textR">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{ $errors->has('user_name') ? 'border-danger' : '' }}"
                   name="user_name" value="{{ isset($candidate) ?$candidate->user_name : '' }}">
            @error('user_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label textR">Phone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{ $errors->has('phone') ? 'border-danger' : '' }}"
                   name="phone" placeholder="Number" value="{{ isset($candidate) ? $candidate->phone : '' }}">
            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label textR">Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{ $errors->has('address') ? 'border-danger' : '' }}"
                   name="address" placeholder="Address" value="{{ isset($candidate) ?$candidate->address:'' }}">
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="radio-inline col-sm-2 col-form-label textR">
            <input type="radio" name="status" value="1" checked>Admin
        </label>
        <label class="radio-inline col-sm-2 col-form-label textR">
            <input type="radio" name="status" value="2">Member
        </label>
    </div>
    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
