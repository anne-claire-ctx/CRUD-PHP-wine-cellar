<?php
// on appelle notre header
require_once __DIR__ . '/header.php'; ?>

<!-- HTML -->
<section id="pageErreur">
    <div>
        <p>Oups, impossible de trouver la page... vous pouvez rester ici ou <a href="dashboard">revenir vers le droit chemin</a></p>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_wqwtneu4.json" background="#000000" speed="1" style="height: 80vh;" loop autoplay></lottie-player>
    </div>
</section>

<?php
require_once __DIR__ . '/footer.php';