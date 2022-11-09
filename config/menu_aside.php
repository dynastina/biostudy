<?php
// Aside menu
return [

    'items' => [
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                        </svg>', // svg or linked image (svg can be taken from fontawesome or template-back-end)
            'page' => 'dashboard',
            'new-tab' => false,
        ],
        [
            'section' => 'Content Management',
            'menus' => ['content-list']
        ],
        'content-list' => [
            'title' => 'Content',
            'root' => true,
            'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7ZM7 9H3C2.4 9 2 9.4 2 10V20C2 20.6 2.4 21 3 21H7C7.6 21 8 20.6 8 20V10C8 9.4 7.6 9 7 9Z" fill="currentColor"></path>
                            <path opacity="0.3" d="M20 21H11C10.4 21 10 20.6 10 20V10C10 9.4 10.4 9 11 9H20C20.6 9 21 9.4 21 10V20C21 20.6 20.6 21 20 21Z" fill="currentColor"></path>
                        </svg>', // svg or linked image (svg can be taken from fontawesome or template-back-end)
            'page' => 'contents',
            'new-tab' => false,
        ],
        [
            'section' => 'Setting',
            'menus' => ['role-list', 'user-list']
        ],
        'role-list' => [
            'title' => 'Role',
            'root' => true,
            'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z" fill="currentColor"></path>
                            <path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z" fill="currentColor"></path>
                            <path opacity="0.3" d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z" fill="currentColor"></path>
                            <path opacity="0.3" d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z" fill="currentColor"></path>
                        </svg>', // svg or linked image (svg can be taken from fontawesome or template-back-end)
            'page' => 'roles',
            'new-tab' => false,
        ],
        'user-list' => [
            'title' => 'User',
            'root' => true,
            'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"></path>
                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"></rect>
                        </svg>', // svg or linked image (svg can be taken from fontawesome or template-back-end)
            'page' => 'users',
            'new-tab' => false,
        ],
        // [
        //     'title' => 'Applications',
        //     'icon' => 'assets/media/svg/icons/Layout/Layout-4-blocks.svg',
        //     'bullet' => 'line',
        //     'root' => true,
        //     'bullet' => 'dot',
        //     'submenu' => [
        //         'category' => [
        //             'title' => 'Category',
        //             'page' => 'categories',
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Pemberkasan',
        //     'icon' => 'far fa-folder-open',
        //     'bullet' => 'line',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Per File',
        //             'page' => 'document-files',
        //         ],
        //     ]
        // ],
        // Custom
        // [
        //     'section' => 'Custom',
        // ],
        // [
        //     'title' => 'Applications',
        //     'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
        //     'bullet' => 'line',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Users',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'List - Default',
        //                     'page' => 'test',
        //                 ],
        //                 [
        //                     'title' => 'List - Datatable',
        //                     'page' => 'custom/apps/user/list-datatable'
        //                 ],
        //                 [
        //                     'title' => 'List - Columns 1',
        //                     'page' => 'custom/apps/user/list-columns-1'
        //                 ],
        //                 [
        //                     'title' => 'List - Columns 2',
        //                     'page' => 'custom/apps/user/list-columns-2'
        //                 ],
        //                 [
        //                     'title' => 'Add User',
        //                     'page' => 'custom/apps/user/add-user'
        //                 ],
        //                 [
        //                     'title' => 'Edit User',
        //                     'page' => 'custom/apps/user/edit-user'
        //                 ],
        //             ]
        //         ],
        //         [
        //             'title' => 'Profile',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Profile 1',
        //                     'bullet' => 'line',
        //                     'submenu' => [
        //                         [
        //                             'title' => 'Overview',
        //                             'page' => 'custom/apps/profile/profile-1/overview'
        //                         ],
        //                         [
        //                             'title' => 'Personal Information',
        //                             'page' => 'custom/apps/profile/profile-1/personal-information'
        //                         ],
        //                         [
        //                             'title' => 'Account Information',
        //                             'page' => 'custom/apps/profile/profile-1/account-information'
        //                         ],
        //                         [
        //                             'title' => 'Change Password',
        //                             'page' => 'custom/apps/profile/profile-1/change-password'
        //                         ],
        //                         [
        //                             'title' => 'Email Settings',
        //                             'page' => 'custom/apps/profile/profile-1/email-settings'
        //                         ]
        //                     ]
        //                 ],
        //                 [
        //                     'title' => 'Profile 2',
        //                     'page' => 'custom/apps/profile/profile-2'
        //                 ],
        //                 [
        //                     'title' => 'Profile 3',
        //                     'page' => 'custom/apps/profile/profile-3'
        //                 ],
        //                 [
        //                     'title' => 'Profile 4',
        //                     'page' => 'custom/apps/profile/profile-4'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Contacts',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'List - Columns',
        //                     'page' => 'custom/apps/contacts/list-columns'
        //                 ],
        //                 [
        //                     'title' => 'List - Datatable',
        //                     'page' => 'custom/apps/contacts/list-datatable'
        //                 ],
        //                 [
        //                     'title' => 'View Contact',
        //                     'page' => 'custom/apps/contacts/view-contact'
        //                 ],
        //                 [
        //                     'title' => 'Add Contact',
        //                     'page' => 'custom/apps/contacts/add-contact'
        //                 ],
        //                 [
        //                     'title' => 'Edit Contact',
        //                     'page' => 'custom/apps/contacts/edit-contact'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Projects',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'List - Columns 1',
        //                     'page' => 'custom/apps/projects/list-columns-1'
        //                 ],
        //                 [
        //                     'title' => 'List - Columns 2',
        //                     'page' => 'custom/apps/projects/list-columns-2'
        //                 ],
        //                 [
        //                     'title' => 'List - Columns 3',
        //                     'page' => 'custom/apps/projects/list-columns-3'
        //                 ],
        //                 [
        //                     'title' => 'List - Columns 4',
        //                     'page' => 'custom/apps/projects/list-columns-4'
        //                 ],
        //                 [
        //                     'title' => 'List - Datatable',
        //                     'page' => 'custom/apps/projects/list-datatable'
        //                 ],
        //                 [
        //                     'title' => 'View Project',
        //                     'page' => 'custom/apps/projects/view-project'
        //                 ],
        //                 [
        //                     'title' => 'Add Project',
        //                     'page' => 'custom/apps/projects/add-project'
        //                 ],
        //                 [
        //                     'title' => 'Edit Project',
        //                     'page' => 'custom/apps/projects/edit-project'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Support Center',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Home 1',
        //                     'page' => 'custom/apps/support-center/home-1'
        //                 ],
        //                 [
        //                     'title' => 'Home 2',
        //                     'page' => 'custom/apps/support-center/home-2'
        //                 ],
        //                 [
        //                     'title' => 'FAQ 1',
        //                     'page' => 'custom/apps/support-center/faq-1'
        //                 ],
        //                 [
        //                     'title' => 'FAQ 2',
        //                     'page' => 'custom/apps/support-center/faq-2'
        //                 ],
        //                 [
        //                     'title' => 'FAQ 3',
        //                     'page' => 'custom/apps/support-center/faq-3'
        //                 ],
        //                 [
        //                     'title' => 'Feedback',
        //                     'page' => 'custom/apps/support-center/feedback'
        //                 ],
        //                 [
        //                     'title' => 'License',
        //                     'page' => 'custom/apps/support-center/license'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Chat',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Private',
        //                     'page' => 'custom/apps/chat/private'
        //                 ],
        //                 [
        //                     'title' => 'Group',
        //                     'page' => 'custom/apps/chat/group'
        //                 ],
        //                 [
        //                     'title' => 'Popup',
        //                     'page' => 'custom/apps/chat/popup'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Todo',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Tasks',
        //                     'page' => 'custom/apps/todo/tasks'
        //                 ],
        //                 [
        //                     'title' => 'Docs',
        //                     'page' => 'custom/apps/todo/docs'
        //                 ],
        //                 [
        //                     'title' => 'Files',
        //                     'page' => 'custom/apps/todo/files'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Inbox',
        //             'bullet' => 'dot',
        //             'page' => 'custom/apps/inbox',
        //             'label' => [
        //                 'type' => 'label-danger label-inline',
        //                 'value' => 'new'
        //             ]
        //         ]
        //     ]
        // ],
        // [
        //     'title' => 'Pages',
        //     'icon' => 'media/svg/icons/Shopping/Barcode-read.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Wizard',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Wizard 1',
        //                     'page' => 'custom/pages/wizard/wizard-1'
        //                 ],
        //                 [
        //                     'title' => 'Wizard 2',
        //                     'page' => 'custom/pages/wizard/wizard-2'
        //                 ],
        //                 [
        //                     'title' => 'Wizard 3',
        //                     'page' => 'custom/pages/wizard/wizard-3'
        //                 ],
        //                 [
        //                     'title' => 'Wizard 4',
        //                     'page' => 'custom/pages/wizard/wizard-4'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Pricing Tables',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Pricing Tables 1',
        //                     'page' => 'custom/pages/pricing/pricing-1'
        //                 ],
        //                 [
        //                     'title' => 'Pricing Tables 2',
        //                     'page' => 'custom/pages/pricing/pricing-2'
        //                 ],
        //                 [
        //                     'title' => 'Pricing Tables 3',
        //                     'page' => 'custom/pages/pricing/pricing-3'
        //                 ],
        //                 [
        //                     'title' => 'Pricing Tables 4',
        //                     'page' => 'custom/pages/pricing/pricing-4'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Invoices',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Invoice 1',
        //                     'page' => 'custom/pages/invoices/invoice-1'
        //                 ],
        //                 [
        //                     'title' => 'Invoice 2',
        //                     'page' => 'custom/pages/invoices/invoice-2'
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'User Pages',
        //             'bullet' => 'dot',
        //             'label' => [
        //                 'type' => 'label-rounded label-primary',
        //                 'value' => '2'
        //             ],
        //             'submenu' => [
        //                 [
        //                     'title' => 'Login 1',
        //                     'page' => 'custom/pages/users/login-1',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Login 2',
        //                     'page' => 'custom/pages/users/login-2',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Login 3',
        //                     'page' => 'custom/pages/users/login-3',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Login 4',
        //                     'page' => 'custom/pages/users/login-4',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Login 5',
        //                     'page' => 'custom/pages/users/login-5',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Login 6',
        //                     'page' => 'custom/pages/users/login-6',
        //                     'new-tab' => true
        //                 ]
        //             ]
        //         ],
        //         [
        //             'title' => 'Error Pages',
        //             'bullet' => 'dot',
        //             'submenu' => [
        //                 [
        //                     'title' => 'Error 1',
        //                     'page' => 'custom/pages/errors/error-1',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Error 2',
        //                     'page' => 'custom/pages/errors/error-2',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Error 3',
        //                     'page' => 'custom/pages/errors/error-3',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Error 4',
        //                     'page' => 'custom/pages/errors/error-4',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Error 5',
        //                     'page' => 'custom/pages/errors/error-5',
        //                     'new-tab' => true
        //                 ],
        //                 [
        //                     'title' => 'Error 6',
        //                     'page' => 'custom/pages/errors/error-6',
        //                     'new-tab' => true
        //                 ]
        //             ]
        //         ]
        //     ]
        // ],
    ]
];
