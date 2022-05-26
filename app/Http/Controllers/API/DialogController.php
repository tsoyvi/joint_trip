<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Models\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DialogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messageUser = null;
        try {
            $user = Auth::user();
            $dialogs = null;
            $chats = null;

            // Получаем список с кем пользователь общался
            $dialogs = UserMessage::select(['to_user_id', 'from_user_id'])
                ->where('to_user_id',  $user->id)
                ->orWhere('from_user_id',  $user->id)
                ->distinct('from_user_id')
                ->get();

            // Получение списка id пользователей кто в диалоге
            $collectionId = collect([]);
            foreach ($dialogs as $key => $row) {
                $collectionId->push($row['to_user_id']);
                $collectionId->push($row['from_user_id']);
            }

            $collectionId = $collectionId->unique();

            // Удаляем текущего пользователя из списка чатов
            $key = $collectionId->search($user->id);
            $collectionId->forget($key);

            $usersId = $collectionId->values()->all();
            //
            // если список не пользователей не пустой делаем запрос к именам пользователей
            if (count($usersId) > 0) {
                $chats = User::select(['id', 'name', 'surname', 'patronymic', 'image_link'])
                    ->whereIn('id', $usersId)
                    ->get();
            } else {
                $chats = null;
            }

            $success = true;
            $message = 'Чаты пользователя';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $chats  = '';
        }
        return response()->json([
            "success" => $success,
            "message" => $message,
            // "messageUser" => $arrayId,
            "chats" => $chats,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = Auth::user();

            $input = $request->input();

            // Добавляем сообщение
            // $data = ['messages' => $input['messageText']];
            // $mess =  Message::create($data);


            $data = [
                'from_user_id' => $user->id,
                'to_user_id' => $input['toUserId'],
                'messages' => $input['messageText'],
            ];
            // $result = DB::table('user_messages')->insert($data);
            $result = UserMessage::create($data);

            $success = true;
            $message = 'Сообщение добавлено';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $result = '';
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
            "userMessage" => $result,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $user = Auth::user();

            // делаем запрос к БД
            $userMessages = UserMessage::select()
                ->with(['user'])
                ->where(
                    [
                        ['to_user_id', $user->id],
                        ['from_user_id', $id],
                    ]
                )
                ->orWhere(
                    [
                        ['to_user_id', $id],
                        ['from_user_id', $user->id],
                    ]
                )
                ->orderBy('id')
                ->get();

            $success = true;
            $message = 'Список сообщений';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $userMessages = '';
        }


        return response()->json([
            "success" => $success,
            "message" => $message,
            "userMessages" => $userMessages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
