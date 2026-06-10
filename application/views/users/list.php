
<h2>User List</h2>

<a href="<?= base_url('index.php/users/create') ?>">
    Add User
</a>

<br><br>

<!-- SEARCH FORM -->
<form method="get"
      action="<?= base_url('index.php/users') ?>">

    <input type="text"
           name="search"
           placeholder="Search user..."
           value="<?= $search ?>">

    <button type="submit">
        Search
    </button>

</form>

<br>

<table border="1" cellpadding="10">

<tr>

    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>City</th>
    <th>Image</th>
    <th>Action</th>

</tr>

<?php foreach($users as $u): ?>

<tr>

    <td><?= $u->id ?></td>

    <td><?= $u->name ?></td>

    <td><?= $u->email ?></td>

    <td><?= $u->phone ?></td>

    <td><?= $u->city ?></td>

    <!-- IMAGE COLUMN -->
    <td>

        <img src="<?= base_url('uploads/'.$u->profile_image) ?>"
             width="80"
             height="80">

    </td>

    <!-- ACTION COLUMN -->
    <td>

        <a href="<?= base_url('index.php/users/edit/'.$u->id) ?>">
            Edit
        </a>

        |

        <a href="<?= base_url('index.php/users/delete/'.$u->id) ?>"
           onclick="return confirm('Are you sure want to delete?')">

            Delete

        </a>

    </td>

</tr>

<?php endforeach; ?>

</table>

<br><br>

<!-- PAGINATION -->
<?= $links ?>

