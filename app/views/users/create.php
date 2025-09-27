<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-sky-100 to-pink-100">

  <div class="bg-white/90 backdrop-blur-md p-8 rounded-3xl shadow-lg w-full max-w-md border border-sky-200">
    <h2 class="text-2xl font-semibold text-center text-sky-600 mb-6">Add New User</h2>

    <form action="<?= site_url('users/create'); ?>" method="POST" class="space-y-5">
      <div>
        <label class="block mb-1 font-medium">First Name</label>
        <input type="text" name="fname" required
               class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-sky-400">
      </div>

      <div>
        <label class="block mb-1 font-medium">Last Name</label>
        <input type="text" name="lname" required
               class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-sky-400">
      </div>

      <div>
        <label class="block mb-1 font-medium">Email</label>
        <input type="email" name="email" required
               class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-sky-400">
      </div>

      <button type="submit"
              class="w-full bg-gradient-to-r from-sky-500 to-pink-400 text-white font-medium py-3 rounded-xl shadow-md transition duration-300 hover:scale-105">
        <i class="fa-solid fa-user-plus mr-2"></i> Create
      </button>
    </form>
  </div>
</body>
</html>
