<aside class="w-80 h-screen bg-gray-50">
    <div>
        <ul class="space-y-2 font-medium">
            <li class="hover:bg-green-400">
                <a href="{{ route('admin.show.panel') }}"  class="flex items-center  hover:text-white hover:font-bold  p-2 text-gray-900 rounded-lg">
                    <span class="ms-3">خانه</span>
                </a>
            </li>
            <li class="hover:bg-green-400">
                <a href="{{ route('admin.category.index') }}"  class="flex items-center hover:text-white hover:font-bold p-2 text-gray-900 rounded-lg">
                    <span class="ms-3"> دسته بندی اصلی</span>
                </a>
            </li>
            <li class="hover:bg-green-400">
                <a href="{{ route('admin.subcategory.index') }}"  class="flex items-center hover:text-white hover:font-bold p-2 text-gray-900 rounded-lg">

                    <span class="ms-3"> زیردسته</span>
                </a>
            </li>
            <li class="hover:bg-green-400">
                <a href="{{ route('admin.childcategory.index') }}" class="flex items-center hover:text-white hover:font-bold p-2 text-gray-900 rounded-lg  group">

                    <span class="ms-3"> دسته بندی فرعی</span>
                </a>
            </li>
            <li class="hover:bg-green-400">
                <a href="{{ route('admin.product.index') }}" class="flex items-center hover:text-white hover:font-bold p-2 text-gray-900 rounded-lg">
                    <span class="ms-3">محصولات</span>
                </a>
            </li>
            <li class="hover:bg-green-400 ">
                <a href="{{ route('admin.order.index') }}" class="flex items-center hover:text-white hover:font-bold p-2 text-gray-900 rounded-lg">
                   <span class="ms-3">سفارشات</span>
                </a>
            </li>
            <li class="hover:bg-green-400">
                <a href="{{ route('admin.product.index') }}" class="flex items-center hover:text-white hover:font-bold p-2 text-gray-900 rounded-lg">
                    <span class="ms-3">پرداخت ها  </span>
                </a>
            </li>
        </ul>
    </div>
</aside>
