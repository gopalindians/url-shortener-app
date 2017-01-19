<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('See one or more Apps as Not Completed');
$I->amOnPage('/');
$I->see('Not Completed');
