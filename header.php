<?php
    if (isset($_SESSION['ID']) == true){
        $username = $_SESSION['username'];
    }
    include('modals/messageListModal.php');
?>

    <div class='row metal'>
        <div class='col-12 col-sm-6 col-md-2 py-1'>
            <a href='/aftermath/login.php' role='button' class="btn btn-warning btn-lg btn-block border p-2">LOG IN</a>
        </div>

        <div class='col-12 col-sm-6 col-md-2 py-1'>
            <a href='/aftermath/signup.php' role='button'><img src='/aftermath/img/buttons/join_0.png' id='joinBtn' class='img-fluid h-100 mx-auto d-block' /></a>
        </div>

        <div class='col-5 col-sm-6 col-md-2 py-1 pr-1'>
            <img src='/aftermath/img/graffiti/usernameX.png' class='img-fluid h-100 mx-auto d-block' />
        </div>

        <div class='col-7 col-sm-6 col-md-2 py-1 pl-1'>
            <div class="input-group input-group-lg">
                <input type="text" class="form-control border text-center" placeholder='Login 1st' id='usernameArea' readonly />
            
                <script>
                    var username = "";
                    username = "<?php echo $username; ?>";
                    $('#usernameArea').val(username);
                </script>
            </div>
        </div>

        <div class='col-12 col-sm-6 col-md-2 py-1'>
            <button id='messageListBtn' class='btn btn-light btn-lg btn-block border px-0'>MESSAGES</button>
        </div>
        
        <div class='col-12 col-sm-6 col-md-2 py-1'>
            <form id="logout" action="/aftermath/inc/processLogout.php" method="post">
                <button type="submit" class="btn btn-warning btn-lg btn-block border" id='logoutBtn'>LOG OUT</button>
            </form>
        </div>
    </div>

    <div class='row black'>
        <div class='col-sm-1 col-md-2 col-lg-3'></div>
        <div class='col-12 col-sm-10 col-md-8 col-lg-6'>
            <a href='/aftermath/index.php'>
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="/aftermath/img/banners/Aftermath0.jpg" alt="First slide">
                    </div>
                                        
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/aftermath/img/banners/Aftermath2.jpg" alt="Second slide">
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="/aftermath/img/banners/Aftermath3.jpg" alt="Third slide">
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class='col-sm-1 col-md-2 col-lg-3'></div>
    </div>

    <div id='messageModalArea'></div>