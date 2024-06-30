<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Strona główna') }}
        </h2>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>

                <!-- Sekcja z najnowszymi wiadomościami -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Najnowsze wiadomości</h3>
                        <ul class="list-disc pl-5">
                            <li class="mb-2">Wiadomość 1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                            <li class="mb-2">Wiadomość 2: Sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.</li>
                            <li class="mb-2">Wiadomość 3: Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris.</li>
                        </ul>
                    </div>
                </div>

                <!-- Sekcja z nadchodzącymi wydarzeniami -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Nadchodzące wydarzenia
                        </h3>
                        <ul class="list-disc pl-5">
                            <li class="mb-2">Wydarzenie 1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                            <li class="mb-2">Wydarzenie 2: Sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.</li>
                            <li class="mb-2">Wydarzenie 3: Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris.</li>
                        </ul>
                    </div>
                </div>

                <!-- Sekcja z popularnymi artykułami -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Popularne artykuły</h3>
                        <ul class="list-disc pl-5">
                            <li class="mb-2">Artykuł 1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li class="mb-2">Artykuł 2: Sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.</li>
                            <li class="mb-2">Artykuł 3: Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('dark-mode-toggle');
        toggleButton.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
        });
    });
</script>

<style>
    body.dark-mode {
        background-color: #1a202c;
        color: #cbd5e0;
    }

    body.dark-mode h2 {
        color: #e2e8f0;
    }

    body.dark-mode .bg-white {
        background-color: #2d3748;
    }

    body.dark-mode .text-gray-900 {
        color: #cbd5e0;
    }

    body.dark-mode .text-gray-600 {
        color: #a0aec0;
    }

    body.dark-mode .border-gray-200 {
        border-color: #4a5568;
    }

    body.dark-mode .text-sm {
        color: #a0aec0;
    }

    body.dark-mode .bg-gray-800 {
        background-color: #2d3748;
    }

    body.dark-mode .shadow {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>
