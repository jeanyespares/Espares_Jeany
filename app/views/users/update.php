<!doctype html>
<html>
<head><meta charset="utf-8"><title>Update</title></head>
<body>
  <form action="<?= site_url('users/update/'.$user['id']) ?>" method="post">
    <input name="fname" required value="<?= html_escape($user['fname']) ?>">
    <input name="lname" required value="<?= html_escape($user['lname']) ?>">
    <input name="email" required type="email" value="<?= html_escape($user['email']) ?>">
    <button type="submit">Update</button>
  </form>
</body>
</html>
