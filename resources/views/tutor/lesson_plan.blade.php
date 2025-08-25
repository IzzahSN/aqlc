<x-tutor-layout :title="'Report'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Lesson Plan Report</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('tutor.report') }}" class="hover:text-green-600">Report</a></li>
                <li>/</li>
                <li>Lesson Plan</li>
            </ol>
        </nav>
    </div>
</x-tutor-layout>