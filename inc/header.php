<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo 'Home'; ?></title>

    <link rel="stylesheet" href="../dist/style.css">

</head>

<body>

    <header>
        <div class="header-content">
            <nav class="container container--pall flex flex-jc-sb flex-ai-c">
                <a href="../src/" class="header__logo">
                    <img src="../assets/images/logo.png" alt="Medsource" />
                </a>

                <a id="btnHamburger" href="#" class="header__toggle hide-for-desktop">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>

                <div class="header__links hide-for-mobile">
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Contact</a>
                    <a href="#">Blog</a>
                    <a href="#">Careers</a>
                </div>

                <a href="./register.php?user_type=patient" class="button header__cta hide-for-mobile" id="register">Register</a>
            </nav>

        </div>
    </header>