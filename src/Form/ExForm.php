<?php
 
namespace Drupal\ex_form\Form;
 
use Drupal\Core\Form\FormBase;                   // Базовый класс Form API
use Drupal\Core\Form\FormStateInterface;              // Класс отвечает за обработку данных
 
/**
 * Наследуемся от базового класса Form API
 * @see \Drupal\Core\Form\FormBase
 */
class ExForm extends FormBase {
 
 // метод, который отвечает за саму форму - кнопки, поля
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
   '#ajax' => [
    'callback' => '::validateEmailAjax',
    'event' => 'change',
    'progress' => array(
    'type' => 'throbber',
    'message' => t('Verifying email..'),
    ),
  ],
  # Элемент, в который мы будем писать результат в случае необходимости.
  '#suffix' => '<div class="email-validation-message"></div>'
  ];
 
  // Add a submit button that handles the submission of the form.
  $form['submit'] = [
   '#type' => 'submit',
   '#name' => 'submit',
   '#value' =>'Submit this form',
  ];
 
  return $form;
 }
 
 // метод, который будет возвращать название формы
 public function getFormId() {
  return 'ex_form_exform_form';
 }
 
 /// ф-я валидации
 public function validateForm(array &$form, FormStateInterface $form_state) {
  $title = $form_state->getValue('title');
  $is_number = preg_match("/[\d]+/", $title, $match);
 

 




/*$str="login@pochta.ru";
if (preg_match("/[0-9a-z]+@[a-z]/", $str)) {
    echo "Email введен верно!";
}
else {
    echo "Формат ввода email не верен!";
}*/

 }
 
 // действия по сабмиту
 public function submitForm(array &$form, FormStateInterface $form_state) {
  
  drupal_set_message('Form submitted!');
  drupal_set_message($form['email']);
 }
 /**
 * {@inheritdoc}
 */
/*public function validateEmailAjax(array &$form, FormStateInterface $form_state) {
  $response = new AjaxResponse();
  if (substr($form_state->getValue('email'), -11) == 'example.com') {
    $response->addCommand(new HtmlCommand('.email-validation-message', 'This provider can lost our mail. Be care!'));
  }
  else {
    # Убираем ошибку если она была и пользователь изменил почтовый адрес.
    $response->addCommand(new HtmlCommand('.email-validation-message', ''));
  }
  return $response;
}*/
 
}