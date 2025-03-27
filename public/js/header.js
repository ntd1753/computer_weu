    // remove the hidden class from the categoryDetail when loaded  page
    // if screen size is less than 768px, show the categoryDetail
    function open_menu() {
    let menu = document.getElementById("categoryDetail");
    if (menu.classList.contains('hidden')) menu.classList.remove('hidden');
    else menu.classList.add('hidden');
}
    function changeSearch() {
    let searchValue = document.getElementById('searchValue').value.trim();
    let searchResult = document.getElementById('search-result');
    if (searchValue === '' && !searchResult.classList.contains('hidden'))
    searchResult.classList.add('hidden');
    else
    searchResult.classList.remove('hidden');

    $.ajax({
    url: "https://trandienpc.com/product/search",
    type: "POST",
    data: {
    _token: "MUvNpQXqvWK8eT8wTxGf83Y1CPhaRdGdaZNbU4Lb",
    searchValue: searchValue
},
    success: function (response) {
    let html = '';
    if (response.length > 0)
    response.forEach((item, index) => {
    const productDetailUrl = `https://trandienpc.com/product/:slug`.replace(':slug', item.slug);
    const images = JSON.parse(item.images);
    html += `
                                            <a href="${productDetailUrl}">
                                                <div class="flex justify-start items-center gap-4 my-1 p-1 hover:bg-blue-100">
                                                    <div class="w-12 h-12 bg-blue-200">
                                                        <img src="${images[0]}" alt="${item.name}" class="w-full h-full object-cover">
                                                    </div>
                                                    <div class="text-black">
                                                        <p class="text-sm font-bold">${item.name}</p>
                                                        <p class="text-xs">${item.price}</p>
                                                    </div>
                                                </div>
                                            </a>
                                            `;
})
    else {
    html += ` <div class="flex justify-center items-center gap-4 my-1 p-1">
                                                    <p class="text-sub-main-color font-bold">Không có sản phẩm nào</p>
                                                </div>`;
}
    searchResult.innerHTML = html;
}

})
}
    function openChildCategory(id) {
    hidden_all_child_category();
    let child_category = document.getElementById("child-category-"+id);
    child_category.classList.remove('hidden')
}
    function hidden_all_child_category() {
    let child_category_lists = document.getElementsByClassName("child-category-list");
    for (let i = 0; i < child_category_lists.length; i++) {
    if (child_category_lists[i].classList.contains('hidden'))
    continue;
    child_category_lists[i].classList.add('hidden')
}
    let carousel_banner = document.getElementById('carousel-banner')
    if (!carousel_banner.classList.contains('hidden'))
    carousel_banner.classList.add('hidden')
}
    document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('click', function (event) {
        let main_category_list = document.getElementById('main-category-list');
        if (!main_category_list.contains(event.target)){
            // console.log("click outside")
            hidden_all_child_category();
            // show carousel banner
            let carousel_banner = document.getElementById('carousel-banner')
            if (carousel_banner.classList.contains('hidden'))
                carousel_banner.classList.remove('hidden')
        }
    });
});
    function getSubcategory(category) {
        if(category.sub_categories.length > 0) {
            let html = `<ul class="text-gray-500">`;
            $.each(category.sub_categories, function(index, subCategory) {
                html += ` <li class="py-1">
                                <a href="#" class="hover:text-blue-700">${subCategory.name}</a>
                            `;
                html += getSubcategory(subCategory);
                html += '</li>';
            });
            html += '</ul>';
            return html;
        } else {
            return '';
        }
    }
