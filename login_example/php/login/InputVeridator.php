<?php
require_once(__DIR__."/gump.class.php");

class InputVeridator {

    private $error;
    private $validation_rules_array = array(
      'user'    => 'required|alpha_numeric|max_len,20|min_len,1',
      'email'   => 'required|valid_email',
      'pswd'    => 'required|max_len,20|min_len,1',
      'pswdcom' => 'required'
    );
    private $filter_rules_array = array(
      'user'    => 'trim|sanitize_string',
      'email'   => 'trim|sanitize_email',
      'pswd'    => 'trim',
      'pswdcom' => 'trim'
    );

    public function getErrorArray(){
        return $this->error;
    }

    public function getRuleArray(){
        return $this->validation_rules_array;
    }

    /**
     * check for the input information is valid
     **/
    public function InputCheck($post){
      $gump = new GUMP();
      $post = $gump->sanitize($post);
      $gump->validation_rules($this->validation_rules_array);
      $gump->filter_rules($this->filter_rules_array);
      $validated_data = $gump->run($_POST);
      
      $this->error = $gump->get_readable_errors(false);
      
      return $validated_data;
    }
}