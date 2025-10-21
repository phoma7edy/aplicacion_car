<h3>Escanea este código QR con Google Authenticator</h3>
<img src="{{ $inlineUrl }}" alt="QR Code">

<p>Clave secreta de respaldo: <strong>{{ $secret }}</strong></p>

<form method="POST" action="{{ route('2fa.confirm') }}">
    @csrf
    <label for="otp">Ingresa el código de 6 dígitos de tu app</label>
    <input type="text" name="one_time_password" required>
    <button type="submit">Confirmar</button>
</form>


<h3>Ingresa el código de Google Authenticator</h3>
<form method="POST" action="{{ route('2fa.validate') }}">
    @csrf
    <input type="text" name="one_time_password" required placeholder="Código de 6 dígitos">
    <button type="submit">Validar</button>
</form>
