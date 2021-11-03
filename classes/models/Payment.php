<?php

  // namespace models;

  class Payment{

    private $key;
    private $url;
    private $data;
    private $endpoint;
    private $callback;

    public function __construct(){
      $this->url = 'https://api.stripe.com';
      $this->key = 'sk_test_suaChave';
    }

    public function payIntent($product_id, $user_id, $card_number, $date_valid, $cvv, $amount){
      $this->endpoint = '/v1/payment_intents';
      $this->data = [
          "amount"               => $amount,
          "currency"             => "brl",
          "payment_method_types" => ["card"],
        ];

      $this->post();
      return $this;
    }

    public function callback(){
      return $this->callback();
    }


    public function post(){
      $url_format = $this->url.$this->endpoint;
      $key_format = ['api_key' => $this->key];

      $ch = curl_init($url_format);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->data)
    );
      curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer sk_test_suaChave"]);
      $this->callback = json_decode(curl_exec($ch));
      curl_close($ch);
      $idReference = $this->callback->id;

      if($this->endpoint == '/v1/payment_intents'){
        $insertPayment = \MySql::connect()->prepare("INSERT INTO `payments` VALUES (null,?,?,?,?,?,?,?,?)");
        $insertPayment->execute(array($_POST['product_id'], $_POST['user_id'], $idReference,$_POST['card_number'], $_POST['date_valid'], $_POST['cvv'], $_POST['amount'],date('Y-m-d')));

        if($insertPayment == true){
            $deleteOrder = \MySql::connect()->prepare("DELETE FROM `orders` WHERE user_id = $_SESSION[id]");
            $deleteOrder->execute();
            echo "<script> Location.reload(); </script>";
            echo "<script> alert('Compra realizada com sucesso!') </script>";
        }
      }

    }

  }

?>
