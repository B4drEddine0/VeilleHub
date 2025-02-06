<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeilleHub - Student Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-2xl font-bold text-indigo-600">VeilleHub</h1>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="/student/dashboard" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Dashboard
                        </a>
                        <a href="/student/presentations" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            My Presentations
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <button id="suggestSubjectBtn" class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-plus -ml-1 mr-2"></i>
                            <span>Suggest Subject</span>
                        </button>
                    </div>
                    <div class="ml-3 relative">
                        <div class="flex items-center">
                            <button type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=John%20Doe&background=6366f1&color=fff" alt="">
                            </button>
                            <span class="ml-3 text-gray-700">John Doe</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Stats Section -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 mb-8">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-lightbulb text-2xl text-yellow-400"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    My Suggestions
                                </dt>
                                <dd class="text-3xl font-semibold text-gray-900">
                                    5
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-presentation text-2xl text-blue-500"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Upcoming Presentations
                                </dt>
                                <dd class="text-3xl font-semibold text-gray-900">
                                    3
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-2xl text-green-500"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Completed Presentations
                                </dt>
                                <dd class="text-3xl font-semibold text-gray-900">
                                    8
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Suggestions -->
        <div class="bg-white shadow rounded-lg mb-8">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Recent Suggestions
                </h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <div class="flow-root">
                    <ul role="list" class="-my-5 divide-y divide-gray-200">
                        <div class="mt-4 space-y-4">
                            <!-- Sample Suggestion Item -->
                            <div class="bg-white p-4 rounded-lg shadow">
                                <h4 class="text-lg font-semibold text-gray-900">Machine Learning Basics</h4>
                                <p class="text-gray-600 mt-1">Status: Pending</p>
                                <div class="mt-2 text-sm text-gray-500">Suggested on: Feb 6, 2025</div>
                            </div>
                            
                            <div class="bg-white p-4 rounded-lg shadow">
                                <h4 class="text-lg font-semibold text-gray-900">Web Security Best Practices</h4>
                                <p class="text-gray-600 mt-1">Status: Approved</p>
                                <div class="mt-2 text-sm text-gray-500">Suggested on: Feb 5, 2025</div>
                            </div>
                            
                            <div class="bg-white p-4 rounded-lg shadow">
                                <h4 class="text-lg font-semibold text-gray-900">Cloud Computing Fundamentals</h4>
                                <p class="text-gray-600 mt-1">Status: Pending</p>
                                <div class="mt-2 text-sm text-gray-500">Suggested on: Feb 4, 2025</div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- Suggest Subject Modal -->
    <div id="suggestModal" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                        <i class="fas fa-lightbulb text-indigo-600"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Suggest a Subject
                        </h3>
                        <div class="mt-4">
                            <form id="suggestForm" class="space-y-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Subject Title</label>
                                    <input type="text" name="title" id="title" required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" id="description" rows="4" required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                </div>
                                <div>
                                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                    <select name="category" id="category" required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Select a category</option>
                                        <option value="web">Web Development</option>
                                        <option value="mobile">Mobile Development</option>
                                        <option value="ai">Artificial Intelligence</option>
                                        <option value="data">Data Science</option>
                                        <option value="security">Cybersecurity</option>
                                        <option value="cloud">Cloud Computing</option>
                                    </select>
                                </div>
                                <div id="form-error" class="text-red-500 text-sm hidden"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <button type="button" id="submitSuggestion"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Submit Suggestion
                    </button>
                    <button type="button" id="closeSuggestModal"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal handling
        const modal = document.getElementById('suggestModal');
        const openModalBtn = document.getElementById('suggestSubjectBtn');
        const closeModalBtn = document.getElementById('closeSuggestModal');
        const submitBtn = document.getElementById('submitSuggestion');
        const form = document.getElementById('suggestForm');
        const formError = document.getElementById('form-error');

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            form.reset();
            formError.classList.add('hidden');
        });

        // Close modal when clicking outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                form.reset();
                formError.classList.add('hidden');
            }
        });

        // Handle form submission
        submitBtn.addEventListener('click', async () => {
            formError.classList.add('hidden');
            const formData = new FormData(form);

            try {
                const response = await fetch('/student/suggest', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    modal.classList.add('hidden');
                    form.reset();
                    // Reload the page to show the new suggestion
                    window.location.reload();
                } else {
                    formError.textContent = data.error;
                    formError.classList.remove('hidden');
                }
            } catch (error) {
                formError.textContent = 'An error occurred. Please try again.';
                formError.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>
