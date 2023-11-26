<?php

use Illuminate\Support\Facades\Route;

Route::get('', function()
    {
        $groups = \App\Models\Group::all();
        $rasp = [];

        foreach($groups as $key => $group) {
            $rasp[$key] = [];
            $subjects = $group->subjects->filter(fn($item) => $item->current != $item->total);

            $counter = $subjects->count() * 12;
            for($i = 0; $i < 5 && $counter; ++$i) {
                $index = $subjects->random();

                if(in_array($index, $rasp[$key])) {
                    --$i;
                    --$counter;
                    continue 2;
                }

                foreach($rasp as $raspItem) {
                    if(count($raspItem) && isset($raspItem[$i]) && ($raspItem[$i] == $index || $raspItem[$i]->user_id == $index->user_id)) {
                        --$i;
                        --$counter;
                        continue 2;
                    }
                }

                $rasp[$key][] = $index;
            }
        }

        foreach($rasp as $key => $group) {
            echo 'Рacписание' . $key . '<br>';
            foreach($group as $subject) {
                echo $subject->id . ' ' . $subject->subject->name . '(' . $subject->teacher->name . ')' . '<br>';
            }
            echo '<br><br><br>';
        }
    });

Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']], function()
    {
        Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
    });
