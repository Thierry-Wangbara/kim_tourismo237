<div class="fixed inset-0 bg-white dark:bg-gray-900 flex items-center justify-center z-50" x-data="{ show: true }" x-show="show" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div class="text-center">
        <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-indigo-600 mx-auto mb-4"></div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Tourismo Kim</h2>
        <p class="text-gray-600 dark:text-gray-300">Chargement...</p>
    </div>
</div>

<script>
    // Hide loading screen after page load
    window.addEventListener('load', function() {
        setTimeout(() => {
            const loading = document.querySelector('[x-data*="show"]');
            if (loading) {
                loading._x_dataStack[0].show = false;
            }
        }, 1000);
    });
</script>
