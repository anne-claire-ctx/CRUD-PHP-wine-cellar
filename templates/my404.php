<?php
// on appelle notre header
require_once __DIR__ . '/header.php'; ?>

<!-- HTML -->
<section id="pageErreur" style="background:black; height:100vh margin:0;">
    <div class="error" role="dialog">
        <p>Oups, impossible de trouver la page... vous pouvez rester ici ou <a href="http://localhost/mycave/dashboard" class="btns btnswhite">revenir chez nous</a></p>
        <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
    </div>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_wqwtneu4.json" background="#000000" speed="1" style="height: 80vh;" loop autoplay></lottie-player>
</section>

<?php
require_once __DIR__ . '/footer.php';