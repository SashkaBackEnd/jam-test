<?php

return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        '<module:finance|lottery|invoice|order|shop|user|wallet|warehouse|gii>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
    ],
];
