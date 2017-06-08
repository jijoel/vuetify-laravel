Dusk Tests
====================
For dusk tests to work, Xvfb must be running. You can use the `dusk` command (defined in ~/.bash_aliases) to run dusk. It does this:

    function dusk() {
        pids=$(pidof /usr/bin/Xvfb)

        if [ ! -n "$pids" ]; then
            Xvfb :0 -screen 0 1280x960x24 &
        fi

        php artisan dusk "$@"
    }

