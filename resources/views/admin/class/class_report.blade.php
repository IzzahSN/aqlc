<x-admin-layout :title="'Class'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Class Report</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.class') }}" class="hover:text-green-600">Class</a></li>
                <li>/</li>
                <li>Report</li>
            </ol>
        </nav>
    </div>
</x-admin-layout>