<?php

//Showing success message after saving the plugin configuration
if (isset($_POST['submit'])) {
    echo '<div class="notice-success is-dismissible notice"><p>Infinite scroll configuration saved successfully 🎉</p></div>';
}

$current_tab = isset($_GET['tab']) ? esc_html($_GET['tab']) : "configure";

?>

    <div class="wrap">
        <h1>Infinite Scroll for Genesis from ikva eSolutions</h1>
        <h2 class="nav-tab-wrapper ikva-infinite-scroll-tabs" style="margin-top: 10px">
            <a href="?page=<?php echo ikva_infinite_scroll_for_wp_SETTINGS_SLUG ?>&tab=configure"
               class="nav-tab <?php echo $current_tab == 'configure' ? 'nav-tab-active' : ''; ?>"><span
                        class="dashicons dashicons-admin-generic ikva-infinite-scroll-tab-icons"></span>Configure</a>
            <a href="?page=<?php echo ikva_infinite_scroll_for_wp_SETTINGS_SLUG ?>&tab=help"
               class="nav-tab <?php echo $current_tab == 'help' ? 'nav-tab-active' : ''; ?>"><span
                        class="dashicons dashicons-sos ikva-infinite-scroll-tab-icons"></span>Help</a>
            <a href="?page=<?php echo ikva_infinite_scroll_for_wp_SETTINGS_SLUG ?>&tab=recommendations"
               class="nav-tab <?php echo $current_tab == 'recommendations' ? 'nav-tab-active' : ''; ?>"><span
                        class="dashicons dashicons-megaphone ikva-infinite-scroll-tab-icons"></span></span>Our
                Recommendations</a>
            <a href="https://ikvaesolutions.com/go/donate" target="_blank" class="nav-tab" style="float: right;">
                <svg class="heart" viewBox="0 0 32 29.6">
                    <path d="M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2
	c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z"/>
                </svg>
                Buy me a Burger</a>
        </h2>

        <?php ikva_infinite_scroll_showCurrentTab($current_tab); ?>

        <style>

            .ikva-infinite-scroll-tab-icons {
                margin-right: 5px;
                margin-top: 1px;
            }

            .ikva-infinite-scroll-tab:before {
                font-family: Dashicons, serif;
                opacity: 0.2;
                color: #aaa;
                font-size: 200pt;
                position: absolute;
                top: 300px;
                right: 40px;
                z-index: -1;
            }

            .ikva-infinite-scroll-tab.configure:before {
                content: "\f111";
            }

            .ikva-infinite-scroll-tab.help:before {
                content: "\f468";
            }

            .ikva-infinite-scroll-tab.recommendations:before {
                content: "\f488";
            }

            .heart {
                fill: #f44336;
                position: relative;
                top: 3px;
                width: 15px;
                margin-right: 5px;
                animation: pulse 1s ease infinite;
            }

            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.3); }
                100% { transform: scale(1); }
            }

        </style>

    </div>

<?php


function ikva_infinite_scroll_showCurrentTab(string $current_tab)
{

    switch ($current_tab) {
        case 'configure':
            include_once(ikva_infinite_scroll_for_wp_PLUGIN_DIR . '/includes/menu/configure.php');
            ikva_infinite_scroll_for_wp_configure();
            break;
        case 'help':
            include_once(ikva_infinite_scroll_for_wp_PLUGIN_DIR . '/includes/menu/help.php');
            ikva_infinite_scroll_for_wp_help();
            break;
        case 'recommendations':
            include_once(ikva_infinite_scroll_for_wp_PLUGIN_DIR . '/includes/menu/recommendations.php');
            ikva_infinite_scroll_for_wp_recommendations();
            break;
        default:
            include_once(ikva_infinite_scroll_for_wp_PLUGIN_DIR . '/includes/menu/unauthorized.php');
            ikva_infinite_scroll_for_wp_unauthorized();
    }

}