<!-- error-popup -->

<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        <span class="first-word">Error:</span>
                        <br>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
