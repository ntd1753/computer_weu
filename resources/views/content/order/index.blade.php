@extends('layouts.app')
@section('content')
    <form action="#" method="POST" id="order-form" class="">
        <div class="lg:container mx-auto lg:grid lg:grid-cols-12 lg:gap-4 py-2.5">
            <div class="col-span-8 lg:p-7">
                <div id="check-out-side-bar" class="lg:hidden block col-span-4 ">
                    <div id="side-bar-header" class="text-xl font-semibold py-5 border-b-2 border-b-gray-200" >
                        <h2>Đơn Hàng(1 Sản phẩm)</h2>
                    </div>
                    <div id="side-bar-content" class="text-[#717171]">
                        <div class="max-h-[280px] overflow-y-auto  border-b-2 border-x-gray-200 py-3.5">
                            @php
                                $cartTotalPrice = 0;
                            @endphp
                            @foreach($cartItems as $cartItem)
                                @php
                                    $image = json_decode($cartItem->images);
                                    if ($cartItem->discount_type && $cartItem->discount_value){
                                        if ($cartItem->discount_type == \App\Models\Product::DISCOUNT_VND){
                                            $price = $cartItem->price - $cartItem->discount_value;
                                        }else{
                                            $price = $cartItem->price*(1-$cartItem->discount_value*0.01);
                                        }
                                    }else{
                                        $price = $cartItem->price;
                                    }
                                @endphp
                                <div id="product" class="grid grid-cols-12 pt-3.5 text-base">
                                    <div class="col-span-2 relative">
                                        <img class="w-[50px] h-[50px]"
                                             src="{{$image[0]}}" alt="{{$cartItem->name }}">
                                        <span id="product-quantity" class="absolute top-0 right-0 rounded-[21px] bg-red-600 text-white font-semibold  text-center text-[10px] w-5 h-5">
                                    {{$cartItem->quantity}}
                                </span>
                                    </div>
                                    <div class="col-span-7 pl-3.5 text-black">{{$cartItem->name}}</div>
                                    <div class="col-span-3 pt-3.5 text-sm text-[#717171]">{{ number_format($price, 0, ',', '.') }}đ</div>
                                </div>
                                @php
                                    $cartItemTotalPrice = $price * $cartItem->quantity;
                                    $cartTotalPrice += $cartItemTotalPrice;
                                @endphp
                            @endforeach
                        </div>
                        <div class="code-discount py-3.5 grid grid-cols-12 gap-4 p-1 border-b-2 border-b-gray-200">
                            <div class="col-span-8">
                                <input name="reductionCode"
                                       id="reductionCode"
                                       type="text"
                                       class="w-full rounded-[4px] h-full text-gray-800 " style="border: solid 1px #2c3e50"
                                       placeholder="Mã giảm giá"
                                >
                            </div>
                            <div class="col-span-4">
                                <button class="w-full h-full p-2.5 rounded-[5px] bg-[#646464] text-white"> Áp dụng</button>
                            </div>
                        </div>
                        <div class="price py-3.5 p-1">
                            <div class="border-b-2 border-b-gray-200 pb-5 ">
                                <div class="flex justify-between pt-2.5">
                                    <div>Tạm tính:</div>
                                    <div>{{ number_format($cartTotalPrice, 0, ',', '.') }} VNĐ</div>
                                </div>
                                <div class="flex justify-between pt-2.5">
                                    <div>Phí vận chuyển:</div>
                                    <div>30.000đ</div>
                                </div>
                            </div>
                            <div class="flex justify-between pt-2.5">
                                <div>Tổng cộng:</div>
                                <div class="text-black text-xl font-semibold">{{ number_format($cartTotalPrice, 0, ',', '.') }}VNĐ</div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="lg:grid lg:grid-cols-2 ">
                    <div id="delivery-info" class="px-3.5">
                        <div id="delivery-info-header" class="mb-3 font-semibold text-xl">
                            <h2>Thông tin nhận hàng</h2>
                        </div>
                        @csrf
                        <div id="info-fieldset" class="text-base">
                            <div class="p-1.5">
                                <label for="email" class="text-gray-600 mb-1">Email</label>
                                <input
                                    type="email"
                                    id="email"
                                    class="w-full p-1.5 @auth bg-gray-300 @endauth border border-gray-300 rounded-[4px] text-gray-800 focus:ring-gray-500"
                                    value="{{Auth::user()->email ?? ""}}"
                                    @auth readonly @else required @endauth
                                />
                            </div>
                            <!-- Name -->
                            <div class="p-1.5">
                                <label for="name" class="block text-gray-600 mb-1">Họ và tên</label>
                                <input
                                    type="text"
                                    id="name"
                                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500"
                                    placeholder="Họ và tên"
                                    value="{{Auth::user()->name ?? ""}}" required
                                />
                            </div>
                            <!-- Phone -->
                            <div class="p-1.5">
                                <label for="phone" class="block text-gray-600 mb-1">Số điện thoại</label>
                                <div class="flex">
                                    <input
                                        type="text"
                                        id="phone"
                                        name="phone_number"
                                        class="w-full p-2 border border-gray-300 rounded-l focus:outline-none focus:ring-2 focus:ring-gray-500"
                                        placeholder="Số điện thoại" required
                                    />
                                    <span class="inline-flex items-center px-3 border-t border-r border-b border-gray-300 rounded-r bg-gray-50 text-gray-500">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Vietnam.svg" alt="Vietnam Flag" class="h-4 w-6">
                        </span>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="p-1.5">
                                <label for="address" class="block text-gray-600 mb-1">Địa chỉ</label>
                                <input
                                    type="text"
                                    id="address"
                                    name="address"
                                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500"
                                    placeholder="Địa chỉ" required
                                />
                            </div>

                            <!-- Notes -->
                            <div class="p-1.5">
                                <label for="notes" class="block text-gray-600 mb-1">Ghi chú (tùy chọn)</label>
                                <textarea
                                    id="notes"
                                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500"
                                    placeholder="Ghi chú (tùy chọn)"
                                    name="note"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="ship-info" class="px-3.5">
                        <div id="ship-info-header" class="mb-3 font-semibold text-xl">
                            <h2>Thông tin vận chuyển</h2>
                        </div>
                        <div class="p-1.5 mt-8">
                            <div class="p-2 flex justify-between border   border-gray-300 rounded">
                                <div id="radio">
                                    <input type="radio"
                                           class="input-radio text-black"
                                           checked>
                                    <label>
                                        Giao Hàng Tận Nơi
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div id="payment-method-header" class="mb-3 font-semibold text-xl pt-7">
                            <h2>Thanh toán</h2>
                        </div>
                        <div class="p-1.5 mt-8 border   border-gray-300 rounded">
                            @foreach($paymentMethod as $item)
                                <div class="p-2 flex justify-between ">
                                    <div id="radio">
                                        <input type="radio" id="{{$item->name}}"
                                               class="input-radio text-black" style="border: solid 1px #2c3e50"
                                               name="paymentMethod"
                                               value="{{$item->name}}" required>
                                        <label>
                                            {{$item->info}}
                                        </label>
                                    </div>
                                    <div id="payment-icon">
                                        <i class="fa-solid fa-money-bill"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="lg:hidden  justify-between pt-2.5">
                    <div class="px-3.5">
                        <button type="submit" id="order-button" class="w-full h-full p-2.5 px-5 rounded-[5px] bg-black text-white">Đặt hàng</button>
                    </div>

                    <div class='py-2.5 text-center'>
                        <a href="{{route('cart.index')}}">
                            <span><i class="fa-solid fa-chevron-left"></i></span> Quay về giỏ hàng
                        </a>
                    </div>
                </div>

            </div>
            <div id="check-out-side-bar" class="hidden lg:block col-span-4 ">
                <div id="side-bar-header" class="text-xl font-semibold py-5 border-b-2 border-b-gray-200" >
                    <h2>Đơn Hàng(1 Sản phẩm)</h2>
                </div>
                <div id="side-bar-content" class="text-[#717171]">
                    <div class="max-h-[280px] overflow-y-auto  border-b-2 border-x-gray-200 py-3.5">
                        @php
                            $cartTotalPrice = 0;
                        @endphp
                        @foreach($cartItems as $cartItem)
                            @php
                                $image = json_decode($cartItem->images);
                                if ($cartItem->discount_type && $cartItem->discount_value){
                                    if ($cartItem->discount_type == \App\Models\Product::DISCOUNT_VND){
                                        $price = $cartItem->price - $cartItem->discount_value;
                                    }else{
                                        $price = $cartItem->price*(1-$cartItem->discount_value*0.01);
                                    }
                                }else{
                                    $price = $cartItem->price;
                                }
                            @endphp
                            <div id="product" class="grid grid-cols-12 pt-3.5 text-base">
                                <div class="col-span-2 relative">
                                    <img class="w-[50px] h-[50px]"
                                         src="{{$image[0]}}" alt="{{$cartItem->name }}">
                                    <span id="product-quantity" class="absolute top-0 right-0 rounded-[21px] bg-red-600 text-white font-semibold  text-center text-[10px] w-5 h-5">
                                    {{$cartItem->quantity}}
                                </span>
                                </div>
                                <div class="col-span-7 pl-3.5 text-black">{{$cartItem->name}}</div>
                                <div class="col-span-3 pt-3.5 text-sm text-[#717171]">{{ number_format($price, 0, ',', '.') }}đ</div>
                            </div>
                            @php
                                $cartItemTotalPrice = $price * $cartItem->quantity;
                                $cartTotalPrice += $cartItemTotalPrice;
                            @endphp
                        @endforeach
                    </div>
                    <div class="code-discount py-3.5 grid grid-cols-12 gap-4 p-1 border-b-2 border-b-gray-200">
                        <div class="col-span-8">
                            <input name="reductionCode"
                                   id="reductionCode"
                                   type="text"
                                   class="w-full rounded-[4px] text-gray-800 h-full px-4" style="border: solid 1px #2c3e50"
                                   placeholder="Mã giảm giá"
                            >
                        </div>
                        <div class="col-span-4">
                            <button class="w-full h-full p-2.5 rounded-[5px] bg-[#2c3e50] text-white"> Áp dụng</button>
                        </div>
                    </div>
                    <div class="price py-3.5 p-1">
                        <div class="border-b-2 border-b-gray-200 pb-5 ">
                            <div class="flex justify-between pt-2.5">
                                <div>Tạm tính:</div>
                                <div>{{ number_format($cartTotalPrice, 0, ',', '.') }} VNĐ</div>
                            </div>

                        </div>
                        <div class="flex justify-between pt-2.5">
                            <div>Tổng cộng:</div>
                            <div class="text-black text-xl font-semibold">{{ number_format($cartTotalPrice, 0, ',', '.') }}VNĐ</div>
                        </div>
                        <div class="flex justify-between pt-2.5">
                            <div class='py-2.5'><a href="{{route('cart.index')}}"><span><i class="fa-solid fa-chevron-left"></i></span> Quay về giỏ hàng</a></div>
                            <div class="">
                                <button type="submit" id="order-button" class="w-full h-full p-2.5 px-5 rounded-[5px] bg-[#2c3e50] text-white hover:bg-orange-400">Đặt hàng</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </form>

    <script>
        // Lấy API tỉnh thành VN
        $(document).ready(function() {
            //Lấy tỉnh thành
            $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm',function(data_tinh){
                if(data_tinh.error==0){
                    $.each(data_tinh.data, function (key_tinh,val_tinh) {
                        $("#provinces-list").append('<option value="'+val_tinh.id+'">'+val_tinh.full_name+'</option>');
                    });
                    $("#provinces-list").change(function(e){
                        var idtinh=$(this).val();
                        //Lấy quận huyện
                        $.getJSON('https://esgoo.net/api-tinhthanh/2/'+idtinh+'.htm',function(data_quan){
                            if(data_quan.error==0){
                                $("#districts-list").html('<option value="0">Quận Huyện</option>');

                                $.each(data_quan.data, function (key_quan,val_quan) {
                                    $("#districts-list").append('<option value="'+val_quan.id+'">'+val_quan.full_name+'</option>');
                                });
                                //Lấy phường xã

                            }
                        });
                    });

                }
            });
        });

    </script>
@endsection
