<?php

/**
 * URL
 * 
 * Response methods
 */
class Url
{
    /**
     * Redirect to another URL on the same site
     *
     * @param string $path The path to redirect to
     * 
     * @return void
     */
    public function redirect($path)
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {

            $protocol = 'https';

        } else {

            $protocol = 'http';

        }

        header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . $path);
        exit;

    }

    public function httpsRedirect($path)
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {

            $protocol = 'https';

        }

        header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . $path);
        exit;

    }
}