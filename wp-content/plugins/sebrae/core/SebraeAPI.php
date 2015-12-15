<?php
use GuzzleHttp\Client;

class SebraeAPI{

    private $hash_id;
    private $user;
    private $password;

    /**
     * @param $hash_id
     * @param $user
     * @param $password
     */
    public function __construct($hash_id, $user, $password){
        $this->hash_id = $hash_id;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getHashId()
    {
        return $this->hash_id;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return bool
     */
    public function isAuthorized(){
        $result = true;
        $client = new Client(
            array(
                'base_uri' => 'http://www.api.sebrae.com.br/api/rest/',
                'auth' => array(
                    $this->user,
                    $this->password
                )
            ));

        try {
            $request = $client->get('ideias/ideia/setor/10', array(
                'headers' => array(
                    'Content-Type' => 'application/json; charset=utf-8',
                    'AppId' => $this->hash_id
                )
            ));
            if($request->getStatusCode() != 200)
                $result = false;

        } catch(\GuzzleHttp\Exception\RequestException $e){
            $result = false;
        }

        return $result;
    }


    /**
     * @param $setor
     * @return stdClass|null
     */
    public function getIdeiasPorSetor($setor){
        $result = null;
        $client = new Client(
            array(
                'base_uri' => 'http://www.api.sebrae.com.br/api/rest/',
                'auth' => array(
                    $this->user,
                    $this->password
                )
            ));

        try {
            $request = $client->get('ideias/setor/'.$setor, array(
                'headers' => array(
                    'Content-Type' => 'application/json; charset=utf-8',
                    'AppId' => $this->hash_id
                )
            ));
            $result = json_decode($request->getBody()->getContents());

        } catch(\GuzzleHttp\Exception\RequestException $e){
            return null;
        }

        return $result;
    }

    /**
     * @param $id
     * @return array|mixed|null|object
     */
    public function getIdeiasPorSetorID($id){
        $result = null;
        $client = new Client(
            array(
                'base_uri' => 'http://www.api.sebrae.com.br/api/rest/',
                'auth' => array(
                    $this->user,
                    $this->password
                )
            ));

        try {
            $request = $client->get('ideias/ideia/setor/'.$id, array(
                'headers' => array(
                    'Content-Type' => 'application/json; charset=utf-8',
                    'AppId' => $this->hash_id
                )
            ));
            $result = json_decode($request->getBody()->getContents());

        } catch(\GuzzleHttp\Exception\RequestException $e){
            return null;
        }

        return $result;
    }

    /**
     * @param $id
     * @return array|mixed|null|object
     */
    public function getIdeia($id){
        $result = null;
        $client = new Client(
            array(
                'base_uri' => 'http://www.api.sebrae.com.br/api/rest/',
                'auth' => array(
                    $this->user,
                    $this->password
                )
            ));

        try {
            $request = $client->get('ideias/'.$id, array(
                'headers' => array(
                    'Content-Type' => 'application/json; charset=utf-8',
                    'AppId' => $this->hash_id
                )
            ));
            $result = json_decode($request->getBody()->getContents());

        } catch(\GuzzleHttp\Exception\RequestException $e){
            return null;
        }

        return $result;
    }

    /**
     * @param $assunto
     * @return array|mixed|null|object
     */
    public function getIdeiasPorAssunto($assunto){
        $result = null;
        $client = new Client(
            array(
                'base_uri' => 'http://www.api.sebrae.com.br/api/rest/',
                'auth' => array(
                    $this->user,
                    $this->password
                )
            ));

        try {
            $request = $client->get('ideias/ideia/assunto/' . $assunto, array(
                'headers' => array(
                    'Content-Type' => 'application/json; charset=utf-8',
                    'AppId' => $this->hash_id
                )
            ));
            $result = json_decode($request->getBody()->getContents());

        } catch(\GuzzleHttp\Exception\RequestException $e){
            return null;
        }

        return $result;
    }
}