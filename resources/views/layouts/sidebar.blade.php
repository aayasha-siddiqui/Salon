<aside
    class="fixed top-16 left-0 h-[calc(100%-4rem)] w-64 bg-white border-r shadow-md z-50
           transform transition-transform duration-300
           md:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>
<!-- Mobile Header with Close Button -->
    <div class="flex items-center justify-between p-4 border-b md:hidden">
        <h1 class="text-lg font-bold">A1makeover</h1>

        <!-- Black Close Button -->
        <button @click="sidebarOpen = false"
            class="bg-black text-white w-8 h-8 flex items-center justify-center rounded">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <nav class="p-4 space-y-2 text-gray-700 overflow-y-auto">

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-200">
            <i class="fas fa-tachometer-alt w-5"></i>
            <span class="ml-3">Dashboard</span>
        </a>

        <!-- Student Dropdown -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex items-center justify-between w-full px-3 py-2 rounded hover:bg-gray-200">
                <span class="flex items-center">
                    <i class="fas fa-user-graduate w-5"></i>
                    <span class="ml-3">Student</span>
                </span>
                <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>
            <div x-show="open" x-transition class="ml-8 mt-1 space-y-1">
                <a href="{{ route('admin.students.index') }}" class="block px-2 py-1 text-sm hover:bg-gray-100 rounded"><li>Student Detail</li></a>
                <a href="#" class="block px-2 py-1 text-sm hover:bg-gray-100 rounded"><li>KYC / Documents</li></a>
            </div>
        </div>

        <!-- Courses Dropdown -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex items-center justify-between w-full px-3 py-2 rounded hover:bg-gray-200">
                <span class="flex items-center">
                    <i class="fas fa-book w-5"></i>
                    <span class="ml-3">Courses</span>
                </span>
                <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>
            <div x-show="open" x-transition class="ml-8 mt-1 space-y-1">
                <a href="{{ route('admin.courses.index') }}" class="block px-2 py-1 text-sm hover:bg-gray-100 rounded">Course Detail</a>
                <a href="#" class="block px-2 py-1 text-sm hover:bg-gray-100 rounded">Course Modules</a>
            </div>
        </div>

        <!-- Fees Dropdown -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex items-center justify-between w-full px-3 py-2 rounded hover:bg-gray-200">
                <span class="flex items-center">
                    <i class="fas fa-money-bill-wave w-5"></i>
                    <span class="ml-3">Fees</span>
                </span>
                <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>
            <div x-show="open" x-transition class="ml-8 mt-1 space-y-1">
                <a href="#" class="block px-2 py-1 text-sm hover:bg-gray-100 rounded">Add Fees Structure</a>
                <a href="#" class="block px-2 py-1 text-sm hover:bg-gray-100 rounded">Record Payment</a>
            </div>
        </div>

        <a href="{{ route('admin.trainers.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-200">
            <i class="fas fa-chalkboard-teacher w-5"></i>
            <span class="ml-3">Trainers</span>
        </a>

       <a href="{{ route('admin.enquiries.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-200">
    <i class="fas fa-question-circle w-5"></i>
    <span class="ml-3">Enquiry</span>
</a>


        <a href="{{ route('admin.certificate.create') }}" 
   class="flex items-center px-3 py-2 rounded hover:bg-gray-200">
    <i class="fas fa-certificate w-5"></i>
    <span class="ml-3">Certificate</span>
</a>


    </nav>
</aside>
