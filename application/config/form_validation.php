<?php
/**
 * Validation Rules
 *
 */

$config = array(
    'user_login' => array(
        array(
            'field' => 'email_address',
            'label' => 'EMAIL ADDRESS',
            'rules' => 'trim|required|xss_clean|min_length[2]|max_length[65]|valid_emailaddress'
            ),
        array(
            'field' => 'password',
            'label' => 'PASSWORD',
            'rules' => 'trim|required|xss_clean|min_length[3]|max_length[65]'
            ),
    ),
    
    'user_forgot_password' => array(
        array(
            'field' => 'email',
            'label' => 'EMAIL',
            'rules' => 'trim|required|xss_clean|min_length[2]|max_length[65]|valid_email'
            )
    )
);