<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeilleHub - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="/js/auth.js" defer></script>
</head>
<body class="bg-gradient-to-br from-indigo-100 via-purple-50 to-teal-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-4xl w-full bg-white rounded-2xl shadow-xl flex flex-col md:flex-row">
            <div class="md:w-1/2 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-l-2xl p-8 text-white flex flex-col justify-between">
                <div class="mb-6">
                    <h2 class="text-4xl font-bold mb-4">VeilleHub</h2>
                    <p class="text-indigo-200 text-lg">Your Educational Watch Management Platform</p>
                </div>
                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-indigo-500/30 p-3 rounded-lg">
                            <i class="fas fa-graduation-cap text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Student Presentations</h3>
                            <p class="text-indigo-200 text-sm">Share knowledge with your peers</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-indigo-500/30 p-3 rounded-lg">
                            <i class="fas fa-calendar-alt text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Schedule Management</h3>
                            <p class="text-indigo-200 text-sm">Organize your presentations</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-indigo-500/30 p-3 rounded-lg">
                            <i class="fas fa-chart-line text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Track Progress</h3>
                            <p class="text-indigo-200 text-sm">Monitor your learning journey</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:w-1/2 p-8">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back!</h1>
                    <p class="text-gray-500">Sign in to continue your learning journey</p>
                </div>

                <form action="/login" method="POST" class="space-y-6">
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium text-gray-700 block">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" name="email" id="email" 
                                class="block w-full pl-10 px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="your@email.com" required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="text-sm font-medium text-gray-700 block">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" name="password" id="password" 
                                class="block w-full pl-10 px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="••••••••" required>
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <span class="ml-2 text-gray-600">Remember me</span>
                        </label>
                        <a href="/auth/forgot-password" class="text-indigo-600 hover:text-indigo-800">Forgot Password?</a>
                    </div>

                    <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                        Sign In
                    </button>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        Don't have an account? 
                        <a href="register" class="text-indigo-600 hover:text-indigo-800 font-semibold">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>