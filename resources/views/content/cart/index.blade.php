@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <div class="container mx-auto xl:px-36 px-2 text-sm md:text-lg">
            <!-- breadcrumb  -->
            <nav class="flex p-2 md:p-4 my-1 text-xs md:text-base font-medium text-gray-400  bg-white rounded-lg shadow" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{route('home')}}" class="inline-flex items-center text-main-color-dark hover:text-sub-main-color">
                            <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"></path>
                            </svg>
                            Trang chủ
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                            </svg>
                            <a href="{{route('cart.index')}}" class="ms-1 hover:text-main-color-dark">Thông tin giỏ hàng</a>
                        </div>
                    </li>
                </ol>
            </nav>
            <!-- end breadcrumb  -->

            <h3 class="text-main-color-dark text-xl md:text-3xl font-bold mt-8"> Giỏ hàng của tôi <span class="text-gray-500 text-base font-normal" id="product-count">({{$cartItems->count()??count($cartItems)}} sản phẩm)</span></h3>

            <div class="my-4 grid grid-cols-3 gap-4">
                <div class="col-span-3 md:col-span-3">
                    <div class="rounded-lg divide-y divide-gray-300 bg-white" style="border:1px solid #d3d0d0" id="order-items">
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
                            <div class="grid grid-cols-5 md:grid-cols-3" id="cart_item_{{$cartItem->product_id ?? $cartItem->id}}">
                                <div class="col-span-3 md:col-span-2 p-4" style="border-right:1px solid #d3d0d0">
                                    <div class="flex justify-start gap-4">
                                        <div class="w-20 h-20 md:w-24 md:h-24 bg-red-400">
                                            <img src="{{$image[0]}}" alt="{{$cartItem->name }}" class="w-full h-full">
                                        </div>
                                        <div>
                                            <p class="text-main-color-dark font-bold text-xs md:text-base ">{{$cartItem->name}}</p>
                                            <div class="text-gray-600 text-sm md:text-lg mt-2">

                                                <span class="font-semibold">Đơn giá:</span> {{number_format($price,0, ',', '.') }} VNĐ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2 md:col-span-1">
                                    <div class="flex justify-between p-4">
                                        <div>
                                            <div class="flex justify-start items-center text-base ">
                                                <button type="button" id="cart_item_minus_btn_{{$cartItem->product_id ?? $cartItem->id}}" onclick="onMinus('{{$cartItem->product_id ?? $cartItem->id}}', {{$price}})" class="text-main-color-dark font-bold hover:bg-blue-500 hover:text-white bg-white border border-gray-300 rounded-l-lg w-8 h-8">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>

                                                <input type="number" id="cart_item_quantity_input_{{$cartItem->product_id ?? $cartItem->id}}" class="w-1/4 h-8 text-center text-gray-600 bg-white border border-gray-300 focus:ring-blue-300 focus:outline-blue-300" value="{{$cartItem->quantity}}" readonly="">

                                                <button type="button" id="cart_item_plus_btn_{{$cartItem->product_id ?? $cartItem->id}}" onclick="onAdd('{{$cartItem->product_id ?? $cartItem->id}}', {{$price}})" class="text-main-color-dark font-bold hover:bg-blue-500 hover:text-white bg-white border border-gray-300 rounded-r-lg w-8 h-8">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="text-main-color-dark font-semibold text-sm md:text-lg mt-6" id="cart_item_total_{{$cartItem->product_id ?? $cartItem->id}}">
                                                @php
                                                    $cartItemTotalPrice = $price * $cartItem->quantity;
                                                    $cartTotalPrice += $cartItemTotalPrice;
                                                @endphp
                                                {{ number_format($cartItemTotalPrice,0, ',', '.') }} VNĐ
                                            </div>
                                        </div>
                                        <div>
                                            <button class="text-red-600 hover:bg-red-400 hover:text-white w-10 h-10 border border-red-500 rounded-lg" type="button" onclick="onDelete('{{$cartItem->product_id ?? $cartItem->id}}', {{$price}})">
                                                <i class="fa-regular fa-trash-can text-lg"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="grid grid-cols-5 md:grid-cols-3">
                            <div class="col-span-3 md:col-span-2 p-4 font-semibold text-main-color-dark text-xl" style="border-right:1px solid #d3d0d0">
                                Tổng giá trị đơn hàng
                            </div>
                            <div class="col-span-2 md:col-span-1 p-4 text-base md:text-lg font-bold text-blue-600" id="total_order">
                                {{ number_format($cartTotalPrice,0, ',', '.') }} VNĐ
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="flex justify-end items-center mt-4">
                <button  type="button" onclick="window.location.href='{{route('order.index')}}'" class="w-1/3 font-bold py-4 rounded-lg mt-4 md:mt-8 text-white" style="background: #2c3e50">
                    Đặt hàng
                </button>
            </div>
        </div>


    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        let total = {{$cartTotalPrice}};
        function onMinus(id, price){
            let quantity_input = document.getElementById("cart_item_quantity_input_"+id);
            let quantity = quantity_input.value;
            if(quantity >= 2) {
                quantity--;
                quantity_input.value = quantity;
                let new_total = quantity * price;
                document.getElementById("cart_item_total_"+id).innerText = new_total.toLocaleString() + " Đ";
                total = total - price;
                document.getElementById("total_order").innerText = total.toLocaleString() + " Đ";
                updateCart(id, quantity);
            }
        }
        function onAdd(id, price){
            let quantity_input = document.getElementById("cart_item_quantity_input_"+id);
            let quantity = quantity_input.value;
            if(quantity <= 10) {
                quantity++;
                quantity_input.value = quantity;
                let new_total = quantity * price;
                document.getElementById("cart_item_total_"+id).innerText = new_total.toLocaleString() + " Đ";
                total = total + price;
                document.getElementById("total_order").innerText = total.toLocaleString() + " Đ";
                updateCart(id, quantity);
            }

        }
        function onDelete(id, price){
            let quantity_input = document.getElementById("cart_item_quantity_input_"+id);
            let quantity = quantity_input.value;
            total = total - quantity * price;
            document.getElementById("total_order").innerText = total.toLocaleString() + " Đ";
            document.getElementById("cart_item_"+id).remove();
            $.ajax({
                url: "{{route('cart.remove')}}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: id,
                },
                success: function (response) {
                    console.log(response);
                    $('#product-count').html(`(${response.cart_total} sản phẩm)`);
                    $('#cart-number-quantity').html(`${response.cart_total}`);
                }
            });
        }
        function updateCart(product_id, new_quantity){
            $.ajax({
                url: "{{route('cart.add')}}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: product_id,
                    quantity: new_quantity
                },
                success: function (response) {
                    console.log(response);
                }
            });
        }

    </script>
@endsection
