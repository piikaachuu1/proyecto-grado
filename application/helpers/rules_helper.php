<?php 

 function getLoginRules()
{
        return array(
                array(
                        'field' => 'usuario',
                        'label' => 'Nombre Usuario',
                        'rules' => 'required|trim',
                        'errors' => array(
                                'required' => 'El %s es requerido'
                        )
                ),
                array(
                       'field' => 'password',
                        'label' => 'password',
                        'rules' => 'required|trim',
                        'errors' => array(
                                'required' => 'El %s es requerido'
                        )

        ));

}

?>
