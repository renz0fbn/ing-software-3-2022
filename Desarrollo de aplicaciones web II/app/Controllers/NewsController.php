<?php
namespace App\Controllers;

use App\Models\aNew;
use Laminas\Diactoros\Response\RedirectResponse;

class NewsController extends BaseController{

    public function addNew($request){
        $postData = $request->getParsedBody();
        $files = $request->getUploadedFiles();
        $new = new aNew();
        $new->titulo = $postData['title'];
        $new->resumen = $postData['resume'];
        $new->cuerpo = $postData['main'];
        $new->categoria = $postData['category'];
        $new->idUsuario = $_COOKIE['idUser'];
        $new->autor = $_COOKIE['user'];
        $new->thumbail = $this->uploadThumbail($files, $postData['title']);

        $new->save();
        $id = aNew::select("idNoticia")->where('idUsuario', $new->idUsuario)->latest()->first();
        return new RedirectResponse('/new?id='.$id->idNoticia);



    }
    public function renderCreateNew(){
        if(!$this->checkSession()){
            return new RedirectResponse('/');
        }
        return $this->renderHTML('/main/news.twig',[
            'user' => $_COOKIE['user'],
            'idUser'=> $_COOKIE['idUser']
        ]);
    }

    public function showNew()
    {
        if(isset($_GET['id'])){
            $New = aNew::where('idNoticia', $_GET['id'])->join('Users', 'Users.id', '=', 'News.idUsuario')->select('News.*', 'Users.image')->first();
            if($New){
                return $this->renderHTML('/main/showNew.twig', [
                    'New' => $New, 'idUser'=> $_COOKIE['idUser']
                ]);
            }

            return $this->renderHTML('404.html');
        }
        return new RedirectResponse('/');

    }

    public function uploadThumbail($files, $name){
        $thumb = $files['thumbail'];
        if($thumb){
            $filePath = "img/uploads/news/".str_replace(' ', '',$name).".png";
            $thumb->moveTo($filePath);
            return $filePath;
        }
        return null;
    }
}
