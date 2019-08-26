<?php

return [
    'layouts' => [
        'header' => [
            'title' => 'Quynh Lam',
            'logout' => 'Log out',
            'my_profile' => 'My profile',
            'app_name' => 'Quynh Lam',
        ],
        'aside_left' => [
            'group' => [
                'category' => 'Category',
                'product' => 'Product',
                'user' => 'User',
                'agent' => 'Agent',
                'contact' => 'Contact',
                'companies' => 'Company',
                'configuration' => 'Configuration',
            ],
        ],
    ],
    'tooltip_title' => [
        'edit' => 'Edit',
        'delete' => 'Delete',
        'duplicate' => 'Duplicate',
        'show' => 'Show',
        'change_sequence' => 'Drag and drop to change the sequence',
    ],
    'breadcrumbs' => [
        'create' => 'Create',
        'edit' => 'Edit',
        'homepage' => 'Homepage',
    ],
    'buttons' => [
        'create' => 'Create',
        'update' => 'Update',
        'delete' => 'Delete',
        'cancel' => 'Cancel',
        'upload' => 'Upload',
        'accept' => 'Accept',
        'close' => 'Close',
    ],

    'dashboard' => [
        'breadcrumbs' => [
            'index' => 'Dashboard',
        ],
    ],

    'categories' => [
        'search' => [
            'place_holder_text' => 'Search by title name ...',
        ],
        'columns' => [
            'jumbotron_image' => 'Jumbotron Image',
            'banner_image' => 'Banner Image',
            'homepage_image' => 'Homepage Image',
            'english_title' => 'English Title',
            'vietnamese_title' => 'Vietnamese Title',
            'action' => 'Action'
        ],
        'form' => [
            'title_vi' => 'Vietnamese Title',
            'title_en' => 'English Title',
            'jumbotron_image' => 'Jumbotron Image',
            'banner_image' => 'Banner Image',
            'homepage_image' => 'Homepage Image',
        ],
        'dropzone' => [
            'label' => 'Upload images',
        ],
        'breadcrumbs' => [
            'title' => 'Category',
        ],
        'buttons' => [
            'add' => 'Add Category',
        ],
        'validate' => [
            'jumbotron_image' => [
                'required' => 'The jumbotron image field is required'
            ],
            'banner_image' => [
                'required' => 'The banner image field is required'
            ],
            'homepage_image' => [
                'required' => 'The homepage image field is required'
            ],
            'title_vi' => [
                'required' => 'The vietnamese title field is required'
            ],
            'title_en' => [
                'required' => 'The english title field is required'
            ],
        ],
        'flash_messages' => [
            'delete' => 'Category deleted!',
            'create' => 'New category added!',
            'update' => 'Category updated!',
        ],
        'not_found' => 'No categories found!',
    ],

    'products' => [
        'search' => [
            'place_holder_text' => 'Search by title name ...',
        ],
        'categories' => [
            'all' => 'All'
        ],
        'columns' => [
            'homepage_image' => 'Homepage Image',
            'image' => 'Image',
            'price' => 'Price',
            'english_title' => 'English Title',
            'vietnamese_title' => 'Vietnamese Title',
            'action' => 'Action'
        ],
        'form' => [
            'category' => 'Category',
            'title_vi' => 'Vietnamese Title',
            'title_en' => 'English Title',
            'image' => 'Image',
            'homepage_image' => 'Homepage Image',
            'content_en' => 'English Content',
            'content_vi' => 'Vietnamese Content',
        ],
        'dropzone' => [
            'label' => 'Upload images'
        ],
        'breadcrumbs' => [
            'title' => 'Product',
        ],
        'buttons' => [
            'add' => 'Add Product',
        ],
        'flash_messages' => [
            'delete' => 'Product deleted!',
            'create' => 'New product added!',
            'update' => 'Product updated !',
        ],
        'not_found' => 'No product found!'
    ],

    'users' => [
        'search' => [
            'place_holder_text' => 'Search by user ...',
        ],
        'tab' => [
            'my_info' => 'My Info',
            'change_password' => 'Change Password',
        ],
        'columns' => [
            'email' => 'Email',
            'old_password' => 'Old password',
            'new_password' => 'Password',
            'confirm_password' => 'Confirm password',
            'name' => 'Name',
            'date_registered' => 'Date registered',
            'status' => 'Status',
            'action' => 'Action',
        ],
        'form' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
        'breadcrumbs' => [
            'title' => 'User',
        ],
        'buttons' => [
            'add' => 'Add User',
            'search' => 'Search',
        ],
        'flash_messages' => [
            'delete' => 'User deleted!',
            'create' => 'New user added!',
            'update' => 'User updated !',
            'update_fail' => 'Updated Fail User!',
        ],
        'not_found' => 'No User found!',
    ],
    'configurations' => [
        'form' => [
            'homepage_banner' => 'Homepage Banner',
            'about_us_banner' => 'About us Banner',
            'product_banner' => 'Product Banner',
            'agent_banner' => 'Agent Banner',
            'contact_banner' => 'Contact Banner',
        ],
        'dropzone' => [
            'label' => 'Upload images'
        ],
        'breadcrumbs' => [
            'title' => 'Configuration',
        ],
        'flash_messages' => [
            'update' => 'Updated configuration!',
        ],
    ],
    'companies' => [
        'form' => [
            'introduction_image' => 'Introduction Image',
            'introduction_en' => 'English Introduction',
            'introduction_vi' => 'Vietnamese Introduction',
            'goal_image' => 'Goal Image',
            'goal_en' => 'English Goal',
            'goal_vi' => 'Vietnamese Goal',
            'total_happy_customers' => 'Total Happy Customers',
            'total_stores' => 'Total Stores',
            'total_experience_years' => 'Total Experience Years',
            'total_active_projects' => 'Total Active Projects',
        ],
        'team' => [
            'buttons' => [
                'add' => 'Add Team',
                'search' => 'Search',
            ],
            'search' => [
                'place_holder_text' => 'Search by full name ...',
            ],
            'columns' => [
                'avatar_image' => 'Avatar Image',
                'fullname' => 'Full Name',
                'title' => 'Title',
                'action' => 'Action',
            ],
            'form' => [
                'avatar_image' => 'Avatar Image',
                'full_name' => 'Full Name',
                'title' => 'Title',
            ],
            'not_found' => 'No Team found!',
        ],
        'tab' => [
            'about_us' => 'About the company',
            'team' => 'Company Team',
        ],
        'dropzone' => [
            'label' => 'Upload images'
        ],
        'breadcrumbs' => [
            'title' => 'Company',
        ],
        'flash_messages' => [
            'update' => 'The Company Updated!',
            'updateTeam' => 'Company Team Updated!',
            'createTeam' => 'New Company Team Added!',
            'deleteTeam' => 'Company Team Deleted!',
        ],
    ],
    'contacts' => [
        'search' => [
            'place_holder_text' => 'Search by title name, email ...',
        ],
        'breadcrumbs' => [
            'title' => 'Contact',
        ],
        'buttons' => [
            'search' => 'Search',
        ],
        'flash_messages' => [
            'delete' => 'Contact deleted!',
            'update' => 'User updated !',
            'update_fail' => 'Updated Fail User!',
        ],
        'form' => [
            'name' => 'Name',
            'email' => 'Email',
            'content' => 'Content',
            'phone' => 'Phone',
        ],
        'columns' => [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'created_at' => 'Created_at',
            'action' => 'Action',
        ],
        'not_found' => 'No Contact found!',
    ],
    'agents' => [
        'search' => [
            'place_holder_text' => 'Search by title name, email ...',
        ],
        'breadcrumbs' => [
            'title' => 'Agent',
        ],
        'form' => [
            'name_vi' => 'Vietnamese  Name',
            'name_en' => 'English Name',
            'address_en' => 'English Address',
            'address_vi' => 'Vietnamese  Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'google_maps' => 'Google Maps',
            'action' => 'Action',
            'preview' => 'Preview',
        ],
        'columns' => [
            'address_en' => 'English Address',
            'address_vi' => 'Vietnamese  Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'google_maps' => 'Google Maps',
            'action' => 'Action',
            'is_contact' => 'Contact',
        ],
        'buttons' => [
            'search' => 'Search',
            'add' => 'Add Agent',
        ],
        'flash_messages' => [
            'delete' => 'Agent deleted!',
            'create' => 'New agent added!',
            'update' => 'Agent updated!',
            'update_fail' => 'Updated Fail Agent!',
            'success' => 'Success',
        ],
        'not_found' => 'No Agent found!',
    ],
];
