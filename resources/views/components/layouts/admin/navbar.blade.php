<nav class=" border-blue-600 bg-blue-300  ">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
            پنل ادمین فروشگاه
        </a>
        <form action="{{ route('admin.search.results') }}" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="جستجو" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">جستجو</button>
        </form>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 " id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-10 h-10 rounded-full"  src="{{auth()->user()->image}}" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-blue-100 divide-y divide-gray-100 rounded-lg shadow " id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->username  }}</span>
                    <span class="block text-sm  text-gray-500 truncate ">{{ auth()->user()->email  }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('admin.profile.edit')  }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">پروفایل</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">تنضیمات</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">اعلان ها </a>
                    </li>
                    <li>
                        <a href="{{ route('logout')  }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">خروج</a>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</nav>
