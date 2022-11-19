<?php
                    if ($islogged == false) {
                        echo '
                        <a href="book_functions.php"><i class="fa fa-user"></i> Login</a>
                                    ';
                    }
                    ?>

                    <?php
                    if ($islogged == true)
                    {

                   
                        echo $_SESSION["login_user"];
                        
                    }            
                    ?>