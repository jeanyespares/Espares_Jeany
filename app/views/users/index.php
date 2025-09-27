<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory - Neon Matrix</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: radial-gradient(circle at top left, #0f0c29, #302b63, #24243e);
      font-family: 'Poppins', sans-serif;
    }
    .glow-card {
      border: 1px solid rgba(0, 255, 255, 0.3);
      box-shadow: 0 0 20px rgba(0, 255, 255, 0.25);
      backdrop-filter: blur(20px);
    }
    .glow-btn {
      background: linear-gradient(to right, #06b6d4, #9333ea);
      color: #fff;
      transition: 0.3s ease;
    }
    .glow-btn:hover {
      background: linear-gradient(to right, #9333ea, #ec4899);
      transform: scale(1.05);
      box-shadow: 0 0 15px #06b6d4;
    }
    .cyber-th {
      background: linear-gradient(to right, rgba(6,182,212,0.8), rgba(147,51,234,0.8));
      text-shadow: 0 0 6px #06b6d4;
    }
    .cyber-td {
      border-bottom: 1px solid rgba(0,255,255,0.15);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center text-gray-200 p-6">

  <div class="w-full max-w-6xl glow-card rounded-3xl p-6">

    <!-- Header Actions -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
      
      <!-- Search -->
      <form method="get" action="<?=site_url()?>" class="flex w-full md:w-auto">
        <input type="text" name="q" value="<?=html_escape($_GET['q'] ?? '')?>"
          placeholder="Search student..."
          class="px-4 py-2 rounded-l-xl bg-black/40 border border-cyan-500 text-gray-200 placeholder-cyan-300
                 focus:outline-none focus:ring-2 focus:ring-cyan-400 w-full md:w-72">
        <button type="submit"
          class="px-4 py-2 rounded-r-xl glow-btn font-semibold shadow-lg">
          <i class="fa fa-search"></i>
        </button>
      </form>

      <!-- Add New -->
      <a href="<?=site_url('users/create')?>"
         class="glow-btn px-6 py-2 rounded-xl font-bold shadow-lg inline-flex items-center gap-2">
         <i class="fa-solid fa-user-plus"></i> Add New User
      </a>
    </div>

    <!-- User Table -->
    <div class="overflow-x-auto rounded-2xl border border-cyan-500/40 shadow-xl">
      <table class="w-full text-center border-collapse">
        <thead>
          <tr class="cyber-th text-white uppercase text-sm tracking-wider">
            <th class="py-3 px-4">ID</th>
            <th class="py-3 px-4">Lastname</th>
            <th class="py-3 px-4">Firstname</th>
            <th class="py-3 px-4">Email</th>
            <th class="py-3 px-4">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($users as $user): ?>
          <tr class="hover:bg-cyan-500/10 transition duration-300">
            <td class="py-3 px-4 cyber-td"><?=($user['id']);?></td>
            <td class="py-3 px-4 cyber-td"><?=($user['last_name']);?></td>
            <td class="py-3 px-4 cyber-td"><?=($user['first_name']);?></td>
            <td class="py-3 px-4 cyber-td">
              <span class="bg-cyan-600/20 px-3 py-1 rounded-full text-cyan-300 font-semibold">
                <?=($user['email']);?>
              </span>
            </td>
            <td class="py-3 px-4 flex justify-center gap-3 cyber-td">
              <a href="<?=site_url('users/update/'.$user['id']);?>"
                 class="glow-btn px-3 py-1 rounded-xl text-sm flex items-center gap-1">
                 <i class="fa-solid fa-pen-to-square"></i> Update
              </a>
              <a href="<?=site_url('users/delete/'.$user['id']);?>"
                 class="glow-btn px-3 py-1 rounded-xl text-sm flex items-center gap-1">
                 <i class="fa-solid fa-trash"></i> Delete
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
      <?php if(!empty($page)): 
        echo str_replace(
          ['<ul>', '</ul>', '<li>', '</li>', '<a', '</a>'],
          ['<div class="flex space-x-2">', '</div>', '', '', '<a class="px-4 py-2 rounded-xl bg-black/40 text-cyan-300 border border-cyan-500 hover:bg-cyan-500/20 transition"', '</a>'],
          $page
        );
      endif; ?>
    </div>

  </div>

</body>
</html>
