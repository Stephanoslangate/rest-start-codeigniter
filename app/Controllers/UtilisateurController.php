<?php

namespace App\Controllers;
//require FCPATH.'/vendor/autoload.php';

use CodeIgniter\RESTful\ResourceController;
//use App\Controllers\BaseController;

class UtilisateurController extends ResourceController
{
    protected $modelName = 'App\Models\Utilisateur';
    protected $format = 'json';

    
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message' => 'success',
            'data_user' => $this->model->orderBy('id','DESC')->findAll()
        ];
        //$this->model->findAll()
        //$this->model->orderBy('id','DESC')->findAll() | DESC | 
        return $this->respond($data,200);
    }

    public function adduser(){
        $data['message']= '';
        return view("utilisateur/login", $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'message' => 'success',
            'Utilisateur' => $this->model->find($id)
        ];

        if($data['Utilisateur']==null){
            return $this->failNotFound('Utilisateur non trouve');
        }

        return $this->respond($data,200);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //definition de la validation des champs,
        $rules = $this->validate([
            'nom'       => 'required',
            'prenom'    => 'required',
            'email'     => 'required',
            'password'  => 'required|min_length[7]',
        ]);
        if(!$rules){
            $response =[
                'message'=> $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }
        $this->model->insert(
            [
                'nom' => esc($this->request->getVar('nom')),
                'prenom' => esc($this->request->getVar('prenom')),
                'email' => esc($this->request->getVar('email')),
                'password' => esc($this->request->getVar('password'))
            ]
        );
        $response =[
            'message' => 'Utilisateur bien ajoute',
        ];
        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     * //Modification
     * @return mixed
     */
    public function update($id = null)
    {
        //definition de la validation des champs,
        $rules = $this->validate([
            'nom'       => 'required',
            'prenom'    => 'required',
            'email'     => 'required',
            'password'  => 'required|min_length[7]',
        ]);
        if(!$rules){
            $response =[
                'message'=> $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }
        $this->model->update($id,
            [
                'nom' => esc($this->request->getVar('nom')),
                'prenom' => esc($this->request->getVar('prenom')),
                'email' => esc($this->request->getVar('email')),
                'password' => esc($this->request->getVar('password'))
            ]
        );
        $response =[
            'message' => 'Utilisateur bien Modifie',
        ];
        return $this->respond($response,200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id);
        $response =[
            'message' => 'Utilisateur bien supprime',
        ];
        return $this->respondDeleted($response,200);
    }


     /**
     * Get user on login and password, from "posted" parameters
     *
     * @return mixed
     */
    public function login()
    {
        //definition de la validation des champs,
        $rules = $this->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);
        if(!$rules){
            $response =[
                'message'=> $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }
        $this->model->where('email',$this->request->getVar('email'))->findAll();
        $response =[
            'message' => 'Utilisateur bien trouve',
            'Utilisateur_rech' => $this->model->where('password',$this->request->getVar('password'))->findAll()
        ];
        return $this->respondCreated($response);
    }

    /**
     * Get user on login and password, from "posted" parameters
     *
     * @return mixed
     */
    public function login1()
    {
        //definition de la validation des champs,
        $rules = $this->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);
        if(!$rules){
            $response =[
                'message'=> $this->validator->getErrors()
            ];
            $data['message']= 'erreur de saisie';
            return view("utilisateur/login", $data);
           // return $this->failValidationErrors($response);
        }
        $this->model->where('email',$this->request->getVar('email'))->findAll();
        $response =[
            'message' => 'Utilisateur bien trouve',
            'Utilisateur_rech' => $this->model->where('password',$this->request->getVar('password'))->findAll()
        ];
        if($response['Utilisateur_rech']==null){
            $data['message']= 'user n existe pas';
            return view("utilisateur/login", $data);
        }
        $data['message']= 'Utilisateur bien trouve';
        return view("utilisateur/login", $data);
    }



    /**
     * add a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function ajout()
    {
        //definition de la validation des champs,
        $rules = $this->validate([
            'nom'       => 'requisn',
            'prenom'    => 'requisp',
            'email'     => 'requisem',
            'password'  => 'erreurpass',
        ]);
        if(!$rules){
            $response =[
                'users' => $this->model->findAll(),
                'messages'=> $this->validator->getErrors()
            ];
             
            return view("utilisateur/add", $response);

        }
        $this->model->insert(
            [
                'nom' => esc($this->request->getVar('nom')),
                'prenom' => esc($this->request->getVar('prenom')),
                'email' => esc($this->request->getVar('email')),
                'password' => esc($this->request->getVar('password'))
            ]
        );
        $response =[
            'message' => 'Ajout avec succes',
            'users' => $this->model->findAll()
        ];
       // return $this->respondCreated($response);
        return view("utilisateur/add", $response);

    }

    public function ajoutuser(){
        $response =[
            'users' => $this->model->findAll()
        ];
       // return $this->respondCreated($response);
        return view("utilisateur/add", $response);
    }

     /**
     * Supprimer the designated resource object from the model
     *
     * @return mixed
     */
    public function supprimer($tmp = "Steph", $id = 0)
    {
        $this->model->delete($id);
        $response =[
            'message' => 'Utilisateur bien supprime',
            'users' => $this->model->findAll()
        ];
       // return $this->respondCreated($response);
        return view("utilisateur/add", $response);
    }

    public function listeuser(){
        $response =[
            'users' => $this->model->findAll()
        ];
        return view("utilisateur/list", $response);
    }
    public function print(){
        $dompdf = new \Dompdf\Dompdf();

        $response =[
            'users' => $this->model->findAll()
        ];
        $html = view("utilisateur/list", $response);
       // $dompdf->loadHtml($html);
       $dompdf->loadHtml(view("utilisateur/list", $response));
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream('monPdf5');
        //echo "bonjour";
    }

}