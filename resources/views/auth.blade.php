<!DOCTYPE html>
<html lang="en">
<head>
<link href="assets/img/smada.ico  " rel="icon">

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | SI APEM</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/framer-motion"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-image: url("assets/img/smada.png");
      background-repeat: no-repeat;
      background-size: cover;
      min-height: 100vh;
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
    }
    .glass {
      background: linear-gradient(135deg,rgba(16, 188, 105, 0.7),rgba(14, 128, 73, 0.7));
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-radius: 1.5rem;
      border: 1px solid rgb(0, 189, 3);
    }
  </style>
</head>
<body class="flex items-center justify-center px-6 py-10">
  <div class="w-full max-w-md glass p-8 shadow-2xl text-white animate-fadeIn">
            @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
    <h2 class="text-3xl font-bold text-center mb-6 tracking-wide">👨‍💻 Login</h2>
    <form action="{{route('login')}}" method="POST" class="space-y-6">
      @csrf
      <div>
        <label for="id" class="block text-sm mb-2">User ID</label>
        <input type="text" name="id" placeholder="Enter your ID" required
          class="w-full px-4 py-3 rounded-xl bg-gray-800 bg-opacity-60 text-white focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300"/>
      </div>

      <div>
        <label for="password" class="block text-sm mb-2">Password</label>
        <input type="password" name="password" placeholder="••••••••" required
          class="w-full px-4 py-3 rounded-xl bg-gray-800 bg-opacity-60 text-white focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300"/>
      </div>

      <button type="submit"
        class="w-full py-3 mt-4 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-indigo-600 hover:to-blue-500 text-white font-semibold text-lg shadow-lg transform hover:scale-105 transition duration-300">
        🔐 Login
      </button>
    </form>
  </div>

  <!-- Animation (Optional using Animate.css) -->
  <script>
    document.querySelector('.glass').classList.add('animate__animated', 'animate__fadeInDown');
  </script>
</body>
</html>
