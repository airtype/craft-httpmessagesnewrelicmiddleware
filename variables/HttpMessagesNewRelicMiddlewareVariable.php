<?php

namespace Craft;

class HttpMessagesNewRelicMiddlewareVariable
{
    public function getTimingHeader()
    {
        if (!extension_loaded('newrelic')) {
            return null;
        }

        return newrelic_get_browser_timing_header();
    }

    public function getTimingFooter()
    {
        if (!extension_loaded('newrelic')) {
            return null;
        }

        return newrelic_get_browser_timing_footer();
    }
}
