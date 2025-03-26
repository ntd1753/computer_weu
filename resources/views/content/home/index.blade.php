@extends('layouts.app')
@section('content')
    <div class="container mx-auto xl:px-36 text-lg mt-4 mb-2 md:mt-8 md:mb-4">
        <div class="bg-white px-2 py-6 md:p-6 rounded-lg shadow">
            <div class="md:flex justify-between items-center">
                <a href="https://trandienpc.com/pc-thiet-ke-do-hoa-3d">
                    <h2 class="pb-3 md:py-0 flex justify-center text-2xl md:text-3xl font-bold text-main-color-dark">PC Đồ Họa, Render 3D</h2>
                </a>

                <div class="flex justify-center md:justify-end items-center gap-2 text-sub-main-color">
                    <a href="https://trandienpc.com/3d-lumion">
                        <button type="button" class="border border-sub-main-color rounded-full px-2 md:py-1 md:px-4 bg-white
                                hover:text-main-color-dark hover:border-main-color-dark text-sm md:text-base">
                            TDPC 3D Lumion
                        </button>
                    </a>
                    <a href="https://trandienpc.com/3d">
                        <button type="button" class="border border-sub-main-color rounded-full px-2 md:py-1 md:px-4 bg-white
                                hover:text-main-color-dark hover:border-main-color-dark text-sm md:text-base">
                            TDPC 3D
                        </button>
                    </a>
                    <a href="https://trandienpc.com/3d-render">
                        <button type="button" class="border border-sub-main-color rounded-full px-2 md:py-1 md:px-4 bg-white
                                hover:text-main-color-dark hover:border-main-color-dark text-sm md:text-base">
                            TDPC 3D Render
                        </button>
                    </a>
                </div>
            </div>

            <!-- Products Slider -->
            <div class="">
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 items-center mt-4">
                    @for($i =0; $i<8; $i++)
                        @include('components.cards.productCard')
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
