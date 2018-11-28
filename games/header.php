<?php
    if (isset($_SESSION['ID']) == true){
        $username = $_SESSION['username'];
    }
?>
    <div class='row metal py-2'>
        <div class='col'>
            <a href='../login.php' role='button' class="btn btn-warning btn-lg btn-block border">LOG IN</a>
        </div>

        <div class='col'>
            <a href='../signup.php' role='button'><img src='../img/buttons/join_0.png' id='joinBtn' /></a>
        </div>

        <div class='col'>
            <img src='../img/graffiti/usernameX.png' />
        </div>

        <div class='col'>
            <div class="input-group input-group-lg">
                <input type="text" class="form-control border text-center" placeholder='Login to continue' id='usernameArea' readonly />
            
                <script>
                    var username = "<?php echo $username; ?>";
                    $('#usernameArea').val(username);
                </script>
            </div>
        </div>
        
        <div class='col'>
            <form id="logout" action="../inc/processLogout.php" method="post">
            <button type="submit" class="btn btn-warning btn-lg btn-block border" id='logoutBtn'>LOG OUT</button>
            </form>
        </div>
    </div>

    <div class='row black'>
        <div class='col-3'></div>
        <div class='col-6'>
            <a href='../index.php'>
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../img/banners/Aftermath0.jpg" alt="First slide">
                    </div>
                                        
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../img/banners/Aftermath2.jpg" alt="Second slide">
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="../img/banners/Aftermath3.jpg" alt="Third slide">
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class='col-3'></div>
    </div>