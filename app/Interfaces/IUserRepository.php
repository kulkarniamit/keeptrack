<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 3/17/16
 * Time: 11:43 AM
 */
namespace Interfaces;

interface IUserRepository {

    public function getRegistrationValidationRules();
    public function getJobApplicationRules();

    public function validateUser($inputs,$rules,$messages);

    public function saveUser();
    public function saveJobApplication();

    public function sendWelcomeMail($newuser);
    public function validateUserCredentials();

    public function checkOldPasswordMatch($oldPassword);
    public function validatePasswordChangeInputs($inputs,$rules);
    public function setNewPassword($newpassword);
}
?>
