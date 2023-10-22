<?php
class User{

    private $db;
    public $errors = array();


    public function __construct()
    {
        $this->db = new Database;
    }

    public function validat($data)
    {
        $email = $data['email'];
         // check for first name 
         if(empty($data['username'])){
            $this->errors['username'] = "Username is required";
        }elseif(!preg_match('/^[a-zA-Z]+$/', $data['username'])){

            $this->errors['username'] = "Only letter allowed in first name";

        }

    

        if(empty($data['email'])){
            $this->errors['email'] = "Email is required";
         }
        //  elseif(!empty($data['email'])){
        //     $this->db->query("SELECT * from users WHERE email = :email");
        //     $this->db->bind(':email', $data['email']);
        //     $this->db->execute();
        //      if($data['email'] == $this->db->single()->email){
        //         $this->errors['email'] = "This email is already taken";
        //      }elseif($data['email'] != $this->db->single()->email){
        //         $this->errors['email'] = "ddd";
        //      }
        
                
            
            
        // }
         
        //  elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        //     $this->errors['email'] = "Email is not valid";

        // }
        

        if(empty($data['password'])){
            $this->errors['password'] = "Password is required";
        }elseif(strlen($data['password']) < 8){
            $this->errors['password'] = "Password must be at least 8 letters";

        }elseif($data['password'] != $data['confirm_password']){

            $this->errors['password'] = "Password does not match!";

        }


        if(count($this->errors) == 0){
            return true;
        }
        return false;

    }

    public function register($data)
    {
        $this->db->query("INSERT INTO users(username, email, password) VALUES(:username, :email, :password)");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function login($data)
    {
        $password = $data['password'];
        
        if(empty($data['email'])){
            $this->errors['email'] = "Email is required";
         }
         elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = "Email is not valid";

        }

        if(empty($data['password'])){
            $this->errors['password'] = "Password is required";
        }
        
       if(!empty($data['email']) && !empty($data['password'])){
        $this->db->query("SELECT * from users WHERE email = :email");
        $this->db->bind(':email', $data['email']);
        $this->db->execute();
        $result = $this->db->single();

        $id = $result->id;
        $username = $result->username;
        $password_hash = $result->password;
     
        if(password_verify($password, $password_hash)){
           
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;                            
            
            // Redirect user to welcome page
            // header("location: welcome.php");
        } else{
            $this->errors['logerror'] ="Invalid email or password";
        }


        if(count($this->errors) == 0){
            return true;
        }
        return false;

       }
       
    }

    public function all()
    {
        $this->db->query("SELECT * FROM users");
        $this->db->execute();
        $return = $this->db->resulSet();
        return $return;
    }


}
