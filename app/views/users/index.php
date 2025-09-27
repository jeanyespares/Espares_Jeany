<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url(); ?>public/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-sky-100 to-pink-100 font-sans text-sm">
  <nav class="bg-gradient-to-r from-sky-400 to-pink-300 shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <div class="text-white font-semibold text-lg tracking-wide">
        <i class="fa-solid fa-laptop-code mr-2"></i> BSIT Member List
      </div>
    </div>
  </nav>

  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-3xl p-8 border border-sky-200">
      <h2 class="text-xl font-semibold text-sky-600 mb-4">Registered BSIT Students</h2>

      <div class="flex justify-end mb-6">
        <a href="<?= site_url('users/create') ?>"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-sky-500 to-pink-400 text-white font-semibold px-5 py-2 rounded-full shadow-md">
          <i class="fa-solid fa-user-plus"></i> Create New User
        </a>
      </div>

      <div class="overflow-x-auto rounded-xl border border-sky-200 shadow-sm">
        <table class="w-full text-center border border-sky-200 border-collapse">
          <thead class="bg-gradient-to-r from-sky-400 to-pink-300 text-white text-sm uppercase tracking-wide">
            <tr>
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Last Name</th>
              <th class="py-3 px-4">First Name</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($users)): ?>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td class="py-3 px-4"><?= html_escape($user['id']); ?></td>
                  <td class="py-3 px-4"><?= html_escape($user['lname']); ?></td>
                  <td class="py-3 px-4"><?= html_escape($user['fname']); ?></td>
                  <td class="py-3 px-4"><?= html_escape($user['email']); ?></td>
                  <td class="py-3 px-4">
                    <a href="<?= site_url('users/update/'.$user['id']); ?>" class="mr-2">Update</a>
                    <a href="<?= site_url('users/delete/'.$user['id']); ?>" onclick="return confirm('Delete this user?')">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="5" class="py-6">No records found.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</body>
</html>
