<div>
    <!--   Users   -->
    <h2>Family Members</h2>
    <hr>
    <?php
    foreach ($users as $user) {
        echo "<div> " . (($user['username'] !== "ADMIN")  ? "<h4>{$user['displayname']}</h4>" : '') . "</div>";
    }
    ?>

</div>