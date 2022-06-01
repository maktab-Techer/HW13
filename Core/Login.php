<?php 
namespace Core;





// TODO make do login and check with databases 
class Login {
  public  string $user;
  public string $password;
  public Model  $model;
  public $error=[];
                //SHA512 
  private const admin="c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec"  ;
  private const doctor="10AF4E2A428D75AA00745EFBAAC308B17FB047373820988172EEFDC4D747D3A23BFB81EB511912E6E1399D576EF0DA2CB9AF44DFC79CAF63A3F2AA5AB7EAB53C"  ;
  private const patient="1C9F069D5477A0BC5288B8D5F573656B435FD773FBE9CB9D9CB0E6C9E4E110C087753726D37F62773B07B685EF374716CEA596F01CF454A3EF74A68FCA03AF48"  ;

  function __construct(Model $model/*=null*/,string $user/*=null*/,string $pass/*=null*/)
  {
    // if(!is_null($model))
    $this->model=$model;

    // if(!is_null($user))
    $this->user=$user;

    // if(!is_null($pass))
    $this->password=$pass;
  }
  public static function getUserNameCookie()
  { 
    if(!self::loginCheck())
    return false;

    switch (explode('__',$_COOKIE["user"])[1]) 
    {
      case self::admin :
        $model= new \App\model\Admin;
        break;
      case self::doctor :
        $model= new \App\model\Doctor;
        break;
      case self::patient :
        $model= new \App\model\Patient;
        break;
      default:
        return false;
    }
    
    
   $dbFind= $model->find(self::getUserCookie(),'email' )  ;
   
    return $dbFind[0]['name'].' '.$dbFind[0]['family_name'] ;
  }
  public static function getUserCookie()
  {
    if(!isset($_COOKIE['user']))
    return false;
    $user=explode('__',$_COOKIE["user"]);
    return $user[0];
  }
  public static function getRoleCookie()
  {
    if(!isset($_COOKIE['user']))
    return false;
    $user=explode('__',$_COOKIE["user"]);
    
    switch ($user[1]) 
    {
      case self::admin :
        return 'admin';
      case self::doctor :
        return 'doctor';
      case self::patient :
        return 'patient';
      default:
        return false;
    }
  }


  public static function loginCheck() : bool
  {
    if(!isset($_COOKIE['user'] ))
    return false;
    
    //user__role__pass
    $user=explode('__',$_COOKIE["user"]);
    

    //admin
    switch ($user[1]) 
    {
      case self::admin :
        $model= new \App\model\Admin;
        break;
      case self::doctor :
        $model= new \App\model\Doctor;
        break;
      case self::patient :
        $model= new \App\model\Patient;
        break;
      default:
        return false;
    }

   $dbUser= $model->find($user[0],'email');
    

    return  ( hash('SHA512',$dbUser[0]['password'])===$user[2]  );
   
  }
 
  public function doLogin($role)
  {   
    

    switch ($role) 
    {
      case 'admin' :
        $flag= self::admin;
        
        break;
        case 'doctor' :
          $flag= self::doctor;
        
        break;
      case 'patient' :
        $flag= self::patient;
        break;
      default:
        return false;
    }
    
    
    if(is_null($flag))
    new \IntlException("Do login only accept admin,doctor,patient");

   
    
  
    if(!($this->userCheck()))
    return false;
    
    if(!($this->passwordCheck()))
    return false;

    //user__role__pass
    setcookie(
      'user',
      $this->user.'__'.$flag.'__'.$this->hash($this->password),
      time()+89400,
      Application::GETCLASS()->GETPROPERTY('rootPath')
      );

     
      return $this;

      
  }
  public function findFormDb($id=null)
  {
    return (is_null($id))?
     $this->model->find(trim($this->user),'email')[0]:
     $this->model->find($id,'id')[0]
     ;
    
    
  }
  public function passwordCheck($Password=null) :bool
  {
    $Password= (!is_null($Password))? $Password : $this->user;
   $dbPassword= $this->findFormDb()['password'];
   $a= $dbPassword==$this->password ;
    $this->error[]= "password is wrong" ;
   return $a ;
  }
  public function userCheck($user=null) :bool
  {
    $user= (!is_null($user))? $user : $this->user;
    $dbEmile= $this->findFormDb()['email'];
    if(is_null($dbEmile) ){
      $this->error[]='email do not exist';
      return false;
    }
    return $dbEmile== $user ;
  }
  /**
   * SHA512 
   */
  public function hash($value)
  {
    //SHA512 
    return hash('SHA512',$value);
  }

  public static function logout()
  {
    setcookie(
      'user',
      '',
      time()-1,
      Application::GETCLASS()->GETPROPERTY('rootPath')
      );
  }

}