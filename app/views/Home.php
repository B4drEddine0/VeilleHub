<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeilleHub - Technology Watch Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81'
                        },
                        secondary: {
                            50: '#faf5ff',
                            100: '#f3e8ff',
                            500: '#a855f7',
                            600: '#9333ea',
                            700: '#7e22ce'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .fc {
            max-width: 800px;
            margin: 0 auto;
        }
        .fc .fc-toolbar.fc-header-toolbar {
            margin-bottom: 1em;
            font-size: 0.9em;
        }
        .fc .fc-button {
            background-color: #4338ca;
            border-color: #4338ca;
        }
        .fc .fc-button:hover {
            background-color: #3730a3;
            border-color: #3730a3;
        }
        .fc .fc-daygrid-day {
            height: 80px !important;
        }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="bg-primary-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-white text-xl font-bold">VeilleHub</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/login" class="text-white hover:text-primary-200 transition duration-150">Login</a>
                    <a href="/register" class="bg-secondary-500 hover:bg-secondary-600 text-white px-4 py-2 rounded-md transition duration-150">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="relative bg-primary-900 h-[500px]">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-primary-900 to-primary-800 opacity-90"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl text-center">
                Welcome to VeilleHub
            </h1>
            <p class="mt-6 text-xl text-white max-w-3xl mx-auto text-center opacity-90">
                Your platform for technology watch presentations and knowledge sharing
            </p>
            <div class="mt-10 flex justify-center space-x-4">
                <a href="/register" 
                   class="bg-secondary-500 hover:bg-secondary-600 text-white px-8 py-3 rounded-md text-lg font-medium transition duration-150 transform hover:scale-105">
                    Get Started
                </a>
                <a href="#calendar" 
                   class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-primary-900 px-8 py-3 rounded-md text-lg font-medium transition duration-150">
                    View Schedule
                </a>
            </div>
        </div>
    </div>


    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-primary-900">Why Choose VeilleHub?</h2>
                <p class="mt-4 text-lg text-gray-600">Discover the benefits of our platform</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="p-6 bg-primary-50 rounded-xl hover:shadow-lg transition duration-300">
                    <div class="text-primary-500 mb-4">
                    </div>
                    <h3 class="text-xl font-semibold text-primary-900 mb-4">Share Knowledge</h3>
                    <p class="text-gray-600">Present your technology watch findings and learn from others in an engaging environment.</p>
                </div>
                <div class="p-6 bg-primary-50 rounded-xl hover:shadow-lg transition duration-300">
                    <div class="text-primary-500 mb-4">
                    </div>
                    <h3 class="text-xl font-semibold text-primary-900 mb-4">Track Progress</h3>
                    <p class="text-gray-600">Monitor your presentations and keep track of your learning journey with detailed analytics.</p>
                </div>
                <div class="p-6 bg-primary-50 rounded-xl hover:shadow-lg transition duration-300">
                    <div class="text-primary-500 mb-4">
                    </div>
                    <h3 class="text-xl font-semibold text-primary-900 mb-4">Collaborate</h3>
                    <p class="text-gray-600">Work with peers and share feedback on presentations in real-time.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="calendar" class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-primary-900 text-center mb-8">Upcoming Presentations</h2>
            <div class="bg-white rounded-xl shadow-xl p-6">
                <div id="calendar" class="max-w-3xl mx-auto"></div>
            </div>
        </div>
    </section>

    <footer class="bg-primary-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <div>
                    <h3 class="text-lg font-semibold mb-4">VeilleHub</h3>
                    <p class="text-primary-200">Your technology watch platform</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/about" class="text-primary-200 hover:text-white">About</a></li>
                        <li><a href="/contact" class="text-primary-200 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="/privacy" class="text-primary-200 hover:text-white">Privacy Policy</a></li>
                        <li><a href="/terms" class="text-primary-200 hover:text-white">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 text-center text-primary-200">
                <p>&copy; 2024 VeilleHub. All rights reserved.</p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 'auto',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                events: '/api/presentations',
                eventClick: function(info) {
                    if (!info.event.url) {
                        alert('Presentation: ' + info.event.title);
                    }
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>