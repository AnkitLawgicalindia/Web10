<div>
    <form wire:submit.prevent="mail" method="post" class="php-email-form mt-4">
        @if (session()->has('done3'))
        <div class="alert alert-success">Your message has been sent. Thank you!</div>
        @endif
        <div class="row">
            <div class="col-md-6 form-group">
                <input type="text" wire:model="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="number" class="form-control" wire:model="mobile" id="email"
                    placeholder="Your Mobile Number" required>
            </div>
        </div>
        <div class="form-group mt-3">
            <input type="email" class="form-control" wire:model="email" id="subject" placeholder="Your Email" required>
        </div>
        <div class="form-group mt-3">
            <textarea class="form-control" wire:model="message" rows="5" placeholder="Message" required></textarea>
        </div>

        <button type="submit">Send Message</button>
    </form>
</div>