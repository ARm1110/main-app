<div class="container mx-auto mt-8 p-4">
    <h2 class="text-2xl font-semibold mb-4">آمار داشبورد</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- افزودن بلوک‌های آماری یا اطلاعاتی به دلخواه -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">تعداد کاربران</h3>
            <p class="text-gray-700">
                {{ $data['users'] }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">سفارشات جدید</h3>
            <p class="text-gray-700">
                {{ $data['orders'] }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">درآمد ماهیانه</h3>
            <p class="text-gray-700">
                {{ $data['income'] }}
            </p>
        </div>
    </div>
</div>
