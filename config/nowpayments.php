<?php

/**
 * you only need api-key for communicating with nowpayments.io api
 * 
 * for getting the key:
 * 1. First login to the nowpayments.io 
 * 2. Choose *store settings* from the menu
 * 3. Add a *Outcome Wallet* if you not have one already
 * 4. Click on *save* button
 * 5. Click on the *Add new key* button from top of the page
 * 6. Copy the key
 * 7. Add api key to .env file like this:
 *      NOWPAYMENTS_API_KEY=your_key_here 
 * 
 */
return [
    'keys' => [
        'api' => env('NOWPAYMENTS_API_KEY'),
        'ipn' => env('NOWPAYMENTS_IPN_KEY'),
    ]
];