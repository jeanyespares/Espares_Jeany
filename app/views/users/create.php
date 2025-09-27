<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users List</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-sky-100 to-pink-100 p-8">

  <div class="bg-white/90 backdrop-blur-md p-6 rounded-3xl shadow-lg border border-sky-200 max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-semibold text-sky-600">Users</h2>
      <a href="<?= site_url('users/create'); ?>"
         class="bg-gradient-to-r from-sky-500 to-pink-400 text-white px-4 py-2 rounded-xl shadow-md hover:scale-105 transition">
        <i class="fa-solid fa-user-plus mr-2"></i> Add User
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-sky-200 text-sky-800">
            <th class="px-4 py-3 text-left">ID</th>
            <th class="px-4 py-3 text-left">First Name</th>
            <th class="px-4 py-3 text-left">Last Name</th>
            <th class="px-4 py-3 text-left">Email</th>
            <th class="px-4 py-3 text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
              <tr class="border-b hover:bg-sky-50">
                <td class="px-4 py-3"><?= $user['id']; ?></td>
                <td class="px-4 py-3"><?= $user['fname']; ?></td>
                <td class="px-4 py-3"><?= $user['lname']; ?></td>
                <td class="px-4 py-3"><?= $user['email']; ?></td>
                <td class="px-4 py-3 text-center space-x-2">
                  <a href="<?= site_url('users/update/' . $user['id']); ?>"
                     class="text-sky-600 hover:text-sky-800">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <a href="<?= site_url('users/delete/' . $user['id']); ?>"
                     onclick="return confirm('Are you sure you want to delete this user?')"
                     class="text-pink-500 hover:text-pink-700">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-center py-6 text-gray-500">
                No users found.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
