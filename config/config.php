<?php

return [
    "name" => "project-management",

    "routing" => [
        "prefix" => "project-management",
        "middleware" => [
            "web",
            "auth"
        ]
    ]
];
