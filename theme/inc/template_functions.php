<?php

function pl_get_asset_url($path) {
    return sprintf('%s/assets/%s', get_template_directory_uri(), $path);
}
