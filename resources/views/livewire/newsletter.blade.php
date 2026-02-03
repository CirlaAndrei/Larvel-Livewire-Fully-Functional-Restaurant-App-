<form wire:submit="submit">
    <div class="form-newsletter">
        <input 
            class="input-footer"
            type="email"
            placeholder="example@example.com"
            wire:model="mail"
        >

        <button class="btn-footer" type="submit">Send</button>
    </div>

    @error('mail')
        <p style="color:red; margin-top: 0.5rem;">{{ $message }}</p>
    @enderror
</form>