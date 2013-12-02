<?php
namespace ABC\IsystemBundle\Service;
class ldapService{
  // we'll store the LDAP connection so we do not need to re-connect for every command
  private $connection = null;
  private $user = 'adminict@abc.edu.sv';
  private $password = '_preacheR58+';
  private $basedn = "OU=ClassOf2021, OU=Primary, OU=Students,OU=ABC Users,DC=ABC,DC=EDU,DC=SV";
  private $server = "abc.edu.sv";
  private $dnGroup = "CN=ClassOf2013, OU=ClassOf2013,OU=Exabrit, OU=Students,OU=ABC Users,DC=ABC,DC=EDU,DC=SV"; 
  
  function __construct() {}
  /**
  * Connect and bind to the LDAP or Active Directory Server
  * NOTE: we are assuming the default port of 389.
  * Alternate ports should be specified in the ldap_connect function,
  * if needed.
  * NOTE: We are using the singleton pattern here - we only
  * create a connection if it does not exist.
  */
  public function connect(){
    if ($this->connection)
    {
      return $this->connection;
    }
    else
    {
      $ldapConn = ldap_connect($this->server);
      if ( $ldapConn )
      {
        ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
        if ( ldap_bind( $ldapConn, $this->user, $this->password) )
        {
          $this->connection = $ldapConn;
          return $this->connection;
        }
      }
    }
  }

  /**
  * Search an LDAP server
  */
  public function search($surname,$forename,$login)
  {

    $connection = $this->connect();
    $filter = "(&(sn=$surname*)(givenname=$forename*))";
    $attributes = array('cn','givenname','sn','samaccountname','userprincipalname');

    $results = ldap_search($connection, $this->basedn,$filter);
    $contact = $this->resultToArray($results);
    return $contact;
    /*if ($results)
    {
      $entries = ldap_get_entries($connection, $results);
      return $entries;
    }*/
  }

  /**
  * Add a new contact
  */
  public function add($firstname, $lastname)
  {
    //set up our entry array
    $contact = array();
    $contact['objectclass'][0] = 'top';
    $contact['objectclass'][1] = 'person';
    $contact['objectclass'][2] = 'organizationalPerson';
    $contact['objectclass'][3] = 'User';

    //General
    $contact['givenname'] = $firstname;
    $contact['sn'] = $lastname;
    $contact['displayName'] = $firstname .' '. $lastname;
    $contact['description'] = "Creado desde ldadService ABCIS";
    $contact['mail'] = "samuelmelendez@abc.edu.sv";
    //Account
    $contact['userPrincipalName'] = "samuelmelendez";
    $contact['sAMAccountName'] = "samuelmelendez";

    //Profile
    $contact['scriptPath'] = "student.bat";
    $contact['homedirectory']= "\\"."\storage\PersonalFiles";




    //it_support.bat 
    //administracion
	//scriptPath => =script.bat homeDirectory=\\dc3\PersonalFiles$\username 
    //IT support
	//scriptPath => =it_support.bat homeDirectory=\\dc3\PersonalFiles$\username 
    //Students
	//scriptPath => =student.bat homeDirectory=\\storage\PersonalFiles 
    //Staff Lower
	//scriptPath => =lower_primary.bat homeDirectory=\\dc3\PersonalFiles$\username 
    //Staff Upper
	//scriptPath => =upper_primary.bat homeDirectory=\\dc3\PersonalFiles$\username 
    //Staff Secondary - art
	//scriptPath => =art.bat homeDirectory=\\dc3\PersonalFiles$\username 

    //Member Of
    //$contact['memeberOf'] = "ClassOf2021";
    //$contact['primaryGroupID'] = "ClassOf2021";
    //Session 
    //userParameters 15 min

    //Create the CN entry
    $contact['cn'] = $firstname .' '. $lastname;

    //create the DN for the entry
    $dn = 'cn='.$contact['cn'] .','. $this->basedn;
    //var_dump($contact);
    //add the entry
    $connection = $this->connect();
    //var_dump($contact);
    $result = ldap_add($connection, "$dn", $contact);
    if (!$result)
    {
      //the add failed, lets raise an error and hopefully find out why
      $this->ldapError();
    }
    $entry['member'] = $dn;
    $resultGroup = ldap_mod_add($connection, $this->dnGroup,$entry); 
    if (!$resultGroup)
    {
      //the add failed, lets raise an error and hopefully find out why
      $this->ldapError();
    }
  }

  /**
  * Modify an existing contact
  */
  public function modify($basedn, $dnToEdit, $firstname, $lastname, $address, $phone)
  {
    //get a reference to the current entry
    $connection = $this->connect();
    $result = ldap_search($connection, $dnToEdit);
    if (!$result)
    {
      // the search failed
      $this->ldapError();
    }

    //convert the results to an array for easier use.
    $contact = $this->resultToArray($result);

    //set the new values
    $contact['givenname'] = $firstname;
    $contact['sn'] = $lastname;
    $contact['streetaddress'] = $address;
    $contact['telephonenumber'] = $phone;

    //remove any empty entries
    foreach ($contact as $key => $value) {
      if (empty($value)) {
        unset($contact[$key]);
      }
    }

    //Find the new CN - in case the first or last name has changed
    $cn = 'cn='. $firstname .' '. $lastname;

    //rename the record (handling if the first/last name have changed)
    $changed = ldap_rename($connection, $dnToEdit, $cn, null, true);
    if ($changed)
    {
      //find the DN for the potentially revised name
      $newdn = $cn .','. $basedn;

      //now we can apply any changes in the contact information
      ldap_mod_replace($connection, $newdn, $contact);
    }
    else
    {
      $this->ldapError();
    }
  }

  /**
  * Remove an existing contact
  */
  public function delete($dnToDelete)
  {
    $connection = $this->connect();
    $removed = ldap_delete($connection, $dnToDelete);
    if (!$removed)
    {
      $this->ldapError();
    }
  }

  /**
  * throw an error, getting the needed info from the connection object
  */
  public function ldapError()
  {
    $connection = $this->connect();
    throw new Exception(
       'Error: ('. ldap_errno($connection) .') '. ldap_error($connection)
    );
  }


  /**
  * Convert an LDAP search result into an array
  */
  public function resultToArray($result)
  {
    $connection = $this->connect();
    $resultArray = array();

    if ($result)
    {
      $entry = ldap_first_entry($connection, $result);
      while ($entry)
      {
        $row = array();
        $attr = ldap_first_attribute($connection, $entry);
        while ($attr)
        {
          $val = ldap_get_values_len($connection, $entry, $attr);
          if (array_key_exists('count', $val) AND $val['count'] == 1)
          {
            $row[strtolower($attr)] = $val[0];
          }
          else
          {
            $row[strtolower($attr)] = $val;
          }

          $attr = ldap_next_attribute($connection, $entry);
        }
        $resultArray[] = $row;
        $entry = ldap_next_entry($connection, $entry);
      }
    }
    return $resultArray;
  }

  /**
  * throw an error, getting the needed info from the connection object
  */
  public function disconnect()
  {
    $connection = $this->connect();
    ldap_unbind($connection);
  }
}

$contacts = new ldapService();
$surname = 'Melendez';
$forename = 'Samuel';
$contacts->add($forename,$surname);

//$todo = $contacts->search($surname,$forename,'');
//var_dump($todo);
/*
 for($i=0; $i<count($todo); $i++){

    // to show the attribute displayName (note the case!)
    echo $todo[$i]["displayname"];
    echo '<br>';
    //echo $todo[$i]["givenname"];
    //echo '<br>';
    //echo $todo[$i]["sn"];
   
    }
*/
$contacts->disconnect();


?>

