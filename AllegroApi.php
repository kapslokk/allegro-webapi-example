<?php

class AllegroApi{
    protected $login;
    protected $password;
    protected $apiKey;
    protected $wsdlAddress;
    protected $countryId = 1;

    /** @var  SoapClient */
    private $client;

    private $sessionId;

    private $verKey;

    public function __construct($login, $password, $apiKey, $wsdlAddress)
    {
        $this->login       = $login;
        $this->password    = $password;
        $this->apiKey      = $apiKey;
        $this->wsdlAddress = $wsdlAddress;

        $options['features'] = SOAP_SINGLE_ELEMENT_ARRAYS;
        $this->client = new SoapClient($this->wsdlAddress, $options);
        $this->loadVerKey();
    }

    public function login(){
        $request = array(
            'userLogin' => $this->login,
            'userPassword' => $this->password,
            'countryCode' => $this->countryId,
            'webapiKey' => $this->apiKey,
            'localVersion' => $this->verKey
        );
        $result = $this->client->doLogin($request);
        $this->sessionId = $result->sessionHandlePart;
    }

    public function loadVerKey(){
        $request = array(
            'countryId' => $this->countryId,
            'webapiKey' => $this->apiKey
        );
        $result = $this->client->doQueryAllSysStatus($request);
        foreach($result->sysCountryStatus->item as $item){
            if($item->countryId == $this->countryId){
                $this->verKey = $item->verKey;
            }
        }
    }


    /**
     * @param array $fields
     */
    public function newAuction($fields){
        if($this->sessionId === null){
            $this->login();
        }
        return $this->client->doNewAuctionExt(array(
            'sessionHandle' => $this->sessionId,
            'fields' => $fields
        ));
    }



}