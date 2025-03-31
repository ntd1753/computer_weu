@extends('layouts.app')
@section('content')
    <div id="product-content">

    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.innerWidth > 768) {
                let menu = document.getElementById("categoryDetail");
                menu.classList.remove('hidden');
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
            $.ajax({
                url: '{{route('api.home.product.get')}}',
                method: 'GET',
                success: function (response) {
                    let data = response.data;
                    let beginRowProduct = `<div class="container mx-auto xl:px-36 text-lg mt-4 mb-2 md:mt-8 md:mb-4">
                            <div class="bg-white px-2 py-6 md:p-6 rounded-lg shadow-xl">`;
                    let endRowProduct = `</div></div></div></div>`;
                    console.log(data);
                    $.each(data, function (index, data){
                        if (data.products.length > 0) {
                            let html = '';
                            html += beginRowProduct;
                            html += `<div class="md:flex justify-between items-center">
                                    <a href="#">
                                        <h2 class="pb-3 md:py-0 flex justify-center text-2xl md:text-3xl font-bold text-main-color-dark">${data.category.name}</h2>
                                    </a>
                                    <div class="flex justify-center md:justify-end items-center gap-2 text-sub-main-color">
                                        <a href="#">
                                            <button type="button" class="border border-sub-main-color rounded-full px-2 md:py-1 md:px-4 bg-white
                                                    hover:text-main-color-dark hover:border-main-color-dark text-sm md:text-base">
                                                Xem Thêm
                                            </button>
                                        </a>
                                    </div>
                                </div>`;
                            html += `<div class=""> <div class="grid grid-cols-2 md:grid-cols-5 gap-4 items-center mt-4">`;
                            $.each(data.products, function (index, product){
                                let cartButton = `<button class="text-white bg-sub-main-color px-2 py-1 text-base rounded-full border border-sub-main-color
                                        hover:bg-white hover:text-[#2c3e50]" onclick="addItemToCart(${product.id})">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>`;

                                let discount = '';
                                let priceHtml = `<h5>${formatCurrency(product.price)} VND</h5>`;
                                let PriceAfterDiscount = product.price;

                                if(product.discount_type != null && product.discount_value != null){
                                    let discontPercent = 0;

                                    if(product.discount_type === {{\App\Models\Product::DISCOUNT_VND}}){
                                        priceAfterDiscount = product.price - product.discount_value;
                                        discountPercent = (product.discount_value / product.price) * 100;
                                        discountPercent = discountPercent.toFixed(0);
                                    }
                                    if(product.discount_type === {{\App\Models\Product::DISCOUNT_PERCENT}}) {
                                        priceAfterDiscount = product.price - (product.price * product.discount_value / 100);
                                        discountPercent = product.discount_value.toFixed(0);
                                    }
                                    priceAfterDiscount = formatCurrency(priceAfterDiscount);
                                    discount += ` <div class="absolute bg-sub-main-color font-bold text-white text-xs p-1 top-0 right-0">Sale ${discountPercent}%</div>`;
                                    priceHtml = `<h5 style="text-decoration: line-through;" class="text-gray-500 text-xs">${formatCurrency(product.price)} VND</h5>
                                                    <h5>${priceAfterDiscount} VND</h5>`

                                }
                                let routeProductDetail = "{{ route('product.detail', ['slug' => '__SLUG__']) }}";
                                let previewImage =  JSON.parse(product.images)[0] || null;
                                html += `<div class="col-span-1 p-2 shadow rounded-lg h-full">`;
                                html += `<div class="border border-blue-700 relative">`;
                                let imgPreview = `<div class="border border-blue-700 relative">
                                        <a href="${routeProductDetail.replace('__SLUG__', product.slug)}">
                                            <img src="${previewImage}" alt=""
                                                 class="aspect-square object-cover">
                                        </a>
                                    </div>`;
                                html += imgPreview+discount+`</div>`;
                                let productName = `
                                    <div class="py-2">
                                        <a href="${routeProductDetail.replace('__SLUG__', product.slug)}">
                                            <h4  data-tooltip-target="product-name-${product.id}" data-tooltip-trigger="hover" class="text-sm md:text-base font-bold text-main-color-dark text-center">${product.name}</h4>
                                            <div id="product-name-${product.id}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                                Tooltip content
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </a>
                                    </div>`;
                                html += productName;
                                let productPriceCard = `
                                <div class="flex justify-between items-center mt-1 px-2 py-1">
                                    <div class="text-sm md:text-base font-bold text-sub-main-color text-center">
                                        ${priceHtml}
                                    </div>
                                    ${cartButton}
                                </div>
                                `;
                                html += productPriceCard;
                                html += `</div>`;
                            });
                            html += endRowProduct;
                            $('#product-content').append(html);

                        }

                    });
                }
            });
        });
    </script>
@endsection
