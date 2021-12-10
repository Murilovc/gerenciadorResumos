<?php 
    class Util {
        
        public function formatar_telefone($fone, $ddd)
        {
            if(strlen($fone) == 8) {
                $nova = substr($fone, 0, 4)."-".substr($fone, 4, 4);
                $fone = $nova;
                $padrao = "(".$ddd.")"." ".$fone;
                return $padrao;
            }
                    
            if(strlen($fone) == 9) {
                $nova = substr($fone, 0, 1)." ".substr($fone, 1, 8);
                $fone = $nova;
                $padrao ="(".$ddd.")"." ".$fone;
                return $padrao;
            }
                
            if(strlen($fone) == 10) {
                $ddd = substr($fone, 0, 2);
                $nova = substr($fone, 2, 1).substr($fone, 3, 11);
                $fone = $nova;
                $padrao = "(".$ddd.")".$fone;
                return $padrao;
            }
                
            if(strlen($fone) == 11) {
                $ddd = substr($fone, 0, 2);
                $nova = substr($fone, 2, 1)." ".substr($fone, 3, 11);
                $fone = $nova;
                $padrao = "(".$ddd.")"." ".$fone;
                return $padrao;
            }
            
            return $fone;
        }
    }
?>