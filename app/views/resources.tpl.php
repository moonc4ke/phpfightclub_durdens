<section class="repos resources">
    <?php if (isset($view['h1'])): ?>
        <h1><?php print $view['h1']; ?></h1>
        <img src="<?php print $view['image']['src']; ?>" class="responsive" alt="<?php print $view['image']['alt']; ?>">
    <?php endif; ?>
    <?php if (isset($view['links'])): ?>
        <div class="container flex">
            <?php foreach ($view['links'] as $link): ?>
                <div class="glitch links">
                    <span class="glitch-main">
                        <a href="<?php print $link['href']; ?>" target="_blank"><?php print $link['title']; ?></a>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if (isset($view['iframe'])): ?>
        <div class="container flex">
            <?php foreach ($view['iframe'] as $iframe): ?>
                <iframe src="<?php print $iframe; ?>" width="300" height="80"
                        frameborder="0"></iframe>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>