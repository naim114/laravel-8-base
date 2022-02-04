<?php

use App\Models\Settings;

return [
    // general
    'favicon' => Settings::where('name', 'favicon')->pluck('value')[0],
    'logo' => Settings::where('name', 'logo')->pluck('value')[0],
    'app-name' => Settings::where('name', 'app-name')->pluck('value')[0],
    'copyright' => Settings::where('name', 'copyright')->pluck('value')[0],
    'privacy-policy' => Settings::where('name', 'privacy-policy')->pluck('value')[0],
    'terms-conditions' => Settings::where('name', 'terms-conditions')->pluck('value')[0],

    // colors
    'color.primary.hex' => Settings::where('name', 'color.primary.hex')->pluck('value')[0],
    'color.secondary.hex' => Settings::where('name', 'color.secondary.hex')->pluck('value')[0],
    'color.success.hex' => Settings::where('name', 'color.success.hex')->pluck('value')[0],
    'color.info.hex' => Settings::where('name', 'color.info.hex')->pluck('value')[0],
    'color.warning.hex' => Settings::where('name', 'color.warning.hex')->pluck('value')[0],
    'color.danger.hex' => Settings::where('name', 'color.danger.hex')->pluck('value')[0],

    'color.primary.rgb' => Settings::where('name', 'color.primary.rgb')->pluck('value')[0],
    'color.secondary.rgb' => Settings::where('name', 'color.secondary.rgb')->pluck('value')[0],
    'color.success.rgb' => Settings::where('name', 'color.success.rgb')->pluck('value')[0],
    'color.info.rgb' => Settings::where('name', 'color.info.rgb')->pluck('value')[0],
    'color.warning.rgb' => Settings::where('name', 'color.warning.rgb')->pluck('value')[0],
    'color.danger.rgb' => Settings::where('name', 'color.danger.rgb')->pluck('value')[0],

    'months' => [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December',
    ],

    // errors
    '401' => 'Access to this resource is denied.',
    '404' => 'This requested URL was not found on this server.',
    '500' => 'Internal Server Error',

    // page titles
    'login' => 'Login',
    'register' => 'Register',
    'dashboard' => 'Dashboard',
    'account' => 'Account',
    'profile' => 'Profile',
    'activity' => 'Activity Log',
    'administration' => 'Administration',

    'users' => 'Users',
    'users.activity' => 'User Activity',
    'users.view' => 'View User',
    'users.edit' => 'Edit User',

    'activity-log' => 'Users Activities',
    'roles-permissions' => 'Roles & Permissions',
    'roles' => 'Roles',
    'role-list' => 'Roles List',
    'permissions' => 'Permissions',
    'settings' => 'Settings',
    'general' => 'General Settings',
];