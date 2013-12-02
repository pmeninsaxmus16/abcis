<?php
namespace ABC\Isystem\Service;

class ldapService {
    protected $emMy;
    public function __construct($entityManagerMy) {
 	$this->emMy = $entityManagerMy;
    }    
}

?>
