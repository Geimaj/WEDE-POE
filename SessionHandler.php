<?php
      /*Name: Jamie 
	Surname: Gregory  
	Student#: 16000925
	Login
	Declaration: This is my own work and 
	  any code obtained from other sources
	  will be referenced
*/  

    function loadCart($user){
        $seshid = $user->getEmail();
        if(isset($_SESSION[$seshid])){
            $serialCart = $_SESSION[$seshid];
            $cart = unserialize(stripslashes($serialCart));

            return $cart;
        }

        return new ShoppingCart($user);
    }

    function saveCart($shoppingCart){
        $seshid = $shoppingCart->getUser()->getEmail();
        $serialCart = addslashes(serialize($shoppingCart));
        $_SESSION[$seshid] = $serialCart;
    }

    function loadUser($userCookie){
        $serialUser = stripslashes($userCookie);
        return unserialize($serialUser);
    }

    function saveUserSession($user){
        if($user){
            $serialUser = addslashes(serialize($user));
            $cookie_name = "user";
            $cookie_value = $serialUser;
            $cookie_time = time() + (86400 * 30); // 30 days
            setcookie($cookie_name, $cookie_value, $cookie_time, '/');
        }
    }

    function destroyUserSession(){
        $user = loadUser($_COOKIE["user"]);
        unset($_COOKIE['user']);
        setcookie('user', null, -1, '/');
        $_SESSION = array();
    }

    function loadItem($serialItem){
        $serialItem = stripslashes($serialItem);
        return unserialize($serialItem);
    }

    function saveItemCookie($item){
        $serialItem = addslashes(serialize($item));
        $_COOKIE['item'] = $serialItem;
    }

    function serializeItem($item){
        return addslashes(serialize($item));
    }


?>