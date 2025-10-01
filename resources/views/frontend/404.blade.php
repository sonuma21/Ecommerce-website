<style>
    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    @keyframes bg-pulse {
        0% {
            background-color: #f3f4f6;
        }

        50% {
            background-color: #e5e7eb;
        }

        100% {
            background-color: #f3f4f6;
        }
    }

    .float-animation {
        animation: float 3s ease-in-out infinite;
    }

    .bg-pulse {
        animation: bg-pulse 10s ease-in-out infinite;
    }

    .magnifying-glass {
        width: 100px;
        height: 100px;
        position: relative;
        margin: 0 auto;
    }

    .glass-circle {
        width: 60px;
        height: 60px;
        border: 8px solid #4b5563;
        border-radius: 50%;
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .glass-handle {
        width: 40px;
        height: 10px;
        background: #4b5563;
        position: absolute;
        bottom: 20px;
        right: 10px;
        transform: rotate(-45deg);
    }
</style>
<x-frontend-layout>
    <section class="py-16 ">

        <div class="text-center">
            <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg text-center">
            <img src="" alt="404 Not Found" class="w-32 h-32 mx-auto mb-4">
        </div>
            <h2 class="text-3xl font-semibold text-gray-800 mt-4">Page Not Found</h2>
            <p class="text-gray-600 mt-2">Sorry, our detective couldn't find the page you're looking for.</p>
            <a href="/"
                class="mt-6 inline-block px-6 py-3 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition-colors duration-300">Return
                Home</a>
        </div>
    </section>
</x-frontend-layout>
