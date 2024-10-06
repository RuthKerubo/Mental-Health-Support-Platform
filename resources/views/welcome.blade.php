<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindScape - Every Mind Matters</title>

    <!-- Meta SEO -->
    <meta name="title" content="MindScape Landing Page - Mental Health Support">
    <meta name="description" content="MindScape provides mental health support, resources, and tools to help you take control of your well-being.">
    <meta name="author" content="MindScape Team">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <meta name="theme-color" content="#5b21b6">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-white transition-colors duration-200">
    <!-- Header and Navigation -->
    <header class="fixed w-full bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm z-10 border-b border-gray-200 dark:border-gray-700">
        <nav class="py-4">
            <div class="max-w-screen-xl mx-auto px-4 flex justify-between items-center">
                <a href="#" class="flex items-center">
                    <span class="text-2xl font-semibold text-primary-800 dark:text-primary-400">MindScape</span>
                </a>

                <!-- Dark/Light Mode Toggle -->
                <button id="theme-toggle" type="button" class="rounded-lg p-2.5 text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                    </svg>
                </button>

                <!-- Authentication Links -->
                <div class="space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors duration-200">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors duration-200">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 text-white bg-primary-600 rounded-lg hover:bg-primary-700 dark:hover:bg-primary-500 transition-colors duration-200">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="pt-28 pb-16">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid lg:grid-cols-12 gap-8 lg:gap-12">
                <div class="lg:col-span-7">
                    <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl xl:text-6xl mb-6">
                        Every Mind Matters
                    </h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">
                        At MindScape, we believe mental health should be accessible to all. Our platform offers resources, helplines, and tools to help you manage your mental well-being.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-white bg-purple-700 rounded-lg sm:w-auto hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 dark:focus:ring-purple-800">Explore Resources</a>
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center w-full px-5 py-3 mb-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Join Our Community</a>
                    </div>
                </div>
                <div class="hidden lg:block lg:col-span-5">
                    <img src="/img/mh-01.jpg" alt="Mental Health Support" class="rounded-lg shadow-xl">
                </div>
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
    <!-- Dark Mode Script -->
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        const themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {
            // Toggle icons
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // If is set in localStorage
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>
</body>
</html>