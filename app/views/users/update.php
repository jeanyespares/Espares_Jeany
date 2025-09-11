<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to bottom right, #e0f2fe, #fbcfe8);
      background-attachment: fixed;
    }

    h2, label {
      font-family: 'Poppins', sans-serif;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideInLeft {
      from { opacity: 0; transform: translateX(-30px); }
      to { opacity: 1; transform: translateX(0); }
    }

    @keyframes floatUp {
      0% { transform: translateY(0); }
      50% { transform: translateY(-5px); }
      100% { transform: translateY(0); }
    }

    .animate-fadeIn {
      animation: fadeIn 0.8s ease;
    }

    .animate-slideIn {
      animation: slideInLeft 0.6s ease forwards;
    }

    .animate-float {
      animation: floatUp 3s ease-in-out infinite;
    }

    .hover-pulse:hover {
      transform: scale(1.03);
      box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.2);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center text-sm text-slate-700">

  <div class="bg-white/90 backdrop-blur-md p-8 rounded-3xl shadow-[0_8px_24px_rgba(0,0,0,0.1)] w-full max-w-md animate-fadeIn animate-float border border-sky-200">

    <!-- Refined Header -->
    <h2 class="text-2xl font-semibold text-center text-sky-600 mb-6">
      Update Your BSIT Profile
    </h2>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-5">

      <!-- First Name -->
      <div class="relative animate-slideIn">
        <label class="block text-slate-700 mb-1 font-medium">First Name</label>
        <div class="relative">
          <i class="fa-solid fa-user text-sky-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
          <input type="text" name="fname" value="<?= html_escape($user['fname'])?>" required
                 class="w-full pl-10 pr-4 py-3 border border-sky-300 rounded-xl bg-white focus:ring-2 focus:ring-sky-400 focus:outline-none shadow-sm transition duration-200 placeholder-slate-400">
        </div>
      </div>

      <!-- Last Name -->
      <div class="relative animate-slideIn">
        <label class="block text-slate-700 mb-1 font-medium">Last Name</label>
        <div class="relative">
          <i class="fa-solid fa-user-tag text-sky-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
          <input type="text" name="lname" value="<?= html_escape($user['lname'])?>" required
                 class="w-full pl-10 pr-4 py-3 border border-sky-300 rounded-xl bg-white focus:ring-2 focus:ring-sky-400 focus:outline-none shadow-sm transition duration-200 placeholder-slate-400">
        </div>
      </div>

      <!-- Email -->
      <div class="relative animate-slideIn">
        <label class="block text-slate-700 mb-1 font-medium">Email Address</label>
        <div class="relative">
          <i class="fa-solid fa-envelope text-sky-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
          <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
                 class="w-full pl-10 pr-4 py-3 border border-sky-300 rounded-xl bg-white focus:ring-2 focus:ring-sky-400 focus:outline-none shadow-sm transition duration-200 placeholder-slate-400">
        </div>
      </div>

      <!-- Button -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-sky-500 to-pink-400 hover:from-sky-600 hover:to-pink-500 text-white font-medium py-3 rounded-xl shadow-md transition duration-300 transform hover:scale-105 hover-pulse">
        <i class="fa-solid fa-pen-to-square mr-2"></i> Update
      </button>
    </form>
  </div>
</body>
</html>