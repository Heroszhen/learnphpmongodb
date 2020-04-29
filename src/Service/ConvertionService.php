<?php

namespace App\Service;

class ConvertionService{
	
	public function oneClassToArray($entity){
		$result = [];
            // Boucle sur les attribut de l'entiity
            foreach ((array) $entity as $key => $value)
            {
                // exemple de $key : "App\Entity\Customer firstName"
                // attributName recevra uniquement "firstName"
                $attributName = trim(substr($key, strrpos($key, chr(0))));
                // à partir de attributName on va créer le nom du
                 // getter (exemple : getFirstName)
                $getter = 'get'.ucfirst($attributName); 
                // si la méthode existe et que la valeur n'est pas null
                if(method_exists($entity, $getter) && !is_null($value)) 
                {
                    // on l'ajoute à notre tableau associatif
                    $result[$attributName] = call_user_func([
                        $entity,
                        $getter
                    ]);
                }
            }
            // retourne le tableau associatif créé à partir de l'entity
            return $result;

	}
}
