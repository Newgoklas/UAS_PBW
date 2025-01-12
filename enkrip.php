<?php
    echo md5('123'.rand().date("H:i:s"));
    echo"<br>";
    echo sha1('123');
    echo "<br>";
    echo PASSWORD_HASH('123', PASSWORD_DEFAULT);
    echo "<br>";
    echo password_verify('123','$2y$10$3uvA1XVq7UV9ApiJ6R1FTOENTqnOgC4fpiGbBouUO3cYgvICjpNwG');