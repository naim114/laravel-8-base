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
    'color.primary.hex' => Settings::where('name', 'color.primary.hex')->pluck('value')[0],
    'color.primary' => Settings::where('name', 'color.primary')->pluck('value')[0],
    'color.secondary' => Settings::where('name', 'color.secondary')->pluck('value')[0],
    'color.success' => Settings::where('name', 'color.success')->pluck('value')[0],
    'color.info' => Settings::where('name', 'color.info')->pluck('value')[0],
    'color.warning' => Settings::where('name', 'color.warning')->pluck('value')[0],
    'color.danger' => Settings::where('name', 'color.danger')->pluck('value')[0],
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