<?php 

function is_not_logged_in() {
    $CI = &get_instance();
    if(!$CI->session->userdata('user_data')){
        redirect(base_url('auth/login'));
    }
}

function is_logged_in() {
    $CI = &get_instance();
    if($CI->session->userdata('user_data')){
        redirect(base_url('dashboard'));
    }
}