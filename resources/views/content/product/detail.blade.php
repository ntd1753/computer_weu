@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <div class="container mx-auto xl:px-36 text-lg">
            <nav class="flex p-2 md:p-4 my-1 text-xs md:text-base font-medium text-gray-400  bg-white rounded-lg shadow" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="https://trandienpc.com" class="inline-flex items-center text-main-color-dark hover:text-sub-main-color">
                            <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"></path>
                            </svg>
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                            </svg>
                            <a href="https://trandienpc.com/pc-thiet-ke-do-hoa-3d" class="ms-1 hover:text-main-color-dark">PC Đồ Họa, Render 3D</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                            </svg>
                            <a href="https://trandienpc.com/3d" class="ms-1 hover:text-main-color-dark">TDPC 3D</a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-4 rounded-lg shadow-xl">
                <h1 class="px-2 font-bold text-lg md:text-2xl border-b border-gray-300 pb-2 text-main-color-dark">TDPC CORE I9-12900K | 32GB| RTX-4060TI-16GB (D02)</h1>
                <div class="md:grid md:grid-cols-4 mt-4 gap-4">
                    <div class="col-span-3">
                        <div class="md:grid md:grid-cols-5 gap-4">
                            <!-- Images -->
                            <div class="col-span-2">
                                <div class="w-full">
                                    <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                                        <!-- Carousel wrapper -->
                                        <div class="relative overflow-hidden w-[300px] h-[300px] lg:w-[290px] xl:w-[300px]">
                                            <!-- Item 1 -->
                                            <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform z-10 translate-x-full z-20" data-carousel-item="active">
                                                <img src="https://trandienpc.com/storage/product/PC-do-hoa/pc1-I7-13700K/1.png" class="absolute block -translate-x-1/2 -translate-y-1/2">
                                            </div>
                                            <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform translate-x-0 z-30" data-carousel-item="active">
                                                <img src="https://trandienpc.com/storage/product/PC-do-hoa/pc1-I7-13700K/1.png" class="absolute block -translate-x-1/2 -translate-y-1/2">
                                            </div>
                                        </div>
                                        <!-- Slider indicators -->
                                        <div class="grid grid-cols-5 gap-2 mt-4">
                                            <button type="button" aria-current="false" aria-label="Slide 0" data-carousel-slide-to="0" class="shadow border border-gray-300 rounded-lg hover:border-blue-500 bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800">
                                                <img src="https://trandienpc.com/storage/product/PC-do-hoa/pc1-I7-13700K/1.png" class="w-full rounded-lg " alt="product-image">
                                            </button>
                                            <button type="button" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="1" class="shadow border border-gray-300 rounded-lg hover:border-blue-500 bg-white dark:bg-gray-800">
                                                <img src="https://trandienpc.com/storage/product/PC-do-hoa/pc1-I7-13700K/1.png" class="w-full rounded-lg " alt="product-image">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Thông số -->
                            <div class="col-span-3 mt-4">
                                <div class="text-base text-black mt-2 w-full">
                                    <h4 class="text-lg font-bold text-main-color-dark">Thông số sản phẩm:</h4>
                                    <div class="flex justify-start items-center gap-2 pl-4 my-1">
                                        <i class="fa-regular fa-circle-dot text-sm"></i>
                                        <p><strong>CPU: </strong>Intel CORE I9-12900K</p>
                                    </div>
                                    <div class="flex justify-start items-center gap-2 pl-4 my-1">
                                        <i class="fa-regular fa-circle-dot text-sm"></i>
                                        <p><strong>RAM: </strong>32GB</p>
                                    </div>
                                    <div class="flex justify-start items-center gap-2 pl-4 my-1">
                                        <i class="fa-regular fa-circle-dot text-sm"></i>
                                        <p><strong>VGA: </strong>RTX-4060TI-16GB</p>
                                    </div>
                                </div>

                                <div class="flex justify-start items-center text-sm md:text-base text black gap-4">
                                    <div class="flex justify-start gap-1 items-center text-yellow-400">
                                        <p class="font-semibold text-blue-600">Đánh giá:</p>
                                        <i class="fa-solid fa-star text-sm "></i>
                                        <i class="fa-solid fa-star text-sm text-orange-400"></i>
                                        <i class="fa-solid fa-star text-sm text-orange-400"></i>
                                        <i class="fa-solid fa-star text-sm text-orange-400"></i>
                                        <i class="fa-solid fa-star text-sm text-orange-400"></i>
                                    </div>
                                </div>
                                <div class="w-full px-4 py-2 rounded-lg border border-dashed border-red-500 mt-4 flex justify-between items-center">
                                    <h2 class="text-font text-blue-600 text-lg md:text-3xl font-bold relative">
                                        <div style="text-decoration: line-through;" class="text-gray-500 text-xs">40,290,000 VNĐ</div>
                                        <div class="flex justify-start items-center gap-2">
                                            <p>37,090,000 VNĐ</p>
                                            <p class="bg-sub-main-color font-bold text-white text-xs py-0 md:py-1 px-1 md:px-4 rounded">
                                                Sale 8 %
                                            </p>
                                        </div>
                                    </h2>
                                    <label class="text-white text-sm bg-red-600 rounded-lg py-1 px-2 mt-1">Có bảo hành</label>
                                </div>
                                <div class="w-full mt-2 md:mt-8">
                                    <button class="bg-[#FA5252] rounded-xl py-2 md:py-4 w-full text-white" onclick="addItemToCart(1478,true)">
                                        <p class="font-bold text-lg md:text-2xl">MUA NGAY</p>
                                        <p class="text-sm mt-[-5px]">Giao hàng tận nơi nhanh chóng</p>
                                    </button>
                                    <div class="grid grid-cols-2 gap-2 md:gap-4 items-center mt-2 md:mt-4">
                                        <button class="bg-[#FF8125] rounded-xl py-2 md:py-4 w-full text-white" onclick="addItemToCart(1478)">
                                            <p class="font-bold text-base md:text-xl">THÊM VÀO GIỎ HÀNG</p>
                                            <p class="text-sm mt-[-5px]"> Để chọn tiếp</p>
                                        </button>
                                        <a href="https://trandienpc.com/policy/huong-dan-tra-gop">
                                            <button class="bg-[#1988EC] rounded-xl py-2 md:py-4 w-full text-white h-full">
                                                <p class="font-bold text-base md:text-xl">MUA TRẢ GÓP</p>
                                                <p class="text-sm mt-[-5px]">Thủ tục đơn giản</p>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 mt-4">
                        <!-- Adds -->
                        <div class="border border-[#27ae60] rounded-xl shadow text-base">
                            <h4 class="font-semibold text-white py-2 px-4 bg-main-color-dark  rounded-t-xl">Địa chỉ đặt hàng</h4>
                            <div class="px-4 pt-2 pb-4">
                                <h5 class="font-semibold text-black">Địa chỉ:</h5>
                                <div class="flex justify-start gap-4 items-center mt-2">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p class="text-sm text-black">Số 3, ngõ 543 Nguyễn Trãi, Phường Thanh Xuân Nam, Quận Thanh Xuân, Thành Phố Hà nội</p>
                                </div>
                                <p class="font-italic text-gray-500 text-xs mt-2">Chú ý: Sản phẩm có thể giao 24/7</p>
                            </div>
                        </div>

                        <div class="border border-[#27ae60] rounded-xl shadow text-base mt-4">
                            <h4 class="font-semibold text-white py-2 px-4 bg-main-color-dark rounded-t-xl">Yên tâm mua sắm tại Trần Diện</h4>
                            <div class="px-4 pt-2 pb-4">
                                <div class="flex justify-start gap-4 items-center mt-2 text-blue-600">
                                    <i class="fa-solid fa-check"></i>
                                    <p class="text-sm font-semibold">Đội ngũ kỹ thuật tư vấn chuyên sâu</p>
                                </div>
                                <div class="flex justify-start gap-4 items-center mt-2 text-blue-600">
                                    <i class="fa-solid fa-check"></i>
                                    <p class="text-sm font-semibold">Thanh toán thuận tiện</p>
                                </div>
                                <div class="flex justify-start gap-4 items-center mt-2 text-blue-600">
                                    <i class="fa-solid fa-check"></i>
                                    <p class="text-sm font-semibold">Sản phẩm 100% chính hãng</p>
                                </div>
                                <div class="flex justify-start gap-4 items-center mt-2 text-blue-600">
                                    <i class="fa-solid fa-check"></i>
                                    <p class="text-sm font-semibold">Bảo hành 1 đổi 1 tại nơi sử dụng</p>
                                </div>
                                <div class="flex justify-start gap-4 items-center mt-2 text-blue-600">
                                    <i class="fa-solid fa-check"></i>
                                    <p class="text-sm font-semibold">Giá cạnh tranh nhất thị trường</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
