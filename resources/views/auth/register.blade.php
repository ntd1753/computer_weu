@extends('layouts.app')

@section('content')
    <div class="my-10 text-base container mx-auto">
        <div class="hidden">
            <h1 class="title-head">Đăng nhập tài khoản</h1>
        </div>
        <div class="flex items-center container m-auto sm:w-full lg:w-2/5">
            <div class="w-full">
                <div class="page-login shadow-lg w-full ">
                    <div id="login" class="grid">
                        <div class="col-lg-12 col-md-12 account-content order-lg-last order-md-last order-sm-first order-first ">
                            <div class="grid grid-cols-2 w-full text-center h-12 border-b-[1px]" >
                                <div class="active m-auto w-full grid grid-cols-1 items-center h-full border-r-[1px]">
                                    <div class="m-auto">
                                        <a href="{{ route('auth.login') }}" class="text-[#999]">Đăng nhập</a>
                                    </div>
                                </div>
                                <div class="m-auto">
                                    <a href="{{ route('auth.register') }}" class=" font-medium">Đăng ký</a>
                                </div>
                            </div>
                            <div id="nd-login">
                                <form method="POST" action="{{ route('auth.register.store') }}" id="customer_login" class="mt-6 p-5">
                                    @csrf
                                    <div class="form-signup grid grid-cols-1 ">
                                        <div class="w-full my-2.5">
                                            <label for="name" class="block my-1.5 font-bold">Họ và tên <span class="required text-red-600">*</span></label>
                                            <input id="name" type="text" class="border-solid border-2  w-full valid border-gray-300 py-2 px-4 rounded-xl @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-signup grid grid-cols-1 ">
                                        <div class="w-full my-2.5">
                                            <label class="block my-1.5 font-bold">Email  <span class="required text-red-600">*</span></label>
                                            <input placeholder="Nhập Địa chỉ Email" type="email" class="border-solid border-2  w-full valid border-gray-300 py-2 px-4 rounded-xl @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus name="email" id="customer_email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="w-full my-2.5">
                                            <label class="block my-1.5 font-bold">Mật khẩu <span class="required text-red-600">*</span></label>
                                            <input placeholder="Nhập Mật khẩu" type="password" class="border-solid border-2 w-full valid border-gray-300 py-2 px-4 rounded-xl	@error('password') is-invalid @enderror " value="" name="password" id="customer_password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="w-full my-2.5">
                                            <label for="password-confirm" class="block my-1.5 font-bold">Nhập lại mật khẩu <span class="required text-red-600">*</span></label>
                                            <input id="password-confirm" type="password" class="border-solid border-2 w-full valid border-gray-300 py-2 px-4 rounded-xl" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="text-center w-full bg-[#2c3e50] hover:bg-[#27ae60] font-bold text-white rounded-xl">
                                            <button class="btn btn-style btn-blues px-4 py-2 rounded-xl w-full" type="submit" value="Đăng nhập">Đăng ký</button>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm text-center text-[#999] mt-2.5 ">

                                        </p>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
