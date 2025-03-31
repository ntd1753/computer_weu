<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script src="{{ asset('js/header.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function formatCurrency(price, roundTo = 1000) {
        let roundedPrice = Math.round(price / roundTo) * roundTo;
        return roundedPrice.toLocaleString('vi-VN');
    }
    document.addEventListener('DOMContentLoaded', function () {
        $.ajax({
            url: '{{route('api.category.get')}}',
            method: 'GET',
            success: function (response) {
                let categories = response.data;
                let htmlDesktop = '';
                let  htmlMobile = '';
                $.each(categories, function(index, category) {
                    htmlDesktop +=`<button type="button" onclick="openChildCategory(${category.id})" class="relative inline-flex items-center w-full px-4 py-2 text-sm
                            font-medium rounded-lg hover:bg-blue-100 hover:text-blue-700 gap-4">
                    <img src="${category.icon}" alt="" class="w-6">
                    ${category.name}
                </button>`;
                    htmlMobile +=`<a href="#" class="relative inline-flex items-center w-full px-4 py-1 text-sm
                            font-medium rounded-lg hover:bg-blue-100 hover:text-blue-700 gap-4">
                    <img src="${category.icon}" alt="" class="w-6">
                    ${category.name}
                </a>`;
                    $('.desktop-parent-category-0').html(htmlDesktop);
                    $('.mobile-parent-category-0').html(htmlMobile);
                    let htmlSubcategory = `<div class="hidden text-base child-category-list" id="child-category-${category.id}">
                                            <div class=" grid grid-cols-3 gap-4">`;
                    $.each(category.sub_categories, function(index, subCategory) {
                        htmlSubcategory += `<div class="col-span-1">
                        <a href="/${subCategory.slug}"
                           class="font-semibold text-blue-700 hover:text-orange-600">${subCategory.name}</a>`;
                        htmlSubcategory += getSubcategory(subCategory);
                        htmlSubcategory += '</div>';
                    });
                    htmlSubcategory += '</div></div>';
                    $('.sub-category').prepend(htmlSubcategory);
                });
            }
        });

    });
</script>
