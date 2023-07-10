<?php

namespace App\Components;

class Session

{
    public const KEY_SUCCESS_MESSAGE = 'success_message';
    public const KEY_ERROR_MESSAGE = 'error_message';
    public const KEY_USER_ID = 'user_id';
    public const KEY_CSRF = 'csrf';
    public const KEY_CURRENT_ATTEMPT_ID = "attempt_id";
    public const KEY_QUESTIONS_ANSWERED = "questions_answered";

    private static ?Session $instance = null;

    public static function getInstance(): Session
    {
        if (!self::$instance) {
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function unset(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function regenerate(): void
    {
        session_regenerate_id();
    }

    public function destroy(): void
    {
        session_destroy();
    }

    /**
     * Generate a csrf token if it doesnt exist
     */
    public function generateCsrf(): void
    {

        if($this->get(self::KEY_CSRF)) {
            return;
        }

        $token = md5(rand(0,10000000));


        $this->set(self::KEY_CSRF, $token);
    }

    public function getCsrf(): string
    {
        return $this->get(self::KEY_CSRF);

    }


}