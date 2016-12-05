<?php

namespace gtvj;

class Page
{
    public $name = 'Learning Slim';
    public $message;

    /**
     * Page constructor.
     * @param string $name
     */
    public function __construct($message)
    {
        $this->message = $message;
    }
}