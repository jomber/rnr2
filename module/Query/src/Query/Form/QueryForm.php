<?php
namespace Query\Form;

use Zend\Form\Form;

class QueryForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('query');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'name',
            'type' => 'Text',
            'options' => array(
                //'label' => 'Name',
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'Text',
            'options' => array(
                //'label' => 'Email',
            ),
        ));
        $this->add(array(
            'name' => 'comments',
            'type' => 'textarea',
            'options' => array(
                //'label' => 'Comments',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
              //  'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}