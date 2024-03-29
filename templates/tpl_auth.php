<?php function draw_login(){
    ?>
    <section id="login">
        <header>
            <div class = "logincontainer">
                <div class = "login">
                <h2>Login</h2>
                <form method="post" action="../actions/action_login.php">
                    <div class="login_input">
                        <input type="text" name="username" placeholder="username" required>
                        <input type="password" name="password" placeholder="password" required>
                        <input class = "submit_b" type="submit" value="Login" >
                    </div>
                </form>
                <footer class = "signupfooter">
                    <p style="margin:10px;">Não tens conta? <a href="signup.php">Cria uma!</a></p>
                    <p style="margin:10px;"><a href="inicialpage.php">Cancelar</a></p>
                </footer>
                </div>
            </div>
        </header>
        </section>
    <?php } ?>

    <?php function draw_signup(){
        ?>
        <section id="signup">
            <header>
                    <div class = "logincontainer">
                        <div class = "login">
                            <h2>Sign Up</h2>
                            <form method="post" action="../actions/action_signup.php">
                                <div class="login_input">
                                    <input type="name" name="name" placeholder="name" required>
                                    <input type="email" name="email" placeholder="email" required>
                                    <input type="text" name="username" placeholder="username" required>
                                    <input type="password" name="password" placeholder="password" required>
                                    <input type="password" name="passwordagain" placeholder="confirm password" required>
                                    <input type="date" name="date" placeholder="date" required>
                                    <input class = "submit_b" type="submit" value="Login">
                                </div>
                            </form>
                            <footer class = "signupfooter">
                                <p>Já tens conta? <a href="login.php">Faz login!</a></p>
                            </footer>
                        </div>
                    </div>
            </header>
        </section>
 <?php   }?>