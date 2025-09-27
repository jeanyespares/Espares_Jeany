<!doctype html>
<html>
<head><meta charset="utf-8"><title>Create</title></head>
<body>
  <form action="<?= site_url('users/create') ?>" method="post">
    <input name="fname" required placeholder="First name">
    <input name="lname" required placeholder="Last name">
    <input name="email" required placeholder="Email" type="email">
    <button type="submit">Create</button>
  </form>
</body>
</html>
git