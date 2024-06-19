<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body class="h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white shadow-lg rounded-lg overflow-hidden flex w-full max-w-4xl">
    <!-- Login Form Section -->
    <div class="w-full md:w-1/2 p-12 flex flex-col justify-center">
      <div class="logo">
        <img src="/images/logo.jpg" alt="Logo" class="w-32 mx-auto mb-4">
      </div>
      <div class="text-center">
        <h1 class="text-2xl font-bold text-gray-900 mb-4">LOGIN</h1>
      </div>
      @if (session('danger'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4" role="alert">
          {{ session('danger') }}.
        </div>
      @endif
      <form method="POST" action="/user/authenticate" class="flex-grow flex flex-col justify-center">
        @csrf
        <div class="mb-4 h-12">
          <input type="email"
            class="form-input w-full @error('email') border-red-500 @enderror p-3 rounded-md border border-gray-300 focus focus:outline-none focus:ring-green-500 focus:border-green-500 transition duration-500"
            placeholder="Masukkan Email Anda" name="email" id="email" value="">
          @error('email')
            <span class="text-red-500 text-sm" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="mb-4">
          <input type="password"
            class="form-input w-full @error('password') border-red-500 @enderror my-2 p-3 rounded-md border border-gray-300 focus focus:outline-none focus:ring-green-500 focus:border-green-500 transition duration-500"
            placeholder="Masukkan Password Anda" name="password" id="password" value="">
          @error('password')
            <span class="text-red-500 text-sm" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="flex items-center justify-between">
          <button type="submit"
            class="btn btn-primary w-full mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-2">Login</button>
        </div>
      </form>
    </div>

    <!-- Image Section -->
    <div class="hidden md:block md:w-1/2 bg-cover bg-center" style="background-image: url('/images/loginright.jpg');">
    </div>
  </div>

  <script>
    window.setTimeout(function() {
      document.querySelectorAll('.alert').forEach(alert => {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 500);
      });
    }, 3000);
  </script>
</body>

</html>