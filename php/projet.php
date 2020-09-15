<?php

$pageTitle = $langue->pagetitle;

echo "
<div class='centered'>
    <h2>$langue->h2</h2>
    <span class='separator' id='s-project'></span>
    <div class='project-row'>
        <div class='project-tile'>
            <div id='kdanse' class='project-desc animate'>
                <p>
                    $langue->kdanse
                </p>
                <a class='project-btn' target='blank' href='https://kdanseforme.fr'>
                    $langue->lien
                </a>
            </div>

        </div>
        <div class='project-tile'>
            <div id='mcu' class='project-desc animate'>
                <p>
                    $langue->mcu
                </p>
                <a target='blank' class='project-btn' href='http://portfolio.moreauv.fr.fo/mcu-timeline/'>
                    $langue->lien
                </a>
            </div>
        </div>
    </div>
    <div class='project-row'>
        <div class='project-tile'>
            <div id='portfolio' class='project-desc animate'>
                <p>
                    $langue->autre
                </p>
                <a class='project-btn is-forbidden' href='#'>
                    $langue->lien
                </a>
            </div>
        </div>
        <div class='project-tile '>
            <div id='cv' class='project-desc animate '>
                <p>
                    $langue->cv
                </p>
                <a target='blank' class='project-btn' href='https://valentin-moreau.fr/CV_Bulma/index.html'>
                    $langue->lien
                </a>
            </div>
        </div>

    </div>

</div>

";

?>