<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Array debug
 *
 * @access  public
 * @param   string
 * @return  string
 */ 
function ad($data){
    # Array Debug
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/* ==============================================
 * Convert Date From Europe to America Format
 * AND return SQL format Y-m-d
 * STRTOTIME only can read America Format -- m/d/Y
 * FYI, Europe format d/m/Y
 * ==============================================
 */
function convert_date_american_to_europe_format($date,$platform_type=null){
    $american_date_format = str_replace('/', '-', $date);
    if($platform_type == 'shopee'){
        $sql_date_format = date('Y-m-d H:i:s', strtotime($american_date_format));
    }else{
        $sql_date_format = date('Y-m-d', strtotime($american_date_format));
    }
    return $sql_date_format;
}

/*
* SPACE is not empty - Please do trim before using this function for your own purpose
*  var_dump(having_value(0));        // true
   var_dump(having_value(0000));     // true
   var_dump(having_value("    0"));  // true
   var_dump(having_value(""));       // false
   var_dump(having_value("  "));     // true
   var_dump(having_value('\t'));     // true
   var_dump(having_value(''));       // false
   var_dump(having_value('o'));      // true
   var_dump(having_value('O'));      // true
   var_dump(having_value('0'));      //true
   var_dump(having_value(null));     //false
   var_dump(having_value());         //false
*/
function having_value($val='')
{
    if(is_array($val) || is_object($val)):
        $logic_empty = empty($val);
        return !$logic_empty; 
    else:
        $ascii = ord($val);
        if($ascii==48 || $ascii=0 || $ascii==32):
            return true;
        else:
            $logic_empty = empty($val);
            return !$logic_empty;             
        endif;
    endif;
}

/*
 * To check user login status
 * redirect to login page if not login
 */
function check_login_status()
{
    $obj =& get_instance();    
    $usr_profile = $obj->session->userdata('usr_profile');
    $usr_id = $usr_profile['user_id'];
    if(!having_value($usr_id)){
        // $obj->session->set_userdata('previous_url', current_url());
        redirect('login');
    }
}

function order_number($id){
    $prefix = "1"; // update the prefix here
    $number = str_pad($id, 6, "0", STR_PAD_LEFT);
    $order_number = $prefix.$number;

    return $order_number;
    
}

