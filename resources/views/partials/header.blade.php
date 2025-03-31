<header class="w-full text-white font-roboto text-sm relative">
    <!-- Top header -->
    <div class="w-full bg-sub-main-color py-2 ">
        <div class="container mx-auto px-4 xl:px-36">
            <div class="flex w-full justify-between items-center">
                <div class="text-xs md:text-sm flex justify-start items-center gap-1 md:gap-4">
                    <a href="#">
              <span class="gap-2">
                <i class="fa-regular fa-file-lines"></i>
                Trang tin tức
              </span>
                    </a>
                    <a href="#">
              <span class="gap-2">
                <i class="fa-solid fa-bolt"></i>
                Hướng dẫn build PC
              </span>
                    </a>
                </div>
                @guest()
                <div class="">
                    <nav class="flex text-sm md:text-base font-bold gap-2 justify-center items-center">
                        <a href="{{route('auth.register')}}" class="flex justify-start items-center gap-2">
                            <i class="fa-solid fa-user-plus"></i>
                            <label class="hidden md:block">Đăng ký</label>
                        </a> |
                        <a href="{{route('auth.login')}}" class="flex justify-start items-center gap-2">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <label class="hidden md:block">Đăng nhập</label>
                        </a>
                    </nav>
                </div>
                @else
                    <div class="">
                        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm pe-1 font-medium text-white rounded-full hover:text-orange-500  md:me-0 focus:ring-0" type="button">
                            <i class="fa-solid fa-user-astronaut text-base md:text-lg mr-2"></i>
                            <span class="font-bold text-sm md:text-base">{{Auth::user()->name}}</span>
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"></path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownAvatarName" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-36 md:w-44">
                            <div class="p-2 md:px-4 md:py-3 text-sm text-black ">
                                <div class="font-bold text-center">Trang cá nhân</div>
                                <div class="truncate text-center">nhocway996@gmail.com</div>
                            </div>
                            <ul class="text-sm text-black" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                <li>
                                    <a href="{{route('home')}}" class="block px-2 py-1 md:px-4 md:py-2 hover:bg-blue-100 hover:text-sub-main-color">Trang chủ
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-1 md:px-4 md:py-2 hover:bg-blue-100 hover:text-main-color-dark">
                                        Thông tin cá nhân
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-1 md:px-4 md:py-2 hover:bg-blue-100 hover:text-main-color-dark">
                                        Thông tin đơn hàng
                                    </a>
                                </li>
                            </ul>
                            <div>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-2 py-1 md:px-4 md:py-2 text-sm text-black hover:bg-blue-100 hover:text-main-color-dark rounded-b-lg">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{route('auth.logout')}}" method="POST" class="d-none m-0 p-0">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>

    <!-- ===================================================================================================================================================== -->
    <!-- Main header -->
    <div class="w-full bg-main-color-dark pt-1 md:pt-4 px-4 relative">
        <div class="container mx-auto xl:px-36">
            <div class="flex justify-between gap-1 md:gap-4 items-center ">
                <!-- logo -->
                <div class="">
                    <a href="{{route('home')}}">
                        <div class="flex justify-start items-center w-full h-full">
                            <div class="p-2">
                                <img src="http://computer-cms.dnth.io.vn/build/images/logo-dark.png" alt="" class="w-full h-12">
                            </div>
                        </div>
                    </a>
                </div>
                <!-- main post -->
                <div class="hidden md:block">
                    <div class="flex justify-center gap-4 text-base items-center mt-2 text-white">
                        <div>
                            <a href="#">
                                <span><i class="fa-solid fa-cart-plus mr-2 text-sub-main-color text-xl"></i> HƯỚNG DẪN MUA HÀNG</span>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <span><i class="fa-solid fa-mobile mr-2 text-sub-main-color text-xl"></i> THANH TOÁN ONLINE </span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Shopping cart -->
                <div class="text-ms">
                    <div class="flex justify-end items-center gap-2 md:gap-4">
                        <div class="border-r border-white border-1 pr-2 md:pr-4">
                            <div class="flex justify-start gap-2 items-center">
                                <a href="tel:0963688259">
                                    <button class="rounded-full text-blue-600 bg-white w-8 h-8 md:w-10 md:h-10"><i
                                            class="fa-solid fa-phone text-lg"></i></button>
                                </a>
                                <div class="md:block hidden">
                                    <p>Hotline</p>
                                    <p class="font-bold">Mua hàng</p>
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <a href="#">
                                <button type="button" class="rounded-full text-blue-600 bg-white w-8 h-8 md:w-10 md:h-10"><i
                                        class="fa-solid fa-cart-shopping text-lg"></i>
                                </button>
                                <button id="cart-number-quantity" type="button"
                                        class="absolute top-0 right-0 bg-red-600 text-white rounded-full w-5 h-5 mr-[-9px] md:mr-0 mt-[-6px]">

                                    0
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom header -->
    <div class="w-full bg-main-color-dark p-2 relative hidden md:block">
        <div class="container mx-auto xl:px-36">
            <div class="flex justify-between gap-4 items-center ">

                <div>
                    <div class="flex justify-end">
                        <button onclick="open_menu()"
                                class="border border-1 border-white rounded-3xl h-10 py-2 px-4 flex items-center gap-1 md:gap-2 font-bold">
                            <i class="fa-regular fa-rectangle-list"></i>
                            Danh mục sản phẩm
                            <i class="fa-solid fa-sort-down mt-[-5px]"></i>
                        </button>
                    </div>
                </div>

                <div class="text-xs w-1/2 relative self-center items-center">
                    <div class="py-2 px-4 bg-white flex justify-start items-center gap-4 rounded-2xl relative z-10">
                        <p class="text-gray-500 whitespace-nowrap hidden md:block"> Danh mục...</p>
                        <div class="w-full md:border-l md:border-1 md:border-gray">
                            <label>
                                <input type="text" id="searchValue"
                                       class="border-0 h-4 md:h-6 md:pl-3 w-full text-xs md:text-sm text-black outline-0 focus:ring-0"
                                       placeholder="Nhập sản phẩm cần tìm" onkeyup="changeSearch()">
                            </label>
                        </div>
                    </div>
                    <div class="absolute hidden w-full bg-white shadow-lg z-50 rounded-lg py-4 px-4 divide-y"
                         id="search-result">
                        <!-- Search result -->
                    </div>
                </div>

                <div class="text-ms ">
                    <a href="#">
                        <button type="button" class="h-10 px-4 py-2 rounded-2xl bg-[#13313D] hover:bg-orange-400
                         text-white font-bold flex items-center justify-center gap-2">
                            <i class="fa-solid fa-computer"></i>
                            <span>Xây Dựng Cấu Hình</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom header Mobile-->
    <div class="w-full bg-main-color-dark p-2 relative md:hidden">
        <div class="container mx-auto xl:px-36">
            <div class="flex justify-between gap-1 items-center">
                <div>
                    <div class="flex justify-end">
                        <button onclick="open_menu()"
                                class="border border-1 border-white rounded-xl py-2 px-2 flex items-center gap-1 font-bold text-sm">
                            <i class="fa-regular fa-rectangle-list"></i>
                            Danh mục sản phẩm
                            <i class="fa-solid fa-sort-down mt-[-5px]"></i>
                        </button>
                    </div>
                </div>

                <div class="text-ms">
                    <a href="#">
                        <button type="button" class="px-4 py-3 rounded-lg hover:bg-orange-400
                        bg-sub-main-color text-white font-bold flex items-center justify-center gap-1 text-xs">
                            <i class="fa-solid fa-computer"></i>
                            <span>Build </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container mx-auto xl:px-36 text-lg px-1 hidden" id="categoryDetail">
    <div class="w-full grid grid-cols-1 md:grid-cols-4 items-center gap-2 py-2" id="main-category-list">
        <!-- sidebar -->
        <div class="col-span-1 bg-white rounded-lg shadow p-4 h-full hidden md:block">
            <div class="text-gray-500 rounded-xl pb-8 desktop-parent-category-0">
            </div>
        </div>

        <!-- sub category -->
        <div class="col-span-3 bg-white rounded-lg shadow h-full p-4 hidden md:block sub-category">
            <!-- Carousel Banner-->
            <div class="w-full" id="carousel-banner">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-2">
                        <div id="animation-carousel" class="relative w-full h-full" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="relative overflow-hidden rounded-lg h-full">
                                <!-- Item 1 -->
                                <div
                                    class="duration-200 ease-linear h-full absolute inset-0 transition-transform transform translate-x-0 z-30"
                                    data-carousel-item="">
                                    <a href="https://trandienpc.com/pc-van-phong">
                                        <img src="https://trandienpc.com/storage/banner/SLIDE_ADS/pcvanphong.jpg" class="w-full h-full"
                                             alt="...">
                                    </a>
                                </div>
                                <!-- Item 1 -->
                                <div
                                    class="duration-200 ease-linear h-full absolute inset-0 transition-transform transform translate-x-full z-20"
                                    data-carousel-item="">
                                    <a href="https://trandienpc.com/mainboard-intel-z890?brand=gigabyte">
                                        <img src="https://trandienpc.com/storage/banner/SLIDE_ADS/Z890" class="w-full h-full" alt="...">
                                    </a>
                                </div>
                                <!-- Item 1 -->
                                <div
                                    class="duration-200 ease-linear h-full absolute inset-0 transition-transform transform -translate-x-full z-10"
                                    data-carousel-item="">
                                    <a href="https://trandienpc.com/laptop-notebook?brand=dell">
                                        <img src="https://trandienpc.com/storage/banner/SLIDE_ADS/DELL INSPIRON 16.jpg"
                                             class="w-full h-full" alt="...">
                                    </a>
                                </div>
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev="">
                  <span
                      class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4"></path>
                    </svg>
                    <span class="sr-only">Previous</span>
                  </span>
                            </button>
                            <button type="button"
                                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next="">
                  <span
                      class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4"></path>
                    </svg>
                    <span class="sr-only">Next</span>
                  </span>
                            </button>
                        </div>
                    </div>
                    <div class="col-span-1 h-full">
                        <div class="flex flex-col gap-2">
                            <a href="https://trandienpc.com/policy/huong-dan-mua-hang-online" class="rounded-lg h-32">
                                <img src="https://trandienpc.com/storage/banner/1.jpg" alt="tran-dien-pc-banner"
                                     class="w-full h-full rounded-lg">
                            </a>
                            <a href="https://trandienpc.com/policy/chinh-sach-kiem-hang" class="rounded-lg h-32">
                                <img src="https://trandienpc.com/storage/banner/6.jpg" alt="tran-dien-pc-banner"
                                     class="w-full h-full rounded-lg">
                            </a>
                            <a href="https://trandienpc.com/pc-render-edit-video" class="rounded-lg h-32">
                                <img src="https://trandienpc.com/storage/banner/3.jpg" alt="tran-dien-pc-banner"
                                     class="w-full h-full rounded-lg">
                            </a>
                        </div>
                    </div>
                    <div class="col-span-1 h-32">
                        <a href="https://trandienpc.com/pc-thiet-ke-do-hoa-3d" class="rounded-lg h-full">
                            <img src="https://trandienpc.com/storage/banner/4.jpg" alt="tran-dien-pc-banner"
                                 class="w-full h-full rounded-lg">
                        </a>
                    </div>
                    <div class="col-span-1 h-32">
                        <a href="https://trandienpc.com/pc-gaming" class="rounded-lg h-full">
                            <img src="https://trandienpc.com/storage/banner/2.jpg" alt="tran-dien-pc-banner"
                                 class="w-full h-full rounded-lg">
                        </a>
                    </div>
                    <div class="col-span-1 h-32">
                        <a href="https://trandienpc.com/pc-dep" class="rounded-lg h-full">
                            <img src="https://trandienpc.com/storage/banner/5.jpg" alt="tran-dien-pc-banner"
                                 class="w-full h-full rounded-lg">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- category for mobile -->
        <div class="col-span-1 bg-white rounded-lg shadow-xl px-4 pb-4 h-full md:hidden">
            <div class="text-gray-500 rounded-xl mobile-parent-category-0">

            </div>
        </div>
    </div>
</div>


