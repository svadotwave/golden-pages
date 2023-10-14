<?php

require 'app.php';

function includeTemplate( $template ) {
    include TEMPALTES_URL . '/' . $template . '.php';
}