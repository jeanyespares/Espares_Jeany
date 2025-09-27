<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User - Neon Matrix</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: radial-gradient(circle at top left, #0f0c29, #302b63, #24243e);
      font-family: 'Poppins', sans-serif;
    }
    .glow-border {
      border: 1px solid rgba(0, 255, 255, 0.35);
      box-shadow: 0 0 20px rgba(0, 255, 255, 0.25);
      backdrop-filter: blur(18px);
    }
    .glow-btn {
      background: linear-gradient(to right, #06b6d4, #9333ea);
      color: #fff;
      transition: all 0.3s ease;
    }
    .glow-btn:hover {
      background: linear-gradient(to right, #9333ea, #ec4899);
      transform: scale(1.05);
      box-shadow: 0 0 15px #06b6d4;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center text-gray-200 p-6">

  <div class="bg-white/10 glow-border p-8 rounded-3xl w-full max-w-md">
    
    <!-- Header -->
    <div class="flex flex-col items-center mb-8">
      <div class="bg-gradient-to-br from-cyan-500 to-purple-600 rounded-full p-5 shadow-lg animate-pulse">
        <i class="fa-solid fa-user-gear text-white text-4xl"></i>
      </div>
      <h2 class="text-2xl font-bold text-cyan-400 mt-4 tracking-wide">
        Update User Information
      </h2>
      <p class="text-gray-400 text-sm">Keep your profile futuristic ✨</p>
    </div>

    <!-- Update Form -->
    <form action="<?= site_url('users/update/'.$user['id']) ?>" method="POST" class="space-y-6">
      
      <!-- First Name -->
      <div>
        <label class="block text-cyan-300 mb-1 font-medium">First Name</label>
        <input type="text" name="first_name" value="<?= html_escape($user['first_name']) ?>" required
          class="w-full px-4 py-3 bg-black/40 text-gray-200 border border-cyan-600 rounded-xl
                 focus:ring-2 focus:ring-cyan-400 focus:outline-none shadow-sm transition duration-200">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-cyan-300 mb-1 font-medium">Last Name</label>
        <input type="text" name="last_name" value="<?= html_escape($user['last_name']) ?>" required
          class="w-full px-4 py-3 bg-black/40 text-gray-200 border border-cyan-600 rounded-xl
                 focus:ring-2 focus:ring-cyan-400 focus:outline-none shadow-sm transition duration-200">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-cyan-300 mb-1 font-medium">Email Address</label>
        <input type="email" name="email" value="<?= html_escape($user['email']) ?>" required
          class="w-full px-4 py-3 bg-black/40 text-gray-200 border border-cyan-600 rounded-xl
                 focus:ring-2 focus:ring-cyan-400 focus:outline-none shadow-sm transition duration-200">
      </div>

      <!-- Save Button -->
      <button type="submit"
        class="w-full glow-btn font-semibold py-3 rounded-xl shadow-lg flex items-center justify-center gap-2">
        <i class="fa-solid fa-save"></i> Save Changes
      </button>

      <!-- Back to Directory -->
      <a href="<?= site_url() ?>"
        class="block text-center mt-4 text-cyan-300 hover:text-cyan-400 transition">
        ← Back to User Directory
      </a>
    </form>
  </div>

</body>
</html>
