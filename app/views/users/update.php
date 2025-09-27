<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <!-- Card -->
  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Update Record</h2>

    <!-- ✅ Use user ID instead of segment() -->
    <form action="<?= site_url('users/update/' . segment(4)); ?>" method="POST" class="space-y-4">

      <!-- Username -->
      <div>
        <label class="block text-gray-700 mb-1">Username</label>
        <input type="text" id="username" name="username"  
               value="<?= html_escape($user['username']); ?>" required
               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300 outline-none">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-gray-700 mb-1">Email</label>
        <input type="email" name="email" 
               value="<?= html_escape($user['email']); ?>" required
               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300 outline-none">
      </div>

      <!-- Submit -->
      <button type="submit" 
              class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
        Update
      </button>
    </form>

   
  </div>

</body>
</html>
cdn.tailwindcss.com