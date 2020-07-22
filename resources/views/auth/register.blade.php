
 @extends('admin.layouts.master')
 @section('title','Register')
 @section('content')
 <div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        অ্যাকাউন্ট তৈরি  
                    </h6>
                    <div class="element-box">
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								আপনার অ্যাকাউন্ট তৈরি করুন 
                            </h5>
                            <div class="form-group">                            
                                <div class="col-sm-4 offset-md-4">
                                    <label for="username">ইউজার নাম প্রদান করুন</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus id="username" placeholder="ইউজার নাম">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">                            
                                <div class="col-sm-4 offset-md-4">
                                    <label for="email">ইমেইল  প্রদান করুন</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required id="email" placeholder="ইমেইল">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">                            
                                <div class="col-sm-4 offset-md-4">
                                    <label for="email">পাসওয়ার্ড প্রদান করুন</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required id="password" placeholder="পাসওয়ার্ড">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
							</div>
                            <div class="form-buttons-w text-center">
                                <button class="btn btn-primary" type="submit"> রেজিস্ট্রার করুণ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
