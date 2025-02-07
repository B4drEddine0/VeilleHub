<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeilleHub - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
    <!-- Navigation -->
    <nav class="bg-white shadow-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-primary-600 to-secondary-600 text-transparent bg-clip-text">VeilleHub</h1>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <button onclick="showSection('dashboard')" class="nav-btn border-primary-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Dashboard
                        </button>
                        <button onclick="showSection('users')" class="nav-btn border-transparent text-gray-500 hover:border-primary-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Manage Users
                        </button>
                        <button onclick="showSection('subjects')" class="nav-btn border-transparent text-gray-500 hover:border-primary-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Manage Subjects
                        </button>
                        <button onclick="showSection('schedule')" class="nav-btn border-transparent text-gray-500 hover:border-primary-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Schedule Presentations
                        </button>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <div class="flex items-center space-x-3">
                            <span class="text-gray-700 font-medium">Admin</span>
                            <button type="button" class="bg-gradient-to-r from-primary-500 to-secondary-500 p-0.5 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                <img class="h-8 w-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Admin&background=6366f1&color=fff" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <?php if(isset($_SESSION['message'])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-7xl mx-auto mt-4" role="alert">
            <span class="block sm:inline"><?= $_SESSION['message'] ?></span>
            <?php unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Dashboard Section -->
        <section id="dashboard-section" class="space-y-8">
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-primary-600 to-secondary-600 rounded-xl shadow-xl mb-8 p-8 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-3xl font-bold mb-2">Admin Dashboard</h2>
                    <p class="text-primary-100">Manage users, subjects, and schedule presentations.</p>
                </div>
                <div class="absolute right-0 top-0 h-full w-1/2 bg-white opacity-10 transform -skew-x-12"></div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Total Users -->
                <div class="bg-white rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-200 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-gradient-to-br from-primary-500 to-secondary-500 rounded-lg p-3 text-white">
                                    <i class="fas fa-users text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Users</dt>
                                    <dd class="text-3xl font-bold text-gray-900">125</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Users -->
                <div class="bg-white rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-200 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-gradient-to-br from-primary-500 to-secondary-500 rounded-lg p-3 text-white">
                                    <i class="fas fa-user-check text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Active Users</dt>
                                    <dd class="text-3xl font-bold text-gray-900">98</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Subjects -->
                <div class="bg-white rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-200 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-gradient-to-br from-primary-500 to-secondary-500 rounded-lg p-3 text-white">
                                    <i class="fas fa-clock text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Pending Subjects</dt>
                                    <dd class="text-3xl font-bold text-gray-900">12</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scheduled Presentations -->
                <div class="bg-white rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-200 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-gradient-to-br from-primary-500 to-secondary-500 rounded-lg p-3 text-white">
                                    <i class="fas fa-calendar-check text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Scheduled Presentations</dt>
                                    <dd class="text-3xl font-bold text-gray-900">8</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Manage Users Section -->
        <section id="users-section" class="hidden space-y-6">
            <div class="bg-white rounded-xl shadow-md">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Manage Users</h3>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=John+Doe" alt="">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($user['username']) ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?= htmlspecialchars($user['email']) ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <?= htmlspecialchars($user['status']) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <form action="/admin/updateUserStatus" method="POST">
                                            <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                            <select name="status" onchange="this.form.submit()" class="rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                                <option value="">Change Status</option>
                                                <option value="active" <?= $user['status'] == 'active' ? 'selected' : '' ?>>Activate</option>
                                                <option value="suspended" <?= $user['status'] == 'suspended' ? 'selected' : '' ?>>suspend</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                <!-- More user rows... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- Manage Subjects Section -->
        <section id="subjects-section" class="hidden space-y-6">
            <div class="bg-white rounded-xl shadow-md">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Subject Suggestions</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        <?php foreach($subjects as $sub): ?>
                        <div class="bg-gray-50 rounded-xl border border-gray-100 p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <h4 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($sub['title']) ?></h4>
                                    <div class="mt-2 flex items-center text-sm text-gray-500">
                                        <span class="mr-4"><i class="fas fa-user mr-2"></i>Suggested by: <?= htmlspecialchars($sub['username']) ?></span>
                                    </div>
                                </div>
                                <div class="flex space-x-3">
                                    <form action="/admin/handleSubject" method="POST" class="inline">
                                        <input type="hidden" name="subject_id" value="<?= $sub['sub_id'] ?>">
                                        <input type="hidden" name="action" value="approve">
                                        <button type="submit" class="px-4 py-2 bg-green-100 text-green-800 rounded-lg text-sm font-medium hover:bg-green-200 transition-colors">
                                            Approve
                                        </button>
                                    </form>
                                    <form action="/admin/handleSubject" method="POST" class="inline">
                                        <input type="hidden" name="subject_id" value="<?= $sub['sub_id'] ?>">
                                        <input type="hidden" name="action" value="decline">
                                        <button type="submit" class="px-4 py-2 bg-red-100 text-red-800 rounded-lg text-sm font-medium hover:bg-red-200 transition-colors">
                                            Decline
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <!-- More subject items... -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Schedule Presentations Section -->
        <section id="schedule-section" class="hidden space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Calendar -->
                <div class="bg-white rounded-xl shadow-md">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Presentation Calendar</h3>
                    </div>
                    <div class="p-6">
                        <div id="calendar" class="bg-white rounded-lg"></div>
                    </div>
                </div>

                <!-- Schedule Form -->
                <div class="bg-white rounded-xl shadow-md">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Schedule New Presentation</h3>
                    </div>
                    <div class="p-6">
                        <form action="/admin/schedulePresentation" method="POST" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Subject</label>
                                <select name="subject_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500" required>
                                    <option value="">Select Subject</option>
                                    <?php foreach($subjects as $subject): ?>
                                        <?php if($subject['status'] == 'approved'): ?>
                                            <option value="<?= $subject['id'] ?>"><?= htmlspecialchars($subject['title']) ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Presenters</label>
                                <select name="presenters[]" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500" required>
                                    <?php foreach($users as $user): ?>
                                        <?php if($user['status'] == 'active'): ?>
                                            <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['username']) ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <p class="mt-1 text-sm text-gray-500">Select at least 2 presenters</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Date & Time</label>
                                <input type="datetime-local" name="date_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500" required>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gradient-to-r from-primary-600 to-secondary-600 text-base font-medium text-white hover:from-primary-700 hover:to-secondary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:text-sm">
                                    Schedule Presentation
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Navigation
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('main > section').forEach(section => {
                section.classList.add('hidden');
            });
            
            // Show selected section
            document.getElementById(sectionId + '-section').classList.remove('hidden');
            
            // Update navigation styles
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('border-primary-500', 'text-gray-900');
                btn.classList.add('border-transparent', 'text-gray-500');
            });
            event.target.classList.remove('border-transparent', 'text-gray-500');
            event.target.classList.add('border-primary-500', 'text-gray-900');
        }

        // Initialize datetime picker
        flatpickr("#datetime-picker", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today"
        });

        // Initialize with dashboard view
        document.addEventListener('DOMContentLoaded', function() {
            showSection('dashboard');
        });
    </script>
</body>
</html>
