@extends('template')
@section('content')
    <div class="error-404-container">
        <h1 class="text-center">Erreur 404 - Page non trouvée</h1>
        <p class="text-center">Désolé, la page que vous recherchez n'existe pas.</p>
        <div class="text-center">
            <a href="/albums" class="btn btn-primary">Retour à la liste des albums</a>
        </div>
    </div>
    <div class="terror">
        <pre>
        INITIALIZING HALLOWEEN.CORE v.10.31...
        [SCANNING] Target: User_IP_404...
        [STATUS] Connection established. Protocol: GHOST_TCP

        -- START TRACE --
        0x404: Access denied. Entity not found. (Code: SPOOKY_ERROR_0xDEAD)
        LOOP 1: Attempting bypass via /pumpkin/patch... FAIL.
        LOOP 2: Attempting bypass via /candy/basket... FAIL.
        LOOP 3: Attempting bypass via /admin/portal...
           &gt; System response: Authentication failed. User "GUEST" is not recognized.
           &gt; Console: **FATAL ERROR: ** CRITICAL_PUMPKIN_KERNEL_PANIC_EXCEPTION

        >>> function (get_treats) {
               let error = new Error("Trick or treat, smell my feet!");
               throw error;
           }

        [WARNING] Privilege escalation detected. Source: system32/ghost.dll
        [ALERT] Initiating self-destruct sequence in 5...
        [ALERT] Initiating self-destruct sequence in 4...
        [ERROR] File '/soul.cfg' not found. Reverting to default (Scream mode).
        [STATUS] **ACCESS DENIED**. User is trapped in the void.

        -- END TRACE --
        Please reboot by leaving a cookie at the door.
        </pre>
    </div>
@endsection