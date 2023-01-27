<?php

namespace App\Notifier;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Notifier\Message\MessageInterface;
use Symfony\Component\Notifier\Message\SentMessage;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\Transport\AbstractTransport;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SmsTools3Transport extends AbstractTransport {
    
    protected const HOST = 'default';
    
    public function __construct(HttpClientInterface $client = null, EventDispatcherInterface $dispatcher = null) {
        parent::__construct($client, $dispatcher);
    }
    
    public function __toString(): string {
        return sprintf('smstools3://$s', $this->getEndpoint());
    }

    protected function doSend(MessageInterface $message): SentMessage {
        if (!$this->supports($message)) {
            throw new UnsupportedMessageTypeException(__CLASS__, SmsMessage::class, $message);
        }
        
        var_dump($message);
        
        return new SentMessage($message, $this);
    }

    public function supports(MessageInterface $message): bool {
        return $message instanceof SmsMessage;
    }

}
