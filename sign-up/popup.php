<script>
    const myTimeout = setTimeout(Render, 3000);
    <?php
    echo "
    function Render() {
        document
            .querySelector('.popup__alert')
            .classList.add('close_popup__alert');
        window.location.href = '../" . $success_login . "';
    }";
    ?>

    window.addEventListener("click", function() {
        document
            .querySelector(".popup__alert")
            .classList.add("close_popup__alert");
        window.location.href = "../sign-in/index.php";

    });
    const clickOk = document.querySelector(".color_popup__alert");
    clickOk.addEventListener("click", function(e) {
        clickOk.style.display = "none";
    });
    myTimeout;
</script>

<div class="popup__alert">
    <!-- <div class="color_popup__alert"></div> -->
    <div class="content_popup__alert">
        <img src="../images/popup/<?= $img ?>" alt="" class="avatar" />
        <div class="complete">
            <p class="text_success"><?= $mess ?></p>
            <p class="text_done"><?= $mess2 ?></p>
        </div>
    </div>
    <div class="color_popup__alert" style="background-color: <?= $style ?>;">
        <p>OK</p>
    </div>
</div>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .popup__alert {
        position: absolute;
        top: 15%;
        right: -8%;
        transform: translate(-50%, -50%);
        display: flex;
        flex-direction: column;
        /* height: 180px; */
        width: 20%;
        transition: all 2s;
        z-index: 3;
        overflow: hidden;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        border-radius: 20px;
    }

    .close_popup__alert {
        width: 0;
    }

    .close_popup__alert .color_popup__alert,
    .close_popup__alert .content_popup__alert {
        opacity: 0;
    }

    .color_popup__alert {
        width: 100%;
        height: 50px;
        /* height: 145px; */
        /* border-radius: 20px; */
        transition: all 0.5s;
        /* border-top-left-radius: 10px; */
        /* border-bottom-left-radius: 10px; */
        /* margin-top: 20px; */
        text-align: center;
        /* padding: 20px 15px; */
        color: white;
        font-family: "Poppins", sans-serif;
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .color_popup__alert:hover {
        opacity: 0.8;
    }

    .content_popup__alert {
        background-color: #f7f7f7;
        padding-left: 20px;
        opacity: 1;
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: space-around;
        /* flex-direction: column; */
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        font-size: 24px;
        transition: all 0.5s;
        padding: 20px 0px;
    }

    .color_popup__alert p {
        font-size: 20px;
    }

    .text_success {
        font-family: "Poppins", sans-serif;
        font-size: 16px;
        margin-left: 10px;
        color: black;
        margin-bottom: 10px;
        font-weight: bold;
        /* margin-top: 20px; */
    }

    .text_done {
        color: #4c4c6d;
        font-family: "Verdana", sans-serif;
        font-size: 12px;
        width: 200px;
        margin-left: 10px;
    }

    .avatar {
        width: 80px;
        border-radius: 40%;
        margin-left: 10px;
    }
</style>