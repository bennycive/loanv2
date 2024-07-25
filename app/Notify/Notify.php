<?php

namespace App\Notify;

class Notify
{
    /**
     * Template name, which contains the short codes and messages.
     *
     * @var string
     */
    public $templateName;

    /**
     * Short Codes, which will be replaced.
     *
     * @var array
     */
    public $shortCodes;

    /**
     * Send via email, sms, etc.
     *
     * @var array|null
     */
    public $sendVia;

    /**
     * Instance of user, who will get the notification.
     *
     * @var object
     */
    public $user;

    /**
     * Notification log will be created or not.
     *
     * @var bool
     */
    public $createLog;

    /**
     * System general settings' instance.
     *
     * @var object
     */
    public $setting;

    /**
     * The relational field name like user_id, agent_id.
     *
     * @var string
     */
    public $userColumn;

    /**
     * Assign value to sendVia and setting property.
     *
     * @param null $sendVia
     * @return void
     */
    public function __construct($sendVia = null)
    {
        $this->sendVia = $sendVia;
        $this->setting = gs(); // Assuming gs() is a helper function or service to get settings
    }

    /**
     * Send notification via methods.
     *
     * This method is creating instances of notifications to send the notification.
     *
     * @return void
     */
    public function send()
    {
        $methods = [];

        // Get the notification method classes which are selected
        if ($this->sendVia) {
            foreach ($this->sendVia as $sendVia) {
                $methods[$sendVia] = $this->notifyMethods($sendVia);
            }
        } else {
            $methods = $this->notifyMethods();
        }

        // Send the notification via methods one by one
        foreach ($methods as $method) {
            $notify = new $method;

            $notify->templateName = $this->templateName;
            $notify->shortCodes = $this->shortCodes;
            $notify->user = $this->user;
            $notify->setting = $this->setting;
            $notify->createLog = $this->createLog;
            $notify->userColumn = $this->userColumn;

            // Ensure 'phone' key exists in $this->user before accessing it
            if (isset($this->user->phone)) {
                $notify->phone = $this->user->phone;
            } else {
                $notify->phone = null; // Or set to a default value
            }

            $notify->send();
        }
    }

    /**
     * Get the notification method classes.
     *
     * @param array|null $sendVia
     * @return array|string
     */
    protected function notifyMethods($sendVia = null)
    {
        $methods = [
            'email' => Email::class,
            'sms' => Sms::class,
            'push_notification' => PushNotification::class,
        ];

        if ($sendVia) {
            return $methods[$sendVia];
        }

        return $methods;
    }
}
