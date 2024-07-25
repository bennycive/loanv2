<?php

namespace App\Notify;

use App\Notify\NotifyProcess;
use App\Notify\SmsGateway;
use App\Notify\Notifiable;
use Illuminate\Support\Facades\Log; // Import Log facade if not already imported

class Sms extends NotifyProcess implements Notifiable
{
    /**
     * Mobile number of receiver
     *
     * @var string
     */
    public $mobile;

    /**
     * Assign value to properties
     *
     * @return void
     */
    public function __construct($mobile = null)
    {
        $this->statusField = 'sms_status';
        $this->body = 'sms_body';
        $this->globalTemplate = 'sms_body';
        $this->notifyConfig = 'sms_config';
        $this->mobile = $mobile; // Assign mobile number during instantiation
    }

    /**
     * Get message for SMS notification
     *
     * @return string
     */
    protected function getMessage()
    {
        // Implement logic to retrieve the message content for the SMS notification
        // For example, fetch it from a database or use predefined templates
        return "This is the message content for the SMS notification.";
    }

    /**
     * Send notification
     *
     * @return void|bool
     */
    public function send()
    {
        // Get message from parent
        $message = $this->getMessage();
        
        // Check if $this->setting is set and not null
        if ($this->setting && $this->setting->sn && $message) {
            try {
                $gateway = $this->setting->sms_config->name;
                if ($this->mobile) {
                    $sendSms = new SmsGateway();
                    $sendSms->to = $this->mobile;
                    $sendSms->from = $this->setting->sms_from;
                    $sendSms->message = strip_tags($message);
                    $sendSms->config = $this->setting->sms_config;
                    // Call the gateway method dynamically
                    $sendSms->$gateway();
                    $this->createLog('sms');
                }
            } catch (\Exception $e) {
                $this->createErrorLog('SMS Error: ' . $e->getMessage());
                session()->flash('sms_error', 'API Error: ' . $e->getMessage());
            }
        } else {
            // Log or handle the case where $this->setting or $this->setting->sn is null
            $this->createErrorLog('SMS settings are not configured properly.');
        }
    }

    /**
     * Create error log for SMS.
     *
     * @param string $errorMessage
     * @return void
     */
    public function createErrorLog($errorMessage)
    {
        Log::error($errorMessage);
    }

    /**
     * Configure some properties
     *
     * @return void
     */
    public function prevConfiguration()
    {
        // Check if User
        if ($this->user) {
            $this->mobile = $this->user->mobile;
            $this->receiverName = $this->user->fullname;
        }
        $this->toAddress = $this->mobile;
    }

    
}
