<?php
namespace Review\Form;

use Zend\Form\Form;
use Zend\Form\Element;


class ReviewForm extends Form
{
	
    public function __construct($name = null)
    {
    	
        parent::__construct('review');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
        		'name' => 'itemid',
        		'attributes' => array(
        				'type'  => 'hidden',
        		),
        ));
        $this->add(array(
        		'name' => 'categoryid',
        		'attributes' => array(
        				'type'  => 'hidden',
        		),
        ));
        $this->add(array(
        		'name' => 'reviewedby',
        		'attributes' => array(
        				'type'  => 'hidden',
        		),
        ));
        
         
       $this->add(array(
        		'type' => 'Zend\Form\Element\MultiCheckbox',
        		'name' => 'rating',
        		'options' => array(
        				'label' => 'Rating',
        				'value_options' => array(
        						
        						'5' => '',
        						'4' => '',
        						'3' => '',
        						'2' => '',
        						'1' => '',
        				),
        		),
	       		'attributes' => array(
	       				'class'  => 'radioReview',
	       		),
        ));
        
        
        $this->add(array(
            'name' => 'comments',
            'attributes' => array(
                'type'  => 'text',
            	'id' => 'textareaReview',
            ),
            'options' => array(
                'label' => 'Comments',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
        
        
        
    }
}