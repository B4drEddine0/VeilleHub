<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeilleHub - Student Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-primary-600 to-secondary-600 text-transparent bg-clip-text">VeilleHub</h1>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="/student/dashboard" class="border-primary-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Dashboard
                        </a>
                        <a href="/student/presentations" class="border-transparent text-gray-500 hover:border-primary-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            My Presentations
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <button id="suggestSubjectBtn" class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-primary-600 to-secondary-600 shadow-md hover:from-primary-700 hover:to-secondary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transform transition-all duration-200 hover:scale-105">
                            <i class="fas fa-lightbulb -ml-1 mr-2"></i>
                            <span>Suggest Subject</span>
                        </button>
                    </div>
                    <div class="relative">
                        <div class="flex items-center space-x-3">
                        <span class="text-gray-700 font-medium"><?= $_SESSION['username']?></span>
                            <a href="/logout" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="ml-1">Logout</span>
                            </a>
                            <button type="button" class="bg-gradient-to-r from-primary-500 to-secondary-500 p-0.5 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=John%20Doe&background=6366f1&color=fff" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Welcome Banner -->
        <div id="welcomeSection" class="bg-gradient-to-r from-primary-600 to-secondary-600 rounded-xl shadow-xl mb-8 p-8 text-white relative overflow-hidden">
            <div class="relative z-10">
                <h2 class="text-3xl font-bold mb-2">Welcome back, John!</h2>
                <p class="text-primary-100">Track your learning progress and suggest new subjects for the community.</p>
            </div>
            <div class="absolute right-0 top-0 h-full w-1/2 bg-white opacity-10 transform -skew-x-12"></div>
        </div>

        <!-- Stats Grid -->
        <div id="statsSection" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-8">
            <!-- Suggestions Stats -->
            <div class="bg-white rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-200 transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-gradient-to-br from-primary-500 to-secondary-500 rounded-lg p-3 text-white">
                                <i class="fas fa-lightbulb text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">My Suggestions</dt>
                                <dd class="text-3xl font-bold text-gray-900"><?= count($countsuggest)?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Presentations -->
            <div class="bg-white rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-200 transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-gradient-to-br from-primary-500 to-secondary-500 rounded-lg p-3 text-white">
                                <i class="fas fa-calendar-alt text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Upcoming Presentations</dt>
                                <dd class="text-3xl font-bold text-gray-900"><?= count($upcomingPresentations)?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed Presentations -->
            <div class="bg-white rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-200 transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-gradient-to-br from-primary-500 to-secondary-500 rounded-lg p-3 text-white">
                                <i class="fas fa-check-circle text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Completed Presentations</dt>
                                <dd class="text-3xl font-bold text-gray-900"><?= count($pastPresentations)?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Suggestions Section -->
        <div id="suggestionsSection" class="bg-white rounded-xl shadow-md border border-gray-100">
            <div class="px-6 py-5 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Recent Suggestions</h3>
            </div>
            <div class="p-6">
                <div class="space-y-6">
                    <?php foreach($Suggestions as $suggest):?>
                    <div class="bg-gray-50 rounded-xl border border-gray-100 hover:border-primary-300 transition-all duration-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3">
                                    <h4 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($suggest['title'])?></h4>
                                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                    <?= htmlspecialchars($suggest['status'])?>
                                    </span>
                                </div>
                                <div class="mt-3 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-clock mr-2"></i>
                                    Suggested By: <?= htmlspecialchars($suggest['username'])?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>

        <!-- Presentations Calendar Section -->
        <div id="presentationsSection" class="hidden bg-white rounded-xl shadow-md border border-gray-100 mb-8">
            <div class="px-6 py-5 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">My Presentations Calendar</h3>
            </div>
            <div class="p-6" style="height: calc(80vh - 8rem);">
                <div id='calendar' class="h-full"></div>
            </div>
        </div>

        <!-- Upcoming and Past Presentations Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Upcoming Presentations -->
            <div class="bg-white rounded-xl shadow-md border border-gray-100">
                <div class="px-6 py-5 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Présentations à venir</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <?php foreach($upcomingPresentations as $presentation): ?>
                            <div class="presentation-card">
                                <h3><?php echo htmlspecialchars($presentation['subject_title'] ?? 'No Title'); ?></h3>
                                <p>Date: <?php echo htmlspecialchars(date('Y-m-d H:i', strtotime($presentation['presentation_date']))); ?></p>
                                <p>Presenters: <?php echo htmlspecialchars($presentation['presenters'] ?? 'No presenters assigned'); ?></p>
                            </div>
                        <?php endforeach; ?>
                        <?php if(empty($upcomingPresentations)): ?>
                            <p class="text-gray-500 text-center py-4">Aucune présentation à venir</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Past Presentations -->
            <div class="bg-white rounded-xl shadow-md border border-gray-100">
                <div class="px-6 py-5 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Présentations passées</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <?php foreach($pastPresentations as $presentation): ?>
                            <div class="presentation-card">
                                <h3><?php echo htmlspecialchars($presentation['subject_title'] ?? 'No Title'); ?></h3>
                                <p>Date: <?php echo htmlspecialchars(date('Y-m-d H:i', strtotime($presentation['presentation_date']))); ?></p>
                                <p>Presenters: <?php echo htmlspecialchars($presentation['presenters'] ?? 'No presenters assigned'); ?></p>
                            </div>
                        <?php endforeach; ?>
                        <?php if(empty($pastPresentations)): ?>
                            <p class="text-gray-500 text-center py-4">Aucune présentation passée</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Suggest Subject Modal -->
    <div id="suggestModal" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-middle bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-4 pb-4 sm:p-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-gradient-to-br from-primary-500 to-secondary-500 sm:mx-0">
                            <i class="fas fa-lightbulb text-white"></i>
                        </div>
                        <div class="mt-0 text-center sm:mt-0 sm:ml-3 sm:text-left">
                            <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">
                                Suggest New Subject
                            </h3>
                            <div class="mt-3">
                                <form action="/subject/suggest" method="POST">
                                    <div class="space-y-3">
                                        <div>
                                            <label for="title" class="block text-sm font-medium text-gray-700">Subject Title</label>
                                            <input type="text" 
                                                   name="title" 
                                                   id="title" 
                                                   required
                                                   class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-2 border-gray-300 rounded-lg p-2 hover:border-primary-400">
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                                            <button type="submit" 
                                                    class="w-full inline-flex justify-center items-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-gradient-to-r from-primary-600 to-secondary-600 text-sm font-medium text-white hover:from-primary-700 hover:to-secondary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:w-auto transform transition-all duration-200 hover:scale-105">
                                                Submit Suggestion
                                            </button>
                                            <button type="button" 
                                                    id="closeSuggestModal"
                                                    class="mt-3 w-full inline-flex justify-center items-center rounded-lg border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:w-auto">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal elements
        const modal = document.getElementById('suggestModal');
        const openModalBtn = document.getElementById('suggestSubjectBtn');
        const closeModalBtn = document.getElementById('closeSuggestModal');

        // Section elements
        const welcomeSection = document.getElementById('welcomeSection');
        const statsSection = document.getElementById('statsSection');
        const suggestionsSection = document.getElementById('suggestionsSection');
        const presentationsSection = document.getElementById('presentationsSection');
        const presentationsLink = document.querySelector('a[href="/student/presentations"]');
        const calendarEl = document.getElementById('calendar');

        // Modal event handlers
        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });

        // Calendar initialization
        var events = <?php echo json_encode(array_map(function($presentation) {
            return [
                'id' => $presentation['id'],
                'title' => $presentation['title'],
                'start' => $presentation['date'] . 'T' . $presentation['time'],
                'description' => 'Presenters: ' . $presentation['presenters'],
                'backgroundColor' => $presentation['status'] === 'completed' ? '#4CAF50' : '#2196F3',
                'borderColor' => $presentation['status'] === 'completed' ? '#4CAF50' : '#2196F3'
            ];
        }, $presentations ?? [])); ?>;

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: events,
            eventDidMount: function(info) {
                // Initialize Bootstrap tooltip
                const tooltip = new bootstrap.Tooltip(info.el, {
                    title: info.event.extendedProps.description,
                    placement: 'top',
                    trigger: 'hover',
                    container: 'body'
                });
            }
        });

        // Navigation event handlers
        if (presentationsLink) {
            presentationsLink.addEventListener('click', function(e) {
                e.preventDefault();
                welcomeSection.classList.add('hidden');
                statsSection.classList.add('hidden');
                suggestionsSection.classList.add('hidden');
                presentationsSection.classList.remove('hidden');
                presentationsLink.classList.add('border-primary-500', 'text-gray-900');
                presentationsLink.classList.remove('border-transparent', 'text-gray-500');
                
                const dashboardLink = document.querySelector('a[href="/student/dashboard"]');
                dashboardLink.classList.remove('border-primary-500', 'text-gray-900');
                dashboardLink.classList.add('border-transparent', 'text-gray-500');
                
                calendar.render();  // Render calendar when section becomes visible
                calendar.updateSize();
            });
        }

        const dashboardLink = document.querySelector('a[href="/student/dashboard"]');
        if (dashboardLink) {
            dashboardLink.addEventListener('click', function(e) {
                e.preventDefault();
                welcomeSection.classList.remove('hidden');
                statsSection.classList.remove('hidden');
                suggestionsSection.classList.remove('hidden');
                presentationsSection.classList.add('hidden');
                this.classList.add('border-primary-500', 'text-gray-900');
                this.classList.remove('border-transparent', 'text-gray-500');
                
                presentationsLink.classList.remove('border-primary-500', 'text-gray-900');
                presentationsLink.classList.add('border-transparent', 'text-gray-500');
            });
        }

        // Initial calendar render
        calendar.render();
    });
    </script>
</body>
</html>
