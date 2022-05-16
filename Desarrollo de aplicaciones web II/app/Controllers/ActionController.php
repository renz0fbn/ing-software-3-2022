<?php
namespace App\Controllers;

use App\Models\User;
use Laminas\Diactoros\Response\RedirectResponse;


class ActionController extends BaseController{

    public function logOut() {
        unset($_SESSION['userId']);
        setcookie("user", "", time() - 1);
        setcookie("idUser", "", time() - 1);
        setcookie("pass", "", time() - 1);
        return new RedirectResponse('/login');
    }
    public function uploadimage($request){
        if ($request->getMethod() == 'POST') {
                $files = $request->getUploadedFiles();
                $pfp = $files['pfp'];

                $user= User::where('id', $_COOKIE['idUser'])->first();

                $filePath = "img/uploads/pfp/".$user->user.".png";
                $pfp->moveTo($filePath);
                
                $user->image = "$filePath";
                $user->save();

                return new RedirectResponse('/user?id='.$user->id);

        }

        return new RedirectResponse('/');
    }
    public function changeDescription($request){
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $user= User::where('id', $_COOKIE['idUser'])->first();

            $user->description = $postData['biografia'];
            $user->save();

            return new RedirectResponse('/user?id='.$user->id);

        }

        return new RedirectResponse('/');
    }

}