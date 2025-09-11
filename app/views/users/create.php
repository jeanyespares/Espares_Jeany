<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to bottom right, #fbcfe8, #e0f2fe);
      background-attachment: fixed;
    }

    h2, label {
      font-family: 'Poppins', sans-serif;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes pulseIcon {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.2); }
    }

    .animate-fadeIn { animation: fadeIn 0.8s ease forwards; }
    .animate-delay-1 { animation-delay: 0.2s; }
    .animate-delay-2 { animation-delay: 0.4s; }
    .animate-delay-3 { animation-delay: 0.6s; }
    .animate-delay-4 { animation-delay: 0.8s; }
    .icon-pulse:hover i { animation: pulseIcon 0.6s ease-in-out; }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center text-sm text-slate-700">

  <div class="bg-white/90 backdrop-blur-lg p-8 rounded-3xl shadow-[0_8px_24px_rgba(0,0,0,0.1)] w-full max-w-md animate-fadeIn border border-sky-200">

    <!-- BSIT-Themed Header -->
    <div class="flex flex-col items-center mb-6 animate-fadeIn animate-delay-1">
      <div class="bg-gradient-to-br from-sky-400 to-pink-300 rounded-full p-3 shadow-md">
        <i class="fa-solid fa-laptop-code text-white text-3xl"></i>
      </div>
      <h2 class="text-2xl font-bold text-slate-700 mt-3">Welcome BSIT Student</h2>
    </div>

    <!-- Form -->
    <form action="<?=site_url('users/create')?>" method="POST" class="space-y-5">

      <!-- First Name -->
      <div class="relative animate-fadeIn animate-delay-2">
        <label class="block text-slate-700 mb-1 font-medium">First Name</label>
        <div class="relative">
          <i class="fa-solid fa-user text-sky-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
          <input type="text" name="fname" placeholder="Enter your first name" required
                 class="w-full pl-10 pr-4 py-3 border border-sky-300 rounded-xl bg-white focus:ring-2 focus:ring-sky-400 focus:outline-none shadow-sm transition duration-200 placeholder-slate-400">
        </div>
      </div>

      <!-- Last Name -->
      <div class="relative animate-fadeIn animate-delay-3">
        <label class="block text-slate-700 mb-1 font-medium">Last Name</label>
        <div class="relative">
          <i class="fa-solid fa-user-tag text-sky-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
          <input type="text" name="lname" placeholder="Enter your last name" required
                 class="w-full pl-10 pr-4 py-3 border border-sky-300 rounded-xl bg-white focus:ring-2 focus:ring-sky-400 focus:outline-none shadow-sm transition duration-200 placeholder-slate-400">
        </div>
      </div>

      <!-- Email -->
      <div class="relative animate-fadeIn animate-delay-4">
        <label class="block text-slate-700 mb-1 font-medium">Email Address</label>
        <div class="relative">
          <i class="fa-solid fa-envelope text-sky-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
          <input type="email" name="email" placeholder="Enter your email" required
                 class="w-full pl-10 pr-4 py-3 border border-sky-300 rounded-xl bg-white focus:ring-2 focus:ring-sky-400 focus:outline-none shadow-sm transition duration-200 placeholder-slate-400">
        </div>
      </div>

      <!-- Sign Up Button -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-sky-500 to-pink-400 hover:from-sky-600 hover:to-pink-500 text-white font-semibold py-3 rounded-xl shadow-lg transition duration-300 transform hover:scale-105 hover:shadow-sky-200 animate-fadeIn animate-delay-4 icon-pulse">
        <i class=" "></i> Sign In
      </button>

    </form>
  </div>
</body>
</html>