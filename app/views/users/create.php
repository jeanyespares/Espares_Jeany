<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* ===== BACKGROUND ===== */
    body {
      background: radial-gradient(circle at 20% 20%, #0f0c29, #302b63, #24243e);
      overflow-x: hidden;
    }
    /* Glowing border card */
    .glow-border {
      border: 1px solid rgba(0, 255, 255, 0.4);
      box-shadow: 0 0 20px rgba(0, 255, 255, 0.2),
                  0 0 40px rgba(0, 200, 255, 0.1);
    }
    /* Fade in */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.9s ease forwards;
    }
    /* Neon pulse ring around icon */
    .icon-pulse {
      box-shadow: 0 0 20px #00e0ff,
                  0 0 40px #00bfff,
                  0 0 60px #00bfff;
    }
    input::placeholder {
      color: #9ca3af;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center font-sans text-gray-200">

  <!-- SIGN UP CARD -->
  <div class="bg-black/40 backdrop-blur-xl p-8 rounded-3xl glow-border w-full max-w-md animate-fadeIn">

    <!-- Header Icon + Title -->
    <div class="flex flex-col items-center mb-6">
      <div class="bg-gradient-to-br from-cyan-500 to-purple-600 rounded-full p-4 shadow-lg icon-pulse">
        <i class="fa-solid fa-user-astronaut text-white text-3xl"></i>
      </div>
      <h2 class="text-2xl font-extrabold text-cyan-400 mt-3 tracking-widest drop-shadow-[0_0_6px_#00e0ff]">
        Create Student Account
      </h2>
      <p class="text-gray-400 text-sm tracking-wide mt-1">Step into the future of learning </p>
    </div>

    <!-- Form -->
    <form action="<?= site_url('users/create') ?>" method="POST" class="space-y-6">
      
      <!-- First Name -->
      <div>
        <label class="block text-cyan-300 mb-1 font-medium tracking-wide">First Name</label>
        <input type="text" name="first_name" placeholder="Enter your first name" required
               class="w-full px-4 py-3 bg-black/50 text-gray-100 border border-cyan-500 rounded-xl
                      focus:ring-2 focus:ring-cyan-400 focus:outline-none transition duration-200">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-cyan-300 mb-1 font-medium tracking-wide">Last Name</label>
        <input type="text" name="last_name" placeholder="Enter your last name" required
               class="w-full px-4 py-3 bg-black/50 text-gray-100 border border-cyan-500 rounded-xl
                      focus:ring-2 focus:ring-cyan-400 focus:outline-none transition duration-200">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-cyan-300 mb-1 font-medium tracking-wide">Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required
               class="w-full px-4 py-3 bg-black/50 text-gray-100 border border-cyan-500 rounded-xl
                      focus:ring-2 focus:ring-cyan-400 focus:outline-none transition duration-200">
      </div>

      <!-- Sign Up Button -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-cyan-500 to-purple-600 hover:from-purple-600 hover:to-pink-600
                     text-white font-semibold py-3 rounded-xl shadow-lg transition duration-300
                     transform hover:scale-105 hover:shadow-cyan-500/40">
        <i class="fa-solid fa-user-plus mr-2"></i> Sign Up
      </button>
    </form>

  </div>
</body>
</html>
