<div>
    <form action="{{route('login')}}" method="POST" class="signin-form">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="user_name" wire:keyup="check2" wire:model="name"
                placeholder="Username" required>
            @if(session()->has('name'))
            <span style="color:red">{{session()->get('name')}}</span>
            @endif
        </div>
        <div class="form-group">
            <input id="password-field" type="password" name="password" wire:keyup="check1" wire:model="password"
                class="form-control" placeholder="Password" required>
            @if(session()->has('password'))
            <span style="color: red">{{session()->get('password')}}</span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary submit px-3" @if (session()->has('name') ||
                session()->has('password'))
                disabled
                @endif
                >Sign In</button>
        </div>
    </form>
</div>