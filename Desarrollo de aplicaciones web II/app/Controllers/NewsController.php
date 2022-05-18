<?php
namespace App\Controllers;

use App\Models\aNew;
use Laminas\Diactoros\Response\RedirectResponse;

class NewsController extends BaseController{

    public function addNew($request){
        $postData = $request->getParsedBody();  // Obtener datos del formulario
        $files = $request->getUploadedFiles();  // Obtener el archivo si existe
        $new = new aNew();                      // Crear nueva noticia
        $new->titulo = $postData['title'];
        $new->resumen = $postData['resume'];
        $new->cuerpo = $postData['main'];
        $new->categoria = $postData['category'];
        $new->idUsuario = $_COOKIE['idUser'];
        $new->autor = $_COOKIE['user'];
        $new->thumbail = $this->uploadThumbail($files, $postData['title'], $_COOKIE['user']);

        $new->save();                           // Guardar noticia
        $id = aNew::select("idNoticia")->where('idUsuario', $new->idUsuario)->latest()->first();
        return new RedirectResponse('/new?id='.$id->idNoticia);     // Regresar



    }
    public function renderCreateNew(){
        if(!$this->checkSession()){
            return new RedirectResponse('/');
        }
        // Renderizar la pagina y enviar datos
        return $this->renderHTML('/main/news.twig',[
            'user' => $_COOKIE['user'],
            'idUser'=> $_COOKIE['idUser']
        ]);
    }

    public function showNew()
    {
        if(isset($_GET['id'])){
            // Buscar noticia
            $New = aNew::where('idNoticia', $_GET['id'])->join('Users', 'Users.id', '=', 'News.idUsuario')->select('News.*', 'Users.image')->first();
            if($New){
                // Renderizar la pagina y enviar datos
                return $this->renderHTML('/main/showNew.twig', [
                    'New' => $New, 'idUser'=> $_COOKIE['idUser']
                ]);
            }
            // 404 error
            return $this->renderHTML('404.html');
        }
        // Regresar a la pagina principal
        return new RedirectResponse('/');

    }

    public function uploadThumbail($files, $name, $usr){
        // Comprobar si existe una imagen y subirla o retornar null
        $thumb = $files['thumbail'];
        if($thumb){
            $filePath = "img/uploads/news/".preg_replace('/[0-9\@\.\;\" "\?\¿\"\"\%\:\=\(\{]+/', '', $name).$usr.".png";
            $thumb->moveTo($filePath);
            return $filePath;
        }
        return null;
    }
}
