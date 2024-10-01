<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//TODO DOCUMENTAR CREACION Y MODIFICACION DE LOGIN
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    //Si no pasa la validación, se manda un response con un mensaje de error

    //! Si las credenciales son incorrectas, se manda un response con un mensaje de error
    if (!auth()->attempt($request->only('email', 'password'))) {
        return response([
            'data' => 'Invalid credentials'
        ], 401);
        //! los codigos de error 401 son para cuando las credenciales son incorrectas

    } else {
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('authToken')->plainTextToken;
        //! agregar el token a $user
        $user->token = $token;
        return response([
            //! COlocar tanto token como user en un array para que se muestren juntos
            'data' => $user
            /* 'user' => $user,
            'token' => $token */
        ], 200);
    }
});

//TODO DOCUMENTAR CREACION Y MODIFICACION DE REGISTRO DE VISITAS
Route::post('/registrar-visita', function (Request $request) {
    //! Validamos que nos envíen el código QR
    $request->validate([
        'qr_code' => 'required',
    ]);

    //! Desencriptar el código QR recibido
    $decoded = decrypt($request->qr_code);

    //! Convertimos la cadena JSON a un array
    $data = json_decode($decoded, true);

    //! Retornar los datos desencriptados
    return response()->json([
        'data' => $data
    ], 200);
});
