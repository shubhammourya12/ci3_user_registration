<h2>Edit User</h2>

<form method="post"
      action="<?= base_url('index.php/users/update/'.$user->id) ?>">

    Name:<br>
    <input type="text"
           name="name"
           value="<?= $user->name ?>">
    <br><br>

    Email:<br>
    <input type="email"
           name="email"
           value="<?= $user->email ?>">
    <br><br>

    Phone:<br>
    <input type="text"
           name="phone"
           value="<?= $user->phone ?>">
    <br><br>

    City:<br>
    <input type="text"
           name="city"
           value="<?= $user->city ?>">
    <br><br>

    <button type="submit">
        Update User
    </button>

</form>