<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\Hash;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::select('id', 'name', 'level', 'player_name', 'species', 'alignment')->get();
        return response()->json($characters);
    }

    /**
     * 特定のIDのデータを取得
     */
    public function show($id)
    {
        $character = Character::findOrFail($id);
        return response()->json($character);
    }

    /**
     * 新規登録
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'player_name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'alignment' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $character = Character::create([
          'name' => $request->name,
          'level' => $request->level,
          'player_name' => $request->player_name,
          'species' => $request->species,
          'alignment' => $request->alignment,
          'details' => json_encode($request->input()),
          'password' => Hash::make($request->password),
        ]);
        return response()->json(['message' => 'Character created successfully', 'character' => $character], 201);
    }

    /**
     * 上書き保存
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'player_name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'alignment' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $character = Character::findOrFail($id);
        if (Hash::check($request->password, $character->password)) {
            $character->update([
                'name' => $request->name,
                'level' => $request->level,
                'player_name' => $request->player_name,
                'species' => $request->species,
                'alignment' => $request->alignment,
                'details' => json_encode($request->input()),
              ]);

            return response()->json(['message' => 'Character updated successfully', 'character' => $character], 200);
        } else {
            return response()->json(['message' => 'Password does not match'], 403);
        }
    }

    /**
     * 特定のIDのデータを削除
     */
    public function destroy(Request $request, $id)
    {
        $request->validate([
          'password' => 'required|string|min:8',
        ]);

        $character = Character::findOrFail($id);

        if (Hash::check($request->password, $character->password)) {
            $character->delete();
            return response()->json(['message' => 'Character deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Password does not match'], 403);
        }
    }
    
    public function options()
    {
        // クロスドメイン環境からOPTIONSメソッドを許可する為の暫定関数
    }
}
