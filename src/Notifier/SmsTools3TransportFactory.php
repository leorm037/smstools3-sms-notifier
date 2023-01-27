<?php

namespace App\Notifier;

use Symfony\Component\Notifier\Exception\UnsupportedSchemeException;
use Symfony\Component\Notifier\Transport\AbstractTransportFactory;
use Symfony\Component\Notifier\Transport\Dsn;

class SmsTools3TransportFactory extends AbstractTransportFactory {
    
    public function __construct() {
        parent::__construct();
    }
    
    protected function getSupportedSchemes(): array {
        return ['smstools3'];
    }

    public function create(Dsn $dsn): SmsTools3Transport {
        var_dump($dsn);
        
        $scheme = $dsn->getScheme();
        
        if ('smstools3' === $scheme) {
            return new SmsTools3Transport();
        }
        
        throw new UnsupportedSchemeException($dsn, 'smstools3', $this->getSupportedSchemes());
    }

}
