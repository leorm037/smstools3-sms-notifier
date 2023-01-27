# smstools3-sms-notifier

https://smaine-milianni.medium.com/create-a-notifier-transport-in-symfony-968f34adcc09

# notifier.yaml 
framework : notifier 
    : 
        chatter_transports: 
           userland:'%env(USERLAND_DSN)'

# .env 
USERLAND_DSN:userland://TOKEN@default?channel=CHANNEL

# services.yaml
App\UserlandTransport\UserlandTransportFactory: 
    pai: 
    notifier.transport_factory.abstract tags: ['chatter.transport_factory']

