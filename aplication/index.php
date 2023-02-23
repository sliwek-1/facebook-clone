<?php require_once("header.php") ?>
<body>
    <div class="wrapper">
        <form action="#" class="form">
            <h1>Rejestracja</h1>
            <div class="names">
                <div class="input">
                    <input type="text" name="fname" class="name input" placeholder="Imię" required>
                </div>
                <div class="input">
                    <input type="text" name="lname" class="name input" placeholder="Nazwisko" required>
                </div>
            </div>
            <div class="input email">
                <input type="email" name="email" class="email input" placeholder="Email" required>
            </div>
            <div class="input passwd">
                <input type="password" name="passwd" id="password" placeholder="Hasło" required>
                <a href="#" class="show">
                    <span class="show-eye active">
                        <ion-icon name="eye-outline"></ion-icon>
                    </span>
                    <span class="hide-eye">
                        <ion-icon name="eye-off-outline"></ion-icon>
                    </span>
                </a>
            </div>
            <div class="input file">
                <input type="file" name="file" class="file">
            </div>
            <div class="input submit">
                <input type="submit" name="submit" class="submit-btn submit" value="Zarejestruj">
            </div>
            <span>
                Masz już konto? 
                <a href="login.php">Zaloguj się</a>
            </span>
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/show.js"></script>
    <script src="js/singup.js"></script>
</body>
</html>