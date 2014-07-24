<?php
namespace Stadium\Form;

use Zend\Form\Form;

class ReviewForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('review');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'comments',
            'type' => 'Text',
            'options' => array(
                'label' => 'Title',
            ),
        ));


/*        $this->add(array(
            'name' => 'address',
            'type' => 'Text',
            'options' => array(
                'label' => 'Address',
            ),
        ));
        $this->add(array(
            'name' => 'info',
            'type' => 'Text',
            'options' => array(
                'label' => 'Info',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
*/    }
}