{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - KasirExpress</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="w-full max-w-sm bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">KasirExpress Login</h2>

    @if(session('status'))
      <div class="mb-4 text-sm text-green-600">{{ session('status') }}</div>
    @endif

    @if($errors->any())
      <div class="mb-4 text-sm text-red-600">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
      @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" required
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" required
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
      </div>

     

      <button type="submit"
              class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
        Login
      </button>
    </form>

    <p class="mt-4 text-sm text-center">
      Belum punya akun?
      <a href="{{ route('register') }}" class="text-indigo-500 hover:underline">Daftar</a>
    </p>
  </div>

</body>
</html>
