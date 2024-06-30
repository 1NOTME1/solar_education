<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 dark:text-dark-200 leading-tight">
            {{ __('Strona główna') }}
        </h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="bg-white dark:bg-dark-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-dark-800 text-dark-900 dark:text-dark-100">
                        <h3 class="text-lg font-medium text-dark-900 dark:text-dark-100 mb-4">Informacje o projekcie</h3>
                        <p class="text-dark-700 dark:text-dark-300">Witaj na stronie głównej projektu
                            edukacyjnego poświęconego astronomii. Znajdziesz tutaj najnowsze wiadomości, wydarzenia oraz
                            popularne zjawiska astronomiczne.<br><br>
                            Poniżej zanjdziesz aktualne wydażenia i najnowsze posty z sekcji forum.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white dark:bg-dark-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white dark:bg-dark-800 text-dark-900 dark:text-dark-100">
                            <h3 class="text-lg font-medium text-dark-900 dark:text-dark-100 mb-4">Najnowsze posty na
                                forum</h3>
                            <ul class="list-disc pl-5">
                                @foreach ($posts as $post)
                                    <li class="mb-2 text-dark-700 dark:text-dark-300">{{ $post->tresc }}
                                        ({{ $post->data_publikacji }})</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-dark-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white dark:bg-dark-800 text-dark-900 dark:text-dark-100">
                            <h3 class="text-lg font-medium text-dark-900 dark:text-dark-100 mb-4">Nadchodzące wydarzenia
                                astronomiczne</h3>
                            <ul class="list-disc pl-5">
                                @foreach ($upcomingEvents as $event)
                                    <li class="mb-2 text-dark-700 dark:text-dark-300">{{ $event->nazwa }} -
                                        {{ $event->data_zjawiska }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-dark-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-dark-800 text-dark-900 dark:text-dark-100">
                        <h3 class="text-lg font-medium text-dark-900 dark:text-dark-100 mb-4">Popularne zjawiska
                            astronomiczne</h3>
                        <ul class="list-disc pl-5">
                            @foreach ($popularPhenomena as $phenomenon)
                                <li class="mb-2 text-dark-700 dark:text-dark-300">{{ $phenomenon->nazwa }}</li>
                            @endforeach
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
    body.dark-mode .text-dark-900 {
        color: #cbd5e0;
    }
    body.dark-mode .text-dark-600 {
        color: #a0aec0;
    }
    body.dark-mode .border-dark-200 {
        border-color: #4a5568;
    }
    body.dark-mode .text-sm {
        color: #a0aec0;
    }
    body.dark-mode .bg-dark-800 {
        background-color: #2d3748;
    }
    body.dark-mode .shadow {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    li {
        color: #1a202c;
    }
</style>
