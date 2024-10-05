<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindScape - Every Mind Matters</title>

    <!-- Meta SEO -->
    <meta name="title" content="MindScape Landing Page - Mental Health Support">
    <meta name="description" content="MindScape provides mental health support, resources, and tools to help you take control of your well-being. Explore articles, helplines, and connect with local support groups.">
    <meta name="author" content="MindScape Team">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <meta name="theme-color" content="#5b21b6">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900">

    <!-- Header and Navigation -->
    <header class="fixed w-full bg-white dark:bg-gray-900 z-10">
        <nav class="border-gray-200 py-4">
            <div class="max-w-screen-xl mx-auto px-4 flex justify-between items-center">
                <a href="#" class="flex items-center">
                    <span class="text-2xl font-semibold dark:text-white">MindScape</span>
                </a>

                <!-- Dark/Light Mode Toggle -->
                <button id="theme-toggle" class="p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <svg id="theme-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m7.4-11.5l-.7.7m-11 0l-.7-.7m0 11.3l.7-.7m11-11l.7.7m0 11.3l-.7-.7M12 5a7 7 0 100 14 7 7 0 000-14z" />
                    </svg>
                    <svg id="theme-icon-dark" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.764 15.9a10.046 10.046 0 01-7.057 7.057 10.045 10.045 0 01-12.193-12.192 10.047 10.047 0 017.057-7.056 10.046 10.046 0 017.057 7.056A10.045 10.045 0 0121.764 15.9z" />
                    </svg>
                </button>

                <!-- Authentication Links -->
                <div class="space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-black bg-gray-200 rounded-md hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-black bg-gray-200 rounded-md hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 text-black bg-gray-200 rounded-md hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl xl:text-6xl dark:text-white">Every Mind Matters</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    At MindScape, we believe mental health should be accessible to all. Our platform offers resources, helplines, and tools to help you manage your mental well-being. Explore articles, find support, and take the first step towards a healthier mind.
                </p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-white bg-purple-700 rounded-lg sm:w-auto hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 dark:focus:ring-purple-800">Explore Resources</a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center w-full px-5 py-3 mb-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Join Our Community</a>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="/img/mh-01.jpg" alt="Mental Health Support Image">
            </div>                
        </div>
    </section>

    <!-- Services Section -->
    <section class="bg-gray-100 dark:bg-gray-800">
        <div class="max-w-screen-xl px-4 py-12 mx-auto lg:px-6">
            <h2 class="text-3xl font-extrabold text-center text-gray-900 dark:text-white">How We Can Help</h2>
            <p class="max-w-screen-md mx-auto mb-8 text-center text-gray-500 lg:text-lg dark:text-gray-400">We offer a wide range of services to cater to your mental health needs.</p>
            <div class="grid gap-8 lg:grid-cols-3">
                <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-900">
                    <h3 class="text-xl font-bold dark:text-white">24/7 Helplines</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">Connect with trained professionals who are available around the clock to offer guidance and support.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-900">
                    <h3 class="text-xl font-bold dark:text-white">Resource Library</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">Access a wide range of articles, tools, and self-help guides tailored to your mental health journey.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-900">
                    <h3 class="text-xl font-bold dark:text-white">Support Groups</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">Join our community support groups and find strength in shared experiences.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-purple-700">
        <div class="max-w-screen-xl px-4 py-12 mx-auto text-center">
            <h2 class="text-3xl font-extrabold text-white">Take the First Step</h2>
            <p class="max-w-screen-md mx-auto mb-8 text-lg text-gray-200">Your mental health journey starts here. Connect with our resources and take control of your well-being today.</p>
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-6 py-3 text-lg font-medium text-white bg-purple-800 rounded-lg hover:bg-purple-900">Get Started</a>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-12 mx-auto lg:px-6">
            <h2 class="text-3xl font-extrabold text-center text-gray-900 dark:text-white">Frequently Asked Questions</h2>
            <div class="grid gap-8 mt-6 lg:grid-cols-2">
                <div class="p-6 bg-gray-100 rounded-lg dark:bg-gray-800">
                    <h3 class="font-semibold text-gray-900 dark:text-white">What services do you offer?</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">We offer helplines, a resource library, and community support groups to help you navigate your mental health journey.</p>
                </div>
                <div class="p-6 bg-gray-100 rounded-lg dark:bg-gray-800">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Is there a cost to access your services?</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">No, our services are free and designed to make mental health support accessible to everyone.</p>
                </div>
                <div class="p-6 bg-gray-100 rounded-lg dark:bg-gray-800">
                    <h3 class="font-semibold text-gray-900 dark:text-white">How can I join a support group?</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">You can sign up for our community support groups through our platform after logging in.</p>
                </div>
                <div class="p-6 bg-gray-100 rounded-lg dark:bg-gray-800">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Who can I contact for more information?</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">For more information, please contact us through our contact form or email support.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800">
        <div class="max-w-screen-xl px-4 py-6 mx-auto text-center text-gray-400">
            <p>&copy; 2024 MindScape. All rights reserved.</p>
           
        </div>
    </footer>

    <!-- Script for Dark/Light Mode -->
    <script>
        const toggleButton = document.getElementById('theme-toggle');
        const icon = document.getElementById('theme-icon');
        const iconDark = document.getElementById('theme-icon-dark');

        toggleButton.onclick = () => {
            document.body.classList.toggle('dark');
            icon.classList.toggle('hidden');
            iconDark.classList.toggle('hidden');

            // Save the user's preference in local storage
            if (document.body.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        };

        // Load the user's theme preference on page load
        window.onload = () => {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark') {
                document.body.classList.add('dark');
                icon.classList.add('hidden');
                iconDark.classList.remove('hidden');
            }
        };
    </script>

</body>
</html>
