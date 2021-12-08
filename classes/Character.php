<?php


class Character
{
//    Attributes
    private $quote;
    private $character;
    private $image;
    private $characterDirection;

//    Methods

    public function showCharacter()
    {
        define("WS","https://simpsons-quotes-api.herokuapp.com");
        $url=WS."/quotes";

        $ch=curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"GET");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $json=curl_exec($ch);

        $info=curl_getinfo($ch);

        if($info['http_code']== 200){
            $json_decode=json_decode($json, true);
            if($json_decode){
                $this->setQuote($json_decode[0]['quote']);
                $this->setCharacter($json_decode[0]['character']);
                $this->setImage($json_decode[0]['image']);
                $this->setCharacterDirection($json_decode[0]['characterDirection']);
                return true;
            }
        }else{
            loguear("logs/error.log","a+","Ha ocurrido un error al realizar la petición a ".$url);
            loguear("logs/error.log","a+","Status code devuelto: ".$info['http_code']);
            echo "We are sorry, it looks like the page isn't working right now, please try again later";
        }
        curl_close($ch);
}


//    Getters and Setters

    /**
     * @return mixed
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param mixed $quote
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;
    }

    /**
     * @return mixed
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * @param mixed $character
     */
    public function setCharacter($character)
    {
        $this->character = $character;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getCharacterDirection()
    {
        return $this->characterDirection;
    }

    /**
     * @param mixed $characterDirection
     */
    public function setCharacterDirection($characterDirection)
    {
        $this->characterDirection = $characterDirection;
    }


}