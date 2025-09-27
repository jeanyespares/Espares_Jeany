<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-xl p-6 w-full max-w-4xl">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Welcome to Index View</h1>
        
        <!-- Create Record Button -->
        <div class="flex justify-end mb-4">
            <a href="<?= site_url('/users/create'); ?>"
               class="bg-green-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-green-700 transition transform hover:scale-105">
                + Create Record
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-green-600 text-white">
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Username</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach(html_escape($users) as $user): ?>
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-4 py-3"><?= $user['id']; ?></td>
                        <td class="px-4 py-3 font-medium text-gray-700"><?= $user['username']; ?></td>
                        <td class="px-4 py-3 text-gray-600"><?= $user['email']; ?></td>
                        <td class="px-4 py-3 text-gray-600 space-x-2">
                            <a href="<?= site_url('users/update/'.$user['id']);?>" 
                               class="text-blue-600 hover:underline font-medium">Update</a>
                            |
                            <a href="<?= site_url('users/delete/'.$user['id']);?>" 
                               class="text-red-600 hover:underline font-medium">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
cdn.tailwindcss.com