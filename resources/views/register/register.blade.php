<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>
<body>
    <div class="max-w-6xl mx-auto min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
          <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Register</h2>
          <form action="{{route('register')}}" method="POST">
            @csrf
            <!-- Name -->
            <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
              <input
                type="text"
                id="name"
                name="name"
                required
                class="mt-1 block w-full text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              />
            </div>

            <!-- Email -->
            <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <input
                type="email"
                id="email"
                name="email"
                required
                class="mt-1 block w-full text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              />
            </div>

            <!-- Password -->
            <div class="mb-4">
              <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
              <input
                type="password"
                id="password"
                name="password"
                required
                class="mt-1 block w-full text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
              <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
              <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                required
                class="mt-1 block w-full text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              />
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
              <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
              >
                Register
              </button>
            </div>
          </form>
        </div>
      </div>

</body>
</html>
