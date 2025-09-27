<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body { font-family: 'Inter', sans-serif; background: linear-gradient(to bottom right, #e0f2fe, #fbcfe8); background-attachment: fixed; }
    h2, label { font-family: 'Poppins', sans-serif; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px);} to { opacity: 1; transform: translateY(0);} }
    .animate-fadeIn { animation: fadeIn 0.8s ease; }
  </style>
</head>
<body class="min-h-screen flex flex-col text-sm text-slate-700">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-sky-400 to-pink-300 shadow-md">
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
      <div class="text-white font-semibold text-lg tracking-wide">
        <i class="fa-solid fa-laptop-code mr-2"></i> BSIT Member Update
      </div>
    </div>
  </nav>

  <!-- Update Form -->
  <div class="flex-grow flex items-center justify-center px-4">
    <div class="bg-white/90 backdrop-blur-md p-8 rounded-3xl shadow-2xl w-full max-w-lg border border-sky-200 animate-fadeIn">

      <h2 class="text-2xl font-semibold text-center text-sky-600 mb-6">Update Profile</h2>

      <form action="<?= site_url('users/update/'.$user['id']) ?>" method="POST" class="space-y-5">
        
        <!-- First Name -->
        <div>
          <label class="block text-slate-700 mb-1 font-medium">First Name</label>
          <div class="relative">
            <i class="fa-solid fa-user text-sky-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
            <input type="text" name="fname" value="<?= html_escape($user['fname']) ?>" required
                   class="w-full pl-10 pr-4 py-3 border border-sky-300 rounded-xl bg-white focus:ring-2 focus:ring-sky-400 focus:outline-none shadow-sm transition">
          </div>
        </div>

        <!-- Last Name -->
        <div>
          <label class="block text-slate-700 mb-1 font-medium">Last Name</label>
          <div class="relative">
            <i class="fa-solid fa-user-tag text-sky-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
            <input type="text" name="lname" value="<?= html_escape($user['lname']) ?>" required
                   class="w-full pl-10 pr-4 py-3 border border-sky-300 rounded-xl bg-white focus:ring-2 focus:ring-sky-400 focus:outline-none shadow-sm transition">
          </div>
        </div>

        <!-- Email -->
        <div>
          <label class="block text-slate-700 mb-1 font-medium">Email Address</label>
          <div class="relative">
            <i class="fa-solid fa-envelope text-sky-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
            <input type="email" name="email" value="<?= html_escape($user['email']) ?>" required
                   class="w-full pl-10 pr-4 py-3 border border-sky-300 rounded-xl bg-white focus:ring-2 focus:ring-sky-400 focus:outline-none shadow-sm transition">
          </div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between gap-3">
          <a href="<?= site_url('users') ?>"
             class="w-1/2 text-center bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium py-3 rounded-xl shadow transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Back
          </a>
          <button type="submit"
                  class="w-1/2 bg-gradient-to-r from-sky-500 to-pink-400 hover:from-sky-600 hover:to-pink-500 text-white font-medium py-3 rounded-xl shadow-md transition transform hover:scale-105">
            <i class="fa-solid fa-pen-to-square mr-2"></i> Update
          </button>
        </div>
      </form>

    </div>
  </div>
</body>
</html>
