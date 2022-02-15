<?php

namespace Classes;

class Alert{
    
private $type;
private $message;

public function __construct($type, $message)
{
    $this->type = $type;
    $this->message = $message;
}


/**
 * Get the value of type
 */
public function getType()
{
return $this->type;
}

/**
 * Set the value of type
 */
public function setType($type): self
{
$this->type = $type;

return $this;
}

/**
 * Get the value of message
 */
public function getMessage()
{
return $this->message;
}

/**
 * Set the value of message
 */
public function setMessage($message): self
{
$this->message = $message;

return $this;
}
}