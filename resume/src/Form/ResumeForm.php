<?php
/**
 * @file
 * Contains \Drupal\resume\Form\ResumeForm.
 */
namespace Drupal\resume\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use \Drupal\node\Entity\Node;

class ResumeForm extends FormBase {
  /**
   * {@inheritdoc}
   */

    public function getFormId() {
     return 'resume_form';
    }

   public function buildForm(array $form, FormStateInterface $form_state) {
    $form['candidate_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Candidate Name:'),
      '#required' => TRUE,
    );
    $form['candidate_mail'] = array(
      '#type' => 'email',
      '#title' => t('Email ID:'),
      '#required' => TRUE,
    );
    $form['candidate_number'] = array (
      '#type' => 'tel',
      '#title' => t('Mobile no'),
    );
    $form['candidate_dob'] = array (
      '#type' => 'date',
      '#title' => t('DOB'),
      '#required' => TRUE,
    );
    $form['candidate_gender'] = array (
      '#type' => 'select',
      '#title' => ('Gender'),
      '#options' => array(
        'Female' => t('Female'),
        'male' => t('Male'),
      ),
    );
    $form['candidate_confirmation'] = array (
      '#type' => 'radios',
      '#title' => ('Are you above 18 years old?'),
      '#options' => array(
        'Yes' =>t('Yes'),
        'No' =>t('No')
      ),
    );
    $form['candidate_copy'] = array(
      '#type' => 'checkbox',
      '#title' => t('Send me a copy of the application.'),
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  	public function validateForm(array &$form, FormStateInterface $form_state) {
      if (strlen($form_state->getValue('candidate_number')) < 10) {
        $form_state->setErrorByName('candidate_number', $this->t('Mobile number is too short.'));
      }
    }


    public function submitForm(array &$form, FormStateInterface $form_state) {


   // drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('candidate_name'))));
    	
     // foreach ($form_state->getValues() as $key => $value) {
     //   drupal_set_message($key . ': ' . $value);
     // }

   //drupal 7 concept
  		/* $newnode = new stdClass();
		 $newnode->type = "resume"; 
		 $newnode->title = "New node name";
		 $newnode->field_name‎[0]['value'] = $form_state->getValues('candidate_name'); 
		 node_save($newnode); 
		 */

   // For creating node and populating Database  node table
		$values = array();
    	$values = $form_state->getValues();
    	$node = Node::create([
  		'type'        => 'resumetest',
  		'title'       => array($values['candidate_name']),
  		'field_name' => array($values['candidate_name']),
  		'field_email' =>array($values['candidate_mail']),
  		'field_telephone' =>array($values['candidate_number']),
  		'field_dob' =>array($values['candidate_dob']),
  		'field_gender' =>array($values['candidate_gender']),
  		'field_confirm' =>array($values['candidate_confirmation']),
  		'field_copy' =>array($values['candidate_copy'])
  	]);

    	//[$form_state->getValues('candidate_name')]

    $node->save();

 

   }

}