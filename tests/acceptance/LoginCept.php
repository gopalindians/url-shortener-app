<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('fill form with wrong credential and see error for ReCAPTCHA ');
$I->amOnPage('/url-app/account/login/');
$I->fillField('email', 'gopalindians');
$I->fillField('password', 'qwerty');
$I->click('Sign in');
$I->see('The reCAPTCHA field is required.');