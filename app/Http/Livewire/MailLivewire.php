<?php

namespace App\Http\Livewire;
use App\Models\Mail;
use Session;
use Livewire\Component;

class MailLivewire extends Component
{
    public $name;
    public $mobile;
    public $email;
    public $message;
    public function render()
    {
        return view('livewire.mail-livewire');
    }

    public function mail()
    {
        $mail = new Mail();
        $mail->name = $this->name;
        $mail->mobile = $this->mobile;
        $mail->email = $this->email;
        $mail->message = $this->message;
        $mail->save();
        session()->flash('done3','');
    }
}
