<?php
 
namespace Drupal\ex_form\Form;
 
use Drupal\Core\Form\FormBase;                   
use Drupal\Core\Form\FormStateInterface;             

class ExForm extends FormBase {
 
 //the method create a form
 public function buildForm(array $form, FormStateInterface $form_state) {
 
  $form['first_name'] = [
   '#type' => 'textfield',
   '#title' => 'First Name:',
   //'#description' => $this->t('First Name must not contain numbers'),
   '#required' => TRUE,
  ];

  $form['last_name'] = [
   '#type' => 'textfield',
   '#title' => 'Last Name:',
   '#required' => TRUE,
  ];

  $form['subject'] = [
   '#type' => 'textfield',
   '#title' => 'Subject:',
   '#required' => TRUE,
  ];

  $form['message'] = [
   '#type' => 'textarea',
   '#title' => 'Message:',
   '#required' => TRUE,
  ];

  $form['email'] = [
   '#type' => 'email',
   '#title' => 'E-mail Adress:',
   '#required' => TRUE,
  ];
 
  // Add a submit button that handles the submission of the form.
  $form['submit'] = [
   '#type' => 'submit',
   '#name' => 'submit',
   '#value' =>'Submit this form',
  ];
 
  return $form;
 }
 
 //return the title of form
 public function getFormId() {
  return 'ex_form';
 }

 //VALIDATE EMAIL
 public function validateForm(array &$form, FormStateInterface $form_state) {
 $email = $form_state->getValue('email');
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$form_state->setErrorByName('email', "{$form_state->getValue('email')} is a invalid email");
}
}

 // the action of the submit
 public function submitForm(array &$form, FormStateInterface $form_state) {
 drupal_set_message('Form submitted!');
 drupal_set_message( $form_state->getValue('email') );


}
}

