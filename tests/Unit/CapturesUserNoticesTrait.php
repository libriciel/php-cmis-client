<?php

namespace Dkd\PhpCmis\Test\Unit;

trait CapturesUserNoticesTrait
{
    /**
     * Run the given callback and collect the E_USER_NOTICE messages it triggers.
     * The error handler is restored even if the callback throws.
     *
     * @param callable $callback
     * @return string[] The messages of the triggered notices
     */
    protected function captureUserNotices(callable $callback): array
    {
        $notices = [];
        set_error_handler(
            static function (int $errno, string $errstr) use (&$notices) {
                $notices[] = $errstr;
                return true;
            },
            E_USER_NOTICE
        );
        try {
            $callback();
        } finally {
            restore_error_handler();
        }

        return $notices;
    }
}
