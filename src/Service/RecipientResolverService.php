<?php

namespace App\Service;

use App\Request\CallbackFormRequest;

class RecipientResolverService
{
    /**
     * @var ConfigService
     */
    protected $configs;
    private $recipients_dev;
    private $recipients;
    
    public function __construct(ConfigService $configs)
    {
        $this->recipients_dev = $configs->get('mail.recipients_dev','');
        $this->recipients_dev = explode(',', $this->recipients_dev);
        $this->recipients_dev = array_map('trim', $this->recipients_dev);
        $this->recipients = $configs->get('mail.recipients','');
        $this->recipients = explode(',', $this->recipients);
        $this->recipients = array_map('trim', $this->recipients);
        $this->configs = $configs;
    }
    
    public function getRecipients(CallbackFormRequest $request)
    {
        $phoneCheck = preg_replace('~\D+~','',$request->phone);
        
        $recipients = $this->recipients_dev;
        if(!stristr($phoneCheck,'71111111111')){
            $recipients = array_merge($recipients,$this->recipients);
            if ($request->location) {
                $extra_recipients = $this->configs->get('mail.recipients.'.$request->location,'');
                if ($extra_recipients) {
                    $extra_recipients = explode(',', $extra_recipients);
                    $recipients = array_merge($recipients,$extra_recipients);
                }
            }
        }
        
        return $recipients;
    }
}