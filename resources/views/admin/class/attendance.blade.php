<x-admin-layout :title="'Schedule'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Attendance Report</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.schedule') }}" class="hover:text-green-600">Schedule</a></li>
                <li>/</li>
                <li>Attendance</li>
            </ol>
        </nav>
    </div>
</x-admin-layout>