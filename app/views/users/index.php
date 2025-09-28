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
  <style>
    body { font-family: 'Inter', sans-serif; }
    h2, th { font-family: 'Poppins', sans-serif; }
    th, td { border: 1px solid #bae6fd; }
    .pagination ul { display: flex; gap: 6px; justify-content: center; margin-top: 20px; list-style: none; padding: 0; }
    .pagination li a {
      display: inline-block; padding: 6px 12px; border: 1px solid #ddd;
      border-radius: 9999px; background: white; color: #0369a1; font-weight: 500;
      transition: all 0.3s ease;
    }
    .pagination li a:hover { background: #f0f9ff; color: #0ea5e9; }
    .pagination .active a {
      background: linear-gradient(to right, #38bdf8, #ec4899);
      color: white; border: none; font-weight: 600;
    }
  </style>
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
        <a href="<?= base_url('index.php/users/create') ?>"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-sky-500 to-pink-400 hover:from-sky-600 hover:to-pink-500 text-white font-semibold px-5 py-2 rounded-full shadow-md transition-all duration-300 hover:scale-105">
          <i class="fa-solid fa-user-plus"></i> Create New User
        </a>
      </div>

      <div class="overflow-x-auto rounded-xl border border-sky-200 shadow-sm">
        <table class="w-full text-center border border-sky-200 border-collapse">
          <thead class="sticky top-0 z-10 shadow bg-gradient-to-r from-sky-400 to-pink-300 text-white text-sm uppercase tracking-wide">
            <tr>
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Last Name</th> <th class="py-3 px-4">First Name</th> 
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="text-slate-700 text-sm divide-y divide-sky-100">
            <?php if (!empty($users)): ?>
              <?php foreach ($users as $user): ?>
                <tr class="even:bg-white odd:bg-sky-50 hover:bg-sky-100 transition-all duration-200 ease-in-out">
                  <td class="py-3 px-4 font-medium text-slate-600"><?= html_escape($user['id']); ?></td>
                  <td class="py-3 px-4"><?= html_escape($user['lname']); ?></td>   <td class="py-3 px-4"><?= html_escape($user['fname']); ?></td>   <td class="py-3 px-4">
                    <span class="bg-sky-100 text-sky-700 text-sm font-semibold px-3 py-1 rounded-full">
                      <?= html_escape($user['email']); ?>
                    </span>
                  </td>
                  <td class="py-3 px-4">
                    <div class="flex justify-center gap-2">
                      <a href="<?= base_url('index.php/users/update/'.$user['id']); ?>"
                         class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-300 to-yellow-400 hover:from-yellow-400 hover:to-yellow-500 text-slate-800 font-medium px-4 py-2 rounded-full shadow-md transition-all duration-300 hover:scale-105 hover:shadow-yellow-200"
                         title="Edit this user">
                        <i class="fa-solid fa-pen-to-square"></i> Update
                      </a>
                      <a href="<?= base_url('index.php/users/delete/'.$user['id']); ?>"
                         onclick="return confirm('Are you sure you want to delete this user?');"
                         class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-400 to-red-400 hover:from-red-500 hover:to-red-600 text-white font-medium px-4 py-2 rounded-full shadow-md transition-all duration-300 hover:scale-105 hover:shadow-red-200"
                         title="Remove this user">
                        <i class="fa-solid fa-trash"></i> Delete
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="py-3 text-slate-500">No records found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <div class="pagination mt-6">
        <?php if (isset($links) && !empty($links)): ?>
          <?= $links; ?>
        <?php endif; ?>
      </div>

    </div>
  </div>

</body>
</html>