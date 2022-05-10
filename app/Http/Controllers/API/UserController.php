<?php

namespace App\Http\Controllers\API;

use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\UserCar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function update(UpdateRequest $request, User $user)
    {
        $input = $request->validated();

        try {

            $update = DB::table('users')->where('id', $request['id'])->update([
                'name' => $input['name'],
                'surname' => $input['surname'],
                'patronymic' => $input['patronymic'],
                'email' => $input['email'],
                'city' => $input['city'],
                'birth_day' => $input['birth_day'],
                'phone_number' => $input['phone_number'],
                'messengers' => $input['messengers'],
                'about_me' => $input['about_me'],
            ]);

            $success = true;
            $message = 'Запись о пользователе обновлена';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            // $user = '';
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->deleted = '1';
            $user->password = 'deleted';
            $user->remember_token = null;
            $user->save();
            $message = 'Запись удалена';
            $success = true;
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $user = '';
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
        ]);
    }

    /**
     * Register
     */
    public function register(CreateRequest $request)
    {
        // Подготовленные ключи для капчи
        //Используйте этот ключ в HTML-коде, который ваш сайт передает на устройства пользователей.
        // 6LfakIEfAAAAAI_bxI_b_2pAYplveVdcsyiVL4K2

        //Используйте этот секретный ключ для обмена данными между сайтом и сервисом reCAPTCHA.
        // 6LfakIEfAAAAAP95_dB80yb25UkYV5dsVtswyAdx

        try {
            $data = $request->validated();

            $user = new User();
            $user->name = $data['name'];
            // $user->login = $data['login'];
            $user->email = $data['email'];

            $user->password = Hash::make($data['password']);
            $user->save();

            $success = true;
            $message = 'User register successfully';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }


    /**
     * Login
     * Авторизация / аутентификация
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            // 'login' => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->remember)) {
            
            $car = UserCar::where('user_id', Auth::user()->id)->first();

            $success = true;
            $message = 'User login successfully';
        } else {
            $success = false;
            $message = 'Unauthorised';
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
            'user' => Auth::user(), // Проверить!
            'car' => $car, // Проверить!
        ];
        return response()->json($response);
    }

    /**
     * Logout
     * Выход
     */
    public function logout()
    {
        try {

            $user = Auth::user();
            $user->remember_token = '';
            $user->save();

            Session::flush();
            $success = true;
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
            'user' => $user,
        ];
        sleep(2);
        return response()->json($response);
    }

    /**Проверка что пользователь авторизован
     * 
     */
    public function checkLogin()
    {

        if (Auth::check()) {
            $success = true;
            $message = 'User login successfully';
            $car = UserCar::where('user_id', Auth::user()->id)->first();
        } else {
            $success = false;
            $message = 'Unauthorised';
            $car = ''; // Проверить!
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
            'user' => Auth::user(), // Проверить!
            'car' => $car, // Проверить!
        ];

        // Задержка подгруздки для демонстрации работы
        // sleep(2);
        return response()->json($response);
    }
}
