<?php

namespace api\tests\unit;

use api\modules\rest\forms\RegistrationForm;

class RegistrationFormTest extends \Codeception\Test\Unit
{
    public function testNoValidateAgreement()
    {
        $form = new RegistrationForm();
        $this->assertNull($form->agreement);
        $this->assertFalse($form->validate());
    }
}
