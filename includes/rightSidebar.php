<div>
    <!--   Users   -->
    <h2>Family Members</h2>
    <hr>
    <?php
    foreach ($users as $user) {
        echo "<div> " . (($user['username'] !== "ADMIN")  ? "<div class='memberNames'><h4><a href=''>{$user['displayname']}</a></h4></div>" : "") . "</div>";
    }
    ?>

</div>