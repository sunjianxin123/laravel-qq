<?php

namespace APP\Mailer;
use App\Mailer\Mail as Mail2;
class UserMailer extends Mail2{

    public function welcome($user)
    {
        $subject = 'Blog 邮箱确认';
        $view = 'welcome';
        $data = ['%name%' => [$user->user_name],'%token%' => [str_random(40)]];
        $this->sendTo($user, $subject, $view, $data);
    }
}