jQuery(document).ready(function ($) {
    $("nav#menu").mmenu({
        "extensions": [
            "pagedim-black",
            "shadow-page"
        ],
        "offCanvas": {
            zposition: "front"
        },
        "searchfield": {
            "placeholder": 'Need some fresh vegatables?'
        },
        "navbar": {
            title: 'P.M'
        },
        "navbars": [
            {
                "position": "top",
                "content": [
                    '<a href="/"><img src="' + logo_image_path + '" class="img-responsive" alt=""></a>'
                ]
            },
            // {
            //     "position": 'top',
            //     "content": ['searchfield']
            // },
            {
                "position": 'top',
                "content": ['breadcrumbs']
            },
            // {
            //     "position": "bottom",
            //     "content": [
            //         "<a class='fa fa-envelope' href='#/'></a>",
            //         "<a class='fa fa-twitter' href='#/'></a>",
            //         "<a class='fa fa-facebook' href='#/'></a>"
            //     ]
            // }
        ]
    });
});