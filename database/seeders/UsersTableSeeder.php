<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use DB;
use App\Models as Database;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();

        $users = [
        	 ['Tran','Hieu', '0306191001@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Duong','Hiep', '0306191002@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Nguyen','Chinh', '0306191003@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Tran','Thu', '0306191004@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Le','Kiet', '0306191005@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Nguyen','Hieu', '0306191006@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Huynh','Anh', '0306191007@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Le','Duy', '0306191008@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Nguyen','Bao', '0306191009@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Tran','Thuong', '0306191010@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Nguyen','Truc', '0306191011@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Le','Bao', '0306191012@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Dang','Nghi', '0306191013@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
             ['Pham','Thu', '0306191014@caothang.edu.vn', Hash::make('111111111'),'no_avatar.png','no_cover_image.jpg','0','0','1'],
        ];
        foreach ($users as $user) {
            Database\User::create([
                'first_name' => $user[0],
                'last_name' =>$user[1],
                'email' =>$user[2],
                'password' => $user[3],
                'avatar' =>$user[4],
                'cover_image' =>$user[5],
                'isAdmin'=>$user[6],
                'isSubAdmin'=>$user[7],
                'status'=>$user[8]
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
