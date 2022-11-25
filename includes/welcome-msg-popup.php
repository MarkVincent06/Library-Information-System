<style>
    .welcome-msg-div {
        height: 50px;
        width: 100%;
        background: #198754;
        padding: 20px;
        position: fixed;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        color: whitesmoke;
        z-index: 99;
        transform: translateX(-100%);
        animation: slide-in .3s ease-in-out;
        animation-fill-mode: forwards;
    }

    .slide-out {
        animation: slide-out .3s ease-in;
        animation-fill-mode: forwards; */
    }
    
    .welcome-msg-div .welcome-msg {
        margin: 0;
        padding: 0;
    } 

    .welcome-msg-div span {
        color: #001524;
    }

    .welcome-msg i {
        margin-right: 10px;
    }

    @keyframes slide-in {
        0% {
            transform: translateX(-100%);
    }
        100% {
            transform: translateX(0);
        }
    }

    @keyframes slide-out {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-100%);
        }
    }

</style>

<div class="welcome-msg-div" id="welcome-msg-div">
    <h2 class="welcome-msg"><i class="fa-solid fa-circle-check"></i>
    <?php if(isset($_POST['login'])): ?>
        Successfully logged in! Welcome back, 
        <span><?php echo $_SESSION['active-user']['firstname']; ?><span>👋</h2>
    <?php elseif(isset($_POST['sign-up'])): ?>
        Successfully signed up! Welcome, <span><?php echo $_SESSION['active-user']['firstname']; ?><span>👋</h2>
    <?php endif ?>
</div>

<script>
    const welcomeMsgDiv = document.getElementById("welcome-msg-div")
    if(welcomeMsgDiv.classList.contains("slide-out")) {
        welcomeMsgDiv.classList.remove("slide-in")
    }
    setTimeout(() => {
        welcomeMsgDiv.classList.add("slide-out")
    }, 3000);
</script>