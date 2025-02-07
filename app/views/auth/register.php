<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeilleHub - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="/js/auth.js" defer></script>
    <script src="/js/auth-forms.js" defer></script>
</head>
<body class="bg-gradient-to-br from-indigo-100 via-purple-50 to-teal-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-4xl w-full bg-white rounded-2xl shadow-xl flex flex-col md:flex-row">
            <div class="md:w-1/2 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-l-2xl p-6 text-white flex flex-col justify-between">
                <div class="mb-4">
                    <h2 class="text-3xl font-bold mb-2">VeilleHub</h2>
                    <p class="text-indigo-200">Join Our Educational Watch Platform</p>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-indigo-500/30 p-2 rounded-lg">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-sm">Join the Community</h3>
                            <p class="text-indigo-200 text-xs">Connect with fellow learners</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="bg-indigo-500/30 p-2 rounded-lg">
                            <i class="fas fa-lightbulb text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-sm">Share Knowledge</h3>
                            <p class="text-indigo-200 text-xs">Present and learn from others</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="bg-indigo-500/30 p-2 rounded-lg">
                            <i class="fas fa-chart-bar text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-sm">Track Your Growth</h3>
                            <p class="text-indigo-200 text-xs">Monitor your progress</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:w-1/2 p-6">
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-1">Create Account</h1>
                    <p class="text-gray-500 text-sm">Join us to start your learning journey</p>
                </div>

                <form action="/register" method="POST" class="space-y-4">
                    <div class="space-y-1">
                        <label for="username" class="text-sm font-medium text-gray-700 block">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" name="username" id="username" 
                                class="block w-full pl-10 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="johnsmith" required>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="email" class="text-sm font-medium text-gray-700 block">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" name="email" id="email" 
                                class="block w-full pl-10 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="your@email.com" required>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="password" class="text-sm font-medium text-gray-700 block">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" name="password" id="password" 
                                class="block w-full pl-10 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="••••••••" required
                                minlength="8"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 characters">
                        </div>
                        <p class="text-xs text-gray-500">Must be 8+ characters with numbers and letters</p>
                    </div>

                    <div class="space-y-1">
                        <label for="password_confirm" class="text-sm font-medium text-gray-700 block">Confirm Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" name="password_confirm" id="password_confirm" 
                                class="block w-full pl-10 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="••••••••" required>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="role" class="text-sm font-medium text-gray-700 block">Role</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user-tag text-gray-400"></i>
                            </div>
                            <select name="role" id="role" 
                                class="block w-full pl-10 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent" 
                                required>
                                <option value="">Select a role</option>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                            </select>
                        </div>
                    </div>

                    <div id="general-error" class="text-red-500 text-sm text-center hidden"></div>

                    <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                        Create Account
                    </button>

                    <p class="text-center text-sm text-gray-600">
                        Already have an account? 
                        <a href="/login" class="text-indigo-600 hover:text-indigo-800 font-semibold">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>