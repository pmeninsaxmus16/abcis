<?php	
$username = 'samuelmelendez';

$handler = ldapconection("testuser@abc.edu.sv","lkjhgfdsazxcvbnm");
$result = ldap_search($handler, "OU=ABC Users,DC=ABC,DC=EDU,DC=SV", "(sAMAccountName=$username)") or die("consulta mala");


$info = ldap_get_entries($handler, $result);
print_r($info);
//Now, to display the results we want:
 for($i=0; $i<count($info); $i++){
    // to show the attribute displayName (note the case!)
    echo $info[$i]["displayname"][0];
   
    }


//$entry = ldap_first_entry($handler,$result);
//print_r($entry);

function ldapconection($user,$passwd){
$handler = ldap_connect("abc.edu.sv","389") or die("No se pudo conectar al dominio");
$bd = ldap_bind($handler,"$user","$passwd") or die("No se pudo pegar al dominio");
return $handler;
}
?>
