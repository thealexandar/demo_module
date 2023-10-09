<?php

namespace Drupal\demo_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class CustomForm extends ConfigFormBase {

    public function getFormId() {
        // Unique ID of the form.
        return 'custom_form';
    }

    protected function getEditableConfigNames() {
        // return [
        //     'demo_module.settings',
        // ];

        return [
            'custom_form.setting',
        ];
    }

    public function buildForm(array $form, FormStateInterface $form_state) {
        // Create a $form API array
        $config = $this->config('custom_form.setting');
        $form['name'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Name'),
            '#default_value' => $config->get("name"),
        );
        // $form['email'] = array(
        //     '#type' => 'email',
        //     '#title' => $this->t('Email'),
        // );
        // $form['date'] = array(
        //     '#type' => 'date',
        //     '#title' => $this->t('Date'),
        // );
        // $form['gender'] = array(
        //     '#type' => 'select',
        //     '#options' => array('male' => $this->t('Male'), 'female' => $this->t('Female')),
        //     '#title' => $this->t('Gender'),
        // );
        // $form['save'] = array(
        //     '#type' => 'submit',
        //     '#value' => $this->t('save'),
        // );
        return parent::buildForm($form, $form_state);
    }

    public function validateForm(array &$form, FormStateInterface $form_state) {
        //validate submitted form data.
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        // handle submitted form data.
        $this->config('custom_form.setting')
            ->set('name', $form_state->getValue('name'))
            ->save();
        parent::submitForm($form, $form_state);
    }
}